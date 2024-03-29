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
	<div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newContrato()">Nuevo Contrato</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editContrato()">Editar</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyContrato()">Remover</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="newExtracto()" style="margin-left: 600px">Nuevo Extracto</a>
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
				    <option value="TRANSPORTE DE ALUMNOS Y PERSONAL">TRANSPORTE DE ALUMNOS Y PERSONAL</option>
				    <option value="TRANSPORTE EMPRESARIAL">TRANSPORTE EMPRESARIAL</option>
				    <option value="TRANSPORTE DE TURISTAS">TRANSPORTE DE TURISTAS</option>
				    <option value="TRANSPORTE DE GRUPO ESPECIFICO DE USUARIOS PARTICULARES">TRANSPORTE DE GRUPO ESPECIFICO DE USUARIOS PARTICULARES</option>
				    <option value="TRANSPORTE DE USUARIOS DEL SERVICIO DE SALUD">TRANSPORTE DE USUARIOS DEL SERVICIO DE SALUD</option>
				</select>
			</div>

			<div class="fitem">
				<label>Fecha Inicio:</label>
				<input name="iniciocontrato" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

				<label>Fecha Fin:</label>
				<input name="fincontrato" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
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

				<label >Tarjeta Operación:</label>
				<input name="tarjetaoperacion" class="easyui-textbox">
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
				<select id="modalidad" name="modalidad" class="easyui-combobox" style="width:214px">
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
	<div id="dlg-buttons-extracto">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveExtracto()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgExtracto').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<script type="text/javascript">
		var url;
		function newContrato(){
			$('#dlg').dialog('open').dialog('setTitle','Nuevo Contrato');
			$('#fm').form('clear');
			url = 'json/contrato_save.php';
			maxRegistro();
		}
		function editContrato(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar CONTRATO');
				$('#fm').form('load',row);
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

			// setTimeout(function(){
			// 	// poner ceros y reasignar campo contrato
			// 	var ncontrato = ponerCeros(xcontrato);
			// 	setVar('ncontrato',0,ncontrato);

			// },2000);

			if (row){
				$('#dlgExtracto').dialog('open').dialog('setTitle','Añadir EXTRACTO');
				$('#fmExtracto').form('load',row);

				// limpiar contenido de contrato/extracto
				setVar('ncontrato',0,'');
				setVar('extracto',0,'');

				// se quita el valor de retorno
				ponerCeros(xcontrato);

				url = 'json/extracto_save.php?id='+row.id;

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
						$('#dlgExtracto').form('clear').dialog('close');		// close the dialog
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
                  
                    var d1 = new Date(now.getFullYear(), now.getMonth(), now.getDate());
                    var d2 = new Date(now.getFullYear(), now.getMonth(), now.getDate());

                    return d1<=date && date<=xfinsoat && date<=xfintecmecanica && date<=xfintarjetaoperacion && date<=xfinpolizacontrac && date<=xfinpolizaextra && date<=xfinpreventiva;
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
 				traerDatosInterno();
 			}
 		});
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

		function traerDatosInterno(xinterno){
			var xinterno = $("#interno").combobox('getValue');

			if(xinterno!=''){
				$.getJSON('json/datosinterno.php?interno='+xinterno,function(registros){
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