<?php

include '../../app/control/conex.php';

$interno = $_REQUEST['interno'];
$colegio = $_REQUEST['colegio'];
$ruta = $_REQUEST['ruta'];
$fecha = $_REQUEST['fecha'];
$jornada = $_REQUEST['jornada'];

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;
$result = array();

$where = " interno='$interno' AND colegio='$colegio' AND ruta='$ruta' AND fecha='$fecha' AND jornada='$jornada' ";

$rs = mysqli_query($conexion, "SELECT count(*) FROM tbasistencia WHERE ".$where);
$row = mysqli_fetch_row($rs);

$result["total"] = $row[0];

$rs = mysqli_query($conexion, "SELECT * FROM tbasistencia WHERE ".$where." LIMIT $offset,$rows");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);

?>