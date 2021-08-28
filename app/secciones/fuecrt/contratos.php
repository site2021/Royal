<?

$usuario = $_GET['usuario'];

include '../../control/conex.php';

$sqlc = mysqli_query($conexion, "SELECT ciudad, nombre, costos  FROM tbusuarios WHERE usuario='$usuario'");
$rowc = mysqli_fetch_row($sqlc);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Contratos</title>
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
	<script type="text/javascript">
		$(function(){
			$("#dg").datagrid('enableFilter');			
		})
	</script>

	<!-- Busqueda x Contenido /////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$.fn.combobox.defaults.filter = function(q,row){
		      var opts = $(this).combobox('options');
		      return row[opts.textField].toUpperCase().indexOf(q.toUpperCase()) >= 0;
		};
	</script>

</head>
<body>
	<div style="display:none">
		<input id="xcodi" name="xcodi" class="textbox" value="<? echo $usuario; ?>">
	</div>

	<div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newContrato()">Nuevo Contrato</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editContrato()">Editar</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyContrato()">Remover</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-page" plain="true" onclick="newDocumentos()">Añadir Documentos</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="newExtracto()" style="float: right;">Nuevo Extracto</a>
	</div>

	<table id="dg" title=" CONTRATOS " class="easyui-datagrid" style="width:80%;height:auto"
			url="json/contratos_get.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="contrato" width="1">contrato</th>
				<th field="cliente" width="6">cliente</th>
				<th field="iniciocontrato" width="2">fecha inicio</th>
				<th field="fincontrato" width="2">fecha fin</th>
			</tr>
		</thead>
	</table>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:800px;height:490px;padding:10px 20px" closed="true" buttons="#dlg-buttons">

		<form id="fm" method="post" novalidate>

			<div class="fitem">
				<label >N° Contrato:</label>
				<input id="contrato" name="contrato" class="easyui-textbox">
			</div>
			<div class="fitem">
				<label>Objeto Contrato:</label>
				<select id="objetocontrato" name="objetocontrato" class="easyui-combobox" style="width:530px">
					<option></option>
				    <option value="CONTRATO PARA TRANSPORTE DE ESTUDIANTES" style="color: blue;">CONTRATO PARA TRANSPORTE DE ESTUDIANTES</option>
				    <option value="CONTRATO PARA TRANSPORTE EMPRESARIAL">CONTRATO PARA TRANSPORTE EMPRESARIAL</option>
				    <option value="CONTRATO PARA TRANSPORTE DE TURISTAS">CONTRATO PARA TRANSPORTE DE TURISTAS</option>
				    <option value="CONTRATO PARA UN GRUPO ESPECIFICO DE USUARIOS (TRANSPORTE DE PARTICULARES)">CONTRATO PARA UN GRUPO ESPECIFICO DE USUARIOS (TRANSPORTE DE PARTICULARES)</option>
				    <option value="CONTRATO PARA EL TRANSPORTE DE USUARIOS DEL SERVICIO DE SALUD">CONTRATO PARA EL TRANSPORTE DE USUARIOS DEL SERVICIO DE SALUD</option>
				</select>
			</div>

			<div class="fitem">
				<label>Fecha Inicio:</label>
				<input id="iniciocontrato" name="iniciocontrato" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label>Fecha Fin:</label>
				<input id="fincontrato" name="fincontrato" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>
			<br>

			<div class="ftitle">INFORMACIÓN CLIENTE</div>
			<div class="fitem">
				<label>Cliente:</label>
				<input id="cliente" name="cliente" class="easyui-combobox" 
				   url="json/comboclientes.php" style="width:214px"
				   data-options="disabled:false,editable:true,valueField:'contacto',textField:'contacto'">

				<label>NIT/CC:</label>
				<input name="nit" class="easyui-textbox">
			</div>

			<div class="ftitle">INFORMACIÓN RESPONSABLE</div>
			<div class="fitem">
				<label>Responsable:</label>
				<input id="responsable" name="responsable" class="easyui-textbox">

				<label>N° Documento:</label>
				<input name="cedularesponsable" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Direccion</label>
				<input name="direccion" class="easyui-textbox">

				<label>Telefono</label>
				<input name="telefono" class="easyui-numberbox">
			</div>

			<div class="ftitle">VALOR SERVICIO</div>
			<div class="fitem">
				<label>Valor:</label>
				<input id="valorservicio" name="valorservicio" class="easyui-numberbox" data-options="precision:0,groupSeparator:','">
			</div>
		</form>

		<!-- POSIBLES VEHICULOS PARA EL CONTRATO -->
		<form id="frmRodamientoPlan">
			<table>
				<tr>
					<div class="ftitle">POSIBLES VEHICULOS</div>
					<div class="fitem">
						<label>Interno</label>
						<input id="internovehroda" name="internovehroda" class="easyui-combobox" url="json/combointernos.php" data-options="disabled:false,editable:true,valueField:'interno',textField:'interno'"style="width: 80px">

						<label>Placa</label>
						<input id="placavehroda" name="placavehroda" class="easyui-combobox" url="json/comboplacas.php" data-options="disabled:false,editable:true,valueField:'placa',textField:'placa'"style="width: 90px">

						<label>Clase</label>
						<input id="clasevehroda" name="clasevehroda" class="easyui-textbox" style="width: 90px">

						<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-cancel" onclick="limpiarLineaVehRoda()"></a>

						<a id="btnGrabarLinea" name="btnGrabarLinea" class="easyui-linkbutton"  iconCls="icon-save" onclick="grabarLinea()"></a>

						<a id="btnEliminarLinea" name="btnEliminarLinea" class="easyui-linkbutton"  iconCls="icon-remove" onclick="borrarRodamientoPlan()"></a>

						<td colspan=4>
							<div style="display:none">
								<input id="rid" name="rid" class="easyui-textbox"style="width:40px" data-options="">
							</div>
						</td>
					</div>					
				</tr>
        	</table>
        </form>

        <table id="dgRodamientoPlan" class="easyui-datagrid" style="width:100%;height:300px"
		url="json/rodaplaneado_get.php" singleSelect="true" headerCls="" pagination="false" showFooter="true"
			rownumbers="true">

			<thead>
				<tr>
					<th field="contrato", width="100">Contrato</th>
					<th field="iniciocontrato", width="150">Inicio</th>
					<th field="fincontrato", width="150">Fin</th>
					<th field="placavehroda", width="130">Placa</th>
					<th field="clasevehroda", width="185">Clase</th>
				</tr>
			</thead>
		</table>
		<!-- FIN POSIBLES VEHICULOS PARA EL CONTRATO -->
	</div>

	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveContrato()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<div id="dlgExtracto" class="easyui-dialog" data-options="modal:true" style="width:750px;height:540px;padding:10px 20px" closed="true" buttons="#dlg-buttons-extracto">
		<form id="fmExtracto" method="post" novalidate>

			<div class="ftitle">N° EXTRACTO</div>
			<div class="fitem">
				<label >Extracto:</label>
				<input id="extracto" name="extracto" class="easyui-textbox">

				<label >N° Contrato:</label>
				<input id="ncontrato" name="contrato" class="easyui-textbox" style="width: 50px;">
			</div>
			<br>

			<div class="ftitle">INFORMACIÓN VEHÍCULO</div>
			<div class="fitem">
				<label >Interno:</label>
				<input id="interno" name="interno" class="easyui-combobox" 
					url="json/combointernos.php" style="width:215px"
					data-options="disabled:false,editable:true,valueField:'interno',textField:'interno'">

				<label >Placa:</label>
				<input id="placa" name="placa" class="easyui-combobox" 
					url="json/comboplacas.php" style="width:204px"
					data-options="valueField:'placa',textField:'placa'">
			</div>

			<div class="fitem">
				<label >Marca:</label>
				<input id="marca" name="marca" class="easyui-textbox" editable="false">

				<label >Clase:</label>
				<input id="clase" name="clase" class="easyui-textbox" editable="false">
			</div>

			<div class="fitem">
				<label >Modelo:</label>
				<input id="modelo" name="modelo" class="easyui-textbox">

				<label >Tarjeta Operación:</label>
				<input id="tarjetaoperacion" name="tarjetaoperacion" class="easyui-textbox">
			</div>
			<br>

			<div class="ftitle">DOCUMENTOS</div>
			<label style="margin-left: 180px;font-size: 14px">INICIO</label>
			<label style="margin-left: 290px;font-size: 14px">FIN</label>
			<div class="fitem">
				<label>Soat:</label>
				<input id="iniciosoat" name="iniciosoat" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="finsoat" name="finsoat" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>

			<div class="fitem">
				<label>Tecnico Mecanica:</label>
				<input id="iniciotecmecanica" name="iniciotecmecanica" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="fintecmecanica" name="fintecmecanica" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>

			<div class="fitem">
				<label>Tarjeta Operacion:</label>
				<input id="iniciotarjetaoperacion" name="iniciotarjetaoperacion" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="fintarjetaoperacion" name="fintarjetaoperacion" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>

			<div class="fitem">
				<label>Poliza Contractual:</label>
				<input id="iniciopolizacontrac" name="iniciopolizacontrac" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="finpolizacontrac" name="finpolizacontrac" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>
			
			<div class="fitem">
				<label>Poliza Extracontrac:</label>
				<input id="iniciopolizaextra" name="iniciopolizaextra" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="finpolizaextra" name="finpolizaextra" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>
			
			<div class="fitem">
				<label>Preventiva:</label>
				<input id="iniciopreventiva" name="iniciopreventiva" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="finpreventiva" name="finpreventiva" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>
			<br>

			<div class="ftitle">MANTENIMIENTO</div>
			<div class="fitem">
				<label>Mantenimiento:</label>
				<input id="iniciomantenimiento" name="iniciomantenimiento" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="finmantenimiento" name="finmantenimiento" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>
			<br>

			<div class="ftitle">INFORMACIÓN CLIENTE</div>
			<div class="fitem">
				<label>NIT/CC:</label>
				<input name="nit" class="easyui-textbox">

				<label>Cliente</label>
				<input name="cliente" class="easyui-textbox">
			</div>
			<br>

			<div class="ftitle">INFORMACIÓN RESPONSABLE</div>
			<div class="fitem">
				<label>Responsable:</label>
				<input name="responsable" class="easyui-textbox">

				<label>Cedula</label>
				<input id="cedularesponsablee" name="cedularesponsable" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Direccion</label>
				<input name="direccion" class="easyui-textbox">

				<label>Telefono</label>
				<input name="telefono" class="easyui-textbox">
			</div>
			<br>

			<div class="ftitle">INFORMACIÓN GENERAL</div>
			<div class="fitem">
				<label>Modalidad</label>
				<select id="modalidad" name="modalidad" class="easyui-combobox" style="width:214px">
					<option></option>
				    <option value="CONSORCIO"></option>
				    <option value="CONVENIO">CONVENIO</option>
				    <option value="PASAPORTE">PASAPORTE</option>
				    <option value="UNION TEMPORAL">UNION TEMPORAL</option>
				</select>

				<label>Con:</label>
				<input id="empresaafiliadora" name="empresaafiliadora" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Fecha Inicio:</label>
				<input id="fechainicio" name="fechainicio" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label>Fecha Fin:</label>
				<input id="fechafin" name="fechafin" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>

			<div class="fitem">
				<label>Origen:</label>
				<input id="origen" name="origen" class="easyui-combobox" 
					url="json/comboorigen.php" style="width:215px"
					data-options="disabled:false,editable:true,valueField:'origen',textField:'origen'">

				<label>Destino:</label>
				<input id="destino" name="destino" class="easyui-combobox" 
					url="json/combodestino.php" style="width:215px"
					data-options="disabled:false,editable:true,valueField:'destino',textField:'destino'">
			</div>

			<!-- <div class="fitem">
				<label>Recorrido</label>
				<input name="recorrido" class="easyui-textbox" multiline="true" style="width: 530px; height: 66px">
			</div> -->

			<div class="fitem">
				<label>Objeto Contrato</label>
				<input name="objetocontrato" class="easyui-textbox" style="width: 530px">
			</div>
			<br>

			<div class="ftitle">INFORMACIÓN CONDUCTORES</div>
			<div class="fitem">
				<label>Conductor 1:</label>
				<input id="conductor1" name="conductor1" class="easyui-combobox" 
					url="json/comboconductores.php" style="width:160px"
					data-options="disabled:false,editable:true,valueField:'conductor',textField:'conductor'">

				<label>Cedula 1:</label>
				<input id="cedulaconductor1" name="cedulaconductor1" class="easyui-textbox" style="width: 90px">

				<label>Vigencia:</label>
				<input id="vigencialicencia1" name="vigencialicencia1" class="easyui-textbox" style="width: 74px">
			</div>

			<div class="fitem">
				<label>Conductor 2:</label>
				<input id="conductor2" name="conductor2" class="easyui-combobox" 
					url="json/comboconductores.php" style="width:160px"
					data-options="disabled:false,editable:true,valueField:'conductor',textField:'conductor'">

				<label>Cedula 2:</label>
				<input id="cedulaconductor2" name="cedulaconductor2" class="easyui-textbox" style="width: 90px">

				<label>Vigencia:</label>
				<input id="vigencialicencia2" name="vigencialicencia2" class="easyui-textbox" style="width: 74px">
			</div>

			<div class="fitem">
				<label>Conductor 3:</label>
				<input id="conductor3" name="conductor3" class="easyui-combobox" 
					url="json/comboconductores.php" style="width:160px"
					data-options="disabled:false,editable:true,valueField:'conductor',textField:'conductor'">

				<label>Cedula 3:</label>
				<input id="cedulaconductor3" name="cedulaconductor3" class="easyui-textbox" style="width: 90px">

				<label>Vigencia:</label>
				<input id="vigencialicencia3" name="vigencialicencia3" class="easyui-textbox" style="width: 74px">
			</div>

			<div class="ftitle">COBRO DE PLANILLAS</div>
			<div class="fitem">
				<label>Tipo:</label>
				<select id="tipoextracto" name="tipoextracto" class="easyui-combobox" style="width:205px">
					<option></option>
				    <option value="CONTRATO">CONTRATO</option>
				    <option value="FAMILIAR">FAMILIAR</option>
				</select>

				<label>Valor:</label>
				<input id="valorextracto" name="valorextracto" class="easyui-numberbox" data-options="precision:0,groupSeparator:','">
			</div>

			<div class="fitem">
				<label>Cobro:</label>
				<select id="cancelado" name="cancelado" class="easyui-combobox" style="width:205px">
					<option></option>
				    <option value="CANCELADO">CANCELADO</option>
				    <option value="DEBE">DEBE</option>
				</select>

				<label>Fecha:</label>
				<input id="fechacancelado" name="fechacancelado" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>

			<div class="fitem" style="display:none">
				<label>Usuario:</label>
				<input id="usuario" name="usuario" class="easyui-textbox">
			</div>

			<div class="ftitle">Valor Servicio Turístico (FONTUR)</div>
			<div class="fitem">
				<label>Valor:</label>
				<input id="valorservturis" name="valorservturis" class="easyui-numberbox" data-options="precision:0,groupSeparator:','">
			</div>

			<div class="fitem" style="display:none">
				<label>Fecha Realizado:</label>
				<input id="fecharealizado" name="fecharealizado" class="easyui-datetimebox" data-options="disabled:false,editable:true">
			</div>
		</form>
	</div>
	<div id="dlg-buttons-extracto">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveExtracto()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgExtracto').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<div id="dlgDocumentos" class="easyui-dialog" data-options="modal:true" style="width:800px;height:490px;padding:10px 20px" closed="true" buttons="#dlg-buttons-documentos">
		<form id="fmDocumentos" method="post" enctype="multipart/form-data">

			<div class="fitem" style="display:none">
				<label>Fecha Realizado:</label>
				<input id="fechasubimg" name="fechasubimg" class="easyui-datetimebox" data-options="disabled:false,editable:true">
			</div>

			<div class="fitem" style="display:none">
				<label>Usuario:</label>
				<input id="usuariosubimg" name="usuariosubimg" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label >N° Contrato:</label>
				<input id="contrato" name="contrato" class="easyui-textbox" data-options="editable:false">
			</div>

			<div class="fitem">
				<label >Imagen:</label>
				<input id="contratoimg" name="contratoimg" class="easyui-filebox">
			</div>

			<div class="fitem">
				<label >Nombre:</label>
				<input id="nombreimg" name="nombreimg" class="easyui-textbox" style="width: 290px">

				<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-cancel" onclick="limpiarLinea()"></a>

				<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-ok" onclick="saveDocumentos()"></a>
			</div>
			
		</form>
		<a id="btnBorrarLinea" name="btnBorrarLinea" class="easyui-linkbutton"  iconCls="icon-search" onclick="viewdo()" style="float: right;"></a>

		<table id="dgdetalle" class="easyui-datagrid" style="width:100%;height:300px"
			url="json/contratosimg_get.php" singleSelect="true" headerCls="" pagination="false" showFooter="true"
			rownumbers="true">

			<thead>
				<tr>
					<th field="contrato", width="150" >contrato</th>
					<!-- <th field="contratoimg", width="150" >contratoimg</th> -->
					<th field="tipocontrato", width="150" >tipocontrato</th>
					<th field="nombreimg", width="150">nombre img</th>
					<th field="fechasubimg", width="150">fecha/hora</th>
					<!-- <th field="nombreimg", width="30" iconCls="icon-cut">nombre img</th> -->

				</tr>
			</thead>
		</table>
	</div>
	<div id="dlg-buttons-documentos">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgDocumentos').dialog('close')" style="width:90px">Cerrar</a>
	</div>

	<script type="text/javascript">
		var url;
		function newContrato(){
			$('#dlg').dialog('open').dialog('setTitle','Nuevo Contrato');
			$('#fm').form('clear');
			// VALORES PREDETERMINADOS
			setVar('iniciocontrato',0,'0000-00-00');
			setVar('fincontrato',0,'0000-00-00');
			setVar('valorservicio',0,'0');
			mostrarDetalleRodPla();
			url = 'json/contrato_save.php';
			maxRegistro();
		}
		function editContrato(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar CONTRATO');
				$('#fm').form('load',row);
				mostrarDetalleRodPla();
				url = 'json/contrato_update.php?id='+row.id;
			}
		}
		function saveContrato(){
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
		function destroyContrato(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el contrato: ' + row.contrato,function(r){
					if (r){
						$.post('json/contrato_destroy.php',{id:row.id},function(result){
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
		var url;

		function sigExtracto(pcontrato){
			return 150;
		}

		function ponerCeros(pcontrato){
			var long = pcontrato.length;
			var ncontrato = '';

			ncontrato = '0'.repeat(4-long) + pcontrato;

			// alert("ncontrato="+ncontrato);

			// return ncontrato;

			// $.post('json/contrato_extracto_max.php',
			// 	{contrato:ncontrato},
			// 	function(result){
			// 		var reg = result.items;

			// 		var next = reg['siguiente'];

			// 		alert("next="+next);

			// 		return ncontrato;

			// 	},
			// 'json');

			$.post('json/contrato_extracto_max.php',
				{contrato:ncontrato},function(result){
				if (result.success){
					var next = result.next;
					if(next){
						// alert('ok');
					}else {
						// alert('si');
					}

					// adicionar ceros al nextr
					var nlong = next.length;
					var nnext = '0'.repeat(4-nlong) + next;

					// alert("next="+nnext);

					// ncontrato tiene YA los ceros
					setVar('ncontrato',0,ncontrato);
					setVar('extracto',0,nnext);

					// return ncontrato;
															
				}
			},'json');


		}

		function newExtracto(){			
			var row = $('#dg').datagrid('getSelected');

			var xcontrato = row['contrato'];
			var xfincontrato = getVar('fincontrato',2);

			if (row.fincontrato >= hoy()){

				$('#dlgExtracto').dialog('open').dialog('setTitle','Añadir EXTRACTO');
				$('#fmExtracto').form('load',row);

				var xusuario = $("#xcodi").val();
				setVar('usuario',0, xusuario);
				setVar('fecharealizado',0, hoyfechora());
				//VALORES PREDETERMINADOS
				setVar('fechainicio',0,'0000-00-00');
				setVar('fechafin',0,'0000-00-00');
				setVar('fechacancelado',0,'0000-00-00');
				// limpiar contenido de contrato/extracto
				setVar('ncontrato',0,'');
				setVar('extracto',0,'');

				// se quita el valor de retorno
				ponerCeros(xcontrato);

				url = 'json/extracto_save.php?id='+row.id;

			}
			else{
			 	$.messager.alert('Mensaje','Contrato Vencido');
			}
		}
		function saveExtracto(){
			$('#fmExtracto').form('submit',{
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
						var xextracto = getVar('extracto',0);
						var xcontrato = getVar('ncontrato',0);
						var xcedularesponsable = getVar('cedularesponsablee',0);

						// alert(xcedularesponsable);
						
						var params  = 'width='+screen.width;
						params += ', height='+screen.height;
						params += ', top=0, left=0'
						params += ', fullscreen=yes';

						window.open ("planilla2020.php?extracto="+xextracto+"&contrato="+xcontrato+"&cedularesponsable="+xcedularesponsable , params);

						// close the dialog
						$('#dlgExtracto').form('clear').dialog('close');
						$('#dg').datagrid('reload');	// reload the user data
						}
				}
			});
		}

		$(function(){
            $('#fechainicio').datebox().datebox('calendar').calendar({
                validator: function(date){
                    var now = new Date();
                    var d1 = new Date(now.getFullYear(), now.getMonth(), now.getDate());
                    return d1<=date;
                }
            });
        });

		$(function(){
            $('#fechafin').datebox().datebox('calendar').calendar({
                validator: function(date){
                    var now = new Date();
                    var xfinsoat = new Date($("#finsoat").datebox('getValue'));
                    var xfintecmecanica = new Date($("#fintecmecanica").datebox('getValue'));
                    var xfintarjetaoperacion = new Date($("#fintarjetaoperacion").datebox('getValue'));
                    var xfinpolizacontrac = new Date($("#finpolizacontrac").datebox('getValue'));
                    var xfinpolizaextra = new Date($("#finpolizaextra").datebox('getValue'));
                    var xfinpreventiva = new Date($("#finpreventiva").datebox('getValue'));
                    var xfinmantenimiento = new Date($("#finmantenimiento").datebox('getValue'));
                  
                    var d1 = new Date(now.getFullYear(), now.getMonth(), now.getDate());
                    var d2 = new Date(now.getFullYear(), now.getMonth(), now.getDate());

                    return d1<=date && date<=xfinsoat && date<=xfintecmecanica && date<=xfintarjetaoperacion && date<=xfinpolizacontrac && date<=xfinpolizaextra && date<=xfinpreventiva && date<=xfinmantenimiento;
                }
            });
        });

	</script>

	<script type="text/javascript">
		//DATOS DEL CLIENTE
		$("#cliente").combobox({
 			onSelect: function(){
 				traerDatos();
 			}
 		});
		//DATOS DEL VEHICULO
 		$("#interno").combobox({
 			onSelect: function(){
 				mostrarPlacas();
 				traerDatosInterno();
 				$('#placa').next().find('input').focus();

 				// traerDatosInterno();
 			}
 		});

 		$("#placa").combobox({
			onSelect: function(){
				traerDatosInterno();
			}
		})
 		// //DATOS DEL RECORRIDO
 		// $("#origen").combobox({
 		// 	onSelect: function(){
 		// 		traerDatosRecorrido();
 		// 		$('#destino').next().find('input').focus();
 		// 	}
 		// });
 		// $("#destino").combobox({
 		// 	onSelect: function(){
 		// 		traerDatosRecorrido();
 		// 	}
 		// });
 		$("#conductor1").combobox({
 			onSelect: function(){
 				traerDatosConductor1();
 			}
 		});
 		$("#conductor2").combobox({
 			onSelect: function(){
 				traerDatosConductor2();
 			}
 		});
 		$("#conductor3").combobox({
 			onSelect: function(){
 				traerDatosConductor3();
 			}
 		});

 		$("#objetocontrato").combobox({
 			onSelect: function(){
 				mensObjcontrato();
 			}
 		});
	</script>

	<script type="text/javascript">

		function traerDatos(xcliente){
			var xcliente = $("#cliente").combobox('getValue');

			if(xcliente!=''){
				$.getJSON('json/datosclientes.php?cliente='+xcliente,function(registros){
					if(registros.length == 0){
					}
					else{
						$.each(registros, function(i,registro){
							$("#fm").form('load', registro);
							$("#direccion").textbox('setValue', registro.direccion);
						});
					}
				});
			}
		}

		function mostrarPlacas(){
			var xinterno = $("#interno").combobox('getValue');

			var xurl = "json/comboplacas.php?interno="+xinterno;
			// traerDatosInterno();
			$("#placa").combobox({
				url:xurl,
			})			
		}

		function traerDatosInterno(xinterno){
			var xinterno = $("#interno").combobox('getValue');
			var xplaca = $("#placa").combobox('getValue');

			if(xinterno!='' && xplaca!=''){
				$.getJSON('json/datosinterno.php?interno='+xinterno+"&placa="+xplaca,function(registros){
					if(registros.length == 0){
						$.messager.alert("No existen datos");
					}
					else{
						$.each(registros, function(i,registro){
							$("#fmExtracto").form('load', registro);
							$("#modelo").textbox('setValue', registro.modelo);
						});
					}
				});
			}
			else if(xplaca==''){
				// $('#fm').form('clear');
				setVar('marca',0,'');
				setVar('clase',0,'');
				setVar('modelo',0,'');
				setVar('tarjetaoperacion',0,'');
				setVar('iniciosoat',0,'');
				setVar('finsoat',0,'');
				setVar('iniciotecmecanica',0,'');
				setVar('fintecmecanica',0,'');
				setVar('iniciotarjetaoperacion',0,'');
				setVar('fintarjetaoperacion',0,'');
				setVar('iniciopolizacontrac',0,'');
				setVar('finpolizacontrac',0,'');
				setVar('iniciopolizaextra',0,'');
				setVar('finpolizaextra',0,'');
				setVar('iniciopreventiva',0,'');
				setVar('finpreventiva',0,'');
				setVar('iniciomantenimiento',0,'');
				setVar('finmantenimiento',0,'');
			}
		}

		function traerDatosRecorrido(xorigen, xdestino){
			var xorigen = $("#origen").combobox('getValue');	
			var xdestino = $("#destino").combobox('getValue');

			if(xorigen!='' && xdestino!=''){
				$.getJSON('json/datosrecorrido.php?origen='+xorigen+"&destino="+xdestino,function(registros){
					if(registros.length == 0){
						$.messager.alert("No existen datos");
					}
					else{
						$.each(registros, function(i,registro){
							$("#fmExtracto").form('load', registro);
							$("#recorrido").textbox('setValue', registro.recorrido);
						});
					}
				});
			}
		}

		function traerDatosConductor1(xconductor1){
			var xconductor1 = $("#conductor1").combobox('getValue');

			if(xconductor1!=''){
				$.getJSON('json/datosconductor.php?conductor='+xconductor1,function(registros){
					if(registros.length == 0){
						$.messager.alert("No existen datos");
					}
					else{
						$.each(registros, function(i,registro){
							$("#fmExtracto").form('load', registro);
							$("#cedulaconductor1").textbox('setValue', registro.cedulaconductor);
							$("#vigencialicencia1").textbox('setValue', registro.vigencialicencia);
						});
					}
				});
			}
		}

		function traerDatosConductor2(xconductor2){
			var xconductor2 = $("#conductor2").combobox('getValue');

			if(xconductor2!=''){
				$.getJSON('json/datosconductor.php?conductor='+xconductor2,function(registros){
					if(registros.length == 0){
						$.messager.alert("No existen datos");
					}
					else{
						$.each(registros, function(i,registro){
							$("#fmExtracto").form('load', registro);
							$("#cedulaconductor2").textbox('setValue', registro.cedulaconductor);
							$("#vigencialicencia2").textbox('setValue', registro.vigencialicencia);
						});
					}
				});
			}
		}

		function traerDatosConductor3(xconductor3){
			var xconductor3 = $("#conductor3").combobox('getValue');	

			if(xconductor3!=''){
				$.getJSON('json/datosconductor.php?conductor='+xconductor3,function(registros){
					if(registros.length == 0){
						$.messager.alert("No existen datos");
					}
					else{
						$.each(registros, function(i,registro){
							$("#fmExtracto").form('load', registro);
							$("#cedulaconductor3").textbox('setValue', registro.cedulaconductor);
							$("#vigencialicencia3").textbox('setValue', registro.vigencialicencia);
						});
					}
				});
			}
		}

		function mensObjcontrato(xobjetocontrato){
			var xobjetocontrato = $("#objetocontrato").combobox('getValue');	

			if(xobjetocontrato=='CONTRATO PARA TRANSPORTE DE ESTUDIANTES'){
				$.messager.alert('Recuerde','Transporte de sus estudiantes entre el lugar de residencia y el establecimiento educativo u otros destinos que se requieran en razón de las actividades programadas por el plantel educativo.');
			}
			else if(xobjetocontrato == 'CONTRATO PARA TRANSPORTE EMPRESARIAL'){
				$.messager.alert('Recuerde','Transporte de los funcionarios desde el lugar de residencia hasta el lugar donde realizan la labor.');
			}
			else if(xobjetocontrato == 'CONTRATO PARA TRANSPORTE DE TURISTAS'){
				$.messager.alert('Recuerde','Suscrito entre el prestador de servicios turísticos con una empresa de transporte, cuyo objeto sea el transporte de turistas.');
			}
			else if(xobjetocontrato == 'CONTRATO PARA UN GRUPO ESPECIFICO DE USUARIOS (TRANSPORTE DE PARTICULARES)'){
				$.messager.alert('Recuerde','Entre un representante de un grupo específico con la empresa de transporte para llevar de un punto A a un punto B. El traslado puede tener origen y destino en un mismo municipio, siempre y cuando se realice en vehículos de más de 9 pasajeros');
			}
			else if(xobjetocontrato == 'CONTRATO PARA EL TRANSPORTE DE USUARIOS DEL SERVICIO DE SALUD'){
				$.messager.alert('Recuerde','Entre las entidades de salud o las personas jurídicas que demandan la necesidad de transporte para atender un servicio de salud para sus usuarios con la empresa de transporte.  Con el objeto de efectuar el traslado de los usuarios de los servicios de salud, que por su condición o estado no requieran de una ambulancia.');
			}
		}

		function maxRegistro(){
			$.post('json/reg_maximo.php', 
				{}, 
				function(result){
					if(result.success){
						// var xmax = result.rmaximo;
						var xmax = parseInt(result.rmaximo) + 1;
						$("#contrato").textbox("setValue",xmax);
					}
					else{
						$.messager.alert('Mensaje','error Insertar tbcontratos');
					}
				}, 
			'json');
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
				url = 'json/linea_tabla.php';

				alert(row.contrato);

				var xcontrato = (row.contrato);
				setVar('fechasubimg',0, hoyfechora());
				var xusuario = $("#xcodi").val();
				setVar('usuariosubimg',0, xusuario);
				alert(xcontrato);			
			
				$("#dgdetalle").datagrid('load',{
					contrato:xcontrato				
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
			
				var params  = 'width='+screen.width;
				params += ', height='+screen.height;
				params += ', top=0, left=0'
				params += ', fullscreen=yes';

				alert(xid);

				window.open("json/document_view.php?id="+xid, params);
			
		}
		// var xreg = $("#dg").datagrid('getSelected');

		// 	var xextracto = xreg['extracto'];
		// 	var xcontrato = xreg['contrato'];
		// 	var xcedularesponsable = xreg['cedularesponsable'];
		// 	var xfechafin = xreg['fechafin'];
		// 	var xfecha2019 = '2020-01-01';
		// 	// alert(xextracto);

		// 	var params  = 'width='+screen.width;
  //   		params += ', height='+screen.height;
  //   		params += ', top=0, left=0'
  //   		params += ', fullscreen=yes';

  //   		if(pcual==1 && xfechafin < xfecha2019){
  //   			window.open ("planilla.php?extracto="+xextracto+"&contrato="+xcontrato+"&cedularesponsable="+xcedularesponsable , params);
		function limpiarLinea(){
			setVar('contratoimg',0,'');
			setVar('nombreimg',0,'');

		}
	</script>
	<!-- POSIBLES VEHICULOS EN EL CONTRATO -->
	<script type="text/javascript">
		function limpiarLineaVehRoda(){
			setVar('internovehroda',0,'');
			setVar('placavehroda',0,'');
			setVar('clasevehroda',0,'');
		}

		//DATOS DEL VEHICULO
 		$("#internovehroda").combobox({
 			onSelect: function(){
 				mostrarPlacasRoda();
 				traerDatosInternoRoda();
 				$('#placavehroda').next().find('input').focus();

 				// traerDatosInterno();
 			}
 		});

 		$("#placavehroda").combobox({
			onSelect: function(){
				traerDatosInternoRoda();
			}
		})

		function mostrarPlacasRoda(){
			var xinternovehroda = $("#internovehroda").combobox('getValue');

			var xurl = "json/comboplacas.php?interno="+xinternovehroda;
			// traerDatosInterno();
			$("#placavehroda").combobox({
				url:xurl,
			})			
		}

		function traerDatosInternoRoda(xinternovehroda){
			var xinternovehroda = $("#internovehroda").combobox('getValue');
			var xplacavehroda = $("#placavehroda").combobox('getValue');

			if(xinternovehroda!='' && xplacavehroda!=''){
				$.getJSON('json/datosinterno.php?interno='+xinternovehroda+"&placa="+xplacavehroda,function(registros){
					if(registros.length == 0){
						$.messager.alert("No existen datos");
					}
					else{
						$.each(registros, function(i,registro){
							// $("#fmExtracto").form('load', registro);
							$("#clasevehroda").textbox('setValue', registro.clase);
						});
					}
				});
			}
			else if(xplacavehroda==''){
				// $('#fm').form('clear');
				setVar('clase',0,'');
			}
		}

		function grabarLinea(){

			var xinternovehroda = $("#internovehroda").textbox('getValue');
			var xplacavehroda = $("#placavehroda").textbox('getValue');
			var xclasevehroda = $("#clasevehroda").textbox('getValue');
			var xcontrato = $("#contrato").textbox('getValue');
			var xiniciocontrato = $("#iniciocontrato").datebox('getValue');
			var xfincontrato = $("#fincontrato").datebox('getValue');
			
			$.post('json/rodaplaneado_save.php', 
				{internovehroda:xinternovehroda, placavehroda:xplacavehroda, clasevehroda:xclasevehroda, contrato:xcontrato, iniciocontrato:xiniciocontrato, fincontrato:xfincontrato },
				function(result){
				if (result.success){
					//$.messager.alert('Mensaje', 'registro grabado exitosamente!!!');
					// $("#destino").textbox('setValue',xdestino);
					mostrarDetalleRodPla();
					limpiarLineaRodPla();

				} else {
					$.messager.alert('Mensaje', 'problemas!!! - grabarLinea');

				}
			},'json'); 
		}

		function borrarRodamientoPlan(){			
			var xlineaRodaPlan = $("#dgRodamientoPlan").datagrid('getSelected');
				$.messager.confirm('Confirm','Esta seguro de borrar LINEA??? ' ,function(r){
					if (r){									
						var xid = xlineaRodaPlan['id'];

						$.post('json/rodaplaneado_destroy.php', 
							{id:xid},
							function(result){
							if (result.success){
								mostrarDetalleRodPla();
								limpiarLineaRodPla();

							} else {
								$.messager.alert('Mensaje', 'problemas!!! - borrarLineaDetalle');

							}
						},'json'); 
						
					}	
				});	
			
		}

		function mostrarDetalleRodPla(){
			var xcontrato = $("#contrato").val();			
			
			$("#dgRodamientoPlan").datagrid('load',{
				contrato:xcontrato				
			})
		}

		function limpiarLineaRodPla(){
			$("#frmRodamientoPlan").form('clear');

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
		function hoy(){
			var xhoy = new Date();
			var y = xhoy.getFullYear();
			var m = xhoy.getMonth()+1;
			var d = xhoy.getDate();
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
		}

		function hoyfechora(){
			var xhoy = new Date();
			var y = xhoy.getFullYear();
			var m = xhoy.getMonth()+1;
			var d = xhoy.getDate();
			var h = xhoy.getHours();
			var mi = xhoy.getMinutes();
			var se = xhoy.getSeconds();
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d)+' '+h+':'+mi+':'+se;  
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
			width:210px;

		}
		.botonera {
			background:#D8D8D8;
			margin-top:1px;
			margin-bottom:1px;
			width:100%;
			height:47px;	
		}
	</style>
</body>
</html>