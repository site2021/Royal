<?php
$cedula = $_GET['cedula'];
$codigo = $_GET['codigo'];


include '../admin/conn.php';

$rs = mysql_query("select * from tbgestiones where cedula='".$cedula."' and codigo='".$codigo."'");
//$rs = mysql_query("select * from tbgestiones");

if ($rs){
	$items = array();

	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}

	echo json_encode($items);
	
}


?>