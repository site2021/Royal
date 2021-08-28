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
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="fichaTecnica()">
	         		<img src="icons/Picture.png" >
	         	</a>
	         	<span class="tooltiptext">Ficha TECNICA</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="editDocumentos()">
	         		<img src="icons/Document2.png" >
	         	</a>
	         	<span class="tooltiptext">Documentos VEHICULO</span>
	        </div>
	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="newConvenio()">
	         		<img src="icons/Star.png" >
	         	</a>
	         	<span class="tooltiptext">Convenios EMPRESARIALES</span>
	        </div>
	        <div class="tdiv" style="top: 7px;"> 	
	        	<label>Inicio:</label>
					<input id="iniciorodamiento" name="iniciorodamiento" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
			</div>

	        <div class="tdiv" style="top: 7px;"> 	
	        	<label>Fin:</label>
					<input id="finrodamiento" name="finrodamiento" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
			</div>

			<div class="tdiv"> 	
	         	<a id="btnRodamiento" name="btnRodamiento" class="boton" onclick="rodamiento()">
	         		<img src="icons/Ok.png" >
	         	</a>
	         	<span class="tooltiptext">Generar RODAMIENTO</span>
	        </div>
	    </div>
	</div>

	<table id="dg" title=" LISTA VEHÍCULOS " class="easyui-datagrid" style="width:100%;height:450px;margin-top:50px;"
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
		<!-- <img src='json/vista.php?id=66' alt='Img blob desde MySQL' />   -->
	</table>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:800px;height:550px;padding:10px 20px"
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

					<!-- <a id="btnDocumentos" name="btnDocumentos" class="boton" onclick="contratoF()" style="float: right;margin-top: 25px">
		         		<img src="icons/Document2.png" >
		         	</a> -->

		         	<!-- <a id="btnDocumentos" name="btnDocumentos" class="boton" onclick="vista()" style="float: right;margin-top: 25px">
		         		<img src="icons/Picture.png" >
		         	</a> -->
		         	<!-- <span class="tooltiptext">Nuevo VEHICULO</span> -->
				</div>
				<br>

				<div class="ftitle">DOCUMENTOS</div>
				<div class="ftitle2">TARJETA DE OPERACION</div>
					<!-- <a id="btntajopera" name="btntajopera" class="boton" onclick="tarjoperaVista()" style="float: right;margin-top: 25px">
			         	<img src="icons/Document2.png">
		         	</a> -->
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciotarjetaoperacion" name="iniciotarjetaoperacion" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="fintarjetaoperacion" name="fintarjetaoperacion" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
					<!-- <div class="fitem">
						<label>Tarj Operacion:</label>
						<input id="tarjoperaimg" name="tarjoperaimg" class="easyui-filebox">
					</div> -->

				<br>
				<div class="ftitle2">SOAT</div>
					<!-- <a id="btnSoat" name="btnSoat" class="boton" onclick="soatVista()" style="float: right;margin-top: 25px">
			         	<img src="icons/Document2.png">
		         	</a> -->
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciosoat" name="iniciosoat" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finsoat" name="finsoat" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
					<!-- <div class="fitem">
						<label>Soat:</label>
						<input id="soatimg" name="soatimg" class="easyui-filebox">
					</div> -->
				<br>
				<div class="ftitle2">TÉCNICO MECÁNICA</div>
					<!-- <a id="btntecmecanica" name="btntecmecanica" class="boton" onclick="tecmecanicaVista()" style="float: right;margin-top: 25px">
				        <img src="icons/Document2.png">
		         	</a> -->
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciotecmecanica" name="iniciotecmecanica" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="fintecmecanica" name="fintecmecanica" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
					<!-- <div class="fitem">
						<label>Tecnico:</label>
						<input id="tecmecanicaimg" name="tecmecanicaimg" class="easyui-filebox">
					</div> -->
				<br>
				<div class="ftitle2">PÓLIZA CONTRACTUAL</div>
					<!-- <a id="btnpolcontrac" name="btnpolcontrac" class="boton" onclick="polcontracVista()" style="float: right;margin-top: 25px">
				        <img src="icons/Document2.png">
		         	</a> -->
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciopolizacontrac" name="iniciopolizacontrac" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finpolizacontrac" name="finpolizacontrac" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
					<!-- <div class="fitem">
						<label>Poliza Contractual:</label>
						<input id="polcontracimg" name="polcontracimg" class="easyui-filebox">
					</div> -->
				<br>
				<div class="ftitle2">PÓLIZA EXTRACONTRACTUAL</div>
					<!-- <a id="btnpolextra" name="btnpolextrac" class="boton" onclick="polextracVista()" style="float: right;margin-top: 25px">
				        <img src="icons/Document2.png">
		         	</a> -->
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciopolizaextra" name="iniciopolizaextra" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finpolizaextra" name="finpolizaextra" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
					<!-- <div class="fitem">
						<label>Poliza Extracontractual:</label>
						<input id="polextracimg" name="polextracimg" class="easyui-filebox">
					</div> -->
				<br>
				<div class="ftitle2">REVISIÓN PREVENTIVA</div>
					<!-- <a id="btnpreventiva" name="btnpreventiva" class="boton" onclick="preventivaVista()" style="float: right;margin-top: 25px">
				        <img src="icons/Document2.png">
		         	</a> -->
					<div class="fitem">
						<label>Inicio:</label>
						<input id="iniciopreventiva" name="iniciopreventiva" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finpreventiva" name="finpreventiva" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>
					<!-- <div class="fitem">
						<label>Poliza Extracontractual:</label>
						<input id="preventivaimg" name="preventivaimg" class="easyui-filebox">
					</div> -->
					<br>

					<div class="ftitle">ESTADO</div>

					<div class="fitem">
						<label>Estado:</label>
						<select id="estado" name="estado" class="easyui-combobox" style="width:204px">
							<option></option>
						    <option value="ACTIVO">ACTIVO</option>
						    <option value="INACTIVO">INACTIVO</option>
						</select>
					</div>

					<div class="fitem">
						<label>Observación:</label>
						<input name="observacion" class="easyui-textbox" multiline="true" style="width: 510px; height: 66px">
					</div><br>

					<!-- <div class="ftitle">CONVENIO EMPRESARIAL</div>

					<div class="fitem">
						<label>Convenio:</label>
						<input name="enconvenio" class="easyui-textbox" style="width: 510px">
					</div>

					<div class="fitem">
						<label>Inicio:</label>
						<input id="inicioconvenio" name="inicioconvenio" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finconvenio" name="finconvenio" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div> -->
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

				<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-cancel" onclick="limpiarLinea()"></a>

				<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-ok" onclick="saveConvenio()"></a>
			</div>
		</form><br><br>

		<table id="dgdetalle" class="easyui-datagrid" style="width:100%;height:190px"
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




	<!-- DOCUMENTOS -->

	<div id="dlgDocumentos" class="easyui-dialog" data-options="modal:true" style="width:800px;height:550px;padding:10px 20px"
			closed="true" buttons="#dlgDocumentos-buttons">
		<form id="fmDocumentos" method="post" enctype="multipart/form-data">
		<div class="ftitle">INFORMACIÓN GENERAL</div>

			 
				<div class="fitem">
					<label>Interno:</label>
					<input id="interno" name="interno" class="easyui-textbox">
			
					<label>Placa:</label>
					<input id="placa" name="placa" class="easyui-textbox">

				<div class="ftitle">DOCUMENTOS</div>
				<div class="ftitle2">TARJETA DE OPERACION</div>
					<a id="btntajopera" name="btntajopera" class="boton" onclick="tarjoperaVista()" style="float: right;margin-top: 25px">
			         	<img src="icons/Document2.png">
		         	</a>
					<!-- <div class="fitem">
						<label>Inicio:</label>
						<input id="iniciotarjetaoperacion" name="iniciotarjetaoperacion" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="fintarjetaoperacion" name="fintarjetaoperacion" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div> -->
					<div class="fitem">
						<label>Tarj Operacion:</label>
						<input id="tarjoperaimg" name="tarjoperaimg" class="easyui-filebox">
					</div>

				<br>
				<div class="ftitle2">SOAT</div>
					<a id="btnSoat" name="btnSoat" class="boton" onclick="soatVista()" style="float: right;margin-top: 25px">
			         	<img src="icons/Document2.png">
		         	</a>
					<!-- <div class="fitem">
						<label>Inicio:</label>
						<input id="iniciosoat" name="iniciosoat" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finsoat" name="finsoat" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div> -->
					<div class="fitem">
						<label>Soat:</label>
						<input id="soatimg" name="soatimg" class="easyui-filebox">
					</div>
				<br>
				<div class="ftitle2">TÉCNICO MECÁNICA</div>
					<a id="btntecmecanica" name="btntecmecanica" class="boton" onclick="tecmecanicaVista()" style="float: right;margin-top: 25px">
				        <img src="icons/Document2.png">
		         	</a>
					<!-- <div class="fitem">
						<label>Inicio:</label>
						<input id="iniciotecmecanica" name="iniciotecmecanica" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="fintecmecanica" name="fintecmecanica" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div> -->
					<div class="fitem">
						<label>Tecnico:</label>
						<input id="tecmecanicaimg" name="tecmecanicaimg" class="easyui-filebox">
					</div>
				<br>
				<div class="ftitle2">PÓLIZA CONTRACTUAL</div>
					<a id="btnpolcontrac" name="btnpolcontrac" class="boton" onclick="polcontracVista()" style="float: right;margin-top: 25px">
				        <img src="icons/Document2.png">
		         	</a>
					<!-- <div class="fitem">
						<label>Inicio:</label>
						<input id="iniciopolizacontrac" name="iniciopolizacontrac" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finpolizacontrac" name="finpolizacontrac" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div> -->
					<div class="fitem">
						<label>Poliza Contractual:</label>
						<input id="polcontracimg" name="polcontracimg" class="easyui-filebox">
					</div>
				<br>
				<div class="ftitle2">PÓLIZA EXTRACONTRACTUAL</div>
					<a id="btnpolextra" name="btnpolextrac" class="boton" onclick="polextracVista()" style="float: right;margin-top: 25px">
				        <img src="icons/Document2.png">
		         	</a>
					<!-- <div class="fitem">
						<label>Inicio:</label>
						<input id="iniciopolizaextra" name="iniciopolizaextra" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finpolizaextra" name="finpolizaextra" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div> -->
					<div class="fitem">
						<label>Poliza Extracontractual:</label>
						<input id="polextracimg" name="polextracimg" class="easyui-filebox">
					</div>
				<br>
				<div class="ftitle2">REVISIÓN PREVENTIVA</div>
					<a id="btnpreventiva" name="btnpreventiva" class="boton" onclick="preventivaVista()" style="float: right;margin-top: 25px">
				        <img src="icons/Document2.png">
		         	</a>
					<!-- <div class="fitem">
						<label>Inicio:</label>
						<input id="iniciopreventiva" name="iniciopreventiva" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

						<label>Fin:</label>
						<input id="finpreventiva" name="finpreventiva" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div> -->
					<div class="fitem">
						<label>Preventiva:</label>
						<input id="preventivaimg" name="preventivaimg" class="easyui-filebox">
					</div>
					<br>

				</div> 
		</form>

	</div>
	<div id="dlgDocumentos-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveDocumentos()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgDocumentos').dialog('close')" style="width:90px">Cancelar</a>
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
				// url = 'json/duplicados_delete.php';

			}
		}
		function editDocumentos(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlgDocumentos').dialog('open').dialog('setTitle','DOCUMENTOS');
				$('#fmDocumentos').form('load',row);
				url = 'json/documentos_update.php?id='+row.id;
				// url = 'json/duplicados_delete.php';

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
						// duplicados();
						$('#dg').datagrid('reload');	// reload the user data
					}
				}
			});
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
						$('#dlgDocumentos').dialog('close');		// close the dialog
						duplicados();
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

		function duplicados(){
			$.post('json/duplicados_delete.php',function(result){
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

		function printVehiculos(){
			// location.assign("activosExcel.php?colegio="+xcolegio);
			location.assign("vehiculosExcel.php");			

		}
		function vista(){

			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar VEHÍCULO');
				$('#fm').form('load',row);
				url = 'json/vehiculo_update.php?id='+row.id;
			

				var params  = 'width='+screen.width;
				params += ', height='+screen.height;
				params += ', top=0, left=0'
				params += ', fullscreen=yes';


				window.open("json/vista.php?id="+row.id, params);
			}
			// $enlace = ("json/vista.php?id=3");
			// $img = "./ruta/imagen.jpg";
			// header('Content-Description: File Transfer');
			// header('Content-Type: application/octet-stream');
			// header('Content-Disposition: attachment; filename='.basename($img));
			// header('Content-Transfer-Encoding: binary');
			// header('Expires: 0');
			// header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			// header('Pragma: public');
			// header('Content-Length: ' . filesize($img));
			// ob_clean();
			// flush();
			// readfile($img);

			// if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")

		}

		function tarjoperaVista(){

			var row = $('#dg').datagrid('getSelected');
			if (row){
				var params  = 'width='+screen.width;
				params += ', height='+screen.height;
				params += ', top=0, left=0'
				params += ', fullscreen=yes';

				window.open("json/tarjoperaVista.php?id="+row.id, params);
			}
		}

		function soatVista(){

			var row = $('#dg').datagrid('getSelected');
			if (row){
				var params  = 'width='+screen.width;
				params += ', height='+screen.height;
				params += ', top=0, left=0'
				params += ', fullscreen=yes';

				window.open("json/soatvista.php?id="+row.id, params);
			}
		}

		function tecmecanicaVista(){

			var row = $('#dg').datagrid('getSelected');
			if (row){
				var params  = 'width='+screen.width;
				params += ', height='+screen.height;
				params += ', top=0, left=0'
				params += ', fullscreen=yes';

				window.open("json/tecmecanicaVista.php?id="+row.id, params);
			}
		}

		function polcontracVista(){

			var row = $('#dg').datagrid('getSelected');
			if (row){
				var params  = 'width='+screen.width;
				params += ', height='+screen.height;
				params += ', top=0, left=0'
				params += ', fullscreen=yes';

				window.open("json/polcontracVista.php?id="+row.id, params);
			}
		}

		function polextracVista(){

			var row = $('#dg').datagrid('getSelected');
			if (row){
				var params  = 'width='+screen.width;
				params += ', height='+screen.height;
				params += ', top=0, left=0'
				params += ', fullscreen=yes';

				window.open("json/polextracVista.php?id="+row.id, params);
			}
		}

		function preventivaVista(){

			var row = $('#dg').datagrid('getSelected');
			if (row){
				var params  = 'width='+screen.width;
				params += ', height='+screen.height;
				params += ', top=0, left=0'
				params += ', fullscreen=yes';

				window.open("json/preventivaVista.php?id="+row.id, params);
			}
		}

		function mtosVista(){

			var row = $('#dg').datagrid('getSelected');
			if (row){
				var params  = 'width='+screen.width;
				params += ', height='+screen.height;
				params += ', top=0, left=0'
				params += ', fullscreen=yes';

				window.open("json/mtosVista.php?id="+row.id, params);
			}
		}

		function rodamiento(){
			var xiniciorodamiento = getVar('iniciorodamiento',0);
			var xfinrodamiento = getVar('finrodamiento',0);

			// location.assign("rodamientos.php?iniciorodamiento="+xiniciorodamiento+"&finrodamiento="+xfinrodamiento);

			var params  = 'width='+screen.width;
			params += ', height='+screen.height;
			params += ', top=0, left=0'
			params += ', fullscreen=yes';

			window.open("rodamiento.php?iniciorodamiento="+xiniciorodamiento+"&finrodamiento="+xfinrodamiento, params);
		}

		function fichaTecnica(){

			var xreg = $("#dg").datagrid('getSelected');

			var xplaca = xreg['placa'];

			var params  = 'width='+screen.width;
    		params += ', height='+screen.height;
    		params += ', top=0, left=0'
    		params += ', fullscreen=yes';

    		window.open ("fichatecnica.php?placa="+xplaca, params);
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
				$("#dgdetalle").datagrid('load',{
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
						$('#dgdetalle').datagrid('reload');
						setVar('enconvenio',0,'');
						setVar('origenconvenio',0,'');
						setVar('destinoconvenio',0,'');
						setVar('inicioconvenio',2,hoy());
						setVar('finconvenio',2,hoy());
					}
				}
			});
		}

		function limpiarLinea(){
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