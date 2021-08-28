
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administracion-Colaboración Empresarial</title>
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
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newColaboracion()">Nuevo</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editColaboracion()">Editar</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyColaboracion()">Remover</a>
	</div>

	<table id="dg" title=" COLABORACIÓN EMPRESARIAL " class="easyui-datagrid" style="width:80%;height:auto"
			url="json/colaboracion_get.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="empresa" width="10">Empresa</th>
			</tr>
		</thead>
	</table>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:760px;height:554px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>

			<div class="ftitle">INFORMACIÓN EMPRESA</div>
			<div class="fitem">
				<label>Empresa:</label>
				<input name="empresa" class="easyui-textbox">

				<label>Sigla:</label>
				<input name="sigla" class="easyui-textbox">

			<div class="fitem">
				<label>Tipo:</label>
				<select id="tipoempresa" name="tipoempresa" class="easyui-combobox" style="width:204px">
				    <option value="NIT">NIT</option>
				    <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
				 </select>

				<label>Documento:</label>
				<input name="documentoempresa" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Depto:</label>
				<input name="departamento" class="easyui-textbox">

				<label>Ciudad:</label>
				<input name="ciudad" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Dirección:</label>
				<input name="direccion" class="easyui-textbox">

				<label>Teléfono:</label>
				<input name="telefono" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Correo:</label>
				<input name="correo" class="easyui-textbox">
			</div>
			<br>
			<div class="ftitle">INFORMACIÓN REPRESENTANTE LEGAL</div>
			<div class="fitem">
				<label>Repr Legal:</label>
				<input name="reprlegal" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Tipo:</label>
				<select id="tiporepr" name="tiporepr" class="easyui-combobox" style="width:204px">
				    <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
				    <option value="Cedula de Extranjeria">Cédula de Extranjería</option>
				    <option value="Pasaporte">Pasaporte</option>
				    <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
				    <option value="NIT">NIT</option>
				 </select>

				<label>Documento:</label>
				<input name="documentorepr" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Inicio Vigencia:</label>
				<input id="iniciovigencia" name="iniciovigencia" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">

				<label>Fin Vigencia:</label>
				<input id="finvigencia" name="finvigencia" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
			</div>

			<div class="fitem">
				<label>Cooperación:</label>
				<select id="cooperacion" name="cooperacion" class="easyui-combobox" style="width:204px">
				    <option value="Consorcio">Consorcio</option>
				    <option value="Convenio">Convenio</option>
				    <option value="Union Temporal">Unión Temporal</option>
				</select>
			</div>
		</form>

	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveColaboracion()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<script type="text/javascript">
		var url;
		function newColaboracion(){
			$('#dlg').dialog('open').dialog('setTitle','Nueva COLABORACIÓN EMPRESARIAL');
			$('#fm').form('clear');
			setVar('iniciovigencia',0,'0000-00-00');
			setVar('finvigencia',0,'0000-00-00');
			url = 'json/colaboracion_save.php';
		}
		function editColaboracion(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar COLABORACIÓN EMPRESARIAL');
				$('#fm').form('load',row);
				url = 'json/colaboracion_update.php?id='+row.id;
			}
		}
		function saveColaboracion(){
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
		function destroyColaboracion(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover la Colaboración Empresarial: ' + row.empresa,function(r){
					if (r){
						$.post('json/colaboracion_destroy.php',{id:row.id},function(result){
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
			width:200px;

		}
	</style>
</body>
</html>