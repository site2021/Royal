<?php

include 'conex.php';

$rs = mysqli_query($conexion, "SELECT id codigo, destino FROM tbrutasextractos WHERE duracionruta in ('1 HORA','2 HORAS','3 HORAS','4 HORAS','5 HORAS','6 HORAS','7 HORAS')");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>