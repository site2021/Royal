<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Parque-Automotor</title>
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
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="newResolucion()">
	         		<img src="icons/Plus.png" >
	         	</a>
	         	<span class="tooltiptext">Nueva RESOLUCIÓN</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="editResolucion()">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">Editar RESOLUCIÓN</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="destroyResolucion()">
	         		<img src="icons/Trash.png" >
	         	</a>
	         	<span class="tooltiptext">Eliminar RESOLUCIÓN</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="printPqAutomotor()">
	         		<img src="icons/Excel.png" >
	         	</a>
	         	<span class="tooltiptext">Documentos VEHICULO</span>
	        </div>
	    </div>
	</div>

	<table id="dg" title=" RESOLUCIONES " class="easyui-datagrid" style="width:100%;height:450px;margin-top:50px;"
			url="json/resoluciones_get.php"
			toolbar="#toolbar"
			headerCls="hc"
			rownumbers="true" fitColumns="false" singleSelect="true">
		<thead>
			<tr>
				<th field="resolucion" width="450">Resolucion</th>
				<th field="fecharesolucion" width="137">Fecha</th>
				<th field="estadoresolucion" width="137">Estado</th>
				<th field="capmicrobus" width="137">Microbus</th>
				<th field="capbus" width="137">Bus</th>				
				<th field="capbuseta" width="137">Buseta</th>				
				<th field="capcamioneta" width="137">Camioneta</th>
			</tr>
		</thead>
		<!-- <img src='json/vista.php?id=66' alt='Img blob desde MySQL' />   -->
	</table>
	
	<div id="dlg" class="easyui-dialog" data-options="modal:true" style="width:800px;height:360px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" enctype="multipart/form-data">
			<div class="ftitle">INFORMACIÓN RESOLUCIÓN</div>
			<div class="fitem">
				<label>Resolución:</label>
				<input id="resolucion" name="resolucion" class="easyui-textbox" style="width: 508px">
			</div>
			<div class="fitem">
				<label>Estado:</label>
				<select id="estadoresolucion" name="estadoresolucion" class="easyui-combobox" style="width:204px">
				    <option value="ACTIVA">ACTIVA</option>
				    <option value="INACTIVA">INACTIVA</option>
				</select>
				
				<label>Fecha:</label>
				<input id="fecharesolucion" name="fecharesolucion" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
			</div> 
			<br>
			<div class="ftitle">CAPACIDAD</div>
			<div class="fitem">
				<label>Microbús:</label>
				<input id="capmicrobus" name="capmicrobus" class="easyui-numberbox">
		
				<label>Bus:</label>
				<input id="capbus" name="capbus" class="easyui-numberbox">
			</div>
			<div class="fitem">
				<label>Buseta:</label>
				<input id="capbuseta" name="capbuseta" class="easyui-numberbox">
			
				<label>Camioneta Cerrada:</label>
				<input id="capcamioneta" name="capcamioneta" class="easyui-numberbox">
			</div>
		</form>

	</div>
	<div id="dlg-buttons">

		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveResolucion()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<script type="text/javascript">
		var url;
		function newResolucion(){
			$('#dlg').dialog('open').dialog('setTitle','Nueva RESOLUCIÓN');
			$('#fm').form('clear');
			// VALORES POR DEFECTO
			setVar('fecharesolucion',0,'0000-00-00');
			setVar('capmicrobus',0,'0');
			setVar('capbus',0,'0');
			setVar('capbuseta',0,'0');
			setVar('capcamioneta',0,'0');

			url = 'json/resolucion_save.php';
		}
		function editResolucion(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar RESOLUCIÓN');
				$('#fm').form('load',row);
				url = 'json/resolucion_update.php?id='+row.id;
			}
		}
		
		function saveResolucion(){
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
		
		function destroyResolucion(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover la resolucion: ' + row.resolucion,function(r){
					if (r){
						$.post('json/resolucion_destroy.php',{id:row.id},function(result){
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

		function printPqAutomotor(){

			var xreg = $("#dg").datagrid('getSelected');
			if(xreg){

				var xfecharesolucion = xreg['fecharesolucion'];
				// location.assign("activosExcel.php?colegio="+xcolegio);
				location.assign("parqueAutomotor.php?fecharesolucion="+xfecharesolucion);
			}
			else{
				$.messager.confirm('Alerta','Debe seleccionar una resolución para descargar el Excel');		
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