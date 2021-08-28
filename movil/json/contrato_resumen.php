<?php

include 'conex.php';

// $usuario = $_REQUEST['usuario'];
$interno = ($_POST['interno']);
$rs = mysqli_query($conexion, "SELECT * FROM tbcontratos WHERE usuario='$interno'");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>