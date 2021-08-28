<?php

$dbase = $_REQUEST['dbase'];
$tabla = $_REQUEST['tabla'];

include 'conex.php';

$rs = mysqli_query($conexion, "SELECT ORDINAL_POSITION codigo, COLUMN_NAME nombre FROM information_schema.columns 
							   WHERE table_schema='$dbase' AND table_name='$tabla' ");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);


?>