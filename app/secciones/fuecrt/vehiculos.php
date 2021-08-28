<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administracion-Vehiculos</title>
	<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/color.css">
	<link rel="stylesheet" type="text/css" href="../../jeasyui/demo/demo.css">
	
	<script type="text/javascript" src="../../jeasyui/jquery.min.js"></script>
	<script type="text/javascript" src="../../jeasyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../../jeasyui/locale/easyui-lang-es.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
	<script type="text/javascript" src="../js/datagrid-filter.js"></script>
	<script type="text/javascript" src="../js/accounting.js"></script>

	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilotabla.css">
	<link rel="stylesheet" type="text/css" href="css/tooltips.css">
	
	<script type="text/javascript">
		$(function(){
			$("#dg").datagrid('enableFilter');			
		})
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

	</style>

</head>
<body>
	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
	    <!-- impresion de planilla de rutas /////////////////////////////////////////////////////// -->
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="newVehiculo()">
	         		<img src="icons/Car.png" >
	         	</a>
	         	<span class="tooltiptext">Nuevo VEHICULO</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="editVehiculo()">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">Editar VEHICULO</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="destroyVehiculo()">
	         		<img src="icons/Trash.png" >
	         	</a>
	         	<span class="tooltiptext">Eliminar VEHICULO</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnDocumento" name="btnDocumento" class="boton" onclick="newDocumentos()">
	         		<img src="icons/Document.png" >
	         	</a>
	         	<span class="tooltiptext">documentos VEHICULO</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="newConvenio()">
	         		<img src="icons/Star.png" >
	         	</a>
	         	<span class="tooltiptext">Convenios EMPRESARIALES</span>
	        </div>
	    </div>
	</div>

	<table id="dg" title=" LISTA VEHÍCULOS " class="easyui-datagrid" style="width:100%;height:500px;margin-top:50px;"
			url="json/vehiculos_get.php"
			toolbar="#toolbar"
			headerCls="hc"
			rownumbers="true" fitColumns="false" singleSelect="true">
		<thead>
			<tr>
				<th field="placa" width="80">Placa</th>
				<th field="interno" width="80">Interno</th>
				<th field="marca" width="120">Marca</th>
				<th field="modelo" width="80">Modelo</th>
				<th field="clase" width="80">Clase</th>				
				<th field="capacidad" width="80">Capacidad</th>				
				<th field="propietario" width="320">Propietario</th>
				<th field="empresaafiliadora" width="472">Afiliadora</th>
			</tr>
		</thead>
	</table>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:750px;height:500px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>
		<div class="ftitle">INFORMACIÓN GENERAL</div>
			<div class="fitem">
				<label>Interno:</label>
				<input id="interno" name="interno" class="easyui-textbox">
		
				<label>Placa:</label>
				<input id="placa" name="placa" class="easyui-textbox">

			<div class="fitem">
				<label>Vinculación:</label>
				<select id="tipovinculacion" name="tipovinculacion" class="easyui-combobox" style="width:204px">
				    <option value="FLOTA PROPIA">FLOTA PROPIA</option>
				    <option value="CONVENIO EMPRESARIAL">CONVENIO EMPRESARIAL</option>
				    <option value="CONTRATO DE ARRENDAMIENTO">CONTRATO DE ARRENDAMIENTO</option>
				    <option value="CONTRATO DE ADMINISTRACION INTEGRAL">CONTRATO DE ADMINISTRACION INTEGRAL</option>
				    <option value="CONTRATO DE ADMINISTRACION AFILIADO">CONTRATO DE ADMINISTRACION AFILIADO</option>
				</select>
			
				<label>Afiliadora:</label>
				<input name="empresaafiliadora" class="easyui-combobox" 
					   url="json/comboafiliadoras.php" style="width:205px"
					   data-options="disabled:false,editable:true,valueField:'empresa',textField:'empresa'">
			</div>
			
			</div> 
			<br>
			<div class="ftitle">LICENCIA DE TRÁNSITO</div>
				<div class="fitem">
					<label>No Licencia:</label>
					<input id="licencia" name="licencia" class="easyui-textbox">
			
					<label>Capacidad:</label>
					<input id="capacidad" name="capacidad" class="easyui-numberbox">

				<div class="fitem">
					<label>Marca:</label>
					<input name="marca" class="easyui-textbox">
				
					<label>No Motor:</label>
					<input name="motor" class="easyui-textbox">
				</div>
				
				<div class="fitem">
					<label>Modelo:</label>
					<input id="modelo" name="modelo" class="easyui-textbox">
				
					<label>Cilindraje:</label>
					<input id="cilindraje" name="cilindraje" class="easyui-numberbox">
				</div>

				<div class="fitem">
					<label>Color:</label>
					<input name="color" class="easyui-textbox">
				
					<label>Clase:</label>
					<select id="clase" name="clase" class="easyui-combobox" style="width:204px">
						<option></option>
					    <option value="BUS">BUS</option>
					    <option value="BUSETA">BUSETA</option>
					    <option value="MICROBUS">MICROBUS</option>
					    <option value="DUSTER">DUSTER</option>
					</select>
				</div>

				<div class="fitem">
					<label>Carrocería:</label>
					<select id="carroceria" name="carroceria" class="easyui-combobox" style="width:204px">
						<option></option>
					    <option value="ABIERTO (ESCALERA)">ABIERTO (ESCALERA)</option>
					    <option value="ARTICULADO">ARTICULADO</option>
					    <option value="BIARTICULADO">BIARTICULADO</option>
					    <option value="CERRADA">CERRADA</option>
					    <option value="AMBULANCIA">AMBULANCIA</option>
					    <option value="VAN">VAN</option>
					</select>
				
					<label>Combustible:</label>
					<select id="combustible" name="combustible" class="easyui-combobox" style="width:204px">
						<option></option>
					    <option value="GASOLINA">GASOLINA</option>
					    <option value="GNV">GNV</option>
					    <option value="DIESEL">DIESEL</option>
					    <option value="GAS GASOL">GAS GASOL</option>
					    <option value="ELECTRICO">ELECTRICO</option>
					    <option value="HIDROGENO">HIDROGENO</option>
					    <option value="ETANOL">ETANOL</option>
					    <option value="BIODIESEL">BIODIESEL</option>
					    <option value="GLP">GLP</option>
					    <option value="GASO ELEC">GASO ELEC</option>
					    <option value="DIES ELEC">DIES ELEC</option>
					</select>
				</div>

				<div class="fitem">
					<label>No Chasis:</label>
					<input name="chasis" class="easyui-textbox">

					<label>Tarjeta Operación:</label>
					<input name="tarjetaoperacion" class="easyui-textbox">
				</div>

				<div class="fitem">
					<label>Propietario:</label>
					<input name="propietario" class="easyui-textbox">

					<a id="btnDocumentos" name="btnDocumentos" class="boton" onclick="contratoPDF()" style="float: right;margin-top: 25px">
		         		<img src="icons/Document2.png" >
		         	</a>
		         	<span class="tooltiptext">Nuevo VEHICULO</span>
				</div>
				<br>

				<div class="ftitle">DOCUMENTOS</div>
				<div class="ftitle2">TARJETA DE OPERACION</div>
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciotarjetaoperacion" name="iniciotarjetaoperacion" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="fintarjetaoperacion" name="fintarjetaoperacion" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
				<br>
				<div class="ftitle2">SOAT</div>
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciosoat" name="iniciosoat" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finsoat" name="finsoat" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
				<br>
				<div class="ftitle2">TÉCNICO MECÁNICA</div>
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciotecmecanica" name="iniciotecmecanica" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="fintecmecanica" name="fintecmecanica" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
				<br>
				<div class="ftitle2">PÓLIZA CONTRACTUAL</div>
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciopolizacontrac" name="iniciopolizacontrac" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finpolizacontrac" name="finpolizacontrac" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
				<br>
				<div class="ftitle2">PÓLIZA EXTRACONTRACTUAL</div>
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciopolizaextra" name="iniciopolizaextra" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finpolizaextra" name="finpolizaextra" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
				<br>
				<div class="ftitle2">REVISIÓN PREVENTIVA</div>
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciopreventiva" name="iniciopreventiva" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finpreventiva" name="finpreventiva" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>

				<div class="ftitle2">MANTENIMIENTOS</div>
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciomantenimiento" name="iniciomantenimiento" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finmantenimiento" name="finmantenimiento" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>

				<!-- <br> -->
				<!-- <div class="ftitle">INFORMACIÓN CONDUCTOR</div>
					<div class="fitem">
						<label>Conductor:</label>
						<input name="conductor" class="easyui-textbox">

						<label>N° Cédula:</label>
						<input name="cedulaconductor" class="easyui-textbox">
					</div>

					<div class="fitem" hidden="true">
						<label>Desde:</label>
						<input name="desde" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Hasta:</label>
						<input name="hasta" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>

					<div class="fitem" hidden="true">
						<label>Salario:</label>
						<input name="salarioletra" class="easyui-textbox">

						<label>N° Salario:</label>
						<input name="salarionum" class="easyui-numberbox" value="12345678" data-options="groupSeparator:','">
					</div>

					<div class="fitem">
						<label>Vigencia Licencia:</label>
						<input name="vigencialicencia" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Categoría</label>
							<select id="categorialicencia" name="categorialicencia" class="easyui-combobox" style="width:204px">
							<option></option>
						    <option value="C1">C1</option>
						    <option value="C2">C2</option>
						    <option value="C3">C3</option>
						</select>
					</div> -->
					<br>

					<div class="ftitle">ESTADO</div>

					<div class="fitem">
						<label>Estado:</label>
						<select id="estado" name="estado" class="easyui-combobox" style="width:204px">
							<option></option>
						    <option value="ACTIVO">ACTIVO</option>
						    <option value="INACTIVO">INACTIVO</option>
						    <option value="DESVINCULADO">DESVINCULADO</option>
						</select>
					</div>

					<div class="fitem">
						<label>Observación:</label>
						<input name="observacion" class="easyui-textbox" multiline="true" style="width: 510px; height: 66px">
					</div>
		         	<!-- <span class="tooltiptext">Descargar CONTRATO (pdf) </span> -->
				</div> 
		</form>
	</div>
	<div id="dlg-buttons">

		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveVehiculo()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<div id="dlgConvenios" class="easyui-dialog" data-options="modal:true" style="width:800px;height:520px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons-convenios">
		<form id="fmConvenios" method="post" enctype="multipart/form-data">
		<!-- <div class="ftitle">INFORMACIÓN VEHICULO</div> -->
			<div class="fitem">
				<label>Interno:</label>
				<input id="interno" name="interno" class="easyui-textbox"data-options="editable:false" style="width: 100px">
		
				<label>Placa:</label>
				<input id="placa" name="placa" class="easyui-textbox" data-options="editable:false" style="width: 100px">

				<label>Clase:</label>
				<input id="clase" name="clase" class="easyui-textbox" data-options="editable:false" style="width: 100px">
				
			</div>
			
		<div class="ftitle">INFORMACIÓN CONVENIO</div>
			<div class="fitem">
				<label>Convenio:</label>
				<input id="enconvenio" name="enconvenio" class="easyui-textbox" style="width: 510px">
			</div>
			<div class="fitem">
				<label>Inicio:</label>
				<input id="inicioconvenio" name="inicioconvenio" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
			
				<label>Fin:</label>
				<input id="finconvenio" name="finconvenio" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
			</div>

			<div class="fitem">
				<label>Origen:</label>
				<input id="origenconvenio" name="origenconvenio" class="easyui-textbox">
			
				<label>Destino:</label>
				<input id="destinoconvenio" name="destinoconvenio" class="easyui-textbox">

				<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-cancel" onclick="limpiarLineaconv()"></a>

				<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-ok" onclick="saveConvenio()"></a>
			</div>
		</form><br><br>

		<table id="dgdetalleconv" class="easyui-datagrid" style="width:100%;height:190px"
			url="json/conveniosemp_get.php" singleSelect="true" headerCls="" pagination="false" showFooter="true"
			rownumbers="true">

			<thead>
				<tr>
					<th field="placa">Placa</th>
					<th field="enconvenio">Convenio</th>
					<th field="inicioconvenio">Inicio</th>
					<th field="finconvenio">Fin</th>
					<th field="origenconvenio">Origen</th>
					<th field="destinoconvenio">Destino</th>

				</tr>
			</thead>
		</table>
	</div>
	<div id="dlg-buttons-convenios">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgConvenios').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<div id="dlgDocumentos" class="easyui-dialog" data-options="modal:true" style="width:800px;height:490px;padding:10px 20px" closed="true" buttons="#dlg-buttons-documentos">
		<form id="fmDocumentos" method="post" enctype="multipart/form-data">

			<div class="fitem">
				<label >Interno:</label>
				<input id="interno" name="interno" class="easyui-textbox" data-options="editable:false">
			</div>

			<div class="fitem">
				<label >Placa:</label>
				<input id="placa" name="placa" class="easyui-textbox" data-options="editable:false">
			</div>

			<div class="fitem">
				<label >Imagen:</label>
				<input id="documentoimg" name="documentoimg" class="easyui-filebox">
			</div>

			<div class="fitem">
				<label >Nombre:</label>
				<input id="nombredocumento" name="nombredocumento" class="easyui-textbox" style="width: 290px">

				<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-cancel" onclick="limpiarLinea()"></a>

				<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-ok" onclick="saveDocumentos()"></a>
			</div>
			
		</form>
		<a id="btnVerdoc" name="btnVerdoc" class="easyui-linkbutton"  iconCls="icon-no" onclick="destroyDoc()" style="float: right;"></a>
		<a id="btnVerdoc" name="btnVerdoc" class="easyui-linkbutton"  iconCls="icon-search" onclick="viewdo()" style="float: right;"></a>

		<table id="dgdetalle" class="easyui-datagrid" style="width:100%;height:300px"
			url="json/vehiculosimg_get.php" singleSelect="true" headerCls="" pagination="false" showFooter="true"
			rownumbers="true">

			<thead>
				<tr>
					<!-- <th field="id", width="150">id</th> -->
					<!-- <th field="interno", width="150">interno</th> -->
					<th field="placa", width="150">placa</th>
					<th field="nombredocumento", width="150">nombredocumento</th>
					<!-- <th field="documentoimg", width="150">documentoimg</th> -->
					<!-- <th field="tipodocumento", width="150">tipodocumento</th> -->

				</tr>
			</thead>
		</table>
	</div>
	<div id="dlg-buttons-documentos">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgDocumentos').dialog('close')" style="width:90px">Cerrar</a>
	</div>

	<script type="text/javascript">
		var url;
		function newVehiculo(){
			$('#dlg').dialog('open').dialog('setTitle','Nuevo VEHÍCULO');
			$('#fm').form('clear');

			// VALORES POR DEFECTO
			setVar('licencia',0,'0');
			setVar('capacidad',0,'0');
			setVar('modelo',0,'0');
			setVar('cilindraje',0,'0');
			setVar('iniciotarjetaoperacion',0,'0000-00-00');
			setVar('fintarjetaoperacion',0,'0000-00-00');
			setVar('iniciosoat',0,'0000-00-00');
			setVar('finsoat',0,'0000-00-00');
			setVar('iniciotecmecanica',0,'0000-00-00');
			setVar('fintecmecanica',0,'0000-00-00');
			setVar('iniciopolizacontrac',0,'0000-00-00');
			setVar('finpolizacontrac',0,'0000-00-00');
			setVar('iniciopolizaextra',0,'0000-00-00');
			setVar('finpolizaextra',0,'0000-00-00');
			setVar('iniciopreventiva',0,'0000-00-00');
			setVar('finpreventiva',0,'0000-00-00');
			setVar('iniciomantenimiento',0,'0000-00-00');
			setVar('finmantenimiento',0,'0000-00-00');

			url = 'json/vehiculo_save.php';
		}
		function editVehiculo(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar VEHÍCULO');
				$('#fm').form('load',row);
				url = 'json/vehiculo_update.php?id='+row.id;
			}
		}

		function saveVehiculo(){
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
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function destroyVehiculo(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el vehiculo: ' + row.placa,function(r){
					if (r){
						$.post('json/vehiculo_destroy.php',{id:row.id},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
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

		function printVehiculos(){
			// location.assign("activosExcel.php?colegio="+xcolegio);
			location.assign("vehiculosExcel.php");			

		}
		function contratoPDF(){
 			var xplaca = $("#placa").textbox('getText');

 			if (xplaca == 'ESS821'){ //813
 				window.open("https://drive.google.com/embeddedfolderview?id=1JN3S2CZYOA3OVmiE8HQVr8deDAnlLB1d#grid");
 			}
 			else if(xplaca == 'SJS338'){ //849
 				window.open("https://drive.google.com/embeddedfolderview?id=1CLDx1dl_v51fflcCpV305HjWSCDDIyVw#grid");
 			}
 			else if(xplaca == 'SJS550'){ //840
 				window.open("https://drive.google.com/embeddedfolderview?id=1NZg2nOYQIn7gPkFRrNMy8R4BgXXD0dDL#grid");
 			}
 			else if(xplaca == 'SJT526'){ //847
 				window.open("https://drive.google.com/embeddedfolderview?id=1p-kd_AH7hbk0lV6YYix82QEd0Q278jQM#grid");
 			}
 			else if(xplaca == 'SJT824'){ //820
 				window.open("https://drive.google.com/embeddedfolderview?id=1uhpM0Rvm7jf9lvRRhPdI88mhX8EHJJt0#grid");
 			}
 			else if(xplaca == 'SLE912'){ //899
 				window.open("https://drive.google.com/embeddedfolderview?id=1CfDFqVW9l5zg5KQ7_3avp0CYqibwvFeG#grid");
 			}
 			else if(xplaca == 'SLG375'){ //850
 				window.open("https://drive.google.com/embeddedfolderview?id=1jRqES70Y-_QaHNPJnHAwgpYHpPCLPnd-#grid");
 			}
 			else if(xplaca == 'SMI881'){ //848
 				window.open("https://drive.google.com/embeddedfolderview?id=1UPsG2dJTuLsAP8uAE06leNISxCIgB5Gw#grid");
 			}
 			else if(xplaca == 'SJS433'){ //750
 				window.open("https://drive.google.com/embeddedfolderview?id=1OIFltA--ZxmHnOvYniQ1GkLmHyb8e1Kn#grid");
 			}
 			else if(xplaca == 'SOQ143'){ //730
 				window.open("https://drive.google.com/embeddedfolderview?id=1FG6h_z55bJ_2jC7x6jTE9jhUJiTR13eM#grid");
 			}
 			else if(xplaca == 'SVF179'){ //859
 				window.open("https://drive.google.com/embeddedfolderview?id=1vc81SAtgnqX3L8bkfY7SuBBE0_0Y06gO#grid");
 			}
 			else if(xplaca == 'SWO292'){ //827
 				window.open("https://drive.google.com/embeddedfolderview?id=1Ww_8437Za1TPJ3L20jjO439rseXAExen#grid");
 			}
 			else if(xplaca == 'SXE068'){ //828
 				window.open("https://drive.google.com/embeddedfolderview?id=1hAUbsZx5CqXx7EDgj__0qxW59Fcm8CtR#grid");
 			}
 			else if(xplaca == 'SXF382'){ //700
 				window.open("https://drive.google.com/embeddedfolderview?id=1MIbZ10Rdmgqr-Zm5k0IEoiCSDM55uDC3#grid");
 			}
 			else if(xplaca == 'SXF956'){ //710
 				window.open("https://drive.google.com/embeddedfolderview?id=10NNdq_7zaZYcvzK2DR1HrNnL790Pk4hd#grid");
 			}
 			else if(xplaca == 'TGK658'){ //900
 				window.open("https://drive.google.com/embeddedfolderview?id=11E7CSQzpe3k0hmThz1DgR8zJMrkO8dkr#grid");
 			}
 			else if(xplaca == 'TJQ369'){ //823
 				window.open("https://drive.google.com/embeddedfolderview?id=17z6BdkgZNghqZMHhDxvYZFhD7cUoHpPw#grid");
 			}
 			else if(xplaca == 'TJQ771'){ //810
 				window.open("https://drive.google.com/embeddedfolderview?id=1yZHQCVJk01Io2hQ9FCPgB4mYSt2O9JUE#grid");
 			}
 			else if(xplaca == 'TJR137'){ //930
 				window.open("https://drive.google.com/embeddedfolderview?id=1v7Th5eqSLVhmXoi0cYvivaa1hlKC4CvL#grid");
 			}
 			else if(xplaca == 'TMY088'){ //882
 				window.open("https://drive.google.com/embeddedfolderview?id=12i6xFp8RKzf1-Rlcj_rjTcoxdlIrbyz0#grid");
 			}
 			else if(xplaca == 'TNG031'){ //402
 				window.open("https://drive.google.com/embeddedfolderview?id=1N61xg-WAId1g1-hwjgscjH8Zsl8iisW9#grid");
 			}
 			else if(xplaca == 'TPW787'){ //760
 				window.open("https://drive.google.com/embeddedfolderview?id=1KO3WSkqseoAHWHtyLx7gHIvONOTsEpno#grid");
 			}
 			else if(xplaca == 'TVA722'){ //851
 				window.open("https://drive.google.com/embeddedfolderview?id=14FyC9ToNAbKUj6GX56fpxZ1y2wZrNtM9#grid");
 			}
 			else if(xplaca == 'UZC738'){ //720
 				window.open("https://drive.google.com/embeddedfolderview?id=1o3yMYhHHsmlUyRIH8w8aydF6txvu1oV8#grid");
 			}
 			else if(xplaca == 'VLG952'){ //829
 				window.open("https://drive.google.com/embeddedfolderview?id=1t5ByEp9qK1saJchVwETUq5mjaot7Ydc9#grid");
 			}
 			else if(xplaca == 'VOV733'){ //862
 				window.open("https://drive.google.com/embeddedfolderview?id=1Om0GIPXe7YfGRMEn2DEdEhssd8JSyKUp#grid");
 			}
 			else if(xplaca == 'WDQ213'){ //920
 				window.open("https://drive.google.com/embeddedfolderview?id=1IGgpvmqltQ6K7eSutsjVxTBA5zpCxgtU#grid");
 			}
 			else if(xplaca == 'WEP089'){ //800
 				window.open("https://drive.google.com/embeddedfolderview?id=1J0Cs6bpbUKtYMlICZ0tteMwednkflfT0#grid");
 			}
 			else if(xplaca == 'WFH621'){ //815
 				window.open("https://drive.google.com/embeddedfolderview?id=1Ek1uvwK4tdvGaHGryaRTRPHT07bXVRhz#grid");
 			}
 			else if(xplaca == 'WHK555'){ //894
 				window.open("https://drive.google.com/embeddedfolderview?id=15DDolCHuEgQnZuqoAy2j54N1S1j43s1k#grid");
 			}
 			else if(xplaca == 'WMB439'){ //740
 				window.open("https://drive.google.com/embeddedfolderview?id=1IS_87v3AMl0ts2aHCsVQwlVKRPqWC7Ot#grid");
 			}
 			else if(xplaca == 'WMB478'){ //900
 				window.open("https://drive.google.com/embeddedfolderview?id=1S3VV4Z7qWAd1e9fxCX4o4gAkRT6kbFHv#grid");
 			}
 		}

 		// DOCUMENTOS
		var url;
		function newDocumentos(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlgDocumentos').dialog('open').dialog('setTitle','Nuevos Documentos');
				$('#fmDocumentos').form('load',row);
				url = 'json/docvehiculos_save.php';

				// alert(row.placa);

				var xplaca = (row.placa);
				// alert(xplaca);			
			
				$("#dgdetalle").datagrid('load',{
					placa:xplaca				
				})
			}
		}

		function saveDocumentos(){
			$('#fmDocumentos').form('submit',{
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
						// mostrarDetalle();
						// $('#dlgDocumentos').dialog('close');		// close the dialog
						$('#dgdetalle').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function viewdo(){
			var row = $('#dgdetalle').datagrid('getSelected');

			var xid = row['id'];
			// alert(xid);
		
			var params  = 'width='+screen.width;
			params += ', height='+screen.height;
			params += ', top=0, left=0'
			params += ', fullscreen=yes';

			

			window.open("json/docvehiculo_view.php?id="+xid, params);
		
		}

		function limpiarLinea(){
			setVar('documentoimg',0,'');
			setVar('nombredocumento',0,'');

		}

		function destroyDoc(){
			var row = $('#dgdetalle').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el documento: ' + row.nombredocumento,function(r){
					if (r){
						$.post('json/documento_destroy.php',{id:row.id},function(result){
							if (result.success){
								$('#dgdetalle').datagrid('reload');	// reload the user data
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

	<script type="text/javascript">
		var url;
		function newConvenio(){
			var row = $('#dg').datagrid('getSelected');
			if (row.tipovinculacion != 'CONVENIO EMPRESARIAL'){
				$('#dlgConvenios').dialog('open').dialog('setTitle','Nuevo CONVENIO');
				$('#fmConvenios').form('load',row);
				setVar('inicioconvenio',2,hoy());
				setVar('finconvenio',2,hoy());
				url = 'json/convenioemp_save.php?id='+row.id;
				// url = 'json/duplicados_delete.php';
				var xplaca = (row.placa);
				alert(xplaca);
				$("#dgdetalleconv").datagrid('load',{
					placa:xplaca				
				})
			}
			else{
				$.messager.confirm('Alerta','Este vehículo no permite convenio empresarial');
			}
		}

		function saveConvenio(){
			$('#fmConvenios').form('submit',{
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
						// $('#dlgConvenios').dialog('close');		// close the dialog
						// duplicados();
						$('#dgdetalleconv').datagrid('reload');
						setVar('enconvenio',0,'');
						setVar('origenconvenio',0,'');
						setVar('destinoconvenio',0,'');
						setVar('inicioconvenio',2,hoy());
						setVar('finconvenio',2,hoy());
					}
				}
			});
		}

		function limpiarLineaconv(){
			setVar('enconvenio',0,'');
			setVar('inicioconvenio',2,'');
			setVar('finconvenio',2,'');
			setVar('origenconvenio',0,'');
			setVar('destinoconvenio',0,'');

		}
	</script>

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
        function hoy(){
			var xhoy = new Date();
			var y = xhoy.getFullYear();
			var m = xhoy.getMonth()+1;
			var d = xhoy.getDate();
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
		}
	</script>

	<style type="text/css">
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
		.ftitle2{
			font-size:14px;
			font-weight:inherit;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
			margin-top: 14px;
		}
		.fitem label{
			font-size: 14px;
			text-align: right;
			display:inline-block;
			width:95px;
		}
		.fitem input{
			width:200px;

		}
	</style>
</body>
</html>