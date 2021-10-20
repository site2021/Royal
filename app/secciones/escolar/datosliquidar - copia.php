<?
session_start();
$usuario = $_SESSION['usuario'];

include '../../control/conex.php';

$sqlc = mysqli_query($conexion, "SELECT ciudad, nombre, costos  FROM tbusuarios WHERE usuario='$usuario'");
$rowc = mysqli_fetch_row($sqlc);

$sede = $rowc[0];
$nombre = $rowc[1];
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

	<style type="text/css">
		.botonera {
			background:#D8D8D8;
			margin-top:1px;
			margin-bottom:1px;
			width:100%;
			height:47px;	
		}
		body {
			padding:10px;
		}
		.hc {
			background: #92D050;				
		}		
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			// incializar los filtros

			addDgContainer();
			definirDg(1,'LA SALLE','Febrero','646');
			valoresFiltros(1,'LA SALLE','*','646');			

		})
	</script>

	<!-- filter Lib - /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$(function(){			
			$("#dgdatosliquidar").datagrid('enableFilter');

		})
	</script>

</head>
<body>
	<!-- variables de control para codigo ///////////////////////////////////////////////////////// -->
	<div style="display:block">

	</div>

	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
	    <div class="bordes">	 		
 			<div class="ritem">
	 			<label style="width:55px">Colegio:</label>
				<input id="fcolegio" name="fcolegio" class="easyui-combobox"  value=''
					url="json/combocolegios.php" style="width:120px"
					data-options="editable:false,valueField:'codigo',textField:'nombre'">
	 			<label style="width:35px">Mes:</label>
				<input id="fmes" name="fmes" class="easyui-combobox"  value=''
					url="json/combolistameses.php" style="width:120px"
					data-options="editable:false,valueField:'codigo',textField:'nombre'">
	 			<label style="width:50px">Codigo:</label>
				<input id="fcodigo" name="fcodigo" class="easyui-combobox" value=''
					url="" style="width:80px"
					data-options="valueField:'codigo',textField:'nombre'">
 			</div>
	        <div class="tdiv" style="margin-left:15px">
	         	<a id="btnBuscar" name="btnBuscar" class="boton" onclick="">
	         		<img src="icons/Search.png" >
	         	</a>
	         	<span class="tooltiptext">BUSCAR registro</span>
	        </div>
	        <div class="tdiv" style="margin-left:15px">
	         	<a id="btnDatosCodigo" name="btnDatosCodigo" class="boton" onclick="datosCodigo()">
	         		<img src="icons/Write.png" >
	         	</a>
	         	<span class="tooltiptext">editar DATOS</span>
	        </div>

	    </div>

		<div class="bordes" style="margin-left:50px">
	        <div class="tdiv">
	         	<a id="btnNuevo" name="btnNuevo" class="boton" onclick="mostrarRegistro('N')">
	         		<img src="icons/Plus.png" >
	         	</a>
	         	<span class="tooltiptext">NUEVO registro (Alt+N)</span>
	        </div>
	        <div class="tdiv">
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="mostrarRegistro('E')">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">EDITAR registro (Alt+E)</span>
	        </div>
	    </div>	    
	    <div class="bordes" style="margin-left:50px">
	        <div class="tdiv">
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="eliminarRegistro()">
	         		<img src="icons/Trash.png" >
	         	</a>
	         	<span class="tooltiptext">ELIMINAR registro</span>
	        </div>	    	
	    </div>
	    <div class="bordes" style="margin-left:50px">
	        <div class="tdiv">
	         	<a id="btnMorosos" name="btnMorosos" class="boton" onclick="mostrarMorosos()">
	         		<img src="icons/Alarme.png" >
	         	</a>
	         	<span class="tooltiptext">mostrar MOROSOS</span>
	        </div>
	        <div class="tdiv">
	         	<a id="btnExcel" name="btnExcel" class="boton" onclick="excelMorosos()">
	         		<img src="icons/Excel32.png" >
	         	</a>
	         	<span class="tooltiptext">reporte Excel MOROSOS</span>
	        </div>
	    </div>	    
        <div style="display:none">
			<input id="ropcion" name="ropcion" class="easyui-textbox"
				   style="width:40px"
				   data-options="">
        </div>
	</div>

	<div id="containerdg">		
	</div>

	<!-- DIALOG: editar registro ////////////////////////////////////////////////////////////////// -->
	<div id="dlgdatos" class="easyui-dialog" headerCls="hc"
 		data-options="modal:true,closed:true" buttons="#dlg-buttons"
 		style="padding:5px;width:53%">
		<!-- variable de control NUEVO/EDITAR -->	
 		<div style="display:none">
 			<input id="qopcion" name="qopcion" class="easyui-textbox" style="width:50px">
 			<input id="rid" name="rid" class="easyui-textbox" style="width:50px">
 		</div>	

 		<form id="frmDatos">
	 		<div class="ritem">
	 			<label>Colegio:</label>
				<input id="colegio" name="colegio" class="easyui-combobox" 
					url="json/combocolegios.php" style="width:150px"
					data-options="editable:false,valueField:'codigo',textField:'nombre'">
	 			<label>Codigo:</label>
				<input id="codigo" name="codigo" class="easyui-textbox" 
				   	data-options="disabled:false,
						iconWidth:  22,
						iconAlign: 'left',
						icons: [{
							iconCls: 'icon-cancel',
			                handler: function(e){
				                	$(e.data.target).textbox('clear');
				                	$('#codigo').next().find('input').focus();
				                }	
						}]
			   ">
	 			<label>Fecha:</label>
				<input id="fechapago" name="fechapago" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100">
	 		</div>

	 		<div class="ritem">
	 			<label>Mes:</label>
				<input id="mes" name="mes" class="easyui-combobox" 
					url="" style="width:150px"
					data-options="editable:false,valueField:'codigo',textField:'nombre'">
				<label>Pagos:</label>					
				<input id="pagado" name="pagado" class="easyui-numberbox"
					style="width:110px"
					data-options="disabled:true,precision:0,groupSeparator:','">	

	 		</div>	 		

	 		<div class="ritem">
	 			<label>Estudiante:</label>
	 			<input id="nombre" name="nombre" class="easyui-textbox" style="width:558px"
	 				data-options="disabled:true"> 
	 		</div>
	 		<div class="ritem">
	 			<label>Recorrido:</label>
				<select id="recorrido" name="recorrido" class="easyui-combobox" style="width:150px;"
					data-options="disabled:true">
				    <option value="1">RUTA COMPLETA</option>
				    <option value="2">MEDIA RUTA AM</option>
				    <option value="3">MEDIA RUTA PM</option>
				    <option value="4">DOS DIRECCIONES</option>
				</select>
				<label>Ruta:</label>
				<input id="wruta" name="wruta" class="easyui-combobox"
					url="" style="width:70px"
					data-options="valueField:'id',textField:'nombre'">					
	 			<label>Grado:</label>
	 			<input id="grado" name="grado" class="easyui-textbox"
	 				data-options="disabled:true"> 
	 		</div>

	 		<div class="ritem">
	 			<label>ValorLiq:</label>
				<input id="tarifav" name="tarifav" class="easyui-numberbox"
					style="width:110px"
					data-options="disabled:true,precision:0,groupSeparator:','">	
	 			<label>Pago:</label>
				<input id="pago" name="pago" class="easyui-numberbox"
					style="width:110px"
				   	data-options="precision:0,groupSeparator:','">					
	 			<label>Diferencia:</label>
				<input id="diferencia" name="diferencia" class="easyui-numberbox"
					style="width:110px"
					data-options="disabled:true,precision:0,groupSeparator:','">
	 		</div>

	 		<div class="ritem">
	 			<label>Observacion:</label>
	 			<input id="observacion" name="observacion" class="easyui-textbox" style="width:558px"> 
	 		</div>
	 	</form>	
		<div id="dlg-buttons">
			<div class="botonera">
		        <div class="tdiv" style="float:right">
		         	<a id="btnGrabarDato" name="btnGrabarVenta" class="boton" onclick="grabarRegistro()">
		         		<img src="icons/Ok.png" >
		         	</a>
		         	<!-- <span class="tooltiptext">Grabar</span> -->
		        </div>

		        <div class="tdiv" style="float:right">
		         	<a id="btnCancelarDato" name="btnCancelarVenta" class="boton" onclick="closePantalla('dlgdatos')">
		         		<img src="icons/Cancel.png" >
		         	</a>
		         	<!-- <span class="tooltiptext">Cancelar</span> -->
		        </div>
			</div>		    
		</div>

 	</div>

 	<!-- DIALOG: datos del chinche desde listageneral ///////////////////////////////////////////// -->
	<div id="dlgregistro" class="easyui-dialog" headerCls="hc" title="DATOS CODIGO"
 		data-options="modal:true,closed:true" buttons="#dlg-buttons-datos"
 		style="padding:5px;width:85%">

 		<form id="frmDatosRegistro">
	 		<div class="ritem">
	 			<label>Colegio:</label>
				<input id="colegio" name="colegio" class="easyui-combobox" 
					   url="json/combocolegios.php" style="width:150px"
					   data-options="disabled:true,editable:false,valueField:'codigo',textField:'nombre'">
	 			<label>Fecha:</label>
				<input id="fecha" name="fecha" class="easyui-datebox" 
					data-options="disabled:true,formatter:myformatter,parser:myparser,width:100">
	 			<label>Codigo:</label>
				<input id="codigo" name="codigo" class="easyui-textbox" 
				   data-options="disabled:true">
	 			<label>Estado:</label>
				<input id="estado" name="estado" class="easyui-textbox" style="width:50px" 
				   data-options="disabled:true">
	 			<label>Grado:</label>
				<input id="id_grado" name="id_grado" class="easyui-combobox" 
					   url="json/combogrados.php" style="width:100px"
					   data-options="disabled:true,editable:false,valueField:'codigo',textField:'nombre'">
	 		</div>

	 		<div class="ritem">
	 			<label>Nombre:</label>
	 			<input id="nombre" name="nombre" class="easyui-textbox" style="width:403px" 
	 					data-options="disabled:true"> 
	 			<label>Direccion:</label>
	 			<input id="direccion" name="direccion" class="easyui-textbox" style="width:403px" 
	 					data-options="disabled:true"> 
	 		</div>
	 		<div class="ritem">
	 			<label>Barrio:</label>
				<input id="barrio" name="barrio" class="easyui-combobox" 
					url="" style="width:236px"
					data-options="disabled:true,editable:true,valueField:'codigo',textField:'nombre'">
	 			<label>Coumna:</label>
	 			<input id="comuna" name="comuna" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true"> 
	 			<label>Ciudad:</label>
	 			<input id="ciudad" name="ciudad" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true">
	 		</div>
	 		<div class="ritem">
	 			<label>2da.Dir.:</label>
				<select id="xdosdir" name="xdosdir" class="easyui-combobox" style="width:50px;"
					data-options="disabled:true">
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
					data-options="disabled:true,editable:true,valueField:'codigo',textField:'nombre'">
	 			<label>Coumna:</label>
	 			<input id="comuna2" name="comuna2" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true"> 
	 			<label>Ciudad:</label>
	 			<input id="ciudad2" name="ciudad2" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true">
	 		</div>
	 		<div class="ritem">
	 			<label>Telefono:</label>
	 			<input id="telefono" name="telefono" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true"> 
	 			<label>Celular:</label>
	 			<input id="celular1" name="celular1" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true"> 
	 			<label>Celular:</label>
	 			<input id="celular2" name="celular2" class="easyui-textbox" style="width:236px" 
	 				data-options="disabled:true">
	 		</div>
	 		<div class="ritem">
	 			<label>Acudiente:</label>
	 			<input id="nombreacudiente" name="nombreacudiente" class="easyui-textbox" style="width:350px" 
	 				data-options="disabled:true"> 
	 			<label>Cedula:</label>
	 			<input id="cedula" name="cedula" class="easyui-textbox" style="width:150px" 
	 				data-options="disabled:true"> 
	 			<label>email:</label>
	 			<input id="email" name="email" class="easyui-textbox" style="width:205px" 
	 				data-options="disabled:true">
	 		</div>
	 		<div class="ritem">
	 			<label>Observacion:</label>
	 			<input id="observaciones" name="observaciones" class="easyui-textbox" style="width:500px" 
	 				data-options="disabled:true"> 
	 		</div>
	 		<div class="ritem">
	 			<label>Recorrido:</label>
				<select id="recorrido" name="recorrido" class="easyui-combobox" style="width:150px;"
					data-options="disabled:true">
				    <option value="1">RUTA COMPLETA</option>
				    <option value="2">MEDIA RUTA AM</option>
				    <option value="3">MEDIA RUTA PM</option>
				    <option value="4">DOS DIRECCIONES</option>
				</select>
				<label>T.Vigente:</label>
				<input id="tarifav" name="tarifav" class="easyui-numberbox" 
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','">
				<label>T.BL:</label>
				<input id="tarifabl" name="tarifabl" class="easyui-numberbox" 
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','">
	 		</div>
	 		<div id="rfm">
	 			<label>Asignacion Rutas</label>
	 		</div>
	 		<div class="ritem">
	 			<label>T.Asociado:</label>
				<input id="tarifaaso" name="tarifaaso" class="easyui-numberbox" 
					   style="width:110px"
					   data-options="disabled:true,precision:0,groupSeparator:','">
	 		</div>
			<div class="ritem">
				<label>Ruta:</label>
				<input id="ruta" name="ruta" class="easyui-textbox" style="width:50px"
					data-options="disabled:true">
				<label>Ruta 2da:</label>
				<input id="ruta2da" name="ruta2da" class="easyui-textbox" style="width:50px" 
					data-options="disabled:true">
				<label>M.Ruta AM:</label>
				<input id="mrutaam" name="mrutaam" class="easyui-textbox" style="width:50px" 
					data-options="disabled:true">
				<label>M.Ruta PM:</label>
				<input id="mrutapm" name="mrutapm" class="easyui-textbox" style="width:50px" 
					data-options="disabled:true">
			</div>

 		</form>
		<div id="dlg-buttons-datos">
			<div class="botonera">
		        <div class="tdiv" style="float:right">
		         	<a id="btnCancelarDato" name="btnCancelarVenta" class="boton" onclick="closePantalla('dlgregistro')">
		         		<img src="icons/Cancel.png" >
		         	</a>		         	
		        </div>
			</div>		    
		</div>

	</div>

	<!-- FUNCTION: formatos de pantalla ///////// -->
	<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		#rfm{
			float:left;			
			width: 98%;
			padding: 3% 0 1% 2%;			
			font-size: 16px;
			font-weight: bold;
			color: #666;
			border-bottom: 1px solid #c0c0c0;
		}		
		.ritem {
			float:left;
			margin-top:10px;
			text-align: right;
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

	<!-- FUNCTION: formato fechas /////////////// -->
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

        function getHoy(){
			var  today = new Date();
			var m = today.getMonth() + 1;
			var mes = (m < 10) ? '0' + m : m;
			var xfecha = today.getFullYear() + '-' + mes + '-' + today.getDate();

			return xfecha;

        }        
	</script>

	<!-- FUNCTION: get, set variables /////////// -->
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

		function setFocus(xcampo){
			$('#'+xcampo).next().find('input').focus();
		}
	</script>

	<!-- FUNCTION: onchange, onselect /////////// -->
	<script type="text/javascript">
		$("#colegio").combobox({
			onSelect: function(value){

				var xcolegio = getVar('colegio', 3);
				setVar('fcolegio', 3, xcolegio);

				$('#codigo').next().find('input').focus();
			}
		});

		$("#codigo").textbox({
			onChange: function(value){
				if(value==''){					
					$("#frmDatos").form('clear');
					addRutas('','');

					setVar('fechapago', 2, getHoy());

				}else {
					var xopcion = $("#qopcion").textbox('getValue');
					if(xopcion=='N'){

						// traer datos desde tblistageneral
						traerDatos(value);

						setVar('fcodigo', 3, value);

						$('#mes').next().find('input').focus();
					}
				}
			}
		});

		$('#fechapago').datebox({
			onSelect: function(date){
				//alert(date.getFullYear()+":"+(date.getMonth()+1)+":"+date.getDate());
				var xopcion = $("#qopcion").textbox('getValue');				

				if(xopcion=='N'){
					xmes = date.getMonth()+1;
					$("#mes").combobox('setValue',xmes);
					$('#valorpago').next().find('input').focus();
				}
			}
		});
		
		$("#pago").numberbox({
			onChange: function(){
				var xtarifa = getVar('tarifav', 1);
				var xpagado = getVar('pagado',1);
				var xpago = getVar('pago', 1);				

				var xdiferencia = xtarifa - xpagado - xpago;

				setVar('diferencia', 1, xdiferencia);

			}
		});

		$("#mes").combobox({
			onSelect: function(){
				$('#pago').next().find('input').focus();

				// al seleccionar un mes sumar pagos realizados del mes
				sumarPagos();

			}
		});

		$("#pagado").numberbox({
			onChange: function(value){
				calcularDiferencia();

			}
		});

	</script>

 	<script type="text/javascript">
 		function pantalla(xopcion){
 			$("#frmDatos").form('clear');
 			// variable de control NUEVO/EDITAR
 			$("#qopcion").textbox('setValue', xopcion);
			$("#dlgdatos").dialog('hcenter');
			$("#dlgdatos").dialog('vcenter');
			$("#dlgdatos").dialog('open').dialog('setTitle','REGISTRO - '+(xopcion=='N'?'NUEVO':'EDITAR'));
 		}

 		function showPantalla(pnombre){
 			$("#"+pnombre).dialog('hcenter');	
 			$("#"+pnombre).dialog('vcenter');	
 			$("#"+pnombre).dialog('open');	
 		}

 		function closePantalla(pnombre){
 			$("#"+pnombre).dialog('close');	
 		}

 		function mostrarRegistro(xopcion){
 			pantalla(xopcion);

 			if(xopcion=='E'){
 				editarDatos();
 			}

 			if(xopcion=='N'){	
 				insertarDatos();
 			}

 		}

 		function insertarDatos(){
 			$("#frmDatos").form('clear');
 			setVar('fechapago', 2, getHoy());

 		}

 		function editarDatos(){
 			var row = $("#dgdatosliquidar").datagrid('getSelected');
 			$("#frmDatos").form('load', row);

 			// parche de la tarifabl x tarfiav
 			var xtarifabl = row['tarifabl'];
 			setVar('tarifav',1,xtarifabl);

 			// adicionar id de tbdatosliquidar para update
 			$("#rid").textbox('setValue', row['id']);

 		}

 		function traerDatos(xcodigo){
 			//alert("traer DATOS de "+xcodigo);
			var url="json/datoscodigo_getdata.php?codigo="+xcodigo;
			$.getJSON(url,function(registros){
					if (registros.length == 0){
						$.messager.alert("No existen datos");
					}		
					else {
						$.each(registros, function(i,registro){							

							$("#frmDatos").form('load', registro);

							// actualizar la ruta segun vst_listageneral
							var xcolegio = registro.colegio;
							var xcodigo = registro.codigo;

							// actualizar fcolegio para ver demas registros
							setVar('fcolegio',3,xcolegio);
							setVar('fcodigo',0,xcodigo);

							actualizarDatosLiquidar();

							addRutas(xcolegio,xcodigo);
							
							// actualizar valorpago = valorcuota
							var xcuota = registro.tarifav;
							setVar('pago', 1, xcuota);

							setVar('diferencia', 1, 0);

							// actualizar meses restantes en combo -mes-
							mostrarMeses(xcodigo);

						});
					}
			});

 		}

 		// mostrar meses en combo mes x codigo en adicionar registro
 		function mostrarMeses(pcodigo){
 			var xopcion = $("#qopcion").textbox('getValue');

 			if(xopcion=='N'){
 				var xurl = 'json/combomeses.php?codigo='+pcodigo;
 				
 			}else {
 				var xurl = 'json/combomeses.php?codigo=x'; 				

 			}
 			
 			$("#mes").combobox({
 				url: xurl
 			}); 			

 		}
 	</script>

 	<!-- FUNCTION: opciones de grabar, modificar y borrar de dgdatosliquidar ////////////////////// -->
 	<script type="text/javascript">
 		function eliminarRegistro(){
 			var row = $("#dgdatosliquidar").datagrid('getSelected');
 			var xid = row['id'];
 			var xcodigo = row['codigo'];

 			var xtabla = 'tbdatosliquidar';
 			var xcamposCondicion = ['id'];
 			var xvaloresCondicion = [xid];

			$.messager.confirm('Confirm', 'esta seguro de ELIMINAR registro?', function(r){
				if (r){
					$.post('json/myFileDB.php',
						{accion:'D', tabla:xtabla, camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion},
						function(result){
						if (result.success){
							$.messager.alert('Mensaje', 'registro eliminado EXITOSAMENTE!!!' );	
							
							actualizarDatosLiquidar();
							

						} else {
							$.messager.alert('Mensaje', result.errorMsg );
						}
					},'json');					
				}
			});

 		}

 		function grabarRegistro(){
 			var xopcion = $("#qopcion").textbox('getValue');
 			
 			if(xopcion=='N'){
 				nuevoRegistro();
 			}
 			if(xopcion=='E'){
 				editarRegistro();
 			}


 		}

 		function editarRegistro(){
 			var xtabla = 'tbdatosliquidar';

 			var xcolegio = getVar('colegio', 0);
 			var xcodigo = getVar('codigo', 0) ;
 			var xfecha = getVar('fechapago', 2);
 			
 			var xnombre = getVar('nombre', 0);
 			var xrecorrido = $("#recorrido").combobox('getText');

 			//var xruta = getVar('ruta', 0);
 			var xruta = $("#wruta").combobox('getText');
 			 			
 			var xgrado = getVar('grado', 0);

 			var xtarifa = getVar('tarifav', 1);
 			var xpago = getVar('pago', 1);
 			var xdiferencia = getVar('diferencia', 1);

 			var xmes = $("#mes").combobox('getText');
 			var xobservacion = getVar('observacion', 0);

 			var xcamposActualizar = ['colegio','codigo','fechapago','nombre','recorrido','ruta','grado','tarifabl','pago',
 									 'diferencia','observacion','mes'];
 			var xvaloresActualizar = [xcolegio,xcodigo,xfecha,xnombre,xrecorrido,xruta,xgrado,xtarifa,xpago,xdiferencia,
 									  xobservacion,xmes];

 			var xid = $("#rid").textbox('getValue');

 			var xcamposCondicion = ['id'];
 			var xvaloresCondicion = [xid];

			$.messager.confirm('Confirm', 'esta seguro de ACTUALIZAR registro?', function(r){
				if (r){					
					$.post('json/myFileDB.php',
						{accion:'U', tabla:xtabla, camposActualizar:xcamposActualizar, valoresActualizar:xvaloresActualizar,
						 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion },						 
						function(result){
						if (result.success){
							$.messager.alert('Mensaje', 'registro actualizado EXITOSAMENTE!!!' );
							
							// llamar function de actualizacion de datos de la dg
							actualizarDatosLiquidar();

							closePantalla("dlgdatos");
							
						} else {
							$.messager.alert('Mensaje', result.errorMsg );
						}
					},'json');
				}
			});

 		}

 		function nuevoRegistro(){
 			var xtabla = 'tbdatosliquidar';

 			var xcolegio = getVar('colegio', 0);
 			var xcodigo = getVar('codigo', 0) ;
 			var xfecha = getVar('fechapago', 2);
 			
 			var xnombre = getVar('nombre', 0);
 			var xrecorrido = $("#recorrido").combobox('getText');

 			//var xruta = getVar('ruta', 0);
 			var xruta = $("#wruta").combobox('getText');

 			var xgrado = getVar('grado', 0);

 			var xtarifa = getVar('tarifav', 1);
 			var xpago = getVar('pago', 1);
 			var xdiferencia = getVar('diferencia', 1);

 			var xmes = $("#mes").combobox('getText');
 			var xobservacion = getVar('observacion', 0);

 			var xcampos = ['colegio','codigo','fechapago','nombre','recorrido','ruta','grado','tarifabl','pago','diferencia',
 						   'observacion','mes'];
 			var xvalores = [xcolegio,xcodigo,xfecha,xnombre,xrecorrido,xruta,xgrado,xtarifa,xpago,xdiferencia,xobservacion,xmes];

			$.messager.confirm('Confirm', 'esta seguro de GRABAR registro?', function(r){
				if (r){					
					$.post('json/myFileDB.php',
						{accion:'I', tabla:xtabla, campos:xcampos, valores:xvalores },
						function(result){
						if (result.success){
							$.messager.alert('Mensaje', 'registro grabado EXITOSAMENTE!!!' );
							
							// llamar funcion de actualizacion de datos
							actualizarDatosLiquidar();

							//closePantalla("dlgdatos");

						} else {
							$.messager.alert('Mensaje', result.errorMsg );
						}
					},'json');				
				}
			});

 		}
 	</script>

 	<!-- SCRIPT onChange de elementos de filtros ////////////////////////////////////////////////// -->
 	<script type="text/javascript">
 		$("#fcodigo").combobox({
 			onChange: function(){
 				var xcodigo = $("#fcodigo").combobox('getText');

 				//alert("codigo="+xcodigo);
 				actualizarDatosLiquidar();

 			}
 		});

 		$("#fmes").combobox({
 			onChange: function(){ 				
 				actualizarDatosLiquidar();

 			}
 		});


 		$("#fcolegio").combobox({
 			onChange: function(){
 				var xcolegio = $("#fcolegio").combobox('getText'); 				
 				generarListaCodigos(xcolegio);
 				actualizarDatosLiquidar();

 			}
 		});


 	</script>

 	<!-- SCRIPT manejo de filtros ///////////////////////////////////////////////////////////////// -->
 	<script type="text/javascript"> 
 		// generar lista de codigo x colegio para el combo 'fcodigos' ///////////////////////////// -->
 		function generarListaCodigos(pcolegio){
 			var xurl = "json/combolistacodigos.php?colegio="+pcolegio;

 			$("#fcodigo").combobox({
 				url:xurl
 			});

 			$("#fcodigo").combobox('reload');

 		}

 		// Compadre esto es solo para los valores iniciales ///////////////////
 		function valoresFiltros(pvalue, ptext, pmes, pcodigo){ 			
 			$("#fcolegio").combobox('setValue',pvalue);
 			$("#fcolegio").combobox('setText',ptext);

 			setVar('fmes', 3, pmes);

 			generarListaCodigos('LA SALLE');
 			setVar('fcodigo', 3, pcodigo);

 			//mostrarDatosLiquidar('LA SALLE','*','602');
 			//definirDg('LA SALLE','*','646');

 		}
 		
 		// llamado previo a mostrarDatosLiquidar x el llamado inicial 
 		function actualizarDatosLiquidar(){
 			var xcolegio = $("#fcolegio").combobox('getText');
 			var xmes = $("#fmes").combobox('getText');
 			var xcodigo = $("#fcodigo").combobox('getText');

 			mostrarDatosLiquidar(xcolegio,xmes,xcodigo);

 		}
		
 		function mostrarDatosLiquidar(pcolegio,pmes,pcodigo){
 			if(pmes=='*' && pcodigo=='*'){
 				$.messager.alert("Mensaje", "MUCHOS datos para mostrar!!!");
 			}

			addDgContainer();
			definirDg(1,pcolegio,pmes,pcodigo);

 		}

 	</script>

 	<script type="text/javascript">
 		function calcularDiferencia(){ 
 			var xtarifav = getVar('tarifav',1);
 			var xpagado = getVar('pagado',1);

			var xdiferencia = xtarifav - xpagado;			

			setVar('pago', 1, xdiferencia);

 		}

 		function sumarPagos(){
 			var xaccion = 'T';
 			var xfuncion = 'SUM';
 			var xtabla = 'tbdatosliquidar';

 			var xcolegio = $("#colegio").combobox('getText');
 			var xmes = $("#mes").combobox('getText');
 			var xcodigo = getVar('codigo',0); 			

 			var xcampos = ['pago'];

 			var xcamposCondicion = ['colegio','mes','codigo'];
 			var xvaloresCondicion = [xcolegio,xmes,xcodigo];

 			$.post('json/myFileDB.php',
 				{accion:xaccion,funcion:xfuncion,tabla:xtabla,campos:xcampos,camposCondicion:xcamposCondicion,
 				 valoresCondicion:xvaloresCondicion}, 
 				function(result){
 					if(result.success){
 						if(result.valor==null){
 							setVar('pagado',1,0);	
 						}else {
 							setVar('pagado',1,result.valor);
 						}

 					}
 				}, 
 			'json');

 		}
 	</script>

 	<script type="text/javascript">
		function mostrarMorosos(){
			var xcolegio = $("#fcolegio").combobox('getText');
			var xmes = $("#fmes").combobox('getText');

			if(xmes=='*'){
				$.messager.alert("Mensaje","mes no DEFINIDO!!!");
				return;
			}

			addDgContainer();
			definirDg(2,xcolegio,xmes,'');

			// limpiar codigo
			setVar('fcodigo',0,'');

		}
 	</script>

 	<!-- SCRIPT definicion dinamica de la datagrid - datosliquidar, morosos (paginacion+filtro) -->
 	<script type="text/javascript">
 		function definirDg(pcual,pcolegio,pmes,pcodigo){
 			if(pcual==1){ 				
				var xurl = 'json/datosliquidar_getdata.php?colegio='+pcolegio+
						   '&mes='+pmes+'&codigo='+pcodigo;
			}
			if(pcual==2){
				var xurl = 'json/morosos_getdata.php?colegio='+pcolegio+'&mes='+pmes;
			}

			$("#dgdatosliquidar").datagrid({					
				headerCls: "hc",
				pagination: 'true',
				singleSelect: 'true',
				showFooter:'true',
				url: xurl,
				columns: [[
					{field:'id', title:'ID', width:50, hidden:true},
					{field:'colegio', title:'Colegio', width:100 },
					{field:'fechapago', title:'Fecha', width:100},
					{field:'codigo', title:'Codigo', width:50},
					{field:'nombre', title:'Nombre', width:200},
					{field:'recorrido', title:'Recorrido', width:150},
					{field:'ruta', title:'Ruta', width:50},
					{field:'grado', title:'Grado', width:50},
					{field:'tarifabl', title:'Tarifa', align:'right', width:100,
						formatter: function(value,row){
						return accounting.formatNumber(value,0);}
					},
					{field:'pago', title:'Pago', align:'right', width:100,
						formatter: function(value,row){
						return accounting.formatNumber(value,0);}
					},
					{field:'diferencia', title:'Diferencia', align:'right', width:100,
						formatter: function(value,row){
						return accounting.formatNumber(value,0);}
					},
					{field:'mes', title:'Mes', width:100},
					{field:'observacion', title:'Observacion', width:200}
				]]
			}).datagrid('enableFilter');

 		}

		function addDgContainer(){
			$("#containertable").remove();

			var $newdiv1 = $('<div id="containertable"><table id="dgdatosliquidar"></table></div>' );
			
				newdiv2 = document.createElement( "div" ),
				existingdiv1 = document.getElementById("containerdg");		
				
			$("#containerdg").append( $newdiv1, newdiv2);			

		}

		function excelMorosos(){
			var xcolegio = $("#fcolegio").combobox('getText');
			var xmes = $("#fmes").combobox('getText');

			if(xmes=='*'){
				$.messager.alert("Mensaje","mes no DEFINIDO!!!");
				return;
			}

			location.assign("morososExcel.php?colegio="+xcolegio+"&mes="+xmes);


		}

		function addRutas(pcolegio,pcodigo){
			var xurl = 'json/comborutascodigo.php?colegio='+pcolegio+'&codigo='+pcodigo;

			$("#wruta").combobox({
				url:xurl
			});
			$("#wruta").combobox('reload');

			if(pcolegio!='' && pcodigo!=''){
				$("#wruta").combobox('setValue',1);

			}

		}
 	</script>

 	<!-- SCRIPT: para editar datos del chinche //////////////////////////////////////////////////// -->
 	<script type="text/javascript">
 		function datosCodigo(){
 			showPantalla('dlgregistro');
 			mostrarDatosCodigo();

 		}

 		function mostrarDatosCodigo(){
 			var xcodigo = $("#fcodigo").combobox('getText');
			var url="json/datoscodigo_getdata.php?codigo="+xcodigo;
			$.getJSON(url,function(registros){
					if (registros.length == 0){
						$.messager.alert("No existen datos");
					}		
					else {
						$.each(registros, function(i,registro){							
							var row = registro;

							$("#frmDatosRegistro").form('load', row);

						});
					}
			}); 			

 		}
 	</script>
</body>
</html>