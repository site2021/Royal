<?php

include 'conex.php';

$interno = $_REQUEST['interno'];

$rs = mysqli_query($conexion, "SELECT * FROM tbextractos WHERE interno='$interno' ORDER BY extracto desc");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>