<?php

//$xnumero = $_REQUEST['numero'];

$xid = $_REQUEST['id'];
$xdescripcion = $_REQUEST['descripcion'];
$xdestino = $_REQUEST['destino'];
$xvehiculo = $_REQUEST['vehiculo'];
$xpasajeros = $_REQUEST['pasajeros'];
$xdias = $_REQUEST['dias'];
$xvalor = $_REQUEST['valor'];
$xunitario = $_REQUEST['unitario'];
$xdescto = $_REQUEST['descto'];
$xobservalinea = $_REQUEST['observalinea'];

$fecha = date("Ymd"); 
$hora = date("H:i:s");

include '../../../control/conex.php';

$sql = "UPDATE tbregistrosdetalles SET descripcion='$xdescripcion', destino='$xdestino', vehiculo='$xvehiculo', pasajeros='$xpasajeros',
		dias='$xdias', valor='$xvalor', unitario='$xunitario', descto='$xdescto', observalinea='$xobservalinea' WHERE id='$xid' ";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>