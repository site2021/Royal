<?php

$id = intval($_REQUEST['id']);
$salida = htmlspecialchars($_REQUEST['salida']);
$horasalida = htmlspecialchars($_REQUEST['horasalida']);

include 'conex.php';

$sql = "UPDATE tbtrekkingcovid SET salida='$salida',horasalida='$horasalida' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));

}
?>