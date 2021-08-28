<?php

$cedula = htmlspecialchars($_REQUEST['cedula']);
$codigo = htmlspecialchars($_REQUEST['codigo']);
$fecha = htmlspecialchars($_REQUEST['fecha']);
$hora = htmlspecialchars($_REQUEST['hora']);
$id_accion = htmlspecialchars($_REQUEST['id_accion']);
$id_contacto = htmlspecialchars($_REQUEST['id_contacto']);
$id_causal = htmlspecialchars($_REQUEST['id_causal']);
$id_arreglo = htmlspecialchars($_REQUEST['id_arreglo']);
$id_actividad = htmlspecialchars($_REQUEST['id_actividad']);
$id_via = htmlspecialchars($_REQUEST['id_via']);
$observacion = htmlspecialchars($_REQUEST['observacion']);
$compromiso_fecha = htmlspecialchars($_REQUEST['compromiso_fecha']);
$compromiso_valor = htmlspecialchars($_REQUEST['compromiso_valor']);

include '../admin/conn.php';

$sql = "insert into tbgestiones(fecha,hora,cedula,codigo,id_accion,id_contacto,id_causal,id_arreglo,
		id_actividad,id_via,observacion,compromiso_fecha,compromiso_valor) 
		values
		('$fecha','$hora','$cedula','$codigo','$id_accion','$id_contacto','$id_causal','$id_arreglo',
		 '$id_actividad','$id_via','$observacion','$compromiso_fecha','$compromiso_valor')";

$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id' => mysql_insert_id(),
		'fecha' => $fecha,
		'hora' => $hora,
		'cedula' => $cedula,
		'codigo' => $codigo,
		'id_accion' => $id_accion,
		'id_contacto' => $id_contacto,
		'id_causal' => $id_causal,
		'id_arreglo' => $id_arreglo,
		'id_actividad' => $id_actividad,
		'id_via' => $id_via,
		'observacion' => $observacion,
		'compromiso_fecha' => $compromiso_fecha,
		'compromiso_valor' => $compromiso_valor
		
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>