<?php
require('code128-rev.php');

include '../../control/conex.php';

// coleccion de textos del contrato
include 'contrato-textomerani.php';

// escribir(pdf, x, y, w, h, texto, [0-cell, 1-multiline], size, align, [style:bold,normal] )
function escribir($xpdf, $dondex, $dondey, $ancho, $alto, $texto, $opcion, $size, $align, $style){
	$xpdf->SetFont('Arial',$style,$size);	
	$xpdf->SetXY($dondex,$dondey);
	if($opcion==0){
		$xpdf->Cell($ancho,$alto,utf8_decode($texto),0,0,$align);	
	}else {
		$xpdf->multiCell($ancho,$alto,utf8_decode($texto),0,$align);	
	}
	
}

// configuracion de la zona regional 
date_default_timezone_set('america/bogota');
setlocale(LC_ALL,”es_ES”);

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$xfecha =  htmlspecialchars($dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')." ( ".date("H:i:s")." )");


$xcolegio = $_REQUEST['colegio'];
$xtarifav = $_REQUEST['tarifav'];
$xnombre = $_REQUEST['nombre'];
$xnombreacudiente = $_REQUEST['nombreacudiente'];
$xcelular1 = $_REQUEST['celular1'];
$xcelular2 = $_REQUEST['celular2'];
$xtelefono = $_REQUEST['telefono'];
$xemail = $_REQUEST['email'];
$xemail2 = $_REQUEST['email2'];
$xrecorrido = $_REQUEST['recorrido'];
$xcodigo = $_REQUEST['codigo'];

$pdf = new PDF_Code128();

$pdf->AddPage('P','Letter');

// logo
$pdf->Image('royaltour.jpg',10,5,40);

// escribir(pdf, x, y, w, h, texto, [0-cell, 1-multiline], size, align, [style:bold,normal] )
escribir($pdf,55,8,100,5,'CONTRATO ESCOLAR',0,12,'L','B');
escribir($pdf,174,8,100,5,'CÓDIGO: '.$xcodigo,0,12,'L','B');

escribir($pdf,55,13,100,5,'COLEGIO:',0,12,'L','B');
escribir($pdf,78,13,100,5,$xcolegio,0,12,'L','B');

escribir($pdf,10,25,100,5,'Pereira, '.$xfecha,0,8,'L','');

escribir($pdf,10,35,100,5,'Señor Padre de Familia y/o Acudiente:',0,8,'L','B');

escribir($pdf,10,45,195,5,$encabeza,1,8,'J','');

// datos del contrato
// titulos
$xfila=45;
escribir($pdf,10,$xfila+15,50,5,'Tarifa: $ '.number_format($xtarifav),0,8,'L','');
escribir($pdf,10,$xfila+20,50,5,'Estudiante: '.$xnombre,0,8,'L','');
escribir($pdf,10,$xfila+25,50,5,'Nombres del Padre Acudiente: '.$xnombreacudiente,0,8,'L','');
escribir($pdf,10,$xfila+30,50,5,'No celular Papa: '.$xcelular1,0,8,'L','');
escribir($pdf,10,$xfila+35,50,5,'No celular Madre: '.$xcelular2,0,8,'L','');
escribir($pdf,10,$xfila+40,50,5,'Telefono casa: '.$xtelefono,0,8,'L','');
escribir($pdf,10,$xfila+45,50,5,'Email Papa: '.$xemail,0,8,'L','');
escribir($pdf,10,$xfila+50,50,5,'Email Madre: '.$xemail2,0,8,'L','');

if ($xrecorrido == '1') {
	escribir($pdf,10,$xfila+55,50,5,'Recorrido: RUTA COMPLETA',0,8,'L','');
}
else if($xrecorrido == '4'){
	escribir($pdf,10,$xfila+55,50,5,'Recorrido: DOS DIRECCIONES',0,8,'L','');
}


// Y ahora empieza la gran estampida
$xfila=$xfila+60;
// escribir($pdf,10,$xfila,195,5,$inicio,1,8,'J','');

// punto-1
escribir($pdf,10,$xfila+2,5,5,'1.',0,8,'L','B');
escribir($pdf,15,$xfila+2,190,5,$punto1,1,8,'J','');

// punto-2
escribir($pdf,10,$xfila+28,5,5,'2.',0,8,'L','B');
escribir($pdf,15,$xfila+28,190,5,$punto2,1,8,'J','');

// punto-3
escribir($pdf,10,$xfila+38,5,5,'3.',0,8,'L','B');
escribir($pdf,15,$xfila+38,190,5,$punto3,1,8,'J','');

// punto-4
escribir($pdf,10,$xfila+44,5,5,'4.',0,8,'L','B');
escribir($pdf,15,$xfila+44,190,5,$punto4,1,8,'J','');

// punto-5
escribir($pdf,10,$xfila+54,5,5,'5.',0,8,'L','B');
escribir($pdf,15,$xfila+54,190,5,$punto5,1,8,'J','');

// punto-6
escribir($pdf,10,$xfila+79,5,5,'6.',0,8,'L','B');
escribir($pdf,15,$xfila+79,190,5,$punto6,1,8,'J','');

// punto-7
escribir($pdf,10,$xfila+84,5,5,'7.',0,8,'L','B');
escribir($pdf,15,$xfila+84,190,5,$punto7,1,8,'J','');

// punto-8
escribir($pdf,10,$xfila+89,5,5,'8.',0,8,'L','B');
escribir($pdf,15,$xfila+89,190,5,$punto8,1,8,'J','');

// punto-9
escribir($pdf,10,$xfila+94,5,5,'9.',0,8,'L','B');
escribir($pdf,15,$xfila+94,190,5,$punto9,1,8,'J','');

// punto-10
escribir($pdf,10,$xfila+99,5,5,'10.',0,8,'L','B');
escribir($pdf,15,$xfila+99,190,5,$punto10,1,8,'J','');

// punto-11
escribir($pdf,10,$xfila+108,5,5,'11.',0,8,'L','B');
escribir($pdf,15,$xfila+108,190,5,$punto11,1,8,'J','');

// punto-12
escribir($pdf,10,$xfila+113,5,5,'12.',0,8,'L','B');
escribir($pdf,15,$xfila+113,190,5,$punto12,1,8,'J','');

// punto-13
escribir($pdf,10,$xfila+122,5,5,'13.',0,8,'L','B');
escribir($pdf,15,$xfila+122,190,5,$punto13,1,8,'J','');

// punto-14
escribir($pdf,10,$xfila+127,5,5,'14.',0,8,'L','B');
escribir($pdf,15,$xfila+127,190,5,$punto14,1,8,'J','');

// punto-15
escribir($pdf,10,$xfila+137,5,5,'15.',0,8,'L','B');
escribir($pdf,15,$xfila+137,190,5,$punto15,1,8,'J','');

// -----------------------------------------------------------
$pdf->AddPage('P','Letter');

$xfila=0;

// punto-16
escribir($pdf,10,$xfila+15,5,5,'16.',0,8,'L','B');
escribir($pdf,15,$xfila+15,190,5,$punto16,1,8,'J','');

// punto-17
escribir($pdf,10,$xfila+30,5,5,'17.',0,8,'L','B');
escribir($pdf,15,$xfila+30,190,5,$punto17,1,8,'J','');

// // punto-18
escribir($pdf,10,$xfila+40,5,5,'18.',0,8,'L','B');
escribir($pdf,15,$xfila+40,190,5,$punto18,1,8,'J','');

// // punto-19
escribir($pdf,10,$xfila+55,5,5,'19.',0,8,'L','B');
escribir($pdf,15,$xfila+55,190,5,$punto19,1,8,'J','');

escribir($pdf,10,$xfila+75,5,5,'20.',0,8,'L','B');
escribir($pdf,15,$xfila+75,190,5,$punto20,1,8,'J','');

// titulo
escribir($pdf,10,$xfila+118,195,5,$titulopro,0,8,'C','');

// // proteccion de datos
escribir($pdf,10,$xfila+125,195,5,$tproteccion,1,8,'J','');

// // // puntu-1
escribir($pdf,10,$xfila+184,5,5,'1.',0,8,'L','B');
escribir($pdf,15,$xfila+184,190,5,$texto1,1,8,'J','');

escribir($pdf,10,$xfila+194,5,5,'2.',0,8,'L','B');
escribir($pdf,15,$xfila+194,190,5,$texto2,1,8,'J','');

escribir($pdf,10,$xfila+206,195,5,$fin,1,8,'J','');

$pdf->Output();

?>