<?php

$colegio = $_REQUEST['colegio'];
$ruta = $_REQUEST['ruta'];

include '../../app/control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbdatosveh WHERE colegio='$colegio' AND ruta='$ruta' ");

$items = array();
$row = mysqli_fetch_object($rs);
array_push($items, $row);

echo json_encode($items);

?>