<?php

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT id codigo, destino FROM tbrutasextractos ");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>