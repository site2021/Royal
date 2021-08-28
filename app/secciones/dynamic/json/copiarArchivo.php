<?php

$archivo = $_REQUEST['archivo'];
$hasta = $_REQUEST['hasta'];

copy('../files/'.$archivo,'../../web/'.$hasta.'/'.$archivo);

echo json_encode(array('success'=>true));

?>