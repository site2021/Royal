<?php

$id = intval($_REQUEST['id']);
$contrato = htmlspecialchars($_REQUEST['contrato']);

include '../../../control/conex.php';

$sql = "UPDATE tbcontradigitalrt SET contrato='$contrato' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'contrato' => $contrato
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>