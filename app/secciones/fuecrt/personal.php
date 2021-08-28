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
			$("#dgcolaboradores").datagrid('enableFilter');			
		})
	</script>

</head>
<body>
	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
	    <!-- impresion de planilla de rutas /////////////////////////////////////////////////////// -->
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="newColaborador()">
	         		<img src="icons/User.png" >
	         	</a>
	         	<span class="tooltiptext">Nuevo COLABORADOR</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="editColaborador()">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">Editar COLABORADOR</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="destroyColaborador()">
	         		<img src="icons/Trash.png" >
	         	</a>
	         	<span class="tooltiptext">Eliminar COLABORADOR</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="descargarPersonal()">
	         		<img src="icons/Excel.png" >
	         	</a>
	         	<span class="tooltiptext">Descargar PERSONAL</span>
	        </div>
	    </div>
	</div>
	<table id="dgcolaboradores" class="easyui-datagrid" title="LISTADO DE PERSONAL" style="width:100%;height:500px;margin-top:50px;"
		url="json/colaboradores_get.php"
		toolbar="#toolbarcolaborador"
		headerCls="hc"
		rownumbers="true" fitColumns="false" singleSelect="true">
		<thead>
			<tr>					
            	<th field="interno" width="85px">interno</th>					
            	<th field="conductor" width="430px">conductor</th>					
            	<th field="cedulaconductor" width="150px">cedula</th>
            	<th field="celular" width="130px">celular</th>
            	<th field="categorialicencia" width="100px">licencia</th>
            	<th field="vigencialicencia" width="150px">vigencia</th>
            	<th field="tipoconductor" width="150px">tipo conductor</th>
			</tr>
		</thead>
	</table>

	<div id="dlgColaborador" class="easyui-dialog" data-options="modal:true" style="width:880px;height:500px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		
		<form id="fm" method="post" novalidate>
			<div class="ftitle">Datos COLABORADOR</div>
			<br>
			<div class="fitem">
				<label>Interno</label>
				<input id="interno" name="interno" class="easyui-textbox">

				<label>Conductor</label>
				<input id="conductor" name="conductor" class="easyui-textbox">

				<label>Cedula</label>
				<input id="cedulaconductor" name="cedulaconductor" class="easyui-textbox">
			</div>
			<br>
			<br>
			<div class="fitem">
				<label>Sexo</label>
				<select id="sexo" name="sexo" class="easyui-combobox" style="width:160px">
				    <option value="Masculino">Masculino</option>
				    <option value="Femenino">Femenino</option>
				</select>

				<label>Fecha Nac.</label>
				<input id="fechanacimiento" name="fechanacimiento" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

				<label>Edad</label>
				<input id="edad" name="edad" class="easyui-numberbox">
			</div>
			<div class="fitem">
				<label>Lugar Nac.</label>
				<input id="lugarnacimiento" name="lugarnacimiento" class="easyui-textbox" >

				<label>Estado Civil</label>
				<input id="estadocivil" name="estadocivil" class="easyui-textbox">

				<label>Tipo Sangre</label>
				<select id="tiposangre" name="tiposangre" class="easyui-combobox" style="width:160px">
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				    <option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				</select>
			</div>
			<br>
			<br>
			<div class="fitem">
				<label>Direccion</label>
				<input id="direccion" name="direccion" class="easyui-textbox">

				<label>Barrio</label>
				<input id="barrio" name="barrio" class="easyui-textbox">

				<label>Municipio</label>
				<input id="municipio" name="municipio" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Telefono</label>
				<input id="telefono" name="telefono" class="easyui-textbox">

				<label>Celular</label>
				<input id="celular" name="celular" class="easyui-textbox">
			</div>
			<br>
			<div class="ftitle">Datos LICENCIA</div>
			<br>
			<div class="fitem">
				<label>Ctg. Licencia</label>
				<select id="categorialicencia" name="categorialicencia" class="easyui-combobox" style="width:160px">
				    <option value="C1">C1</option>
				    <option value="C2">C2</option>
				    <option value="C3">C3</option>
				</select>

				<label>Vigencia</label>
				<input id="vigencialicencia" name="vigencialicencia" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
			</div>
			<br>

			<div class="ftitle">Formacion Educativa</div>
			<div class="fitem">
				<label>Formacion Educativa</label>
				<input id="formacioneducativa" name="formacioneducativa" class="easyui-textbox">

				<label>Profesion</label>
				<input id="profesion" name="profesion" class="easyui-textbox">
			</div>
			<br>
			<div class="ftitle">Estado</div>

			<div class="fitem">
				<label>Estado</label>
				<select id="estadoconductor" name="estadoconductor" class="easyui-combobox" style="width:160px">
				    <option value="ACTIVO">ACTIVO</option>
				    <option value="RETIRADO">RETIRADO</option>
				</select>

				<label>Categoria</label>
				<select id="tipoconductor" name="tipoconductor" class="easyui-combobox" style="width:160px">
				    <option value="FIJO">FIJO</option>
				    <option value="RELEVO">RELEVO</option>
				</select>
			</div>

			<div class="fitem">
				<label>Salario Letra</label>
				<input name="salarioletra" class="easyui-textbox" >

				<label>Salario No</label>
				<input name="salarionum" class="easyui-numberbox" value="12345678" data-options="groupSeparator:','">
			</div>
			<!-- <div class="tdiv"> 	
				<a id="btnEditar" name="btnEditar" class="boton" onclick="incapacidades()">
	         		<img src="icons/Health.png" >
	         	</a>
	         	<span class="tooltiptext">INCAPADIDADES</span>
	        </div> -->
	        <br>
			<div class="ftitle">DOCUMENTOS</div>
			<br>
			<div class="fitem">
				<label>Pasado Judicial</label>
				<select id="pasadojudicial" name="pasadojudicial" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>

				<label>Simit</label>
				<select id="simit" name="simit" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>

				<label>Runt</label>
				<select id="runt" name="runt" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>
			</div>

			<div class="fitem">
				<label>Contrato</label>
				<select id="contrato" name="contrato" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>

				<label>Rutas</label>
				<input name="examenruta" class="easyui-numberbox" suffix="%">

				<label>Psicosensometrico</label>
				<select id="psicosensometrico" name="psicosensometrico" class="easyui-combobox" style="width:160px">
				    <option value="APROBADO">APROBADO</option>
				    <option value="NO APROBADO">NO APROBADO</option>
				</select>
			</div>

			<div class="fitem">
				<label>HV</label>
				<select id="hojavida" name="hojavida" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>

				<label>Induccion</label>
				<select id="induccion" name="induccion" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>
			</div>
			<br>
			<div class="ftitle">Examen Ocupacional</div>
			<br>
			<div class="fitem">
				<label>Ingreso</label>
				<input id="ocupacionalingreso" name="ocupacionalingreso" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

				<label>Retiro</label>
				<input id="ocupacionalretiro" name="ocupacionalretiro" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
			</div>
			<br>
			<div class="ftitle">SEGURIDAD SOCIAL</div>
			<br>
			<div class="fitem">
				<label>EPS</label>
				<select id="eps" name="eps" class="easyui-combobox" style="width:160px">
				    <option value="MEDIMAS">MEDIMAS</option>
				    <option value="NUEVA EPS">NUEVA EPS</option>
				    <option value="SOS">SOS</option>
				    <option value="SANITAS">SANITAS</option>
				    <option value="SANIDAD">SANIDAD</option>
				    <option value="SALUD TOTAL">SALUD TOTAL</option>
				    <option value="COOMEVA">COOMEVA</option>
				</select>

				<label>FP</label>
				<select id="fondopension" name="fondopension" class="easyui-combobox" style="width:160px">
				    <option value="PROTECCION">PROTECCION</option>
				    <option value="COLPENSIONES">COLPENSIONES</option>
				    <option value="PORVENIR">PORVENIR</option>
				    <option value="COLFONDOS">COLFONDOS</option>
				    <option value="FNA">FNA</option>
				</select>

				<label>Cesantias</label>
				<select id="cesantias" name="cesantias" class="easyui-combobox" style="width:160px">
				    <option value="PROTECCION">PROTECCION</option>
				    <option value="COLPENSIONES">COLPENSIONES</option>
				    <option value="PORVENIR">PORVENIR</option>
				    <option value="COLFONDOS">COLFONDOS</option>
				    <option value="FNA">FNA</option>
				</select>
			</div>
		</form>

		<form id="frmlinearegistro">
        	<table>
        		<tr>
        			<div class="ftitle">INGRESOS Y RETIROS</div>

					<div class="fitem">
						<label>Fecha ingreso</label>
						<input id="fechaingreso" name="fechaingreso" class="easyui-datebox" 
						data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

						<label>Fecha retiro</label>
						<input id="fecharetiro" name="fecharetiro" class="easyui-datebox" 
						data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">


						<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-cancel" onclick="limpiarLinea()"></a>

						<a id="btnGrabarLinea" name="btnGrabarLinea" class="easyui-linkbutton"  iconCls="icon-save" onclick="grabarLinea()"></a>

						<a id="btnEditarLinea" name="btnEditarLinea" class="easyui-linkbutton"  iconCls="icon-edit" onclick="cargarLinea()"></a>

						<a id="btnEditarGuardar" name="btnEditarGuardar" class="easyui-linkbutton"  iconCls="icon-save" onclick="guardarEditada()"></a>

						<a id="btnEliminarLinea" name="btnEliminarLinea" class="easyui-linkbutton"  iconCls="icon-remove" onclick="borrarIngresoRetiro()"></a>

						<td colspan=4>
							<div style="display:none">
								<input id="rid" name="rid" class="easyui-textbox"
									   style="width:40px"
									   data-options="">

							</div>
						</td>

					</div>					
				</tr>
        	</table>

        </form>
        <table id="dgdetalle" class="easyui-datagrid" style="width:100%;height:300px"
		url="json/get_ingresosretiros.php" singleSelect="true" headerCls="" pagination="false" showFooter="true"
			rownumbers="true">

			<thead>
				<tr>
					<th field="cedulaconductor", width="150" >Cedula</th>
					<th field="fechaingreso", width="150" >ingreso</th>
					<th field="fecharetiro", width="150" >retiro</th>
				</tr>
			</thead>
		</table>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveColaborador()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgColaborador').dialog('close')" style="width:90px">Cancelar</a>
	</div>

 	<!-- DIALOGO DE INCAPACIDADES -->
	<!-- <div id="dlgincapacidades" class="easyui-dialog" data-options="modal:true" style="width:880px;height:500px;padding:10px 20px" closed="true">

		<table id="dgdetalle" class="easyui-datagrid" style="width:100%;height:300px"
			url="json/detalle_getdata.php" singleSelect="true" headerCls="" pagination="false" showFooter="true"
			rownumbers="true">

			<thead>
				<tr>
					<th field="cedula", width="150" >Cedula</th>
					<th field="pasajero", width="150" >Pasajero</th>
				</tr>
			</thead>
		</table>
		
		
	</div> -->
	
	</div>

	<script type="text/javascript">

		var url;
		function newColaborador(){
			$('#dlgColaborador').dialog('open').dialog('setTitle','Nuevo COLABORADOR');
			$('#fm').form('clear');
			url = 'json/colaborador_save.php';
		}

		function editColaborador(){
			var row = $('#dgcolaboradores').datagrid('getSelected');
			if (row){
				$('#dlgColaborador').dialog('open').dialog('setTitle','Editar COLABORADOR');
				$('#fm').form('load',row);
				mostrarDetalle();
				url = 'json/update_colaborador.php?id='+row.id;
			}else {
					$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	

				}
		}

		function saveColaborador(){
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
						$('#dlgColaborador').dialog('close');		// close the dialog
						$('#dgcolaboradores').datagrid('reload');	// reload the user data
					}
				}
			});
		}

		function destroyColaborador(){
			var row = $('#dgcolaboradores').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el colaborador: ' + row.conductor,function(r){
					if (r){
						$.post('json/destroy_colaborador.php',{id:row.id},function(result){
							if (result.success){
								$('#dgcolaboradores').datagrid('reload');	// reload the user data
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

		function incapacidades(){
			$('#dlgincapacidades').dialog('open').dialog('setTitle','incapacidades');
			$('#fm').form('clear');
			url = 'json/conductor_save.php';
		}

		function grabarLinea(){

			var xcedulaconductor = $("#cedulaconductor").textbox('getValue');
			var xfechaingreso = $("#fechaingreso").datebox('getValue');
			var xfecharetiro = $("#fecharetiro").datebox('getValue');
			
			$.post('json/ingresosretiros.php', 
				{cedulaconductor:xcedulaconductor, fechaingreso:xfechaingreso, fecharetiro:xfecharetiro },
				function(result){
				if (result.success){
					//$.messager.alert('Mensaje', 'registro grabado exitosamente!!!');
					// $("#destino").textbox('setValue',xdestino);
					mostrarDetalle();
					limpiarLinea();

				} else {
					$.messager.alert('Mensaje', 'problemas!!! - grabarLinea');

				}
			},'json'); 
		}

		function guardarEditada(){
			// var linea = $("#dgdetalle").datagrid('getSelected');

			var xcedulaconductor = $("#cedulaconductor").textbox('getValue');
			// var xfechaingreso = $("#fechaingreso").datebox('getValue');
			var xfecharetiro = $("#fecharetiro").datebox('getValue');
			var xid = $("#rid").textbox('getValue');

			$.post('json/ingresoretiro_update.php', 
				{cedulaconductor:xcedulaconductor, fecharetiro:xfecharetiro, id:xid },
				function(result){
				if (result.success){
					$.messager.alert('Mensaje', 'registro editado exitosamente!!!');
					// $("#destino").textbox('setValue',xdestino);
					mostrarDetalle();
					limpiarLinea();

				} else {
					$.messager.alert('Mensaje', 'problemas!!! - grabarLinea');

				}
			},'json'); 
		}
		

		function limpiarLinea(){
			$("#frmlinearegistro").form('clear');

		}

		function mostrarDetalle(){
			var xcedulaconductor = $("#cedulaconductor").val();			
			
			$("#dgdetalle").datagrid('load',{
				cedulaconductor:xcedulaconductor				
			})
		}

		function cargarLinea(){
			var linea = $("#dgdetalle").datagrid('getSelected');

			$("#fechaingreso").datebox('setText',linea['fechaingreso']);
			$("#fecharetiro").datebox('setText',linea['fecharetiro']);

			$("#rid").textbox('setValue',linea['id']);
		}

		function borrarIngresoRetiro(){			
			var xlinea = $("#dgdetalle").datagrid('getSelected');
				$.messager.confirm('Confirm','Esta seguro de borrar LINEA??? ' ,function(r){
					if (r){									
						var xid = xlinea['id'];

						$.post('json/ingresoretiro_destroy.php', 
							{id:xid},
							function(result){
							if (result.success){
								mostrarDetalle();
								limpiarLinea();

							} else {
								$.messager.alert('Mensaje', 'problemas!!! - borrarLineaDetalle');

							}
						},'json'); 
						
					}	
				});	
			
		}

		function descargarPersonal(){
			// location.assign("activosExcel.php?colegio="+xcolegio);
			location.assign("extractosExcel.php");			

		}
	</script>

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
			margin-bottom:5px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:8px;
		}
		.fitem label{
			display:inline-block;
			text-align: right;
			/*font-weight: bold;*/
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>

</body>
</html>