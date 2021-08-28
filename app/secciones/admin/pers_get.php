<?php

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$xperfil = isset($_POST['xperfil']) ? mysql_real_escape_string($_POST['xperfil']) : '';
$xopcion = isset($_POST['xopcion']) ? mysql_real_escape_string($_POST['xopcion']) : '';

$offset = ($page-1)*$rows;
$result = array();

include '../../control/conex.php';

$where = " perfil like '$xperfil%' and opcion like '$xopcion%' ";

$rs = mysqli_query($conexion, "SELECT count(*) FROM txmenu WHERE " . $where);

$row = mysqli_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysqli_query($conexion, "SELECT * FROM txmenu WHERE " . $where . " ORDER BY orden limit $offset,$rows ");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

$result["rows"] = $items;

echo json_encode($result);

?>