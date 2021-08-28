<?php

$cedula = $_REQUEST['cedula'];

include '../../app/control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbcovid WHERE cedula='$cedula' ");

$items = array();
$row = mysqli_fetch_object($rs);
array_push($items, $row);

echo json_encode($items);

?>