<?php

$colegio = $_REQUEST['colegio'];
$codigo = $_REQUEST['codigo'];

include '../../../control/conex.php';

$sql = "SELECT 1 id, ruta nombre FROM vst_listageneral WHERE colegio='$colegio' AND codigo='$codigo' 
		UNION
		SELECT 2 id, mrutaam nombre FROM vst_listageneral WHERE colegio='$colegio' AND codigo='$codigo' 
		UNION
		SELECT 3 id, mrutapm nombre FROM vst_listageneral WHERE colegio='$colegio' AND codigo='$codigo' 
		UNION
		SELECT 4 id, ruta2da nombre FROM vst_listageneral WHERE colegio='$colegio' AND codigo='$codigo'
		ORDER BY id DESC";

$rs = mysqli_query($conexion, $sql);

$items = array();

$xid = 1;
while($row = mysqli_fetch_object($rs)){
	if($row->nombre!=''){
		$row->id = $xid;
		array_push($items, $row);
		$xid = $xid + 1;
	}
}

echo json_encode($items);

?>