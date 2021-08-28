<?php
require('code128-rev.php');

include '../../control/conex.php';

// escribir(pdf, x, y, w, h, texto, [0-cell, 1-multiline], size, align, [style:bold,normal] )
function escribir($xpdf, $dondex, $dondey, $ancho, $alto, $texto, $opcion, $size, $align, $style, $borde){
	$xpdf->SetFont('Arial',$style,$size);	
	$xpdf->SetXY($dondex,$dondey);
	if($opcion==0){
		$xpdf->Cell($ancho,$alto,utf8_decode($texto),$borde,0,$align);	
	}else {
		$xpdf->multiCell($ancho,$alto,utf8_decode($texto),$borde,$align);	
	}
	
}

// configuracion de la zona regional 
date_default_timezone_set('america/bogota');
setlocale(LC_ALL,”es_ES”);

$xfecha =  htmlspecialchars(date("Y.m.d")."  ".date("H:i:s")." COT");

$pdf = new PDF_Code128();

$pdf->AddPage('P','Letter');

//LOGOS
escribir($pdf,10,15,97,34,'',0,0,'','','1');
$pdf->Image('minitransporte.jpg',12,20,92);
escribir($pdf,107,15,97,34,'',0,0,'','','1');
$pdf->Image('royaltour.jpg',114,16,83);

//NUMERO DE PLANILLA
escribir($pdf,10,49,194,14,'',0,11,'C','B','1');
escribir($pdf,10,50,194,5,'FORMATO ÚNICO DE EXTRACTO DEL CONTRATO DEL SERVICIO PÚBLICO',0,11,'C','B','0');
escribir($pdf,10,54,194,5,'DE TRANSPORTE TERRESTRE AUTOMOTOR ESPECIAL',0,11,'C','B','0');
escribir($pdf,10,58,194,5,'No. 366004518201908970574',0,11,'C','B','0');

$nit = 'hola';

$parametro='http://api.qrserver.com/v1/create-qr-code/?size=50x50&data='.$nit;
$pdf->Image($parametro,190,49.5,13,0,'PNG');

// //RAZON SOCIAL DE LA EMPRESA
escribir($pdf,10,63,194,11,'',0,11,'C','B','1');
escribir($pdf,10,64,194,5,'RAZÓN SOCIAL DE LA EMPRESA DE TRANSPORTE ESPECIAL',0,12,'L','','0');
escribir($pdf,10,69,194,5,'ROYAL TOUR PLUS S.A.S',0,9,'l','','0');
escribir($pdf,160,64,44,5,'NIT',0,12,'J','','0');
escribir($pdf,160,69,44,5,'891.408.122-6',0,12,'J','','0');

//N° DE CONTRATO
escribir($pdf,10,74,194,5,'CONTRATO No.       0005',0,12,'L','','1');

//CONTRATANTE
escribir($pdf,10,79,194,10,'',0,11,'C','B','1');
escribir($pdf,10,79,194,5,'CONTRATANTE',0,12,'L','','0');
escribir($pdf,10,84,150,5,'COLEGIO DE LA SALLE',0,12,'L','','0');
escribir($pdf,160,79,44,5,'NIT/CC',0,12,'J','','0');
escribir($pdf,160,84,44,5,'890.901.130-5',0,12,'J','','0');

// //OBJETO DE CONTRATO
escribir($pdf,10,89,194,5,'OBJETO CONTRATO',0,12,'L','','1');

// //TIPO TRANSPORTE
escribir($pdf,10,94,194,5,'TRANSPORTE DE ALUMNOS Y PERSONAL',0,11,'J','','1');

//ORIGEN
escribir($pdf,10,99,194,5,'ORIGEN-DESTINO, DESCRIBIENDO RECORRIDO: PEREIRA - KM 6 VIA CERRITOS ENTRADA 1',1,11,'J','','1');

//DESCRIPCION
escribir($pdf,10,104,194,21,'',0,10,'C','','1');
escribir($pdf,10,105,194,5,'AREA METROPOLITANA DE PEREIRA-CIRCASIA-SALENTO-MONTENEGRO-FILANDIA-QUIMBAYA-VALLE DEL COCORA-LA TEBAIDA-CALARCA-ALCALA-ULLOA-PARQUE DEL CAFE-PANACA-PUEBLO TAPAO-ARMENIA - CASA DE RETIROS SAN PABLO AEROPUERTO CON RETORNO A PEREIRA',1,10,'L','','0');

//TIPO
escribir($pdf,10,125,194,5,'CONVENIO    CONSORCIO    UNIÓN TEMPORAL    CON:STEP S.A.S',1,12,'L','','1');

//VIGENCIA
escribir($pdf,10,130,194,5,'VIGENCIA DEL CONTRATO',0,12,'C','B','1');

//FECHA INICIAL
escribir($pdf,10,135,78,9,'FECHA INICIAL',0,12,'L','','1');
escribir($pdf,88,135,40,9,'',0,12,'C','','1');
escribir($pdf,102,135.5,12,4.5,'DIA 18',1,12,'C','','0');
escribir($pdf,128,135,45,9,'',0,12,'C','','1');
escribir($pdf,144,135.5,13,4.5,'MES 03',1,12,'C','','0');
escribir($pdf,173,135,31,9,'',0,12,'C','','1');
escribir($pdf,182,135.5,13,4.5,'AÑO 2019',1,12,'C','','0');

//FECHA VENCIMIENTO
escribir($pdf,10,144,78,9,'FECHA VENCIMIENTO',0,12,'L','','1');
escribir($pdf,88,144,40,9,'',0,12,'C','','1');
escribir($pdf,102,144.5,12,4.5,'DIA 27',1,12,'C','','0');
escribir($pdf,128,144,45,9,'',0,12,'C','','1');
escribir($pdf,144,144.5,13,4.5,'MES 03',1,12,'C','','0');
escribir($pdf,173,144,31,9,'',0,12,'C','','1');
escribir($pdf,182,144.5,13,4.5,'AÑO 2019',1,12,'C','','0');

//CARACTERISTICAS DEL VEHICULO
escribir($pdf,10,153,194,5,'CARACTERÍSTICAS DEL VEHÍCULO',0,12,'C','B','1');

//PLACA
escribir($pdf,10,158,32,6,'PLACA',0,12,'C','','1');
escribir($pdf,10,164,32,6,'SXG125',0,12,'C','','1');

//MODELO
escribir($pdf,42,158,46,6,'MODELO',0,12,'C','','1');
escribir($pdf,42,164,46,6,'2015',0,12,'C','','1');

//MARCA
escribir($pdf,88,158,40,6,'MARCA',0,12,'C','','1');
escribir($pdf,88,164,40,6,('KIA'),0,12,'C','','1');

//CLASE
escribir($pdf,128,158,76,6,'CLASE',0,12,'C','','1');
escribir($pdf,128,164,76,6,'MICROBUS',0,12,'C','','1');

//NUMERO INTERNO
escribir($pdf,10,170,78,6,'NÚMERO INTERNO',0,12,'C','','1');
escribir($pdf,10,176,78,6,'035',0,12,'C','','1');

//NUMERO TARJETA DE OPERACION
escribir($pdf,88,170,116,6,'NÚMERO TARJETA DE OPERACIÓN',0,12,'C','','1');
escribir($pdf,88,176,116,6,'43145',0,12,'C','','1');

//DATOS DEL CONDUCTOR 1
escribir($pdf,10,182,32,5.5,'DATOS DEL CONDUCTOR 1',1,11,'L','','1');
//NOMBRES Y APELLIDOS
escribir($pdf,42,182,46,11,'',1,11,'L','','1');
escribir($pdf,42,178.5,46,11,'NOMBRES Y APELLIDOS',0,7,'L','','0');
escribir($pdf,42,185,46,4,('LORENA SEPULVEDA GIL'),1,10.5,'C','','0');
//NUMERO DE CEDULA
escribir($pdf,88,182,40,11,'',1,11,'L','','1');
escribir($pdf,88,178.5,40,11,'No CÉDULA',0,7,'L','','0');
escribir($pdf,88,185,40,4,('42155746'),0,10.5,'C','','0');
//NUMERO DE LUCENCIA CONDUCCION
escribir($pdf,128,182,40,11,'',1,11,'L','','1');
escribir($pdf,128,178.5,40,11,'No LICENCIA CONDUCCIÓN',0,7,'L','','0');
escribir($pdf,128,185,40,4,('42155746'),0,10.5,'C','','0');
//VIGENCIA
escribir($pdf,168,182,36,11,'',1,11,'L','','1');
escribir($pdf,168,178.5,36,11,'VIGENCIA',0,7,'L','','0');
escribir($pdf,168,185,36,4,('2020-12-14'),0,10.5,'C','','0');

//DATOS DEL CONDUCTOR 2
escribir($pdf,10,193,32,5.5,'DATOS DEL CONDUCTOR 2',1,11,'L','','1');
//NOMBRES Y APELLIDOS
escribir($pdf,42,193,46,11,'',1,11,'L','','1');
escribir($pdf,42,196,46,4,(''),1,10.5,'C','','0');
//NUMERO DE CEDULA
escribir($pdf,88,193,40,11,'',1,11,'L','','1');
escribir($pdf,88,196,40,4,(''),0,10.5,'C','','0');
//NUMERO DE LUCENCIA CONDUCCION
escribir($pdf,128,193,40,11,'',1,11,'L','','1');
escribir($pdf,128,196,40,4,(''),0,10.5,'C','','0');
//VIGENCIA
escribir($pdf,168,193,36,11,'',1,11,'L','','1');
escribir($pdf,168,196,36,4,(''),0,10.5,'C','','0');

//DATOS DEL CONDUCTOR 3
escribir($pdf,10,204,32,5.5,'DATOS DEL CONDUCTOR 3',1,11,'L','','1');

//NOMBRES Y APELLIDOS
escribir($pdf,42,204,46,11,'',1,11,'L','','1');
escribir($pdf,42,207,46,4,(''),1,10.5,'C','','0');

//NUMERO DE CEDULA
escribir($pdf,88,204,40,11,'',1,11,'L','','1');
escribir($pdf,88,207,40,4,(''),0,10.5,'C','','0');

//NUMERO DE LUCENCIA CONDUCCION
escribir($pdf,128,204,40,11,'',1,11,'L','','1');
escribir($pdf,128,207,40,4,(''),0,10.5,'C','','0');

//VIGENCIA
escribir($pdf,168,204,36,11,'',1,11,'L','','1');
escribir($pdf,168,207,36,4,(''),0,10.5,'C','','0');

//RESPONSABLE CONTRATANTE
escribir($pdf,10,215,32,7,('RESPONSABLE CONTRATANTE'),1,11,'L','','1');
//NOMBRES Y APELLIDOS
escribir($pdf,42,215,46,14,'',1,11,'L','','1');
escribir($pdf,42,215.5,46,3,'NOMBRES Y APELLIDOS',0,7,'L','','0');
escribir($pdf,42,219,46,4,('ANDRÉS FERNANDO GONZÁLES LÓPEZ'),1,10.5,'C','','0');
//NUMERO CEDULA
escribir($pdf,88,215,40,14,'',1,11,'L','','1');
escribir($pdf,88,215.5,40,3,'No CÉDULA',0,7,'L','','0');
escribir($pdf,88,221,40,4,('75093386'),1,10.5,'C','','0');
//TELEFONO
escribir($pdf,128,215,40,14,'',1,11,'L','','1');
escribir($pdf,128,215.5,40,3,'TELÉFONO',0,7,'L','','0');
escribir($pdf,128,221,40,4,('3379373'),1,10.5,'C','','0');
//DIRECCION
escribir($pdf,168,215,36,14,'',1,11,'L','','1');
escribir($pdf,168,215.5,36,3,'DIRECCIÓN',0,7,'L','','0');
escribir($pdf,168,219,36,3,('KM 6 VIA CERRITOS ENTRADA 1'),1,9,'C','','0');

//INFORMACION
escribir($pdf,10,229,118,25,'',1,11,'L','','1');
escribir($pdf,22,230,80,6,'Dirección CRA 24 #11-26 BRR ÁLAMOS Teléfono 3335401',1,11,'L','','0');
escribir($pdf,22,242,90,6,'Email ROYALEXPRESS2002@YAHOO.COM',0,11,'L','','0');

escribir($pdf,128,229,76,25,'',1,11,'L','','1');
escribir($pdf,167,230,34,3,'Firmado digitalmente por Carlos Andrés Rincón Vásquez',1,8,'L','','0');
escribir($pdf,167,239.5,34,3.5,'Fecha '.$xfecha,1,8,'L','','0');
escribir($pdf,128,249,76,5,'FIRMA Y SELLO GERENTE EMPRESA',0,10,'C','','0');

escribir($pdf,134,240,40,10,'',0,0,'','','0');
$pdf->Image('firma.jpg',129,230,39);

$pdf->Image('sello_royaltour.jpg',133,239,31);

escribir($pdf,128,230,40,10,'',0,0,'','','0');

escribir($pdf,10,254,72,5,'Documento firmado digitalmente mediante certificación custodiada por ANDES SCD S.A. según Ley 527 de 1999 y Decreto 2364 de 2012',0,8,'L','','0');

$pdf->Image('letra.jpg',205,157,3);

$pdf->Image('vigilado.jpg',205,232,5);


// -----------------------------------------------------------
$pdf->AddPage('P','Letter');

escribir($pdf,10,15,194,239,'',0,11,'C','B','1');
escribir($pdf,10,25,194,5,'INSTRUCTIVO PARA LA DETERMINACIÓN DEL NÚMERO CONSECUTIVO DEL FUEC',0,12,'C','B','0');

escribir($pdf,12,38,190,5,'El Formato Único de Extracto del Contrato "FUEC" estará constituido por los siguientes números:',0,11,'L','','0');

escribir($pdf,16,48,182,5,'a) Los tres primeros dígitos de izquierda a derecha corresponden al código de la Dirección Territorial que otorgó la habilitación o de aquella a la cual se hubiese trasladado la empresa de Servicio Público de Transporte Terrestre Automotor Especial;',1,11,'J','','0');

escribir($pdf,36,68,50,5,'Antioquia-Chocó',0,9,'L','','1');
escribir($pdf,86,68,21,5,'305',0,9,'C','','1');
escribir($pdf,107,68,50,5,'Huila-Caquetá',0,9,'L','','1');
escribir($pdf,157,68,21,5,'441',0,9,'C','','1');

escribir($pdf,36,73,50,5,'Atlántico',0,9,'L','','1');
escribir($pdf,86,73,21,5,'208',0,9,'C','','1');
escribir($pdf,107,73,50,5,'Magdalena',0,9,'L','','1');
escribir($pdf,157,73,21,5,'247',0,9,'C','','1');

escribir($pdf,36,78,50,5,'Bolívar-San Andrés y Provicencia',0,9,'L','','1');
escribir($pdf,86,78,21,5,'213',0,9,'C','','1');
escribir($pdf,107,78,50,5,'Meta- Vaupés-Vichada',0,9,'L','','1');
escribir($pdf,157,78,21,5,'550',0,9,'C','','1');

escribir($pdf,36,83,50,5,'Boyacá-Casanare',0,9,'L','','1');
escribir($pdf,86,83,21,5,'415',0,9,'C','','1');
escribir($pdf,107,83,50,5,'Nariño-Putumayo',0,9,'L','','1');
escribir($pdf,157,83,21,5,'352',0,9,'C','','1');

escribir($pdf,36,88,50,5,'Caldas',0,9,'L','','1');
escribir($pdf,86,88,21,5,'317',0,9,'C','','1');
escribir($pdf,107,88,50,5,'N/Santander-Arauca',0,9,'L','','1');
escribir($pdf,157,88,21,5,'454',0,9,'C','','1');

escribir($pdf,36,93,50,5,'Cauca',0,9,'L','','1');
escribir($pdf,86,93,21,5,'319',0,9,'C','','1');
escribir($pdf,107,93,50,5,'Quindío',0,9,'L','','1');
escribir($pdf,157,93,21,5,'363',0,9,'C','','1');

escribir($pdf,36,98,50,5,'Cesar',0,9,'L','','1');
escribir($pdf,86,98,21,5,'220',0,9,'C','','1');
escribir($pdf,107,98,50,5,'Risaralda',0,9,'L','','1');
escribir($pdf,157,98,21,5,'366',0,9,'C','','1');

escribir($pdf,36,103,50,5,'Córdoba-Sucre',0,9,'L','','1');
escribir($pdf,86,103,21,5,'223',0,9,'C','','1');
escribir($pdf,107,103,50,5,'Santander',0,9,'L','','1');
escribir($pdf,157,103,21,5,'468',0,9,'C','','1');

escribir($pdf,36,108,50,5,'Cundinamarca',0,9,'L','','1');
escribir($pdf,86,108,21,5,'425',0,9,'C','','1');
escribir($pdf,107,108,50,5,'Tolima',0,9,'L','','1');
escribir($pdf,157,108,21,5,'473',0,9,'C','','1');

escribir($pdf,36,113,50,5,'Guajira',0,9,'L','','1');
escribir($pdf,86,113,21,5,'241',0,9,'C','','1');
escribir($pdf,107,113,50,5,'Valle del Cauca',0,9,'L','','1');
escribir($pdf,157,113,21,5,'376',0,9,'C','','1');

escribir($pdf,16,124,182,5,'b) Los cuatro dígitos siguientes señalarán el número de resolución mediante la cual se otorgó la habilitación de la Empresa. En caso que la resolución no tenga estos dígitos, los faltantes serán completados con ceros a la izquierda;',1,11,'J','','0');

escribir($pdf,16,144,182,5,'c) Los dos siguientes dígitos, corresponderán a los dos últimos del año en que la empresa fue habilitada;',1,11,'J','','0');

escribir($pdf,16,158,182,5,'d) A continuación, cuatro dígitos que corresponderán al año en el que se expide el extracto del contrato;',1,11,'J','','0');

escribir($pdf,16,168,182,5,'e) Posteriormente, cuatro dígitos que identifican el número del contrato. La numeración debe ser consecutiva, establecida por cada empresa y continuará con la numeración dada a los contratos de prestación de servicio celebrados para el transporte de estudiantes, empleados, turistas, usuarios del servicio de salud y grupos específicos de usuarios, en vigencia de la Resolución 3068 de 2014.',1,11,'J','','0');

escribir($pdf,16,194,182,5,'f) Finalmente, los cuatro últimos dígitos corresponderán al número consecutivo del extracto de contracto que se expida para la ejecución de cada contrato. Se debe expedir un nuevo extracto por vencimiento del plazo inicial del mismo o por cambio del vehículo',1,11,'J','','0');

escribir($pdf,16,216,182,5,'EJEMPLO:',1,12,'J',B,'0');


escribir($pdf,16,226,182,5,'Empresa habilitada por la Dirección Territorial Cundinamarca en el año 2012, con resolución de habilitación No. 0155 que expide el primer extracto del contrato en el año 2015, del contrato 255. El número del Formato Único de Extracto del Contrato (FUEC) será: 425015512201502550001.',1,11,'J','','0');

$pdf->Image('letra.jpg',205,157,3);
$pdf->Image('vigilado.jpg',205,232,5);

$xfila=0;

// llegamos al fin
// necesitamos otra pagina
// escribir($pdf,10,$xfila+15,195,5,$fin,1,8,'J','');

$pdf->Output();

?>