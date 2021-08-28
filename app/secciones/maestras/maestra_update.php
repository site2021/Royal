<?php

$tabla = htmlspecialchars($_REQUEST['tabla']);
$id = intval($_REQUEST['id']);
$nombre = htmlspecialchars($_REQUEST['nombre']);

include '../../control/conex.php';

$sql = "UPDATE ".$tabla." SET nombre='".$nombre."' WHERE id='".$id."'";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'nombre' => $nombre
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>