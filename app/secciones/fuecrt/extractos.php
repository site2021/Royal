<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administracion-Extractos</title>
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

</head>
<body>
	<div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editExtracto()">Editar</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyExtracto()">Remover</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="planillaPDF()">Planilla Royal Tour</a>
	<!-- 	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="planillaPDF(2)">Planilla Royal Tour</a> -->
		<!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="planillaPDF(3)">ANULADO</a> -->
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-excel" plain="true" onclick="printExtractos()">Extractos</a>

		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-page" plain="true" onclick="printCaja()">Arqueo de Caja</a>

		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-excel" plain="true" onclick="printFontur()">FONTUR</a>
		<!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="planillaPDF(3)" style="margin-left: 400px">Contrato Royal Express</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="" style="margin-left: 20px">Contrato Royal Tour</a> -->
	</div>

	<table id="dg" title=" EXTRACTOS " class="easyui-datagrid" style="width:80%;height:auto"
			url="json/extractos_get.php" headerCls="hc"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="extracto" width="0">Extracto</th>
				<th field="contrato" width="0">Contrato</th>
				<th field="cliente" width="10">Cliente</th>
				<th field="placa" width="0">Vehículo</th>
				<th field="fechainicio" width="3">Fecha Inicio</th>				
				<th field="fechafin" width="3">Fecha Fin</th>
				<th field="cancelado" width="4">Cancelado</th>
				<th field="fechacancelado" width="4">Fecha Pago</th>
				<th field="usuario" width="4">Usuario</th>
			</tr>
		</thead>
	</table>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:780px;height:240px;padding:10px 20px" closed="true" buttons="#dlg-buttons">

		<form id="fm" method="post" novalidate>
		<!-- <div class="ftitle">N° EXTRACTO</div>
			<div class="fitem">
				<label >Extracto:</label>
				<input name="extracto" class="easyui-textbox">

				<label >N° Contrato:</label>
				<input name="contrato" class="easyui-textbox" style="width: 50px;">
			</div>
			<br> -->

			<!-- <div class="ftitle">INFORMACIÓN VEHÍCULO</div>
			<div class="fitem">
				<label >Interno:</label>
				<input id="interno" name="interno" class="easyui-combobox" 
					url="json/combointernos.php" style="width:205px"
					data-options="disabled:false,editable:true,valueField:'interno',textField:'interno'">

				<label >Modelo:</label>
				<input name="modelo" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label >Marca:</label>
				<input name="marca" class="easyui-textbox" editable="false">

				<label >Clase:</label>
				<input name="clase" class="easyui-textbox" editable="false">
			</div>

			<div class="fitem">
				<label >Placa:</label>
				<input name="placa" class="easyui-textbox" editable="false">

				<label >Tarjeta OP:</label>
				<input name="tarjetaoperacion" class="easyui-textbox" editable="false">
			</div>
			<br>

			<div class="ftitle">DOCUMENTOS</div>
			<label style="margin-left: 180px;font-size: 14px">INICIO</label>
			<label style="margin-left: 290px;font-size: 14px">FIN</label>
			<div class="fitem">
				<label>Soat:</label>
				<input name="iniciosoat" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="finsoat" name="finsoat" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>

			<div class="fitem">
				<label>Tecnico Mecanica:</label>
				<input name="iniciotecmecanica" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="fintecmecanica" name="fintecmecanica" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>

			<div class="fitem">
				<label>Tarjeta Operacion:</label>
				<input name="iniciotarjetaoperacion" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="fintarjetaoperacion" name="fintarjetaoperacion" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>

			<div class="fitem">
				<label>Poliza Contractual:</label>
				<input name="iniciopolizacontrac" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="finpolizacontrac" name="finpolizacontrac" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>
			
			<div class="fitem">
				<label>Poliza Extracontrac:</label>
				<input name="iniciopolizaextra" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="finpolizaextra" name="finpolizaextra" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>
			
			<div class="fitem">
				<label>Preventiva:</label>
				<input name="iniciopreventiva" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label></label>
				<input id="finpreventiva" name="finpreventiva" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
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
				<input name="cedularesponsable" class="easyui-textbox">
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
				<select id="modalidad" name="modalidad" class="easyui-combobox" style="width:205px">
					<option></option>
				    <option value="CONSORCIO">CONSORCIO</option>
				    <option value="CONVENIO">CONVENIO</option>
				    <option value="PASAPORTE">PASAPORTE</option>
				    <option value="UNION TEMPORAL">UNION TEMPORAL</option>
				</select>

				<label>Con:</label>
				<input name="empresaafiliadora" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Fecha Inicio:</label>
				<input id="fechainicio" name="fechainicio" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser" style="width: 205px">

				<label>Fecha Fin:</label>
				<input id="fechafin" name="fechafin" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser" style="width: 205px">
			</div> -->

			<!-- <div class="fitem">
				<label>Origen:</label>
				<input id="origen" name="origen" class="easyui-combobox" 
					url="json/comboorigen.php" style="width:205px"
					data-options="disabled:false,editable:true,valueField:'origen',textField:'origen'">

				<label>Destino:</label>
				<input id="destino" name="destino" class="easyui-combobox" 
					url="json/combodestino.php" style="width:205px"
					data-options="disabled:false,editable:true,valueField:'destino',textField:'destino'">
			</div> -->

			<!-- <div class="fitem">
				<label>Recorrido</label>
				<input name="recorrido" class="easyui-textbox" multiline="true" style="width: 525px; height: 66px">
			</div> -->

			<!-- <div class="fitem">
				<label>Objeto Contrato</label>
				<input name="objetocontrato" class="easyui-textbox" style="width: 530px">
			</div>
			<br>

			<div class="ftitle">INFORMACIÓN CONDUCTOR</div>
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
 -->
			<div class="ftitle">COBRO DE PLANILLAS</div>
			<div class="fitem">
				<label>Cobro:</label>
				<select id="cancelado" name="cancelado" class="easyui-combobox" style="width:205px">
					<option></option>
				    <option value="CANCELADO">CANCELADO</option>
				    <option value="DEBE">DEBE</option>
				</select>

				<label>Fecha:</label>
				<input name="fechacancelado" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>
		</form>

	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveExtracto()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<script type="text/javascript">
		var url;
		
		function editExtracto(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar EXTRACTO');
				$('#fm').form('load',row);
				url = 'json/extracto_update.php?id='+row.id;
			}
		}
		function saveExtracto(){
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
		function destroyExtracto(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el extracto: ' + row.extracto,function(r){
					if (r){
						$.post('json/extracto_destroy.php',{id:row.id},function(result){
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
 				traerDatosInterno();

 			}
 		});

 		//DATOS DEL RECORRIDO
 		$("#origen").combobox({
 			onSelect: function(){
 				traerDatosRecorrido();
 				$('#destino').next().find('input').focus();

 			}
 		});

 		$("#destino").combobox({
 			onSelect: function(){
 				traerDatosRecorrido();

 			}
 		});

 		//DATOS DEL CONDUCTOR 2
 		// $("#conductor2").combobox({
 		// 	onSelect: function(){
 		// 		traerDatosConductor2();

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
	</script>

	<script type="text/javascript">

		function traerDatos(xcliente){
			var xcliente = $("#cliente").combobox('getValue');	
			//alert("traer DATOS de "+xcliente);

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

			// var url="json/datosclientes.php?contacto="+xcliente;
			// $.getJSON(url,function(registros){
			// 	if (registros.length == 0){
			// 		$.messager.alert("No existen datos");
			// 	}		
			// 	else {
			// 		$.each(registros, function(i,registro){							

			// 			$("#fm").form('load', registro);

			// 			var xdireccion = registro.direccion;
			// 			var xtelefono = registro.telefono;
			// 			alert('direccion'+xdireccion+'telefono'+xtelefono);

			// 		});
			// 	}
			// });
		}

		function traerDatosInterno(xinterno){
			var xinterno = $("#interno").combobox('getValue');	
			//alert("traer DATOS de "+xinterno);

			if(xinterno!=''){
				$.getJSON('json/datosinterno.php?interno='+xinterno,function(registros){
					if(registros.length == 0){
						$.messager.alert("No existen datos");
					}
					else{
						$.each(registros, function(i,registro){
							$("#fm").form('load', registro);
							$("#modelo").textbox('setValue', registro.modelo);
						});
					}
				});
			}
		}

		function traerDatosRecorrido(xorigen, xdestino){
			var xorigen = $("#origen").combobox('getValue');	
			var xdestino = $("#destino").combobox('getValue');	
			// alert("traer DATOS de "+xorigen+" fg "+xdestino);

			if(xorigen!='' && xdestino!=''){
				$.getJSON('json/datosrecorrido.php?origen='+xorigen+"&destino="+xdestino,function(registros){
					if(registros.length == 0){
						$.messager.alert("No existen datos");
					}
					else{
						$.each(registros, function(i,registro){
							$("#fm").form('load', registro);
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
							$("#fm").form('load', registro);
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
							$("#fm").form('load', registro);
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
							$("#fm").form('load', registro);
							$("#cedulaconductor3").textbox('setValue', registro.cedulaconductor);
							$("#vigencialicencia3").textbox('setValue', registro.vigencialicencia);
						});
					}
				});
			}
		}
		
	</script>

	<script type="text/javascript">
		function planillaPDF(){
			
			var xreg = $("#dg").datagrid('getSelected');

			var xextracto = xreg['extracto'];
			var xcontrato = xreg['contrato'];
			var xcedularesponsable = xreg['cedularesponsable'];
			var xfechafin = xreg['fechafin'];
			var xfecha2019 = '2020-01-01';
			// alert(xextracto);

			var params  = 'width='+screen.width;
    		params += ', height='+screen.height;
    		params += ', top=0, left=0'
    		params += ', fullscreen=yes';

    		window.open ("planilla2020.php?extracto="+xextracto+"&contrato="+xcontrato+"&cedularesponsable="+xcedularesponsable , params);
    		   		// else if(pcual==3){
    		// 	window.open ("contrato_royalexpress.php?extracto="+xextracto+"&contrato="+xcontrato+"&cedularesponsable="+xcedularesponsable , params);
    		// }
			
		}

		function hoy(){
			var xhoy = new Date();
			var y = xhoy.getFullYear();
			var m = xhoy.getMonth()+1;
			var d = xhoy.getDate();
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
		}

		function printExtractos(){
			// location.assign("activosExcel.php?colegio="+xcolegio);
			location.assign("extractosExcel.php");			

		}

		function printCaja(){
			// location.assign("activosExcel.php?colegio="+xcolegio);
			location.assign("cajaExtractoExcel.php");			

		}

		function printFontur(){
			// location.assign("activosExcel.php?colegio="+xcolegio);
			location.assign("fonturExcel.php");			

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