<?php

$tabla = htmlspecialchars($_REQUEST['tabla']);

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;
$result = array();

include '../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT count(*) FROM ".$tabla);

$row = mysqli_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysqli_query($conexion, "SELECT * FROM ".$tabla." limit $offset,$rows");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);

?>