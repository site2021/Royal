<?php

include '../control/conex.php';

session_start();
$_SESSION['perfil'];
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
  // echo "";
}


$usuario = $_SESSION['usuario'];

$rs = mysqli_query($conexion, "SELECT * FROM tbestudiantes WHERE usuario='$usuario'");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>