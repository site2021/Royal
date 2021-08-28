<?php
	$conn = oci_connect("sxg5db","sxg5db", "192.168.20.101:1521/SXG5");

	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

	$itemid = isset($_POST['itemid']) ? mysql_real_escape_string($_POST['itemid']) : '';	
	$productid = isset($_POST['productid']) ? mysql_real_escape_string($_POST['productid']) : '';

	// $productid = "Cable/Amarillo";

	$offset = ($page-1)*$rows;

	$result = array();

	//$where = "MI_ARTIC like '$itemid%' and MI_DESC like '$productid%'";
	if ($itemid=='' && $producid==''){ $itemid='00';}

	$where = " MI_ARTIC like '$itemid%' AND MI_DESC like '$productid%' ";

	// busqueda avanzada
	$esta=0;
	$avanzada=''; 
	if ($productid!=''){
		$posi=strpos($productid, "/");
		if ($posi!=0){$esta=99;}
	}


	if ($esta==0){
		$where = "MI_ARTIC like '$itemid%' AND MI_DESC like '$productid%' ";

	} else {
		$nuevoWhere="(MI_DESC like '";
		$longitud = strlen($productid);
		for($i=0;$i<$longitud;$i++){
			$car=substr($productid,$i,1);
			if ($car!="/"){ 
				$nuevoWhere=$nuevoWhere.$car;
			} else {
				$nuevoWhere=$nuevoWhere."%' AND MI_DESC like '%";
			}
		}	

		$nuevoWhere=$nuevoWhere."%' ) ";

		$where = "MI_ARTIC like '$itemid%' AND ".$nuevoWhere; 

		//$where = "MI_ARTIC like '$itemid%' AND (MI_DESC like 'Cable%' AND MI_DESC like '%Amarillo%') ";
	}

	
	$sql = "SELECT MI_ARTIC, MI_DESC, MI_COD_ALT, MI_VENTA_1, MI_VENTA_3, MI_VENTA_6, MI_ACT, '$page' PAG 
			FROM TIARTICULOS WHERE ". $where ;
	

	// echo $sql;

	$stmt = oci_parse($conn, $sql);
	$ok   = oci_execute($stmt);

	if ($ok==true){

		$items = array();		
		while ($obj = oci_fetch_object($stmt)){
			array_push($items, $obj);	
		}	
		echo json_encode($items);
	}

/*	include '../admin/conn.php';	
	
	
	$rs = mysql_query("select count(*) from tbarticulos where " . $where);
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	
	//$rs = mysql_query("select * from tbarticulos where " . $where . " order by codigo limit $offset,$rows");

	$rs = mysql_query("select * from tbarticulos where (descripcion like '%Cable%' and descripcion like '%Rojo%')  order by codigo limit $offset,$rows");

	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;
	
	echo json_encode($result);*/

?>