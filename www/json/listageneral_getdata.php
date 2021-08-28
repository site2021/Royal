<?php

include '../../app/control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tblistageneral WHERE codigo LIKE '6%' ORDER BY id");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>