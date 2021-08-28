<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$xdescripcion = isset($_POST['xdescripcion']) ? mysql_real_escape_string($_POST['xdescripcion']) : '';

	$offset = ($page-1)*$rows;
	$result = array();

	include '../admin/conn.php';
	
	$where = " concat(cartera,cedula,nombres,apellidos) like '%$xdescripcion%' ";
	$rs = mysql_query("select count(*) from tbclientes where " . $where);
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysql_query("select * from tbclientes where " . $where . " limit $offset,$rows");
	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);

?>