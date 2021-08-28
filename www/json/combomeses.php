<?php


include '../../app/control/conex.php';

$codigo = $_REQUEST['codigo'];

if($codigo=='x'){
	$rs = mysqli_query($conexion, "SELECT id codigo, nombre FROM txmeses ORDER BY id ");

}else {
	$rs = mysqli_query($conexion, "SELECT id codigo, nombre FROM txmeses WHERE nombre NOT IN
								   (SELECT mes FROM tbdatosliquidar WHERE codigo='$codigo') ");
}


$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>