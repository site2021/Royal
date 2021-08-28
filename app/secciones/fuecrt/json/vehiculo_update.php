<?php

$id = intval($_REQUEST['id']);
$interno = htmlspecialchars($_REQUEST['interno']);
$placa = htmlspecialchars($_REQUEST['placa']);
$tipovinculacion = htmlspecialchars($_REQUEST['tipovinculacion']);
$empresaafiliadora = htmlspecialchars($_REQUEST['empresaafiliadora']);
$licencia = htmlspecialchars($_REQUEST['licencia']);
$capacidad = htmlspecialchars($_REQUEST['capacidad']);
$marca = htmlspecialchars($_REQUEST['marca']);
$motor = htmlspecialchars($_REQUEST['motor']);
$modelo = htmlspecialchars($_REQUEST['modelo']);
$cilindraje = htmlspecialchars($_REQUEST['cilindraje']);
$color = htmlspecialchars($_REQUEST['color']);
$clase = htmlspecialchars($_REQUEST['clase']);
$carroceria = htmlspecialchars($_REQUEST['carroceria']);
$combustible = htmlspecialchars($_REQUEST['combustible']);
$chasis = htmlspecialchars($_REQUEST['chasis']);
$iniciosoat = htmlspecialchars($_REQUEST['iniciosoat']);
$finsoat = htmlspecialchars($_REQUEST['finsoat']);
$iniciotecmecanica = htmlspecialchars($_REQUEST['iniciotecmecanica']);
$fintecmecanica = htmlspecialchars($_REQUEST['fintecmecanica']);
$tarjetaoperacion = htmlspecialchars($_REQUEST['tarjetaoperacion']);
$iniciotarjetaoperacion = htmlspecialchars($_REQUEST['iniciotarjetaoperacion']);
$fintarjetaoperacion = htmlspecialchars($_REQUEST['fintarjetaoperacion']);
$iniciopolizacontrac = htmlspecialchars($_REQUEST['iniciopolizacontrac']);
$finpolizacontrac = htmlspecialchars($_REQUEST['finpolizacontrac']);
$iniciopolizaextra = htmlspecialchars($_REQUEST['iniciopolizaextra']);
$finpolizaextra = htmlspecialchars($_REQUEST['finpolizaextra']);
$iniciopreventiva = htmlspecialchars($_REQUEST['iniciopreventiva']);
$finpreventiva = htmlspecialchars($_REQUEST['finpreventiva']);
$propietario = htmlspecialchars($_REQUEST['propietario']);
$estado = htmlspecialchars($_REQUEST['estado']);
$observacion = htmlspecialchars($_REQUEST['observacion']);
$iniciomantenimiento = htmlspecialchars($_REQUEST['iniciomantenimiento']);
$finmantenimiento = htmlspecialchars($_REQUEST['finmantenimiento']);

include '../../../control/conex.php';

$sql = "UPDATE tbvehiculosrt SET interno='$interno',placa='$placa',tipovinculacion='$tipovinculacion',empresaafiliadora='$empresaafiliadora', licencia='$licencia', capacidad='$capacidad', marca='$marca', motor='$motor', modelo='$modelo', cilindraje='$cilindraje', color='$color', clase='$clase', carroceria='$carroceria', combustible='$combustible', chasis='$chasis',iniciosoat='$iniciosoat',finsoat='$finsoat',iniciotecmecanica='$iniciotecmecanica',fintecmecanica='$fintecmecanica',tarjetaoperacion='$tarjetaoperacion' ,iniciotarjetaoperacion='$iniciotarjetaoperacion',fintarjetaoperacion='$fintarjetaoperacion',iniciopolizacontrac='$iniciopolizacontrac',finpolizacontrac='$finpolizacontrac',iniciopolizaextra='$iniciopolizaextra',finpolizaextra='$finpolizaextra',iniciopreventiva='$iniciopreventiva',finpreventiva='$finpreventiva', propietario='$propietario',estado='$estado',observacion='$observacion',iniciomantenimiento='$iniciomantenimiento',finmantenimiento='$finmantenimiento' WHERE id=$id";


$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'interno' => $interno,
		'placa' => $placa,
		'tipovinculacion' => $tipovinculacion,
		'empresaafiliadora' => $empresaafiliadora,
		'licencia' => $licencia,
		'capacidad' => $capacidad,
		'marca' => $marca,
		'motor' => $motor,
		'modelo' => $modelo,
		'cilindraje' => $cilindraje,
		'color' => $color,
		'clase' => $clase,
		'carroceria' => $carroceria,
		'combustible' => $combustible,
		'chasis' => $chasis,
		'iniciosoat' => $iniciosoat,
		'finsoat' => $finsoat,
		'iniciotecmecanica' => $iniciotecmecanica,
		'fintecmecanica' => $fintecmecanica,
		'tarjetaoperacion' => $tarjetaoperacion,
		'iniciotarjetaoperacion' => $iniciotarjetaoperacion,
		'fintarjetaoperacion' => $fintarjetaoperacion,
		'iniciopolizacontrac' => $iniciopolizacontrac,
		'finpolizacontrac' => $finpolizacontrac,
		'iniciopolizaextra' => $iniciopolizaextra,
		'finpolizaextra' => $finpolizaextra,
		'iniciopreventiva' => $iniciopreventiva,
		'finpreventiva' => $finpreventiva,
		'propietario' => $propietario,
		'estado' => $estado,
		'observacion' => $observacion,
		'iniciomantenimiento' => $iniciomantenimiento,
		'finmantenimiento' => $finmantenimiento
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>