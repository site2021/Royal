<?php

$id = intval($_REQUEST['id']);
$temperaturaaux = htmlspecialchars($_REQUEST['temperaturaaux']);
$ingreso = htmlspecialchars($_REQUEST['ingreso']);
$horaingreso = htmlspecialchars($_REQUEST['horaingreso']);
$observaciones = htmlspecialchars($_REQUEST['observaciones']);

include 'conex.php';

$sql = "UPDATE tbtrekkingcovid SET temperaturaaux='$temperaturaaux',ingreso='$ingreso',horaingreso='$horaingreso', observaciones='$observaciones' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));

}
?>