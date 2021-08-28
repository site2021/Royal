<?php

include 'conex.php';

$rs = mysqli_query($conexion, "SELECT tabla codigo, titulo nombre FROM txtablas ");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>