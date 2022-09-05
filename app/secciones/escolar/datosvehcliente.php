<?
session_start();
if(!$_SESSION)
	header ('Location: /Royal/index.php');
    
$usuario = $_SESSION['usuario'];

include '../../control/conex.php';

$sqlc = mysqli_query($conexion, "SELECT ciudad, nombre, costos  FROM tbusuarios WHERE usuario='$usuario'");
$rowc = mysqli_fetch_row($sqlc);

$sede = $rowc[0];
$nombre = $rowc[1];
$costos = $rowc[2];

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
	<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/icon.css">

	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilotabla.css">
	<script type="text/javascript" src="../../jeasyui/jquery.min.js"></script>
	<script type="text/javascript" src="../../jeasyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../../jeasyui/locale/easyui-lang-es.js"></script>

	<script type="text/javascript" src="../js/datagrid-filter.js"></script>
	<script type="text/javascript" src="../js/accounting.js"></script>

	<link rel="stylesheet" type="text/css" href="css/tooltips.css">

	<!-- STYLE formatos generales de presentacion ///////////////////////////////////////////////// -->
	<style type="text/css">
		.botonera {
			background:#fff;
			margin-top:1px;
			margin-bottom:1px;
			width:100%;
			height:30px;	
		}
		body {
			padding:10px;
		}
		.hc {
			background: #92D050;				
		}
		#dlgdatosveh {
			overflow: hidden;
		}
	</style>

	<!-- STYLE formatos de pantalla  ////////////////////////////////////////////////////////////// -->
	<style type="text/css">
		#fm{
			margin:0;			
		}
		.ritem {
			width: 100%;			
			margin-top: 1%;			
		}
		.ritem label {
			width: 10%;
			text-align: right;
			display:inline-block;
			font-weight: bold;
			width:10%;
		}
		.ritem input{
			text-align: left;
			width:10%;
		}
		
	</style>

	<!-- SCRIPT filter Lib - ////////////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$(function(){
			$("#dgdatosveh").datagrid('enableFilter');			
		})
	</script>

</head>
<body>
	<div class="botonera"></div>
	<table id="dgdatosveh" class="easyui-datagrid" title="LISTA VEHICULOS"
		style="width:100%;height:60%"
		url="json/datosveh_getdata.php" singleSelect="true"
		headerCls="hc" pagination="true" showFooter="true"
		fitColumns="false">
		<thead data-options="frozen:true">
            <tr>
				<th field="id", width="50" sortable="true" hidden="true">Id</th>
				<th field="colegio", width="100" sortable="true">Colegio</th>
				<th field="ruta", width="40" sortable="true">Ruta</th>
				<th field="interno", width="50" sortable="true">Interno</th>	            	
            </tr>
        </thead>
		<thead>
			<tr>
				<th field="nombreconductor", width="200" sortable="true">Conductor</th>
				<th field="celular", width="100" sortable="true">Celular</th>
				<th field="nombreauxiliar", width="200" sortable="true">Auxiliar</th>
				<th field="celularauxiliar", width="100" sortable="true">Celular</th>
				<th field="placa", width="100" sortable="true">placa</th>
				<th field="fechaentrega", width="100" sortable="true">Entrega</th>
				<th field="sector", width="400" sortable="true">Sector</th>
				<th field="capacidad", width="50" sortable="true" align="right">Capacidad</th>				
			</tr>
		</thead>
	</table>
</body>
</html>