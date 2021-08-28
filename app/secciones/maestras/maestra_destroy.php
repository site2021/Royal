<?php

$tabla = htmlspecialchars($_REQUEST['tabla']);
$id = intval($_REQUEST['id']);
$nombre = htmlspecialchars($_REQUEST['nombre']);

include '../../control/conex.php';

// validar si es colegio 
if($tabla=='txcolegios'){
	// validar si existen registrow
	$rs = mysqli_query($conexion, "SELECT count(*) FROM tbdatosliquidar WHERE colegio='$nombre' ");
	$row = mysqli_fetch_row($rs);
	if($row[0]>0){
		return;
	}
}

$sql = "DELETE FROM ".$tabla." WHERE id=".$id;

$result = @mysqli_query($conexion, $sql);

if ($result){
	// para el caso de colegio se deben borrar los registos de tbdatosnew
	if($tabla=='txcolegios'){
		// validar si existen registrow
		$rs = mysqli_query($conexion, "SELECT count(*) FROM tbdatosliquidar WHERE colegio='$nombre' ");
		$row = mysqli_fetch_row($rs);
		if($row[0]==0){
			$rsql = "DELETE FROM tbdatosnew WHERE colegio='$nombre' ";
			$rs = mysqli_query($conexion, $rsql);
		}
	}
	
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>