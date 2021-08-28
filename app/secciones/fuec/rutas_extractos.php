<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administracion-Rutas Extractos</title>
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
	<table id="dg" title=" RUTAS EXTRACTOS " class="easyui-datagrid" style="width:80%;height:auto"
			url="json/rutasextractos_get.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="id" width="20" hidden="true">ID</th>
				<th field="nombreruta" width="10">Ruta</th>
				<th field="origen" width="6">Origen</th>
				<th field="destino" width="20">Destino</th>
				<th field="duracionruta" width="20">Duración</th>
			</tr>
		</thead>
	</table>

	<div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newRuta()">Nuevo</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editRuta()">Editar</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyRuta()">Remover</a>
	</div>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:750px;height:280px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>Ruta:</label>
				<input name="nombreruta" class="easyui-textbox">

				<label>Duración:</label>
				<select id="duracionruta" name="duracionruta" class="easyui-combobox" style="width:205px">
					<option></option>
				    <option value="1 HORA">1 HORA</option>
				    <option value="2 HORAS">2 HORAS</option>
				    <option value="3 HORAS">3 HORAS</option>
				    <option value="4 HORAS">4 HORAS</option>
				    <option value="5 HORAS">5 HORAS</option>
				    <option value="6 HORAS">6 HORAS</option>
				    <option value="7 HORAS">7 HORAS</option>
				    <option value="8 HORAS">8 HORAS</option>
				    <option value="9 HORAS">9 HORAS</option>
				    <option value="10 HORAS">10 HORAS</option>
				    <option value="11 HORAS">11 HORAS</option>
				    <option value="12 HORAS">12 HORAS</option>
				    <option value="13 HORAS">13 HORAS</option>
				    <option value="14 HORAS">14 HORAS</option>
				    <option value="15 HORAS">15 HORAS</option>
				    <option value="16 HORAS">16 HORAS</option>
				    <option value="17 HORAS">17 HORAS</option>
				    <option value="18 HORAS">18 HORAS</option>
				    <option value="19 HORAS">19 HORAS</option>
				    <option value="20 HORAS">20 HORAS</option>
				    <option value="21 HORAS">21 HORAS</option>
				    <option value="22 HORAS">22 HORAS</option>
				    <option value="23 HORAS">23 HORAS</option>
				</select>

			<div class="fitem">
				<label>Origen:</label>
				<input name="origen" class="easyui-textbox">

				<label>Destino:</label>
				<input name="destino" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Recorrido:</label>
				<input name="recorrido" class="easyui-textbox" multiline="true" style="width: 530px; height: 66px">
			</div>
		</form>

	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveRuta()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<script type="text/javascript">
		var url;
		function newRuta(){
			$('#dlg').dialog('open').dialog('setTitle','Nueva RUTA');
			$('#fm').form('clear');
			url = 'json/ruta_save.php';
		}
		function editRuta(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar RUTA');
				$('#fm').form('load',row);
				url = 'json/ruta_update.php?id='+row.id;
			}
		}
		function saveRuta(){
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
		function destroyRuta(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover la ruta: ' + row.nombreruta,function(r){
					if (r){
						$.post('json/ruta_destroy.php',{id:row.id},function(result){
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