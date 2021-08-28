<?php

$xdb = $_REQUEST['xdb'];

$tabla = $_REQUEST['tabla'];
$columnas = $_REQUEST['columnas'];
$filtros = $_REQUEST['filtros'];
$nfiltros = str_replace("\\","",$filtros);

// definir MAX numero //////////////////////////////////////////////////////////////////////////////
$sql="SELECT DISTINCT $columnas FROM $tabla WHERE $nfiltros ORDER BY $columnas ";

if($xdb=='oracle'){
	$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/SAFIX");	

	//echo $sql;

	$stmt = oci_parse($conn, $sql);
	$ok   = oci_execute($stmt);

	if ($ok==true){

		$items = array();
		while ($obj = oci_fetch_object($stmt)){
			array_push($items, $obj);	
		}	
		echo json_encode($items);
	}

	oci_close($conn);
}

if($xdb=='mysql'){

	//include 'conn.php';
	include '../../control/conex.php';

	/*
	//echo $sql;
	$ar=fopen("sql.txt","w");
	fputs($ar,'SQl'.PHP_EOL);
	fputs($ar,$sql.PHP_EOL);	
	fclose($ar);
	*/

	$stmt = mysqli_query($conexion, $sql);
	
	$items = array();

	while ($obj = mysqli_fetch_object($stmt)){
		array_push($items, $obj);	
	}	
	echo json_encode($items);

}

//echo json_encode(array('success'=>true,'venta'=>$venta));

?>