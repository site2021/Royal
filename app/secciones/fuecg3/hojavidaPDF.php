<?php
require('code128-rev.php');

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

$xcedulaconductor = $_REQUEST['cedulaconductor'];

$rs = mysqli_query($conexion, "SELECT * FROM tbconductoresrt WHERE cedulaconductor='$xcedulaconductor' ");
$row = mysqli_fetch_object($rs);

$xconductor = $row->conductor;
$xcedula = $row->cedulaconductor;
$xsexo = $row->sexo;
$xfechanacimiento = $row->fechanacimiento;
$xlugarnacimiento = $row->lugarnacimiento;
$xestadocivil = $row->estadocivil;
$xtiposangre = $row->tiposangre;
$xdireccion = $row->direccion;
$xbarrio = $row->barrio;
$xmunicipio = $row->municipio;
$xtelefono = $row->telefono;
$xcelular = $row->celular;
$xcategorialicencia = $row->categorialicencia;
$xvigencialicencia = $row->vigencialicencia;
$xformacioneducativa = $row->formacioneducativa;
$xpsicosensometrico = $row->psicosensometrico;
$xocupacionalingreso = $row->ocupacionalingreso;
$xeps = $row->eps;
$xexperiencia = $row->experiencia;


$pdf = new PDF_Code128();
$pdf->AddPage('P','Letter');

// logo
$pdf->Image('img/hojavida.jpg',5,0,216);

// $pdf->Image('img/foto.jpg',157,10,50);

// escribir(pdf, x, y, w, h, texto, [0-cell, 1-multiline], size, align, [style:bold,normal] )

escribir($pdf,14,10,38,5,'V.1 24/02/2020 CÓD: THRT-FO-014',1,11,'L','',1,0);

escribir($pdf,14,23,136,5,'FORMATO HOJA DE VIDA',0,12,'C','B',0,0);
escribir($pdf,14,29,136,5,'TALENTO HUMANO',0,12,'C','B',0,0);
escribir($pdf,14,35,136,5,'ROYAL TOUR PLUS S.A.S',0,12,'C','B',0,0);
escribir($pdf,14,41,136,5,'901.131.491-6',0,12,'C','B',0,0);

escribir($pdf,14,51,136,5,'NOMBRE COMPLETO',0,12,'L','B',0,0);
escribir($pdf,14,57,136,5,$xconductor,0,12,'L','',0,0);

escribir($pdf,14,67,136,5,'N. DOCUMENTO',0,12,'L','B',0,0);
escribir($pdf,14,73,136,5,$xcedulaconductor,0,12,'L','',0,0);

escribir($pdf,14,83,136,5,'AÑOS DE EXPERIENCIA:',0,12,'L','B',0,0);
escribir($pdf,66,83,136,5,$xexperiencia.' AÑOS',0,12,'L','',0,0);

escribir($pdf,14,93,136,5,'INFORMACIÓN PERSONAL',0,12,'L','B',0,0);

escribir($pdf,14,105,136,5,'FECHA DE NACIMIENTO:',0,12,'L','B',0,0);
escribir($pdf,66,105,136,5,$xfechanacimiento,0,12,'L','',0,0);

escribir($pdf,14,111,136,5,'LUGAR DE NACIMIENTO:',0,12,'L','B',0,0);
escribir($pdf,67,111,136,5,$xlugarnacimiento,0,12,'L','',0,0);

escribir($pdf,14,117,136,5,'TIPO DE SANGRE:',0,12,'L','B',0,0);
escribir($pdf,53,117,136,5,$xtiposangre,0,12,'L','',0,0);

escribir($pdf,14,123,136,5,'ESTADO CIVIL:',0,12,'L','B',0,0);
escribir($pdf,46,123,136,5,$xestadocivil,0,12,'L','',0,0);

escribir($pdf,14,129,136,5,'SEXO:',0,12,'L','B',0,0);
escribir($pdf,28,129,136,5,$xsexo,0,12,'L','',0,0);

escribir($pdf,14,135,136,5,'BARRIO:',0,12,'L','B',0,0);
escribir($pdf,33,135,136,5,$xbarrio,0,12,'L','',0,0);

escribir($pdf,14,141,136,5,'DIRECCIÓN:',0,12,'L','B',0,0);
escribir($pdf,40,141,136,5,$xdireccion,0,12,'L','',0,0);

escribir($pdf,14,147,136,5,'MUNICIPIO:',0,12,'L','B',0,0);
escribir($pdf,39,147,136,5,$xmunicipio,0,12,'L','',0,0);

escribir($pdf,14,153,136,5,'TELÉFONO:',0,12,'L','B',0,0);
escribir($pdf,39,153,136,5,$xtelefono,0,12,'L','',0,0);

escribir($pdf,14,159,136,5,'CELULAR:',0,12,'L','B',0,0);
escribir($pdf,37,159,136,5,$xcelular,0,12,'L','',0,0);

escribir($pdf,14,171,136,5,'FORMACIÓN EDUCATIVA',0,12,'L','B',0,0);

escribir($pdf,14,183,136,5,'NIVEL EDUCATIVO:',0,12,'L','B',0,0);
escribir($pdf,55,183,136,5,$xformacioneducativa,0,12,'L','',0,0);

escribir($pdf,14,196,136,5,'DOCUMENTOS',0,12,'L','B',0,0);

escribir($pdf,14,206,136,5,'CATEGORÍA LICENCIA:',0,12,'L','B',0,0);
escribir($pdf,63,206,136,5,$xcategorialicencia,0,12,'L','',0,0);

escribir($pdf,14,212,136,5,'VIGENCIA LICENCIA:',0,12,'L','B',0,0);
escribir($pdf,58,212,136,5,$xvigencialicencia,0,12,'L','',0,0);

escribir($pdf,14,218,136,5,'EPS:',0,12,'L','B',0,0);
escribir($pdf,25,218,136,5,$xeps,0,12,'L','',0,0);

escribir($pdf,14,224,136,5,'PSICOSENSOMÉTRICO:',0,12,'L','B',0,0);
escribir($pdf,64,224,136,5,$xpsicosensometrico,0,12,'L','',0,0);

escribir($pdf,14,230,136,5,'EXAMEN OCUPACIONAL:',0,12,'L','B',0,0);
escribir($pdf,67,230,136,5,$xocupacionalingreso,0,12,'L','',0,0);

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