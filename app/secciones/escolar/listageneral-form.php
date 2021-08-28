<?

$usuario = $_GET['usuario'];

include '../../control/conex.php';

$sede = $rowc[0];
$nombre = $rowc[1];

$sqlc = mysqli_query($conexion, "SELECT ciudad, nombre, costos  FROM tbusuarios WHERE usuario='$usuario'");
$rowc = mysqli_fetch_row($sqlc);
$costos = $rowc[2];

?>
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
			padding-top: 1%;

		}
		.hc {
			background: #92D050;
		}
		#dlgregistro {
			overflow: hidden;
		}
		#div-colegio {
			height: 40px;
			float: left;
			display: flex;
			align-items: center;
		}

	</style>

</head>
<body onload="inicio()">	
	<!-- DIALOG: editar registro ////////////////////////////////////////////////////////////////// -->
	<div id="dlgregistro" class="easyui-dialog" headerCls="hc"
 		data-options="modal:true,closed:true,closable:false" buttons="#dlg-buttons"
 		style="padding:5px;width:80%">

 		<!-- variable de control NUEVO/EDITAR -->	
 		<div style="display:none">
 			<input id="qopcion" name="qopcion" class="easyui-textbox" style="width:50px">
 			<input id="rid" name="rid" class="easyui-textbox" style="width:50px">
 		</div>

 		<form id="frmDatos"  method="post" enctype="multipart/form-data">
	 		<div class="ritem">
	 			<label>Vigencia:</label>
				<select id="nvigencia" name="nvigencia" class="easyui-combobox" style="width:150px;">
				    <option value="2021">2021</option>
				</select>
	 			<label>Fecha:</label>
				<input id="fecha" name="fecha" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100">				
			</div> 			
	 		<div class="ritem">
	 			<div id="div-colegio">
		 			<label>Colegio:</label>
					<input id="colegio" name="colegio" class="easyui-combobox" 
						   url="json/combocolegios.php" style="width:150px"
						   data-options="editable:false,valueField:'nombre',textField:'nombre'">
		 			<label>Grado:</label>
					<input id="id_grado" name="grado" class="easyui-combobox" 
						   url="json/combogrados.php" style="width:100px"
						   data-options="editable:false,valueField:'nombre',textField:'nombre'">					   
		 			<label>Codigo:</label>
					<input id="codigo" name="codigo" class="easyui-textbox" 
					   data-options="">
				</div>							
		        <!-- <div class="tdivg" style="float:left;margin-left:5%">
		         	<a id="btnGrabar" name="btnGrabar" class="boton" onclick="limpiarForm()">
		         		<img src="icons/Cancel.png" >
		         	</a>
		         	<span class="tooltiptext">limpiar FORMULARIO</span>
		        </div> -->
	 		</div>

	 		<div class="rfm">
	 			<label>Datos ESTUDIANTE</label>	
	 		</div>
	 		<div class="ritem">
	 			<label>Nombre:</label>
	 			<input id="nombre" name="nombre" class="easyui-textbox" style="width:403px" > 
	 			<label>Direccion:</label>
	 			<input id="direccion" name="direccion" class="easyui-textbox" style="width:403px" > 
	 		</div>
	 		<div class="ritem">
	 			<label>Barrio:</label>
				<input id="barrio" name="barrio" class="easyui-combobox" 
					url="" style="width:236px"
					data-options="editable:false,valueField:'nombre',textField:'nombre'">
	 			<label>Comuna:</label>
	 			<input id="comuna" name="comuna" class="easyui-textbox" style="width:236px" 
	 				data-options="editable:false"> 
	 			<label>Ciudad:</label>
	 			<input id="ciudad" name="ciudad" class="easyui-textbox" style="width:236px" 
	 				data-options="editable:false"> 	 			
	 		</div>
	 		<div class="ritem">
	 			<label>2da.Dir.:</label>
				<select id="xdosdir" name="xdosdir" class="easyui-combobox" style="width:50px;">
				    <option value="si">SI</option>
				    <option value="no" selected>NO</option>
				</select>
	 			<input id="direccion2" name="direccion2" class="easyui-textbox" style="width:450px"
	 				data-options="disabled:true">				
	 		</div>
	 		<div class="ritem">
	 			<label>Barrio:</label>
				<input id="barrio2" name="barrio2" class="easyui-combobox" 
					url="" style="width:236px"
					data-options="disabled:true,editable:true,valueField:'nombre',textField:'nombre'">
	 			<label>Coumna:</label>
	 			<input id="comuna2" name="comuna2" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true, editable:false"> 
	 			<label>Ciudad:</label>
	 			<input id="ciudad2" name="ciudad2" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true, editable:false"> 	 			
	 		</div>

	 		<div class="rfmi">
	 			<label>Datos PADRES</label>	 			
	 		</div>
	 		<div class="ritem">
	 			<label>Acudiente:</label>
	 			<input id="nombreacudiente" name="nombreacudiente" class="easyui-textbox" style="width:350px" > 
	 			<label>Cedula:</label>
	 			<input id="cedula" name="cedula" class="easyui-textbox" style="width:150px" >
	 			<label>Telefono:</label>
	 			<input id="telefono" name="telefono" class="easyui-textbox" style="width:236px" > 	 			
	 		</div>

	 		<div class="ritem">
	 			<label>Padre:</label>
	 			<label>Celular:</label>
	 			<input id="celular1" name="celular1" class="easyui-textbox" style="width:236px" >
	 			<label>email:</label>
	 			<input id="email" name="email" class="easyui-textbox" style="width:300px" >	 			
	 		</div>

	 		<div class="ritem">
	 			<label>Madre:</label>
	 			<label>Celular:</label>
	 			<input id="celular2" name="celular2" class="easyui-textbox" style="width:236px" > 	 			
	 			<label>email:</label>
	 			<input id="email2" name="email2" class="easyui-textbox" style="width:300px" >	 			
	 		</div>

			<div class="ritem">	 			
	 			<label></label>
	 			<label>Cedula:</label>
	 			<input id="cedulaimg" name="cedulaimg" class="easyui-filebox" style="width:236px" >	 			
	 		</div>

	 		<div class="rfmi">
	 			<label>VALORES</label>	
	 		</div>

	 		<div class="ritem">
	 			<label>Recorrido:</label>
				<select id="recorrido" name="recorrido" class="easyui-combobox" style="width:150px;" data-options="editable:false">
				    <option value="1" selected="true">RUTA X COMPLETA</option>
				    <!-- <option value="2">MEDIA RUTA AM</option>
				    <option value="3">MEDIA RUTA PM</option> -->
				    <option value="4">DOS DIRECCIONES</option>
				</select>
				<label>TARIFA:</label>
				<input id="tarifav" name="tarifav" class="easyui-numberbox" 
					   style="width:110px"
					   data-options="editable:false,precision:0,groupSeparator:','">
	 		</div>

			<div class="ritem">
	 			<label>Observacion:</label>
	 			<input id="observaciones" name="observaciones" class="easyui-textbox" style="width:500px" > 
	 		</div>
	 		<div class="ritem" style="display:none">
				<label>T.BL:</label>
				<input id="tarifabl" name="tarifabl" class="easyui-numberbox" 
					   style="width:110px"
					   data-options="editable:false,precision:0,groupSeparator:','">				
	 			<label>T.Asociado:</label>
				<input id="tarifaaso" name="tarifaaso" class="easyui-numberbox" 
					   style="width:110px"
					   data-options="editable:false,precision:0,groupSeparator:','">
				<label>Ruta:</label>
				<input id="ruta" name="ruta" class="easyui-textbox" style="width:50px">
				<label>Ruta 2da:</label>
				<input id="ruta2da" name="ruta2da" class="easyui-textbox" style="width:50px" >
				<label>M.Ruta AM:</label>
				<input id="mrutaam" name="mrutaam" class="easyui-textbox" style="width:50px" >
				<label>M.Ruta PM:</label>
				<input id="mrutapm" name="mrutapm" class="easyui-textbox" style="width:50px" >
			</div>

 		</form>
		</div>

		<div id="dlg-buttons">
			<div class="botonera">
		        <div class="tdivg" style="margin-left:40%">
		         	<a id="btnGrabar" name="btnGrabar" class="boton" onclick="iraRegistro()">
		         		<img src="icons/Ok.png" >
		         	</a>
		         	<span class="tooltiptext">Grabar Registro ESTUDIANTE</span>
		        </div>

		        <div class="tdivg" style="margin-left:10%">
		         	<a id="btnDescargar" name="btnDescargar" class="boton" onclick="contratoPDF()">
		         		<img src="icons/Download.png" >
		         	</a>
		         	<span class="tooltiptext">Descargar CONTRATO (pdf) </span>
		        </div>

		        <!-- <div class="tdivg" style="margin-left:10%">
		         	<a id="btnDescargar" name="btnDescargar" class="boton" onclick="abrir()" target="blank">
		         		<img src="icons/Download.png" >
		         	</a>
		         	<span class="tooltiptext">Descargar CONTRATO (pdf) </span>
		        </div> -->			
			</div>		
 	</div>

 	<!-- SCRIPT inicio de function para la pagina ///////////////////////////////////////////////// -->
	<!-- FUNCTION: formatos de pantalla  -->
	<style type="text/css">	
		.rfm, .rfmi {
			float:left;			
			width: 100%;			
			font-size: 16px;
			font-weight: bold;
			color: #c0c0c0;
			border-bottom: 1px solid #c0c0c0;
		}

		.rfm {
			padding: 0% 0 1% 2%;
		}

		.rfmi {
			padding: 2% 0 1% 2%;
		}

		.ritem {
			float:left;
			width:100%;
			margin-top:10px;			
		}
		.ritem label {
			text-align: right;
			display:inline-block;
			font-weight: bold;
			width:90px;
		}
		.ritem input{
			text-align: left;
			width:110px;
		}
	</style>

	<!-- FUNCTION: formato fechas -->
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

        function actualFecha(){
			var today = new Date();
			var m = today.getMonth() + 1;
			var mes = (m < 10) ? '0' + m : m;

			var xfecha = today.getFullYear() + '-' + mes + '-' + today.getDate();

			return xfecha;

		}

	</script>

 	<script type="text/javascript">
 		function pantalla(){
 			$("#frmDatos").form('clear');
			$("#dlgregistro").dialog('hcenter');
			$("#dlgregistro").dialog('vcenter');
			$("#dlgregistro").dialog('open').dialog('setTitle','FORMULARIO DE REGISTRO');
			
 		}

 		function mostrarRegistro(popcion){
 			if(popcion=='E'){
 				editarDatos(popcion);
 			}

 			// aun no implementada por subir todo por importacion
 			if(popcion=='N'){
 				insertarDatos(popcion);
 			}

 		}

 		function insertarDatos(popcion){
 			pantalla(popcion);
 			setVar('estado', 0, 'A');

 		}

 		function editarDatos(popcion){
 			var row = $("#dglistageneral").datagrid('getSelected');

 			if(row){
 				pantalla(popcion); 				

	 			$("#frmDatos").form('load', row);

	 			// cargar id del registro
	 			setVar('rid',0,row['id']);

	 			// nos toco iniciar el valor de id_cargo en frmDatos
	 			setVar('id_grado',3,row['id_grado']);

	 			// generar listado de barrios x colegio	 			
	 			var xbarrio = row['barrio'];
	 			var xbarrio2 = row['barrio2'];
	 			generarBarrios(xbarrio,xbarrio2);

	 			setVar('xdosdir', 3, row['xdosdir']);	 			

	 			// set combo dosdir - no
	 			var xdosdir = row['xdosdir'];
	 			if(xdosdir=='no'){
	 				camposDosDir(0);	
	 			}else {
	 				camposDosDir(1);
	 			}
	 			
 			}else {
 				$.messager.alert("Mensaje", "no hay registro SELECCIONADO!!!");
 				return;
 			}

 		}

 	</script>

 	<!-- SCRIPT planillas de ruta y asociados ///////////////////////////////////////////////////// -->
 	<script type="text/javascript">
 		function planillas(){
 			showWin('dlgplanillas');


 		}

		function planillaPDF(pcual){
			// validar vacio en ruta
			var xruta = getVar('xruta2017', 0);
			if(xruta==''){
				// validad planilla Desrutada
				if(pcual<5){
					$.messager.alert("Mensaje", "ruta(s) VACIA!!!");
					return;					
				}
			}

			var row = $("#dglistageneral").datagrid('getSelected');

			var xcolegio = row['colegio'];
			var xcual = $("#xruta2017").textbox('getValue');			

			var params  = 'width='+screen.width;
    		params += ', height='+screen.height;
    		params += ', top=0, left=0'
    		params += ', fullscreen=yes';    		

    		if(pcual==1){
    			window.open ("planilla.php?cual="+xcual+'&colegio='+xcolegio, params);

    		}else if(pcual==2){
    			window.open ("planillaAsociado.php?cual="+xcual+'&colegio='+xcolegio, params);

    		}else if(pcual==3){
    			window.open ("planillaChequeo.php?cual="+xcual+'&colegio='+xcolegio, params);

    		}else if(pcual==4){
    			window.open ("planillaChequeoSin.php?cual="+xcual+'&colegio='+xcolegio, params);

    		}else if(pcual==5){
    			window.open ("planillaDesrutada.php?colegio="+xcolegio, params);

    		}else if(pcual==6){
    			location.assign("activosExcel.php?colegio="+xcolegio);    			

    		}

		}

 	</script>

 	<!-- FUNCTION onchange //////////////////////////////////////////////////////////////////////// -->
 	<script type="text/javascript">
 		$("#codigo").textbox({
 			onChange: function(){
 				buscarEstudiante();
 			}
 		});

 		$("#colegio").combobox({
 			onSelect:function(){ 				
 				generarBarrios('','');
 			}
 		});

 		$("#barrio").combobox({
 			onSelect: function(){
 				/* 				
 				var xopcion = $("#qopcion").textbox('getValue');
 				if(xopcion=='E'){
 					cargarDatos();
 				}*/

 				cargarDatos(1);
 				cargarDatosTarifas();

 			}
 		});

 		$("#barrio2").combobox({
 			onSelect: function(){
 				cargarDatos(2);


 			}
 		});

 		// $("#recorrido").combobox({
 		// 	onSelect: function(){
 				/*
 				var xopcion = $("#qopcion").textbox('getValue');
 				if(xopcion=='N'){ 							
 					cargarDatosTarifas();
 				}
 				*/
 				// cargarDatosTarifas();
 		// 	}
 		// })

 		$("#xdosdir").combobox({
 			onSelect: function(){
 				var dosdir = getVar('xdosdir', 3);
 				if(dosdir=='no'){
 					camposDosDir(0);
 				}else {
 					camposDosDir(1);
 					$('#direccion2').next().find('input').focus();
 				}
 			}
 		})

 	</script>

 	<script type="text/javascript">
 		// generar listado de barrios a partir de vigencia y colegio - lo dispara onSelect de colegio

		function cargarDatos(pcual){
			if(pcual==1){
				var xbarrio = $("#barrio").combobox('getValue');	
			}else if(pcual==2){
				var xbarrio = $("#barrio2").combobox('getValue');
			}
			
			if(xbarrio!=''){
				$.getJSON('json/combocomuna.php?barrio='+xbarrio,function(registros){
						if (registros.length == 0){
							//$.messager.alert('Mensaje','No hay registros');
						}		
						else {
							$.each(registros, function(i,registro){
								if(pcual==1){																
									$("#comuna").textbox('setValue', registro.comuna);
									$("#ciudad").textbox('setValue', registro.ciudad);
								}
								if(pcual==2){
									$("#comuna2").textbox('setValue', registro.comuna);
									$("#ciudad2").textbox('setValue', registro.ciudad);
								}


							});
						}

				});
			}
			var xbarrio1 = $("#barrio").combobox('getValue');
			var xbarrio2 = $("#barrio2").combobox('getValue');
			var xvigencia = getVar('nvigencia', 0);
			var xcolegio = $("#colegio").combobox('getText');
			var xrecorrido = getVar('recorrido', 3);
			alert('BARRIO 1: '+xbarrio1+' BARRIO 2: '+xbarrio2+' VIGENCIA '+ xvigencia+' COLEGIO: '+xcolegio+' RECORRIDO: '+xrecorrido);

			if(xbarrio1!='' && xbarrio2!=''){ 
				$.getJSON('json/tarifas_2.php?vigencia='+xvigencia+'&colegio='+xcolegio+'&barrio='+xbarrio1+'&barrio2='+xbarrio2,
					function(registros){
						if (registros.length == 0){
							$.messager.alert('Mensaje','No hay registros');
						}		
						else {
							$.each(registros, function(i,registro){
								if(xrecorrido==4){
									setVar('tarifav', 1, registro.dosdirtv);
									setVar('tarifabl', 1, registro.dosdirbl);
									setVar('tarifaaso', 1, registro.dosdirta);								
								}							
							});
						}
				});
			}


		}

		function cargarTarifas2da(){
			cargarDatos(2);
			var xbarrio = $("#barrio2").combobox('getText');
			alert(xbarrio);

		}

		function cargarDatosTarifas(){
			var xvigencia = getVar('nvigencia', 0);
			var xcolegio = $("#colegio").combobox('getText');
			var xbarrio = $("#barrio").combobox('getText');
			var xrecorrido = getVar('recorrido', 3);			
			
			if(xbarrio!=''){ 
				$.getJSON('json/tarifas_get.php?vigencia='+xvigencia+'&colegio='+xcolegio+'&barrio='+xbarrio,
					function(registros){
						if (registros.length == 0){
							$.messager.alert('Mensaje','No hay registros');
						}		
						else {
							$.each(registros, function(i,registro){
								if(xrecorrido==1){
									setVar('tarifav', 1, registro.tarifavigente);
									setVar('tarifabl', 1, registro.tarifabl);
									setVar('tarifaaso', 1, registro.tarifaaso);
								}
								if(xrecorrido==2 || xrecorrido==3){
									setVar('tarifav', 1, registro.mediatv);
									setVar('tarifabl', 1, registro.mediabl);
									setVar('tarifaaso', 1, registro.mediata);
								}
								if(xrecorrido==4){
									setVar('tarifav', 1, registro.dosdirtv);
									setVar('tarifabl', 1, registro.dosdirbl);
									setVar('tarifaaso', 1, registro.dosdirta);								
								}							
							});
						}
				});
			}

		}
 	</script>

 	<!-- FUNCTION: manejo variables: getVar, setVar /////////////////////////////////////////////// -->
 	<script type="text/javascript">
 		function getVar(pnombre,ptipo){
 			if(ptipo==0){ return $("#"+pnombre).textbox('getValue');}
 			if(ptipo==1){ return $("#"+pnombre).numberbox('getValue');}
 			if(ptipo==2){ return $("#"+pnombre).datebox('getValue');}
 			if(ptipo==3){ return $("#"+pnombre).combobox('getValue');}
 		}

 		function setVar(pnombre,ptipo,pvalor){
 			if(ptipo==0){ $("#"+pnombre).textbox('setValue',pvalor);}
 			if(ptipo==1){ $("#"+pnombre).numberbox('setValue',pvalor);}
 			if(ptipo==2){ $("#"+pnombre).datebox('setValue',pvalor);}
 			if(ptipo==3){ $("#"+pnombre).combobox('setValue',pvalor);}
 		}
 	</script>

 	<!-- FUNCTIONS: para manejo de registro completo ////////////////////////////////////////////// -->
 	<script type="text/javascript">
 		function grabarRegistro(){
 			var xopcion = $("#qopcion").textbox('getValue');

 			// editar registro - actualizar
 			if(xopcion=='E'){
 				iraRegistro('E');
 			}

 			// adicionar registro
 			if(xopcion=='N'){
 				iraRegistro('N');
 			}
 		}

		function eliminar(){
			var row = $("#dglistageneral").datagrid('getSelected');
			if(row){
				$.messager.confirm('Confirm', 'Esta seguro de ELIMINAR registro?', function(r){
					if (r){
						var xid = row['id'];
						var xaccion = 'D';
						var xtabla = 'tblistageneralnew';

						var xcamposCondicion = ['id'];
						var xvaloresCondicion = [xid];

						$.post('json/myFileDB.php', 
							{accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion, 
							 valoresCondicion:xvaloresCondicion},							 
							function(result){
								if(result.success){
									$.messager.alert("Mensaje", "Registro eliminado EXITOSAMENTE!!!");

									// refrescar datos 
									$("#dglistageneral").datagrid('reload');

								}else {
									$.messager.alert('Mensaje', 'problemas!!!-eliminar registro');

								}

							}, 
						'json');
					}
				});
			}else {
				$.messager.alert("Mensaje", "NO hay registro SELECCIONADO!!!");						
			}
		}

 	</script>

 	<script type="text/javascript">
 		$("#cualbarrio").textbox({
 			onChange: function(value){
				var row = $("#dglistageneral").datagrid('getSelected');

				var xcolegio = row['colegio'] ;
				var xbarrio = value;

				mostrarDgRutas(xcolegio,xbarrio)				

 			}
 		})
 	</script>

	<!-- SCRIPT manejo de ruta //////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		function showWin(pnombre){
			$("#"+pnombre).dialog('hcenter');
			$("#"+pnombre).dialog('vcenter');
			$("#"+pnombre).dialog('open');

		}

		function mostrarDgRutas(pcolegio,pbarrio){
			$("#dgdatosveh").datagrid('load', {
				colegio:pcolegio,
				barrio:pbarrio
			});

		}

		function refreshRutas(){
			var row = $("#dglistageneral").datagrid('getSelected');

			var xcolegio = row['colegio'] ;
			var xbarrio = row['barrio'];

			setVar('cualbarrio', 0, xbarrio);			

			mostrarDgRutas(xcolegio,xbarrio);

		}

		function cualRuta() {
			showWin('dlgrutas');
			refreshRutas();

		}

		function selectRuta(){
			var row = $("#dgdatosveh").datagrid('getSelected');

			var xcolegio = row['colegio'];

			var xruta = row['ruta'];
			var xinterno = row['interno'];
			var xconductor = row['nombreconductor'];
			var xcapacidad = row['capacidad'];

			setVar('rruta', 0, xruta);
			setVar('rinterno', 0, xinterno);
			setVar('rconductor', 0, xconductor);
			setVar('rcapacidad', 0, xcapacidad);

			// contar las asignaciones de la ruta seleccionada desde el comienzo
			actualizarValores(xcolegio,xruta);

			$('#dlgrutas').dialog('close');
		}

		function limpiarRutaValores(){
			setVar('rcuantos', 1, 0);
			setVar('rcuantosam', 1, 0);
			setVar('rcuantospm', 1, 0);
			setVar('rcuantos2da', 1, 0);

		}

		function limpiarRuta(){
			$("#frmregistroruta").form('clear');
			setVar('rrecorrido', 3, 1);

			limpiarRutaValores();

		}

		function limpiarRutasTabla(){
			$.messager.confirm("Mensaje", "Seguro de Limpiar RUTAS???", function(r){
				if(r){
					var xrows = $("#dglistageneral").datagrid('getRows');

					//$.messager.alert("Mensaje", "ruta="+xruta+' capacidad='+xcapacidad+' rows='+xrows.length+' recorrido='+xrecorrido);

					for(i=0; i<xrows.length; i++){

						var xid = xrows[i]['id'];

						var wruta = '';
						var wmrutaam = '';
						var wmrutapm = '';
						var wruta2da = '';

						actualizarRutaTabla(xid,wruta,wmrutaam,wmrutapm,wruta2da);

					}

					limpiarRutaValores();

				}
			})

		}

		function asignarUna(psigno){
			// por la grid siempre va estar seleccionada alguna fila
			var row = $("#dglistageneral").datagrid('getSelected');
			var xruta = getVar('rruta', 0);
			var xrecorrido = getVar('rrecorrido', 3);

			if(xruta==''){
				$.messager.alert("Mensaje","ruta VACIA!!!");
			}else {
				var xid = row['id'];

				var wruta = '';
				var wmrutaam = '';
				var wmrutapm = '';
				var wruta2da = '';				

				if(psigno=='+'){				
					if(xrecorrido==1){
						wruta = xruta;
					}else if(xrecorrido==2){
						wmrutaam = xruta;
					}else if(xrecorrido==3){
						wmrutapm = xruta;
					}else if(xrecorrido==4){
						wruta2da = xruta;
					}

					if(validarCantidad(xrecorrido)){
						// aumentar en 1 el contador de rcuantos
						aumentarCuantos(xrecorrido,psigno);
						actualizarRutaTabla(xid,wruta,wmrutaam,wmrutapm,wruta2da);

					}else {
						$.messager.alert("Mensaje", "cantidad EXCEDIDA!!!");
						
					}

				}else {
					aumentarCuantos(xrecorrido,psigno);
					actualizarRutaTabla(xid,wruta,wmrutaam,wmrutapm,wruta2da);

				}

			}

		}

		function asignarRuta(){
			$.messager.confirm("Mensaje", "SEGURO asignar a registro RUTA???", function(r){
				if(r){
					var xruta = getVar('rruta', 0);
					var xcapacidad = getVar('rcapacidad', 0);
					var xrecorrido = getVar('rrecorrido', 3);

					//alert("asignar ruta="+xcapacidad+' '+xrecorrido);

					if(xruta==''){
						$.messager.alert("Mensaje", "ruta VACIA!!!");
						return;

					}					
					
					var xrows = $("#dglistageneral").datagrid('getRows');

					//alert("marcados="+cuantosMarcados(xrecorrido));

					var xmarcados = cuantosMarcados(xrecorrido);
					//var xmarcados = 0;

					var i = 0;
					while(parseInt(xmarcados)<parseInt(xcapacidad) && i<xrows.length){
						var xid = xrows[i]['id'];

						//alert("marcados="+xmarcados+" capacidad="+xcapacidad+" i="+i);

						// validar si esta marcada
						var vruta = xrows[i]['ruta'];
						var vmrutaam = xrows[i]['mrutaam'];
						var vmrutapm = xrows[i]['mrutapm'];
						var vruta2da = xrows[i]['ruta2da'];

						if(vruta=='' && vmrutaam=='' && vmrutapm=='' && vruta2da==''){
							var wruta = '';
							var wmrutaam = '';
							var wmrutapm = '';
							var wruta2da = '';

							if(xrecorrido==1){
								wruta = xruta; 
							}else if(xrecorrido==2){
								wmrutaam = xruta;
							}else if(xrecorrido==3){
								wmrutapm = xruta;
							}else if(xrecorrido==4){
								wruta2da = xruta;
							}

							// validar cantidad x capacidad
							if(validarCantidad(xrecorrido)){
								// aumentar en 1 el contador de rcuantos
								aumentarCuantos(xrecorrido,'+');
								actualizarRutaTabla(xid,wruta,wmrutaam,wmrutapm,wruta2da);

								xmarcados = parseInt(xmarcados) + 1;

							}else {
								$.messager.alert("Mensaje", "cantidad EXCEDIDA!!!");
								return;

							}

							

						}

						i = i + 1;

					}

				}
			})
			
		}

		function actualizarRutaTabla(pid,pruta,pmrutaam,pmrutapm,pruta2da){
			var xaccion = 'U';
			var xtabla = 'tblistageneralnew';			

			var xcamposActualizar = ['ruta','mrutaam','mrutapm','ruta2da'];
			var xvaloresActualizar = [pruta,pmrutaam,pmrutapm,pruta2da];

			var xcamposCondicion = ['id'];
			var xvaloresCondicion = [pid];

			$.post('json/myFileDB.php', 
				{accion:xaccion, tabla:xtabla, camposActualizar:xcamposActualizar, valoresActualizar:xvaloresActualizar,
				 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion}, 
				function(result){
					if(result.success){
						$("#dglistageneral").datagrid('reload');

					}else {	
						$.messager.alert("Mensaje", "Problemas actualizacion de rutas");
					}
				}, 
			'json');

		}

		function aumentarCuantos(precorrido,psigno){
			var xcapacidad = getVar('rcapacidad', 1);

			if(precorrido==1){
				var xcuantos = getVar('rcuantos', 1);				
			}else if(precorrido==2){
				var xcuantos = getVar('rcuantosam', 1);
			}else if(precorrido==3){
				var xcuantos = getVar('rcuantospm', 1);
			}else if(precorrido==4){
				var xcuantos = getVar('rcuantos2da', 1);
			}
			
			if(psigno=='+'){
					var ncuantos = parseInt(xcuantos) + 1;
				
			}else {
				var ncuantos = parseInt(xcuantos) - 1;	
				if(ncuantos<0){
					ncuantos = 0;
					$.messager.alert("Mensaje", "no hay rutas para LIMPIAR!!!");
				}
			}

			if(precorrido==1){
				setVar('rcuantos', 1, ncuantos);
			}else if(precorrido==2){
				setVar('rcuantosam', 1, ncuantos);
			}else if(precorrido==3){
				setVar('rcuantospm', 1, ncuantos);
			}else if(precorrido==4){
				setVar('rcuantos2da', 1, ncuantos);
			}
			
		}

		function validarCantidad(precorrido){
			var xcapacidad = getVar('rcapacidad', 1);

			if(precorrido==1){
				var xcuantos = getVar('rcuantos', 1);				
			}else if(precorrido==2){
				var xcuantos = getVar('rcuantosam', 1);
			}else if(precorrido==3){
				var xcuantos = getVar('rcuantospm', 1);
			}else if(precorrido==4){
				var xcuantos = getVar('rcuantos2da', 1);
			}

			//alert("xcuantos="+xcuantos+' xcapacidad='+xcapacidad);

			if(parseInt(xcuantos)<parseInt(xcapacidad)){
				return true;
			}else {
				return false;
			}

		}

		function cuantosMarcados(precorrido){
			if(precorrido==1){
				var xcuantos = getVar('rcuantos', 1);				
			}else if(precorrido==2){
				var xcuantos = getVar('rcuantosam', 1);
			}else if(precorrido==3){
				var xcuantos = getVar('rcuantospm', 1);
			}else if(precorrido==4){
				var xcuantos = getVar('rcuantos2da', 1);
			}

			return xcuantos;

		}

	
		function actualizarValores(pcolegio,pruta){	
			var xaccion = 'T';
			var xfuncion = 'COUNT';
			var xtabla = 'tblistageneralnew';

			var xcampos = ['id'];
			var xcamposCondicion = ['colegio','ruta'];				
			var xvaloresCondicion = [pcolegio,pruta];

			$.post('json/myFileDB.php',
				{accion:xaccion, funcion:xfuncion, tabla:xtabla, campos:xcampos, 
				 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion}, 
				 function(result){				 	
				 	setVar('rcuantos', 1, result.valor);
				 	actualizarValoresam(pcolegio,pruta);
				 }, 
			'json');

		}

		function actualizarValoresam(pcolegio,pruta){	
			var xaccion = 'T';
			var xfuncion = 'COUNT';
			var xtabla = 'tblistageneralnew';

			var xcampos = ['id'];
			var xcamposCondicion = ['colegio','mrutaam'];				
			var xvaloresCondicion = [pcolegio,pruta];

			$.post('json/myFileDB.php',
				{accion:xaccion, funcion:xfuncion, tabla:xtabla, campos:xcampos, 
				 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion}, 
				 function(result){				 	
				 	setVar('rcuantosam', 1, result.valor);
				 	actualizarValorespm(pcolegio,pruta);
				 }, 
			'json');

		}

		function actualizarValorespm(pcolegio,pruta){	
			var xaccion = 'T';
			var xfuncion = 'COUNT';
			var xtabla = 'tblistageneralnew';

			var xcampos = ['id'];
			var xcamposCondicion = ['colegio','mrutapm'];				
			var xvaloresCondicion = [pcolegio,pruta];

			$.post('json/myFileDB.php',
				{accion:xaccion, funcion:xfuncion, tabla:xtabla, campos:xcampos, 
				 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion}, 
				 function(result){				 	
				 	setVar('rcuantospm', 1, result.valor);
				 	actualizarValores2da(pcolegio,pruta);
				 }, 
			'json');

		}

		function actualizarValores2da(pcolegio,pruta){	
			var xaccion = 'T';
			var xfuncion = 'COUNT';
			var xtabla = 'tblistageneralnew';

			var xcampos = ['id'];
			var xcamposCondicion = ['colegio','ruta2da'];				
			var xvaloresCondicion = [pcolegio,pruta];

			$.post('json/myFileDB.php',
				{accion:xaccion, funcion:xfuncion, tabla:xtabla, campos:xcampos, 
				 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion}, 
				 function(result){				 	
				 	setVar('rcuantos2da', 1, result.valor);				 	
				 }, 
			'json');

		}
	

	</script>

	<!-- SCRIPT manejo de dos direcciones ///////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		function camposDosDir(pestado){
			$("#direccion2").textbox((pestado==0?'disable':'enable'));
			$("#barrio2").textbox((pestado==0?'disable':'enable'));
			$("#comuna2").textbox((pestado==0?'disable':'enable'));
			$("#ciudad2").textbox((pestado==0?'disable':'enable'));

			if(pestado==0){
				setVar('direccion2', 0, '');
				setVar('barrio2', 0, '');				
				setVar('comuna2', 0, '');				
				setVar('ciudad2', 0, '');
				setVar('recorrido', 3, 1);//AGREGADO RECIENTE
				cargarDatosTarifas(); //AGREGADO RECIENTE				
			}else {
				setVar('recorrido', 3, 4);
				setVar('tarifav', 1, '');
				// cargarDatosTarifas();
			}

		}

	</script>

	<script type="text/javascript">
		function generarPDF(){
			var wplanilla = getVar('xplanilla',3);
			
			if(wplanilla==1){
				planillaPDF(1);

			}else if(wplanilla==2){
				planillaPDF(2);

			}else if(wplanilla==3){
				planillaPDF(3);

			}else if(wplanilla==4){
				planillaPDF(4);

			}else if(wplanilla==5){
				planillaPDF(5);

			}else if(wplanilla==6){
				planillaPDF(6);

			}

		}
	</script>

	<!-- SCRIPT: formulario de registro /////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		// valores iniciales
		function inicio(){
			pantalla();
			setVar('nvigencia',0,'2021');
			setVar('codigo',0,'0');
			setVar('fecha',2,actualFecha());  //AGREDO RECIENTE
			setVar('recorrido',3,1);  //AGREGADO RECIENTE

		}

		function limpiarForm(){
			$("#frmDatos").form('clear');
			setVar('nvigencia',0,'2019');
			setVar('fecha',2,actualFecha());
			setVar('recorrido',3,1);

		}

 		function generarBarrios(pbarrio,pbarrio2){
 			var xvigencia = getVar('nvigencia', 0); 			
 			var xcolegio = $("#colegio").combobox('getText');

 			var xurl = "json/combobarrios.php?vigencia="+xvigencia+"&colegio="+xcolegio;
 			$("#barrio").combobox({
 				url:xurl
 			});
 			$("#barrio").combobox('reload');

 			// para el caso de dos direcciones se cargan por si las moscas
 			$("#barrio2").combobox({
 				url:xurl
 			});
 			$("#barrio2").combobox('reload');

 			setVar('barrio', 3, pbarrio);
 			setVar('barrio2', 3, pbarrio2);

 		}

 		function buscarEstudiante(){
 			var xcolegio = $("#colegio").combobox('getText');
 			var xcodigo = getVar('codigo',0);

 			var xaccion = 'C';
 			var xtabla = 'tblistageneralnew';

 			var xcamposCondicion = ['colegio','codigo'];
 			var xvaloresCondicion = [xcolegio,xcodigo];

 			$.post('json/myFileDB.php',
 				{accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion,
 				 valoresCondicion:xvaloresCondicion},
 				 function(result){
 				 	if(result.success){
 				 		var row = result.items;
 				 		$("#frmDatos").form('load',row[0]);

 				 		// limpiar variables de tarifas
 				 		// setVar('recorrido',0,'');
 				 		// setVar('tarifav',0,'');
 				 		// setVar('tarifabl',0,'');
 				 		// setVar('tarifaaso',0,'');

 				 		cargarDatosTarifas();


 				 	}else {
 				 		// alert("naranjas");
 				 	}
 				 },
 			'json');

 		}

 		function iraRegistro(){
 			var url;
 			var xcolegio = $("#colegio").combobox('getText');

 			if (xcolegio=='LICEO CAMPESTRE') {
				$.post('json/reg_maximo.php', 
				{}, 
				function(result){
					if(result.success){
						// var xmax = result.rmaximo;
						var xmax = parseInt(result.rmaximo) + 1;
						$("#codigo").textbox("setValue",xmax);
						alert(xmax);
					}
					else{
						$.messager.alert('Mensaje','error Insertar tbcontratos');
					}
				url = 'json/grabar.php';

				$('#frmDatos').form('submit',{
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
						$.messager.alert('MENSAJE','El contrato ha sido enviado exitosamente.');
						
						contratoPDF();
						$("#frmDatos").form('clear');
						setVar('nvigencia',0,'2019');
						setVar('fecha',2,actualFecha());
						setVar('recorrido',3,1);
					}
				}
				});
			}, 
			'json');
			}
			else{
				var url;
	 			url = 'json/grabar.php';
	 			$('#frmDatos').form('submit',{
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
							$.messager.alert('MENSAJE','El contrato ha sido enviado exitosamente.');
							
							contratoPDF();
							$("#frmDatos").form('clear');
							setVar('nvigencia',0,'2021');
							setVar('fecha',2,actualFecha());
							setVar('recorrido',3,1);
						}
					}
				});
 			}
 			
		}

		function abrir(){
			var barrio = $("#barrio").combobox('getValue');
			var xbarrio2 = $("#barrio2").combobox('getValue');
			var xvigencia = getVar('nvigencia', 0);
			var xcolegio = $("#colegio").combobox('getText');
			var xrecorrido = getVar('recorrido', 3);

			alert(barrio);
			alert(xbarrio2);

			 window.open ('json/tarifas_2.php?vigencia='+xvigencia+'&colegio='+xcolegio+'&barrio='+barrio+'&barrio2='+xbarrio2);
		}

 		// function iraRegistro(){
			// $.messager.confirm('Confirm', 'esta seguro de GRABAR registro?', function(r){
			// 	if (r){
			// 		// perdon por el arrume de campos a actualizar - pendiente super procedimiento					
			// 		var xfecha = getVar('fecha',2);
			// 		var xcolegio = $("#colegio").combobox('getText');
			// 		//var xestado = getVar('estado',0);
			// 		//var xgrado = $("#grado").combobox('getText');
			// 		var xgrado = getVar('id_grado', 3);
			// 		var xcodigo = getVar('codigo',0);

			// 		var xnombre = getVar('nombre',0);
			// 		var xdireccion = getVar('direccion',0);

			// 		var xbarrio = $("#barrio").combobox('getText');
			// 		var xcomuna = getVar('comuna',0);
			// 		var xciudad = getVar('ciudad',0);

			// 		var xdosdir = getVar('xdosdir',3);
			// 		var xdireccion2 = getVar('direccion2',0);
			// 		var xbarrio2 = $("#barrio2").combobox('getText');
			// 		var xcomuna2 = getVar('comuna2',0);
			// 		var xciudad2 = getVar('ciudad2',0);

			// 		var xnombreacudiente = getVar('nombreacudiente',0);
			// 		var xcedula = getVar('cedula',0);					
			// 		var xtelefono = getVar('telefono',0);

			// 		var xcelular1 = getVar('celular1',0);
			// 		var xemail = getVar('email',0);

			// 		var xcelular2 = getVar('celular2',0);
			// 		var xemail2 = getVar('email2',0);
					
			// 		//var xobservaciones = getVar('observaciones',0);

			// 		var xrecorrido = getVar('recorrido',3);

			// 		var xtarifav = getVar('tarifav',1);
			// 		var xtarifabl = getVar('tarifabl',1);
			// 		var xtarifaaso = getVar('tarifaaso',1);

			// 		// var xruta = getVar('ruta',0);
			// 		// var xruta2da = getVar('ruta2da',0);
			// 		// var xmrutaam = getVar('mrutaam',0);
			// 		// var xmrutapm = getVar('mrutapm',0);					
					
			// 		var xcamposActualizar = ['colegio','fecha','codigo','grado','nombre','direccion','barrio','comuna','ciudad','xdosdir','direccion2','barrio2','comuna2','ciudad2','telefono','celular1','celular2','nombreacudiente','cedula','email','recorrido','tarifav','tarifabl','tarifaaso','email2'];

			// 		var xvaloresActualizar = [xcolegio,xfecha,xcodigo,xgrado,xnombre,xdireccion,xbarrio,xcomuna,xciudad,xdosdir,xdireccion2,xbarrio2,xcomuna2,xciudad2,xtelefono,xcelular1,xcelular2,xnombreacudiente,xcedula,xemail,xrecorrido,xtarifav,xtarifabl,xtarifaaso,xemail2];

			// 		$.post('json/myFileDB.php',
			// 			{accion:'I', tabla:'tblistaregistro', campos:xcamposActualizar , valores:xvaloresActualizar },
			// 			function(result){
			// 			if (result.success){
			// 				$.messager.alert('Mensaje', 'registro GRABADO existosamente!!!');

			// 				contratoPDF();


			// 			} else {
			// 				setVar('xsql', 0, result.sql);

			// 				alert(result.sql);

			// 				$.messager.alert('Mensaje', 'problemas!!!-GRABAR registro');
			// 			}
			// 		},'json');
			// 	}
			// });
 		// }
 		var xcolegio = $("#colegio").combobox('getText');
 		function contratoPDF(){
 			var xcolegio = $("#colegio").combobox('getText');

 			if(xcolegio=='CALASANZ'){
				var xcolegio = $("#colegio").combobox('getText');
	 			alert(xcolegio);

	 			// datos para el contrato
	 			var xtarifav = getVar('tarifav',1);
	 			var xnombre = getVar('nombre',0);
	 			var xnombreacudiente = getVar('nombreacudiente',0);
	 			var xcelular1 = getVar('celular1',0);
	 			var xcelular2 = getVar('celular2',0);
	 			var xtelefono = getVar('telefono',0);
	 			var xemail = getVar('email',0);
	 			var xemail2 = getVar('email2',0);
	 			var xrecorrido = getVar('recorrido',0);
	 			var xcodigo = getVar('codigo',0);

	 			alert(xtarifav);

				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

				window.open ("contrato_calasanz.php?colegio="+xcolegio+'&tarifav='+xtarifav+'&nombre='+xnombre+
				'&nombreacudiente='+xnombreacudiente+
				'&celular1='+xcelular1+
				'&celular2='+xcelular2+
				'&telefono='+xtelefono+
				'&email='+xemail+
				'&email2='+xemail2+
				'&recorrido='+xrecorrido+
				'&codigo='+xcodigo, params);
			}
			else if(xcolegio=='HILLSIDE'){
				var xcolegio = $("#colegio").combobox('getText');
	 			alert(xcolegio);

	 			// datos para el contrato
	 			var xtarifav = getVar('tarifav',1);
	 			var xnombre = getVar('nombre',0);
	 			var xnombreacudiente = getVar('nombreacudiente',0);
	 			var xcelular1 = getVar('celular1',0);
	 			var xcelular2 = getVar('celular2',0);
	 			var xtelefono = getVar('telefono',0);
	 			var xemail = getVar('email',0);
	 			var xemail2 = getVar('email2',0);
	 			var xrecorrido = getVar('recorrido',0);
	 			var xcodigo = getVar('codigo',0);

	 			alert(xtarifav);

				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

				window.open ("contrato_hillside.php?colegio="+xcolegio+'&tarifav='+xtarifav+'&nombre='+xnombre+
				'&nombreacudiente='+xnombreacudiente+
				'&celular1='+xcelular1+
				'&celular2='+xcelular2+
				'&telefono='+xtelefono+
				'&email='+xemail+
				'&email2='+xemail2+
				'&recorrido='+xrecorrido+
				'&codigo='+xcodigo, params);
			}
 			else if (xcolegio != 'LICEO CAMPESTRE') {
 				alert('este contrato es de otro colegio');
 			
	 			var xcolegio = $("#colegio").combobox('getText');
	 			alert(xcolegio);

	 			// datos para el contrato
	 			var xtarifav = getVar('tarifav',1);
	 			var xnombre = getVar('nombre',0);
	 			var xnombreacudiente = getVar('nombreacudiente',0);
	 			var xcelular1 = getVar('celular1',0);
	 			var xcelular2 = getVar('celular2',0);
	 			var xtelefono = getVar('telefono',0);
	 			var xemail = getVar('email',0);
	 			var xemail2 = getVar('email2',0);
	 			var xrecorrido = getVar('recorrido',0);

	 			alert(xtarifav);

				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

				window.open ("contrato.php?colegio="+xcolegio+'&tarifav='+xtarifav+'&nombre='+xnombre+
				'&nombreacudiente='+xnombreacudiente+
				'&celular1='+xcelular1+
				'&celular2='+xcelular2+
				'&telefono='+xtelefono+
				'&email='+xemail+
				'&email2='+xemail2+
				'&recorrido='+xrecorrido, params);
			}
			
			else{
				alert('este contrato es del liceo meraani');
				var xcolegio = $("#colegio").combobox('getText');
	 			alert(xcolegio);

	 			// datos para el contrato
	 			var xtarifav = getVar('tarifav',1);
	 			var xnombre = getVar('nombre',0);
	 			var xnombreacudiente = getVar('nombreacudiente',0);
	 			var xcelular1 = getVar('celular1',0);
	 			var xcelular2 = getVar('celular2',0);
	 			var xtelefono = getVar('telefono',0);
	 			var xemail = getVar('email',0);
	 			var xemail2 = getVar('email2',0);
	 			var xrecorrido = getVar('recorrido',0);
	 			var xcodigo = getVar('codigo',0);

	 			alert(xtarifav);

				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

				window.open ("contrato_liceomerani.php?colegio="+xcolegio+'&tarifav='+xtarifav+'&nombre='+xnombre+
				'&nombreacudiente='+xnombreacudiente+
				'&celular1='+xcelular1+
				'&celular2='+xcelular2+
				'&telefono='+xtelefono+
				'&email='+xemail+
				'&email2='+xemail2+
				'&recorrido='+xrecorrido+
				'&codigo='+xcodigo, params);
			}
 		}

 		function consecutivoEst(){
 			var xcolegio = $("#colegio").combobox('getText');

 			if (xcolegio=='LICEO CAMPESTRE') {
				$.post('json/reg_maximo.php', 
				{}, 
				function(result){
					if(result.success){
						// var xmax = result.rmaximo;
						var xmax = parseInt(result.rmaximo) + 1;
						$("#codigo").textbox("setValue",xmax);
						alert(xmax);
					}
					else{
						$.messager.alert('Mensaje','error Insertar tbcontratos');
					}
				}, 
			'json');
			}
			else{
				alert('es otro colegio');
			}

 		}

	</script>
</body>
</html>