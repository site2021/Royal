<?
session_start();
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

	<!-- Busqueda x Contenido /////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$.fn.combobox.defaults.filter = function(q,row){
		      var opts = $(this).combobox('options');
		      return row[opts.textField].toUpperCase().indexOf(q.toUpperCase()) >= 0;
		};
	</script>	

	<style type="text/css">
		body {
			height: 100%;
			padding: 1%;
		}	
		.botonera {		
			background:#D8D8D8;
			margin-top:1px;
			margin-bottom:1px;
			width:100%;
			height:47px;	

		}
		.hc {
			background: #92D050;
		}
		#dlgregistro, #dlgrutas {
			overflow: hidden;
		}

	</style>

	<!-- filter Lib - /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$(function(){
			$("#dgreconocruta").datagrid('enableFilter');			
		})
	</script>

</head>
<body>
	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
	    <!-- impresion de planilla de rutas /////////////////////////////////////////////////////// -->
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="printRegistrosMto()">
	         		<img src="icons/Printer.png" >
	         	</a>
	         	<span class="tooltiptext">IMPRIMIR Mantenimientos</span>
	        </div>
	    </div>
	</div>
	<table id="dgreconocruta" class="easyui-datagrid" title="RECONOCIMIENTO DE RUTAS" style="width:100%;height:500px;margin-top:50px;"
		url="json/reconocruta_todos.php"
		toolbar="#toolbarreconocruta"
		headerCls="hc"
		pagination="false"
		rownumbers="true" fitColumns="false" singleSelect="true">
		<thead>
			<tr>					
            	<th field="fechageneral" width="85px">General</th>					
            	<th field="interno" width="50px">interno</th>					
            	<th field="colegio" width="90px">colegio</th>	
            	<th field="ruta" width="40px">ruta</th>	
            	<th field="codigo" width="50px">codigo</th>	
            	<th field="nombre" width="220px">nombre</th>	
            	<th field="grado" width="45px">grado</th>	
            	<th field="direccion" width="300px">direccion</th>	
            	<th field="barrio" width="200px">barrio</th>	
            	<th field="celular" width="90px">celular</th>	
            	<th field="presentacion" width="90px">presentacion</th>	
            	<th field="fecha" width="85px">fecha</th>	
            	<th field="nombrerecibe" width="240px">nombre recibe</th>	
            	<th field="horarecogida" width="58px">recogida</th>	
            	<th field="horaregreso" width="56px">regreso</th>	

			</tr>
		</thead>
	</table>

	<script type="text/javascript">
		function printRegistrosMto(){
			var row = $("#dgreconocruta").datagrid('getSelected');
			if(row){
				var xruta = row['ruta'];
				var xcolegio = row['colegio'];
				
				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

	    		window.open ("reconocimientoRuta.php?ruta="+xruta+"&colegio="+xcolegio, params);			

			}else {
				$.messager.alert('Mensaje','no hay SELECCION!!!');

			}
		}	

	</script>

	<style type="text/css">
		.hc {
			background: #92D050;				
		}
	</style>

</body>
</html>