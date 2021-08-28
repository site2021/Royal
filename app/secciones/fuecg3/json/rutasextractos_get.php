<?php

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbrutasextractos ORDER BY nombreruta asc");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>