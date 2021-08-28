<?php

$producto = $_REQUEST['producto'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT id, nombre FROM tbtarifas WHERE id_producto='$producto' ORDER BY id");	

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);


?>