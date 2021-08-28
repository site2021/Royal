<?php

$xnumero = $_REQUEST['numero'];

$xfinicio = $_REQUEST['finicio'];
$xffin = $_REQUEST['ffin'];
$xpfecha = $_REQUEST['pfecha'];

$xpforma = $_REQUEST['pforma'];
$xpvalor = $_REQUEST['pvalor'];
$xpagoconductor = $_REQUEST['pagoconductor'];
$xcomision = $_REQUEST['comision'];
$xutilidad = $_REQUEST['utilidad'];

$xestado = $_REQUEST['estado'];

$x = $_REQUEST[''];

include '../../../control/conex.php';

$sql = "UPDATE tbregistros SET finicio='$xfinicio', ffin='$xffin', pfecha='$xpfecha', 
		pforma='$xpforma', pvalor='$xpvalor', pagoconductor='$xpagoconductor', 
		comision='$xcomision', utilidad='$xutilidad', estado='$xestado' 
		WHERE numero='$xnumero'";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>