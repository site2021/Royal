<?php

include 'conex.php';

$xinterno = $_REQUEST['suser'];

$rs = mysqli_query($conexion, "SELECT id codigo, interno, placa FROM tbvehiculos WHERE interno='$xinterno'");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>