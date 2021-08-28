<?php

$opcion = 0;

if($opcion==0){
	$server = "127.0.0.1";
	$user = "root";
	$pass = "sitesas";
	$bd = "ryl";
	
} else {
	$server = "carin.dongee.com";
	$user = "royaltou_root";
	$pass = "royal2020++";
	$bd = "royaltou_ryl";

}	

$conexion = mysqli_connect($server, $user, $pass, $bd)
	or die("Ha sucedido un error inexperado en la conexion de la base de datos");


?>