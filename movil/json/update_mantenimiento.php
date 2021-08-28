<?php

$id = intval($_REQUEST['id']);
$interno = htmlspecialchars($_REQUEST['interno']);
$fecha = htmlspecialchars($_REQUEST['fecha']);
$taller = htmlspecialchars($_REQUEST['taller']);
$km = htmlspecialchars($_REQUEST['km']);
$tipo = htmlspecialchars($_REQUEST['tipo']);
$mecanico = htmlspecialchars($_REQUEST['mecanico']);
$descripcion = htmlspecialchars($_REQUEST['descripcion']);
$consecutivo = htmlspecialchars($_REQUEST['consecutivo']);

include 'conex.php';

$sql = "UPDATE tbmantenimientos SET interno='$interno',fecha='$fecha',taller='$taller',km='$km',
		tipo='$tipo', mecanico='$mecanico', descripcion='$descripcion', consecutivo='$consecutivo' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'interno' => $interno,
		'fecha' => $fecha,
		'taller' => $taller,
		'km' => $km,
		'tipo' => $tipo,
		'mecanico' => $mecanico,
		'descripcion' => $descripcion,
		'consecutivo' => $consecutivo
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>