<?php

$xnumero = $_REQUEST['numero'];
$xfecha = $_REQUEST['fecha'];
$xnit = $_REQUEST['nit'];
$xcontacto = $_REQUEST['contacto'];
$xempresa = $_REQUEST['empresa'];
$xdireccion = $_REQUEST['direccion'];
$xtelefono = $_REQUEST['telefono'];
$xciudad = $_REQUEST['ciudad'];
$xcorreo = $_REQUEST['correo'];
$xdestino = $_REQUEST['destino'];
$xdescripcion = $_REQUEST['descripcion'];
$valorservicio = $_REQUEST['valor'];
$xestado = $_REQUEST['estado'];
$xusuario = $_REQUEST['usuario'];

$fecha = date("Ymd"); 
$hora = date("H:i:s");

include '../../../control/conex.php';

$sql = "INSERT INTO tbregistros (numero,fecha,nit,contacto,empresa,direccion,telefono,ciudad,correo,
		destino,descripcion,estado,valorservicio,usuario) VALUES 
		('$xnumero','$xfecha', '$xnit','$xcontacto','$xempresa','$xdireccion','$xtelefono','$xciudad','$xcorreo',
		'$xdestino','$xdescripcion','$xestado','$valorservicio','$xusuario')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>