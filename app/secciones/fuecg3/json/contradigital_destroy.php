<?php

$id = intval($_REQUEST['id']);

include '../../../control/conex.php';

$sql = "DELETE FROM tbcontradigitalg3 WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>