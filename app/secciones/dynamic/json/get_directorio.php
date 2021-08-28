<?php

$nombre = $_REQUEST['nombre'];

$cual = '../../web/'.$nombre;

if(is_dir($cual)){
	echo json_encode(array('success'=>true));
}else {
	echo json_encode(array('success'=>false));
}

?>