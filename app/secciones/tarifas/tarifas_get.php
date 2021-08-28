<?php

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;
$result = array();

$producto = $_REQUEST['producto'];
$descripcion = $_REQUEST['descripcion'];

include '../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT count(*) FROM tbtarifas 
							   WHERE id_producto='$producto' AND nombre LIKE '%$descripcion%' ORDER BY nombre");

$row = mysqli_fetch_row($rs);

$result["total"] = $row[0];

//$rs = mysql_query("select * from tbtarifas limit $offset,$rows");
$rs = mysqli_query($conexion, "SELECT * FROM tbtarifas 
							   WHERE id_producto='$producto' AND nombre LIKE '%$descripcion%' ORDER BY nombre");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);

?>