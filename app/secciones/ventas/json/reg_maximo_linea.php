<?php

include '../../../control/conex.php';

$numero = $_REQUEST['numero'];

$rs = mysqli_query($conexion, "SELECT MAX(linea) FROM tbregistrosdetalles WHERE numero='$numero' ");

if($rs){
	$row = mysqli_fetch_row($rs);
	$maximo = $row[0];	
}else {
	$maximo = 0;
}

echo json_encode(array('success'=>true,'lmaximo'=>$maximo));

?>