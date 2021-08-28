<?php

include '../../../control/conex.php';

$producto = $_REQUEST['producto'];
$destino = $_REQUEST['destino'];
$vehiculo = $_REQUEST['vehiculo'];

if($vehiculo=='BUS (40 PAX)'){
	$campo = 'bus40';
}else if($vehiculo=='BUSETA (25-28 PAX)' || $vehiculo=='BUSETA (25 PAX)' || $vehiculo=='BUSETAS (21-28 PAX)'){
	$campo = 'buseta2528';
}else if($vehiculo=='BUSETA (19-24 PAX)' || $vehiculo=='BUSETA (18 PAX)' || $vehiculo=='BUSETA (17-20 PAX)'){
	$campo = 'buseta1924';
}else if($vehiculo=='MICRO (16-11 PAX)' || $vehiculo=='MICRO (7 PAX)' || $vehiculo=='MICRO (16-11 PAX)'){
	$campo = 'micro1611';
}else if($vehiculo=='H1 (10 PAX)' || $vehiculo=='VEHICULO ( 4 PAX)' || $vehiculo=='HI (10 PAX)'){
	$campo = 'h110';
}else if($vehiculo=='CAMIONETA(4 PAX)' || $vehiculo=='H1 (10 PAX) POR TRAYECTO'){
	$campo = 'camioneta4';
}else if($vehiculo=='DUSTER (4 PAX)IDA Y REGRESO'){
	$campo = 'duxter40idareg';
}else if($vehiculo=='DUSTER (4 PAX)POR TRAYECTO'){
	$campo = 'duxter40tray';
}else if($vehiculo=='MICRO (12 PAX-12 BICI)'){
	$campo = 'micro1611';
}


$rs = mysqli_query($conexion, "SELECT  $campo FROM tbtarifas WHERE nombre='$destino' AND id_producto='$producto' ");

$row = mysqli_fetch_row($rs);

$tarifa = $row[0];

echo json_encode(array('success'=>true,'tarifa'=>$tarifa));

?>