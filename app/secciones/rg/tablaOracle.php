<?php

$tabla = $_REQUEST['tabla'];

include '../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT oracle, vst_mysql FROM rbtablas WHERE id=$tabla");
$row = mysqli_fetch_row($rs);

if($row[0]==null){
	// en caso de ser null es mysql
	$noracle = $row[1];
	$xdb = 'mysql';
} else {
	$noracle = $row[0];
	$xdb = 'oracle';
}

echo json_encode(array('success'=>true,'noracle'=>$noracle,'xdb'=>$xdb));

?>