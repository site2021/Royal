<?php

$codigo = htmlspecialchars($_REQUEST['codigo']);
$nombre = htmlspecialchars($_REQUEST['nombre']);

include '../../control/conex.php';

$sql = "INSERT INTO txvigencias(codigo,nombre)
		VALUES('$codigo','$nombre')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'codigo' => $codigo,
		'nombre' => $nombre
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>