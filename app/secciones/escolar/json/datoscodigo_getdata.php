<?php

$codigo = $_REQUEST['codigo'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT * FROM vst_listageneral WHERE codigo='$codigo' ");

$items = array();
$row = mysqli_fetch_object($rs);
array_push($items, $row);

echo json_encode($items);

?>