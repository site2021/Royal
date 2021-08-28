<?php

$fecha = htmlspecialchars($_REQUEST['fecha']);
$conductor = htmlspecialchars($_REQUEST['conductor']);
$cedulaconductor = htmlspecialchars($_REQUEST['cedulaconductor']);
$seccion = htmlspecialchars($_REQUEST['seccion']);
$tipocontrato = htmlspecialchars($_REQUEST['tipocontrato']);
$cargo = htmlspecialchars($_REQUEST['cargo']);
$tipo = htmlspecialchars($_REQUEST['tipo']);
$descripcion = htmlspecialchars($_REQUEST['descripcion']);
$diasperdidos = htmlspecialchars($_REQUEST['diasperdidos']);
$tipolesion = htmlspecialchars($_REQUEST['tipolesion']);
$parteafectada = htmlspecialchars($_REQUEST['parteafectada']);
$agentelesion = htmlspecialchars($_REQUEST['agentelesion']);
$tipoaccidente = htmlspecialchars($_REQUEST['tipoaccidente']);
$investigado = htmlspecialchars($_REQUEST['investigado']);
$enviadoarl = htmlspecialchars($_REQUEST['enviadoarl']);
$causainmediata = htmlspecialchars($_REQUEST['causainmediata']);
$causabasica = htmlspecialchars($_REQUEST['causabasica']);
$accionimplementar = htmlspecialchars($_REQUEST['accionimplementar']);
$fechaejecucion = htmlspecialchars($_REQUEST['fechaejecucion']);
$responsable = htmlspecialchars($_REQUEST['responsable']);
$fechaseguimiento = htmlspecialchars($_REQUEST['fechaseguimiento']);
$observacion = htmlspecialchars($_REQUEST['observacion']);


include '../../../control/conex.php';

$sql = "INSERT INTO tbaccidentesrt(fecha,conductor,cedulaconductor,seccion,tipocontrato,cargo,tipo,descripcion,diasperdidos,tipolesion,parteafectada,agentelesion,tipoaccidente,investigado,enviadoarl,causainmediata,causabasica,accionimplementar,fechaejecucion,responsable,fechaseguimiento,observacion)
		VALUES('$fecha','$conductor','$cedulaconductor','$seccion','$tipocontrato','$cargo','$tipo','$descripcion','$diasperdidos','$tipolesion','$parteafectada','$agentelesion','$tipoaccidente','$investigado','$enviadoarl','$causainmediata','$causabasica','$accionimplementar','$fechaejecucion','$responsable','$fechaseguimiento','$observacion')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'fecha' => $fecha,
		'conductor' => $conductor,
		'cedulaconductor' => $cedulaconductor,
		'seccion' => $seccion,
		'tipocontrato' => $tipocontrato,
		'cargo' => $cargo,
		'tipo' => $tipo,
		'descripcion' => $descripcion,
		'diasperdidos' => $diasperdidos,
		'tipolesion' => $tipolesion,
		'parteafectada' => $parteafectada,
		'agentelesion' => $agentelesion,
		'tipoaccidente' => $tipoaccidente,
		'investigado' => $investigado,
		'enviadoarl' => $enviadoarl,
		'causainmediata' => $causainmediata,
		'causabasica' => $causabasica,
		'accionimplementar' => $accionimplementar,
		'fechaejecucion' => $fechaejecucion,
		'responsable' => $responsable,
		'fechaseguimiento' => $fechaseguimiento,
		'observacion' => $observacion
		
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>