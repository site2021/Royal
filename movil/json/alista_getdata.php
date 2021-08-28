<?php

include 'conex.php';

$interno = $_REQUEST['interno'];
$cuales = $_REQUEST['cuales'];

if($cuales=='*'){
	$rs = mysqli_query($conexion, "SELECT * FROM tbalistatmp WHERE interno='$interno' ORDER BY nivel1,nivel2");	
}else {
	$rs = mysqli_query($conexion, "SELECT * FROM tbalistatmp WHERE interno='$interno' AND digitar='$cuales' 
									ORDER BY nivel1,nivel2");
}



$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>