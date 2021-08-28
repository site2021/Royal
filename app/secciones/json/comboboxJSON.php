<?php
$combo = $_GET['combo'];

include '../admin/conn.php';

$rs = mysql_query("select id,nombre from ".$combo." order by nombre");

$items = array();

while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);


?>