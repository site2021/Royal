<?php

include '../../../control/conex.php';

// WHERE vigencialicencia<= NOW()

$rs = mysqli_query($conexion, "SELECT id codigo, conductor FROM tbconductores ");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>