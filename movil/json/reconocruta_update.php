<?php

$id = intval($_REQUEST['id']);
$interno = htmlspecialchars($_REQUEST['interno']);
$colegio = htmlspecialchars($_REQUEST['rcolegio']);
$ruta = htmlspecialchars($_REQUEST['rruta']);
$codigo = htmlspecialchars($_REQUEST['codigo']);
$nombre = htmlspecialchars($_REQUEST['nombre']);
$grado = htmlspecialchars($_REQUEST['grado']);
$direccion = htmlspecialchars($_REQUEST['direccion']);
$barrio = htmlspecialchars($_REQUEST['barrio']);
$celular = htmlspecialchars($_REQUEST['celular']);
$presentacion = htmlspecialchars($_REQUEST['presentacion']);
$fecha = htmlspecialchars($_REQUEST['rfecha']);
$nombrerecibe = htmlspecialchars($_REQUEST['nombrerecibe']);
$horarecogida = htmlspecialchars($_REQUEST['horarecogida']);
$horaregreso = htmlspecialchars($_REQUEST['horaregreso']);

include 'conex.php';

$sql = "UPDATE tbreconocruta SET direccion='$direccion',barrio='$barrio',celular='$celular',presentacion='$presentacion',fecha='$fecha',nombrerecibe='$nombrerecibe',horarecogida='$horarecogida',horaregreso='$horaregreso' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));

}
?>