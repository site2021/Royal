<?php
require('code128-rev.php');

//Agregamos la libreria para genera códigos QR
require "phpqrcode/qrlib.php";

$extracto = $_REQUEST['extracto'];
$xcontrato = $_REQUEST['contrato'];
$xcedularesponsable = $_REQUEST['cedularesponsable'];

include '../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbextractos WHERE extracto='$extracto' AND contrato='$xcontrato' AND cedularesponsable='$xcedularesponsable'");
$row = mysqli_fetch_object($rs);

$xcontrato = $row->contrato;
$xobjetocontrato = $row->objetocontrato;
$xorigen = $row->origen;
$xdestino = $row->destino;
$xrecorrido = $row->recorrido;
$xmodalidad = $row->modalidad;
$xempresaafiliadora = $row->empresaafiliadora;
$xfechainicio = $row->fechainicio;
$xfechafin = $row->fechafin;
$xplaca = $row->placa;
$xmodelo = $row->modelo;
$xmarca = $row->marca;
$xclase = $row->clase;
$xinterno = $row->interno;
$xtarjetaoperacion = $row->tarjetaoperacion;
$xconductor1 = $row->conductor1;
$xcedulaconductor1 = $row->cedulaconductor1;
$xvigencialicencia1 = $row->vigencialicencia1;
$xconductor2 = $row->conductor2;
$xcedulaconductor2 = $row->cedulaconductor2;
$xvigencialicencia2 = $row->vigencialicencia2;
$xconductor3 = $row->conductor3;
$xcedulaconductor3 = $row->cedulaconductor3;
$xvigencialicencia3 = $row->vigencialicencia3;
$xresponsable = $row->responsable;
$xcedularesponsable = $row->cedularesponsable;
$xtelefono = $row->telefono;
$xdireccion = $row->direccion;
$xcliente = $row->cliente;
$xnit = $row->nit;

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
escribir($pdf,10,15,97,28,'',0,0,'','','1');
$pdf->Image('img/minitransporte.jpg',16,18,80);
escribir($pdf,107,15,97,28,'',0,0,'','','1');
$pdf->Image('img/royaltour.jpg',122,16,65);

//NUMERO DE PLANILLA
escribir($pdf,10,43,194,12,'',0,11,'C','B','1');
escribir($pdf,10,43,194,5,'FORMATO ÚNICO DE EXTRACTO DEL CONTRATO DEL SERVICIO PÚBLICO',0,9,'C','B','0');
escribir($pdf,10,46,194,5,'DE TRANSPORTE TERRESTRE AUTOMOTOR ESPECIAL',0,9,'C','B','0');
escribir($pdf,10,49,194,5,'No. 3660045182019'.$xcontrato.$extracto,0,11,'C','B','0');

// $link = urlencode('http://intranet.cooperativaroyalexpress.com/app/secciones/fuec/planilla.php?extracto='.$extracto.'&contrato='.$xcontrato.'&cedularesponsable='.$xcedularesponsable);

// $parametro='http://api.qrserver.com/v1/create-qr-code/?size=200x200&data='.$link;
// $pdf->Image($parametro,192,44,10,0,'PNG');

// //RAZON SOCIAL DE LA EMPRESA
escribir($pdf,10,55,194,7,'',0,11,'C','B','1');
escribir($pdf,10,55,194,5,'RAZÓN SOCIAL DE LA EMPRESA DE TRANSPORTE ESPECIAL',0,9,'L','','0');
escribir($pdf,10,58,194,5,'ROYAL TOUR PLUS S.A.S.',0,9,'l','B','0');
escribir($pdf,160,55,44,5,'NIT',0,9,'J','','0');
escribir($pdf,160,58,44,5,'901.131.491-3',0,9,'J','B','0');

//N° DE CONTRATO
escribir($pdf,10,62,194,3.5,'CONTRATO No. '.$xcontrato,0,9,'L','','1');

//CONTRATANTE
escribir($pdf,10,65.5,194,4.5,'',0,11,'C','B','1');
escribir($pdf,10,65.5,194,5,'CONTRATANTE:',0,9,'L','','0');
escribir($pdf,36,65.5,150,5,''.$xcliente,0,8,'L','','0');
escribir($pdf,160,65.5,44,5,'NIT/CC',0,9,'J','','0');
escribir($pdf,172,65.5,44,5,''.$xnit,0,9,'J','','0');

// //OBJETO DE CONTRATO
escribir($pdf,10,70,194,4,'OBJETO CONTRATO',0,9,'L','','1');

// //TIPO TRANSPORTE
escribir($pdf,50,69.5,194,5,''.$xobjetocontrato,0,9,'J','','0');

//ORIGEN
escribir($pdf,10,74,194,4,'ORIGEN-DESTINO, DESCRIBIENDO RECORRIDO: '.$xorigen.' - '.$xdestino,1,9,'J','','1');

//DESCRIPCION
escribir($pdf,10,78,194,79,'',0,10,'C','','1');
escribir($pdf,10,78.4,194,2.9,''.$xrecorrido,1,6.5,'L','','0');

//Declaramos una carpeta temporal para guardar la imagenes generadas
$dir = 'temp/';

//Si no existe la carpeta la creamos
if (!file_exists($dir))
    mkdir($dir);

    //Declaramos la ruta y nombre del archivo a generar
$filename = $dir.'test.png';

    //Parametros de Condiguración

$tamaño = 170; //Tamaño de Pixel
$level = 'L'; //Precisión Baja
$framSize = 0; //Tamaño en blanco

// // $link = 'http://intranet.cooperativaroyalexpress.com/app/secciones/fuec/planilla.php?extracto='.$extracto;
$contenido = 'http://intranet.cooperativaroyalexpress.com/app/secciones/fuec/planilla2.php?extracto='.$extracto.'&contrato='.$xcontrato.'&cedularesponsable='.$xcedularesponsable; //Texto

//     //Enviamos los parametros a la Función para generar código QR 
QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 

//     //Mostramos la imagen generada

$pdf->Image($dir.basename($filename),192,43.5,11,0,'PNG');

//TIPO
escribir($pdf,10,157,194,5,''.$xmodalidad.'                      CON: '.$xempresaafiliadora,1,9,'L','','1');

//VIGENCIA
escribir($pdf,10,162,194,5,'VIGENCIA DEL CONTRATO',0,9,'C','B','1');

//FECHA INICIAL
escribir($pdf,10,167,78,5,'FECHA INICIAL',0,9,'L','','1');
escribir($pdf,88,167,116,5,''.$xfechainicio,0,9,'C','','1');
//FECHA VENCIMIENTO
escribir($pdf,10,172,78,5,'FECHA VENCIMIENTO',0,9,'L','','1');
escribir($pdf,88,172,116,5,''.$xfechafin,0,9,'C','','1');

//CARACTERISTICAS DEL VEHICULO
escribir($pdf,10,177,194,5,'CARACTERÍSTICAS DEL VEHÍCULO',0,9,'C','B','1');

//PLACA
escribir($pdf,10,182,32,5,'PLACA',0,9,'C','','1');
escribir($pdf,10,187,32,5,''.$xplaca,0,9,'C','','1');

//MODELO
escribir($pdf,42,182,46,5,'MODELO',0,9,'C','','1');
escribir($pdf,42,187,46,5,''.$xmodelo,0,9,'C','','1');

//MARCA
escribir($pdf,88,182,40,5,'MARCA',0,9,'C','','1');
escribir($pdf,88,187,40,5,''.$xmarca,0,9,'C','','1');

//CLASE
escribir($pdf,128,182,76,5,'CLASE',0,9,'C','','1');
escribir($pdf,128,187,76,5,''.$xclase,0,9,'C','','1');

//NUMERO INTERNO
escribir($pdf,10,192,78,6,'NÚMERO INTERNO:   '.$xinterno,0,9,'C','','1');

//NUMERO TARJETA DE OPERACION
escribir($pdf,88,192,116,6,'NÚMERO TARJETA DE OPERACIÓN:   '.$xtarjetaoperacion,0,9,'C','','1');

//DATOS DEL CONDUCTOR 1
escribir($pdf,10,198,32,4,'DATOS DEL CONDUCTOR 1',1,9,'L','','1');
//NOMBRES Y APELLIDOS
escribir($pdf,42,198,46,8,'',1,11,'L','','1');
escribir($pdf,42,194,46,11,'NOMBRES Y APELLIDOS',0,6,'L','','0');
escribir($pdf,42,200,46,3,''.$xconductor1,1,8,'C','','0');
//NUMERO DE CEDULA
escribir($pdf,88,198,40,8,'',1,11,'L','','1');
escribir($pdf,88,194,40,11,'No CÉDULA',0,6,'L','','0');
escribir($pdf,88,200,40,4,''.$xcedulaconductor1,0,9,'C','','0');
//NUMERO DE LUCENCIA CONDUCCION
escribir($pdf,128,198,40,8,'',1,11,'L','','1');
escribir($pdf,128,194,40,11,'No LICENCIA CONDUCCIÓN',0,6,'L','','0');
escribir($pdf,128,200,40,4,''.$xcedulaconductor1,0,9,'C','','0');
//VIGENCIA
escribir($pdf,168,198,36,8,'',1,11,'L','','1');
escribir($pdf,168,194,36,11,'VIGENCIA',0,6,'L','','0');
escribir($pdf,168,200,36,4,''.$xvigencialicencia1,0,9,'C','','0');

//DATOS DEL CONDUCTOR 2
escribir($pdf,10,206,32,4,'DATOS DEL CONDUCTOR 2',1,9,'L','','1');
//NOMBRES Y APELLIDOS
escribir($pdf,42,206,46,8,'',1,11,'L','','1');
escribir($pdf,42,206,46,4,''.$xconductor2,1,8,'C','','0');
//NUMERO DE CEDULA
escribir($pdf,88,206,40,8,'',1,11,'L','','1');
escribir($pdf,88,206,40,4,''.$xcedulaconductor2,0,9,'C','','0');
//NUMERO DE LUCENCIA CONDUCCION
escribir($pdf,128,206,40,8,'',1,11,'L','','1');
escribir($pdf,128,206,40,4,''.$xcedulaconductor2,0,9,'C','','0');
//VIGENCIA
escribir($pdf,168,206,36,8,'',1,11,'L','','1');
escribir($pdf,168,206,36,4,''.$xvigencialicencia2,0,9,'C','','0');

//DATOS DEL CONDUCTOR 3
escribir($pdf,10,214,32,4,'DATOS DEL CONDUCTOR 3',1,9,'L','','1');

//NOMBRES Y APELLIDOS
escribir($pdf,42,214,46,8,'',1,11,'L','','1');
escribir($pdf,42,214,46,4,''.$xconductor3,1,8,'C','','0');

//NUMERO DE CEDULA
escribir($pdf,88,214,40,8,'',1,11,'L','','1');
escribir($pdf,88,214,40,4,''.$xcedulaconductor3,0,9,'C','','0');

//NUMERO DE LUCENCIA CONDUCCION
escribir($pdf,128,214,40,8,'',1,11,'L','','1');
escribir($pdf,128,214,40,4,''.$xcedulaconductor3,0,9,'C','','0');

//VIGENCIA
escribir($pdf,168,214,36,8,'',1,11,'L','','1');
escribir($pdf,168,214,36,4,''.$xvigencialicencia3,0,9,'C','','0');

//RESPONSABLE CONTRATANTE
escribir($pdf,10,222,32,5,('RESPONSABLE CONTRATANTE'),1,9,'L','','1');
//NOMBRES Y APELLIDOS
escribir($pdf,42,222,46,10,'',1,11,'L','','1');
escribir($pdf,42,222.5,46,3,'NOMBRES Y APELLIDOS',0,6,'L','','0');
escribir($pdf,42,226,46,3,''.$xresponsable,1,8,'C','','0');
//NUMERO CEDULA
escribir($pdf,88,222,40,10,'',1,11,'L','','1');
escribir($pdf,88,222.5,40,3,'No CÉDULA',0,6,'L','','0');
escribir($pdf,88,226,40,4,''.$xcedularesponsable,1,8,'C','','0');
//TELEFONO
escribir($pdf,128,222,40,10,'',1,11,'L','','1');
escribir($pdf,128,222.5,40,3,'TELÉFONO',0,6,'L','','0');
escribir($pdf,128,226,40,4,''.$xtelefono,1,8,'C','','0');
//DIRECCION
escribir($pdf,168,222,36,10,'',1,11,'L','','1');
escribir($pdf,168,222.5,36,3,'DIRECCIÓN',0,6,'L','','0');
escribir($pdf,168,226,36,3,''.$xdireccion,1,8,'C','','0');

//INFORMACION
escribir($pdf,10,232,118,23,'',1,11,'L','','1');
escribir($pdf,22,233,80,6,'Dirección CRA 24 #11-26 BRR ÁLAMOS Teléfono 3335401',1,11,'L','','0');
escribir($pdf,22,246,90,6,'Email servicioalcliente@cooperativaroyalexpress.com',0,11,'L','','0');

escribir($pdf,128,232,76,23,'',1,11,'L','','1');
escribir($pdf,167,233,34,3,'Firmado digitalmente por Carlos Andrés Rincón Vásquez',1,8,'L','','0');
escribir($pdf,167,242,34,3.5,'Fecha '.$xfecha ,1,8,'L','','0');
escribir($pdf,128,251,76,5,'FIRMA Y SELLO GERENTE EMPRESA',0,8,'C','','0');

escribir($pdf,134,240,40,10,'',0,0,'','','0');
$pdf->Image('img/firma.jpg',129,232.5,34);

$pdf->Image('img/sello_royaltour.jpg',135,239,29);

escribir($pdf,128,230,40,10,'',0,0,'','','0');

escribir($pdf,10,254,72,5,'Documento firmado digitalmente mediante certificación custodiada por ANDES SCD S.A. según Ley 527 de 1999 y Decreto 2364 de 2012',0,8,'L','','0');

$pdf->Image('img/letra.jpg',205,157,3);

$pdf->Image('img/vigilado.jpg',205,232,5);


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

$pdf->Image('img/letra.jpg',205,157,3);
$pdf->Image('img/vigilado.jpg',205,232,5);

$xfila=0;

// llegamos al fin
// necesitamos otra pagina
// escribir($pdf,10,$xfila+15,195,5,$fin,1,8,'J','');

$pdf->Output();

?>