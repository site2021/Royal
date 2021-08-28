<?php
	//$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	//$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

	$vend = isset($_POST['vend']) ? mysql_real_escape_string($_POST['vend']) : '';
	$web = isset($_POST['web']) ? mysql_real_escape_string($_POST['web']) : '';
	//$vend=$_GET['vend'];

	$vend = 'D09';
	$web = 0;

	$offset = ($page-1)*$rows;
	$result = array();

	include 'conn.php';
	
	$where = " vend='$vend' AND web=$web ";
	$rs = mysql_query("select count(*) from tbpedidos where " . $where);
	$row = mysql_fetch_row($rs);
	//$result["total"] = $row[0];
	
	//$rs = mysql_query("select * from tbpedidos where " . $where . " order by id limit $offset,$rows ");	
	$rs = mysql_query("select * from tbpedidos where " . $where . " order by id ");	
	
	$totaldoc=0;

	$totales = array();
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
		$totaldoc=$totaldoc+$row->total;

	}
	//$result["rows"] = $items;

	$vriva=round($totaldoc*.16,0);
	$grtotal=$totaldoc+$vriva;

	$totales[] = array('unitario'=>'SubTotal', 'total'=>$totaldoc );
	array_push($totales, array('unitario'=>'IVA','total'=>$vriva));
	array_push($totales, array('unitario'=>'TOTAL','total'=>$grtotal));

	$json_string = json_encode($items);
	$json_totales = json_encode($totales);

	$json_iva = json_encode($iva);

	echo "{\"rows\":".$json_string.",\"footer\":".$json_totales."}";


	// echo json_encode($result);
	

?>