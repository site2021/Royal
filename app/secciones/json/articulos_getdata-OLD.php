<?php
	include '../admin/conn.php';

	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$itemid = isset($_POST['itemid']) ? mysql_real_escape_string($_POST['itemid']) : '';
	$productid = isset($_POST['productid']) ? mysql_real_escape_string($_POST['productid']) : '';
	
	$offset = ($page-1)*$rows;
	
	$result = array();
	
	$where = "codigo like '$itemid%' and descripcion like '$productid%'";
	$rs = mysql_query("select count(*) from tbarticulos where " . $where);
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	
	$rs = mysql_query("select * from tbarticulos where " . $where . " and ROWNUM>=$offset AND ROWNUM<=$rows");
	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;
	
	echo json_encode($result);
?>