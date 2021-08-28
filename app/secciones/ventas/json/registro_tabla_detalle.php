<?php

$xnumero = $_REQUEST['numero'];
$xlinea = $_REQUEST['linea'];
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

$sql = "INSERT INTO tbregistrosdetalles (numero,linea,descripcion,destino,vehiculo,pasajeros,dias,valor,unitario,
		descto,observalinea) VALUES 
		('$xnumero','$xlinea','$xdescripcion','$xdestino','$xvehiculo','$xpasajeros','$xdias','$xvalor','$xunitario',
		 '$xdescto','$xobservalinea')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>