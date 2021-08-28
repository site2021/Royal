<?php
	//$xsql = $_REQUEST['sql'];

	//$nsql = str_replace("\\","",$xsql);

	$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/SAFIX");	

	$result = array();
	
	//$sql = $nsql;

	//$sql = "SELECT VENDEDOR,SUM(VENTA_NETA) VENTA_NETA FROM VST_MOVIMIENTO_2016_HR 	WHERE VENDEDOR='D09' AND FECHA=TO_DATE('2016-08-19','YYYY-MM-DD') GROUP BY VENDEDOR "

	$sql ="SELECT VENDEDOR,SUM(VENTA_NETA) VENTA_NETA FROM VST_MOVIMIENTO_2016_HR WHERE VENDEDOR LIKE 'D%' GROUP BY VENDEDOR";

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


?>
