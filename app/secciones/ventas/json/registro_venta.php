<?php

$xnumero = $_REQUEST['numero'];

$xfinicio = $_REQUEST['finicio'];
$xffin = $_REQUEST['ffin'];
$xpfecha = $_REQUEST['pfecha'];
$xpvalor = $_REQUEST['pvalor'];
$xpforma = $_REQUEST['pforma'];
$xpagoconductor = $_REQUEST['pagoconductor'];
$xcomision = $_REQUEST['comision'];
$xutilidad = $_REQUEST['utilidad'];

include '../../../control/conex.php';

$sql = "UPDATE tbregistros SET finicio='$xfinicio', ffin='$xffin', pfecha='$xpfecha', pvalor='$xpvalor', 
		pforma='$xpforma', pagoconductor='$xpagoconductor', comision='$xcomision', utilidad='$xutilidad',
		estado='V'
		WHERE numero='$xnumero' ";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>