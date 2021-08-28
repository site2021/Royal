<?php
require('code128-rev.php');

$dt = new DateTime();

include '../../control/conex.php';
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

$xplaca = $_REQUEST['placa'];

$rs = mysqli_query($conexion, "SELECT * FROM tbvehiculosg3 WHERE placa='$xplaca' ");
$row = mysqli_fetch_object($rs);

$xclase = $row->clase;
$xinterno = $row->interno;
$xmodelo = $row->modelo;
$xclase = $row->clase;
$xcolor = $row->color;
$xcarroceria= $row->carroceria;
$xtarjetaoperacion = $row->tarjetaoperacion;
$xfinsoat = $row->finsoat;
$xfinpolizacontrac = $row->finpolizacontrac;
$xfinpolizaextra = $row->finpolizaextra;
$xfinpreventiva = $row->finpreventiva;
$xfintecmecanica = $row->fintecmecanica;
$xfintarjetaoperacion = $row->fintarjetaoperacion;

$soatfor = new DateTime($xfinsoat);
$finsoat = $soatfor->format('d-m-Y');

$polizarccfor = new DateTime($xfinpolizacontrac);
$finpolizacontrac = $polizarccfor->format('d-m-Y');

$polizarcefor = new DateTime($xfinpolizaextra);
$finpolizaextra = $polizarcefor->format('d-m-Y');

$preventivafor = new DateTime($xfinpreventiva);
$finpreventiva = $preventivafor->format('d-m-Y');

$tecmecanicafor = new DateTime($xfintecmecanica);
$fintecmecanica = $tecmecanicafor->format('d-m-Y');

$tarjetaoperacionfor = new DateTime($xfintarjetaoperacion);
$fintarjetaoperacion = $tarjetaoperacionfor->format('d-m-Y');

if($rs->num_rows > 0){
    $imgDatos = $rs->fetch_assoc();
    
    //Mostrar Imagen
    // header("Content-type: image/png"); 
    // echo $imgDatos['tarjoperaimg'];
    // escribir($pdf,14,23,136,100,$imgDatos['tarjoperaimg'],0,12,'C','B',1,0);

$pdf = new PDF_Code128();
$pdf->AddPage('P','Letter');

// logo
$pdf->Image('img/royaltour.jpg',-3,-5,100);
$pdf->Image('img/pie_rt.jpg',0,196,216);

}
// $pdf->Image('img/foto.jpg',157,10,50);

escribir($pdf,0,38,216,5,'FICHA TÉCNICA',0,24,'C','B',0,0);
escribir($pdf,0,48,216,5,$xclase.'  '.$xinterno,0,16,'C','B',0,0);

escribir($pdf,14,66,90,54,'',0,12,'C','B',1,0);
escribir($pdf,113,66,90,54,'',0,12,'C','B',1,0);

escribir($pdf,14,138,90,5,'INFORMACIÓN GENERAL',0,14,'C','B',0,0);

escribir($pdf,14,152,23,5,'INTERNO: ',0,13,'L','B',0,0);
escribir($pdf,37,152,67,5,$xinterno,0,13,'L','',0,0);
escribir($pdf,14,159,18,5,'PLACA: ',0,13,'L','B',0,0);
escribir($pdf,32,159,70,5,$xplaca,0,13,'L','',0,0);
escribir($pdf,14,166,23,5,'MODELO: ',0,13,'L','B',0,0);
escribir($pdf,37,166,65,5,$xmodelo,0,13,'L','',0,0);
escribir($pdf,14,173,18,5,'CLASE: ',0,13,'L','B',0,0);
escribir($pdf,32,173,70,5,$xclase,0,13,'L','',0,0);
escribir($pdf,14,180,19,5,'COLOR: ',0,13,'L','B',0,0);
escribir($pdf,33,180,70,5,$xcolor,0,13,'L','',0,0);
escribir($pdf,14,187,34,5,'CARROCERÍA: ',0,13,'L','B',0,0);
escribir($pdf,48,187,56,5,$xcarroceria,0,13,'L','',0,0);
escribir($pdf,14,194,60,5,'TARJETA DE OPERACIÓN: ',0,13,'L','B',0,0);
escribir($pdf,74,194,29,5,$xtarjetaoperacion,0,13,'L','',0,0);

escribir($pdf,113,138,90,5,'DOCUMENTOS - VIGENCIA',0,14,'C','B',0,0);

escribir($pdf,113,152,16,5,'SOAT:',0,13,'L','B',0,0);
escribir($pdf,175,152,28,5,$finsoat,0,13,'L','',0,0);
escribir($pdf,113,159,31,5,'PÓLIZA RCC:',0,13,'L','B',0,0);
escribir($pdf,175,159,28,5,$finpolizacontrac,0,13,'L','',0,0);
escribir($pdf,113,166,31,5,'PÓLIZA RCE:',0,13,'L','B',0,0);
escribir($pdf,175,166,28,5,$finpolizaextra,0,13,'L','',0,0);
escribir($pdf,113,173,32,5,'PREVENTIVA:',0,13,'L','B',0,0);
escribir($pdf,175,173,28,5,$finpreventiva,0,13,'L','',0,0); 
escribir($pdf,113,180,49,5,'TÉCNICO MÉCANICA:',0,13,'L','B',0,0);
escribir($pdf,175,180,28,5,$fintecmecanica,0,13,'L','',0,0);
escribir($pdf,113,187,49,5,'TARJETA DE OPERACIÓN:',0,13,'L','B',0,0);
escribir($pdf,175,187,28,5,$fintarjetaoperacion,0,13,'L','',0,0);

$pdf->Output();

?>