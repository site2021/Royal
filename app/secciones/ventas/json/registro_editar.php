<?php

include '../../../control/conex.php';

$numero = $_REQUEST['numero'];
$usuario = $_REQUEST['usuario'];

// borrar lineas digitas 
$sql = "DELETE FROM tbregistrosdetdig WHERE usuario='$usuario' ";

$result = @mysqli_query($conexion, $sql);

// if ($result){
// perdon aca por el machetazo
//if (true){
	$rs = mysqli_query($conexion, "SELECT * FROM tbregistrosdetalles WHERE numero='$numero' ORDER BY id ");

	while($row = mysqli_fetch_object($rs)){
		$id = $row->id;
		$linea = $row->linea;
		$descripcion = $row->descripcion;
		$destino = $row->destino;
		$vehiculo = $row->vehiculo;
		$pasajeros = $row->pasajeros;
		$dias = $row->dias;
		$valor = $row->valor;
		$unitario = $row->unitario;
		$descto = $row->descto;
		$observalinea = $row->observalinea;

		//echo $id.' '.$xdescripcion.' '.$xvehiculo.' '.$xpasajeros.' '.$xdias.' '.$xvalor.' '.$xunitario.' '.
		//	 $xdescto.' '.$xobservalinea;

		$wsql = "INSERT INTO tbregistrosdetdig (numero,linea,descripcion,destino,vehiculo,pasajeros,dias,valor,unitario,
				descto,observalinea,usuario) VALUES 
				('$numero','$linea','$descripcion','$destino','$vehiculo','$pasajeros','$dias','$valor','$unitario',
				 '$descto','$observalinea', '$usuario')";

		$result = @mysqli_query($conexion, $wsql);
		if (!$result){
			echo json_encode(array('errorMsg'=>'Some errors occured.'));		
		}
		
	}
	
//} else {
	//echo json_encode(array('errorMsg'=>'Some errors occured.'));
//}

echo json_encode(array('success'=>true));

?>