<?php
session_start();

if ( $_SESSION ){
	$id = intval($_REQUEST['id']);
	$nit = htmlspecialchars($_REQUEST['nit']);
	$contacto = htmlspecialchars($_REQUEST['contacto']);
	$empresa = htmlspecialchars($_REQUEST['empresa']);
	$direccion = htmlspecialchars($_REQUEST['direccion']);
	$telefono = htmlspecialchars($_REQUEST['telefono']);
	$ciudad = htmlspecialchars($_REQUEST['ciudad']);
	$correo = htmlspecialchars($_REQUEST['correo']);

	include '../../control/conex.php';

	$sql = "UPDATE tbclientes SET nit='$nit', contacto='$contacto', empresa='$empresa', direccion='$direccion',
			telefono='$telefono', ciudad='$ciudad', correo='$correo' WHERE id=$id";

	$result = @mysqli_query($conexion, $sql);

	if ($result){
		echo json_encode(array('success'=>true));

	} else {
		echo json_encode(array('errorMsg'=>'Some errors occured.'));
	}
} else {
	header("Location: /royal/index.php");
	die();
}
?>