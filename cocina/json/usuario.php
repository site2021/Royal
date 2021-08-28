<?php

$usuario = htmlspecialchars($_REQUEST['usuario']);
$nombre = htmlspecialchars($_REQUEST['nombre']);
$clave = htmlspecialchars($_REQUEST['clave']);
$perfil = htmlspecialchars($_REQUEST['perfil']);

include '../control/conex.php';

$sql = "INSERT INTO tbestudiantes(usuario,nombre,clave,perfil)
		VALUES('$usuario','$nombre','$clave','$perfil')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'usuario' => $usuario,
		'nombre' => $nombre,
		'clave' => $clave,
		'perfil' => $perfil

	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>