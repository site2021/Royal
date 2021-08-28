<?php
require('code128-rev.php');

//Agregamos la libreria para genera códigos QR
require "phpqrcode/qrlib.php";

$xiniciocontrato = $_GET['iniciocontrato'];
$xfincontrato = $_GET['fincontrato'];
$xnit = $_GET['nit'];

include '../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbcontradigitalre WHERE iniciocontrato='$xiniciocontrato' AND fincontrato='$xfincontrato' AND nit='$xnit'");

$row = mysqli_fetch_object($rs);

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
// setlocale(LC_MONETARY, 'es_CO');
// $xiniciocontrato = $row->iniciocontrato;
$xiniciocontrato = strftime("%d DEL MES %m DEL AÑO %Y", strtotime($xiniciocontrato));

$xfincontrato = strftime("%d DEL MES %m DEL AÑO %Y", strtotime($xfincontrato));

$xfechafirma = strftime("%d días del mes %m del año %Y.", strtotime($row->fechafirma));

$xcontrato = $row->contrato;
$xcliente = $row->cliente;
$xciudadcliente = $row->ciudadcliente;
$xciudadsalida = $row->ciudadsalida;
$xrecorrido = $row->recorrido;
$xplacaveh = $row->placaveh;
$xclaseveh = $row->claseveh;
$xinternoveh = $row->internoveh;
$xvalorservicio = $row->valorservicio;
$xformapago = $row->formapago;
$xresponsable = $row->responsable;
$xcedularesponsable = $row->cedularesponsable;
$xdireccion = $row->direccion;
$xtelefono = $row->telefono;


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

$pdf = new PDF_Code128();

$pdf->AddPage('P','Letter');
//LOGO
$pdf->Image('img/royal001.jpg',75,5,62);

escribir($pdf,1,30,194,5,'CONTRATO DE PRESTACIÓN DE SERVICIOS DE TRANSPORTE No.',0,7,'C','B','0');

escribir($pdf,139,33.5,18,0,'',0,9,'L','','1');
escribir($pdf,142,32,18,0,$xcontrato,0,10,'L','B','0');

escribir($pdf,124,42,79,3,$xcliente,0,7,'L','B','0');
escribir($pdf,64,45,60,3,$xciudadcliente,0,7,'L','B','0');
escribir($pdf,160,54,43,3,$xiniciocontrato,0,7,'L','B','0');
escribir($pdf,26,57,44,3,$xfincontrato,0,7,'L','B','0');
escribir($pdf,97,57,72,3,$xciudadsalida,0,7,'L','B','0');
escribir($pdf,10,60,193,3,$xrecorrido,1,7,'L','B','0');
escribir($pdf,24,72,178,3,$xplacaveh,1,7,'L','B','0');
escribir($pdf,24,75,178,3,$xclaseveh,1,7,'L','B','0');
escribir($pdf,39,78,163,3,$xinternoveh,1,7,'L','B','0');
escribir($pdf,175,81,27,3,number_format($xvalorservicio),1,7,'L','B','0');
escribir($pdf,56,84,27,3,$xformapago,1,7,'L','B','0');
escribir($pdf,10,108,43,3,$xiniciocontrato,1,7,'L','B','0');
escribir($pdf,72,108,43,3,$xfincontrato,1,7,'L','B','0');

escribir($pdf,10,36,194,3,'Entre, LA SOCIEDAD COOPERATIVA ROYAL EXPRESS identificada con el Nit.891.408.122-6 representada en el presente acto por el señor CARLOS ANDRES RINCON VASQUEZ, mayor de edad, vecino de Pereira, identificado como aparece al pie de su firma, quien obra en su calidad de REPRESENTANTE LEGAL, y quien en adelante se llamará LA EMPRESA, y de otro lado __________________________________________________ mayor de edad, vecino de la ciudad de _____________________________________, identificado como aparece al pie de su firma, y quien en lo sucesivo se denominará EL CONTRATANTE, han convenido en celebrar un contrato de prestación de SERVICIO DE TRANSPORTE que se regulará por las cláusulas que a continuación se expresan y en general por las normas vigentes aplicables a la materia de este contrato: PRIMERO. OBJETO.- LA EMPRESA, de manera independiente, prestará el servicio de TRANSPORTE a EL CONTRATANTE desde el día ___________________________ hasta el día ___________________________ desde la ciudad de _____________________________________________ con el siguiente recorrido _____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________. VEHÍCULO: El vehículo asignado para la prestación del servicio será: 
PLACAS: _________________________________________________________________________________________________________________, CLASE: _________________________________________________________________________________________________________________, NÚMERO INTERNO: ________________________________________________________________________________________________________ SEGUNDA. PRECIO.- EL CONTRATANTE, pagará, por la prestación del servicio de transporte, la siguiente suma de dinero $_________________, suma esta que será cancelada así: _______________. TERCERA. OBLIGACIONES DE LA EMPRESA.- Constituyen las principales obligaciones para LA EMPRESA: a) Poner los vehículos solicitados a disposición del CONTRATANTE; b) Realizar los recorridos acordados previamente con el CONTRATANTE; c) Verificar en caso de que algún vehículo no pueda prestar el servicio, la reposición del mismo en el menor tiempo posible. d) Permitir que el CONTRATANTE modifique los recorridos cuando lo estime necesario, previa acuerdo con la EMPRESA. CUARTA. OBLIGACIONES DEL CONTRATANTE.- EL CONTRATANTE se obliga a: a) A pagar la suma acordada por la prestación del servicio contratado; b) A indicar a la EMPRESA los recorridos a realizar para el transporte de las personas designadas por el CONTRATANTE; c) A suministrar al conductor del vehículo el almuerzo del día contratado, o en su defecto a otorgar el tiempo necesario para almorzar. d) A nombrar un coordinador de actividades para cada vehículo contratado, quien indicará el recorrido a efectuarse de acuerdo con la zona asignada. QUINTA. DURACION.- El presente contrato se celebra desde el día ___________________________ hasta el día ___________________________. PARAGRAFO. SUSPENSIÓN TEMPORAL.-Las partes de común acuerdo podrán suspender el contrato, para lo cual suscribirán un acta en la cual se indicarán las razones de la suspensión y el término de duración de la misma.SEXTA. CONTRATO COMERCIAL Y AUTONOMÍA.-LA EMPRESA realizará su actividad de manera autónoma e independiente y utilizará en el cumplimiento de su labor su propio personal, sin que haya subordinación jurídica alguna entre él, sus colaboradores y dependientes yEL CONTRATANTE.  En consecuencia, EL CONTRATANTEdeclara que el presente contrato es de naturaleza comercial y que no existe ningún vínculo laboral entre sus colaboradores o el personal que él contrate y LA EMPRESA y, por tanto, conceptos tales como honorarios, salarios, prestaciones, subsidios, afiliaciones, indemnizaciones, etc., que sobrevengan por causa o con ocasión de los servicios de dicho personal serán asumidos exclusivamente por LA EMPRESA. SEPTIMA.: CLÁUSULA PENAL.-  El incumplimiento total o parcial de las obligaciones derivadas del presente contrato, faculta a cualquiera de las partes a exigirle al contratante incumplido de manera inmediata a título de pena, una  suma equivalente al 10% del valor del contrato, suma que podrá ser exigida ejecutivamente sin necesidad de requerimiento ni de constitución en mora, sin perjuicio de la posibilidad de exigir las demás prestaciones que resulten en virtud del presente negocio jurídico y sin que se extinga la obligación principal.PARAGRAFO.- En caso de existir cancelación del servicio sin la debida antelación, el contratante deberá pagar a la contratista: a)  En caso de cancelar el servicio, se debe realizar como mínimo con doce (12) horas de anticipación, mediante solicitud expresa a través de correo electrónico al asesor. b) Si se requiere cancelar el servicio después el plazo anterior y dos (2) horas antes de iniciar el servicio, se genera un costo del 20% del valor del servicio, dicho valor será reembolsable al cliente para otro servicio en un plazo de 6 meses. c) La ubicación del vehículo en el sitio pactado y su no utilización, genera cobro del 50% del valor total del contrato no reembolsable.OCTAVA. TÍTULO EJECUTIVO.- Para todos los efectos, y por contener obligaciones claras, expresas y por ser determinable su exigibilidad, las partes acuerdan que el presente contrato presta mérito ejecutivo ante juez competente. PARÁGRAFO. Cualquier modificación a los términos aquí contenidos deberá constar en documento escrito suscrito por cada una de las partes. NOVENA. SOLUCIÓN ALTERNATIVA DE CONFLICTOS.-  En caso de suscitarse cualquier diferencia surgida con ocasión del presente contrato, los contratantes acudirán a los mecanismos de solución de controversias extrajudiciales establecidos en la Ley 446 de 1998, tales como la transacción, conciliación y amigable composición, para solucionar las diferencias surgidas en la ejecución del contrato. DÉCIMA.CONFIDENCIALIDAD: La información de cada una de las partes del presente contrato, o de las personas o entidades vinculadas a éstas, que la otra parte llegue a conocer en virtud de este convenio tendrá el carácter de confidencial; por tanto, las partes se comprometen a que ni ellas, ni sus empleados y/o colaboradores revelarán, difundirán, comentarán, analizarán, evaluarán, copiarán o harán uso diferente del previsto en este convenio. Tampoco utilizarán dicha información para el ejercicio de su propia actividad, ni la duplicarán o compartirán con terceras personas, salvo autorización previa y escrita de la parte interesada. Cada una de las partes se obliga a adoptar todas las medidas necesarias o convenientes para garantizar la reserva de la información de la otra a la que tenga acceso con ocasión del presente convenio, comprometiéndose a que tales medidas o precauciones no serán, en ningún caso, menores a las que deba adquirir un profesional en el manejo de información. La información que cualquiera de las partes llegue a conocer de la otra en virtud de este convenio se utilizará exclusivamente para los fines del mismo.  Dicha información no será divulgada a terceros sin el consentimiento escrito de la otra parte, aún con posterioridad a la terminación del presente convenio. Cualquier violación a esta disposición facultará a la parte afectada para ejercer las acciones a que haya lugar. DECIMA PRIMERA. TERMINACION ANORMAL.- El incumplimiento de las obligaciones nacidas de este acuerdo de voluntades por una de las partes, facultará a la otra para dar por terminado el contrato, sin que sea necesario requerimiento de ninguna índole.DECIMA SEGUNDA. MANEJO DE INFORMACIÓN PERSONAL.-  En ejercicio de mi derecho a la libertad y autodeterminación informática, AUTORIZO de manera expresa, concreta, suficiente, voluntaria, informada e irrevocable a la EMPRESA COOPERATIVA ROYAL EXPRESS, o a quien represente sus derechos u ostente en el futuro a cualquier título la calidad de acreedor a: capturar, tratar, procesar, operar, verificar, transmitir, transferir, usar, poner en circulación, consultar, divulgar, reportar y solicitar toda la información que se refiere a nuestro comportamiento crediticio, financiero, comercial y de servicios de los cuales somos sus titulares, referida al nacimiento, ejecución y extinción de obligaciones dinerarias (independientemente de la naturaleza del contrato que les de origen) a nuestro comportamiento e historial crediticio, incluida la información positiva y negativa de mis hábitos de pago y aquella que se refiera a la información personal necesaria para el estudio, análisis y eventual otorgamiento de un crédito o celebración de un contrato, para que dicha información sea concernida y reportada en cualquier CENTRAL DEL RIESGOS o BASE DE DATOS. La permanencia de mi información en las bases de datos será determinada por el ordenamiento jurídico aplicable, en especial por las normas legales y la jurisprudencia, los cuales contienen mis derechos y obligaciones, que por ser públicos, conozco plenamente. Así mismo manifiesto que conozco el reglamento de las CENTRALES DE RIESGOS. En caso de que en el futuro, el autorizado en este documento efectúe una venta de cartera o una cesión de cualquier título de las obligaciones a mi cargo a favor de un tercero, los efectos de la presente autorización se extenderán a éste, en los mismos términos y condiciones.',1,8,'J','','0');


$xfila=0;


$pdf->AddPage('P','Letter');

escribir($pdf,10,12,194,5,'LISTA DE PASAJEROS',0,9,'L','B',''); //1

escribir($pdf,10,18,194,4.5,'',0,9,'L','','1'); //TITULO
escribir($pdf,10,18,8,4.5,'No',0,9,'C','B','1');//NUMERO
escribir($pdf,18,18,130,4.5,'NOMBRE',0,9,'C','B','1');//NOMBRE
escribir($pdf,148,18,56,4.5,'DOCUMENTO DE IDENTIFICACIÓN',0,9,'C','B','1');//DOCUMENTO

escribir($pdf,10,22.5,194,4.5,'',0,9,'L','','1'); //1
escribir($pdf,10,22.5,8,4.5,'1',0,9,'C','B','1'); //1
escribir($pdf,18,22.5,130,4.5,'',0,9,'C','B','1');//1

escribir($pdf,10,27,194,4.5,'',0,9,'L','','1'); //2
escribir($pdf,10,27,8,4.5,'2',0,9,'C','B','1'); //2
escribir($pdf,18,27,130,4.5,'',0,9,'C','B','1');//2

escribir($pdf,10,31.5,194,4.5,'',0,9,'L','','1'); //3
escribir($pdf,10,31.5,8,4.5,'3',0,9,'C','B','1'); //3
escribir($pdf,18,31.5,130,4.5,'',0,9,'C','B','1');//3

escribir($pdf,10,36,194,4.5,'',0,9,'L','','1'); //4
escribir($pdf,10,36,8,4.5,'4',0,9,'C','B','1'); //4
escribir($pdf,18,36,130,4.5,'',0,9,'C','B','1');//4

escribir($pdf,10,40.5,194,4.5,'',0,9,'L','','1'); //5
escribir($pdf,10,40.5,8,4.5,'5',0,9,'C','B','1'); //5
escribir($pdf,18,40.5,130,4.5,'',0,9,'C','B','1');//5

escribir($pdf,10,45,194,4.5,'',0,9,'L','','1'); //6
escribir($pdf,10,45,8,4.5,'6',0,9,'C','B','1'); //6
escribir($pdf,18,45,130,4.5,'',0,9,'C','B','1');//6

escribir($pdf,10,49.5,194,4.5,'',0,9,'L','','1'); //7
escribir($pdf,10,49.5,8,4.5,'7',0,9,'C','B','1'); //7
escribir($pdf,18,49.5,130,4.5,'',0,9,'C','B','1');//7

escribir($pdf,10,54,194,4.5,'',0,9,'L','','1'); //8
escribir($pdf,10,54,8,4.5,'8',0,9,'C','B','1'); //8
escribir($pdf,18,54,130,4.5,'',0,9,'C','B','1');//8

escribir($pdf,10,58.5,194,4.5,'',0,9,'L','','1'); //9
escribir($pdf,10,58.5,8,4.5,'9',0,9,'C','B','1'); //9
escribir($pdf,18,58.5,130,4.5,'',0,9,'C','B','1');//9

escribir($pdf,10,63,194,4.5,'',0,9,'L','','1'); //10
escribir($pdf,10,63,8,4.5,'10',0,9,'C','B','1');//10
escribir($pdf,18,63,130,4.5,'',0,9,'C','B','1');//10

escribir($pdf,10,67.5,194,4.5,'',0,9,'L','','1'); //11
escribir($pdf,10,67.5,8,4.5,'11',0,9,'C','B','1');//11
escribir($pdf,18,67.5,130,4.5,'',0,9,'C','B','1');//11

escribir($pdf,10,72,194,4.5,'',0,9,'L','','1'); //12
escribir($pdf,10,72,8,4.5,'12',0,9,'C','B','1');//12
escribir($pdf,18,72,130,4.5,'',0,9,'C','B','1');//12

escribir($pdf,10,76.5,194,4.5,'',0,9,'L','','1'); //13
escribir($pdf,10,76.5,8,4.5,'13',0,9,'C','B','1');//13
escribir($pdf,18,76.5,130,4.5,'',0,9,'C','B','1');//13

escribir($pdf,10,81,194,4.5,'',0,9,'L','','1'); //14
escribir($pdf,10,81,8,4.5,'14',0,9,'C','B','1');//14
escribir($pdf,18,81,130,4.5,'',0,9,'C','B','1');//14

escribir($pdf,10,85.5,194,4.5,'',0,9,'L','','1'); //15
escribir($pdf,10,85.5,8,4.5,'15',0,9,'C','B','1');//15
escribir($pdf,18,85.5,130,4.5,'',0,9,'C','B','1');//15

escribir($pdf,10,90,194,4.5,'',0,9,'L','','1'); //16
escribir($pdf,10,90,8,4.5,'16',0,9,'C','B','1');//16
escribir($pdf,18,90,130,4.5,'',0,9,'C','B','1');//16

escribir($pdf,10,94.5,194,4.5,'',0,9,'L','','1'); //17
escribir($pdf,10,94.5,8,4.5,'17',0,9,'C','B','1');//17
escribir($pdf,18,94.5,130,4.5,'',0,9,'C','B','1');//17

escribir($pdf,10,99,194,4.5,'',0,9,'L','','1'); //18
escribir($pdf,10,99,8,4.5,'18',0,9,'C','B','1');//18
escribir($pdf,18,99,130,4.5,'',0,9,'C','B','1');//18

escribir($pdf,10,103.5,194,4.5,'',0,9,'L','','1'); //19
escribir($pdf,10,103.5,8,4.5,'19',0,9,'C','B','1');//19
escribir($pdf,18,103.5,130,4.5,'',0,9,'C','B','1');//19

escribir($pdf,10,108,194,4.5,'',0,9,'L','','1'); //20
escribir($pdf,10,108,8,4.5,'20',0,9,'C','B','1');//20
escribir($pdf,18,108,130,4.5,'',0,9,'C','B','1');//20

escribir($pdf,10,112.5,194,4.5,'',0,9,'L','','1'); //21
escribir($pdf,10,112.5,8,4.5,'21',0,9,'C','B','1');//21
escribir($pdf,18,112.5,130,4.5,'',0,9,'C','B','1');//21

escribir($pdf,10,117,194,4.5,'',0,9,'L','','1'); //22
escribir($pdf,10,117,8,4.5,'22',0,9,'C','B','1');//22
escribir($pdf,18,117,130,4.5,'',0,9,'C','B','1');//22

escribir($pdf,10,121.5,194,4.5,'',0,9,'L','','1'); //23
escribir($pdf,10,121.5,8,4.5,'23',0,9,'C','B','1');//23
escribir($pdf,18,121.5,130,4.5,'',0,9,'C','B','1');//23

escribir($pdf,10,126,194,4.5,'',0,9,'L','','1'); //24
escribir($pdf,10,126,8,4.5,'24',0,9,'C','B','1');//24
escribir($pdf,18,126,130,4.5,'',0,9,'C','B','1');//24

escribir($pdf,10,130.5,194,4.5,'',0,9,'L','','1'); //25
escribir($pdf,10,130.5,8,4.5,'25',0,9,'C','B','1');//25
escribir($pdf,18,130.5,130,4.5,'',0,9,'C','B','1');//25

escribir($pdf,10,135,194,4.5,'',0,9,'L','','1'); //26
escribir($pdf,10,135,8,4.5,'26',0,9,'C','B','1');//26
escribir($pdf,18,135,130,4.5,'',0,9,'C','B','1');//26

escribir($pdf,10,139.5,194,4.5,'',0,9,'L','','1'); //27
escribir($pdf,10,139.5,8,4.5,'27',0,9,'C','B','1');//27
escribir($pdf,18,139.5,130,4.5,'',0,9,'C','B','1');//27

escribir($pdf,10,144,194,4.5,'',0,9,'L','','1'); //28
escribir($pdf,10,144,8,4.5,'28',0,9,'C','B','1');//28
escribir($pdf,18,144,130,4.5,'',0,9,'C','B','1');//28

escribir($pdf,10,148.5,194,4.5,'',0,9,'L','','1'); //29
escribir($pdf,10,148.5,8,4.5,'29',0,9,'C','B','1');//29
escribir($pdf,18,148.5,130,4.5,'',0,9,'C','B','1');//29

escribir($pdf,10,153,194,4.5,'',0,9,'L','','1'); //30
escribir($pdf,10,153,8,4.5,'30',0,9,'C','B','1');//30
escribir($pdf,18,153,130,4.5,'',0,9,'C','B','1');//30

escribir($pdf,10,157.5,194,4.5,'',0,9,'L','','1'); //31
escribir($pdf,10,157.5,8,4.5,'31',0,9,'C','B','1');//31
escribir($pdf,18,157.5,130,4.5,'',0,9,'C','B','1');//31

escribir($pdf,10,162,194,4.5,'',0,9,'L','','1'); //32
escribir($pdf,10,162,8,4.5,'32',0,9,'C','B','1');//32
escribir($pdf,18,162,130,4.5,'',0,9,'C','B','1');//32

escribir($pdf,10,166.5,194,4.5,'',0,9,'L','','1'); //33
escribir($pdf,10,166.5,8,4.5,'33',0,9,'C','B','1');//33
escribir($pdf,18,166.5,130,4.5,'',0,9,'C','B','1');//33

escribir($pdf,10,171,194,4.5,'',0,9,'L','','1'); //34
escribir($pdf,10,171,8,4.5,'34',0,9,'C','B','1');//34
escribir($pdf,18,171,130,4.5,'',0,9,'C','B','1');//34

escribir($pdf,10,175.5,194,4.5,'',0,9,'L','','1'); //35
escribir($pdf,10,175.5,8,4.5,'35',0,9,'C','B','1');//35
escribir($pdf,18,175.5,130,4.5,'',0,9,'C','B','1');//35

escribir($pdf,10,180,194,4.5,'',0,9,'L','','1'); //36
escribir($pdf,10,180,8,4.5,'36',0,9,'C','B','1');//36
escribir($pdf,18,180,130,4.5,'',0,9,'C','B','1');//36

escribir($pdf,10,184.5,194,4.5,'',0,9,'L','','1'); //37
escribir($pdf,10,184.5,8,4.5,'37',0,9,'C','B','1');//37
escribir($pdf,18,184.5,130,4.5,'',0,9,'C','B','1');//37

escribir($pdf,10,189,194,4.5,'',0,9,'L','','1'); //38
escribir($pdf,10,189,8,4.5,'38',0,9,'C','B','1');//38
escribir($pdf,18,189,130,4.5,'',0,9,'C','B','1');//38

escribir($pdf,10,193.5,194,4.5,'',0,9,'L','','1'); //39
escribir($pdf,10,193.5,8,4.5,'39',0,9,'C','B','1');//39
escribir($pdf,18,193.5,130,4.5,'',0,9,'C','B','1');//39

escribir($pdf,10,198,194,4.5,'',0,9,'L','','1'); //40
escribir($pdf,10,198,8,4.5,'40',0,9,'C','B','1');//40
escribir($pdf,18,198,130,4.5,'',0,9,'C','B','1');//40

escribir($pdf,10,205,120,5,'NOTA: SE DEBE ANEXAR FOTOCOPIA DE LA CÉDULA DEL CONTRATANTE.',0,9,'L','B','0');

escribir($pdf,10,213,120,5,'Para constacia se firma en Pereira, a los '.$xfechafirma,0,9,'L','','0');

escribir($pdf,10,224,22,5,'LA EMPRESA, ',0,8,'L','B','0');
$pdf->Image('img/firma.jpg',10,232,46);
// escribir($pdf,10,239,120,5,'CARLOS ANDRES RINCON',0,8,'L','B','1');
// escribir($pdf,10,244,120,5,'C.C. 10.032.993',0,8,'L','B','1');
// escribir($pdf,10,249,120,5,'REPRESENTANTE LEGAL',0,8,'L','B','1');
// escribir($pdf,10,254.3,120,5,'ROYAL TOUR PLUS S.A.S.',0,8,'L','B','1');
escribir($pdf,10,243,54,4,'CARLOS ANDRES RINCON C.C.10.032.993           REPRESENTANTE LEGAL COOPERATIVA ROYAL EXPRESS',1,9,'L','B','0');

escribir($pdf,90,224,22,5,'EL CONTRATANTE, ',0,8,'L','B','0');
escribir($pdf,100,243,16,5,'NOMBRE:_______________________________________________',0,9,'L','B','0');
escribir($pdf,116,243,83,5,$xresponsable,0,9,'L','','0');

escribir($pdf,100,246.5,15,5,'CÉDULA:________________________________________________',0,9,'L','B','0');
escribir($pdf,116,246.5,84,5,$xcedularesponsable,0,9,'L','','0');

escribir($pdf,100,250.5,20,5,'DIRECCIÓN:_____________________________________________',0,9,'L','B','0');

escribir($pdf,120,250.5,79,5,$xdireccion,0,9,'L','','0');

escribir($pdf,100,254.3,19,5,'TELÉFONO:_____________________________________________',0,9,'L','B','0');

escribir($pdf,119,254.3,80,5,$xtelefono,0,9,'L','','0');

// llegamos al fin
// necesitamos otra pagina
// escribir($pdf,10,$xfila+15,195,5,$fin,1,8,'J','');

$pdf->Output();

?>