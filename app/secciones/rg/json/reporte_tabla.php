<?php

$reporte = $_REQUEST['reporte'];

include '../../../control/conex.php';

// select reporte para traer tabla
$sql = "SELECT id_tabla FROM rbreportes WHERE id=$reporte";

$result = @mysqli_query($conexion, $sql);
$row = mysqli_fetch_row($result);

$xtabla = $row[0];

if ($result){
	echo json_encode(array('success'=>true,'idtabla'=>$xtabla));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>