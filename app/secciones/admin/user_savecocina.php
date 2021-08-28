<?php

$usuario = htmlspecialchars($_REQUEST['usuario']);
$nombre = htmlspecialchars($_REQUEST['nombre']);
$clave = htmlspecialchars($_REQUEST['clave']);
$perfil = htmlspecialchars($_REQUEST['perfil']);
$edad = htmlspecialchars($_REQUEST['edad']);
$peso = htmlspecialchars($_REQUEST['peso']);
$estatura = htmlspecialchars($_REQUEST['estatura']);
$tarifa = htmlspecialchars($_REQUEST['tarifa']);
$pago = htmlspecialchars($_REQUEST['pago']);
$fechapago = htmlspecialchars($_REQUEST['fechapago']);
$mes = htmlspecialchars($_REQUEST['mes']);

include '../../control/conex.php';

$sql = "INSERT INTO tbestudiantes(usuario,nombre,clave,perfil,edad,peso,estatura,tarifa,pago,fechapago,mes)
		VALUES('$usuario','$nombre','$clave','$perfil','$edad','$peso','$estatura','$tarifa','$pago','$fechapago','$mes')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'usuario' => $usuario,
		'nombre' => $nombre,
		'clave' => $clave,
		'perfil' => $perfil,
		'edad' => $edad,
		'peso' => $peso,
		'estatura' => $estatura,
		'tarifa' => $tarifa,
		'pago' => $pago,
		'fechapago' => $fechapago,
		'mes' => $mes
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>