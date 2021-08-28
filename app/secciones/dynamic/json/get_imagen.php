<?php

// el archivo debe venir con el path incluido
$archivo = $_REQUEST['archivo'];

list($width, $height, $type, $attr) = getimagesize($archivo);

echo json_encode(array('success'=>true,'ancho'=>$width,'alto'=>$height));

?>