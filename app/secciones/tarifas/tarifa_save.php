<?php

$producto = $_REQUEST['producto'];
$nombre = $_REQUEST['nombre'];
$bus40 = $_REQUEST['bus40'];
$buseta2528 = $_REQUEST['buseta2528'];
$buseta1924 = $_REQUEST['buseta1924'];
$micro1611 = $_REQUEST['micro1611'];
$h110 = $_REQUEST['h110'];
$camioneta4 = $_REQUEST['camioneta4'];
$duxterida = $_REQUEST['duxter40idareg'];
$duxtertra = $_REQUEST['duxter40tray'];

include '../../control/conex.php';

$sql = "INSERT INTO tbtarifas(id_producto,nombre,bus40,buseta2528,buseta1924,micro1611,h110,camioneta4,
							  duxter40idareg,duxter40tray)
		values('$producto','$nombre','$bus40','$buseta2528','$buseta1924','$micro1611','$h110','$camioneta4',
			   '$duxterida','$duxtertra')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>