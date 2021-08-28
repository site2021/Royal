<?php

$tabla = $_REQUEST['tabla'];

include '../../control/conex.php';

// Iniciar vector de elemantos
$items = array();

$rs = mysqli_query($conexion, "SELECT * FROM rbcampos WHERE id_tabla=$tabla ORDER BY id");

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);	
}

echo json_encode($items);

?>