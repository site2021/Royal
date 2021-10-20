<?
session_start();
$usuario = $_SESSION['usuario'];

include '../../control/conex.php';

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
			$("#dgcontratoest").datagrid('enableFilter');			
		})
	</script>

</head>
<body>
	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
	    <!-- impresion de planilla de rutas /////////////////////////////////////////////////////// -->
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="printContrato()">
	         		<img src="icons/Document.png" >
	         	</a>
	         	<span class="tooltiptext">Descargar CONTRATO</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnNuevo" name="btnEditar" class="boton" onclick="newMantenimiento()">
	         		<img src="icons/Plus.png" >
	         	</a>
	         	<span class="tooltiptext">Nuevo MANTENIMIENTO</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="editContrato()">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">Editar MANTENIMIENTO</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="destroyContrato()">
	         		<img src="icons/Trash.png" >
	         	</a>
	         	<span class="tooltiptext">Eliminar Contrato</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="VerMantenimientos()">
	         		<img src="icons/Tool.png" >
	         	</a>
	         	<span class="tooltiptext">Ver Mantenimientos</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="printContratos()">
	         		<img src="icons/Excel.png" >
	         	</a>
	         	<span class="tooltiptext">Descargar Contratos</span>
	        </div>
	    </div>
	</div>
	<table id="dgcontratoest" class="easyui-datagrid" title="LISTA CONTRATOS ESTUDIANTILES" style="width:100%;height:500px;margin-top:50px;"
		
		toolbar="#toolbarmantenimiento"
		headerCls="hc"
		rownumbers="true" fitColumns="false" singleSelect="true"
		data-options="
                url: 'json/estcontratos_get.php',
                method: 'get',
                rowStyler: function(index,row){
                    if (row.estado == ''){
                        return 'background-color:#BFFF80;color:#000000;font-weight:bold;';
                    }
                }
            ">
		<thead data-options="frozen:true">
            <tr>
				<th field="id", width="50" sortable="true" hidden="true">Id</th>
				<th field="colegio", width="100" sortable="true">Colegio</th>
				<th field="fecha", width="100" sortable="true">Fecha</th>
				<th field="codigo", width="100" sortable="true">Codigo</th>	            	
            </tr>
        </thead>
		<thead>
			<tr>
				<th field="estado", width="50" sortable="true">Est</th>
				<th field="grado", width="50" sortable="true">Grado</th>				
				<th field="recorrido", width="50" sortable="true">Recorrido</th>
				<th field="ruta", width="50" sortable="true">Ruta</th>
				<th field="mrutaam", width="50" sortable="true">AM</th>
				<th field="mrutapm", width="50" sortable="true">PM</th>				
				<th field="ruta2da", width="50" sortable="true">2da</th>
				<th field="barrio", width="100" sortable="true">Barrio</th>
				<th field="nombre", width="200" sortable="true">Nombre</th>				
				<th field="direccion", width="200" sortable="true">Direccion</th>
				<th field="comuna", width="100" sortable="true">Comuna</th>
				<th field="ciudad", width="100" sortable="true">Ciudad</th>
				<th field="direccion2", width="200" sortable="true">Direccion2</th>
				<th field="barrio2", width="100" sortable="true">Barrio2</th>
				<th field="comuna2", width="100" sortable="true">Comuna2</th>
				<th field="ciudad2", width="100" sortable="true">Ciudad2</th>
				<th field="telefono", width="100" sortable="true">Telefono</th>
				<th field="celular", width="100" sortable="true">Celular</th>
				<th field="celular2", width="100" sortable="true">Celular</th>
				<th field="nombreacudiente", width="200" sortable="true">Acudiente</th>
				<th field="cedula", width="50" sortable="true">Cedula</th>
				<th field="email", width="200" sortable="true">Email Padre</th>
				<th field="email2", width="200" sortable="true">Email Madre</th>
				<th field="observaciones", width="100" sortable="true">Observaciones</th>				
				<th field="tarifav", width="100" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">TarifaV
				</th>
				<th field="tarifabl", width="100" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">TarifaBL
				</th>
              	<!--
				<th field="tarifaaso", width="100" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">TarifaAso
				</th>
				-->
              	<th field="tarifaaso", width="120" sortable="true" align="right">TarifaAso</th>
				<th field="xdosdir", width="50" sortable="true" hidden="true">dosdir</th>
				<th field="id_grado", width="50" sortable="true">id_G</th>				
			</tr>
		</thead>
	</table>	

	<!-- DIALOG: editar registro ////////////////////////////////////////////////////////////////// -->
	<div id="dlgcontratoest" class="easyui-dialog" headerCls="hc"
 		data-options="modal:true,closed:true" buttons="#dlg-buttons"
 		style="padding:5px;width:80%">

 		<!-- variable de control NUEVO/EDITAR -->	
 		<div style="display:none">
 			<input id="qopcion" name="qopcion" class="easyui-textbox" style="width:50px">
 			<input id="rid" name="rid" class="easyui-textbox" style="width:50px">
 		</div>

 		<form id="frmDatos">
	 		<div class="ritem">
	 			<label>Vigencia:</label>
				<select id="nvigencia" name="nvigencia" class="easyui-combobox" style="width:150px;">
				    <option value="2018">2018</option>
				    <option value="2019">2019</option>
				    <option value="2020">2020</option>
				</select>
			</div> 			
	 		<div class="ritem">
	 			<label>Colegio:</label>
				<input id="colegio" name="colegio" class="easyui-combobox" 
					   url="json/combocolegios.php" style="width:150px"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">
	 			<label>Fecha:</label>
				<input id="fecha" name="fecha" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100">
	 			<label>Codigo:</label>
				<input id="codigo" name="codigo" class="easyui-textbox" 
				   data-options="">
	 			<label>Estado:</label>
				<input id="estado" name="estado" class="easyui-textbox" style="width:50px" 
				   data-options="">
	 			<label>Grado:</label>
				<input id="id_grado" name="grado" class="easyui-combobox" 
					   url="json/combogrados.php" style="width:100px"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">
	 		</div>

	 		<div class="ritem">
	 			<label>Nombre:</label>
	 			<input id="nombre" name="nombre" class="easyui-textbox" style="width:403px" > 
	 			<label>Direccion:</label>
	 			<input id="direccion" name="direccion" class="easyui-textbox" style="width:403px" > 
	 		</div>
	 		<div class="ritem">
	 			<label>Barrio:</label>
				<input id="barrio" name="barrio" class="easyui-combobox" 
					url="" style="width:236px"
					data-options="editable:true,valueField:'nombre',textField:'nombre'">
	 			<label>Coumna:</label>
	 			<input id="comuna" name="comuna" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true"> 
	 			<label>Ciudad:</label>
	 			<input id="ciudad" name="ciudad" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true"> 	 			
	 		</div>
	 		<div class="ritem">
	 			<label>2da.Dir.:</label>
				<select id="xdosdir" name="xdosdir" class="easyui-combobox" style="width:50px;">
				    <option value="si">SI</option>
				    <option value="no" selected>NO</option>
				</select>
	 			<input id="direccion2" name="direccion2" class="easyui-textbox" style="width:450px"
	 				data-options="disabled:true">				
	 		</div>
	 		<div class="ritem">
	 			<label>Barrio:</label>
				<input id="barrio2" name="barrio2" class="easyui-combobox" 
					url="" style="width:236px"
					data-options="disabled:true,editable:true,valueField:'nombre',textField:'nombre'">
	 			<label>Coumna:</label>
	 			<input id="comuna2" name="comuna2" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true"> 
	 			<label>Ciudad:</label>
	 			<input id="ciudad2" name="ciudad2" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true"> 	 			
	 		</div>
	 		<div class="ritem">
	 			<label>Telefono:</label>
	 			<input id="telefono" name="telefono" class="easyui-textbox" style="width:236px" > 
	 			<label>Celular:</label>
	 			<input id="celular1" name="celular1" class="easyui-textbox" style="width:236px" > 
	 			<label>Celular:</label>
	 			<input id="celular2" name="celular2" class="easyui-textbox" style="width:236px" > 	 			
	 		</div>
	 		<div class="ritem">
	 			<label>Acudiente:</label>
	 			<input id="nombreacudiente" name="nombreacudiente" class="easyui-textbox" style="width:350px" > 
	 			<label>Cedula:</label>
	 			<input id="cedula" name="cedula" class="easyui-textbox" style="width:150px" > 
	 			<label>Email Padre:</label>
	 			<input id="email" name="email" class="easyui-textbox" style="width:205px" > 	 			
	 		</div>
	 		<div class="ritem">
	 			<label>Observacion:</label>
	 			<input id="observaciones" name="observaciones" class="easyui-textbox" style="width:500px" >
	 			<label>Email Mama:</label>
	 			<input id="email2" name="email2" class="easyui-textbox" style="width:205px" > 
	 		</div>
	 		<div class="ritem">
	 			<label>Recorrido:</label>
				<select id="recorrido" name="recorrido" class="easyui-combobox" style="width:150px;">
				    <option value="1">RUTA X COMPLETA</option>
				    <option value="2">MEDIA RUTA AM</option>
				    <option value="3">MEDIA RUTA PM</option>
				    <option value="4">DOS DIRECCIONES</option>
				</select>
				<label>T.Vigente:</label>
				<input id="tarifav" name="tarifav" class="easyui-numberbox" 
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','">
				<label>T.BL:</label>
				<input id="tarifabl" name="tarifabl" class="easyui-numberbox" 
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','">
	 		</div>
	 		<div id="rfm">
	 			<label>Asignacion Rutas</label>	 			
	 		</div>
	 		<div class="ritem">
	 			<label>T.Asociado:</label>
				<input id="tarifaaso" name="tarifaaso" class="easyui-numberbox" 
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','">
	 		</div>
			<div class="ritem">
				<label>Ruta:</label>
				<input id="ruta" name="ruta" class="easyui-textbox" style="width:50px">
				<label>Ruta 2da:</label>
				<input id="ruta2da" name="ruta2da" class="easyui-textbox" style="width:50px" >
				<label>M.Ruta AM:</label>
				<input id="mrutaam" name="mrutaam" class="easyui-textbox" style="width:50px" >
				<label>M.Ruta PM:</label>
				<input id="mrutapm" name="mrutapm" class="easyui-textbox" style="width:50px" >
			</div>

 		</form>
	</div>

	<div id="dlg-buttons">
		<div class="botonera">
	        <div class="tdiv" style="float:right">
	         	<a id="btnGrabar" name="btnGrabar" class="boton" onclick="grabarRegistro()">
	         		<img src="icons/Ok.png" >
	         	</a>
	         	<!-- <span class="tooltiptext">Grabar</span> -->
	        </div>

	        <div class="tdiv" style="float:right">
	         	<a id="btnCancelar" name="btnCancelar" class="boton" onclick="javascript:$('#dlgcontratoest').dialog('close')">
	         		<img src="icons/Cancel.png" >
	         	</a>
	         	<!-- <span class="tooltiptext">Cancelar</span> -->
	        </div>			
		</div>		
		</div>


	<script type="text/javascript">

		var url;

		function newMantenimiento(){
			$('#dlgcontratoest').dialog('open').dialog('setTitle','Nuevo MANTENIMIENTO');
			$('#fm').form('clear');
			url = 'json/mantenimiento_save.php';
			maxRegistro();
			ponerCeros(consecutivo);
		}

		function printContrato(){
			var xreg = $("#dgcontratoest").datagrid('getSelected');

			var xcolegio = xreg['colegio'];
			var xtarifav = xreg['tarifav'];
			var xnombre = xreg['nombre'];
			var xnombreacudiente = xreg['nombreacudiente'];
			var xcelular1 = xreg['celular1'];
			var xcelular2 = xreg['celular2'];
			var xtelefono = xreg['telefono'];
			var xemail = xreg['email'];
			var xemail2 = xreg['email2'];
			var xrecorrido = xreg['recorrido'];
			var xcodigo = xreg['codigo'];

			if (xcolegio != 'LICEO CAMPESTRE') {
				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

				window.open ("contrato.php?colegio="+xcolegio+'&tarifav='+xtarifav+'&nombre='+xnombre+
				'&nombreacudiente='+xnombreacudiente+
				'&celular1='+xcelular1+
				'&celular2='+xcelular2+
				'&telefono='+xtelefono+
				'&email='+xemail+
				'&email2='+xemail2+
				'&recorrido='+xrecorrido, params);
			}
			else{
				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

				window.open ("contrato_liceomerani.php?colegio="+xcolegio+'&tarifav='+xtarifav+'&nombre='+xnombre+
				'&nombreacudiente='+xnombreacudiente+
				'&celular1='+xcelular1+
				'&celular2='+xcelular2+
				'&telefono='+xtelefono+
				'&email='+xemail+
				'&email2='+xemail2+
				'&recorrido='+xrecorrido+
				'&codigo='+xcodigo, params);
			}
		}

		function editContrato(){
			var row = $('#dgcontratoest').datagrid('getSelected');
			if (row){
				$('#dlgcontratoest').dialog('open').dialog('setTitle','Editar Contrato');
				$('#frmDatos').form('load',row);
				setVar('rid',0,row['id']);
				// setVar('id_grado',3,row['id_grado']);

				// url = 'json/update_mantenimiento.php?id='+row.id;

			}else {
					$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	

				}
		}

		function grabarRegistro(){
			$.messager.confirm('<font color=white>Confirmar</font>', 'Esta seguro de GRABAR registro?', function(r){
			if (r){
				var xcolegio = $("#colegio").combobox('getText');
				var xfecha = getVar('fecha',2);
				var xcodigo = getVar('codigo',0);
				var xestado = getVar('estado',0);
				//var xgrado = $("#grado").combobox('getText');
				var xgrado = getVar('id_grado', 3);					

				var xnombre = getVar('nombre',0);				
				var xdireccion = getVar('direccion',0);

				var xbarrio = $("#barrio").combobox('getText');
				var xcomuna = getVar('comuna',0);
				var xciudad = getVar('ciudad',0);

				var xdosdir = getVar('xdosdir',3);
				var xdireccion2 = getVar('direccion2',0);
				var xbarrio2 = $("#barrio2").combobox('getText');
				var xcomuna2 = getVar('comuna2',0);
				var xciudad2 = getVar('ciudad2',0);			

				var xtelefono = getVar('telefono',0);
				var xcelular1 = getVar('celular1',0);
				var xcelular2 = getVar('celular2',0);

				var xnombreacudiente = getVar('nombreacudiente',0);
				var xcedula = getVar('cedula',0);
				var xemail = getVar('email',0);

				var xobservaciones = getVar('observaciones',0);

				var xrecorrido = getVar('recorrido',3);

				var xtarifav = getVar('tarifav',1);
				var xtarifabl = getVar('tarifabl',1);
				var xtarifaaso = getVar('tarifaaso',1);

				var xruta = getVar('ruta',0);
				var xruta2da = getVar('ruta2da',0);
				var xmrutaam = getVar('mrutaam',0);
				var xmrutapm = getVar('mrutapm',0);					
					
				var xcamposActualizar = ['colegio','fecha','codigo','estado','grado','nombre','direccion','barrio','comuna','ciudad',
					'xdosdir','direccion2','barrio2','comuna2','ciudad2','telefono','celular1','celular2','nombreacudiente','cedula','email','observaciones','recorrido','tarifav','tarifabl','tarifaaso','ruta','ruta2da','mrutaam','mrutapm'];

				var xvaloresActualizar = [xcolegio,xfecha,xcodigo,xestado,xgrado,xnombre,xdireccion,xbarrio,xcomuna,xciudad,xdosdir,xdireccion2,xbarrio2,xcomuna2,xciudad2,xtelefono,xcelular1,xcelular2,xnombreacudiente,xcedula,xemail,xobservaciones,xrecorrido,xtarifav,xtarifabl,xtarifaaso,xruta,xruta2da,xmrutaam,xmrutapm];

				var xcamposCondicion = ['id'];

				var xid = getVar('rid',0);
				var xvaloresCondicion = [xid];

				$.post('json/myFileDB.php',
					{accion:'I', tabla:'tblistageneralnew', campos:xcamposActualizar , valores:xvaloresActualizar},
					function(result){
					if (result.success){
						$.messager.alert('<font color=white>Mensaje</font>', 'Registro grabado EXITOSAMENTE!!!');
						$('#dlgcontratoest').dialog('close');
						// $("#fmcovid").form('clear');
											
					} else {

						$.messager.alert('Mensaje', 'problemas!!!-grabar registro');
	
					}
				},'json');

				$.post('json/myFileDB.php',
					{accion:'U', tabla:'tblistaregistro', camposActualizar:xcamposActualizar , valoresActualizar:xvaloresActualizar,
					 camposCondicion:xcamposCondicion , valoresCondicion:xvaloresCondicion },
					function(result){
					if (result.success){
						$.messager.alert('Mensaje', 'registro ACTUALIZADO existosamente!!!');
						$("#dgcontratoest").datagrid('reload');
						$("#dlgcontratoest").dialog('close');
					} else {								
						$.messager.alert('Mensaje', 'problemas!!!-ACTUALIZAR registro');
					}
				},'json');

			}
		});
		}

		function hg(){
			$.messager.confirm('<font color=white>Confirmar</font>', 'Esta seguro de GRABAR registro?', function(r){
				if (r){

					alert('estoy en guardar');

					var xcolegio = $("#colegio").combobox('getText');

					var xfecha = $("#fecha").textbox('getText');
					// var xfecha = getVar('fecha',2);

					var xcodigo = $("#codigo").textbox('getText');
					// var xcodigo = getVar('codigo',0);

					var xestado = $("#estado").textbox('getText');
					// var xestado = getVar('estado',0);


					var xgrado = $("#id_grado").combobox('getText');
					// var xgrado = getVar('id_grado', 3);					

					var xnombre = $("#nombre").textbox('getText');
					// var xnombre = getVar('nombre',0);	

					var xdireccion = $("#direccion").textbox('getText');
					// var xdireccion = getVar('direccion',0);

					var xbarrio = $("#barrio").combobox('getText');
					// var xbarrio = $("#barrio").combobox('getText');

					var xcomuna = $("#comuna").textbox('getText');
					// var xcomuna = getVar('comuna',0);

					var xciudad = $("#ciudad").textbox('getText');
					// var xciudad = getVar('ciudad',0);

					var xdosdir = $("#xdosdir").combobox('getText');
					// var xdosdir = getVar('xdosdir',3);

					var xdireccion2 = $("#direccion2").textbox('getText');
					// var xdireccion2 = getVar('direccion2',0);

					var xbarrio2 = $("#barrio2").combobox('getText');
					// var xbarrio2 = $("#barrio2").combobox('getText');

					var xcomuna2 = $("#comuna2").textbox('getText');
					// var xcomuna2 = getVar('comuna2',0);

					var xciudad2 = $("#ciudad2").textbox('getText');
					// var xciudad2 = getVar('ciudad2',0);			

					var xtelefono = $("#telefono").textbox('getText');
					// var xtelefono = getVar('telefono',0);

					var xcelular1 = $("#celular1").textbox('getText');
					// var xcelular1 = getVar('celular1',0);

					var xcelular2 = $("#celular2").textbox('getText');
					// var xcelular2 = getVar('celular2',0);

					var xnombreacudiente = $("#nombreacudiente").textbox('getText');
					// var xnombreacudiente = getVar('nombreacudiente',0);

					var xcedula = $("#cedula").textbox('getText');
					// var xcedula = getVar('cedula',0);

					var xemail = $("#email").textbox('getText');
					// var xemail = getVar('email',0);

					var xobservaciones = $("#observaciones").textbox('getText');
					// var xobservaciones = getVar('observaciones',0);

					var xrecorrido = $("#recorrido").combobox('getText');
					// var xrecorrido = getVar('recorrido',3);

					var xtarifav = $("#tarifav").numberbox('getText');
					// var xtarifav = getVar('tarifav',1);

					var xtarifabl = $("#tarifabl").numberbox('getText');
					// var xtarifabl = getVar('tarifabl',1);

					var xtarifaaso = $("#tarifaaso").numberbox('getText');
					// var xtarifaaso = getVar('tarifaaso',1);

					var xruta = $("#ruta").textbox('getText');
					// var xruta = getVar('ruta',0);

					var xruta2da = $("#ruta2da").textbox('getText');
					// var xruta2da = getVar('ruta2da',0);

					var xmrutaam = $("#mrutaam").textbox('getText');
					// var xmrutaam = getVar('mrutaam',0);

					var xmrutapm = $("#mrutapm").textbox('getText');
					// var xmrutapm = getVar('mrutapm',0);					
					
					var xcampos = ['colegio','fecha','codigo','estado','grado','nombre','direccion','barrio','comuna','ciudad',
						'xdosdir','direccion2','barrio2','comuna2','ciudad2','telefono','celular1','celular2','nombreacudiente','cedula',
						'email','observaciones','recorrido','tarifav','tarifabl','tarifaaso','ruta','ruta2da','mrutaam','mrutapm'];

					var xvalores = [xcolegio,xfecha,xcodigo,xestado,xgrado,xnombre,xdireccion,xbarrio,xcomuna,xciudad,xdosdir,xdireccion2,xbarrio2,xcomuna2,xciudad2,xtelefono,xcelular1,xcelular2,xnombreacudiente,xcedula,xemail,xobservaciones,xrecorrido,xtarifav,xtarifabl,xtarifaaso,xruta,xruta2da,xmrutaam,xmrutapm];

					$.post('json/myFileDB.php',
						{accion:xaccion, tabla:xtabla, campos:xcampos, valores:xvalores},
						function(result){
						if (result.success){
							$.messager.alert('<font color=white>Mensaje</font>', 'Registro grabado EXITOSAMENTE!!!');
							$('#dlgcovid').dialog('close');
							$("#fmcovid").form('clear');					
						}else {
							$.messager.alert('Mensaje', 'problemas!!!-grabar registro');
	
						}
					},'json');


				}
			});
		}
			

		function saveMantenimiento(){
			$('#fm').form('submit',{
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
						$('#dlgcontratoest').dialog('close');		// close the dialog
						$('#dgcontratoest').datagrid('reload');	// reload the user data
					}
				}
			});
		}

		function destroyContrato(){
			var row = $('#dgcontratoest').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el registro: ' + row.nombre,function(r){
					if (r){
						$.post('json/destroy_contratoest.php',{id:row.id},function(result){
							if (result.success){
								$('#dgcontratoest').datagrid('reload');	// reload the user data
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
			else {
				$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	
			}
		}

 	// 	function maxRegistro(){
		// 	$.post('json/consecutivo_factura.php', 
		// 		{}, 
		// 		function(result){
		// 			if(result.success){
		// 				var xmax = parseInt(result.rmaximo) + 1;
		// 				$("#consecutivo").textbox("setValue",xmax);
		// 			}
		// 			else{
		// 				$.messager.alert('Mensaje','error Insertar tbcontratos');
		// 			}
		// 		}, 
		// 	'json');
		// }

		function maxRegistro(){
			$.post('json/consecutivo_factura.php', 
				{}, 
				function(result){
					if(result.success){
						var rmaximo = result.rmaximo;
						if(rmaximo){
							// alert('ok');
						}else {
							// alert('si');
						}

						// adicionar ceros al nextr
						var nlong = rmaximo.length;
						var nnext = '0'.repeat(4-nlong) + rmaximo;

						// alert("rmaximo="+nnext);

						// ncontrato tiene YA los ceros
						// setVar('ncontrato',0,ncontrato);
						$("#consecutivo").textbox("setValue",nnext);

						// return ncontrato;
																
					}
				}, 
			'json');
		}

		function ponerCeros(pcontrato){
			var long = pcontrato.length;
			var consecutivo = '';

			consecutivo = '0'.repeat(4-long) + pcontrato;
		}

		function printContratos(){

			location.assign("contratosestExcel.php");
		}
		
 		
	</script>

	<script type="text/javascript">
		function hoy(){
			var xhoy = new Date();
			var y = xhoy.getFullYear();
			var m = xhoy.getMonth()+1;
			var d = xhoy.getDate();
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
		}

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

	<script type="text/javascript">
 		function getVar(pnombre,ptipo){
 			if(ptipo==0){ return $("#"+pnombre).textbox('getValue');}
 			if(ptipo==1){ return $("#"+pnombre).numberbox('getValue');}
 			if(ptipo==2){ return $("#"+pnombre).datebox('getValue');}
 			if(ptipo==3){ return $("#"+pnombre).combobox('getValue');}
 		}

 		function setVar(pnombre,ptipo,pvalor){
 			if(ptipo==0){ $("#"+pnombre).textbox('setValue',pvalor);}
 			if(ptipo==1){ $("#"+pnombre).numberbox('setValue',pvalor);}
 			if(ptipo==2){ $("#"+pnombre).datebox('setValue',pvalor);}
 			if(ptipo==3){ $("#"+pnombre).combobox('setValue',pvalor);}
 		}
 	</script>

	<style type="text/css">
		.hc {
			background: #92D050;				
		}
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}

		.ritem {
			float:left;
			width:100%;
			margin-top:10px;			
		}
		.ritem label {
			text-align: right;
			display:inline-block;
			font-weight: bold;
			width:90px;
		}
		.ritem input{
			text-align: left;
			width:110px;
		}
	</style>

</body>
</html>