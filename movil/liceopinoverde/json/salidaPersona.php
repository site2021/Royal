<?php

$id = intval($_REQUEST['id']);
$salida = htmlspecialchars($_REQUEST['salida']);
$horasalida = htmlspecialchars($_REQUEST['horasalida']);
$temperaturacasa = htmlspecialchars($_REQUEST['temperaturacasa']);

include 'conex.php';

$sql = "UPDATE tbpinoverdecovid SET salida='$salida',horasalida='$horasalida',temperaturacasa='$temperaturacasa' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));

}
?>