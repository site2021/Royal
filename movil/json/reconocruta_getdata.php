<?php

include 'conex.php';

$interno = $_REQUEST['interno'];
$colegio = $_REQUEST['colegio'];
$ruta = $_REQUEST['ruta'];
$fechageneral = $_REQUEST['fechageneral'];

$rs = mysqli_query($conexion, "SELECT tbreconocruta.* FROM tbreconocruta WHERE interno='$interno' AND colegio='$colegio' AND ruta='$ruta' AND fechageneral='$fechageneral' ORDER BY convert(codigo,unsigned) ");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>