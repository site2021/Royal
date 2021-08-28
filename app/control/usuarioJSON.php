<?php
session_start();
$usuario = $_GET['usuario'];
$clave = $_GET['clave'];

// un solo archivo para conexion
include 'conex.php';
include 'Acl.php';

$acl = new Acl( $conexion );
//print_r( $acl );die;
//If(!$acl->check(view_admin_dashboard,1,1)) {}

//Creamos la conexión
//$conexion = mysqli_connect($server, $user, $pass, $bd) 
//or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
//$sql = "SELECT id,usuario,nombre,clave FROM tbusuario where usuario='".$usuario."' and clave='".$clave."'";

$sql = "SELECT * FROM tbusuarios where usuario='".$usuario."' and clave='".$clave."'";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$usuarios = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
	$id=$row['id'];
	$usuario=$row['usuario'];
	$clave=$row['clave'];
	$nombre=$row['nombre'];
	$perfil=$row['perfil'];
	$estado=$row['estado'];
	$ciudad=$row['ciudad'];
	
	$usuarios[] = array('id'=>$id, 'usuario'=>$usuario, 'clave'=>$clave, 'nombre'=>$nombre, 'perfil'=>$perfil, 'estado'=>$estado, 'ciudad'=>$ciudad );
	$_SESSION['id'] = $id;
}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  
$json_string = json_encode($usuarios);
echo $json_string;	


?>