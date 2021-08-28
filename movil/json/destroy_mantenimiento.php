<?php

include 'conex.php';

$id = intval($_REQUEST['id']);

$sql = "DELETE FROM tbmantenimientos WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>