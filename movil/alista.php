<?

$usuario = $_GET['usuario'];

include '../app/control/conex.php';

$sede = $rowc[0];
$nombre = $rowc[1];

$sqlc = mysqli_query($conexion, "SELECT ciudad, nombre, costos  FROM tbusuarios WHERE usuario='$usuario'");
$rowc = mysqli_fetch_row($sqlc);
$costos = $rowc[2];

// 84376466

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
	<link rel="stylesheet" type="text/css" href="../app/jeasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../app/jeasyui/themes/icon.css">

	<link rel="stylesheet" type="text/css" href="../app/css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../app/css/estilotabla.css">
	<script type="text/javascript" src="../app/jeasyui/jquery.min.js"></script>
	<script type="text/javascript" src="../app/jeasyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../app/jeasyui/locale/easyui-lang-es.js"></script>

	<script type="text/javascript" src="lib/datagrid-filter.js"></script>
	<script type="text/javascript" src="lib/accounting.js"></script>

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
			$("#dgalista").datagrid('enableFilter',[{
            	field:'fecha',
                type:'textbox',
                op:['equal','notequal','less','greater']
            }]);			
		})
	</script>

	<!-- filter Lib - /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$(function(){
			$("#dgalista").datagrid('enableFilter');			
		})
	</script>

</head>
<body>
	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
	    <!-- impresion de planilla de rutas /////////////////////////////////////////////////////// -->
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnPlanilla" name="btnPlanilla" class="boton" onclick="printAlista()">
	         		<img src="icons/Printer.png" >
	         	</a>
	         	<span class="tooltiptext">IMPRIMIR Alistamiento RE</span>
	        </div>

	        <div class="tdiv">
	         	<a id="btnPlanilla" name="btnPlanilla" class="boton" onclick="printAlistaRt()">
	         		<img src="icons/Printer.png" >
	         	</a>
	         	<span class="tooltiptext">IMPRIMIR Alistamiento RT</span>
	        </div>
	    </div>
	</div>

	<div align="left" style="float: left;">
		<table id="dgalista" class="easyui-datagrid" style="width:250px;height:500px"
			url="json/alista_todos.php"
			toolbar="#toolbaralista"
			pagination="false"
			rownumbers="false" fitColumns="false" singleSelect="true">
			<thead>
				<tr>					
	            	<th field="interno" width="70px">interno</th>					
	            	<th field="fecha" width="100px">fecha</th>					
					<th field="cuantos" width="70px" align="center">restringe</th>
				</tr>
			</thead>
		</table>
	</div>

	<script type="text/javascript">
		function printAlista(){
			var row = $("#dgalista").datagrid('getSelected');
			if(row){
				var xinterno = row['interno'];
				var xfecha = row['fecha'];
				
				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

	    		window.open ("alistaPDF.php?interno="+xinterno+"&fecha="+xfecha, params);			

			}else {
				$.messager.alert('Mensaje','no hay SELECCION!!!');

			}
		}

		function printAlistaRt(){
			var row = $("#dgalista").datagrid('getSelected');
			if(row){
				var xinterno = row['interno'];
				var xfecha = row['fecha'];
				
				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

	    		window.open ("alistaRT_PDF.php?interno="+xinterno+"&fecha="+xfecha, params);			

			}else {
				$.messager.alert('Mensaje','no hay SELECCION!!!');

			}
		}
	</script>
</body>
</html>