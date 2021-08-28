<?php

include 'conex.php';

$tabla = $_REQUEST['tabla'];

$rs = mysqli_query($conexion, "SELECT * FROM information_schema.columns WHERE table_name='$tabla'");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>