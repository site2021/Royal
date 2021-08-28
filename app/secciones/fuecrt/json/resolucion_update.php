<?php

$id = $_REQUEST['id'];

include '../../../control/conex.php';

$sql = "UPDATE tbpqautomotorrt SET resolucion='$resolucion', fecharesolucion='$fecharesolucion', estadoresolucion='$estadoresolucion', capmicrobus='$capmicrobus', capbus='$capbus', capbuseta='$capbuseta', capcamioneta='$capcamioneta' WHERE id='$id' ";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>