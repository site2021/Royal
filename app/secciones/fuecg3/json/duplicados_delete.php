<?php

$id = intval($_REQUEST['id']);

include '../../../control/conex.php';

$sql = "DELETE t1 FROM tbvehiculosg3 t1
    INNER JOIN tbvehiculosg3 t2 
    WHERE t1.id < t2.id AND t1.interno = t2.interno";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>