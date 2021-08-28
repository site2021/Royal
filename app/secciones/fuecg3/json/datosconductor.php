<?php

include '../../../control/conex.php';

$conductor = $_REQUEST['conductor'];

$rs = mysqli_query($conexion, "SELECT cedulaconductor,vigencialicencia FROM tbconductoresrt WHERE conductor='$conductor' ");

$items = array();
$row = mysqli_fetch_object($rs);
array_push($items, $row);

echo json_encode($items);

?>