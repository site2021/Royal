<?php
session_start();

if ( $_SESSION ){
	$nit = htmlspecialchars($_REQUEST['nit']);
	$contacto = htmlspecialchars($_REQUEST['contacto']);
	$empresa = htmlspecialchars($_REQUEST['empresa']);
	$direccion = htmlspecialchars($_REQUEST['direccion']);
	$telefono = htmlspecialchars($_REQUEST['telefono']);
	$ciudad = htmlspecialchars($_REQUEST['ciudad']);
	$correo = htmlspecialchars($_REQUEST['correo']);

	include '../../control/conex.php';

	$sql = "INSERT INTO tbclientes (nit,contacto,empresa,direccion,telefono,ciudad,correo) 
			VALUES ('$nit','$contacto','$empresa','$direccion','$telefono','$ciudad','$correo')";

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