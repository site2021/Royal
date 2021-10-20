<?

$usuario = $_SESSION['usuario'];

include '../app/control/conex.php';

$sede = $rowc[0];
$nombre = $rowc[1];

$sqlc = mysqli_query($conexion, "SELECT ciudad, nombre, costos  FROM tbusuarios WHERE usuario='$usuario'");
$rowc = mysqli_fetch_row($sqlc);
$costos = $rowc[2];

// 84376466

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
	<link rel="stylesheet" type="text/css" href="../app/jeasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../app/jeasyui/themes/icon.css">

	<link rel="stylesheet" type="text/css" href="../app/css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../app/css/estilotabla.css">
	<script type="text/javascript" src="../app/jeasyui/jquery.min.js"></script>
	<script type="text/javascript" src="../app/jeasyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../app/jeasyui/locale/easyui-lang-es.js"></script>

	<script type="text/javascript" src="lib/datagrid-filter.js"></script>
	<script type="text/javascript" src="lib/accounting.js"></script>

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
			$("#dgmantenimiento").datagrid('enableFilter');			
		})
	</script>

</head>
<body>
	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
	    <!-- impresion de planilla de rutas /////////////////////////////////////////////////////// -->
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="printRegistrosMto()">
	         		<img src="icons/Excel32.png" >
	         	</a>
	         	<span class="tooltiptext">Descargar EXCEL</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnNuevo" name="btnEditar" class="boton" onclick="newMantenimiento()">
	         		<img src="icons/Plus.png" >
	         	</a>
	         	<span class="tooltiptext">Nuevo MANTENIMIENTO</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="editMantenimiento()">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">Editar MANTENIMIENTO</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="destroyMantenimiento()">
	         		<img src="icons/Trash.png" >
	         	</a>
	         	<span class="tooltiptext">Eliminar MANTENIMIENTO</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="VerMantenimientos()">
	         		<img src="icons/Tool.png" >
	         	</a>
	         	<span class="tooltiptext">Ver Mantenimientos</span>
	        </div>
	    </div>
	</div>
	<table id="dgmantenimiento" class="easyui-datagrid" title="LISTA MANTENIMIENTOS" style="width:100%;height:500px;margin-top:50px;"
		url="json/mantenimiento_todos.php"
		toolbar="#toolbarmantenimiento"
		headerCls="hc"
		rownumbers="true" fitColumns="false" singleSelect="true">
		<thead>
			<tr>					
            	<th field="interno" width="60px">interno</th>					
            	<th field="fecha" width="100px">fecha</th>	
            	<th field="consecutivo" width="90px">consecutivo</th>	
            	<th field="taller" width="250px">taller</th>	
            	<th field="km" width="80px">km</th>	
            	<th field="tipo" width="100px">tipo</th>	
            	<th field="mecanico" width="270px">mecanico</th>	
            	<th field="descripcion" width="324px">descripcion</th>	

			</tr>
		</thead>
	</table>

	<div id="dlgmantenimiento" class="easyui-dialog" data-options="modal:true" style="width:400px;height:400px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Datos MANTENIMIENTO</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>Consecutivo</label>
				<input id="consecutivo" name="consecutivo" class="easyui-textbox">
			</div>
			<div class="fitem">
				<label>Interno</label>
				<input id="interno" name="interno" class="easyui-textbox">
			</div>
			<div class="fitem">
				<label>Fecha</label>
				<input id="fecha" name="fecha" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			</div>
			<div class="fitem">
				<label>Taller</label>
				<input id="taller" name="taller" class="easyui-textbox">
			</div>
			<div class="fitem">
				<label>Km</label>
				<input id="km" name="km" class="easyui-textbox" >
			</div>
			<div class="fitem">
				<label>Tipo</label>
				<select id="tipo" name="tipo" class="easyui-combobox" style="width: 160px">
					<option></option>
				    <option value="PREVENTIVO">PREVENTIVO</option>
				    <option value="CORRECTIVO">CORRECTIVO</option>
				    <option value="REVISION PREVENTIVA">REVISION PREVENTIVA</option>
				</select>
			</div>
			<div class="fitem">
				<label>Mecanico</label>
				<input id="mecanico" name="mecanico" class="easyui-textbox" >
			</div>
			<div class="fitem">
				<label>Descripcion</label>
				<input id="descripcion" name="descripcion" class="easyui-textbox" multiline="true" style="height: 54px">
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveMantenimiento()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgmantenimiento').dialog('close')" style="width:90px">Cancelar</a>
	</div>

	<script type="text/javascript">

		var url;

		function newMantenimiento(){
			$('#dlgmantenimiento').dialog('open').dialog('setTitle','Nuevo MANTENIMIENTO');
			$('#fm').form('clear');
			url = 'json/mantenimiento_save.php';
			maxRegistro();
			ponerCeros(consecutivo);
		}

		function printRegistrosMto(){
			// location.assign("activosExcel.php?colegio="+xcolegio);
			location.assign("mtosExcel.php");			

		}

		function editMantenimiento(){
			var row = $('#dgmantenimiento').datagrid('getSelected');
			if (row){
				$('#dlgmantenimiento').dialog('open').dialog('setTitle','Editar MANTENIMIENTO');
				$('#fm').form('load',row);
				url = 'json/update_mantenimiento.php?id='+row.id;

			}else {
					$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	

				}
		}

		function saveMantenimiento(){
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
						$('#dlgmantenimiento').dialog('close');		// close the dialog
						$('#dgmantenimiento').datagrid('reload');	// reload the user data
					}
				}
			});
		}

		function destroyMantenimiento(){
			var row = $('#dgmantenimiento').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el registro: ' + row.interno,function(r){
					if (r){
						$.post('json/destroy_mantenimiento.php',{id:row.id},function(result){
							if (result.success){
								$('#dgmantenimiento').datagrid('reload');	// reload the user data
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

		function VerMantenimientos(){

			
			var row = $('#dgmantenimiento').datagrid('getSelected');
			// var xinterno = $("#interno").textbox('getText');
			if (row){
				// alert(row.interno);
 				if (row.interno == '800'){
 					window.open("https://drive.google.com/embeddedfolderview?id=1pjYdq-CuLt4lBWuKJGd169wZXgLdRu9F#grid");
	 			}
	 			else if(row.interno == '810'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1JCnuuj8oWrLoR2ZLcJpMFAHZnQhK99U9#grid");
	 			}
	 			else if(row.interno == '813'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1IBmUGRRsboSUeDX0sNOEW9JbUl9FYf-A#grid");
	 			}
	 			else if(row.interno == '815'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1ZiwD3xeM8BHMRb8kvlk7u5FQbc68N6xu#grid");
	 			}
	 			else if(row.interno == '820'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1VyirlwOCIGOhpKYE4X6i2x_gatEHscsS#grid");
	 			}
	 			else if(row.interno == '823'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1HosnpERHNyZ2gRaJD-GCxGU870XL15PS#grid");
	 			}
	 			else if(row.interno == '827'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1KZomNcjmVeGyCjMOvjflGjb-1-cQnLNi#grid");
	 			}
	 			else if(row.interno == '828'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1Smsq29LQ8rSrU0uBgj_JubasnC-atLWT#grid");
	 			}
	 			else if(row.interno == '829'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1l8hNTLY_TC-2c8f4Gf2Kne5ViEyWLhDW#grid");
	 			}
	 			else if(row.interno == '840'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1o5Rd6T8R-oMa57G91ExesBJgxjI4eCwu#grid");
	 			}
	 			else if(row.interno == '847'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1ML9fkkdqvN3w8xDv4eu8PpLD9grkigCg#grid");
	 			}
	 			else if(row.interno == '848'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1KSXRojuV5tH1qPgXx3LtDkJNBPei1iJf#grid");
	 			}
	 			else if(row.interno == '849'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=15GaTRsIW36AC8HSVfM3zFO7lHQF0mGSm#grid");
	 			}
	 			else if(row.interno == '850'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1RhybLv1Vc1ufKA7Su6z46K4jIuYXDn06#grid");
	 			}
	 			else if(row.interno == '851'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1jGNkrOfP3W41ZCcT3TWn4gmYZ8mFxrXi#grid");
	 			}
	 			else if(row.interno == '859'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1fFRgmQrdNJccuD-blg-xHm7xITTLnz7E#grid");
	 			}
	 			else if(row.interno == '882'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1nLzWHXUSDWec5e7O9tE0Xu8ICkFehPGh#grid");
	 			}
	 			else if(row.interno == '894'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1ef208MRHXvh4l7yZ-0EA-M1BNOoHEQdw#grid");
	 			}
	 			else if(row.interno == '899'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1fCPYR2LQ3ScbnmthjeXV2t3Xa3Z67BSg#grid");
	 			}
	 			else if(row.interno == '900'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=17OovjOHjuBEGDXtqVUYLda04RbJfinHW#grid");
	 			}
	 			else if(row.interno == '910'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1zF-tm-sc7WyLFZg4OPiwYo0XdhUs4Ijg#grid");
	 			}
	 			else if(row.interno == '920'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1kbGnjHpFX8Ig02Qz9CXy91df2DH0RLqY#grid");
	 			}

	 			//MANTENIMIENTOS ROYAL EXPRESS

	 			else if(row.interno == '400'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1Jts0A2entjoH6CLYKd4KiBVrX3p2WJUb#grid");
	 			}
	 			else if(row.interno == '402'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1wn438L_LFKMF7PEU6t44eu6DN3i_WP3L#grid");
	 			}
	 			else if(row.interno == '403'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1qDoshZi2n5WR_fcZCIgztfGaqEGLJJhC#grid");
	 			}
	 			else if(row.interno == '406'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1qYrtQA1QrFhSbNCEsAzxD7we3MB4L2de#grid");
	 			}
	 			else if(row.interno == '415'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1ELGVjQL0DWhHxsjH7oFHjdesyzmmRY0r#grid");
	 			}
	 			else if(row.interno == '417'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1zudgu2snG4q2dOJLOKhjHMcsl-ufJcST#grid");
	 			}
	 			else if(row.interno == '418'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1ZV_VxpXignBCG_YrFUXSffF3y2ni5qtI#grid");
	 			}
	 			else if(row.interno == '420'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1wh5WweXgch5LvpmOYr_fVvNQvW7HVjco#grid");
	 			}
	 			else if(row.interno == '421'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1TfDam52MN-r3ULtOiXy9yFIR5cD1qrjc#grid");
	 			}
	 			else if(row.interno == '425'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1GuAnvYQ9zmmiytcWjM-ALZoPNJUThBBM#grid");
	 			}
	 			else if(row.interno == '427'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1K6KI_eaYqj0EQs7oByx_UqyoXpS3lqHW#grid");
	 			}
	 			else if(row.interno == '428'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=18eBLXlWYedJlcKuOtyKgXpQ-PjEfgJ81#grid");
	 			}
	 			else if(row.interno == '430'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1G5SSL7F8M9-JX3kr8wslJ-YNrK0nmI73#grid");
	 			}
	 			else if(row.interno == '435'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=13DsYabbgiuFXmED8xJecxU9QqvwQV8EJ#grid");
	 			}
	 			else if(row.interno == '436'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1OxSyJF5tHNuP6ihONEu8IgnXHF3fAKNZ#grid");
	 			}
	 			else if(row.interno == '437'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=15uQHMNeiTodzZcPnnkHMaxiw2d6Bs06t#grid");
	 			}
	 			else if(row.interno == '438'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1VFpEz8pdNUHIhi-itdtPWdZkRXKZXLQ1#grid");
	 			}
	 			else if(row.interno == '439'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1FkqCPvrWg722mYqHne-a1FA5ilr494ro#grid");
	 			}
	 			else if(row.interno == '440'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1FQS_U86trBrW4-BpSD0LhwmFiivp1Fz_#grid");
	 			}
	 			else if(row.interno == '442'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=102ZhscFGgDm33Y5cOBg7d_3kyOqXD58H#grid");
	 			}
	 			else if(row.interno == '443'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1mmkCGWnUh251XeGAsVBLQYcE2YtUrCA7#grid");
	 			}
	 			else if(row.interno == '444'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1NHz_xw2u9iynffJkrx5XFd0B1YiSnN6G#grid");
	 			}
	 			else if(row.interno == '451'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1HUSnzUZTH7hdA6GQKmp-BfoyqSl0O4P7#grid");
	 			}
	 			else if(row.interno == '454'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1iNQieOvKLp8EEDWwMa4TTK4QyQU8bAXs#grid");
	 			}
	 			else if(row.interno == '457'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1KpbixVZYqbd64nlp_f0LUMhW0L0B156q#grid");
	 			}
	 			else if(row.interno == '461'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1h9MEGrSkt0YQIjApAmvKIyXtGUCOdo2r#grid");
	 			}
	 			else if(row.interno == '462'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1ODg2TaZvAWXeIXXDpaxsmUwsQzMjZlXh#grid");
	 			}
	 			else if(row.interno == '464'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1PKnkPVXDgXZ2BOcAY8gXmhPSTm2eKZYk#grid");
	 			}
	 			else if(row.interno == '466'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1SV7yKAdGcM-EYO8ljcyMhpc38hCcYIVq#grid");
	 			}
	 			else if(row.interno == '471'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1F5C-pWvrDN3lTZgwzf4KQQv2McCJ4o7g#grid");
	 			}
	 			else if(row.interno == '472'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1J0vfMtFx64Kqyq04cIt3GsDu1YULhn6c#grid");
	 			}
	 			else if(row.interno == '474'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1pVL8kCAfw5rkJb4vw0jE1Sh0VKtfY1Ia#grid");
	 			}
	 			else if(row.interno == '475'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1_fzThQu8nq54SMkNA1lxtDYH31KH-t5Q#grid");
	 			}
	 			else if(row.interno == '473'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1iihaz6ooMydJWkJoIqOLs68QUSm0t3ib#grid");
	 			}
	 			else if(row.interno == '478'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1yhSCDOTBGQ1iAf3LyVgRr0LUTXLpk4hb#grid");
	 			}
	 			else if(row.interno == '479'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1V-RxXyfwcUKdM7UaQD2HIPUlGTf0FOST#grid");
	 			}
	 			else if(row.interno == '480'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=11qn1LM8RycPUCGam7Je89m9PHDX09rpk#grid");
	 			}
	 			else if(row.interno == '485'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1sX_AmBmr-QdsJ_I-QZ9Y8X9MvYimSzvH#grid");
	 			}
	 			else if(row.interno == '491'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1Df7T_O76_M0o6-n-fyDRm26XshjMwQ_L#grid");
	 			}
	 			else if(row.interno == '497'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=13OMv4PBs6gY2-tMJrW-66SR7zEMlodkA#grid");
	 			}
	 			else if(row.interno == '499'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1MBvBLjYuHhKBH7MS80JaNfncBF4fu8Nf#grid");
	 			}
	 			else if(row.interno == '501'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=18bILgZ528pczZJDf-dKeni6PZEgD5z2C#grid");
	 			}
	 			else if(row.interno == '504'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1L_rTbyR_JPvTwhN3bXC0DUH5Ba7BB8Zy#grid");
	 			}
	 			else if(row.interno == '505'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1z8B0pP4Bu5J7AxkmfuF8OGK1jS6cwbWj#grid");
	 			}
	 			else if(row.interno == '513'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1-hsuXksKiYSpo1ykHTmcnE97QHi9vr_P#grid");
	 			}
	 			else if(row.interno == '516'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1U18csTxNnV8_VNXW7KIob41p_jo9a9z2#grid");
	 			}
	 			else if(row.interno == '657'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=157HSOzZGqzCkM_amRUy-oD2Mnt18-bER#grid");
	 			}
	 			else if(row.interno == '700'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1ZnlbFzFjC3ZcfUssYEJOf-ngJrPzdtXs#grid");
	 			}
	 			else if(row.interno == '710'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1baH9GHYt5nJ1zARVdoyY8N8zAauTjswW#grid");
	 			}
	 			else if(row.interno == '720'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1bq9qTrQko3iynIGpzJb3T0rIyB2cJ8nW#grid");
	 			}
	 			else if(row.interno == '730'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1QuK84pQ6bkQzEAmeqbISIIxa3zPRlCbu#grid");
	 			}
	 			else if(row.interno == '740'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1o0Ll-jOTWTQU9i7yIDpjRERvqViQqa13#grid");
	 			}
	 			else if(row.interno == '750'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1Y0-Rx5Xdv586hFAZkl7-o1H16sWFH_UK#grid");
	 			}
	 			else if(row.interno == '760'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1HiQFBMu975OmZnI9zZr_55M9QU18mW7L#grid");
	 			}
	 			else if(row.interno == '770'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1sK9kjg_25lOeKdPnQHM0KRi05crEWbTK#grid");
	 			}
	 			else if(row.interno == '920'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1IPfvq2R2pI7nTmmlzYSW-DAhDzFv9kJw#grid");
	 			}
	 			else if(row.interno == '407'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1vfk9PDUgY5ndWcKoqHTjr-BPWXCm4o2L#grid");
	 			}
	 			else if(row.interno == '412'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1Z7F-6LypMkwZZj8MrSnjlOXffcOgpGxV#grid");
	 			}
	 			else if(row.interno == '460'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1980_c7AKyTIK8QtZER7l6ntUywsHo9QZ#grid");
	 			}
	 			else if(row.interno == '470'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1GOkTzSgvJkL7G9HHjY_uby94Jgc4yZP-#grid");
	 			}
	 			else if(row.interno == '413'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=17ndGHBW5NVqB63WS1JuXElbZkRfdm3ea#grid");
	 			}
	 			else if(row.interno == '408'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=10uDcAw4IQRfu97vHbDKf6OA0jYKWHalq#grid");
	 			}
	 			else if(row.interno == '410'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1xsBowBnuf9ETSB-rL-JA5iRAzxLVOZ8I#grid");
	 			}
	 			else if(row.interno == '414'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1ICPiDGH1l_EKAD6Q0g9jdD5-hdwHvDq6#grid");
	 			}
	 			else if(row.interno == '409'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=12T2zcjVN8YpDwcvzUu4SA9oWQ4FpEMJk#grid");
	 			}
	 			else if(row.interno == '416'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1Xc1Bd4vidKm-yo4bhjv8VBdh-4SJkrvd#grid");
	 			}
	 			else if(row.interno == '448'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1iQeDrU9WmPdpg29EnGdrSN15ISF1MY79#grid");
	 			}
	 			else if(row.interno == '511'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1X2iXFS6SS62VNL8_GFGFm4lK0rtG4Eph#grid");
	 			}
	 			else if(row.interno == '600'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1FRZMxuDo89bfqZQAo8ps79Bglg1d50_d#grid");
	 			}
	 			else if(row.interno == '603'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1-cP_6ixzmUhoiWuM19X1qzJJIHDxJVoJ#grid");
	 			}
	 			else if(row.interno == '514'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1RXm7fA2O80L2in4bq71RKa30tTfWa4v9#grid");
	 			}
	 			else if(row.interno == '515'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1z1iuTNhDXmkGu-orixrE8pv70ZNUttEt#grid");
	 			}
	 			else if(row.interno == '677'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1ZmtuUAaGWHazhDWRM-NTexh6sD-JjXIH#grid");
	 			}
	 			else if(row.interno == '467'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1lAZvjpsf5bepR1uwjc5lMlFKBDbAa1GC#grid");
	 			}
	 			else if(row.interno == '517'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1IdA8olwo9QU_-AXbdtlCv2peFgMxR9ka#grid");
	 			}
	 			else if(row.interno == '604'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1JuMTmhOlgnOMmVgA6iAG4Eoq200m4VKZ#grid");
	 			}
	 			else if(row.interno == '605'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1qafKb41mIrk0vPnypdmH1a21a5rPiCqC#grid");
	 			}
	 			else if(row.interno == '606'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1_1b1RUUUiz-VZRC8U5dZAUSFCd7eY8SD#grid");
	 			}
	 			else if(row.interno == '610'){
	 				window.open("https://drive.google.com/embeddedfolderview?id=1sOvnXF_Xaz5GRsfiQxw9SF13tgBgZH8z#grid");
	 			}
	 			
			}else {
					$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	
			}
 		}

 	// 	function maxRegistro(){
		// 	$.post('json/consecutivo_factura.php', 
		// 		{}, 
		// 		function(result){
		// 			if(result.success){
		// 				var xmax = parseInt(result.rmaximo) + 1;
		// 				$("#consecutivo").textbox("setValue",xmax);
		// 			}
		// 			else{
		// 				$.messager.alert('Mensaje','error Insertar tbcontratos');
		// 			}
		// 		}, 
		// 	'json');
		// }

		function maxRegistro(){
			$.post('json/consecutivo_factura.php', 
				{}, 
				function(result){
					if(result.success){
						var rmaximo = result.rmaximo;
						if(rmaximo){
							// alert('ok');
						}else {
							// alert('si');
						}

						// adicionar ceros al nextr
						var nlong = rmaximo.length;
						var nnext = '0'.repeat(4-nlong) + rmaximo;

						// alert("rmaximo="+nnext);

						// ncontrato tiene YA los ceros
						// setVar('ncontrato',0,ncontrato);
						$("#consecutivo").textbox("setValue",nnext);

						// return ncontrato;
																
					}
				}, 
			'json');
		}

		function ponerCeros(pcontrato){
			var long = pcontrato.length;
			var consecutivo = '';

			consecutivo = '0'.repeat(4-long) + pcontrato;
		}
 		
	</script>

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
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>

</body>
</html>