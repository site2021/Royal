<?php

include '../control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbporciones WHERE edad='6a12'");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>