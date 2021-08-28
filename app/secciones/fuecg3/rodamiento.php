<?php
require('code128-rev.php');

include '../../control/conex.php';

// configuracion de la zona regional 
date_default_timezone_set('america/bogota');
setlocale(LC_ALL,”es_ES”);

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$wfecha =  htmlspecialchars($dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')." ( ".date("H:i:s")." )");

function encabezado($xpdf,$ptotpaginas,$ppagina,$pfecha){

	$xiniciorodamiento = $_REQUEST['iniciorodamiento'];
	$xfinrodamiento = $_REQUEST['finrodamiento'];
	// logo
	$xpdf->Image('img/g3logo.jpg',4,4,50);
	// fecha de impresion --------------------------------------------------------------------
	$xpdf->SetFont('Arial','B',8);
	$xpdf->SetXY(5,26);$xpdf->Cell(100,5,'Pereira, '.$pfecha,0,0,'L');
	// numeracion de paginas
	$xpdf->SetXY(190,5);$xpdf->Cell(80,5,utf8_decode('página: ').$ppagina.'/'.$ptotpaginas,0,0,'R');

	$xpdf->SetXY(214,26);$xpdf->Cell(100,5,'Desde el '.$xiniciorodamiento.' hasta el '.$xfinrodamiento,0,0,'L');
	$xpdf->SetFont('Arial','B',15);
	$xpdf->SetXY(5,18);$xpdf->Cell(270,5,'PLAN DE RODAMIENTO EJECUTADO',0,0,'C');

	$xpdf->SetFont('Arial','B',10);
	$xpdf->SetXY(5,38);$xpdf->Cell(100,5,'CONTRATOS CON G3 TRAVEL S.A.S.',0,0,'L');
	// $xpdf->SetXY(150,38);$xpdf->Cell(100,5,'CONVENIOS EMPRESARIALES',0,0,'L');
	// Encabezados de detalle
	$xpdf->SetFont('Arial','B',7);
	$xpdf->SetXY(5,45);$xpdf->Cell(4,5,'No',1,0,'C');	
	$xpdf->SetXY(9,45);$xpdf->Cell(10,5,'PLACA',1,0,'C');	
	$xpdf->SetXY(19,45);$xpdf->Cell(8,5,'INT',1,0,'C');	
	$xpdf->SetXY(27,45);$xpdf->Cell(7,5,'CTO',1,0,'C');	
	$xpdf->SetXY(34,45);$xpdf->Cell(75,5,'CLIENTE',1,0,'C');
	$xpdf->SetXY(109,45);$xpdf->Cell(18,5,'DIAS MTO',1,0,'C');
	$xpdf->SetXY(127,45);$xpdf->Cell(18,5,'DIAS VIAJE',1,0,'C');
	$xpdf->SetXY(145,45);$xpdf->Cell(65,5,'RECORRIDO INICIAL',1,0,'C');
	$xpdf->SetXY(210,45);$xpdf->Cell(65,5,'RECORRIDO FINAL',1,0,'C');
	$xpdf->SetXY(230,33);$xpdf->Cell(26,5,'VEHICULOS AFILIADOS:',0,0,'C');
	$xpdf->SetXY(232,38);$xpdf->Cell(26,5,'SUBCONTRATADOS:',0,0,'C');
}
// funcion principal para impresion de un xcual
function principal($pdf, $pconexion, $pfecha){

	$regpag = 65;

	$totpaginas = ceil($cantidad/$regpag);
	$pagina = 1;

	$pdf->AddPage('L','Letter');

	encabezado($pdf,$totpaginas,$pagina,$pfecha);

	$xiniciorodamiento = $_REQUEST['iniciorodamiento'];
	$xfinrodamiento = $_REQUEST['finrodamiento'];
	// datos de detalleg
	$rs = mysqli_query($pconexion, "SELECT DISTINCT(placa), interno, contrato, cliente, origen, destino, clase, fechainicio, fechafin FROM  `tbextractosg3` WHERE fechainicio BETWEEN  '$xiniciorodamiento' AND  '$xfinrodamiento' ORDER BY contrato ASC");

	// total planilla
	$totalplanilla = 0;
	// numeracion de filas
	$indice = 1;
	$fila = 50;	
	while($row = mysqli_fetch_object($rs)){
		$pdf->SetFont('Arial','',6);
		$pdf->SetXY(5,$fila);$pdf->Cell(4,5,$indice,1,0,'L');
		$pdf->SetXY(9,$fila);$pdf->Cell(10,5,$row->placa,1,0,'L');	
		$pdf->SetXY(19,$fila);$pdf->Cell(8,5,utf8_decode($row->interno),1,0,'L');	
		$pdf->SetXY(27,$fila);$pdf->Cell(7,5,$row->contrato,1,0,'L');	
		$pdf->SetXY(34,$fila);$pdf->Cell(75,5,$row->cliente,1,0,'L');

		if ($row->clase  == 'BUS') {
			$pdf->SetXY(109,$fila);$pdf->Cell(18,5,'33',1,0,'C');
		}
		elseif ($row->clase  == 'BUSETA') {
			$pdf->SetXY(109,$fila);$pdf->Cell(18,5,'21',1,0,'C');
		}
		elseif ($row->clase  == 'MICROBUS') {
			$pdf->SetXY(109,$fila);$pdf->Cell(18,5,'18',1,0,'C');
		}
		else{
			$pdf->SetXY(109,$fila);$pdf->Cell(18,5,'15',1,0,'C');
		}

		//defino fecha 1
		$fechainicio = new DateTime($row->fechainicio);
        $dia1 = $fechainicio->format('d');
        $mes1 = $fechainicio->format('m');
        $ano1 = $fechainicio->format('Y');

		//defino fecha 2
		$fechafin = new DateTime($row->fechafin);
        $dia2 = $fechafin->format('d');
        $mes2 = $fechafin->format('m');
        $ano2 = $fechafin->format('Y');

		//calculo timestam de las dos fechas
		$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
		$timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2);
		//resto a una fecha la otra
		$segundos_diferencia = $timestamp1 - $timestamp2;
		//echo $segundos_diferencia;
		//convierto segundos en días
		$dias_diferencia = $segundos_diferencia / (60 * 60 * 24);
		//obtengo el valor absoulto de los días (quito el posible signo negativo)
		$dias_diferencia = abs($dias_diferencia);
		//quito los decimales a los días de diferencia
		$dias_diferencia = floor($dias_diferencia+1);
		// echo $dias_diferencia;
	
		$pdf->SetXY(127,$fila);$pdf->Cell(18,5,$dias_diferencia,1,0,'C');

		$pdf->SetXY(145,$fila);$pdf->Cell(65,5,$row->origen,1,0,'L');
		$pdf->SetXY(210,$fila);$pdf->Cell(65,5,$row->destino,1,0,'L');

		// $pdf->SetXY(14,$fila);$pdf->Cell(65,5,$row->destino,1,0,'L');

		$indice = $indice + 1;
		$fila = $fila + 5;


		// 5 x 12 maximo numero de filas x hoja
		if($fila>50+($regpag*2)-2){
		//if($fila>180){
			$pdf->AddPage('L','Letter');
			$pdf->Image('img/g3logo.jpg',4,4,50);

			$pagina = $pagina + 1;

			$fila = 10;
		}
	}

	
	// CONTEO DE VEHICULOS AFILIADOS
	$conteoafiliados = mysqli_query($pconexion, "SELECT COUNT( DISTINCT (E.placa
	) ) sumaafiliados FROM tbextractosg3 E, tbvehiculosg3 V WHERE E.placa = V.placa AND V.tipovinculacion != 'CONVENIO EMPRESARIAL'  AND E.fechainicio >= '$xiniciorodamiento' AND E.fechafin <= '$xfinrodamiento'");

	$sumaafiliados = $row->sumaafiliados;

	while($row = mysqli_fetch_object($conteoafiliados)){
		$pdf->SetFont('Arial','',8);
		$pdf->SetXY(260,33);$pdf->Cell(15,5,$row->sumaafiliados,0,0,'L');

	}
	// CONTEO DE VEHICULOS SUBCONTRATADOS
	$conteosubcon = mysqli_query($pconexion, "SELECT COUNT( DISTINCT (E.placa
	) ) sumasubcon FROM tbextractosg3 E, tbvehiculosg3 V WHERE E.placa = V.placa AND V.tipovinculacion = 'CONVENIO EMPRESARIAL' AND E.fechainicio >= '2021-04-05' AND E.fechafin <= '2021-04-30'");

	$sumasubcon = $row->sumasubcon;

	while($row = mysqli_fetch_object($conteosubcon)){
		$pdf->SetFont('Arial','',8);
		$pdf->SetXY(260,38);$pdf->Cell(15,5,$row->sumasubcon,0,0,'L');

	}
	$pdf->AddPage('L','Letter');

	// datos de detalle
	$rs2 = mysqli_query($pconexion, "SELECT id,placa, interno, clase, enconvenio, inicioconvenio, finconvenio, origenconvenio, destinoconvenio FROM `tbconveniosempg3` WHERE finconvenio >= '$xiniciorodamiento' AND inicioconvenio <= '$xfinrodamiento' ORDER BY interno ASC");
 
	// numeracion de filas
	$indice = 1;
	$fila = 50;	
	
	$pdf->Image('img/g3logo.jpg',4,4,50);

	$pdf->SetFont('Arial','B',15);
	$pdf->SetXY(5,18);$pdf->Cell(270,5,'PLAN DE RODAMIENTO EJECUTADO',0,0,'C');
	$pdf->SetFont('Arial','B',8);
	$pdf->SetXY(214,26);$pdf->Cell(100,5,'Desde el '.$xiniciorodamiento.' hasta el '.$xfinrodamiento,0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,38);$pdf->Cell(100,5,'EN CONVENIO DE COLABORACION EMPRESARIAL',0,0,'L');

	$pdf->SetFont('Arial','B',7);
	$pdf->SetXY(5,45);$pdf->Cell(4,5,'No',1,0,'C');	
	$pdf->SetXY(9,45);$pdf->Cell(10,5,'PLACA',1,0,'C');	
	$pdf->SetXY(19,45);$pdf->Cell(8,5,'INT',1,0,'C');	
	// $pdf->SetXY(27,45);$pdf->Cell(7,5,'CTO',1,0,'C');	
	$pdf->SetXY(27,45);$pdf->Cell(82,5,'CONVENIO',1,0,'C');
	$pdf->SetXY(109,45);$pdf->Cell(18,5,'DIAS MTO',1,0,'C');
	$pdf->SetXY(127,45);$pdf->Cell(18,5,'DIAS VIAJE',1,0,'C');
	$pdf->SetXY(145,45);$pdf->Cell(65,5,'RECORRIDO INICIAL',1,0,'C');
	$pdf->SetXY(210,45);$pdf->Cell(65,5,'RECORRIDO FINAL',1,0,'C');
	$pdf->SetXY(232,38);$pdf->Cell(26,5,'EN CONVENIO:',0,0,'C');

	while($row = mysqli_fetch_object($rs2)){
		$pdf->SetFont('Arial','',6);

		$pdf->SetXY(5,$fila);$pdf->Cell(4,5,$indice,1,0,'L');
		$pdf->SetXY(9,$fila);$pdf->Cell(10,5,$row->placa,1,0,'L');	
		$pdf->SetXY(19,$fila);$pdf->Cell(8,5,utf8_decode($row->interno),1,0,'L');	
		$pdf->SetXY(27,$fila);$pdf->Cell(82,5,$row->enconvenio,1,0,'L');

		//DIAS DE VIAJE DE CONVENIOS EMPRESARIALES
		// CONDICION NUMERO 1
		if ($row->inicioconvenio < $xiniciorodamiento && $row->finconvenio > $xfinrodamiento){

			$xiniciorodamientocond1 = new DateTime($xiniciorodamiento);
	        $dia1cond1 = $xiniciorodamientocond1->format('d');
	        $mes1cond1 = $xiniciorodamientocond1->format('m');
	        $ano1cond1 = $xiniciorodamientocond1->format('Y');

			//defino fecha 2
			$xfinrodamientocond1 = new DateTime($xfinrodamiento);
	        $dia2cond1 = $xfinrodamientocond1->format('d');
	        $mes2cond1 = $xfinrodamientocond1->format('m');
	        $ano2cond1 = $xfinrodamientocond1->format('Y');

			$timestamp1cond1 = mktime(0,0,0,$mes1cond1,$dia1cond1,$ano1cond1);
			$timestamp2cond1 = mktime(4,12,0,$mes2cond1,$dia2cond1,$ano2cond1);
			
			$segundos_diferencia1 = $timestamp1cond1 - $timestamp2cond1;
			
			$dias_diferencia1 = $segundos_diferencia1 / (60 * 60 * 24);
			$dias_diferencia1 = abs($dias_diferencia1);
			$dias_diferencia1 = floor($dias_diferencia1+1);
			$pdf->SetXY(127,$fila);$pdf->Cell(18,5,$dias_diferencia1,1,0,'C');

		}

		// CONDICION NUMERO 2
		elseif($row->inicioconvenio < $xiniciorodamiento && $row->finconvenio < $xfinrodamiento){
			$xiniciorodamiento = $_REQUEST['iniciorodamiento'];

			$xinicioconveniocond2 = new DateTime($xiniciorodamiento);
	        $dia1cond2 = $xinicioconveniocond2->format('d');
	        $mes1cond2 = $xinicioconveniocond2->format('m');
	        $ano1cond2 = $xinicioconveniocond2->format('Y');

			//defino fecha 2
			$xfinconveniocond2 = new DateTime($row->finconvenio);
	        $dia2cond2 = $xfinconveniocond2->format('d');
	        $mes2cond2 = $xfinconveniocond2->format('m');
	        $ano2cond2 = $xfinconveniocond2->format('Y');

			$timestamp1cond2 = mktime(0,0,0,$mes1cond2,$dia1cond2,$ano1cond2);
			$timestamp2cond2 = mktime(4,12,0,$mes2cond2,$dia2cond2,$ano2cond2);
			
			$segundos_diferencia2 = $timestamp1cond2 - $timestamp2cond2;
			
			$dias_diferencia2 = $segundos_diferencia2 / (60 * 60 * 24);
			$dias_diferencia2 = abs($dias_diferencia2);
			$dias_diferencia2 = floor($dias_diferencia2+1);
			$pdf->SetXY(127,$fila);$pdf->Cell(18,5,$dias_diferencia2,1,0,'C');


			// $pdf->SetXY(120,$fila);$pdf->Cell(120,5,'SEGUNDA',1,0,'L');
		}
		// CONDICION NUMERO 3
		elseif($row->inicioconvenio > $xiniciorodamiento && $row->finconvenio > $xfinrodamiento){
			$xfinrodamiento = $_REQUEST['finrodamiento'];

			$xinicioconveniocond3 = new DateTime($row->inicioconvenio);
	        $dia1cond3 = $xinicioconveniocond3->format('d');
	        $mes1cond3 = $xinicioconveniocond3->format('m');
	        $ano1cond3 = $xinicioconveniocond3->format('Y');

			//defino fecha 2
			$xfinroda = new DateTime($xfinrodamiento);
	        $dia2cond3 = $xfinroda->format('d');
	        $mes2cond3 = $xfinroda->format('m');
	        $ano2cond3 = $xfinroda->format('Y');

			$timestamp1cond3 = mktime(0,0,0,$mes1cond3,$dia1cond3,$ano1cond3);
			$timestamp2cond3 = mktime(4,12,0,$mes2cond3,$dia2cond3,$ano2cond3);
			
			$segundos_diferencia3 = $timestamp1cond3 - $timestamp2cond3;
			
			$dias_diferencia3 = $segundos_diferencia3 / (60 * 60 * 24);
			$dias_diferencia3 = abs($dias_diferencia3);
			$dias_diferencia3 = floor($dias_diferencia3+1);
			$pdf->SetXY(127,$fila);$pdf->Cell(18,5,$dias_diferencia3,1,0,'C');
		}
		// CONDICION NUMERO 4
		elseif($row->inicioconvenio > $xiniciorodamiento || $row->finconvenio < $xfinrodamiento){
			$xfinrodamiento = $_REQUEST['finrodamiento'];

			$xinicioconveniocond4 = new DateTime($row->inicioconvenio);
	        $dia1cond4 = $xinicioconveniocond4->format('d');
	        $mes1cond4 = $xinicioconveniocond4->format('m');
	        $ano1cond4 = $xinicioconveniocond4->format('Y');

			//defino fecha 2
			$xfinconvenio = new DateTime($row->finconvenio);
	        $dia2cond4 = $xfinconvenio->format('d');
	        $mes2cond4 = $xfinconvenio->format('m');
	        $ano2cond4 = $xfinconvenio->format('Y');

			$timestamp1cond4 = mktime(0,0,0,$mes1cond4,$dia1cond4,$ano1cond4);
			$timestamp2cond4 = mktime(4,12,0,$mes2cond4,$dia2cond4,$ano2cond4);
			
			$segundos_diferencia4 = $timestamp1cond4 - $timestamp2cond4;
			
			$dias_diferencia4 = $segundos_diferencia4 / (60 * 60 * 24);
			$dias_diferencia4 = abs($dias_diferencia4);
			$dias_diferencia4 = floor($dias_diferencia4+1);
			$pdf->SetXY(127,$fila);$pdf->Cell(18,5,$dias_diferencia4,1,0,'C');
		}
		else{
			$pdf->SetXY(127,$fila);$pdf->Cell(18,5,'',1,0,'C');
		}

		//DIAS DE MANTENIMIENTO DE CONTRATOS EMPRESARIALES

		if ($row->clase  == 'BUS') {
			$pdf->SetXY(109,$fila);$pdf->Cell(18,5,'33',1,0,'C');
		}
		elseif ($row->clase  == 'BUSETA') {
			$pdf->SetXY(109,$fila);$pdf->Cell(18,5,'21',1,0,'C');
		}
		elseif ($row->clase  == 'MICROBUS') {
			$pdf->SetXY(109,$fila);$pdf->Cell(18,5,'18',1,0,'C');
		}
		else{
			$pdf->SetXY(109,$fila);$pdf->Cell(18,5,'15',1,0,'C');
		}

		$pdf->SetXY(145,$fila);$pdf->Cell(65,5,$row->origenconvenio,1,0,'L');
		$pdf->SetXY(210,$fila);$pdf->Cell(65,5,$row->destinoconvenio,1,0,'L');

		$indice = $indice + 1;
		$fila = $fila + 5;

		// 5 x 12 maximo numero de filas x hoja
		if($fila>50+($regpag*5)-5){
		//if($fila>180){
			$pdf->AddPage('L','Letter');

			$pagina = $pagina + 1;

			$fila = 50;
		}
	}

	// CONTEO DE VEHICULOS CON CONVENIO
	$conteoconvenio = mysqli_query($pconexion, "SELECT COUNT( DISTINCT (placa
	) ) sumasconvenio FROM `tbconveniosempg3` WHERE finconvenio >= '2021-04-05' AND inicioconvenio <= '2021-04-30'");

	$sumasconvenio = $row->sumasconvenio;

	while($row = mysqli_fetch_object($conteoconvenio)){
		$pdf->SetFont('Arial','',8);
		$pdf->SetXY(260,38);$pdf->Cell(15,5,$row->sumasconvenio,0,0,'L');

	}

	$pdf->AddPage('L','Letter');

	$rs3 = mysqli_query($pconexion, "SELECT placa, interno
		FROM tbvehiculosg3
		WHERE tipovinculacion != 'CONVENIO EMPRESARIAL'
		AND NOT
		EXISTS (

		SELECT placa, interno
		FROM tbconveniosempg3
		WHERE tbvehiculosg3.placa = tbconveniosempg3.placa
		UNION ALL SELECT placa, interno
		FROM tbextractosg3
		WHERE tbvehiculosg3.placa = tbextractosg3.placa
		)");


	// $rs3 = mysqli_query($pconexion, "SELECT placa, interno
	// 	FROM tbvehiculosg3
	// 	WHERE tipovinculacion != 'CONVENIO EMPRESARIAL'
	// 	AND NOT
	// 	EXISTS (

	// 	SELECT placa, interno
	// 	FROM tbconveniosempg3
	// 	WHERE tbvehiculosg3.placa = tbconveniosempg3.placa
	// 	UNION ALL SELECT placa, interno
	// 	FROM tbextractosg3
	// 	WHERE tbvehiculosg3.placa = tbextractosg3.placa
	// 	)");
 
	// numeracion de filas
	$indice = 1;
	$fila = 50;	
	
	$pdf->Image('img/g3logo.jpg',4,4,50);

	$pdf->SetFont('Arial','B',15);
	$pdf->SetXY(5,18);$pdf->Cell(270,5,'PLAN DE RODAMIENTO EJECUTADO',0,0,'C');
	$pdf->SetFont('Arial','B',8);
	$pdf->SetXY(214,26);$pdf->Cell(100,5,'Desde el '.$xiniciorodamiento.' hasta el '.$xfinrodamiento,0,0,'L');
	$pdf->SetXY(232,38);$pdf->Cell(26,5,'TOTAL VEHICULOS:',0,0,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,38);$pdf->Cell(100,5,'VEHICULOS SIN FUEC NI CONVENIO',0,0,'L');

	$pdf->SetFont('Arial','B',7);
	$pdf->SetXY(5,45);$pdf->Cell(10,5,'No',1,0,'C');	
	$pdf->SetXY(15,45);$pdf->Cell(15,5,'PLACA',1,0,'C');	
	$pdf->SetXY(30,45);$pdf->Cell(15,5,'INTERNO',1,0,'C');

	while($row = mysqli_fetch_object($rs3)){
		$pdf->SetFont('Arial','',6);

		$pdf->SetXY(5,$fila);$pdf->Cell(10,5,$indice,1,0,'C');
		$pdf->SetXY(15,$fila);$pdf->Cell(15,5,$row->placa,1,0,'C');	
		$pdf->SetXY(30,$fila);$pdf->Cell(15,5,utf8_decode($row->interno),1,0,'C');

		$indice = $indice + 1;
		$fila = $fila + 5;

		// 5 x 12 maximo numero de filas x hoja
		if($fila>50+($regpag*5)-5){
		//if($fila>180){
			$pdf->AddPage('L','Letter');

			$pagina = $pagina + 1;

			$fila = 50;
		}
	}

	// CONTEO DE VEHICULOS CON CONVENIO
	$conteosinexcon = mysqli_query($pconexion, "SELECT COUNT( DISTINCT (placa
	) ) sumasinexcon
		FROM tbvehiculosg3
		WHERE tipovinculacion != 'CONVENIO EMPRESARIAL'
		AND NOT
		EXISTS (

		SELECT placa, interno
		FROM tbconveniosempg3
		WHERE tbvehiculosg3.placa = tbconveniosempg3.placa
		UNION ALL SELECT placa, interno
		FROM tbextractosg3
		WHERE tbvehiculosg3.placa = tbextractosg3.placa
		)");

	$sumasinexcon = $row->sumasinexcon;

	while($row = mysqli_fetch_object($conteosinexcon)){
		$pdf->SetFont('Arial','',8);
		$pdf->SetXY(260,38);$pdf->Cell(15,5,$row->sumasinexcon,0,0,'L');

	}

}

$jpdf = new PDF_Code128();

// imprimir todas las hojas de registros activos
principal($jpdf,$conexion,$wfecha);

$jpdf->Output();

?>