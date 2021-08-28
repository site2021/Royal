<?php

$numero = $_REQUEST['numero'];

include '../../../control/conex.php';

$sql = "UPDATE tbregistros SET estado='Z' WHERE numero='$numero'";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>