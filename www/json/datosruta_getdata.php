<?php

$colegio = $_REQUEST['colegio'];
$interno = $_REQUEST['interno'];

include '../../app/control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbdatosveh WHERE colegio='$colegio' AND interno='$interno' ");

$items = array();
$row = mysqli_fetch_object($rs);
array_push($items, $row);

echo json_encode($items);

?>