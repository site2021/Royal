<?php

$cedulaconductor = $_REQUEST['cedulaconductor'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbingresoretiro WHERE cedulaconductor='$cedulaconductor' ORDER BY id");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>