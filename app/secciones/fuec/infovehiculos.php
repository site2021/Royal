<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Vehiculos</title>
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
	<link rel="stylesheet" type="text/css" href="css/tooltips.css">
	
	<script type="text/javascript">
		$(function(){
			$("#dg").datagrid('enableFilter');			
		})
	</script>
</head>
<body>
	<div class="botonera">
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="verVehiculo()">
	         		<img src="icons/Car.png" >
	         	</a>
	         	<span class="tooltiptext">Visualizar VEHICULO</span>
	        </div>
	    </div>
	</div>

	<table id="dg" title=" VEHICULOS " class="easyui-datagrid" style="width:100%;height:auto"
			url="json/vehiculos_get.php" headerCls="hc"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="placa">Placa</th>
				<th field="interno">Interno</th>
				<th field="marca">Marca</th>
				<th field="modelo">Modelo</th>
				<th field="clase">Clase</th>				
				<th field="capacidad">Capacidad</th>				
				<th field="propietario">Propietario</th>
				<th field="empresaafiliadora">Afiliadora</th>
			</tr>
		</thead>
	</table>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:780px;height:540px;padding:10px 20px" closed="true" buttons="#dlg-buttons">

		<form id="fm" method="post" novalidate>
			<div class="ftitle">INFORMACION GENERAL</div>
			<div class="fitem">
				<label>Interno:</label>
				<input id="interno" name="interno" class="easyui-textbox" disabled="true">

				<label>Placa:</label>
				<input id="placa" name="placa" class="easyui-textbox" disabled="true">
			</div>

			<div class="fitem">
				<label>Vinculación:</label>
				<select id="tipovinculacion" name="tipovinculacion" class="easyui-combobox" style="width:204px" disabled="true">
				    <option value="VEHICULO PROPIO">VEHICULO PROPIO</option>
				    <option value="VEHICULO AFILIADO">VEHICULO AFILIADO</option>
				    <option value="CONVENIO EMPRESARIAL">CONVENIO EMPRESARIAL</option>
				</select>
			
				<label>Afiliadora:</label>
				<input name="empresaafiliadora" class="easyui-combobox" url="json/comboafiliadoras.php" style="width:205px" data-options="disabled:true,editable:true,valueField:'empresa',textField:'empresa'">
			</div> 
			<br>
			<div class="ftitle">LICENCIA DE TRÁNSITO</div>
			<div class="fitem">
				<label>Capacidad:</label>
				<input id="capacidad" name="capacidad" class="easyui-numberbox" disabled="true">

				<label>Marca:</label>
				<input name="marca" class="easyui-textbox" disabled="true">
			</div>

			<div class="fitem">
				<label>No Motor:</label>
				<input name="motor" class="easyui-textbox" disabled="true">

				<label>Modelo:</label>
				<input id="modelo" name="modelo" class="easyui-textbox" disabled="true">
			</div>

			<div class="fitem">
				<label>Color:</label>
				<input name="color" class="easyui-textbox" disabled="true">
			
				<label>Clase:</label>
				<select id="clase" name="clase" class="easyui-combobox" style="width:204px" disabled="true">
					<option></option>
				    <option value="BUS">BUS</option>
				    <option value="BUSETA">BUSETA</option>
				    <option value="MICROBÚS">MICROBUS</option>
				    <option value="DUSTER">DUSTER</option>
				</select>
			</div>

			<div class="fitem">
				<label>Carrocería:</label>
				<select id="carroceria" name="carroceria" class="easyui-combobox" style="width:204px" disabled="true">
					<option></option>
				    <option value="ABIERTO (ESCALERA)">ABIERTO (ESCALERA)</option>
				    <option value="ARTICULADO">ARTICULADO</option>
				    <option value="BIARTICULADO">BIARTICULADO</option>
				    <option value="CERRADA">CERRADA</option>
				    <option value="AMBULANCIA">AMBULANCIA</option>
				    <option value="VAN">VAN</option>
				</select>
					
				<label>Combustible:</label>
				<select id="combustible" name="combustible" class="easyui-combobox" disabled="true" style="width:204px">
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
				<input name="chasis" class="easyui-textbox" disabled="true">

				<label>Tarjeta Operación:</label>
				<input name="tarjetaoperacion" class="easyui-textbox" disabled="true">
			</div>

			<div class="fitem">
				<label>Propietario:</label>
				<input name="propietario" class="easyui-textbox" disabled="true">
			</div>
			<br>

			<div class="ftitle">DOCUMENTOS</div>
			<div class="ftitle2">TARJETA DE OPERACION</div>
			<div class="fitem">
				<label>Inicio:</label>
				<input id="iniciotarjetaoperacion" name="iniciotarjetaoperacion" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">

				<label>Fin:</label>
				<input id="fintarjetaoperacion" name="fintarjetaoperacion" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">
			</div>
			<br>
			<div class="ftitle2">SOAT</div>
			<div class="fitem">
				<label>Inicio:</label>
				<input id="iniciosoat" name="iniciosoat" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">

				<label>Fin:</label>
				<input id="finsoat" name="finsoat" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">
			</div>
			<br>
			<div class="ftitle2">TÉCNICO MECÁNICA</div>
			<div class="fitem">
				<label>Inicio:</label>
				<input id="iniciotecmecanica" name="iniciotecmecanica" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">

				<label>Fin:</label>
				<input id="fintecmecanica" name="fintecmecanica" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">
			</div>
			<br>
			<div class="ftitle2">PÓLIZA CONTRACTUAL</div>
			<div class="fitem">
				<label>Inicio:</label>
				<input id="iniciopolizacontrac" name="iniciopolizacontrac" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">

				<label>Fin:</label>
				<input id="finpolizacontrac" name="finpolizacontrac" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">
			</div>
			<br>
			<div class="ftitle2">PÓLIZA EXTRACONTRACTUAL</div>
			<div class="fitem">
				<label>Inicio:</label>
				<input id="iniciopolizaextra" name="iniciopolizaextra" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">

				<label>Fin:</label>
				<input id="finpolizaextra" name="finpolizaextra" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">
			</div>
			<br>
			<div class="ftitle2">REVISIÓN PREVENTIVA</div>
			<div class="fitem">
				<label>Inicio:</label>
				<input id="iniciopreventiva" name="iniciopreventiva" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">

				<label>Fin:</label>
				<input id="finpreventiva" name="finpreventiva" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser">
			</div>
			<br>
			<div class="ftitle">ESTADO</div>

			<div class="fitem">
				<label>Estado:</label>
				<select id="estado" name="estado" disabled="true" class="easyui-combobox" style="width:204px">
					<option></option>
				    <option value="ACTIVO">ACTIVO</option>
				    <option value="INACTIVO">INACTIVO</option>
				</select>
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cerrar</a>
	</div>

	<script type="text/javascript">
		var url;
		
		function verVehiculo(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Visualizar VEHICULO');
				$('#fm').form('load',row);
				url = 'json/extracto_update.php?id='+row.id;
			}
			else{
				$.messager.confirm('Alerta','Debe seleccionar un vehiculo para ver la informacion.')
			}
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
	</script>

	<style type="text/css">
		.hc {
			background: #92D050;				
		}
		.botonera {		
			background:#D8D8D8;
			margin-top:1px;
			margin-bottom:1px;
			width:100%;
			height:47px;	

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