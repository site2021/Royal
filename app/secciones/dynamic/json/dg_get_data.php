<?php

$tabla = $_REQUEST['tabla'];

include 'conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM $tabla ");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);


?>