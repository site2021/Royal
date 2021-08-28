<?php

include '../../../control/conex.php';

$cliente = $_REQUEST['cliente'];

$rs = mysqli_query($conexion, "SELECT * FROM tbclientes WHERE contacto='$cliente' ");

$items = array();
$row = mysqli_fetch_object($rs);
array_push($items, $row);

echo json_encode($items);

?>