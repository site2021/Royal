<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administracion-Certificados</title>
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

	<!-- filter Lib - /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$(function(){
			$("#dg").datagrid('enableFilter',[{
            	field:'capacidad',
                type:'numberbox',
                op:['equal','notequal','less','greater']
            },{
            	field:'modelo',
                type:'textbox',
                op:['equal','notequal','less','greater']
            },{
            	field:'clase',
                type:'textbox',
                op:['equal','notequal','less','greater']
            }]);			
		})
	</script>

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
		<!-- MUESTRA DE IMAGEN -->
		<!-- <img src='json/vista.php?id=65' alt='Img blob desde MySQL' />   -->
	</table>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:750px;height:600px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" enctype="multipart/form-data">
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
					    <option value="MICROBÚS">MICROBUS</option>
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

		         	<a id="btnDocumentos" name="btnDocumentos" class="boton" onclick="vista()" style="float: right;margin-top: 25px">
		         		<img src="icons/Picture.png" >
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

						<label>Imagen:</label>
						<input id="imagenes" name="imagenes" class="easyui-filebox">
					</div>

					<div class="fitem">
						<label>Observación:</label>
						<input name="observacion" class="easyui-textbox" multiline="true" style="width: 510px; height: 66px">
					</div>
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
					<th field="placa", width="150">placa</th>
					<th field="nombredocumento", width="150">nombredocumento</th>
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
		function vista(){
			// var params  = 'width='+screen.width;
			// params += ', height='+screen.height;
			// params += ', top=0, left=0'
			// params += ', fullscreen=yes';


			// window.open("json/vista.php?id=65", params);
			$enlace = ("json/vista.php?id=66");
			$img = "./ruta/imagen.jpg";
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($img));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($img));
			ob_clean();
			flush();
			readfile($img);

		}

		function contratoPDF(){
 			var xplaca = $("#placa").textbox('getText');

 			if (xplaca == 'QWE123'){ //005
 				window.open("https://drive.google.com/embeddedfolderview?id=1CjYSFRGbl9hoNnjIJpOHv7yRjuq2O7n8#grid");
 			}
 			else if(xplaca == 'SMH200'){ //008
 				window.open("https://drive.google.com/embeddedfolderview?id=1NEiZK4QIyZxXZdvAar6lfVWerFkZq9qO#grid");
 			}
 			else if(xplaca == 'WLB880'){ //008
 				window.open("https://drive.google.com/embeddedfolderview?id=1KpX60jOv3ChzBTNU-AYLWAhtZvr5g-Eg#grid");
 			}
 			else if(xplaca == 'SJS089'){ //017
 				window.open("https://drive.google.com/embeddedfolderview?id=1WXzSmXvh_OHi13TtAAcHrRWzyOUMSIpQ#grid");
 			}
 			else if(xplaca == 'TJA734'){ //050
 				window.open("https://drive.google.com/embeddedfolderview?id=1FJY3Qm3ZE9Zh3tdUi5LXwXNPggMCyqCN#grid");
 			}
 			else if(xplaca == 'SJS035'){ //067
 				window.open("https://drive.google.com/embeddedfolderview?id=1jikRcZR8gTzGkaaFExtmx1I_LtPo_a3N#grid");
 			}
 			else if(xplaca == 'UYZ019'){ //0010
 				window.open("https://drive.google.com/embeddedfolderview?id=1TatT3mB6AgBLfRg_akHUhoQ42t8S-WFa#grid");
 			}
 			else if(xplaca == 'VCU842'){ //1006
 				window.open("https://drive.google.com/embeddedfolderview?id=1GmP28pt-2bihrWS9YRkuyHOJ2rNYlgpw#grid");
 			}
 			else if(xplaca == 'SXE853'){ //101
 				window.open("https://drive.google.com/embeddedfolderview?id=1F_u1aq_mUDrdUnVozkkpHxMh2vSf_Qsi#grid");
 			}
 			else if(xplaca == 'TEK510'){ //1010
 				window.open("https://drive.google.com/embeddedfolderview?id=1MkicFuc5enXkBN1tquzkGWFCPXY4V8rl#grid");
 			}
 			else if(xplaca == 'SXF277'){ //1013
 				window.open("https://drive.google.com/embeddedfolderview?id=1gPnrZnVJwYd39c6GzxjuIrUNUEMhWSor#grid");
 			}
 			else if(xplaca == 'SXE890'){ //1018
 				window.open("https://drive.google.com/embeddedfolderview?id=1PDxAwvbsYBL54VNLV6FydU1NaAXdz4zz#grid");
 			}
 			else if(xplaca == 'TMP953'){ //1026
 				window.open("https://drive.google.com/embeddedfolderview?id=1dquDWKR8BfQFvztdmFOYd2yQ5077zno-#grid");
 			}
 			else if(xplaca == 'STQ584'){ //1026
 				window.open("https://drive.google.com/embeddedfolderview?id=1OcT1kCepT2dyNuIpPBb31VkHaHkf-xJv#grid");
 			}
 			else if(xplaca == 'STH080'){ //104
 				window.open("https://drive.google.com/embeddedfolderview?id=1X5yRC1aPJX746414pRHsL1oVV24JzO6a#grid");
 			}
 			else if(xplaca == 'XMC648'){ //1066
 				window.open("https://drive.google.com/embeddedfolderview?id=1m9b7t-RCflFDvC4OLp1F2QF6_dYjbMQ9#grid");
 			}
 			else if(xplaca == 'TJQ266'){ //109
 				window.open("https://drive.google.com/embeddedfolderview?id=1aO21hBtUUVidfXiQueZGEhcaoBFXghlf#grid");
 			}
 			else if(xplaca == 'UFU658'){ //1099
 				window.open("https://drive.google.com/embeddedfolderview?id=1_7QmAsqJ0jOJjoyQQPY16HY70E9SJr7R#grid");
 			}
 			else if(xplaca == 'WHM382'){ //011
 				window.open("https://drive.google.com/embeddedfolderview?id=1IfkOi6oplKCcOJF2G6BcviNlDYnxQJlM#grid");
 			}
 			else if(xplaca == 'TUP029'){ //113
 				window.open("https://drive.google.com/embeddedfolderview?id=13LMBZRKuzvOj2zF78v1Lii3yuCgumgkM#grid");
 			}
 			else if(xplaca == 'WNK074'){ //1158
 				window.open("https://drive.google.com/embeddedfolderview?id=1ub-CAOZebwT1t-n5w_nBm3WAd20C_e65#grid");
 			}
 			else if(xplaca == 'SJU190'){ //116
 				window.open("https://drive.google.com/embeddedfolderview?id=1Ni49GsjN64ujXJdwxsBpBHS9Gff6ZNuS#grid");
 			}
 			else if(xplaca == 'WMZ748'){ //1248
 				window.open("https://drive.google.com/embeddedfolderview?id=1U8LdRXDXrjFi3HrZABVxc1ioD7wHAUQ9#grid");
 			}
 			else if(xplaca == 'TJQ747'){ //1169
 				window.open("https://drive.google.com/embeddedfolderview?id=1U8LdRXDXrjFi3HrZABVxc1ioD7wHAUQ9#grid");
 			}
 			else if(xplaca == 'WHK996'){ //132
 				window.open("https://drive.google.com/embeddedfolderview?id=1Sez2W9wEMtJPK73mHb44_2T1ME-RVa5W#grid");
 			}
 			else if(xplaca == 'WHN130'){ //136
 				window.open("https://drive.google.com/embeddedfolderview?id=1bsKrIz0Vki5Z_tJWQHK1Gw9hsDXOAbG1#grid");
 			}
 			else if(xplaca == 'WRC742'){ //141
 				window.open("https://drive.google.com/embeddedfolderview?id=1D5jI3nE_ZpOeh_JOAKNiW-hwLgev6kY_#grid");
 			}
 			else if(xplaca == 'SWL443'){ //143
 				window.open("https://drive.google.com/embeddedfolderview?id=1QUPPlkdYmjrOmx85ZPMpYdIFOoIdaxcI#grid");
 			}
 			else if(xplaca == 'SXE393'){ //147
 				window.open("https://drive.google.com/embeddedfolderview?id=1f1wqI-jbLgJpdXqNy8ovBi2mpWxNqYRD#grid");
 			}
 			else if(xplaca == 'VLG677'){ //148
 				window.open("https://drive.google.com/embeddedfolderview?id=19Oqzr6wwDp_3GB3JkqwsqC8HAnzPFoqV#grid");
 			}
 			else if(xplaca == 'WGG726'){ //015
 				window.open("https://drive.google.com/embeddedfolderview?id=1U6fpIJllvR7198kbgLmPgOqFGTznMVGa#grid");
 			}
 			else if(xplaca == 'SJS093'){ //015
 				window.open("https://drive.google.com/embeddedfolderview?id=1U6fpIJllvR7198kbgLmPgOqFGTznMVGa#grid");
 			}
 			else if(xplaca == 'SJS333'){ //156
 				window.open("https://drive.google.com/embeddedfolderview?id=1Ha_htXIuEziBI3Ssm3xUtSaowHo87HaL#grid");
 			}
 			else if(xplaca == 'SJT005'){ //160
 				window.open("https://drive.google.com/embeddedfolderview?id=1GyhjVoDCu9lyAxVTd-tp1gd-tZqVbtoe#grid");
 			}
 			else if(xplaca == 'STH353'){ //160
 				window.open("https://drive.google.com/embeddedfolderview?id=1grYWd3Zxs_du0VZ0XpFmn4OKBt6EAw0t#grid");
 			}
 			else if(xplaca == 'SQK972'){ //162
 				window.open("https://drive.google.com/embeddedfolderview?id=110N854W5l3gylrhIfLQdtTWZ4qcnGCt8#grid");
 			}
 			else if(xplaca == 'TFT710'){ //163
 				window.open("https://drive.google.com/embeddedfolderview?id=1-VnUTrQ8jCQep-Q6UX5vVz406EqKKe3R#grid");
 			}
 			else if(xplaca == 'TPW787'){ //760
 				window.open("https://drive.google.com/embeddedfolderview?id=1J4uTyIOgs8nvweJxO9hJxFOpTadpTwcj#grid");
 			}
 			else if(xplaca == 'SXE531'){ //164
 				window.open("https://drive.google.com/embeddedfolderview?id=1tFU2fAhWaZ0B7U_uudmkAVBhmkuFZu2u#grid");
 			}
 			else if(xplaca == 'WHK908'){ //170
 				window.open("https://drive.google.com/embeddedfolderview?id=1wIv11qHwSs5CbyGdUR_2Rmsez5C5Sy6h#grid");
 			}
 			else if(xplaca == 'WHL268'){ //018
 				window.open("https://drive.google.com/embeddedfolderview?id=1qUXjFqF8eXxzOmFodnYZmL6YepV1OaWM#grid");
 			}
 			else if(xplaca == 'TJQ743'){ //180
 				window.open("https://drive.google.com/embeddedfolderview?id=1HXCjprM9i4Lh2YfMqt59IlXQmAiSebfp#grid");
 			}
 			else if(xplaca == 'SXF533'){ //182
 				window.open("https://drive.google.com/embeddedfolderview?id=1rmPVSEYNwOfC61e7a-1pGrDkHESUhO9r#grid");
 			}
 			else if(xplaca == 'WHL601'){ //185
 				window.open("https://drive.google.com/embeddedfolderview?id=15mhUNQGkIZhRPstbgCxBHtNmF36D6eYz#grid");
 			}
 			else if(xplaca == 'STQ199'){ //199
 				window.open("https://drive.google.com/embeddedfolderview?id=1A8OXhQHJJcy3ruc6eaiF6YWulac0TNxh#grid");
 			}
 			else if(xplaca == 'SXE642'){ //002
 				window.open("https://drive.google.com/embeddedfolderview?id=1Z2bZCv-rydYU6w0uZoCwqU1Q2i738B3U#grid");
 			}
 			else if(xplaca == 'SKL049'){ //2005
 				window.open("https://drive.google.com/embeddedfolderview?id=1fmtZ3NLpHZTT80BOkN2yFZQqOTd4WVLe#grid");
 			}
 			else if(xplaca == 'WNR715'){ //2017
 				window.open("https://drive.google.com/embeddedfolderview?id=1WRc5p1VQiQQGg40JH738au1HfX0she1G#grid");
 			}
 			else if(xplaca == 'TTZ004'){ //2025
 				window.open("https://drive.google.com/embeddedfolderview?id=1Jl2R3Qlr2q68Go1LQcwHi0a2yebXsAgG#grid");
 			}
 			else if(xplaca == 'EQT560'){ //2235
 				window.open("https://drive.google.com/embeddedfolderview?id=1owummChPvbY2coyWaxIgAU-MOnOAXyIb#grid");
 			}
 			else if(xplaca == 'WEW079'){ //2238
 				window.open("https://drive.google.com/embeddedfolderview?id=1QSyHRPpNXZNVGxWfC-_k4VqDNpNjCBLm#grid");
 			}
 			else if(xplaca == 'ESS773'){ //2247
 				window.open("https://drive.google.com/embeddedfolderview?id=1KxFmNs_kGVMjBknYih97VRGTKFFKWXF7#grid");
 			}
 			else if(xplaca == 'SXD191'){ //243
 				window.open("https://drive.google.com/embeddedfolderview?id=1cA-JRDy7ZN_ePDiRSN-c3nO9QL1VJNCd#grid");
 			}
 			else if(xplaca == 'WHK907'){ //248
 				window.open("https://drive.google.com/embeddedfolderview?id=1jlZxa8bJrOqxdrXmWK42rLMlMYzic3Ty#grid");
 			}
 			else if(xplaca == 'TRE858'){ //2511
 				window.open("https://drive.google.com/embeddedfolderview?id=1Hsl9TfCtj5kLqVt9ol8EsPOEijEbbCuq#grid");
 			}
 			else if(xplaca == 'SSA007'){ //2512
 				window.open("https://drive.google.com/embeddedfolderview?id=1q9jHHxy-vU9LRsPX68igUGuIjTFgudLU#grid");
 			}
 			else if(xplaca == 'VCG479'){ //2513
 				window.open("https://drive.google.com/embeddedfolderview?id=1_upm2eSJxWRPsxKbntAVxecEl0Tk6k-4#grid");
 			}
 			else if(xplaca == 'TJQ483'){ //254
 				window.open("https://drive.google.com/embeddedfolderview?id=1Af812hH07j-L2IQm6_3ZFK0YKkbmp98d#grid");
 			}
 			else if(xplaca == 'WBE168'){ //2542
 				window.open("https://drive.google.com/embeddedfolderview?id=1uY-bHDdjdewjHj0gvE2jvQixJrVbNYdl#grid");
 			}
 			else if(xplaca == 'VCK454'){ //2585
 				window.open("https://drive.google.com/embeddedfolderview?id=1TaBZF9GVK3NZCHBq7OIoB-wfPwd6FYqb#grid");
 			}
 			else if(xplaca == 'SXD930'){ //026
 				window.open("https://drive.google.com/embeddedfolderview?id=18GZ4IYBd-rbUrKXEZn5XtNr7yTWayR_y#grid");
 			}
 			else if(xplaca == 'USA678'){ //027
 				window.open("https://drive.google.com/embeddedfolderview?id=1htCxpvdhjorwhFl4RPi3F0OLvzqDCGaw#grid");
 			}
 			else if(xplaca == 'SNZ405'){ //29
 				window.open("https://drive.google.com/embeddedfolderview?id=1LGk72A8SKuaKnEzAQQiUcnDeV1gZ0Xw9#grid");
 			}
 			else if(xplaca == 'TJX244'){ //029
 				window.open("https://drive.google.com/embeddedfolderview?id=19xEvxZyqODZiHZ_PE0sVdkIBGC04JHGo#grid");
 			}
 			else if(xplaca == 'WLB550'){ //297
 				window.open("https://drive.google.com/embeddedfolderview?id=1r5sWz4-h4rn4bXqowbsK2OHMl7fN-y--#grid");
 			}
 			else if(xplaca == 'WHL589'){ //003
 				window.open("https://drive.google.com/embeddedfolderview?id=1ELStstsgnR6_bussS1WLkwk1roDzAuK1#grid");
 			}
 			else if(xplaca == 'WHN486'){ //306
 				window.open("https://drive.google.com/embeddedfolderview?id=1CmsADfq_h1UcwKCzR9HbAtssMBqNdibr#grid");
 			}
 			else if(xplaca == 'SPN857'){ //312
 				window.open("https://drive.google.com/embeddedfolderview?id=1tzJC775sqLH_IGKApchZ0HgmK7lJWuRR#grid");
 			}
 			else if(xplaca == 'STH170'){ //313
 				window.open("https://drive.google.com/embeddedfolderview?id=1on8za-hJZirGoJRMBMIabxljgTrwy4tT#grid");
 			}
 			else if(xplaca == 'ZRL406'){ //313
 				window.open("https://drive.google.com/embeddedfolderview?id=1ZGhgWa6-PuV1S_MZXDNglA0y14pLtKWa#grid");
 			}
 			else if(xplaca == 'SXW243'){ //316
 				window.open("https://drive.google.com/embeddedfolderview?id=1jNCyHQg2-BfWlpkcZrV_bM77jjDwk3kD#grid");
 			}
 			else if(xplaca == 'WEP089'){ //032
 				window.open("https://drive.google.com/embeddedfolderview?id=17bIGBoiJi1DJogXZarNWzJI-JJaHzwxN#grid");
 			}
 			else if(xplaca == 'SNT162'){ //033
 				window.open("https://drive.google.com/embeddedfolderview?id=1yAM-nnFXIFmjs2I9IgN6gZOSDBYbDfM6#grid");
 			}
 			else if(xplaca == 'SXG125'){ //035
 				window.open("https://drive.google.com/embeddedfolderview?id=1Nxw28DUQSO7j_ylHat3yYXpXO6swIefP#grid");
 			}
 			else if(xplaca == 'WEJ873'){ //368
 				window.open("https://drive.google.com/embeddedfolderview?id=1mo6kVB7J4VfONW5E4UwoLdXjvMZ5B4sw#grid");
 			}
 			else if(xplaca == 'WNX076'){ //381
 				window.open("https://drive.google.com/embeddedfolderview?id=1zZpPJBJDxIIp_s4PIl8l1h2kDrHEFcku#grid");
 			}
 			else if(xplaca == 'WBE338'){ //039
 				window.open("https://drive.google.com/embeddedfolderview?id=1LU9ogf4rCc_P5_JkJ9TUBDGj-9ZxBmU1#grid");
 			}
 			else if(xplaca == 'WHK341'){ //400
 				window.open("https://drive.google.com/embeddedfolderview?id=1-0JlJAtI-zRHH8vedPapaf61l0rl7By6#grid");
 			}
 			else if(xplaca == 'VLG110'){ //4001
 				window.open("https://drive.google.com/embeddedfolderview?id=1Zm_Z8Q8nDAdfGffqwU4_F0Uy_UwMxZOI#grid");
 			}
 			else if(xplaca == 'SNP365'){ //401
 				window.open("https://drive.google.com/embeddedfolderview?id=1iwfbvWAdgi181DQ_mK6mhTevM2Iku5KQ#grid");
 			}
 			else if(xplaca == 'TNG031'){ //402
 				window.open("https://drive.google.com/embeddedfolderview?id=1FEtvx6VggcDeQyVMXXusCr_T1TGmfptV#grid");
 			}
 			else if(xplaca == 'SJU662'){ //403
 				window.open("https://drive.google.com/embeddedfolderview?id=1TkhoUsT9imgy3hUwyBGwMgC_ZcHz2kv9#grid");
 			}
 			else if(xplaca == 'SXF694'){ //405
 				window.open("https://drive.google.com/embeddedfolderview?id=1gTcrL3F4sbieuBJMFkiDvnbyyZ5yBbIH#grid");
 			}
 			else if(xplaca == 'VCH409'){ //407
 				window.open("https://drive.google.com/embeddedfolderview?id=1dpxkQXfJwCEIkUimyRURjqGLpqeurjiA#grid");
 			}
 			else if(xplaca == 'SXG363'){ //408
 				window.open("https://drive.google.com/embeddedfolderview?id=1gXi27OZEu1UnfwxOQacOZ4qn03R1KKBT#grid");
 			}
 			else if(xplaca == 'UVL145'){ //409
 				window.open("https://drive.google.com/embeddedfolderview?id=1WMeIZ8vVfBDYfoGS_mAgyRjW9--C4vzv#grid");
 			}
 			else if(xplaca == 'VMB105'){ //410
 				window.open("https://drive.google.com/embeddedfolderview?id=1rxobd1c9BGWNCIhv_eXqVv4UnOhZ37X0#grid");
 			}
 			else if(xplaca == 'WHK390'){ //411
 				window.open("https://drive.google.com/embeddedfolderview?id=1HaMBZmCwuUdN6r_iEPxPpaw64fWTcFgA#grid");
 			}
 			else if(xplaca == 'WHL744'){ //412
 				window.open("https://drive.google.com/embeddedfolderview?id=1zoJNAWy7rTmtB9DqSf-WwCrR0PQdZDka#grid");
 			}
 			else if(xplaca == 'SJT478'){ //413
 				window.open("https://drive.google.com/embeddedfolderview?id=1hDlJ3wYy_dN5jHzBiRZD7xETYJPLbpI_#grid");
 			}
 			else if(xplaca == 'ZNK572'){ //414
 				window.open("https://drive.google.com/embeddedfolderview?id=1Xcu8PJOHJxznxkRBcyEkhxtAxIzJYCnP#grid");
 			}
 			else if(xplaca == 'WHK228'){ //415
 				window.open("https://drive.google.com/embeddedfolderview?id=1ng7Irn1EmiewYcYcfcomw0aniCpmbVN7#grid");
 			}
 			else if(xplaca == 'SXE360'){ //416
 				window.open("https://drive.google.com/embeddedfolderview?id=1SkqEo36gYimmQ6124-rmrKUcqrwA7k2P#grid");
 			}
 			else if(xplaca == 'SXE988'){ //418
 				window.open("https://drive.google.com/embeddedfolderview?id=1ew6lwmBOSFIspkn9LvEw1vWKBw74SL5Y#grid");
 			}
 			else if(xplaca == 'WHN007'){ //042
 				window.open("https://drive.google.com/embeddedfolderview?id=1e8PPS434IDrk99HQapfru4LgA2I-wIJ-#grid");
 			}
 			else if(xplaca == 'SOD042'){ //042
 				window.open("https://drive.google.com/embeddedfolderview?id=1SdO4cEI1_JggBSIuWpK30puST4Oq4-gc#grid");
 			}
 			else if(xplaca == 'SAP988'){ //420
 				window.open("https://drive.google.com/embeddedfolderview?id=13XEIWPl8EzrNdPz7kKrq5CvszKYZyDoK#grid");
 			}
 			else if(xplaca == 'WHK288'){ //421
 				window.open("https://drive.google.com/embeddedfolderview?id=1PNLC-M9eCbIv4gH3PJejVV5RuWKVFWuO#grid");
 			}
 			else if(xplaca == 'SXE938'){ //422
 				window.open("https://drive.google.com/embeddedfolderview?id=1F0Kd3jUtpuVmFPBtuvQdOef4vrVNQwrO#grid");
 			}
 			else if(xplaca == 'SXF092'){ //424
 				window.open("https://drive.google.com/embeddedfolderview?id=14fm8AtBKw8MDQ3-wOruOhtYgJp3dX4PT#grid");
 			}
 			else if(xplaca == 'SXG062'){ //425
 				window.open("https://drive.google.com/embeddedfolderview?id=1mpWHicmNTEoKhnYQOTicZVYA47A_utWh#grid");
 			}
 			else if(xplaca == 'SXE933'){ //427
 				window.open("https://drive.google.com/embeddedfolderview?id=10stS9w6TPmteTh2vRgE8IrVuj-JG7hbs#grid");
 			}
 			else if(xplaca == 'TJQ426'){ //428
 				window.open("https://drive.google.com/embeddedfolderview?id=1aJjeB9gteFvMpSGcKcOAhTCRRSJ6QnE8#grid");
 			}
 			else if(xplaca == 'SXF408'){ //430
 				window.open("https://drive.google.com/embeddedfolderview?id=1MLrSJfuTWp9loKd8PfmYUlotdwrrndBu#grid");
 			}
 			else if(xplaca == 'SPN286'){ //435
 				window.open("https://drive.google.com/embeddedfolderview?id=19GkJwhwIyWdFpYEwj0t-3UWbaWZ58quc#grid");
 			}
 			else if(xplaca == 'WHM485'){ //436
 				window.open("https://drive.google.com/embeddedfolderview?id=13UwPWbGxhbRLvnPRwvx48WG2XlRtQ35i#grid");
 			}
 			else if(xplaca == 'WHL717'){ //437
 				window.open("https://drive.google.com/embeddedfolderview?id=195MHwAcXpissXFipNZFP5FsSf8K3HRJU#grid");
 			}
 			else if(xplaca == 'SXG070'){ //438
 				window.open("https://drive.google.com/embeddedfolderview?id=1uOHeW35YuBYI-W7fXW2swRnkuSBFtm3M#grid");
 			}
 			else if(xplaca == 'SJS065'){ //439
 				window.open("https://drive.google.com/embeddedfolderview?id=1OmbwFBow-xVv2pbwNZEhHejccBh1Sgq5#grid");
 			}
 			else if(xplaca == 'SXF199'){ //440
 				window.open("https://drive.google.com/embeddedfolderview?id=1b_jFizsZsQMjmDwWBp3zrOJFjINJQB2N#grid");
 			}
 			else if(xplaca == 'WHN403'){ //442
 				window.open("https://drive.google.com/embeddedfolderview?id=1crZ1KFyohAsKepMTmQsmPYGzfM6hSOiu#grid");
 			}
 			else if(xplaca == 'SXF132'){ //443
 				window.open("https://drive.google.com/embeddedfolderview?id=1fLnQXh5lZ_yqHL4EyNcy70STWZ7YGkJu#grid");
 			}
 			else if(xplaca == 'WHN117'){ //444
 				window.open("https://drive.google.com/embeddedfolderview?id=1RPjTp8PGlvJnSIsfad8dtQnHrBeCnFxE#grid");
 			}
 			else if(xplaca == 'WHK312'){ //446
 				window.open("https://drive.google.com/embeddedfolderview?id=1a9Zdf_YkBex-AyGpvi0VvLa6TkxBci9d#grid");
 			}
 			else if(xplaca == 'WHN369'){ //448
 				window.open("https://drive.google.com/embeddedfolderview?id=1VVHf3LmJXwYl5ZWMoYkVu2Wd6Ds_g5DO#grid");
 			}
 			else if(xplaca == 'WHK582'){ //451
 				window.open("https://drive.google.com/embeddedfolderview?id=18IWcvf68xq2OuvZq9ph22OlgG5_1v3-6#grid");
 			}
 			else if(xplaca == 'WHK658'){ //454
 				window.open("https://drive.google.com/embeddedfolderview?id=13nuLVIBf7HtBWtlkr7jx26c2hqAapCye#grid");
 			}
 			else if(xplaca == 'SJR889'){ //457
 				window.open("https://drive.google.com/embeddedfolderview?id=1OOwaKqUBuGtzUwMzG6CReb9a3NMeJLGb#grid");
 			}
 			else if(xplaca == 'WHK741'){ //460
 				window.open("https://drive.google.com/embeddedfolderview?id=14TAGxQAJgIOFy5977pQIyqdAtkh4RI1i#grid");
 			}
 			else if(xplaca == 'WHK795'){ //461
 				window.open("https://drive.google.com/embeddedfolderview?id=1D1fC7WBPWuhUpTUSbPAhsLgmh3BzoTt1#grid");
 			}
 			else if(xplaca == 'SJS466'){ //462
 				window.open("https://drive.google.com/embeddedfolderview?id=1VDAWR0leiJVPDN7s0q5Vf6N_ouT2Vjk3#grid");
 			}
 			else if(xplaca == 'WHN593'){ //464
 				window.open("https://drive.google.com/embeddedfolderview?id=1VO2UauBe8hRIfjo-yDujBrYRP7Q9PBjJ#grid");
 			}
 			else if(xplaca == 'WHK767'){ //465
 				window.open("https://drive.google.com/embeddedfolderview?id=1lVqf9SvSey81Mnbc89hoqG1_8caDWyL1#grid");
 			}
 			else if(xplaca == 'SXF043'){ //466
 				window.open("https://drive.google.com/embeddedfolderview?id=14TGjbmooj0lGXG2A4T3OPDlMpit26Qnu#grid");
 			}
 			else if(xplaca == 'SJS731'){ //467
 				window.open("https://drive.google.com/embeddedfolderview?id=1CcFtf82W3WlP5XcjIHNsTJDjo_Nn_UZ3#grid");
 			}
 			else if(xplaca == 'WHL286'){ //469
 				window.open("https://drive.google.com/embeddedfolderview?id=17p8fHr8tE6mDX0-88etB_1ShPIiaVRFU#grid");
 			}
 			else if(xplaca == 'SJT360'){ //471
 				window.open("https://drive.google.com/embeddedfolderview?id=1kfS8Cm0DqfUFe5EsEU4Yy3QuaLLPyf4k#grid");
 			}
 			else if(xplaca == 'WHL553'){ //472
 				window.open("https://drive.google.com/embeddedfolderview?id=1-IUYPEq9pfWyweesPQmFUiQwMqvqHE5i#grid");
 			}
 			else if(xplaca == 'WHN421'){ //473
 				window.open("https://drive.google.com/embeddedfolderview?id=1eVrYyZD3OlRnbLTASkrw-M5e6JQ_2K-6#grid");
 			}
 			else if(xplaca == 'EQT529'){ //475
 				window.open("https://drive.google.com/embeddedfolderview?id=1Mmdp0T3hcJFfiFuBeAbNFEh54Gjh76ca#grid");
 			}
 			else if(xplaca == 'ZNK483'){ //478
 				window.open("https://drive.google.com/embeddedfolderview?id=1x4rZX1yD8l3bIi83MdoDZAh9xeUsec6i#grid");
 			}
 			else if(xplaca == 'SJT940'){ //479
 				window.open("https://drive.google.com/embeddedfolderview?id=1ylpPA67s0uvxnr5185OuUggK3MX0Hap3#grid");
 			}
 			else if(xplaca == 'TMO522'){ //047
 				window.open("https://drive.google.com/embeddedfolderview?id=1ujxSf2v04CUa4IGm0fPgU5F9cTey12Ab#grid");
 			}
 			else if(xplaca == 'WHL402'){ //049
 				window.open("https://drive.google.com/embeddedfolderview?id=1Z0e-L6benzlvr1i-PwnBkPzRwhe98Beu#grid");
 			}
 			else if(xplaca == 'SXF372'){ //49
 				window.open("https://drive.google.com/embeddedfolderview?id=1DRI3burMOzNikf_iG23BlRqadjduB3uG#grid");
 			}
 			else if(xplaca == 'SJT464'){ //491
 				window.open("https://drive.google.com/embeddedfolderview?id=1CgbMjSZrO7e1pzE9UkjT9aeOs9teZOX6#grid");
 			}
 			else if(xplaca == 'SJT477'){ //492
 				window.open("https://drive.google.com/embeddedfolderview?id=1aVbw9tGM2Vc-Gak78FHVmgaZ-eb-NVeO#grid");
 			}
 			else if(xplaca == 'SXE336'){ //497
 				window.open("https://drive.google.com/embeddedfolderview?id=1rWtWqzZi34RkwDWAAKItbZ-yxZPwpqYY#grid");
 			}
 			else if(xplaca == 'WBE092'){ //499
 				window.open("https://drive.google.com/embeddedfolderview?id=1WzgDE4DIu4RsnhKn_rZSn77mpXkWq-7e#grid");
 			}
 			else if(xplaca == 'SPH747'){ //5005
 				window.open("https://drive.google.com/embeddedfolderview?id=1MZ7APgLLjT1fWz08-5Pqp8-orgw28hiH#grid");
 			}
 			else if(xplaca == 'UPS167'){ //5007
 				window.open("https://drive.google.com/embeddedfolderview?id=1WzStfRm85p9sNrFKHIY8CYA5Ypo7Pjq8#grid");
 			}
 			else if(xplaca == 'VIZ324'){ //511
 				window.open("https://drive.google.com/embeddedfolderview?id=1jlcz527K_2MG0JBaGZJfwwMSShjKX-pq#grid");
 			}
 			else if(xplaca == 'SJU739'){ //512
 				window.open("https://drive.google.com/embeddedfolderview?id=11-rKj5zFDFP0k1FA0993aoCt_McMWd-J#grid");
 			}
 			else if(xplaca == 'WHM428'){ //513
 				window.open("https://drive.google.com/embeddedfolderview?id=1qB1TUiqKUST-YuK0r6gcGTMHtv5oLjuU#grid");
 			}
 			else if(xplaca == 'WMA928'){ //514
 				window.open("https://drive.google.com/embeddedfolderview?id=1EHa4Vp46y4KWWxqJ7vPiOZsh9WVNGDpp#grid");
 			}
 			else if(xplaca == 'SJS925'){ //515
 				window.open("https://drive.google.com/embeddedfolderview?id=1jB4yfLhyI2_-G3vWooVdG-ib3Nn4oXVG#grid");
 			}
 			else if(xplaca == 'SNN285'){ //516
 				window.open("https://drive.google.com/embeddedfolderview?id=1GsFTc6B1eGGGFbR1I7ZS0-2YB6JPfB2y#grid");
 			}
 			else if(xplaca == 'VMW008'){ //518
 				window.open("https://drive.google.com/embeddedfolderview?id=1c03ESYAILtQe9N7x5he9gva0ydYMNdlH#grid");
 			}
 			else if(xplaca == 'SXE681'){ //053
 				window.open("https://drive.google.com/embeddedfolderview?id=1Tp6bKbPhH_3r47Tyv1PQq69zWc0Rq6tx#grid");
 			}
 			else if(xplaca == 'TFU092'){ //530
 				window.open("https://drive.google.com/embeddedfolderview?id=1guYq_fYNEa6A37RyJ51tnKsEXYdofOMg#grid");
 			}
 			else if(xplaca == 'SVC181'){ //600
 				window.open("https://drive.google.com/embeddedfolderview?id=1qch0qu2k0hz7JTGm3KSX4rKqaQo7pKxf#grid");
 			}
 			else if(xplaca == 'WEF446'){ //603
 				window.open("https://drive.google.com/embeddedfolderview?id=1Uwy91YOMaowqN53EZwxAmq4V96C1EffJ#grid");
 			}
 			else if(xplaca == 'SXD945'){ //604
 				window.open("https://drive.google.com/embeddedfolderview?id=1QJpYfPdQhme3hucmLBaKflIQQLFsjpI8#grid");
 			}
 			else if(xplaca == 'SXD946'){ //605
 				window.open("https://drive.google.com/embeddedfolderview?id=1ZgWwxDTE8TklVSwWUJaNKr_DHEv4Dp2_#grid");
 			}
 			else if(xplaca == 'SXD947'){ //606
 				window.open("https://drive.google.com/embeddedfolderview?id=1QeYG-mPxrXsCYBiCa0Fi5qfm6_Vlf59o#grid");
 			}
 			else if(xplaca == 'WMB451'){ //610
 				window.open("https://drive.google.com/embeddedfolderview?id=1Fy2R8i3iP9iemiy5101dB6DHzoXectNW#grid");
 			}
 			else if(xplaca == 'WMB372'){ //634
 				window.open("https://drive.google.com/embeddedfolderview?id=1G_gAai6azZ0dNGrl_L7QATRRz5EgvIyW#grid");
 			}
 			else if(xplaca == 'WHN127'){ //645
 				window.open("https://drive.google.com/embeddedfolderview?id=1jnWBFMISQSmKhciZutQp2m8jHA5avbub#grid");
 			}
 			else if(xplaca == 'SJS035'){ //067
 				window.open("https://drive.google.com/embeddedfolderview?id=1jikRcZR8gTzGkaaFExtmx1I_LtPo_a3N#grid");
 			}
 			else if(xplaca == 'TTY858'){ //067
 				window.open("https://drive.google.com/embeddedfolderview?id=1aBjAEqEqz7MIrdTnSvAqCw9tALmSVwwd#grid");
 			}
 			else if(xplaca == 'SMB894'){ //677
 				window.open("https://drive.google.com/embeddedfolderview?id=1aTWSsHFp-UY42rlJHhsw6svhmJJ0A6TA#grid");
 			}
 			else if(xplaca == 'VLF993'){ //068
 				window.open("https://drive.google.com/embeddedfolderview?id=1QF8Sja6TFcZ6uWt4aAGaYE_aAKTzcbp1#grid");
 			}
 			else if(xplaca == 'WHL649'){ //007
 				window.open("https://drive.google.com/embeddedfolderview?id=15-TMoM4dCFg5wtRV5RwQfndYIxz-CR2j#grid");
 			}
 			else if(xplaca == 'SXF382'){ //700
 				window.open("https://drive.google.com/embeddedfolderview?id=12I_zFECp9MQThuSzVE_9Fqn_0eBRy4i7#grid");
 			}
 			else if(xplaca == 'SXF956'){ //710
 				window.open("https://drive.google.com/embeddedfolderview?id=1Qokch7hjcD0J5g_8tQyN-5YwO6FXr_TR#grid");
 			}
 			else if(xplaca == 'UZC738'){ //720
 				window.open("https://drive.google.com/embeddedfolderview?id=1poKO6Q2pTJv_YHNXT70uqMrPoH71d43i#grid");
 			}
 			else if(xplaca == 'SOQ143'){ //730
 				window.open("https://drive.google.com/embeddedfolderview?id=1Sw14Q5qT71dEFh9GmLsWxK8_9xGwpufg#grid");
 			}
 			else if(xplaca == 'SOQ143'){ //740
 				window.open("https://drive.google.com/embeddedfolderview?id=1IeVgg9tlfunzoax99IhpUPaF1NaOMHBl#grid");
 			}
 			else if(xplaca == 'SJS433'){ //750
 				window.open("https://drive.google.com/embeddedfolderview?id=1-1P4ab-b4Aol-JlTErPKYIRbOQrQqdVK#grid");
 			}
 			else if(xplaca == 'UVL060'){ //080
 				window.open("https://drive.google.com/embeddedfolderview?id=1TAp30m2iIDjfRJ5I1vwcNfY2s605WTia#grid");
 			}
 			else if(xplaca == 'SZO239'){ //801
 				window.open("https://drive.google.com/embeddedfolderview?id=1gs_oXQs2Yb2p13W3o2vkwdRcbcrE-9AO#grid");
 			}
 			else if(xplaca == 'WHP834'){ //804
 				window.open("https://drive.google.com/embeddedfolderview?id=1HSIoRWLvbhC9Ni4G5DPkof0hZCrd-qY_#grid");
 			}
 			else if(xplaca == 'WHN143'){ //804
 				window.open("https://drive.google.com/embeddedfolderview?id=1bvD1ELzkj_Cr08VYmP2foV4dSHsoF9Xb#grid");
 			}
 			else if(xplaca == 'WEJ857'){ //813
 				window.open("https://drive.google.com/embeddedfolderview?id=11Y_g_O77S8h82y5lukIoRNC2XS9C2oUB#grid");
 			}
 			else if(xplaca == 'ESS821'){ //813
 				window.open("https://drive.google.com/embeddedfolderview?id=1JN3S2CZYOA3OVmiE8HQVr8deDAnlLB1d#grid");
 			}
 			else if(xplaca == 'VCG213'){ //815
 				window.open("https://drive.google.com/embeddedfolderview?id=1o5fzQ7erVHWzUKNwiSYKvuKTFz8PN86y#grid");
 			}
 			else if(xplaca == 'WFH621'){ //815
 				window.open("https://drive.google.com/embeddedfolderview?id=13YF34bS4HRyd8Ag4f-eX0sWjw-ACaCKe#grid");
 			}
 			else if(xplaca == 'WHL033'){ //817
 				window.open("https://drive.google.com/embeddedfolderview?id=1GMxbTd7022EThSr7odd653d8DKyuCCg2#grid");
 			}
 			else if(xplaca == 'PEN298'){ //817
 				window.open("https://drive.google.com/embeddedfolderview?id=15OqPohSuLhrUSVukwF8yO7i3vxLme9Sn#grid");
 			}
 			else if(xplaca == 'SJT824'){ //820
 				window.open("https://drive.google.com/embeddedfolderview?id=1RVXmS9i8Nxer_n8d-SDNc5e580UJMmtO#grid");
 			}
 			else if(xplaca == 'TJQ369'){ //823
 				window.open("https://drive.google.com/embeddedfolderview?id=1bgax6igjcOA6zg933Gqgxf52MElVPawm#grid");
 			}
 			else if(xplaca == 'TMI253'){ //826
 				window.open("https://drive.google.com/embeddedfolderview?id=1NCMmFG_E9hXLvaeHg6qL_YV3FPGd677C#grid");
 			}
 			else if(xplaca == 'SWO292'){ //827
 				window.open("https://drive.google.com/embeddedfolderview?id=1M-zinVe3e5jQp2RjAWYhHnrXQHCtj1rz#grid");
 			}
 			else if(xplaca == 'TJQ453'){ //827
 				window.open("https://drive.google.com/embeddedfolderview?id=15ngp9eIqkRqVeOJxUudwzsf4DzZv3PG3#grid");
 			}
 			else if(xplaca == 'SXE068'){ //828
 				window.open("https://drive.google.com/embeddedfolderview?id=1MBszu6RYRYH78EkzzHaTRcdJ-kDuK9Vb#grid");
 			}
 			else if(xplaca == 'VLG952'){ //829
 				window.open("https://drive.google.com/embeddedfolderview?id=1cqpCn-spH8I8sG6QWOaZhpsxTfTRGFtR#grid");
 			}
 			else if(xplaca == 'SJS550'){ //840
 				window.open("https://drive.google.com/embeddedfolderview?id=1_l1l134qlEZagBDV-X1H6Jrd_73-mhrt#grid");
 			}
 			else if(xplaca == 'TJQ380'){ //842
 				window.open("https://drive.google.com/embeddedfolderview?id=1E0ETy-pRVFxk0X6Ljmi9JgvwqgY35b6T#grid");
 			}
 			else if(xplaca == 'SJT526'){ //847
 				window.open("https://drive.google.com/embeddedfolderview?id=1wu1roGuJbcPGFSBNFThf3N7l-_TPYsYB#grid");
 			}
 			else if(xplaca == 'SMI881'){ //848
 				window.open("https://drive.google.com/embeddedfolderview?id=1Jh4Aoo0Q6xP-_SJ4qtCmHkMQx2fU-od3#grid");
 			}
 			else if(xplaca == 'SJS338'){ //849
 				window.open("https://drive.google.com/embeddedfolderview?id=1-VrTGYhEM_je3dEvhW3r9pK77KeS4Cbt#grid");
 			}
 			else if(xplaca == 'SLG375'){ //850
 				window.open("https://drive.google.com/embeddedfolderview?id=1cLFcljUhZmwqsmBKWhGOr5O06uoLF-yF#grid");
 			}
 			else if(xplaca == 'TVA722'){ //851
 				window.open("https://drive.google.com/embeddedfolderview?id=1kh-FptwAaetLG4u3vXUe9ejR9H1WK5wb#grid");
 			}
 			else if(xplaca == 'VOV733'){ //862
 				window.open("https://drive.google.com/embeddedfolderview?id=1qcNYyba5JQLuGluG9HAsKEZVGXUqmtpP#grid");
 			}
 			else if(xplaca == 'TMY088'){ //882
 				window.open("https://drive.google.com/embeddedfolderview?id=1Y3yx-jP74i-ovSCgTE_xb8Lbh1Q93fIY#grid");
 			}
 			else if(xplaca == 'WHK555'){ //894
 				window.open("https://drive.google.com/embeddedfolderview?id=1aVCvNdo1DWyXK2yfFHfXAVjxY9eK50_M#grid");
 			}
 			else if(xplaca == 'WMV989'){ //009
 				window.open("https://drive.google.com/embeddedfolderview?id=1P09dIcSDp0mY7YCPBcZTDmIUYqeAcxs4#grid");
 			}
 			else if(xplaca == 'TGK658'){ //900
 				window.open("https://drive.google.com/embeddedfolderview?id=1o8ffTaPQce9PhZk6rQjTNxAhi0QEmOBL#grid");
 			}
 			else if(xplaca == 'WMB478'){ //910
 				window.open("https://drive.google.com/embeddedfolderview?id=1oBHpr-5kqCg2Psjox5P8dGhtKWGpkRVV#grid");
 			}
 			else if(xplaca == 'WDQ213'){ //920
 				window.open("https://drive.google.com/embeddedfolderview?id=1313kOoZKOtafrsu-pU6RSYvxQkCMWmkc#grid");
 			}
 			else if(xplaca == 'SQY242'){ //096
 				window.open("https://drive.google.com/embeddedfolderview?id=15dZxBKY_KaDXjPMnShTeoWq9NS8zix7v#grid");
 			}
 			else if(xplaca == 'SXG715'){ //127
 				window.open("https://drive.google.com/embeddedfolderview?id=19nyufFf7w9ESJyQE3SvXOc_sGCcl9Zz1#grid");
 			}
 		}
	</script>

	<script type="text/javascript">
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