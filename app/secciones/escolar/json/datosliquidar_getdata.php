<?php

include '../../../control/conex.php';

$colegio = $_REQUEST['colegio'];
$mes = $_REQUEST['mes'];
$codigo = $_REQUEST['codigo'];

if($mes=='*'){
	$where = "colegio='$colegio' AND codigo='$codigo' ORDER BY id";	

}else {
	if($codigo=='*'){
		$where = "colegio='$colegio' AND mes='$mes' ORDER BY CAST(codigo AS UNSIGNED) ";		

	}else {
		$where = "colegio='$colegio' AND mes='$mes' AND codigo='$codigo' ORDER BY id";

	}
}


$rs = mysqli_query($conexion, "SELECT * FROM tbdatosliquidar WHERE ".$where);

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>