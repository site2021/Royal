<?php

include 'conex.php';

$interno = $_REQUEST['interno'];

$rs = mysqli_query($conexion, "SELECT * FROM tbvehiculos WHERE interno='$interno' ");

$items = array();
$row = mysqli_fetch_object($rs);
array_push($items, $row);

echo json_encode($items);

?>