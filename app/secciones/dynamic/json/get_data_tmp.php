<?php

include 'conex.php';

$tabla = $_REQUEST['tabla'];
$campo = $_REQUEST['campo'];

$rs = mysqli_query($conexion, "SELECT * FROM information_schema.columns WHERE table_name='$tabla' AND column_name='$campo' ");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>