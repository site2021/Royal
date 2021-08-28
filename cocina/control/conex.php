<?php
  $db='db683676912';
  $con=mysqli_connect('db683676912.db.1and1.com','dbo683676912','Hector-0805') or die('Problema con la conexion');
  mysqli_select_db($db,$con)or die('Problema con la base de datos');

  

$opcion = 1;

if($opcion==0){
  $server = "localhost";
  $user = "root";
  $pass = "royal2019*";
  $bd = "ryl";
  
} else {
  $server = "db683676912.db.1and1.com";
  $user = "dbo683676912";
  $pass = "Hector-0805";
  $bd = "db683676912";

} 

$conexion = mysqli_connect($server, $user, $pass, $bd)
  or die("Ha sucedido un error inexperado en la conexion de la base de datos");


?>