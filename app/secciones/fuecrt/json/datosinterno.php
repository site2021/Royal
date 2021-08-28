<?php

include '../../../control/conex.php';

$interno = $_REQUEST['interno'];
$placa = $_REQUEST['placa'];

$rs = mysqli_query($conexion, "SELECT * FROM tbvehiculosrt WHERE interno='$interno' AND placa='$placa' ");

$items = array();
$row = mysqli_fetch_object($rs);
array_push($items, $row);

echo json_encode($items);

?>