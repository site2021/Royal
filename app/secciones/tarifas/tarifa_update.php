<?php

$id = intval($_REQUEST['id']);
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

$sql = "UPDATE tbtarifas SET nombre='$nombre', bus40='$bus40', buseta2528='$buseta2528', buseta1924='$buseta1924', 
		micro1611='$micro1611', h110='$h110', camioneta4='$camioneta4', 
		duxter40idareg='$duxterida', duxter40tray='$duxtertra' WHERE id=$id";
		
$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));

}
?>