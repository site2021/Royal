<?

$usuario = $_GET['usuario'];

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
			background:#D8D8D8;
			margin-top:1px;
			margin-bottom:1px;
			width:100%;
			height:47px;	
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
	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
		<div class="bordes" style="margin-left:50px">
	        <div class="tdiv">
	         	<a id="btnNuevo" name="btnNuevo" class="boton" onclick="ejecutar('N')">
	         		<img src="icons/Plus.png" >
	         	</a>
	         	<span class="tooltiptext">NUEVO registro </span>
	        </div>
	        <div class="tdiv">
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="ejecutar('U')">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">EDITAR registro </span>
	        </div>
	    </div>
	    <div class="bordes" style="margin-left:50px">
	        <div class="tdiv">
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="eliminar()">
	         		<img src="icons/Cancel.png" >
	         	</a>
	         	<span class="tooltiptext">ELIMINAR registro </span>
	        </div>	    	
	    </div>
        <div style="display:none">
			<input id="ropcion" name="ropcion" class="easyui-textbox"
				   style="width:40px"
				   data-options="">
        </div>
	</div>
	
	<table id="dgdatosveh" class="easyui-datagrid" title="LISTA VEHICULOS"
		style="width:100%;height:auto%"
		url="json/datosveh_getdata.php" singleSelect="true"
		headerCls="hc" pagination="true" showFooter="true"
		fitColumns="false">
		<thead data-options="frozen:true">
            <tr>
				<th field="id", width="50" sortable="true" hidden="true">Id</th>
				<th field="colegio", width="100" sortable="true">Colegio</th>
				<th field="ruta", width="100" sortable="true">Ruta</th>
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

	<!-- DIALOG manejo de datos de la tabla tbdatosveh //////////////////////////////////////////// -->
	<div id="dlgdatosveh" class="easyui-dialog" closed="true" buttons="#dlg-buttons" title="DATOS VEHICULO"
		style="width:50%;height:40%;padding-top:2%"
		data-options="modal:true">
		<!-- FORMULARIO datos vehiculo //////////////////////////////////////////////////////////// -->
		<form id="frmdatosveh">
			<!-- id del registro para control ///////////////////////////////////////////////////////// -->
			<div style="display:none">
				<input id="id" name="id" class="easyui-textbox" readonly> 
			</div>

			<!-- linea 1 datos de id, colegio, ruta, interno ////////////////////////////////////////// -->
			<div class="ritem">
				<label>Colegio:</label>
				<input id="colegio" name="colegio" class="easyui-combobox" 
					   url="json/combocolegios.php"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">
	 			<label>Ruta:</label>
	 			<input id="ruta" name="ruta" class="easyui-textbox" > 
	 			<label>Interno:</label>
	 			<input id="interno" name="interno" class="easyui-textbox" > 
				
			</div>

			<!-- linea 2 datos de nombreconductor y celular /////////////////////////////////////////// -->
			<div class="ritem">
	 			<label>Conductor:</label>
	 			<input id="nombreconductor" name="nombreconductor" class="easyui-textbox" style="width:40%"> 
	 			<label>Celular:</label>
	 			<input id="celular" name="celular" class="easyui-textbox" style="width:20%"> 
			
			</div>

			<!-- linea 3 datos de auxiliar y celular ////////////////////////////////////////////////// -->
			<div class="ritem">
	 			<label>Auxiliar:</label>
	 			<input id="nombreauxiliar" name="nombreauxiliar" class="easyui-textbox" style="width:40%"> 
	 			<label>Celular:</label>
	 			<input id="celularauxiliar" name="celularauxiliar" class="easyui-textbox" style="width:20%"> 
				
			</div>

			<!-- linea 4 placa, entrega /////////////////////////////////////////////////////////////// -->
			<div class="ritem">
	 			<label>Placa:</label>
	 			<input id="placa" name="placa" class="easyui-textbox"> 
	 			<label>Fecha:</label>
				<input id="fechaentrega" name="fechaentrega" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100">

			</div>

			<!-- linea 5 sector solamente ///////////////////////////////////////////////////////////// -->
			<div class="ritem">
	 			<label>Sector:</label>
	 			<input id="sector" name="sector" class="easyui-textbox" style="width:50%"> 
	 			<label>Capacidad:</label>
	 			<input id="capacidad" name="capacidad" class="easyui-textbox" style="width:5%"> 

			</div>

		</form>
	</div>

	<!-- botones de control /////////////////////////////////////////////////////////////////////// -->
	<div id="dlg-buttons">
		<div class="botonera">
	        <div class="tdiv" style="float:right">
	         	<a id="btnGrabar" name="btnGrabar" class="boton" onclick="registro()">
	         		<img src="icons/Ok.png" >
	         	</a>	         	
	        </div>

	        <div class="tdiv" style="float:right">
	         	<a id="btnCancelar" name="btnCancelar" class="boton" onclick="javascript:$('#dlgdatosveh').dialog('close')">
	         		<img src="icons/Cancel.png" >
	         	</a>	         	
	        </div>
		</div>		    
	</div>


	<!-- SCRIPT funciones generales para manejo de variable /////////////////////////////////////// -->
	<script type="text/javascript">
		function getVar(pnombre,ptipo){
			if(ptipo==0){
				return $("#"+pnombre).textbox('getValue');
			}else if(ptipo==1){
				return $("#"+pnombre).numberbox('getValue');
			}else if(ptipo==2){
				return $("#"+pnombre).datebox('getValue');
			}
		}

		function setVar(pnombre, ptipo, pvalor){
			if(ptipo==0){
				$("#"+pnombre).textbox('setValue', pvalor);
			}else if(ptipo==1){
				$("#"+pnombre).numberbox('setValue', pvalor);
			}else if(ptipo==2){
				$("#"+pnombre).datebox('setValue'. pvalor);
			}			
		}

		function pantalla(pnombre){
			var xopcion = getVar('ropcion', 0);
			if(xopcion=='N'){
				var titulo = 'NUEVO';
			}else if(xopcion=='U'){
				var titulo = 'ACTUALIZAR';
			}

			$("#"+pnombre).dialog('hcenter');
			$("#"+pnombre).dialog('vcenter');
			$("#"+pnombre).dialog('setTitle', 'DATOS VEHICULO - '+titulo).dialog('open');

		}
	</script>

	<!-- SCRIPT formato fechas //////////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
        function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
	</script>

	<!-- SCRIPT set variable ropcion con N, U, D funciones de nuevo, editar, eliminar ///////////// -->
	<script type="text/javascript">
		function ejecutar(popcion){
			setVar('ropcion', 0, popcion);
			$("#frmdatosveh").form('clear');
			
			// si es nuevo solo abre la pantalla 
			if(popcion=='N'){
				pantalla('dlgdatosveh');
				setVar('fechaentrega',0,'0000-00-00');
				setVar('capacidad',0,'0');
				url = 'json/datosveh_save.php';

			}else if(popcion=='U'){
				var rows = $("#dgdatosveh").datagrid('getSelections');
				var xcuantos = rows.length;				

				if(xcuantos>0){
					var row = $("#dgdatosveh").datagrid('getSelected');					

					pantalla('dlgdatosveh');
					$("#frmdatosveh").form('load', row);
					url = 'json/datosveh_update.php?id='+row.id;				

				}else {
					$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	

				}
				
			}

		}
	</script>

	<!-- SCRITP functiones registro => insert, update, delete ///////////////////////////////////// -->
	<script type="text/javascript">
		function registro(){
			var xopcion = getVar('ropcion',0);

			if(xopcion=='N'){
				saveRegistro();

			}else if(xopcion=='U'){
				saveRegistro();

			}

		}

		function saveRegistro(){
			$('#frmdatosveh').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					//var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
						$('#dlgdatosveh').dialog('close');		// close the dialog
						$('#dgdatosveh').datagrid('reload');	// reload the user data
					}
				}
			});
		}

		function eliminar(){
			var row = $('#dgdatosveh').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el vehiculo: ' + row.placa,function(r){
					if (r){
						$.post('json/datosveh_destroy.php',{id:row.id},function(result){
							if (result.success){
								$('#dgdatosveh').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}

	</script>
</body>
</html>