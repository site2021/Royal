<?php
require('code128-rev.php');

include '../../control/conex.php';

// configuracion de la zona regional 
date_default_timezone_set('america/bogota');
setlocale(LC_ALL,”es_ES”);

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$wfecha =  htmlspecialchars($dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')." ( ".date("H:i:s")." )");
// 

$xcolegio = $_REQUEST['colegio'];
$xcual = $_REQUEST['cual'];


function encabezado($xpdf,$wcual,$psector,$pnombreconductor,$pcelular,$pinterno,$pnombreauxiliar,$pcelularauxiliar,$pcantidad,
	$ptotpaginas,$ppagina,$pcolegio,$pfecha){

	// logo
	$xpdf->Image('royal001.jpg',4,4,50);

	// fecha de impresion --------------------------------------------------------------------
	$xpdf->SetFont('Arial','B',8);
	$xpdf->SetXY(5,25);$xpdf->Cell(100,5,'Pereira, '.$pfecha,0,0,'L');

	$xpdf->SetFont('Arial','B',8);

	// numeracion de paginas
	$xpdf->SetXY(190,5);$xpdf->Cell(80,5,utf8_decode('página: ').$ppagina.'/'.$ptotpaginas,0,0,'R');

	// titulos
	$xpdf->SetXY(150,10);$xpdf->Cell(40,10,'SECTOR',1,0,'C');
	$xpdf->SetXY(150,20);$xpdf->Cell(40,5,'NOMBRE DEL CONDUCTOR',1,0,'C');
	$xpdf->SetXY(150,25);$xpdf->Cell(40,5,'No. CELULAR',1,0,'C');
	$xpdf->SetXY(150,30);$xpdf->Cell(40,5,'NUMERO INTERNO',1,0,'C');
	$xpdf->SetXY(150,35);$xpdf->Cell(40,5,'AUXILIAR',1,0,'C');
	$xpdf->SetXY(150,40);$xpdf->Cell(40,5,'No. CELULAR',1,0,'C');
	$xpdf->SetXY(150,45);$xpdf->Cell(40,5,'CANTIDAD',1,0,'C');

	// casilla para el colegio
	$xpdf->SetXY(5,45);$xpdf->Cell(15,5,'COLEGIO',1,0,'L');	
	// celdas para mes y quincena
	$xpdf->SetXY(60,45);$xpdf->Cell(10,5,'MES',1,0,'L');	
	$xpdf->SetXY(70,45);$xpdf->Cell(25,5,'',1,0,'L');	
	$xpdf->SetXY(95,45);$xpdf->Cell(20,5,'QUINCENA',1,0,'L');	
	$xpdf->SetXY(115,45);$xpdf->Cell(25,5,'',1,0,'L');

	// datos de los titulos
	$xpdf->SetFont('Arial','',8);
	$xpdf->SetXY(190,10);$xpdf->multiCell(80,5,$psector,1,'C');
	$xpdf->SetXY(190,20);$xpdf->Cell(80,5,$pnombreconductor.' ('.$wcual.') ',1,0,'C');
	$xpdf->SetXY(190,25);$xpdf->Cell(80,5,$pcelular,1,0,'C');
	$xpdf->SetXY(190,30);$xpdf->Cell(80,5,$pinterno,1,0,'C');
	$xpdf->SetXY(190,35);$xpdf->Cell(80,5,$pnombreauxiliar,1,0,'C');
	$xpdf->SetXY(190,40);$xpdf->Cell(80,5,$pcelularauxiliar,1,0,'C');
	$xpdf->SetXY(190,45);$xpdf->Cell(80,5,$pcantidad,1,0,'C');

	// datos del colegio
	$xpdf->SetXY(20,45);$xpdf->Cell(40,5,$pcolegio,1,0,'L');

	// Encabezados de detalle
	$xpdf->SetFont('Arial','',7);
	$xpdf->SetXY(5,60);$xpdf->Cell(5,5,'No',1,0,'C');	
	$xpdf->SetXY(10,60);$xpdf->Cell(10,5,'CODIGO',1,0,'C');	
	$xpdf->SetXY(20,60);$xpdf->Cell(40,5,'NOMBRE',1,0,'C');	
	$xpdf->SetXY(60,60);$xpdf->Cell(10,5,'GRADO',1,0,'C');	
	$xpdf->SetXY(70,60);$xpdf->Cell(70,5,'DIRECCION',1,0,'C');

	//$xpdf->SetXY(140,55);$xpdf->Cell(35,5,'BARRIO',1,0,'C');	
	//$xpdf->SetXY(175,55);$xpdf->Cell(30,5,'CELULAR',1,0,'C');	
	//$xpdf->SetXY(205,55);$xpdf->Cell(45,5,'NOMBRE ACUDIENTE',1,0,'C');	
	$xpdf->SetXY(140,60);$xpdf->Cell(20,5,'RECORRIDO',1,0,'C');

	// celdas de chequeo
	$xpdf->SetFillColor(218, 240, 193);	
	$coldesde = 160;
	while($coldesde<=265){
		$xpdf->SetXY($coldesde,55);$xpdf->Cell(10,5,'',1,0,'C');
		$xpdf->SetXY($coldesde,60);$xpdf->Cell(5,5,'AM',1,0,'C',true);
		$xpdf->SetXY($coldesde+5,60);$xpdf->Cell(5,5,'PM',1,0,'C');
		$coldesde = $coldesde + 10;		
	}
	$xpdf->SetFillColor(255,255,255);

}

// funcion principal para impresion de un xcual
function principal($pdf, $cual, $pcolegio, $pconexion, $pfecha){
	$rs = mysqli_query($pconexion, "SELECT COUNT(*) cantidad FROM vst_listageneral 
									WHERE (ruta='$cual' OR mrutaam='$cual' OR mrutapm='$cual' OR ruta2da='$cual') AND 
									estado='A' AND colegio='$pcolegio' ");
	$row = mysqli_fetch_object($rs);

	$cantidad = $row->cantidad;

	// registros por pagina: cambie aqui el valor <----
	$regpag = 25;

	$totpaginas = ceil($cantidad/$regpag);
	$pagina = 1;

	$rs = mysqli_query($pconexion, "SELECT * FROM tbdatosveh WHERE ruta='$cual' AND colegio='$pcolegio' ");
	$veh = mysqli_fetch_object($rs);

	$sector = $veh->sector;
	$nombreconductor = $veh->nombreconductor;
	$celular = $veh->celular;
	$interno = $veh->interno;
	$nombreauxiliar = $veh->nombreauxiliar;
	$celularauxiliar = $veh->celularauxiliar;


	$pdf->AddPage('L','Letter');

	encabezado($pdf,$cual,$sector,$nombreconductor,$celular,$interno,$nombreauxiliar,$celularauxiliar,$cantidad,$totpaginas,
			   $pagina,$pcolegio,$pfecha);

	// datos de detalle
	$rs = mysqli_query($pconexion, "SELECT * FROM vst_listageneral 
									WHERE (ruta='$cual' OR mrutaam='$cual' OR mrutapm='$cual' OR ruta2da='$cual') AND 
									estado='A' AND colegio='$pcolegio' ORDER BY recorrido,CONVERT(codigo,unsigned) ");

	// numeracion de filas
	$indice = 1;
	$fila = 65;
	while($row = mysqli_fetch_object($rs)){
		$pdf->SetFont('Arial','',6);
		$pdf->SetXY(5,$fila);$pdf->Cell(5,5,$indice,1,0,'L');
		$pdf->SetXY(10,$fila);$pdf->Cell(10,5,$row->codigo,1,0,'L');	
		$pdf->SetXY(20,$fila);$pdf->Cell(40,5,utf8_decode($row->nombre),1,0,'L');	
		$pdf->SetXY(60,$fila);$pdf->Cell(10,5,$row->grado,1,0,'L');	
		$pdf->SetXY(70,$fila);$pdf->Cell(70,5,$row->direccion,1,0,'L');	

		//$pdf->SetXY(140,$fila);$pdf->Cell(35,5,$row->barrio,1,0,'L');	
		//$pdf->SetXY(175,$fila);$pdf->Cell(30,5,$row->celular1,1,0,'L');	
		//$pdf->SetXY(205,$fila);$pdf->Cell(45,5,utf8_decode($row->nombreacudiente),1,0,'L');	

		$xrecorrido = '';
		if($row->recorrido==1){
			$xrecorrido = 'RUTA COMPLETA';
		}else if($row->recorrido==2){
			$xrecorrido = 'MEDIA RUTA AM';
		}else if($row->recorrido==3){
			$xrecorrido = 'MEDIA RUTA PM';
		}else if($row->recorrido==4){
			$xrecorrido = 'DOS DIRECCION';

			// si es doble direccion
			$pdf->SetXY(140,$fila);$pdf->Cell(20,5,$xrecorrido,1,0,'L');

			// celdas de chequeo
			$pdf->SetFillColor(218, 240, 193);
			$coldesde = 160;
			while($coldesde<=265){
				$pdf->SetXY($coldesde,$fila);$pdf->Cell(5,5,'',1,0,'C',true);
				$pdf->SetXY($coldesde+5,$fila);$pdf->Cell(5,5,'',1,0,'C');		
				$coldesde = $coldesde + 10;
			}
			$pdf->SetFillColor(255,255,255);			
			
			$fila = $fila + 5;

			$pdf->SetXY(5,$fila);$pdf->Cell(5,5,'',1,0,'L');
			$pdf->SetXY(10,$fila);$pdf->Cell(10,5,'',1,0,'L');	
			$pdf->SetXY(20,$fila);$pdf->Cell(40,5,'',1,0,'L');	
			$pdf->SetXY(60,$fila);$pdf->Cell(10,5,'',1,0,'L');	
			$pdf->SetXY(70,$fila);$pdf->Cell(70,5,$row->direccion2,1,0,'L');			

			//$pdf->SetXY(140,$fila);$pdf->Cell(35,5,$row->barrio2,1,0,'L');	
			//$pdf->SetXY(175,$fila);$pdf->Cell(30,5,'',1,0,'L');	
			//$pdf->SetXY(205,$fila);$pdf->Cell(45,5,'',1,0,'L');	
			
		}

		$pdf->SetXY(140,$fila);$pdf->Cell(20,5,$xrecorrido,1,0,'L');

		// celdas de chequeo
		$pdf->SetFillColor(218, 240, 193);
		$coldesde = 160;
		while($coldesde<=265){
			$pdf->SetXY($coldesde,$fila);$pdf->Cell(5,5,'',1,0,'C',true);
			$pdf->SetXY($coldesde+5,$fila);$pdf->Cell(5,5,'',1,0,'C');		
			$coldesde = $coldesde + 10;
		}
		$pdf->SetFillColor(255,255,255);

		

		$indice = $indice + 1;
		$fila = $fila + 5;

		// 5 x 12 maximo numero de filas x hoja
		if($fila>60+($regpag*5)-5){
		//if($fila>180){
			$pdf->AddPage('L','Letter');

			$pagina = $pagina + 1;

			encabezado($pdf,$cual,$sector,$nombreconductor,$celular,$interno,$nombreauxiliar,$celularauxiliar,$cantidad,$totpaginas,
				$pagina,$pcolegio,$pfecha);

			$fila = 65;

		}
	}
}


$jpdf = new PDF_Code128();

// imprimir todas las hojas de registros activos
if($xcual!='*'){
	principal($jpdf,$xcual,$xcolegio,$conexion,$wfecha);

}else {
	$rs = mysqli_query($conexion, "SELECT DISTINCT ruta FROM vst_listageneral WHERE estado='A' AND colegio='$xcolegio' AND ruta!=''
		UNION
		SELECT DISTINCT mrutaam FROM vst_listageneral WHERE estado='A' AND colegio='$xcolegio' AND mrutaam!=''
		UNION
		SELECT DISTINCT mrutapm FROM vst_listageneral WHERE estado='A' AND colegio='$xcolegio' AND mrutapm!=''
		UNION
		SELECT DISTINCT ruta2da FROM vst_listageneral WHERE estado='A' AND colegio='$xcolegio' AND ruta2da!=''
		ORDER BY CONVERT(ruta,unsigned) ");

	while($row = mysqli_fetch_object($rs)){
		// solo por makeup la siguiente linea
		$xcual = $row->ruta;
		principal($jpdf,$xcual,$xcolegio,$conexion,$wfecha);

	}

}


$jpdf->Output();

?>