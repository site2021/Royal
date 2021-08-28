<?php

$id = intval($_REQUEST['id']);
$peso = htmlspecialchars($_REQUEST['peso']);
$estatura = htmlspecialchars($_REQUEST['estatura']);
$edad = htmlspecialchars($_REQUEST['edad']);

include '../control/conex.php';

$sql = "UPDATE tbestudiantes SET peso='$peso',estatura='$estatura',edad='$edad' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'peso' => $peso,
		'estatura' => $estatura,
		'edad' => $edad
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>