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

$sql = "UPDATE tbregistros SET nit='$xnit',contacto='$xcontacto',empresa='$xempresa',
		direccion='$xdireccion',telefono='$xtelefono',ciudad='$xciudad',correo='$xcorreo',destino='$xdestino',
		descripcion='$xdescripcion',estado='$xestado',valorservicio='$valorservicio' WHERE numero='$xnumero' ";

$result = @mysqli_query($conexion, $sql);
						
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>