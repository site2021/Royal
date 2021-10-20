<?
session_start();
$usuario = $_SESSION['usuario'];

include '../../control/conex.php';

$sqlc = mysqli_query($conexion, "SELECT ciudad, nombre, costos  FROM tbusuarios WHERE usuario='$usuario'");
$rowc = mysqli_fetch_row($sqlc);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Contratos Digitales</title>
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

	<div class="botonera">
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnNewVehiculo" name="btnNewVehiculo" class="boton" onclick="newContraDigital()">
	         		<img src="icons/Plus.png" >
	         	</a>
	         	<span class="tooltiptext">Nuevo Contrato Digital</span>
	        </div>

	        <div class="tdiv">
	         	<a id="btnEditVehiculo" name="btnEditVehiculo" class="boton" onclick="editContraDigital()">
	         		<img src="icons/Write.png" >
	         	</a>
	         	<span class="tooltiptext">Editar Contrato Digital</span>
	        </div>

	        <div class="tdiv">
	         	<a id="btnDestroyVehiculo" name="btnDestroyVehiculo" class="boton" onclick="destroyContraDigital()">
	         		<img src="icons/Trash.png" >
	         	</a>
	         	<span class="tooltiptext">Eliminar Contrato Digital</span>
	        </div>

	        <div class="tdiv">
	         	<a id="btnDestroyVehiculo" name="btnDestroyVehiculo" class="boton" onclick="contratoPDF()">
	         		<img src="icons/Document.png" >
	         	</a>
	         	<span class="tooltiptext">Imprimir Contrato Digital</span>
	        </div>
	    </div>
	</div>

	<table id="dg" title=" CONTRATOS DIGITALES " class="easyui-datagrid" style="width:100%;height:450px;margin-top:50px;"
			url="json/contradigital_get.php"
			toolbar="#toolbar"
			headerCls="hc"
			rownumbers="true" fitColumns="false" singleSelect="true">
		<thead>
			<tr>
				<th field="cliente" width="436">Cliente</th>
				<th field="nit" width="142">NIT/CC</th>
				<th field="objetocontrato" width="436">Objeto Contrato</th>
				<th field="iniciocontrato" width="130">Fecha Inicio</th>
				<th field="fincontrato" width="130">Fecha Fin</th>
			</tr>
		</thead>
	</table>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:800px;height:490px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>

			<div style="display:none">
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

				<div class="fitem">
					<label>Ciudad:</label>
					<input name="ciudadcliente" class="easyui-textbox">
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

			<div class="ftitle">INFORMACIÓN SERVICIO</div>
				<div class="fitem">
					<label>Ciudad Salida:</label>
					<input id="ciudadsalida" name="ciudadsalida" class="easyui-textbox">
				</div>

				<div class="fitem">
					<label>Recorrido:</label>
					<input name="recorrido" class="easyui-textbox" multiline="true" style="width: 510px; height: 66px">
				</div>

			<div class="ftitle">INFORMACIÓN VEHÍCULO</div>
				<div class="fitem">
					<label>Interno:</label>
					<input name="internoveh" class="easyui-textbox">

					<label>Placa:</label>
					<input id="placaveh" name="placaveh" class="easyui-textbox">
				</div>
				
				<div class="fitem">
					<label>Clase:</label>
					<select id="claseveh" name="claseveh" class="easyui-combobox" style="width:204px">
						<option></option>
					    <option value="BUS">BUS</option>
					    <option value="BUSETA">BUSETA</option>
					    <option value="MICROBUS">MICROBUS</option>
					    <option value="DUSTER">DUSTER</option>
					</select>
				</div>

			<div class="ftitle">VALOR SERVICIO</div>
				<div class="fitem">
					<label>Valor:</label>
					<input id="valorservicio" name="valorservicio" class="easyui-numberbox" data-options="precision:0,groupSeparator:','">

					<label>Forma Pago:</label>
						<select id="formapago" name="formapago" class="easyui-combobox" style="width:203px">
						<option></option>
					    <option value="CREDITO" style="color: blue;">CRÉDITO</option>
					    <option value="CONTADO">CONTADO</option>
					</select>
				</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="aprobarContrato()" style="width:90px">Aprobar</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveContraDigital()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
	</div>



	<!-------------------------- CONTRATO PARA EXTRACTO ----------------------->
	<div id="dlgContrato" class="easyui-dialog" data-options="modal:true" style="width:800px;height:490px;padding:10px 20px" closed="true" buttons="#dlg-buttons-contrato">
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
			</div>
			</div>	
			</div>
		</form>
	</div>
	<div id="dlg-buttons-contrato">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveContrato()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgContrato').dialog('close')" style="width:90px">Cancelar</a>
	</div>


	<script type="text/javascript">
		var url;
		function newContraDigital(){
			$('#dlg').dialog('open').dialog('setTitle','Nuevo Contrato Digital');
			$('#fm').form('clear');
			// VALORES PREDETERMINADOS
			
			setVar('iniciocontrato',0,'0000-00-00');
			setVar('fincontrato',0,'0000-00-00');
			setVar('valorservicio',0,'0');

			url = 'json/contradigital_save.php';
			// maxRegistro();
		}

		var url;
		function aprobarContrato(){
			var xcontra = $("#contrato").textbox('getValue');
			if (xcontra |='') {
				maxRegistro();
				// var xcontra = $("#contrato").textbox('getValue');
				url = 'json/contrato_save.php';
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
							$.messager.alert('Confirmación','Contrato guardado exitosamente, el número de contrato es: ' + xcontra);
							$('#dlg').dialog('close');		// close the dialog
						}
					}
				});
			}
			else{
				$.messager.alert('Recuerde','Debe guardar el contrato digital');
			}
		}
		function editContraDigital(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar CONTRATO DIGITAL');
				$('#fm').form('load',row);
				url = 'json/contradigital_update.php?id='+row.id;
				maxRegistro();
			}
		}
		function saveContraDigital(){
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
		function destroyContraDigital(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el contrato digital de: ' + row.cliente,function(r){
					if (r){
						$.post('json/contradigital_destroy.php',{id:row.id},function(result){
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
	</script>

	<script type="text/javascript">
		//DATOS DEL CLIENTE
		$("#cliente").combobox({
 			onSelect: function(){
 				traerDatos();
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
						// alert(xmax);
						$("#contrato").textbox("setValue",xmax);
					}
					else{
						$.messager.alert('Mensaje','error Insertar tbcontratos');
					}
				}, 
			'json');
		}

		function contratoPDF(){

			var xreg = $("#dg").datagrid('getSelected');

			var xiniciocontrato = xreg['iniciocontrato'];
			var xfincontrato = xreg['fincontrato'];
			var xnit = xreg['nit'];
			// var xfechafin = xreg['fechafin'];
			// var xfecha2019 = '2020-01-01';
			// alert(xextracto);

			var params  = 'width='+screen.width;
    		params += ', height='+screen.height;
    		params += ', top=0, left=0'
    		params += ', fullscreen=yes';

    		window.open ("contratoPDF.php?iniciocontrato="+xiniciocontrato+"&fincontrato="+xfincontrato+"&nit="+xnit , params);
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