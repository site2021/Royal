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

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
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
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="verConductor()">
	         		<img src="icons/User.png" >
	         	</a>
	         	<span class="tooltiptext">Visualizar CONDUCTOR</span>
	        </div>
	    </div>
	</div>

	<table id="dg" title=" CONDUCTORES " class="easyui-datagrid" style="width:100%;height:auto"
			url="json/conductores_get.php" headerCls="hc"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="interno">Interno</th>
            	<th field="conductor">Conductor</th>
            	<th field="cedulaconductor">Cedula</th>
            	<th field="celular">Celular</th>
            	<th field="categorialicencia">Licencia</th>
            	<th field="fechaingreso">Fecha Ingreso</th>
            	<th field="fecharetiro">Fecha Retiro</th>
			</tr>
		</thead>
	</table>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:900px;height:500px;padding:10px 20px" closed="true" buttons="#dlg-buttons">

		<form id="fm" method="post" novalidate>
			<div class="ftitle">Datos PERSONALES</div>
			<br>
			<div class="fitem">
				<label>Interno</label>
				<input id="interno" name="interno" class="easyui-textbox" disabled="true">

				<label>Conductor</label>
				<input id="conductor" name="conductor" class="easyui-textbox" disabled="true">

				<label>Cedula</label>
				<input id="cedulaconductor" name="cedulaconductor" class="easyui-textbox" disabled="true">
			</div>
			<br>
			<br>
			<div class="fitem">
				<label>Sexo</label>
				<select id="sexo" name="sexo" class="easyui-combobox" style="width:160px" disabled="true">
				    <option value="Masculino">Masculino</option>
				    <option value="Femenino">Femenino</option>
				</select>

				<label>Fecha Nac.</label>
				<input id="fechanacimiento" name="fechanacimiento" class="easyui-datebox"  disabled="true" data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
				<label>Lugar Nac.</label>
				<input id="lugarnacimiento" name="lugarnacimiento" class="easyui-textbox" disabled="true">
			</div>
			<div class="fitem">
				<label>Estado Civil</label>
				<input id="estadocivil" name="estadocivil" class="easyui-textbox" disabled="true">

				<label>Tipo Sangre</label>
				<select id="tiposangre" name="tiposangre" class="easyui-combobox" disabled="true" style="width:160px">
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				    <option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				</select>
			</div>
			<br>
			<br>
			<div class="fitem">
				<label>Direccion</label>
				<input id="direccion" name="direccion" class="easyui-textbox"  disabled="true">

				<label>Barrio</label>
				<input id="barrio" name="barrio" class="easyui-textbox" disabled="true">

				<label>Municipio</label>
				<input id="municipio" name="municipio" class="easyui-textbox" disabled="true">
			</div>

			<div class="fitem">
				<label>Telefono</label>
				<input id="telefono" name="telefono" class="easyui-textbox" disabled="true">

				<label>Celular</label>
				<input id="celular" name="celular" class="easyui-textbox" disabled="true">

				<label>Formacion Educativa</label>
				<input id="formacioneducativa" name="formacioneducativa" class="easyui-textbox" disabled="true">
			</div>
			<br>
			<div class="ftitle">Datos LICENCIA</div>
			<br>
			<div class="fitem">
				<label>Ctg. Licencia</label>
				<select id="categorialicencia" name="categorialicencia" class="easyui-combobox" disabled="true" style="width:160px">
				    <option value="C1">C1</option>
				    <option value="C2">C2</option>
				    <option value="C3">C3</option>
				</select>

				<label>Vigencia</label>
				<input id="vigencialicencia" name="vigencialicencia" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
			</div>
			<br>
			<div class="fitem">
				<label>Ingreso</label>
				<input id="fechaingreso" name="fechaingreso" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

				<label>Retiro</label>
				<input id="fecharetiro" name="fecharetiro" class="easyui-datebox" disabled="true" data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cerrar</a>
	</div>

	<script type="text/javascript">
		var url;
		
		function verConductor(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Visualizar VEHICULO');
				$('#fm').form('load',row);
				url = 'json/extracto_update.php?id='+row.id;
			}
			else{
				$.messager.confirm('Alerta','Debe seleccionar un conductor para ver la informacion.')
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
			margin-bottom:5px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:8px;
		}
		.fitem label{
			display:inline-block;
			text-align: right;
			/*font-weight: bold;*/
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>
</body>
</html>