<?php

$id = intval($_REQUEST['id']);
$pvalor = $_REQUEST['pvalor'];
$pagoconductor = $_REQUEST['pagoconductor'];
$comision = $_REQUEST['comision'];
$utilidad = $_REQUEST['utilidad'];
$estado = $_REQUEST['estado'];

$finicio = $_REQUEST['finicio'];
$ffin = $_REQUEST['ffin'];
$pfecha = $_REQUEST['pfecha'];

$pforma = $_REQUEST['pforma'];

include '../../../control/conex.php';

$sql = "UPDATE tbregistros SET pvalor='$pvalor', pagoconductor='$pagoconductor', comision='$comision', utilidad='$utilidad',
		estado='$estado', finicio='$finicio', ffin='$ffin', pfecha='$pfecha', pforma='$pforma' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>