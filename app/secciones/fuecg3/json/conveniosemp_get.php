<?php

$placa = $_REQUEST['placa'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbconveniosempg3 WHERE placa='$placa' ORDER BY id");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>