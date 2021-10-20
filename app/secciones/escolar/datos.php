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

		#dlgdatos {
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

	<!-- filter Lib - /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$(function(){
			$("#dgdatos").datagrid('enableFilter');			
		})
	</script>

</head>
<body>
	<!-- botones para acciones principales ////////////////////////////////////////// -->
	<div class="botonera">
		<div class="bordes centradoV" style="padding:12px">
 			<label>Colegio:</label>
			<input id="dcolegio" name="dcolegio" class="easyui-combobox" 
				   url="json/combocolegios.php" style="width:150px"
				   data-options="editable:false,valueField:'codigo',textField:'nombre'">				
			
		</div>
		<div class="bordes" style="margin-left:50px">
	        <div class="tdiv">
	         	<a id="btnNuevo" name="btnNuevo" class="boton" onclick="ejecutar('N')">
	         		<img src="icons/Plus.png" >
	         	</a>
	         	<span class="tooltiptext">NUEVO registro</span>
	        </div>
	        <div class="tdiv">
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="ejecutar('U')">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">EDITAR registro</span>
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
	
	<table id="dgdatos" class="easyui-datagrid" title="LISTADO TARIFAS"
		style="width:100%;height:auto"
		url="json/datos_new_getdata.php" singleSelect="true"
		headerCls="hc" pagination="true" showFooter="true"
		fitColumns="false">
		<thead data-options="frozen:true">
            <tr>
				<th field="id", width="50" sortable="true" hidden="true">Id</th>
				<th field="vigencia", width="60" sortable="true">Vigencia</th>
				<th field="colegio", width="120" sortable="true">Colegio</th>
				<th field="barrio", width="200" sortable="true">Barrio</th>
				<th field="comuna", width="200" sortable="true">Comuna</th>								
            </tr>
        </thead>
		<thead>
			<tr>
				<th field="ciudad", width="200" sortable="true">Ciudad</th>
				<th field="tarifavigente", width="80" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Vigente
				</th>
				<th field="tarifabl", width="80" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Tarifabl
				</th>				
				<th field="tarifaaso", width="80" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Tarifaaso
				</th>
				<th field="mediatv", width="80" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Mediatv
				</th>
				<th field="mediabl", width="80" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Mediabl
				</th>
				<th field="mediata", width="80" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Mediata
				</th>
				<th field="dosdirtv", width="80" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Dosdirtv
				</th>
				<th field="dosdirbl", width="80" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Dosdirbl
				</th>
				<th field="dosdirta", width="80" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Dosdirta
				</th>

			</tr>
		</thead>
	</table>

	<!-- DIALOG manejo de datos de la tabla tbdatosveh //////////////////////////////////////////// -->
	<div id="dlgdatos" class="easyui-dialog" closed="true" buttons="#dlg-buttons" title="DATOS TARIFA"
		style="width:60%;height:50%;padding-top:2%"
		data-options="modal:true">
		<!-- FORMULARIO datos vehiculo //////////////////////////////////////////////////////////// -->
		<form id="frmdatos">
			<!-- id del registro para control ///////////////////////////////////////////////////////// -->
			<div style="display:none">
				<input id="id" name="id" class="easyui-textbox" readonly> 
			</div>

			<!-- linea 1 datos vigencia y colegio ///////////////////////////////////////////////////// -->			
			<div class="ritem">
				<label>Vigencia:</label>
				<input id="vigencia" name="vigencia" class="easyui-combobox" 
					   url="json/combovigencias.php"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">

				<label>Colegio:</label>
				<input id="colegio" name="colegio" class="easyui-combobox" 
					   url="json/combocolegios.php"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">
			</div>

			<!-- linea 2 /////////////////////////////////////////// -->
			<div class="ritem">
	 			<label>Barrio:</label>
	 			<input id="barrio" name="barrio" class="easyui-textbox"> 
	 			<label>Comuna:</label>
	 			<input id="comuna" name="comuna" class="easyui-textbox"> 
	 			<label>Ciudad:</label>
	 			<input id="ciudad" name="ciudad" class="easyui-textbox">				
			</div>

			<!-- linea 3 /////////////////////////////////////////// -->
			<div class="ritem">
	 			<label>Vigente:</label>
				<input id="tarifavigente" name="tarifavigente" class="easyui-numberbox"
					   style="width:110px"
					   data-options="precision:0,groupSeparator:','">
	 			<label>(1/2)TV:</label>
				<input id="mediatv" name="mediatv" class="easyui-numberbox"
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','"> 			
	 			<label>(2 Dir)TV:</label>
				<input id="dosdirtv" name="dosdirtv" class="easyui-numberbox"
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','">
			</div>

			<!-- linea 4 /////////////////////////////////////////// -->
			<div class="ritem">
	 			<label>Tarifa BL:</label>
				<input id="tarifabl" name="tarifabl" class="easyui-numberbox"
					   style="width:110px"
					   data-options="precision:0,groupSeparator:','">
	 			<label>(1/2)BL:</label>
				<input id="mediabl" name="mediabl" class="easyui-numberbox"
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','"> 			
	 			<label>(2 Dir)BL:</label>
				<input id="dosdirbl" name="dosdirbl" class="easyui-numberbox"
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','">
			</div>

			<!-- linea 5 /////////////////////////////////////////// -->
			<div class="ritem">
	 			<label>Tarifa Aso:</label>
				<input id="tarifaaso" name="tarifaaso" class="easyui-numberbox"
					   style="width:110px"
					   data-options="precision:0,groupSeparator:','">
	 			<label>(1/2)Aso:</label>
				<input id="mediata" name="mediata" class="easyui-numberbox"
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','"> 			
	 			<label>(2 Dir)Aso:</label>
				<input id="dosdirta" name="dosdirta" class="easyui-numberbox"
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','">
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
	         	<a id="btnCancelar" name="btnCancelar" class="boton" onclick="javascript:$('#dlgdatos').dialog('close')">
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
			$("#"+pnombre).dialog('setTitle', 'TARIFAS - '+titulo).dialog('open');

		}
	</script>

	<!-- SCRIPT set variable ropcion con N, U, D funciones de nuevo, editar, eliminar ///////////// -->
	<script type="text/javascript">
		function ejecutar(popcion){
			setVar('ropcion', 0, popcion);

			// si es nuevo solo abre la pantalla 
			if(popcion=='N'){
				// habilitar todos los campos para entrada de datos
				camposEstado(1,1,1,1,1);

				// limpiar contenido de dlgdatos
				$("#frmdatos").form('clear');

				pantalla('dlgdatos');				

			}else if(popcion=='U'){
				// habilitar campos para actualizar - solo tarifas
				camposEstado(0,0,0,0,0);

				var rows = $("#dgdatos").datagrid('getSelections');
				var xcuantos = rows.length;				

				if(xcuantos>0){
					var row = $("#dgdatos").datagrid('getSelected');					

					pantalla('dlgdatos');
					$("#frmdatos").form('load', row);					

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
				newRegistro();

			}else if(xopcion=='U'){
				updateRegistro();

			}

		}

		function newRegistro(){
			$.messager.confirm('Confirm', 'Esta seguro de GRABAR registro?', function(r){
				if (r){
					var xaccion = 'I';
					var xtabla = 'tbdatosnew';

					var xvigencia = $("#vigencia").combobox('getText');
					var xcolegio = $("#colegio").combobox('getText');

					var xbarrio = getVar('barrio', 0);
					var xcomuna = getVar('comuna', 0);
					var xciudad = getVar('ciudad', 0);

					var xtarifavigente = getVar('tarifavigente', 1);
					var xmediatv = getVar('mediatv', 1);
					var xdosdirtv = getVar('dosdirtv', 1);
					var xtarifabl = getVar('tarifabl', 1);
					var xmediabl = getVar('mediabl', 1);
					var xdosdirbl = getVar('dosdirbl', 1);
					var xtarifaaso = getVar('tarifaaso', 1);
					var xmediata = getVar('mediata', 1);
					var xdosdirta = getVar('dosdirta', 1);


					var xcampos = ['vigencia','colegio','barrio','comuna','ciudad','tarifavigente','mediatv','dosdirtv',
								   'tarifabl','mediabl','dosdirbl','tarifaaso','mediata','dosdirta'];

					var xvalores = [xvigencia,xcolegio,xbarrio,xcomuna,xciudad,xtarifavigente,xmediatv,xdosdirtv,
									xtarifabl,xmediabl,xdosdirbl,xtarifaaso,xmediata,xdosdirta];

					$.post('json/myFileDB.php',
						{accion:xaccion, tabla:xtabla, campos:xcampos, valores:xvalores },
						function(result){
						if (result.success){
							$.messager.alert('Mensaje', 'Registro grabado EXITOSAMENTE!!!');
							$('#dlgdatos').dialog('close');

							// refrescar datagrid
							$("#dgdatos").datagrid('reload');
												
						} else {

							$.messager.alert('Mensaje', 'problemas!!!-grabar registro');
		
						}
					},'json');					

				}
			});

		}

		function updateRegistro(){
			$.messager.confirm('Confirm', 'Esta seguro de actualizar registro?', function(r){
				if (r){
					var xaccion = 'U';
					var xtabla = 'tbdatosnew';

					var xid = getVar('id', 0);

					var xvigencia = $("#vigencia").combobox('getText');
					var xcolegio = $("#colegio").combobox('getText');

					var xbarrio = getVar('barrio', 0);
					var xcomuna = getVar('comuna', 0);
					var xciudad = getVar('ciudad', 0);

					var xtarifavigente = getVar('tarifavigente', 1);
					var xmediatv = getVar('mediatv', 1);
					var xdosdirtv = getVar('dosdirtv', 1);
					var xtarifabl = getVar('tarifabl', 1);
					var xmediabl = getVar('mediabl', 1);
					var xdosdirbl = getVar('dosdirbl', 1);
					var xtarifaaso = getVar('tarifaaso', 1);
					var xmediata = getVar('mediata', 1);
					var xdosdirta = getVar('dosdirta', 1);
				
					var xcamposActualizar = ['vigencia','colegio','barrio','comuna','ciudad',
											 'tarifavigente','mediatv','dosdirtv',
								   			 'tarifabl','mediabl','dosdirbl','tarifaaso','mediata','dosdirta'];

					var xvaloresActualizar = [xvigencia,xcolegio,xbarrio,xcomuna,xciudad,
											  xtarifavigente,xmediatv,xdosdirtv,
											  xtarifabl,xmediabl,xdosdirbl,xtarifaaso,xmediata,xdosdirta];

					var xcamposCondicion = ['id'];
					var xvaloresCondicion = [xid];

					$.post('json/myFileDB.php',
						{accion:xaccion, tabla:xtabla, camposActualizar:xcamposActualizar, valoresActualizar:xvaloresActualizar,
						 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion },
						function(result){
						if (result.success){
							$.messager.alert('Mensaje', 'Registro actualizado EXITOSAMENTE!!!');
							$('#dlgdatos').dialog('close');

							// refrescar datagrid
							$("#dgdatos").datagrid('reload');
												
						} else {

							$.messager.alert('Mensaje', 'problemas!!!-actualizar registro');
		
						}
					},'json');					

				}
			});

		}

		function eliminar(){
			$.messager.confirm('Confirm', 'Esta seguro de ELIMINAR registro?', function(r){
				if (r){
					var rows = $("#dgdatos").datagrid('getSelections');
					var xcuantos = rows.length;

					if(xcuantos>0){
						var row = $("#dgdatos").datagrid('getSelected');						

						var xid = row['id'];
						var xaccion = 'D';
						var xtabla = 'tbdatos';

						var xcamposCondicion = ['id'];
						var xvaloresCondicion = [xid];

						$.post('json/myFileDB.php', 
							{accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion, 
							 valoresCondicion:xvaloresCondicion},							 
							function(result){
								if(result.success){
									$.messager.alert("Mensaje", "Registro eliminado EXITOSAMENTE!!!");

									// refrescar datos 
									$("#dgdatos").datagrid('reload');

								}else {
									$.messager.alert('Mensaje', 'problemas!!!-eliminar registro');

								}

							}, 
						'json');


					}else {
						$.messager.alert("Mensaje", "NO hay registro SELECCIONADO!!!");						
					}

				}
			});
		}


	</script>

	<!-- SCRIPT manejo de elementos en dlgdatos /////////////////////////////////////////////////// -->
	<script type="text/javascript">
		function camposDlg(){

		}

		function camposEstado(p1,p2,p3,p4,p5){
			$("#vigencia").combobox(p1==0?'disable':'enable');
			$("#colegio").combobox(p2==0?'disable':'enable');
			$("#barrio").textbox(p3==0?'disable':'enable');
			$("#comuna").textbox(p4==0?'disable':'enable');
			$("#ciudad").textbox(p5==0?'disable':'enable');

		}

		function calcularTarifas(){	
			var xcolegio = $("#colegio").combobox('getText');

			// tarifa vigente ---------------------------------
			var xtv = getVar('tarifavigente', 1);
			if(parseInt(xtv)!=0){
				if(xcolegio=='CALASANZ'){
					var xmediatv = xtv * 0.70;
				}else {
					var xmediatv = xtv/2 + 20000;
				}				
				var xdosdirtv = xtv * 1.25;
			}else {
				var xmediatv = 0;
				var xdosdirtv = 0;
			}
			setVar('mediatv', 1, xmediatv);
			setVar('dosdirtv', 1, xdosdirtv);
			// ------------------------------------------------


			var xbl = getVar('tarifabl', 1);
			if(parseInt(xbl)!=0){
				if(xcolegio=='CALASANZ'){
					var xmediabl = xbl * 0.70;	
				}else {
					var xmediabl = xbl/2 + 20000;
				}
				
				var xdosdirbl = xbl * 1.25;
			}else {
				var xmediabl = 0;
				var xdosdirbl = 0;
			}
			setVar('mediabl', 1, xmediabl);
			setVar('dosdirbl', 1, xdosdirbl);


			var xaso = getVar('tarifaaso', 1);
			if(parseInt(xaso)!=0){
				if(xcolegio=='CALASANZ'){
					var xmediata = xaso * 0.70;
				}else {
					var xmediata = xaso/2 + 20000;
				}
				
				var xdosdirta = xaso * 1.25;
			}else {
				var xmediata = 0;
				var xdosdirta = 0;
			}
			setVar('mediata', 1, xmediata);
			setVar('dosdirta', 1, xdosdirta);

		}

	</script>

	<!-- SCRIPT onChange de elementos en el dgldatos ////////////////////////////////////////////// -->
	<script type="text/javascript">
		$("#tarifavigente").numberbox({
			onChange: function(value){
				calcularTarifas();
			}
		})

		$("#tarifabl").numberbox({
			onChange: function(value){
				calcularTarifas();
			}
		})

		$("#tarifaaso").numberbox({
			onChange: function(value){
				calcularTarifas();
			}
		})

		$("#dcolegio").combobox({
			onSelect: function(){
				mostrarTarifas();
			}
		})

	</script>

	<!-- SCRIPTs adicionales para actualizacion de tarifas //////////////////////////////////////// -->
	<script type="text/javascript">
		function mostrarTarifas(){
			var xcolegio = $("#dcolegio").combobox('getText');

			$("#dgdatos").datagrid('load',{
				colegio:xcolegio
			})
		}
	</script>

</body>
</html>