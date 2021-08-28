<?php

$resolucion = htmlspecialchars($_REQUEST['resolucion']);
$fecharesolucion = htmlspecialchars($_REQUEST['fecharesolucion']);
$estadoresolucion = htmlspecialchars($_REQUEST['estadoresolucion']);
$capmicrobus = htmlspecialchars($_REQUEST['capmicrobus']);
$capbus = htmlspecialchars($_REQUEST['capbus']);
$capbuseta = htmlspecialchars($_REQUEST['capbuseta']);
$capcamioneta = htmlspecialchars($_REQUEST['capcamioneta']);

include '../../../control/conex.php';

$sql = "INSERT INTO tbpqautomotorrt(resolucion,fecharesolucion,estadoresolucion,capmicrobus,capbus,capbuseta,capcamioneta)
		VALUES('$resolucion','$fecharesolucion','$estadoresolucion','$capmicrobus','$capbus','$capbuseta','$capcamioneta')";


$result = @mysqli_query($conexion, $sql);


if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id()

	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>