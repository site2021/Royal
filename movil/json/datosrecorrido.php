<?php

include 'conex.php';

$origen = $_REQUEST['origen'];
$destino = $_REQUEST['destino'];

$rs = mysqli_query($conexion, "SELECT * FROM tbrutasextractos WHERE origen='$origen' AND destino='$destino'");

$items = array();
$row = mysqli_fetch_object($rs);
array_push($items, $row);

echo json_encode($items);

?>