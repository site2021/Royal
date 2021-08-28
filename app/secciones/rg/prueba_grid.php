<?
	$usuario = $_GET['usuario'];
	
	include '../admin/conn.php';
	$sqlc = mysql_query("SELECT ciudad, vendedor, safix from tbusuarios where usuario='$usuario'");
	$rowc = mysql_fetch_row($sqlc);

	$sede = $rowc[0];
	$vend = $rowc[1];
	$vends = $rowc[2];


?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-8">		
		<title>RG-datos</title>

		<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/default/easyui.css">		
		<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/icon.css">
		<link rel="stylesheet" type="text/css" href="css/rg.css">		

		<script type="text/javascript" src="accounting.js"></script>

		<script type="text/javascript" src="../../jeasyui/jquery.min.js"></script>
		<script type="text/javascript" src="../../jeasyui/jquery.easyui.min.js"></script>
		<script type="text/javascript" src="../../jeasyui/locale/easyui-lang-es.js"></script>
	</head>
	<body>
		<table id="dg" class="easyui-datagrid" style="width:500px;height:auto"
				url="oracle_sql_footer.php"
				title=""
				headerCls="hc"
				singleSelect="true" rownumbers="true"
				pagination="false" showFooter="true">
			<thead>
	            <tr>
	                <th data-options="field:'NMES',width:80">NMES</th>
	                <th data-options="field:'CALI',width:120, align:'right'">CALI</th>
	                <th data-options="field:'DOSQ',width:120, align:'right'">DOSQ</th>
	                <th data-options="field:'MEDE',width:120, align:'right'">MEDE</th>
	            </tr>
        	</thead>				
		</table>			

	</body>
</html>	