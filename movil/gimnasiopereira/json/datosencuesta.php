<?php

$codigoencuesta	 = $_REQUEST['codigoencuesta'];
// $fechaencuesta	 = $_REQUEST['fechaencuesta'];

include 'conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM tbgimpereiracovid WHERE codigoencuesta LIKE '$codigoencuesta%' ");

$items = array();
$row = mysqli_fetch_object($rs);
array_push($items, $row);

echo json_encode($items);

?>