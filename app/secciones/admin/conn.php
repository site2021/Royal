<?php

// datos de la conexion - $server, $user, $pass, $bd
include '../../control/conex.php';

$conn = mysqli_connect($server, $user, $pass, $bd)
		or die("Ha sucedido un error inexperado en la conexion de la base de datos");

?>