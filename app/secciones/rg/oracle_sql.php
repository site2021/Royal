<?php
	$xsql = $_REQUEST['sql'];
	$nsql = str_replace("\\","",$xsql);
	$sql = $nsql;

	$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/SAFIX");		

	//echo $nsql;
	//$sql = "SELECT NMES, CALI, DOSQ, MEDE FROM INTRA_VENTAS_SEDE_2016";
    
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