<?php

$tabla = $_REQUEST['tabla'];

include '../../control/conex.php';

$producto = $_REQUEST['producto'];

// Iniciar vector de elemantos
$items = array();

$rs = mysqli_query($conexion,"SELECT nombre FROM txautomotores WHERE id_producto='$producto' ORDER BY id");

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);	
}

echo json_encode($items);

?>