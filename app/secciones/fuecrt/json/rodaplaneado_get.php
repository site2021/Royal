<?php

$contrato = $_REQUEST['contrato'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbrodaplaneadort WHERE contrato='$contrato' ORDER BY id");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>