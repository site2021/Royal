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


function encabezado($xpdf,$wcual,$pnombreconductor,$pinterno,$pcantidad,
	$ptotpaginas,$ppagina,$pcolegio,$pfecha){

	// logo
	if ($pcolegio != 'LICEO MERANI'){
		$xpdf->Image('royal001.jpg',4,4,50);
	}
	else{
		$xpdf->Image('royaltour.jpg',4,4,50);
	}

	// logo-colegio	
	$xpdf->Image('../logos/'.$pcolegio.'.jpg',100,10,25);

	// fecha de impresion --------------------------------------------------------------------
	$xpdf->SetFont('Arial','B',8);
	$xpdf->SetXY(5,25);$xpdf->Cell(100,5,'Pereira, '.$pfecha,0,0,'L');

	$xpdf->SetFont('Arial','B',8);

	// numeracion de paginas
	$xpdf->SetXY(190,5);$xpdf->Cell(80,5,utf8_decode('página: ').$ppagina.'/'.$ptotpaginas,0,0,'R');

	// titulos
	$xpdf->SetFont('Arial','B',14);
	$xpdf->SetXY(170,10);$xpdf->Cell(40,10,'DESINFECCION DE VEHICULOS',0,0,'C');
	$xpdf->SetFont('Arial','B',8);
	$xpdf->SetXY(124,38);$xpdf->Cell(78,0,'REALIZADO POR:',0,0,'C');
	$xpdf->SetXY(176,40);$xpdf->Cell(60,0,'',1,0,'C');

	// casilla para el colegio
	$xpdf->SetFont('Arial','B',8); 
	$xpdf->SetXY(5,45);$xpdf->Cell(15,5,'COLEGIO',1,0,'L');	
	// celdas para mes y quincena
	$xpdf->SetXY(60,45);$xpdf->Cell(10,5,'MES',1,0,'L');	
	$xpdf->SetXY(70,45);$xpdf->Cell(25,5,'',1,0,'L');

	// datos del colegio
	$xpdf->SetXY(20,45);$xpdf->Cell(40,5,$pcolegio,1,0,'L');

	// Encabezados de detalle
	$xpdf->SetFont('Arial','',7);
	$xpdf->SetXY(5,60);$xpdf->Cell(5,5,'No',1,0,'C');	
	$xpdf->SetXY(10,60);$xpdf->Cell(10,5,'INT',1,0,'C');	
	$xpdf->SetXY(20,60);$xpdf->Cell(40,5,'NOMBRE',1,0,'C');

	// celdas de chequeo
	$xpdf->SetFillColor(218, 240, 193);	
	$coldesde = 60;
	while($coldesde<=265){
		$xpdf->SetXY($coldesde,55);$xpdf->Cell(10,5,'',1,0,'C');
		// $xpdf->SetXY($coldesde+5,55);$xpdf->Cell(5,5,'2',1,0,'C');
		$xpdf->SetXY($coldesde,60);$xpdf->Cell(10,5,'',1,0,'C');
		// $xpdf->SetXY($coldesde+5,60);$xpdf->Cell(5,5,'4',1,0,'C');
		$coldesde = $coldesde + 10;		
	}
	$xpdf->SetFillColor(255,255,255);

}

// funcion principal para impresion de un xcual
function principal($pdf, $cual, $pcolegio, $pconexion, $pfecha){
	$rs = mysqli_query($pconexion, "SELECT COUNT(*) cantidad FROM tbdatosveh 
									WHERE colegio='$pcolegio'");
	$row = mysqli_fetch_object($rs);

	$cantidad = $row->cantidad;

	// registros por pagina: cambie aqui el valor <----
	$regpag = 25;

	$totpaginas = ceil($cantidad/$regpag);
	$pagina = 1;

	$rs = mysqli_query($pconexion, "SELECT DISTINCT interno,nombreconductor FROM tbdatosveh WHERE ruta='$cual' AND colegio='$pcolegio' AND interno!=''");
	$veh = mysqli_fetch_object($rs);

	$nombreconductor = $veh->nombreconductor;
	$interno = $veh->interno;


	$pdf->AddPage('L','Letter');

	encabezado($pdf,$cual,$nombreconductor,$interno,$cantidad,$totpaginas,
			   $pagina,$pcolegio,$pfecha);

	// datos de detalle
	$rs = mysqli_query($pconexion, "SELECT * FROM tbdatosveh 
									WHERE colegio='$pcolegio' ORDER BY convert(ruta, unsigned integer)");

	// numeracion de filas
	$indice = 1;
	$fila = 65;
	while($row = mysqli_fetch_object($rs)){
		$pdf->SetFont('Arial','',6);
		$pdf->SetXY(5,$fila);$pdf->Cell(5,5,$indice,1,0,'L');
		$pdf->SetXY(10,$fila);$pdf->Cell(10,5,$row->interno,1,0,'L');	
		$pdf->SetXY(20,$fila);$pdf->Cell(40,5,utf8_decode($row->nombreconductor),1,0,'L');
		
		// celdas de chequeo
		$pdf->SetFillColor(218, 240, 193);
		$coldesde = 60;
		while($coldesde<=265){
			$pdf->SetXY($coldesde,$fila);$pdf->Cell(10,5,'',1,0,'C');
			// $pdf->SetXY($coldesde+5,$fila);$pdf->Cell(5,5,'6',1,0,'C');		
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

			encabezado($pdf,$cual,$nombreconductor,$interno,$cantidad,$totpaginas,$pagina,$pcolegio,$pfecha);

			$fila = 65;
		}
	}
}

$jpdf = new PDF_Code128();

// imprimir todas las hojas de registros activos
if($xcual!='*'){
	principal($jpdf,$xcual,$xcolegio,$conexion,$wfecha);

}else {
	$rs = mysqli_query($conexion, "SELECT DISTINCT interno FROM tbdatosveh WHERE colegio='$xcolegio' AND interno!='' ORDER BY convert(ruta, unsigned integer)");

	while($row = mysqli_fetch_object($rs)){
		// solo por makeup la siguiente linea
		$xcual = $row->ruta;
		principal($jpdf,$xcual,$xcolegio,$conexion,$wfecha);
	}
}

$jpdf->Output();

?>