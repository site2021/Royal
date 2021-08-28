<?php

$reporte = $_REQUEST['reporte'];
$tabla = $_REQUEST['tabla'];
$nombre = $_REQUEST['nombre'];
$clase = $_REQUEST['clase'];
$xdiv = $_REQUEST['xdiv'];

include '../../../control/conex.php';

// insertar campo de reporte 
$sql = "INSERT INTO rbreportescampos (id_reporte,id_tabla,nombre,clase,xdiv) VALUES 
		($reporte,$tabla,'$nombre','$clase','$xdiv')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('success'=>false));
}

?>