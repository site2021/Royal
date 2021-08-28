<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
	<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/icon.css">

	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilotabla.css">
	<script type="text/javascript" src="../../jeasyui/jquery.min.js"></script>
	<script type="text/javascript" src="../../jeasyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../../jeasyui/locale/easyui-lang-es.js"></script>

	<script type="text/javascript" src="../js/datagrid-filter.js"></script>
	<script type="text/javascript" src="../js/accounting.js"></script>

	<link rel="stylesheet" type="text/css" href="css/tooltips.css">

	<!-- Busqueda x Contenido /////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$.fn.combobox.defaults.filter = function(q,row){
		      var opts = $(this).combobox('options');
		      return row[opts.textField].toUpperCase().indexOf(q.toUpperCase()) >= 0;
		};
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
		#dlgregistro, #dlgrutas {
			overflow: hidden;
		}

	</style>

	<!-- filter Lib - /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$(function(){
			$("#dgconductores").datagrid('enableFilter');			
		})
	</script>

</head>
<body>
	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
	    <!-- impresion de planilla de rutas /////////////////////////////////////////////////////// -->
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="newConductor()">
	         		<img src="icons/User.png" >
	         	</a>
	         	<span class="tooltiptext">Nuevo CONDUCTOR</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="editConductor()">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">Editar CONDUCTOR</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="destroyConductor()">
	         		<img src="icons/Trash.png" >
	         	</a>
	         	<span class="tooltiptext">Eliminar CONDUCTOR</span>
	        </div>
	    </div>
	</div>
	<table id="dgconductores" class="easyui-datagrid" title="LISTA CONDUCTORES" style="width:100%;height:380px;margin-top:50px;"
		url="json/conductores_get.php"
		toolbar="#toolbarconductor"
		headerCls="hc"
		rownumbers="true" pagination="true" fitColumns="true" singleSelect="true">

		
		<thead>
			<tr>					
            	<th field="interno" width="85px">interno</th>					
            	<th field="conductor" width="430px">conductor</th>					
            	<th field="cedulaconductor" width="150px">cedula</th>
            	<th field="celular" width="130px">celular</th>
            	<th field="categorialicencia" width="100px">licencia</th>
            	<th field="fechaingreso" width="150px">fecha ingreso</th>
            	<th field="fecharetiro" width="150px">fecha retiro</th>
			</tr>
		</thead>
	</table>

	<div id="dlgconductor" class="easyui-dialog" data-options="modal:true" style="width:880px;height:600px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		
		<form id="fm" method="post" novalidate>
			<div class="ftitle">Datos CONDUCTOR</div>
			<br>
			<div class="fitem">
				<label>Interno</label>
				<input id="interno" name="interno" class="easyui-textbox">

				<label>Conductor</label>
				<input id="conductor" name="conductor" class="easyui-textbox">

				<label>Cedula</label>
				<input id="cedulaconductor" name="cedulaconductor" class="easyui-textbox">
			</div>
			<br>
			<br>
			<div class="fitem">
				<label>Sexo</label>
				<select id="sexo" name="sexo" class="easyui-combobox" style="width:160px">
				    <option value="Masculino">Masculino</option>
				    <option value="Femenino">Femenino</option>
				</select>

				<label>Fecha Nac.</label>
				<input id="fechanacimiento" name="fechanacimiento" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

				<label>Edad</label>
				<input id="edad" name="edad" class="easyui-numberbox">
			</div>
			<div class="fitem">
				<label>Lugar Nac.</label>
				<input id="lugarnacimiento" name="lugarnacimiento" class="easyui-textbox" >

				<label>Estado Civil</label>
				<input id="estadocivil" name="estadocivil" class="easyui-textbox">

				<label>Tipo Sangre</label>
				<select id="tiposangre" name="tiposangre" class="easyui-combobox" style="width:160px">
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
				<input id="direccion" name="direccion" class="easyui-textbox">

				<label>Barrio</label>
				<input id="barrio" name="barrio" class="easyui-textbox">

				<label>Municipio</label>
				<input id="municipio" name="municipio" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Telefono</label>
				<input id="telefono" name="telefono" class="easyui-textbox">

				<label>Celular</label>
				<input id="celular" name="celular" class="easyui-textbox">
			</div>
			<br>
			<div class="ftitle">Datos LICENCIA</div>
			<br>
			<div class="fitem">
				<label>Ctg. Licencia</label>
				<select id="categorialicencia" name="categorialicencia" class="easyui-combobox" style="width:160px">
				    <option value="C1">C1</option>
				    <option value="C2">C2</option>
				    <option value="C3">C3</option>
				</select>

				<label>Vigencia</label>
				<input id="vigencialicencia" name="vigencialicencia" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
			</div>
			<br>

			<div class="fitem">
				<label>Formacion Educativa</label>
				<input id="formacioneducativa" name="formacioneducativa" class="easyui-textbox">

				<label>Profesion</label>
				<input id="profesion" name="profesion" class="easyui-textbox">
			</div>
			<br>
			<div class="fitem">
				<label>Ingreso</label>
				<input id="fechaingreso" name="fechaingreso" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

				<label>Retiro</label>
				<input id="fecharetiro" name="fecharetiro" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
			</div>

			<div class="fitem">
				<label>Salario Letra</label>
				<input name="salarioletra" class="easyui-textbox" >

				<label>Salario No</label>
				<input id="salarionum" name="salarionum" class="easyui-numberbox" value="12345678" data-options="groupSeparator:','">
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveConductor()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgconductor').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<script type="text/javascript">

		var url;
		function newConductor(){
			$('#dlgconductor').dialog('open').dialog('setTitle','Nuevo CONDUCTOR');
			$('#fm').form('clear');
			// VALORES PREDETERMNADOS
			setVar('fechanacimiento',0,'0000-00-00');
			setVar('edad',0,'0');
			setVar('vigencialicencia',0,'0000-00-00');
			setVar('fechaingreso',0,'0000-00-00');
			setVar('fecharetiro',0,'0000-00-00');
			setVar('salarionum',0,'0');

			url = 'json/conductor_save.php';
		}


		function printRegistrosMto(){
			// location.assign("activosExcel.php?colegio="+xcolegio);
			location.assign("mtosExcel.php");			

		}

		function editConductor(){
			var row = $('#dgconductores').datagrid('getSelected');
			if (row){
				$('#dlgconductor').dialog('open').dialog('setTitle','Editar CONDUCTOR');
				$('#fm').form('load',row);
				url = 'json/update_conductor.php?id='+row.id;

			}else {
					$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	

				}
		}

		function saveConductor(){
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
						$('#dlgconductor').dialog('close');		// close the dialog
						$('#dgconductores').datagrid('reload');	// reload the user data
					}
				}
			});
		}

		function destroyConductor(){
			var row = $('#dgconductores').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el conductor: ' + row.conductor,function(r){
					if (r){
						$.post('json/destroy_conductor.php',{id:row.id},function(result){
							if (result.success){
								$('#dgconductores').datagrid('reload');	// reload the user data
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
			else {
				$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	
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