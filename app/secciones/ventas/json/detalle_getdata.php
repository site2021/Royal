<?php

$usuario = $_REQUEST['usuario'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbregistrosdetdig WHERE usuario='$usuario' ORDER BY id");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>