<?php

$id = intval($_REQUEST['id']);
$usuario = htmlspecialchars($_REQUEST['usuario']);
$nombre = htmlspecialchars($_REQUEST['nombre']);
$clave = htmlspecialchars($_REQUEST['clave']);
$perfil = htmlspecialchars($_REQUEST['perfil']);
include '../control/conex.php';

$sql = "UPDATE tbestudiantes SET usuario='$usuario',nombre='$nombre',clave='$clave',perfil='$perfil' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'usuario' => $usuario,
		'nombre' => $nombre,
		'clave' => $clave,
		'perfil' => $perfil
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>