<?php

$interno = htmlspecialchars($_REQUEST['interno']);
$fecha = htmlspecialchars($_REQUEST['fecha']);
$taller = htmlspecialchars($_REQUEST['taller']);
$km = htmlspecialchars($_REQUEST['km']);
$tipo = htmlspecialchars($_REQUEST['tipo']);
$mecanico = htmlspecialchars($_REQUEST['mecanico']);
$descripcion = htmlspecialchars($_REQUEST['descripcion']);
$consecutivo = htmlspecialchars($_REQUEST['consecutivo']);

include 'conex.php';

$sql = "INSERT INTO tbmantenimientos (interno,fecha,taller,km,tipo,mecanico,descripcion,consecutivo) 
		VALUES ('$interno','$fecha','$taller','$km','$tipo','$mecanico','$descripcion','$consecutivo')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>