<?php
$cedula = $_GET['cedula'];

include '../admin/conn.php';

$rs = mysql_query("select * from tbcartera where cedula=".$cedula);

if ($rs){
	$items = array();

	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}

	echo json_encode($items);
	
}


?>