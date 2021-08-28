<?php

$tabla = $_REQUEST['tabla'];
$nombre = $_REQUEST['nombre'];
$usuario = $_REQUEST['usuario'];

include '../../../control/conex.php';

// generar id nuevo reporte
$rs = mysqli_query($conexion, "SELECT MAX(id) FROM rbreportes");
$row = mysqli_fetch_row($rs);

$xid = $row[0]+1;

// insertar nuevo reporte 
$sql = "INSERT INTO rbreportes (id_tabla,nombre,usuario) VALUES ($tabla,'$nombre','$usuario')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true,'nid'=>$xid));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>