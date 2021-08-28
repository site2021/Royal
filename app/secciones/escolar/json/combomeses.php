<?php

include '../../../control/conex.php';

$codigo = $_REQUEST['codigo'];

if($codigo=='x'){
	$rs = mysqli_query($conexion, "SELECT id codigo, nombre FROM txmeses ORDER BY id ");

}else {
	$rs = mysqli_query($conexion, "SELECT id codigo, nombre FROM txmeses WHERE nombre NOT IN (
								    SELECT lista.mes FROM (
								      SELECT mes,tarifabl,sum(pago),tarifabl-sum(pago)
								      FROM tbdatosliquidar 
								      WHERE codigo='$codigo'
								      GROUP BY mes,tarifabl
								      HAVING tarifabl-sum(pago)<=0) lista )
								  ");
}


$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>