<?php

include '../../control/conex.php';

$items = array();

$rs = mysqli_query($conexion, "SELECT id codigo, nombre FROM rbtablas");

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);

}

echo json_encode($items);

?>