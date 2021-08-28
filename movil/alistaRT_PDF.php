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
 
$wfecha =  htmlspecialchars($dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')." ( ".date("H:i:s")." )");


$xfecha = $_REQUEST['fecha'];
$xinterno = $_REQUEST['interno'];

$rs = mysqli_query($conexion, "SELECT * FROM tbdatosveh WHERE interno='$xinterno' ");
$row = mysqli_fetch_object($rs);

$xnombre = $row->nombreconductor;
$xplaca = $row->placa;
$xcapacidad = $row->capacidad;


$pdf = new PDF_Code128();
$pdf->AddPage('P','Letter');

// marca de agua
$pdf->Image('img/royal002.jpeg',15,5,35);

// // logo
// $pdf->Image('img/aprobado.jpg',15,5,170);

// escribir(pdf, x, y, w, h, texto, [0-cell, 1-multiline], size, align, [style:bold,normal] )
escribir($pdf,55,8,100,5,'ALISTAMIENTO ('.$xinterno.')',0,12,'L','B',0,0);

// titulos
escribir($pdf,15,20,100,5,$wfecha,0,8,'L','B',0,0);
escribir($pdf,15,30,100,5,'CONDUCTOR',0,8,'L','B',0,0);
escribir($pdf,15,35,100,5,'FECHA',0,8,'L','B',0,0);
escribir($pdf,15,40,100,5,'PLACA',0,8,'L','B',0,0);
escribir($pdf,15,45,100,5,'CAPACIDAD',0,8,'L','B',0,0);

// datos para el titulo
escribir($pdf,35,30,100,5,': '.$xnombre,0,8,'L','',0,0);
escribir($pdf,35,35,100,5,': '.$xfecha,0,8,'L','',0,0);
escribir($pdf,35,40,100,5,': '.$xplaca,0,8,'L','',0,0);
escribir($pdf,35,45,100,5,': '.$xcapacidad,0,8,'L','',0,0);

// FIRMA JEFE MTO
$pdf->Image('img/jefemto.JPG',132,32,50);
escribir($pdf,125,42,100,5,'REVISADO POR JEFE DE MANTENIMIENTO ',0,8,'L','B',0,0);
escribir($pdf,125,45,100,5,'ROYAL TOUR PLUS S.A.S. ',0,8,'L','B',0,0);

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

// FIRMA JEFE MTO
$pdf->Image('img/jefemto.JPG',132,125,50);
escribir($pdf,125,135,100,5,'REVISADO POR JEFE DE MANTENIMIENTO ',0,8,'L','B',0,0);
escribir($pdf,125,138,100,5,'ROYAL TOUR PLUS S.A.S. ',0,8,'L','B',0,0);

$pdf->Output();

?>