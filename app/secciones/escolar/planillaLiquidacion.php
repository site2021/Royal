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
$xmes = $_REQUEST['mes'];
$xcual = $_REQUEST['cual'];
$xarchi = $_REQUEST['archi'];

// datos de conteo de recorridos
$xl001 = $_REQUEST['l001'];
$xl002 = $_REQUEST['l002'];
$xl003 = $_REQUEST['l003'];
$xl004 = $_REQUEST['l004'];

// datos de conteo de recorridos
$xp001 = $_REQUEST['p001'];
$xp002 = $_REQUEST['p002'];
$xp003 = $_REQUEST['p003'];
$xp004 = $_REQUEST['p004'];

// datos de valores de liquidacion
$xst001 = $_REQUEST['st001'];
$xst002 = $_REQUEST['st002'];
$xst003 = $_REQUEST['st003'];
$xst004 = $_REQUEST['st004'];
$xst005 = $_REQUEST['st005'];
$xst006 = $_REQUEST['st006'];
$xst007 = $_REQUEST['st007'];

function encabezado($xpdf,$wcual,$psector,$pnombreconductor,$pcelular,$pinterno,$pnombreauxiliar,$pcelularauxiliar,$pcantidad,
	$ptotpaginas,$ppagina,$pcolegio,$pfecha,$pmes){

	// logo
	$xpdf->Image('royal001.jpg',4,4,50);

	// logo-colegio	
	$xpdf->Image('../logos/'.$pcolegio.'.jpg',100,10,25);	

	// fecha de impresion --------------------------------------------------------------------
	$xpdf->SetFont('Arial','B',8);
	$xpdf->SetXY(5,25);$xpdf->Cell(100,5,'Pereira, '.$pfecha,0,0,'L');

	// Titulo de la planilla
	$xpdf->SetXY(5,35);$xpdf->Cell(100,5,'PLANILLA DE LIQUIDACION DE RUTA',0,0,'L');

	$xpdf->SetFont('Arial','B',8);

	// numeracion de paginas
	//$xpdf->SetXY(190,5);$xpdf->Cell(80,5,utf8_decode('página: ').$ppagina.'/'.$ptotpaginas,0,0,'R');

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
	// celdas para mes
	$xpdf->SetXY(60,45);$xpdf->Cell(10,5,'MES',1,0,'L');	


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
	// datos del mes	
	$xpdf->SetXY(70,45);$xpdf->Cell(40,5,$pmes,1,0,'L');

	// Encabezados de detalle
	$xpdf->SetFont('Arial','',7);
	$xpdf->SetXY(5,55);$xpdf->Cell(5,5,'No',1,0,'C');	
	$xpdf->SetXY(10,55);$xpdf->Cell(20,5,'PAGO',1,0,'C');	
	$xpdf->SetXY(30,55);$xpdf->Cell(20,5,'CODIGO',1,0,'C');	
	$xpdf->SetXY(50,55);$xpdf->Cell(40,5,'NOMBRE',1,0,'C');	
	$xpdf->SetXY(90,55);$xpdf->Cell(30,5,'RECORRIDO',1,0,'C');
	$xpdf->SetXY(120,55);$xpdf->Cell(20,5,'VIGENTE',1,0,'C');
	$xpdf->SetXY(140,55);$xpdf->Cell(20,5,'PAGO',1,0,'C');
	$xpdf->SetXY(160,55);$xpdf->Cell(20,5,'DIFERENCIA',1,0,'C');
	$xpdf->SetXY(180,55);$xpdf->Cell(20,5,'ASOCIADO',1,0,'C');
	$xpdf->SetXY(200,55);$xpdf->Cell(70,5,'OBSERVACION',1,0,'C');
	
}

// funcion principal para impresion de un xcual
function principal($pdf, $cual, $pcolegio, $pconexion, $pfecha, $pmes, $pl001, $pl002, $pl003, $pl004,
				   $pp001, $pp002, $pp003, $pp004,
				   $pst001,$pst002,$pst003,$pst004,$pst005,$pst006,$pst007){

	$rs = mysqli_query($pconexion, "SELECT COUNT(*) FROM vst_liquidacion_rutas WHERE colegio='$pcolegio' 
									AND mes='$pmes' AND ruta='$cual' AND estado='X' ");
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

	encabezado($pdf,$cual,$sector,$nombreconductor,$celular,$interno,$nombreauxiliar,$celularauxiliar,
			   $cantidad,$totpaginas,$pagina,$pcolegio,$pfecha,$pmes);

	// datos de detalle
	$rs = mysqli_query($pconexion, "SELECT * FROM vst_liquidacion_rutas WHERE colegio='$pcolegio' AND mes='$pmes'
							   AND ruta='$cual' AND estado='X' ");

	// numeracion de filas
	$indice = 1;
	$fila = 60;
	while($row = mysqli_fetch_object($rs)){
		$pdf->SetFont('Arial','',6);
		$pdf->SetXY(5,$fila);$pdf->Cell(5,5,$indice,1,0,'L');		
		$pdf->SetXY(10,$fila);$pdf->Cell(20,5,$row->fechapago,1,0,'L');	
		$pdf->SetXY(30,$fila);$pdf->Cell(20,5,$row->codigo,1,0,'L');	
		$pdf->SetXY(50,$fila);$pdf->Cell(40,5,utf8_decode($row->nombre),1,0,'L');
		$pdf->SetXY(90,$fila);$pdf->Cell(30,5,$row->recorrido,1,0,'L');	

		// tarifas
		$pdf->SetXY(120,$fila);$pdf->Cell(20,5,number_format($row->tarifabl),1,0,'R');
		$pdf->SetXY(140,$fila);$pdf->Cell(20,5,number_format($row->pago),1,0,'R');	
		$pdf->SetXY(160,$fila);$pdf->Cell(20,5,number_format($row->diferencia),1,0,'R');	
		$pdf->SetXY(180,$fila);$pdf->Cell(20,5,number_format($row->tarifaaso),1,0,'R');	

		// observacion para rellenar hasta el tope
		$pdf->SetXY(200,$fila);$pdf->Cell(70,5,$row->observacion,1,0,'L');

		$indice = $indice + 1;
		$fila = $fila + 5;

		// 5 x 12 maximo numero de filas x hoja
		if($fila>60+($regpag*5)-5){
		//if($fila>180){
			$pdf->AddPage('L','Letter');

			$pagina = $pagina + 1;

			encabezado($pdf,$cual,$sector,$nombreconductor,$celular,$interno,$nombreauxiliar,$celularauxiliar,$cantidad,$totpaginas,$pagina,$pcolegio,$pfecha,$pmes);

			$fila = 60;

		}
	}

	// adicionar nueva pagina para totales
	$pdf->AddPage('L','Letter');

	// impresion de totales
	// ojo guardar valor de fila para la otra columna 
	$fila_old = $fila;

	// reiniciar $fila, se deja valores anteriores como referencia
	$fila = 15;
	$fila_old = 15;

	// titulo hoja de valores
	// Titulo de la planilla
	$pdf->SetFont('Arial','B',8);	
	$pdf->SetXY(20,$fila);$pdf->Cell(100,5,'VALORES LIQUIDADOS',0,0,'L');

	$pdf->SetFont('Arial','',6);

	$fila = $fila + 10;
	$pdf->SetFont('Arial','B',7);
	$pdf->SetXY(20,$fila);$pdf->Cell(60,5,'LIQUIDADOS',1,0,'C');
	$pdf->SetFont('Arial','',7);
	$fila = $fila + 5;
	$pdf->SetXY(20,$fila);$pdf->Cell(30,5,'RUTA COMPLETA',1,0,'L');
	$pdf->SetXY(50,$fila);$pdf->Cell(30,5,$pl001,1,0,'C');
	$fila = $fila + 5;
	$pdf->SetXY(20,$fila);$pdf->Cell(30,5,'MEDIA RUTA AM',1,0,'L');
	$pdf->SetXY(50,$fila);$pdf->Cell(30,5,$pl002,1,0,'C');
	$fila = $fila + 5;
	$pdf->SetXY(20,$fila);$pdf->Cell(30,5,'MEDIA RUTA PM',1,0,'L');
	$pdf->SetXY(50,$fila);$pdf->Cell(30,5,$pl003,1,0,'C');
	$fila = $fila + 5;
	$pdf->SetXY(20,$fila);$pdf->Cell(30,5,'DOS DIRECCIONES',1,0,'L');
	$pdf->SetXY(50,$fila);$pdf->Cell(30,5,$pl004,1,0,'C');

	$fila = $fila + 10;
	$pdf->SetFont('Arial','B',7);
	$pdf->SetXY(20,$fila);$pdf->Cell(60,5,'PENDIENTES POR LIQUIDAR',1,0,'C');
	$pdf->SetFont('Arial','',7);
	$fila = $fila + 5;
	$pdf->SetXY(20,$fila);$pdf->Cell(30,5,'RUTA COMPLETA',1,0,'L');
	$pdf->SetXY(50,$fila);$pdf->Cell(30,5,$pp001,1,0,'C');
	$fila = $fila + 5;
	$pdf->SetXY(20,$fila);$pdf->Cell(30,5,'MEDIA RUTA AM',1,0,'L');
	$pdf->SetXY(50,$fila);$pdf->Cell(30,5,$pp002,1,0,'C');
	$fila = $fila + 5;
	$pdf->SetXY(20,$fila);$pdf->Cell(30,5,'MEDIA RUTA PM',1,0,'L');
	$pdf->SetXY(50,$fila);$pdf->Cell(30,5,$pp003,1,0,'C');
	$fila = $fila + 5;
	$pdf->SetXY(20,$fila);$pdf->Cell(30,5,'DOS DIRECCIONES',1,0,'L');
	$pdf->SetXY(50,$fila);$pdf->Cell(30,5,$pp004,1,0,'C');

	$wfila = $fila;

	// subtotales
	$fila = $fila_old + 10;
	$pdf->SetXY(180,$fila);$pdf->Cell(30,5,'Valor Subtotal',1,0,'C');
	$pdf->SetXY(210,$fila);$pdf->Cell(30,5,number_format($pst001),1,0,'R');
	$fila = $fila + 5;
	$pdf->SetXY(180,$fila);$pdf->Cell(30,5,'Comision Royal',1,0,'C');
	$pdf->SetXY(210,$fila);$pdf->Cell(30,5,number_format($pst002),1,0,'R');
	$fila = $fila + 5;
	$pdf->SetXY(180,$fila);$pdf->Cell(30,5,'Retencion en la fuente',1,0,'C');
	$pdf->SetXY(210,$fila);$pdf->Cell(30,5,number_format($pst003),1,0,'R');
	$fila = $fila + 5;
	$pdf->SetXY(180,$fila);$pdf->Cell(30,5,'Transferencia/Cheque',1,0,'C');
	$pdf->SetXY(210,$fila);$pdf->Cell(30,5,number_format($pst004),1,0,'R');
	$fila = $fila + 5;
	$pdf->SetXY(180,$fila);$pdf->Cell(30,5,'4 x 1000',1,0,'C');
	$pdf->SetXY(210,$fila);$pdf->Cell(30,5,number_format($pst005),1,0,'R');
	$fila = $fila + 5;
	$pdf->SetXY(180,$fila);$pdf->Cell(30,5,'Subsidio Ruta',1,0,'C');
	$pdf->SetXY(210,$fila);$pdf->Cell(30,5,number_format($pst006),1,0,'R');

	$fila = $fila + 10;
	$pdf->SetXY(180,$fila);$pdf->Cell(30,5,'Total a Pagar',1,0,'C');
	$pdf->SetXY(210,$fila);$pdf->Cell(30,5,number_format($pst007),1,0,'R');

	// impresion de estudiantes pendientes
	$fila = $wfila + 15;
	$pdf->SetFont('Arial','B',8);	
	$pdf->SetXY(20,$fila);$pdf->Cell(100,5,'LISTADO DE ESTUDIANTES PENDIENTES',0,0,'L');

	$pdf->SetFont('Arial','',6);

	$fila = $fila + 10;

	// datos de detalle
	$rs = mysqli_query($pconexion, "SELECT l.colegio,'' fecha,l.codigo,l.nombre,re.nombre recorrido,
			l.ruta,g.nombre grado,l.tarifav tarifabl,ifnull(pagos(l.codigo,'$pmes'),0) pago,
			l.tarifav-ifnull(pagos(l.codigo,'$pmes'),0) diferencia, '$pmes' mes, '' observacion
			FROM tblistageneralnew l,
			tbgrados g,
			txrecorridos re
			WHERE l.grado = g.id 
			AND l.recorrido = re.id AND l.estado='A'
			AND l.colegio = '$pcolegio' 
			AND (l.ruta='$cual' OR l.mrutaam='$cual' OR l.mrutapm='$cual' OR l.ruta2da='$cual')
			AND l.tarifav-ifnull(pagos(l.codigo,'$pmes'),0)>0
			ORDER BY convert(l.codigo,unsigned)");

	// titulos del listado
	$pdf->SetFont('Arial','B',6);
	$pdf->SetXY(20,$fila);$pdf->Cell(5,5,'No',1,0,'C');		
	$pdf->SetXY(25,$fila);$pdf->Cell(20,5,'CODIGO',1,0,'C');	
	$pdf->SetXY(45,$fila);$pdf->Cell(40,5,'NOMBRE',1,0,'C');
	$pdf->SetXY(85,$fila);$pdf->Cell(30,5,'RECORRIDO',1,0,'C');	
	$pdf->SetXY(115,$fila);$pdf->Cell(10,5,'GRADO',1,0,'C');
	$pdf->SetXY(125,$fila);$pdf->Cell(20,5,'TARIFA',1,0,'C');
	$pdf->SetXY(145,$fila);$pdf->Cell(20,5,'PAGO',1,0,'C');
	$pdf->SetXY(165,$fila);$pdf->Cell(20,5,'DIFERENCIA',1,0,'C');
	$fila = $fila + 5;

	// numeracion de filas
	$indice = 1;	
	while($row = mysqli_fetch_object($rs)){
		$pdf->SetFont('Arial','',6);
		$pdf->SetXY(20,$fila);$pdf->Cell(5,5,$indice,1,0,'L');		
		$pdf->SetXY(25,$fila);$pdf->Cell(20,5,$row->codigo,1,0,'L');	
		$pdf->SetXY(45,$fila);$pdf->Cell(40,5,utf8_decode($row->nombre),1,0,'L');
		$pdf->SetXY(85,$fila);$pdf->Cell(30,5,$row->recorrido,1,0,'L');	
		$pdf->SetXY(115,$fila);$pdf->Cell(10,5,$row->grado,1,0,'L');
		$pdf->SetXY(125,$fila);$pdf->Cell(20,5,number_format($row->tarifabl),1,0,'R');
		$pdf->SetXY(145,$fila);$pdf->Cell(20,5,number_format($row->pago),1,0,'R');
		$pdf->SetXY(165,$fila);$pdf->Cell(20,5,number_format($row->diferencia),1,0,'R');

		$indice = $indice + 1;

		$fila = $fila + 5;

	}

}


$jpdf = new PDF_Code128();

// imprimir todas las hojas de registros activos
if($xcual!='*'){
	principal($jpdf,$xcual,$xcolegio,$conexion,$wfecha,$xmes,$xl001,$xl002,$xl003,$xl004,
			  $xp001,$xp002,$xp003,$xp004,
			  $xst001,$xst002,$xst003,$xst004,$xst005,$xst006,$xst007);

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
		principal($jpdf,$xcual,$xcolegio,$conexion,$wfecha,$xmes);

	}

}

// validar generacion de archivo - planilla
if($xarchi=='si'){
	$narchi = $xcolegio.'-'.$xcual.'-'.$xmes.'.pdf';
	$jpdf->Output('planillas/'.$narchi);
}

$jpdf->Output();

?>