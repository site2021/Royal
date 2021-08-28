<?php
require('code128-rev.php');

include '../app/control/conex.php';

// escribir(pdf, x, y, w, h, texto, [0-cell, 1-multiline], size, align, [style:bold,normal] )
function escribir($xpdf, $dondex, $dondey, $ancho, $alto, $texto, $opcion, $size, $align, $style, $recuadro, $fill){
	$xpdf->SetFont('Arial',$style,$size);	
	$xpdf->SetXY($dondex,$dondey);
	if($opcion==0){
		$xpdf->Cell($ancho,$alto,utf8_decode($texto),$recuadro,0,$align,$fill);	
	}else {
		$xpdf->multiCell($ancho,$alto,utf8_decode($texto),0,$align);
	}
	
}

// configuracion de la zona regional 
date_default_timezone_set('america/bogota');
setlocale(LC_ALL,”es_ES”);

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$wfecha =  htmlspecialchars($dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y'));


$xfecha = $_REQUEST['fecha'];
$xinterno = $_REQUEST['interno'];

$rs = mysqli_query($conexion, "SELECT * FROM tbconductores WHERE interno='$xinterno' ");
$row = mysqli_fetch_object($rs);

$xconductor = $row->conductor;
$xcedula = $row->cedulaconductor;
$xtipovehiculo = $row->clase;
$xfechaingreso = $row->fechaingreso;
$xsalarionum = $row->salarionum;
$xsalarioletra = $row->salarioletra;

$pdf = new PDF_Code128();
$pdf->AddPage('P','Letter');

// logo
$pdf->Image('img/royal001.jpg',5,5,50);

// logo paisaje cultural cafetero
$pdf->Image('img/pcc.jpg',180,5,30);

// logo gqlct
$pdf->Image('img/utp.JPG',145,11,30);

// logo diagonal
$pdf->Image('img/diagonal.JPG',208,78,7);

// pie de pagina
$pdf->Image('img/piepagina.JPG',0,252,216);

// escribir(pdf, x, y, w, h, texto, [0-cell, 1-multiline], size, align, [style:bold,normal] )
escribir($pdf,45,44,125,5,'LA LÍDER DE GESTIÓN HUMANA',0,14,'C','B',0,0);

escribir($pdf,45,49,134,5,'DE LA COOPERATIVA MULTIACTIVA DE TRANSPORTE ESPECIAL Y TURISMO ROYAL EXPRESS NIT:891.408.122-6',1,14,'C','B',0,0);

escribir($pdf,45,84,134,5,'CERTIFICA:',1,14,'C','B',0,0);
					

escribir($pdf,30,104,156,7,'Que el señor ' .$xconductor. ' identificado(a) con cédula de ciudadanía No. ' .($xcedula). '; labora con  la Cooperativa Royal Express como conductor, con un contrato laboral a término fijo desde  el ' .$xfechaingreso. ', devengando un salario de ($' .number_format($xsalarionum). ') ' .$xsalarioletra. ' M/CTE.',1,14,'J','',0,0);

escribir($pdf,30,154,156,7,'Para constancia se firma el ' .$wfecha. ', por solicitud del interesado.',1,14,'J','',0,0);

// firma gestion humana
$pdf->Image('img/firma.jpg',29,198,70);
escribir($pdf,31,210,156,7,'NATALIA CÁRDENAS QUIRAMA',1,12,'L','',0,0);
escribir($pdf,31,215,156,7,'Gestión Humana',1,12,'L','',0,0);

// titulos
// escribir($pdf,15,20,100,5,$wfecha,0,8,'L','B',0,0);

$fila = 55;
$res = mysqli_query($conexion, "SELECT * FROM tbalistadatos WHERE interno='$xinterno' AND fecha='$xfecha'");
while($row = mysqli_fetch_object($res)){
	// validar nivel de titulo
	if($row->nivel2=='0'){
		$pdf->SetFillColor(207, 252, 207);
		escribir($pdf,15,$fila,170,5,$row->nivel1.'-'.$row->detalle,0,8,'L','',1,1);
			
	}else {
		$pdf->SetFillColor(255,255,255);
		escribir($pdf,15,$fila,5,5,$row->nivel1,0,8,'L','',1,0);
		escribir($pdf,20,$fila,5,5,$row->nivel2,0,8,'L','',1,0);
		escribir($pdf,25,$fila,150,5,$row->detalle,0,8,'L','',1,0);
		escribir($pdf,175,$fila,5,5,$row->digitar,0,8,'L','',1,0);

		// imprimir calificacion
		if($row->contar==0){
			escribir($pdf,180,$fila,5,5,'',0,8,'L','',1,0);	
		}else {
			escribir($pdf,180,$fila,5,5,'X',0,8,'L','',1,0);
		}
		

	}
	
	$fila = $fila + 5;
	if($fila>250){
		$pdf->AddPage('P','Letter');
		$fila = 15;
	}
}

$pdf->Output();

?>