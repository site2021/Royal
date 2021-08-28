<?php

$tabla = $_REQUEST['tabla'];
$sacar = $_REQUEST['sacar'];

//include 'conn.php';
include '../../control/conex.php';

// Iniciar vector de elemantos
$items = array();

$rs = mysqli_query($conexion, "SELECT nombre codigo, nombre FROM rbcampos WHERE id_tabla=$tabla ORDER BY id");

while($row = mysqli_fetch_object($rs)){
	$incluir = true;
	for($i=0;$i<sizeof($sacar);$i++){
		if($sacar[$i]==$row->nombre){
			$incluir = false;
		}
	}
	if($incluir){
		array_push($items, $row);
	}
	
}

echo json_encode($items);

?>