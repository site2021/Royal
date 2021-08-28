<?php

include '../../../control/conex.php';

$contrato = $_REQUEST['contrato'];

$sql = "SELECT count(*) cuantos FROM tbextractosg3 WHERE contrato='$contrato'";
$rs = mysqli_query($conexion, $sql);

$row = mysqli_fetch_object($rs);

$cuantos = $row->cuantos;

if($cuantos=='0'){
	echo json_encode(array('success'=>true,'next'=>'1'));	

}else {
	$sql = "SELECT MAX(convert(extracto,unsigned))+1 siguiente FROM tbextractosg3 WHERE contrato='$contrato'";	
	$rs = mysqli_query($conexion, $sql);
	$row = mysqli_fetch_object($rs);

	$siguiente = $row->siguiente;
	
	echo json_encode(array('success'=>true,'next'=>$siguiente));

}

// $items = array();
// while($row = mysqli_fetch_object($rs)){
// 	array_push($items, $row);
// }


// echo json_encode($items);

?>