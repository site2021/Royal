<?php

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT id codigo, interno, placa FROM tbvehiculos WHERE estado='ACTIVO' or estado='' ORDER BY interno");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>