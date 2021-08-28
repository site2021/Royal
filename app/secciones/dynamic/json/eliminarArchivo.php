<?php

$archivo = $_REQUEST['archivo'];

unlink($archivo);

echo json_encode(array('success'=>true));

?>