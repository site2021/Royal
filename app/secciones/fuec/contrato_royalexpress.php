<?php
require('code128-rev.php');

include '../../control/conex.php';

$extracto = $_REQUEST['extracto'];
$xcontrato = $_REQUEST['contrato'];
$xcedularesponsable = $_REQUEST['cedularesponsable'];

// coleccion de textos del contrato
include 'contrato-textos.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbextractos WHERE extracto='$extracto' AND contrato='$xcontrato' AND cedularesponsable='$xcedularesponsable'");

$row = mysqli_fetch_object($rs);

$xcontrato = $row->contrato;
$xcliente = $row->cliente;
$xfechainicio = $row->fechainicio;
$xfechafin = $row->fechafin;
$xorigen = $row->origen;
$xrecorrido = $row->recorrido;
$xplaca = $row->placa;
$xclase = $row->clase;
$xinterno = $row->interno;

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




$pdf = new PDF_Code128();

$pdf->AddPage('P','Letter');

// logo
$pdf->Image('royal001.jpg',80,5,54);

// escribir(pdf, x, y, w, h, texto, [0-cell, 1-multiline], size, align, [style:bold,normal] )
escribir($pdf,10,25,195,7,'CONTRATO DE PRESTACIÓN DE SERVICIOS DE TRANSPORTE No. '.$xcontrato,0,9,'C','B');

// escribir($pdf,10,25,100,5,'Pereira, '.$xfecha,0,8,'L','');

escribir($pdf,20,35,175,4,'Entre, LA COOPERATIVA MULTIACTIVA DE TRANSPORTES ESPECIALES Y TURISMO ROYAL EXPRESS, identificada con el Nit.891.408.122-6  representada en el presente acto por el señor CARLOS ANDRES RINCON VASQUEZ, mayor de edad, vecino de Pereira, identificado como aparece al pie de su firma, quien obra en su calidad de REPRESENTANTE LEGAL, y quien en adelante se llamará LA COOPERATIVA, y de otro lado '.$xcliente.', mayor de edad, vecino de la ciudad de Pereira, identificado como aparece al pie de su firma, y quien en lo sucesivo se denominará EL CONTRATANTE, han convenido en celebrar un contrato de prestación de SERVICIO DE TRANSPORTE que se regulará por las cláusulas que a continuación se expresan y en general por las normas vigentes aplicables a la materia de este contrato: PRIMERO. OBJETO.- LA COOPERATIVA, de manera independiente, prestará el servicio de TRANSPORTE a EL CONTRATANTE desde el '.$xfechainicio.' hasta el '.$xfechafin.' desde la ciudad de '.$xorigen.' con el siguiente recorrido '.$xrecorrido.'. VEHÍCULO: El vehículo asignado para la prestación del servicio será: PLACA: '.$xplaca.', CLASE: '.$xclase.', NUMERO INTERNO: '.$xinterno.' SEGUNDA. PRECIO.- EL CONTRATANTE, pagará, por la prestación del servicio de transporte, la siguiente suma de dinero  $________________, suma esta que será cancelada así: ____ CREDITO ____ CONTADO TERCERA. OBLIGACIONES DE LA COOPERATIVA.- Constituyen las principales obligaciones para LA COOPERATIVA: a) Poner los vehículos solicitados a disposición del CONTRATANTE; b) Realizar los recorridos acordados previamente con el CONTRATANTE; c) Verificar en caso de que algún vehículo no pueda prestar el servicio, la reposición del mismo en el menor tiempo posible. d) Permitir que el CONTRATANTE modifique los recorridos cuando lo estime necesario, previa acuerdo con el CONTRATANTE. CUARTA. OBLIGACIONES DEL CONTRATANTE.- EL CONTRATANTE se obliga a: a) A pagar la suma acordada por la prestación del servicio contratado; b) A indicar a la COOPERATIVA los recorridos a realizar para el transporte de las personas designadas por el CONTRATANTE; c) A suministrar al conductor del vehículo el almuerzo del día contratado, o en su defecto a otorgar el tiempo necesario para almorzar. d) A nombrar un coordinador de actividades para cada vehículo contratado, quien indicará el recorrido a efectuarse de acuerdo con la zona asignada. QUINTA. DURACION.- El presente contrato se celebra desde el '.$xfechainicio.' hasta el '.$xfechafin.'____. PARAGRAFO. SUSPENSIÓN TEMPORAL.-Las partes de común acuerdo podrán suspender el contrato, para lo cual suscribirán un acta en la cual se indicarán las razones de la suspensión y el término de duración de la misma. SEXTA. CONTRATO COMERCIAL Y AUTONOMÍA.-LA COOPERATIVA realizará su actividad de manera autónoma e independiente y utilizará en el cumplimiento de su labor su propio personal, sin que haya subordinación jurídica alguna entre él, sus colaboradores y dependientes y EL CONTRATANTE.  En consecuencia, EL CONTRATANTE declara que el presente contrato es de naturaleza comercial y que no existe ningún vínculo laboral entre sus colaboradores o el personal que él contrate y LA COOPERATIVAy, por tanto, conceptos tales como honorarios, salarios, prestaciones, subsidios, afiliaciones, indemnizaciones, etc., que sobrevengan por causa o con ocasión de los servicios de dicho personal serán asumidos exclusivamente por LA COOPERATIVA. SEPTIMA.: CLÁUSULA PENAL.-  El incumplimiento total o parcial de las obligaciones derivadas del presente contrato, faculta a cualquiera de las partes a exigirle al contratante incumplido de manera inmediata a título de pena, una  suma equivalente al 10% del valor del contrato, suma que podrá ser exigida ejecutivamente sin necesidad de requerimiento ni de constitución en mora, sin perjuicio de la posibilidad de exigir las demás prestaciones que resulten en virtud del presente negocio jurídico y sin que se extinga la obligación principal.  OCTAVA. TÍTULO EJECUTIVO.- Para todos los efectos, y por contener obligaciones claras, expresas y por ser determinable su exigibilidad, las partes acuerdan que el presente contrato presta mérito ejecutivo ante juez competente. PARÁGRAFO. Cualquier modificación a los términos aquí contenidos deberá constar en documento escrito suscrito por cada una de las partes. NOVENA. SOLUCIÓN ALTERNATIVA DE CONFLICTOS.-  En caso de suscitarse cualquier diferencia surgida con ocasión del presente contrato, los contratantes acudirán a los mecanismos de solución de controversias extrajudiciales establecidos en la Ley 446 de 1998, tales como la transacción, conciliación y amigable composición, para solucionar las diferencias surgidas en la ejecución del contrato. DÉCIMA.CONFIDENCIALIDAD: La información de cada una de las partes del presente contrato, o de las personas o entidades vinculadas a éstas, que la otra parte llegue a conocer en virtud de este convenio tendrá el carácter de confidencial; por tanto, las partes se comprometen a que ni ellas, ni sus empleados y/o colaboradores revelarán, difundirán, comentarán, analizarán, evaluarán, copiarán o harán uso diferente del previsto en este convenio. Tampoco utilizarán dicha información para el ejercicio de su propia actividad, ni la duplicarán o compartirán con terceras personas, salvo autorización previa y escrita de la parte interesada. Cada una de las partes se obliga a adoptar todas las medidas necesarias o convenientes para garantizar la reserva de la información de la otra a la que tenga acceso con ocasión del presente convenio, comprometiéndose a que tales medidas o precauciones no serán, en ningún caso, menores a las que deba adquirir un profesional en el manejo de información. La información que cualquiera de las partes llegue a conocer de la otra en virtud de este convenio se utilizará exclusivamente para los fines del mismo.  Dicha información no será divulgada a terceros sin el consentimiento escrito de la otra parte, aún con posterioridad a la terminación del presente convenio. Cualquier violación a esta disposición facultará a la parte afectada para ejercer las acciones a que haya lugar. DECIMA PRIMERA. TERMINACION ANORMAL.- El incumplimiento de las obligaciones nacidas de este acuerdo de voluntades por una de las partes, facultará a la otra para dar por terminado el contrato, sin que sea necesario requerimiento de ninguna índole.DECIMA SEGUNDA. MANEJO DE INFORMACIÓN PERSONAL.-  En ejercicio de mi derecho a la libertad y autodeterminación informática, AUTORIZO de manera expresa, concreta, suficiente, voluntaria, informada e irrevocable a la COOPERATIVA MULTIACTIVA DE TRANSPORTES ESPECIALES Y TURISMO ROYAL EXPRESS, o a quien represente sus derechos u ostente en el futuro a cualquier título la calidad de acreedor a: capturar, tratar, procesar, operar, verificar, transmitir, transferir, usar, poner en circulación, consultar, divulgar, reportar y solicitar toda la información que se refiere a nuestro comportamiento crediticio, financiero, comercial y de servicios de los cuales somos sus titulares, referida al nacimiento, ejecución y extinción de obligaciones dinerarias (independientemente de la naturaleza del contrato que les de origen) a nuestro comportamiento e historial crediticio, incluida la información positiva y negativa de mis hábitos de pago y aquella que se refiera a la información personal necesaria para el estudio, análisis y eventual otorgamiento de un crédito o celebración de un contrato, para que dicha información sea concernida y reportada en cualquier CENTRAL DE RIESGOS o BASE DE DATOS. La permanencia de mi información en las bases de datos será determinada por el ordenamiento jurídico aplicable, en especial por las normas legales y la jurisprudencia, los cuales contienen mis derechos y obligaciones, que por ser públicos, conozco plenamente. Así mismo manifiesto que conozco el reglamento de las CENTRALES DE RIESGOS. En caso de que en el futuro, el autorizado en este documento efectúe una venta de cartera o una cesión de cualquier título de las obligaciones a mi cargo a favor de un tercero, los efectos de la presente autorización se extenderán a éste, en los mismos términos y condiciones.                                                                                                                                                                           	                                                                                                                                                                                                   	                                             LISTA DE PASAJEROS                                                                                                                                                                                                                                                                                                                                                                                                                                                No                                                                    NOMBRE                                                                          DOCUMENTO DE IDENTIFICACION',1,7.5,'J','');

// escribir($pdf,10,45,195,5,$encabeza,1,8,'J','');

// datos del contrato
// titulos



// Y ahora empieza la gran estampida
$xfila=$xfila+60;
// escribir($pdf,10,$xfila,195,5,$inicio,1,8,'J','');

// // punto-1
// escribir($pdf,10,$xfila+10,5,5,'1.',0,8,'L','B');
// escribir($pdf,15,$xfila+10,190,5,$punto1,1,8,'J','');

// // punto-2
// escribir($pdf,10,$xfila+40,5,5,'2.',0,8,'L','B');
// escribir($pdf,15,$xfila+40,190,5,$punto2,1,8,'J','');

// // punto-3
// escribir($pdf,10,$xfila+55,5,5,'3.',0,8,'L','B');
// escribir($pdf,15,$xfila+55,190,5,$punto3,1,8,'J','');

// // punto-4
// escribir($pdf,10,$xfila+85,5,5,'4.',0,8,'L','B');
// escribir($pdf,15,$xfila+85,190,5,$punto4,1,8,'J','');

// punto-5
// escribir($pdf,10,$xfila+100,5,5,'5.',0,8,'L','B');
// escribir($pdf,15,$xfila+100,190,5,$punto5,1,8,'J','');

// // punto-6
// escribir($pdf,10,$xfila+110,5,5,'6.',0,8,'L','B');
// escribir($pdf,15,$xfila+110,190,5,$punto6,1,8,'J','');

// // punto-7
// escribir($pdf,10,$xfila+125,5,5,'7.',0,8,'L','B');
// escribir($pdf,15,$xfila+125,190,5,$punto7,1,8,'J','');

// // punto-8
// escribir($pdf,10,$xfila+135,5,5,'8.',0,8,'L','B');
// escribir($pdf,15,$xfila+135,190,5,$punto8,1,8,'J','');

// -----------------------------------------------------------

// punto-9
// escribir($pdf,10,$xfila+15,5,5,'9.',0,8,'L','B');
// escribir($pdf,15,$xfila+15,190,5,$punto9,1,8,'J','');

// // punto-10
// escribir($pdf,10,$xfila+35,5,5,'10.',0,8,'L','B');
// escribir($pdf,15,$xfila+35,190,5,$punto10,1,8,'J','');

// // punto-11
// escribir($pdf,10,$xfila+55,5,5,'11.',0,8,'L','B');
// escribir($pdf,15,$xfila+55,190,5,$punto11,1,8,'J','');

// // punto-12
// escribir($pdf,10,$xfila+85,5,5,'12.',0,8,'L','B');
// escribir($pdf,15,$xfila+85,190,5,$punto12,1,8,'J','');

// // titulo
// escribir($pdf,10,$xfila+135,195,5,$titulopro,0,8,'L','');

// // proteccion de datos
// escribir($pdf,10,$xfila+145,195,5,$tproteccion,1,8,'J','');

// // puntu-1
// escribir($pdf,10,$xfila+205,5,5,'1.',0,8,'L','B');
// escribir($pdf,15,$xfila+205,190,5,$texto1,1,8,'J','');

// escribir($pdf,10,$xfila+220,5,5,'2.',0,8,'L','B');
// escribir($pdf,15,$xfila+220,190,5,$texto2,1,8,'J','');


// -----------------------------------------------------------

$pdf->Output();

?>