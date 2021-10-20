<?
session_start();
$usuario = $_SESSION['usuario'];

include '../../control/conex.php';

$sqlc = mysqli_query($conexion, "SELECT ciudad, nombre, costos  FROM tbusuarios WHERE usuario='$usuario'");
$rowc = mysqli_fetch_row($sqlc);

$sede = $rowc[0];
$nombre = $rowc[1];
$costos = $rowc[2];

// Variable para cambiar costos
// propiedad: disabled 
$disable = 'false';
if($costos=='N'){
	$disable = 'true';
}

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

	<!-- FUNCIONES DE INICIO //////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$(document).ready( function(){
			verBotones();

		})

		function verBotones(){
			var xcostos = '<? echo $costos; ?>';
			botones([1,1,(xcostos=='S'?1:0),1]);			
		}
	</script>

	<!-- Busqueda x Contenido /////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$.fn.combobox.defaults.filter = function(q,row){
		      var opts = $(this).combobox('options');
		      return row[opts.textField].toUpperCase().indexOf(q.toUpperCase()) >= 0;
		};
	</script>

	<!-- FUNCTION: tecla rapidas //////////////////////////////////////////////////////// -->		
	<script type="text/javascript" src="../js/shortcuts.js"></script>
	<script type="text/javascript">
		// btnGrabarRegistro - grabar registro
		shortcut.add("Alt+R",function() {
			if(eBoton('btnGrabarRegistro')){
				grabarRegistro();
			}
			
		});

		// btnListarClientes - listar cliente
		shortcut.add("Alt+S",function() {
			if(eBoton('btnListarClientes')){
				listarClientes();
			}
			
		});

		// btnLimpiarCliente - limpiar cliente
		shortcut.add("Alt+M",function() {
			if(eBoton('btnLimpiarCliente')){
				limpiarCliente();
			}
			
		});

		// btnEditarLinea - editar linea 
		shortcut.add("Alt+D",function() {
			if(eBoton('btnEditarLinea')){
				editarLinea();
			}
			
		});
	
		// btnBorrarTodo - borrar todo detalle
		shortcut.add("Alt+T",function() {
			if(eBoton('btnBorrarTodo')){
				borrarTodoDetalle();
			}
			
		});

		// btnBorrarLinea - borrar linea detalle
		shortcut.add("Alt+B",function() {
			if(eBoton('btnBorrarLinea')){
				borrarLineaDetalle();
			}
			
		});

		// btnGrabarLinea - grabar linea detalle
		shortcut.add("Alt+G",function() {
			if(eBoton('btnGrabarLinea')){
				grabarLinea('I');
			}
			
		});

		// btnLimpiar - nuevo REG
		shortcut.add("Alt+L",function() {
			if(eBoton('btnLimpiar')){
				limpiarLinea();
			}
			
		});

		// btnNuevo - nuevo REG
		shortcut.add("Alt+N",function() {
			if(eBoton('btnNuevo')){
				regMaximo('N');
			}
			
		});

		// btnEditar - editar REG
		shortcut.add("Alt+E",function() {
			if(eBoton('btnEditar')){
				regMaximo('E');
			}
		});

		// btnGenerarPDF - imprimir REG-->pdf
		shortcut.add("Alt+I",function() {
			if(eBoton('btnGenerarPDF')){
				cotizacionPDF();
			}
		});

		// btnCerrar - cerrar REG cotizar-->venta
		shortcut.add("Alt+C",function() {
			if(eBoton('btnCerrar')){
				regMaximo('V');
			}
		});

		// cerrar pnlregistro
		shortcut.add("Alt+X",function() {			
			actualizarDatosVenta();

			$("#dlgregistro").dialog('close');
			//botones([1,1,1,1]);
			verBotones();
			

		});
	</script>

	<!-- hoja de estilos para tooltips ////////////////////////////////////////////// -->
	<!-- estilo para los botones circulares ///////////////////////////////////////// -->
	<link rel="stylesheet" type="text/css" href="css/tooltips.css">

	<style>
		.numberbox .textbox-text{
		  text-align: right;		  
		}
	</style>
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
			background: #EF3C39;				
		}		
	</style>

	<!-- filter Lib - /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$(function(){
			$("#dgregistros").datagrid('enableFilter');	
			$("#dgclientes").datagrid('enableFilter');	
		})
	</script>

</head>
<body>
	<div style="display:none">
		<input id="xcodi" name="xcodi" class="textbox" value="<? echo $usuario; ?>">
		<input id="xdisable" name="xdisable" class="textbox" value="<? echo $disable; ?>">
		<input id="xcostos" name="xcostos" class="textbox" value="<? echo $costos; ?>">

	</div>					

	<!-- botones para acciones principales ////////////////////////////////////////// -->
	<div class="botonera">
		<div class="bordes" style="margin-left:50px">
	        <div class="tdiv">
	         	<a id="btnNuevo" name="btnNuevo" class="boton_apagado" onclick="regMaximo('N')">
	         		<img src="icons/Plus.png" >
	         	</a>
	         	<span class="tooltiptext">NUEVO registro (Alt+N)</span>
	        </div>
	        <div class="tdiv">
	         	<a id="btnGenerarPDF" name="btnGenerarPDF" class="boton" onclick="cotizacionPDF(1)">
	         		<img src="icons/Printer.png" >
	         	</a>
	         	<span class="tooltiptext">IMPRIMIR registro (Alt+I)</span>
	        </div>
	        <div class="tdiv">
	         	<a id="btnGenerarPDF" name="btnGenerarPDF" class="boton" onclick="cotizacionPDF(2)">
	         		<img src="icons/Printer.png" >
	         	</a>
	         	<span class="tooltiptext">Royal Tour</span>
	        </div>		        	        
	    </div>
	    <div class="bordes" style="margin-left:50px">    
	        <div class="tdiv">
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="regMaximo('E')">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">EDITAR registro (Alt+E)</span>
	        </div>

        </div>
	    <div class="bordes" style="margin-left:50px">    
	        <div class="tdiv">
	         	<a id="btnCerrar" name="btnCerrar" class="boton" onclick="regMaximo('V')">
	         		<img src="icons/Ok.png" >
	         	</a>
	         	<span class="tooltiptext">CERRAR registro (Alt+C)</span>
	        </div>

        </div>
        <div style="display:none">
			<input id="ropcion" name="ropcion" class="easyui-textbox"
				   style="width:40px"
				   data-options="">

        </div>
	</div>

	<!-- Panel principal: grid: dgregistros ///////////////////////////////////////// -->
	<div id="pnlregistros" class="easyui-panel" title="REGISTROS" style="width:100%;height:500px"
		data-options="" collapsible="true" >
		<table id="dgregistros" class="easyui-datagrid" style="width:100%;height:90%"
			url="json/registros_getdata.php" singleSelect="true"
			headerCls="" pagination="false" showFooter="true"
			fitColumns="false">
			<thead data-options="frozen:true">
	            <tr>
					<th field="id", width="50" sortable="true" hidden="true">Id</th>
					<th field="numero", width="70" sortable="true">Numero</th>
					<th field="fecha", width="100" sortable="true">Fecha</th>
					<th field="estado", width="50" sortable="true">Estado</th>	            	
	            </tr>
	        </thead>
			<thead>
				<tr>
					<th field="nit", width="120" sortable="true">Nit</th>
					<th field="contacto", width="300" sortable="true">Contacto</th>
					<th field="empresa", width="300" sortable="true">Empresa</th>						
					<th field="valorservicio", 	width="100" sortable="true" align="right"
						data-options="
							formatter: function(value,row){
							return accounting.formatNumber(value,0);
							}">VALOR
					</th>
					<!--
					<th field="finicio", width="100" sortable="true">Inicio</th>					
					<th field="ffin", width="100" sortable="true">Fin</th>					
					-->
					<th field="pfecha", width="100" sortable="true">Pago</th>					
					<th field="pforma", width="100" sortable="true">Forma</th>
					<th field="pvalor", 	width="100" sortable="true" align="right"
						data-options="
							formatter: function(value,row){
							return accounting.formatNumber(value,0);
							}">VALOR
					</th>
					<th field="comision", 	width="100" sortable="true" align="right"
						data-options="
							formatter: function(value,row){
							return accounting.formatNumber(value,0);
							}">COMISION
					</th>
					<th field="utilidad", 	width="100" sortable="true" align="right"
						data-options="
							formatter: function(value,row){
							return accounting.formatNumber(value,0);
							}">UTILIDAD
					</th>
					<th field="pagoconductor", 	width="100" sortable="true" align="right"
						data-options="
							formatter: function(value,row){
							return accounting.formatNumber(value,0);
							}">CONDUCTOR
					</th>					
					<th field="descripcion", width="100" sortable="true">Descripcion</th>
					<th field="usuario", width="100" sortable="true">Usuario</th>
				</tr>
			</thead>
		</table>
	</div>

	<!-- DIALOG: lista de clientes ////////////////////////////////////////////////////// -->
	<div id="dlgclientes" class="easyui-dialog" title="CLIENTES" headerCls="hc"
 		data-options="inline:true,modal:true,closed:true"
 		style="padding:5px;width:60%;height:80%">
		<table id="dgclientes" title="" class="easyui-datagrid" style="width:100%;height:100%"			
			url="json/clientes_get.php" pagination="true"
			toolbar="#toolbar" singleSelect="true">
			<thead data-options="frozen:true">
				<tr>
					<th field="id" width="20" hidden="true">ID</th>				
					<th field="nit" width="150">NIT</th>
				</tr>
			</thead>
			<thead>
				<tr>
					<th field="contacto" width="300">Contacto</th>
					<th field="empresa" width="300">Empresa</th>
					<th field="direccion" width="300">Direccion</th>
					<th field="telefono" width="200">Telefono</th>
					<th field="ciudad" width="200">Ciudad</th>
					<th field="correo" width="200">Correo</th>				
				</tr>
			</thead>
		</table>
		<div class="dialog-button">
			<div class="botonera" style="padding-top:5px">
				<div style="float:right">
			        <div class="tdivg">
			         	<a id="btnSeleccionarCliente" name="btnSeleccionarCliente" class="boton" onclick="seleccionarCliente()">
			         		<img src="icons/Ok.png" >
			         	</a>
			         	<span class="tooltiptext">Seleccionar CLIENTE</span>
			        </div>
			        <div class="tdivg">
			         	<a id="btnCancelarLista" name="btnCancelarLista" class="boton" onclick="$('#dlgclientes').dialog('close')">
			         		<img src="icons/Cancel.png" >
			         	</a>
			         	<span class="tooltiptext">cancelar lista CLIENTE</span>
			        </div>
				</div>			    
			</div>		      

		</div>
	</div>

	<!-- DIALOG: editar registro //////////////////////////////////////////////////////// inline:true, -->
	<div id="dlgregistro" class="easyui-dialog" title="REGISTRO" headerCls="hc"
 		data-options="modal:true,closed:true"
 		style="width:1200px;height:570px;padding:10px">

 		<div id="pnlcotizacion" class="easyui-panel" title=""  
 			style="width:99%;padding:10px"
 			data-options="" collapsible="true" >
 			<div style="margin-left:40px">
 				<!-- Linea 1: numero, fecha ///////////////////////////////////////// -->
	 			<div class="ritem" style="padding-bottom:5px">
	 				<div style="float:left;padding-top:10px">
		 				<label>NUMERO:</label>
						<input id="numero" name="numero" class="easyui-textbox" 
						   style="width:150px"
						   data-options="disabled:true">
		 				<label>FECHA:</label>
						<input id="fecha" name="fecha" class="easyui-textbox" 
						   style="width:150px"
						   data-options="disabled:true">						   
	 				</div>

	 				<!-- botones del encabezado lista Clientes, limpiar datos cliente ///////// -->
	 				<div style="float:left">
				        <div class="tdiv">
				         	<a id="btnListarClientes" name="btnListarClientes" class="boton" onclick="listarClientes()">
				         		<img src="icons/User.png" >
				         	</a>
				         	<span class="tooltiptext">listar CLIENTES (Alt+S)</span>
				        </div>
				        <div class="tdiv">
				         	<a id="btnLimpiarCliente" name="btnLimpiarCliente" class="boton" onclick="limpiarCliente()">
				         		<img src="icons/Cancel.png" >
				         	</a>
				         	<span class="tooltiptext">limpiar CLIENTE (Alt+M)</span>
				        </div>

	 				</div>
		 			<!-- variable de control de modo: C-cotizacion, V-venta -->
	 				<div style="float:left;display:none">
						<input id="modo" name="modo" class="easyui-textbox" 
						   style="width:50px"
						   data-options="disabled:true">
	 				</div>	 				
	 			</div>

	 			<form id="frmDatosCliente">
		 			<!-- Linea 2: contacto, empresa ///////////////////////////////////// -->
		 			<div class="ritem" style="padding-bottom:5px">
		 				<label>CONTACTO:</label>
						<input id="contacto" name="contacto" class="easyui-textbox" 
						   data-options="disabled:false,
								iconWidth:  22,
								iconAlign: 'left',
								icons: [{
									iconCls: 'icon-cancel',
					                handler: function(e){
						                	$(e.data.target).textbox('clear');							                	
						                	$('#contacto').next().find('input').focus();
						                }	
								}]
					   ">
		 				<label>EMPRESA:</label>
						<input id="empresa" name="empresa" class="easyui-textbox" 
						   data-options="disabled:false,
								iconWidth:  22,
								iconAlign: 'left',
								icons: [{
									iconCls: 'icon-cancel',
					                handler: function(e){
						                	$(e.data.target).textbox('clear');							                	
						                	$('#empresa').next().find('input').focus();
						                }	
								}]
					   ">
					   <label style="width:50">NIT:</label>
						<input id="nit" name="nit" class="easyui-textbox" 
						   data-options="disabled:false,
						   		width: 150,
								iconWidth:  22,
								iconAlign: 'left',
								icons: [{
									iconCls: 'icon-cancel',
					                handler: function(e){
						                	$(e.data.target).textbox('clear');							                	
						                	$('#nit').next().find('input').focus();
						                }	
								}]
					   ">

		 			</div>

		 			<!-- Linea 3: direccion, telefono, ciudad /////////////////////////// -->
		 			<div class="ritem" style="padding-bottom:5px">
		 				<label>DIRECCION:</label>
						<input id="direccion" name="direccion" class="easyui-textbox" 
						   data-options="disabled:false,				   		
								iconWidth:  22,
								iconAlign: 'left',
								icons: [{
									iconCls: 'icon-cancel',
					                handler: function(e){
						                	$(e.data.target).textbox('clear');							                	
						                	$('#contacto').next().find('input').focus();
						                }	
								}]
					   ">
		 				<label>TELEFONO:</label>
						<input id="telefono" name="telefono" class="easyui-textbox" 
						   data-options="disabled:false,
						   		width:200,
								iconWidth:  22,
								iconAlign: 'left',
								icons: [{
									iconCls: 'icon-cancel',
					                handler: function(e){
						                	$(e.data.target).textbox('clear');							                	
						                	$('#contacto').next().find('input').focus();
						                }	
								}]
					   ">
		 				<label>CIUDAD:</label>
						<input id="ciudad" name="ciudad" class="easyui-textbox" 
						   data-options="disabled:false,
						   		width:210,				   		
								iconWidth:  22,
								iconAlign: 'left',
								icons: [{
									iconCls: 'icon-cancel',
					                handler: function(e){
						                	$(e.data.target).textbox('clear');							                	
						                	$('#contacto').next().find('input').focus();
						                }	
								}]
					   ">
		 			</div>

		 			<!-- Linea 4: correo, destino /////////////////////////////////////// -->
		 			<div class="ritem" style="padding-bottom:5px">
		 				<label>CORREO:</label>
						<input id="correo" name="correo" class="easyui-textbox" 
						   data-options="disabled:false,
								iconWidth:  22,
								iconAlign: 'left',
								icons: [{
									iconCls: 'icon-cancel',
					                handler: function(e){
						                	$(e.data.target).textbox('clear');							                	
						                	$('#correo').next().find('input').focus();
						                }	
								}]
					   ">
		 				<label>DESTINO:</label>
						<input id="destino" name="destino" class="easyui-textbox" 
						   data-options="disabled:false,
								iconWidth:  22,
								iconAlign: 'left',
								icons: [{
									iconCls: 'icon-cancel',
					                handler: function(e){
						                	$(e.data.target).textbox('clear');							                	
						                	$('#destino').next().find('input').focus();
						                }	
								}]
					   ">
		 			</div>
	 			</form>

	 			<br><br>
	 		</div>
	 		
	 		<div id="div-tabla" style="width:100%;display:block">
				<table id="dgdetalle" class="easyui-datagrid" style="width:100%;height:200"
					url="json/detalle_getdata.php" singleSelect="true" headerCls="" pagination="false" showFooter="true"
					rownumbers="false">
					<thead data-options="frozen:true">
						<tr>
							<th field="id",	width="50" hidden="true">ID</th>
							<th field="numero", width="50" hidden="true">NUMERO</th>
							<th field="linea", width="50">LINEA</th>
							<th field="descripcion", width="300" >DESCRIPCION</th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th field="destino", width="150" >DESTINO</th>
							<th field="vehiculo", width="150" >VEHIC.</th>
							<th field="pasajeros", width="50" align="right">PASAJ.</th>
							<th field="dias", width="50" align="right">DIAS</th>
							<th field="valor", width="150" align="right"
								data-options="
									formatter: function(value,row){
									return accounting.formatNumber(value,0);
									}">VALOR
							</th>
							<th field="descto", width="50" align="right"
								data-options="
									formatter: function(value,row){
									return accounting.formatNumber(value,0);
									}">DESCTO
							</th>
							<th field="unitario", width="150" align="right"
								data-options="
									formatter: function(value,row){
									return accounting.formatNumber(value,0);
									}">UNITARIO
							</th>
							<th field="observalinea", width="300" >OBSERVACION</th>
						</tr>
					</thead>
				</table>
			</div>

 		</div>

		<div id="div-botones" class="dialog-button">
			<!-- linea de control 1 ///////////////////////////////////////////////////// -->
			<div class="botonera" style="width:99%;height:75px;padding:5px">
		        <form id="frmlinearegistro">
		        	<table>
		        		<tr style="text-align:center;font-size:12px">
		        			<td style="padding:2px">Producto</td>
		        			<td>Destino</td>
		        			<td>Vehiculo</td>
		        			<td>Unitario</td>
		        			<td>Dsto.</td>
		        			<td>Dias</td>
		        			<td>TOTAL</td>
		        		</tr>
		        		<tr>
		        			<td style="padding:2px">
								<input id="cmbproducto" name="cmbproducto" class="easyui-combobox" style="width:330px"
									url="json/comboproductos.php" 
									data-options="valueField:'id',textField:'nombre'">
							</td>
							<td>
								<input id="cmbdestino" name="cmbdestino" class="easyui-combobox" style="width:230px"
									url="json/combodestinos.php" 
									data-options="valueField:'id',textField:'nombre'">
							</td>
							<td>
								<input id="cmbtipovehiculo" name="cmbtipovehiculo" class="easyui-combobox" style="width:200px"
									url="json/comboautomotores.php" 
									data-options="valueField:'id',textField:'nombre'">
							</td>
							<td>
								<input id="runitario" name="runitario" class="easyui-numberbox"
									   style="width:110px"
									   data-options="disabled:<? echo $disable; ?>,precision:0,groupSeparator:','">
							</td>							
							<td>
								<input id="rdescto" name="rdescto" class="easyui-numberbox"
									   style="width:40px"
									   data-options="precision:0,groupSeparator:','">				
							</td>
							<td>
								<input id="rdias" name="rdias" class="easyui-numberbox"
									   style="width:40px"
									   data-options="precision:0,groupSeparator:','">				
							</td>
							<td>
								<input id="rvalor" name="rvalor" class="easyui-numberbox"
									   style="width:110px"
									   data-options="disabled:true,precision:0,groupSeparator:','">				
							</td>							

						</tr>
						<tr style="text-align:left;font-size:12px">
							<td colspan=2 style="padding:2px">
								<label style="margin-left:10px;margin-right:10px">Observacion:</label>
								<input id="robservalinea" name="robservacionlinea" class="easyui-textbox"
									   style="width:400px" data-options="">

							</td>
							<td>
								<label style="margin-left:10px;margin-right:10px">Pasajeros:</label>
								<input id="rpasajeros" name="rpasajeros" class="easyui-numberbox"
									   style="width:40px"
									   data-options="precision:0,groupSeparator:','">

							</td>							
							<td colspan=4>
								<div style="display:none">
									<input id="rid" name="rid" class="easyui-textbox"
										   style="width:40px"
										   data-options="">

								</div>
							</td>
							
						</tr>
		        	</table>

		        </form>
			</div>

			<!-- linea de control 2 - BOTONERA //////////////////////////////////////////////////// -->
			<div class="botonera" style="padding-top:5px">				
				<div class="bordes" style="margin-left:20px">
			        <div class="tdivg">
			         	<a id="btnLimpiar" name="btnNuevo" class="boton" onclick="limpiarLinea()">
			         		<img src="icons/Cancel.png" >
			         	</a>
			         	<span class="tooltiptext">limpiar LINEA (Alt+L)</span>
			        </div>
			        <div class="tdivg">
			         	<a id="btnGrabarLinea" name="btnGrabarLinea" class="boton" onclick="grabarLinea('I')">
			         		<img src="icons/ArrowUp.png" >
			         	</a>
			         	<span class="tooltiptext">grabar LINEA (Alt+G)</span>
			        </div>
				</div>
				<div class="bordes">
			        <div class="tdivg">
			         	<a id="btnEditarLinea" name="btnEditarLinea" class="boton" onclick="editarLinea()">
			         		<img id="botonEditar" src="icons/Write2.png" >
			         	</a>
			         	<span class="tooltiptext">editar LINEA (Alt+D)</span>
			        </div>
				</div>
				<div class="bordes">
			        <div class="tdivg">
			         	<a id="btnBorrarLinea" name="btnBorrarLinea" class="boton" onclick="borrarLineaDetalle()">
			         		<img src="icons/Cut.png" >
			         	</a>
			         	<span class="tooltiptext">borrar LINEA (Alt+B)</span>
			        </div>
			        <div class="tdivg">
			         	<a id="btnBorrarTodo" name="btnBorrarTodo" class="boton" onclick="borrarTodoDetalle()">
			         		<img src="icons/Trash.png" >
			         	</a>
			         	<span class="tooltiptext">borrar TODO (Alt+T)</span>
			        </div>


				</div>
		        <div class="tdivg" style="margin-left:50px">
					<input id="rdescripcion" name="rdescripcion" class="easyui-textbox"
						   style="width:300px;height:45px"
						   data-options="multiline:true">
		        </div>
		        <div class="bordes" style="margin-left:50px">
			        <div class="tdivg">
			         	<a id="btnGrabarRegistro" name="btnGrabarRegistro" class="boton" onclick="grabarRegistro()">
			         		<img src="icons/Save.png" >
			         	</a>
			         	<span class="tooltiptext">grabar REGISTRO (Alt+R)</span>
			        </div>
				</div>

			</div>
			<!--			
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" 
			   onclick="$('#dlgregistro').dialog('close')" style="width:90px">CANCELAR</a>			
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" 
			   onclick="grabarRegistro()" style="width:90px">GRABAR</a>			   
			-->   
		</div>

 		<div id="pnlventa" class="easyui-panel" title="VENTA" 
 			data-options="closed:true" collapsible="true" style="width:99%;height:370px;padding:5px" >
 			<div id="xtoolbarventas" style="float:left">
	 			<div class="ritem" style="width:90%;padding-top:10px">
	 				<div style="float:left">
		 				<label>SERVICIO:</label>
						<input id="pvalorservicio" name="pvalorservicio" class="easyui-numberbox"
							   style="width:100px"
							   data-options="precision:0,groupSeparator:','">

						<!--	   
						<label>Inicio:</label>
						<input id="finicio" name="finicio" class="easyui-datebox" 
							data-options="formatter:myformatter,parser:myparser,width:100">
						<label>Fin:</label>
						<input id="ffin" name="ffin" class="easyui-datebox"
							data-options="formatter:myformatter,parser:myparser,width:100">
						
						-->
						<label>Pago:</label>
						<input id="pfecha" name="pfecha" class="easyui-datebox" 
							data-options="formatter:myformatter,parser:myparser,width:100">
					</div>
							
			        <div class="tdiv" style="float:right">
			         	<a id="btnEliminarVenta" name="btnEliminarVenta" class="boton" onclick="cerrarRegistro()">
			         		<img src="icons/Write3.png" >
			         	</a>
			         	<span class="tooltiptext">CERRAR registro</span>
			        </div>

			        <div class="tdiv" style="float:right">
			         	<a id="btnEliminarVenta" name="btnEliminarVenta" class="boton" onclick="destroyVenta()">
			         		<img src="icons/Cancel.png" >
			         	</a>
			         	<span class="tooltiptext">ELIMINAR registro</span>
			        </div>

			        <div class="tdiv" style="float:right">
			         	<a id="btnEditarVenta" name="btnEditarVenta" class="boton" onclick="editVenta()">
			         		<img src="icons/Write2.png" >
			         	</a>
			         	<span class="tooltiptext">EDITAR registro</span>
			        </div>

			        <div class="tdiv" style="float:right;margin-left:100px">
			         	<a id="btnNuevoVenta" name="btnNuevoVenta" class="boton" onclick="newVenta()">
			         		<img src="icons/Plus.png" >
			         	</a>
			         	<span class="tooltiptext">NUEVO registro</span>
			        </div>
	 			</div>
	 			
	 			<div class="ritem" style="margin-bottom:15px">
					<label>Forma:</label>
					<input id="tpforma" name="tpforma" class="easyui-textbox" style="width:100px" >

					<label>Comision($):</label>
					<input id="comision" name="comision" class="easyui-numberbox" style="width:100"
						data-options="precision:0,groupSeparator:','">

					<label>Utilidad($):</label>
					<input id="utilidad" name="utilidad" class="easyui-numberbox" style="width:100"
						data-options="precision:0,groupSeparator:','">
	 			</div>	 			

 			</div> 			
			<table id="dgventas" title="" class="easyui-datagrid" style="width:69%"
				url="json/venta_get.php"
				toolbar="#toolbarventas" pagination="false" showFooter="true"
				rownumbers="true" fitColumns="false" singleSelect="true">
				<thead>
					<tr>
						<th field="id" width="20" hidden="true">id</th>
						<th field="numero" width="50" hidden="true">numero</th>						
						<th field="ninterno" width="100">Interno</th>
						<th field="empresa" width="300" >empresa</th>						
						<th field="finicio" width="100" >finicio</th>			
						<th field="ffin" width="100" >ffin</th>						
						<th field="cmbempresas" width="15" hidden="true" >cmb</th>
						<th field="conductor" width="150" align="right"
							data-options="
								formatter: function(value,row){
								return accounting.formatNumber(value,0);
								}">						
							Conductor
						</th>
					</tr>
				</thead>
			</table>


 			<!-- DIALOG: datos de venta /////////////////////////////////////////////////////////// -->
			<div id="dlgDatosVenta" class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px"
				closed="true" buttons="#dlg-buttons-venta">				
				<form id="fmDatosVenta" method="post" novalidate>
					<div class="vitem">
						<label>Interno:</label>
						<input name="ninterno" class="easyui-textbox">

						<div style="float:right;display:none">
							<input id="vnumero" name="vnumero" class="easyui-textbox" 
							   style="width:50px"
							   data-options="">
						</div>

					</div>

					<div class="vitem">
						<label>Empresa:</label>
						<input id="cmbempresas" name="cmbempresas" class="easyui-combobox" style="width:280px"
							url="json/comboempresas.php" 
							data-options="valueField:'id',textField:'nombre'">

							<div style="display:none">
								<input id="vempresa" name="vempresa" class="easyui-textbox" 
								   style="width:180px"
								   data-options="">
							</div>
					</div>

					<div class="vitem">
						<label>Inicio:</label>
						<input id="finicio" name="finicio" class="easyui-datebox" 
							data-options="formatter:myformatter,parser:myparser,width:100">
					</div>

					<div class="vitem">
						<label>Fin:</label>
						<input id="ffin" name="ffin" class="easyui-datebox"
							data-options="formatter:myformatter,parser:myparser,width:100">
					</div>

					<div class="vitem">
						<label>Conductor($):</label>
						<input name="conductor" class="easyui-numberbox" style="width:120"
							data-options="precision:0,groupSeparator:','">
					</div>

				</form>
			</div>

			<div id="dlg-buttons-venta">
		        <div class="tdiv">
		         	<a id="btnGrabarVenta" name="btnGrabarVenta" class="boton" onclick="saveVenta()">
		         		<img src="icons/Ok.png" >
		         	</a>
		         	<span class="tooltiptext">Grabar</span>
		        </div>

		        <div class="tdiv">
		         	<a id="btnCancelarVenta" name="btnCancelarVenta" class="boton" onclick="javascript:$('#dlgDatosVenta').dialog('close')">
		         		<img src="icons/Cancel.png" >
		         	</a>
		         	<span class="tooltiptext">Cancelar</span>
		        </div>
			</div>
 		</div>

 	</div>



 	<!-- SCRIPTS SECCION //////////////////////////////////////////////////////////////// -->
	<!-- FUNCTION: formatos de pantalla  -->
	<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ritem {
			float:left;			
		}
		.ritem label {
			text-align: right;
			display:inline-block;
			font-weight: bold;
			width:90px;
		}
		.ritem input{
			text-align: left;
			width:300px;			
		}
		.ritem {
			text-align: right;
		}

		/* formato de pantalla para registro ventas */
		#fmDatosVenta{
			margin:0;
			padding:10px 30px;
		}
		.vitem {
			float:left;
			margin-bottom: 10px;
		}
		.vitem label {
			text-align: right;
			display:inline-block;
			font-weight: bold;
			width:100px;
		}
		.vitem input{
			text-align: left;
			width:100px;		
		}
		.vitem {
			text-align: right;
		}

		table {
		    border-collapse: collapse;
		}

		table, th, td {
		    border: 1px solid black;
		}

	</style>

	<script type="text/javascript">
		$("#dgregistros").datagrid({
			onLoadSuccess: function(){
				$("#dgregistros").datagrid('selectRow',0);		
			}
		})
	</script>

 	<script type="text/javascript">
 		function regMaximo(popcion){
 			// apagar botones principales -- por si son pulsados desde editar registros 
 			botones([0,0,0,0]);
 			$("#frmregistro").form('clear');
 			$("#frmlinearegistro").form('clear');

 			//$("#modo").textbox('setValue',pmodo);
 			$("#ropcion").textbox('setValue',popcion);

 			if(popcion=='N'){
 				// COTIZAR 

 				// variable de control N-nuevo
 				//$("#ropcion").textbox('setValue','N');

  				var  today = new Date();
  				var m = today.getMonth() + 1;
  				var mes = (m < 10) ? '0' + m : m;
				var xfecha = today.getFullYear() + '-' + mes + '-' + today.getDate();

				$("#fecha").textbox('setValue', xfecha);

				$.post('json/reg_maximo.php', {},		
					function(result){
					if (result.success){
						if(result.rmaximo==null){
							var xreg = 1;							
						}else {
							var xreg = parseInt(result.rmaximo) + 1;
						}						
						$("#numero").textbox('setValue',xreg);						
						borrarDetalle();

					} else {
						$.messager.alert('Mensaje', 'problemas!!!-maximo registro');

					}
				},'json');

				botonesVender(0);

				editarRegistro();

			}
			if(popcion=='E'){
				var xusuario = $("#xcodi").val();

				// VENDER

 				// variable de control N-nuevo
 				//$("#ropcion").textbox('setValue','E');

				var row = $("#dgregistros").datagrid('getSelected');

				var xestado = row['estado'];

				if (xestado=='Z'){
					$.messager.alert('Mensaje','registro YA CERRADO!!!');
					verBotones();
					return;
				}

				// datos del cliente
				$("#frmDatosCliente").form('load',row);


				// asignar valor a campos desde registro y descripcion general del registro
				var xnumero = row['numero'];
				var xfecha = row['fecha'];
				var xdescripcion = row['descripcion'];

				$("#numero").textbox('setValue', xnumero);
				$("#fecha").textbox('setValue', xfecha);
				$("#rdescripcion").textbox('setValue', xdescripcion);

				mostrarRegistro();

				cargarDetalle(xnumero,xusuario);

				//$("#pnlcotizacion").panel('expand');
				//$("#pnlventa").panel('collapse');

				botonesVender(0);

			}

			if(popcion=='V'){
				var xusuario = $("#xcodi").val();
				
				var row = $("#dgregistros").datagrid('getSelected');

				var xestado = row['estado'];

				if (xestado=='Z'){
					$.messager.alert('Mensaje','registro YA CERRADO!!!');
					verBotones();
					return;
				}

				$("#frmDatosCliente").form('load',row);

				// asignar valor a campos desde registro
				var xnumero = row['numero'];
				var xfecha = row['fecha'];
				var xvalor = row['valorservicio'];

				var xfinicio = row['finicio'];
				var xffin = row['ffin'];
				var xpfecha = row['pfecha'];
				var xforma = row['pforma'];

				// calcular valores de comision y utilidad
				if(row['comision']==null){
					var xcomision = xvalor * 0.02;
				}else {
					var xcomision = row['comision'];
				}

				if(row['utilidad']==0){
					var xutilidad = row['utilidad'];
				}else {
					var xutilidad = row['utilidad'];
				}
				
				$("#numero").textbox('setValue', xnumero);
				$("#fecha").textbox('setValue', xfecha);

				$("#pvalorservicio").numberbox('setValue', xvalor);

				$("#pfecha").datebox('setValue', xpfecha);
				$("#tpforma").textbox('setValue', xforma);

				$("#finicio").datebox('setValue', xfinicio);
				$("#ffin").datebox('setValue', xffin);				

				$("#comision").numberbox('setValue', xcomision);
				$("#utilidad").numberbox('setValue', xutilidad);

				mostrarRegistro();

				cargarDetalle(xnumero,xusuario);

				//$("#pnlcotizacion").panel('collapse');
				//$("#pnlventa").panel('expand');

				botonesVender(1);

			}

 		}

 		function botonesVender(pestado){
 			// que porqueria !!!!
			$("#pnlcotizacion").panel('expand');			

 			if(pestado==1){
 				$("#pnlventa").panel('expand');
	 			$("#pnlventa").panel({closed:false});
				document.getElementById("btnListarClientes").className = "boton_apagado"
				document.getElementById("btnLimpiarCliente").className = "boton_apagado"
				document.getElementById('div-tabla').style.display = "block";
				document.getElementById('div-botones').style.display = "none";

 			} else {
 				$("#pnlventa").panel('collapse');
	 			$("#pnlventa").panel({closed:true});
				document.getElementById("btnListarClientes").className = "boton"
				document.getElementById("btnLimpiarCliente").className = "boton"
				document.getElementById('div-tabla').style.display = "block";
				document.getElementById('div-botones').style.display = "block";

 			}

 		}

 		function mostrarRegistro(){
 			var xopcion = $("#ropcion").textbox('getValue');

			//$("#dlgregistro").dialog('hcenter');
			//$("#dlgregistro").dialog('vcenter');			

			$("#dlgregistro").dialog('open').dialog('setTitle','REGISTRO - '+(xopcion=='N'?'NUEVO':'EDITAR'));

 		}

 		function editarRegistro(){
 			mostrarRegistro();
			limpiarCliente();

			$("#rdescripcion").textbox('setValue','');

			$('#cmbproducto').next().find('input').focus();

 		}
 	</script>

 	<script type="text/javascript">
 		function grabarRegistro(){

 			grabarDatosCliente();

 			$("#dgdetalle").datagrid('selectAll');
 			var rows = $("#dgdetalle").datagrid('getSelections');
 			var xvalor = 0;
 			for(i=0;i<rows.length;i++){
 				xvalor = xvalor + parseInt(rows[i]['valor']);
 			} 			

			// ropcion - N, E
			var xopcion = $("#ropcion").textbox('getValue');			

			if(xopcion=='N'){
	 			// recalcular maximo - multiusuario
				$.post('json/reg_maximo.php', {},		
					function(result){
					if (result.success){
						if(result.rmaximo==null){
							var xreg = 1;							
						}else {
							var xreg = parseInt(result.rmaximo) + 1;
						}

						//grabarRegistroDetalle(xreg,xvalor);

						grabarRegistroDatos(xreg,xvalor,xopcion);

					} else {
						$.messager.alert('Mensaje', 'problemas!!! - grabarRegistro');

					}
				},'json'); 

			} else if(xopcion='E'){
				var xreg = $("#numero").textbox('getValue');				

				// para el caso de editar borrar registros detalle anteriores
				borrarRegistroDetalleAnterior(xreg);


				grabarRegistroDatos(xreg,xvalor,xopcion);


			}	

 		}

 		// funcion para borrar registro anterior detalle en caso de edicion
 		function borrarRegistroDetalleAnterior(pnumero){
 			$.post('json/registro_detalle_borrar_tabla.php', 
 				{numero:pnumero}, 
 				function(result){
 					if(!result){
 						$.messager.alert("problems!!! borrarRegistroDetalleAnterior() ");
 					}
 			}, 'json')
 		}

 		function grabarRegistroDatos(pnumero,pvalor,popcion){
 			//var xmodo = $("#modo").textbox('getValue');

 			//alert('popcion='+popcion+'pvalor='+pvalor);

 			if(popcion=='N' || popcion=='E'){
 				var xusuario = $("#xcodi").val();
 				var xnumero = pnumero;
 				var xfecha = $("#fecha").textbox('getValue');
 				var xnit = $("#nit").textbox('getValue');
 				var xcontacto = $("#contacto").textbox('getValue');
 				var xempresa = $("#empresa").textbox('getValue');

 				var xdireccion = $("#direccion").textbox('getValue');
 				var xtelefono = $("#telefono").textbox('getValue');
 				var xciudad = $("#ciudad").textbox('getValue');

 				var xcorreo = $("#correo").textbox('getValue');
 				//var xdestino = $("#destino").textbox('getValue');

 				var xdescripcion = $("#rdescripcion").textbox('getValue'); 				

				// valores anteriores para campos capturados 				
 				//var xtipovehiculo = $("#tipovehiculo").textbox('getValue');
 				//var xnpax = $("#npax").numberbox('getValue');
 				//var xdias = $("#dias").numberbox('getValue');
 				//var xvalorservicio = $("#valorservicio").textbox('getValue');
 				//var xobservacion = $("#observacion").textbox('getValue'); 				

 				if(popcion=='N'){
 					var xmensaje = 'Esta seguro de grabar REGISTRO??? ';
 					var xurl = 'json/registro_tabla.php';
 					var rmensaje = 'registro grabado EXITOSAMENTE!!!';


 				} else if(popcion=='E'){
 					var xmensaje = 'Esta seguro de modificar REGISTRO??? ';
 					var xurl = 'json/registro_datos_update.php';
 					var rmensaje = 'registro modificado EXITOSAMENTE!!!';

 				}
 				
				$.messager.confirm('Confirm', xmensaje, function(r){
					if (r){				
						$.post(xurl, 
							{numero:xnumero, fecha:xfecha, nit:xnit, contacto:xcontacto, empresa:xempresa,
							 direccion:xdireccion, telefono:xtelefono, ciudad:xciudad,
							 correo:xcorreo, descripcion:xdescripcion, estado:'C', valor:pvalor, usuario:xusuario },
							function(result){
							if (result.success){

								grabarRegistroDetalle(pnumero,pvalor,popcion);

								$("#dlgregistro").dialog('close');
								$("#dgregistros").datagrid('reload');
								$.messager.alert('Mensaje', rmensaje);

								verBotones();

							} else {
								$.messager.alert('Mensaje', 'problemas!!!-grabar registro');
							}
						},'json');
					}
				});
				
 			}
 			if(popcion=='V'){
 				var xnumero = $("#numero").textbox('getValue');
 				var xfinicio = $("#finicio").datebox('getValue');
 				var xffin = $("#ffin").datebox('getValue');

 				var xpfecha = $("#pfecha").datebox('getValue');

 				var xpforma = $("#pforma").textbox('getValue');
 				var xpvalor = $("#pvalor").numberbox('getValue');
 				var xpagoconductor = $("#pagoconductor").numberbox('getValue');
 				var xcomision = $("#comision").numberbox('getValue');
 				var xutilidad = $("#utilidad").numberbox('getValue');

 				//alert(xfinicio+' '+xffin);

				$.messager.confirm('Confirm','Esta seguro de cerrar REGISTRO??? ' ,function(r){
					if (r){				
						$.post('json/registro_tabla_pago.php', 
							{numero:xnumero, finicio:xfinicio, ffin:xffin, pfecha:xpfecha,
							 pforma:xpforma, pvalor:xpvalor, pagoconductor:xpagoconductor,
							 comision:xcomision, utilidad:xutilidad, estado:xmodo
							},		
							function(result){
							if (result.success){
								$("#dlgregistro").dialog('close');
								$("#dgregistros").datagrid('reload');
								$.messager.alert('Mensaje', 'registro cerrado EXITOSAMENTE!!!');
							} else {
								$.messager.alert('Mensaje', 'problemas!!!-grabar registro');
							}
						},'json');
					}						
				});	

 			}
			
			// activar botonera principasl 
			botones([1,1,1,1]);
 		}

 		function grabarRegistroDetalle(pnumero,pvalor,popcion)
 		{
 			//$("#dgdetalle").datagrid('sellectAll');
 			var rows = $("#dgdetalle").datagrid('getSelections');

 			for(i=0;i<rows.length;i++){
 				var xid = rows[i]['id'];
 				var xdescripcion = rows[i]['descripcion'];
 				var xdestino = rows[i]['destino'];
 				var xvehiculo = rows[i]['vehiculo'];
 				var xpasajeros = rows[i]['pasajeros'];
 				var xdias = rows[i]['dias'];
 				var xvalor = rows[i]['valor'];
 				var xunitario = rows[i]['unitario'];
 				var xdescto = rows[i]['descto'];
 				var xobservalinea = rows[i]['observalinea'];

 				// numero de linea insertada automaticamente
 				var xlinea = rows[i]['linea'];

 				// alert("linea="+xlinea);

 				// si inserta si adiciona o edita
				$.post('json/registro_tabla_detalle.php', 
					{numero:pnumero, linea:xlinea, descripcion:xdescripcion, destino:xdestino, vehiculo:xvehiculo, pasajeros:xpasajeros,
					 dias:xdias, valor:xvalor, unitario:xunitario, descto:xdescto, observalinea:xobservalinea},
					function(result){
					if (!result.success){
						$.messager.alert('Mensaje', 'problemas!!! - grabarRegistroDetalle-insert ');
					}
				},'json');

 				/* opcion anterior no se toma en cuenta adicionar linea
 				if(popcion=='N'){
					$.post('json/registro_tabla_detalle.php', 
						{numero:pnumero, descripcion:xdescripcion, destino:xdestino, vehiculo:xvehiculo, pasajeros:xpasajeros,
						 dias:xdias, valor:xvalor, unitario:xunitario, descto:xdescto, observalinea:xobservalinea},
						function(result){
						if (!result.success){
							$.messager.alert('Mensaje', 'problemas!!! - grabarRegistroDetalle-insert ');
						}
					},'json');
				} else if(popcion=='E'){
					$.post('json/registro_detalle_update.php', 
						{id:xid, descripcion:xdescripcion, destino:xdestino, vehiculo:xvehiculo, pasajeros:xpasajeros,
						 dias:xdias, valor:xvalor, unitario:xunitario, descto:xdescto, observalinea:xobservalinea},
						function(result){
						if (!result.success){
							$.messager.alert('Mensaje', 'problemas!!! - grabarRegistroDetalle-update ');
						}
					},'json');

				}

				*/
 				
 			}
 			
 		}
 	</script>

 	<script type="text/javascript">
		function cotizacionPDF(pcual){
			
			var xreg = $("#dgregistros").datagrid('getSelected');

			var xusuario = xreg['usuario'];
			var xnumero = xreg['numero'];

			//alert(xnumero+xusuario);

			var params  = 'width='+screen.width;
    		params += ', height='+screen.height;
    		params += ', top=0, left=0'
    		params += ', fullscreen=yes';

    		if(pcual==1){
    			window.open ("cotizacion.php?numero="+xnumero+"&usuario="+xusuario, params);	
    		}else if(pcual==2){
    			window.open ("cotizacion2.php?numero="+xnumero+"&usuario="+xusuario, params);
    		}
			
		}

 	</script>

	<!-- formato fechas -->
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

	<script type="text/javascript">
		function eBoton(queBoton){
			var elemento = document.getElementById(queBoton);
			if(elemento.className=='boton'){
				return true;
			}else{
				return false;
			}

		}

		function botones(lista){
			var nomboton = ['Nuevo','GenerarPDF','Editar','Cerrar'];

			for (i=0;i<4;i++){
				var elemento = document.getElementById('btn'+nomboton[i]);
				if (lista[i]==0){
					elemento.className='boton_apagado';						

				}else{
					elemento.className='boton';						

				}
				
			}
		}

		function botonesLinea(lista){
			var nomboton = ['Limpiar','GrabarLinea','EditarLinea','BorrarLinea','BorrarTodo','GrabarRegistro'];

			for (i=0;i<6;i++){
				var elemento = document.getElementById('btn'+nomboton[i]);
				if (lista[i]==0){
					elemento.className='boton_apagado';						

				}else{
					elemento.className='boton';						

				}
				
			}
		}


	</script>

	<!-- FUNCIONES: onSelect campos linea registro ////////////////////////////////////// -->
	<script type="text/javascript">
		$("#cmbproducto").combobox({
			onSelect: function(){
				var qcostos = $("#xcostos").val();
				var qproducto = $("#cmbproducto").combobox('getText');

				if(qcostos=='N'){
					$("#runitario").numberbox({disabled:true});	
				}else {
					$("#runitario").numberbox({disabled:false});
				}

				mostrarDestinos();
				mostrarVehiculos();

				/*
				if(qproducto.indexOf('DIA')>=0){
					$("#runitario").numberbox({disabled:false});
				}else{
					if(qcostos=='N'){
						$("#runitario").numberbox({disabled:true});	
					}else {
						$("#runitario").numberbox({disabled:false});
					}
				}
				*/

				$('#cmbdestino').next().find('input').focus();
			}
		})

		$("#cmbdestino").combobox({
			onSelect: function(value){
				leerTarifa();
				$('#cmbtipovehiculo').next().find('input').focus();
			}
		})

		$("#cmbtipovehiculo").combobox({
			onSelect: function(){					
				$('#rdescto').next().find('input').focus();
				leerTarifa();
				calcularTotal();
			}
		})

		$("#runitario").numberbox({
			onChange: function(){
				calcularTotal();
				$('#rdescto').next().find('input').focus();
			}
		})

		$("#rdescto").numberbox({
			onChange: function(value){
				if(value!=''){
					maximoDescto();
					calcularTotal();
					$('#rdias').next().find('input').focus();
				}	
			}
		})

		$("#rdias").numberbox({
			onChange: function(){
				calcularTotal();
				$('#robservalinea').next().find('input').focus();
			}
		})

		$("#robservalinea").textbox({
			onChange: function(){
				$('#rpasajeros').next().find('input').focus();
			}
		})

		$("#rpasajeros").numberbox({
			onChange: function(){
				$('#cmbproducto').next().find('input').focus();
			}
		})

	</script>

	<!-- FUNCIONES: leer tarifas, calculo de total //////////////////////////////////////////////// -->
	<script type="text/javascript">
		function leerTarifa(){
			var xproducto = $("#cmbproducto").combobox('getValue');
			var xdestino = $("#cmbdestino").combobox('getText');
			var xvehiculo = $("#cmbtipovehiculo").combobox('getText');			
			$.post('json/tarifa_getdata.php', {producto:xproducto, destino:xdestino, vehiculo:xvehiculo},		
				function(result){
				if (result.success){
					$("#runitario").numberbox('setValue',result.tarifa);

				} else {
					$.messager.alert('Mensaje', 'problemas!!! - leerTarifa');

				}
			},'json'); 

		}

		function calcularTotal(){
			var xunitario = $("#runitario").numberbox('getValue');
			var xdescto = $("#rdescto").numberbox('getValue');
			var xdias = $("#rdias").numberbox('getValue');

			var xvalor = xunitario*(1-(xdescto/100))*xdias;

			$("#rvalor").numberbox('setValue', xvalor);

		}

	</script>

	<!-- FUNCIONES: botones de linea de registro //////////////////////////////////////// -->
	<script type="text/javascript">
		function limpiarLinea(){
			$("#frmlinearegistro").form('clear');

		}

		function borrarTodoDetalle(){
			$.messager.confirm('Confirm','Esta seguro de borrar TODO??? ' ,function(r){
				if (r){									
					borrarDetalle();	
				}	
			});	

		}

		function borrarLineaDetalle(){			
			var xlinea = $("#dgdetalle").datagrid('getSelected');
				$.messager.confirm('Confirm','Esta seguro de borrar LINEA??? ' ,function(r){
					if (r){									
						var xid = xlinea['id'];

						$.post('json/detalle_borrar.php', 
							{id:xid},
							function(result){
							if (result.success){
								mostrarDetalle();
								limpiarLinea();

							} else {
								$.messager.alert('Mensaje', 'problemas!!! - borrarLineaDetalle');

							}
						},'json'); 
						
					}	
				});	
			
		}

		function borrarDetalle(){
			var xusuario = $("#xcodi").val();
			var xnumero = $("#numero").textbox('getValue');

			$.post('json/registro_detalle_borrar.php', 
				{numero:xnumero, usuario:xusuario},
				function(result){
				if (result.success){
					mostrarDetalle();
					limpiarLinea();

				} else {
					$.messager.alert('Mensaje', 'problemas!!! - borrarDetalle');

				}
			},'json'); 

		}

		function mostrarDetalle(){
			var xusuario = $("#xcodi").val();

			$.post('json/numerar_lineas.php',
				{usuario:xusuario},
				function(result){
					if(result.success){						
						mostrarDgDetalle();
					}
				},'json');

		}

		function mostrarDgDetalle(){
			var xusuario = $("#xcodi").val();
			
			$("#dgdetalle").datagrid('load',{
				usuario:xusuario				
			})
		}

		function grabarLinea(paccion){
			var xusuario = $("#xcodi").val();			
			var xnumero = 0;

			var xdescripcion = $("#cmbproducto").combobox('getText');
			var xdestino = $("#cmbdestino").combobox('getText');
			var xvehiculo = $("#cmbtipovehiculo").combobox('getText');
			var xunitario = $("#runitario").numberbox('getValue');
			var xdescto = $("#rdescto").numberbox('getValue');			
			var xdias = $("#rdias").numberbox('getValue');
			var xvalor = $("#rvalor").numberbox('getValue');
			var xobservalinea = $("#robservalinea").textbox('getValue');
			var xpasajeros = $("#rpasajeros").numberbox('getValue');

			// id para UPDATE solamente
			var xid = $("#rid").textbox('getValue');

			// inserta NUEVA linea 
			if(paccion=='I'){				
				$.post('json/linea_tabla.php', 
					{descripcion:xdescripcion, destino:xdestino, vehiculo:xvehiculo, unitario:xunitario, descto:xdescto, 
					 dias:xdias, valor:xvalor, observalinea:xobservalinea, pasajeros:xpasajeros, usuario:xusuario },
					function(result){
					if (result.success){
						//$.messager.alert('Mensaje', 'registro grabado exitosamente!!!');
						// $("#destino").textbox('setValue',xdestino);
						mostrarDetalle();
						limpiarLinea();

					} else {
						$.messager.alert('Mensaje', 'problemas!!! - grabarLinea');

					}
				},'json'); 



			}else if(paccion=='U'){
				$.post('json/linea_tabla_update.php', 
					{descripcion:xdescripcion, destino:xdestino, vehiculo:xvehiculo, unitario:xunitario, descto:xdescto, dias:xdias,
					 valor:xvalor, observalinea:xobservalinea, pasajeros:xpasajeros, id:xid },
					function(result){
					if (result.success){
						//$.messager.alert('Mensaje', 'registro grabado exitosamente!!!');
						$("#destino").textbox('setValue',xdestino);
						mostrarDetalle();
						limpiarLinea();

					} else {
						$.messager.alert('Mensaje', 'problemas!!! - grabarLinea');

					}
				},'json'); 

			}	

		}
	</script>

	<!-- FUNCTION: edicion de cliente ///////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		function limpiarCliente(){
			$('#frmDatosCliente').form('clear');
		}

		function listarClientes(){
			$("#dlgclientes").dialog('hcenter');
			$("#dlgclientes").dialog('vcenter');
			$("#dlgclientes").dialog('open');

		}

		function seleccionarCliente(){
			var row = $("#dgclientes").datagrid('getSelected');

			$("#frmDatosCliente").form('load', row);

			$("#dlgclientes").dialog('close');

		}
	</script>

	<!-- FUNCTION: descto usuario ///////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		function maximoDescto(){
			var xusuario = $("#xcodi").val();
			var xdescto = $("#rdescto").numberbox('getValue');

			$.post('json/user_descto.php', 
				{usuario:xusuario},
				function(result){
				if (result.success){
					if(parseInt(xdescto)>parseInt(result.udescto)){
						$.messager.alert('Mensaje','descuento NO PERMITIDO!!!');
						$("#rdescto").numberbox('setValue','');
					}

				} else {
					$.messager.alert('Mensaje', 'problemas!!! - maximoDescto');
				}
			},'json');
		}
	</script>

	<!-- FUNCTION: edicion de linea /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		function editarLinea(){			
			var queEstado=estadoBoton();			

			if(queEstado=='xeditar'){
				botonesLinea([0,0,1,0,0,0]);
				document.getElementById("botonEditar").src = "icons/Save.png";
				cargarLinea();

			}else {
				botonesLinea([1,1,1,1,1,1]);
				document.getElementById("botonEditar").src = "icons/Write2.png";
				grabarLinea('U');

			}			


		}

		function cargarLinea(){
			var linea = $("#dgdetalle").datagrid('getSelected');
			var xdestino = $("#destino").textbox('getValue');

			$("#cmbproducto").combobox('setText',linea['descripcion']);
			$("#cmbdestino").combobox('setText',linea['destino']);
			$("#cmbtipovehiculo").combobox('setText',linea['vehiculo']);
			$("#runitario").numberbox('setValue',linea['unitario']);
			$("#rdescto").numberbox('setValue',linea['descto']);
			$("#rdias").numberbox('setValue',linea['dias']);
			$("#robservalinea").textbox('setValue',linea['observalinea']);
			$("#rpasajeros").numberbox('setValue',linea['pasajeros']);

			$("#rid").textbox('setValue',linea['id']);

		}

		// estado segun archivo - 
		function estadoBoton(){
			var xarchivo = document.getElementById("botonEditar").src;
			var filename = xarchivo.replace(/^.*[\\\/]/, '');

			if(filename=='Write2.png'){
				return 'xeditar';

			}else{
				return 'xgrabar';

			}
		}

	</script>

	<!-- FUNCION: cargar lineas de detalle tbregistrosdetdig ////////////////////////////////////// -->
	<script type="text/javascript">
		function cargarDetalle(pnumero,pusuario){
			$.post('json/registro_editar.php', 
				{numero:pnumero, usuario:pusuario},
				function(result){
				if (result.success){
					mostrarDetalle();
					//limpiarLinea();					

				} else {
					$.messager.alert('Mensaje', 'problemas!!! - cargarDetalle');
				}
			},'json');

		}
	</script>

	<!-- FUNCTION: grabar venta /////////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		function grabarVenta(){
			$.messager.confirm('Confirm', 'Esta seguro de CERRAR registro???', function(r){
				if (r){
					var xnumero = $("#numero").textbox('getValue');
					var xfinicio = $("#finicio").datebox('getValue');
					var xffin = $("#ffin").datebox('getValue');
					var xpfecha = $("#pfecha").datebox('getValue');
					var xpvalor = $("#pvalor").numberbox('getValue');
					var xpforma = $("#pforma").textbox('getValue');
					var xpagoconductor = $("#pagoconductor").numberbox('getValue');
					var xcomision = $("#comision").numberbox('getValue');
					var xutilidad = $("#utilidad").numberbox('getValue');

					$.post('json/registro_venta.php',
						{numero:xnumero, finicio:xfinicio, ffin:xffin, pfecha:xpfecha, pvalor:xpvalor,
						 pforma:xpforma, pagoconductor:xpagoconductor, comision:xcomision,
						 utilidad:xutilidad },
						function(result){
						if (result.success){
							$("#dlgregistro").dialog('close');
							$("#dgregistros").datagrid('reload');
							$.messager.alert('Mensaje', 'registro cerrado EXITOSAMENTE!!!');

						} else {
							$.messager.alert('Mensaje', 'problemas!!!-grabarVenta');
						}
					},'json');
				}
			});

		}
	</script>

	<!-- FUNCION: script de datos de venta (admin tabla tbdatosventas ) /////////////////////////// -->
	<script type="text/javascript">
		var url;
		function newVenta(){			
			$('#dlgDatosVenta').dialog('open').dialog('setTitle','Nueva VENTA');
			$('#fmDatosVenta').form('clear');

			var qnumero = $("#numero").val();			
			$("#vnumero").textbox('setValue', qnumero);

			url = 'json/venta_save.php';
		}
		function editVenta(){			
			var row = $('#dgventas').datagrid('getSelected');
			if (row){
				$('#dlgDatosVenta').dialog('open').dialog('setTitle','Editar VENTA');
				$('#fmDatosVenta').form('load',row);
				url = 'json/venta_update.php?id='+row.id;
			}
		}
		function saveVenta(){
			$('#fmDatosVenta').form('submit',{
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
						$('#dlgDatosVenta').dialog('close');		// close the dialog
						//$('#dgventas').datagrid('reload');	// reload the user data
						cargarVentas();
					}
				}
			});
		}
		function destroyVenta(){
			var row = $('#dgventas').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de Eliminar venta: ' + row.ninterno,function(r){
					if (r){
						$.post('json/venta_destroy.php',{id:row.id},function(result){
							if (result.success){
								//$('#dgventas').datagrid('reload');	// reload the user data
								cargarVentas();
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
		$("#pnlventa").panel({
			onOpen: function(){
				cargarVentas();
			}
		});

		function cargarVentas(){
			var xnumero = $("#numero").textbox('getValue');
			$("#dgventas").datagrid('load', {
				numero: xnumero
			});

			$.post('json/ventas_sumar.php', 
				{numero:xnumero}, 
				function(result){
					if(result.success){
						var xtotal = parseInt(result.tconductor);

						var xpvalor = $("#pvalorservicio").numberbox('getValue');
						var xcomision = $("#comision").numberbox('getValue');

						var xutilidad = xpvalor - xtotal - xcomision;						

						$("#utilidad").numberbox('setValue', xutilidad);
					}
				}, 
			'json');

		}
	</script>

	<!-- FUNTION: actualizar datos de venta en registro /////////////////////////////////////////// -->
	<script type="text/javascript">
		function actualizarDatosVenta(){
			var xopcion = $("#ropcion").textbox('getValue');

			if(xopcion=='V'){
				var row = $("#dgregistros").datagrid('getSelected');
				var xid = row['id'];

				var xrow = $("#dgregistros").datagrid('getRowIndex');				
				
				$("#dgventas").datagrid("selectAll");
				row = $("#dgventas").datagrid('getSelections');

				// revision para capturar los valores desde la barra y no desde la grid
				var tvalor = $("#pvalorservicio").numberbox('getValue');
				var tcomision = $("#comision").numberbox('getValue');
				var tutilidad = $("#utilidad").numberbox('getValue');

				var tfinicio = $("#finicio").datebox('getValue');
				var tffin = $("#ffin").datebox('getValue');
				var tpfecha = $("#pfecha").datebox('getValue');

				var tpforma = $("#tpforma").textbox('getValue');				
				
				var tconductor = 0;
				for(i=0; i<row.length; i++){
					//tvalor = tvalor + parseFloat(row[i]['valor']);
					tconductor = tconductor + parseFloat(row[i]['conductor']);
					//tcomision = tcomision + parseFloat(row[i]['comision']);
					//tutilidad = tutilidad + parseFloat(row[i]['utilidad']);
				}

				$.post('json/venta_registro_update.php',
					{id:xid, pvalor:tvalor, pagoconductor:tconductor, comision:tcomision, utilidad:tutilidad, estado:'V',
					finicio:tfinicio, ffin:tffin, pfecha:tpfecha, pforma:tpforma }, 

					function(result){
						if(result.success){
							$.messager.alert("Mensaje", "registro actualizado EXITOSAMENTE!!!");
							$("#dgregistros").datagrid('reload');

							//$("#dgregistros").datagrid('selectRow',1);
						}
					}, 'json');

			}

		}
	</script>

	<script type="text/javascript">
		$("#cmbempresas").combobox({
			onSelect: function(){
				var xempresa = $("#cmbempresas").combobox('getText');
				$("#vempresa").textbox('setValue', xempresa);
			}
		});
		$("#cmbempresas").combobox({
			onChange: function(){
				var xempresa = $("#cmbempresas").combobox('getText');
				$("#vempresa").textbox('setValue', xempresa);
			}
		});		
	</script>

	<!-- SCRITP: manejo del cliente /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		function grabarDatosCliente(){
			var xnit = $("#nit").textbox('getValue');

			$.post('json/clientes_contar.php', 
				{nit:xnit}, 
				function(result){
					if(parseInt(result.cuantos)==0){
						grabarNuevoCliente();
					}
				}, 
			'json');			
		}

		function grabarNuevoCliente(){
			var xcontacto = $("#contacto").textbox('getValue');
			var xempresa = $("#empresa").textbox('getValue');
			var xnit = $("#nit").textbox('getValue');
			var xdireccion = $("#direccion").textbox('getValue');
			var xtelefono = $("#telefono").textbox('getValue');
			var xciudad = $("#ciudad").textbox('getValue');
			var xcorreo = $("#correo").textbox('getValue');

			var aCampos = ['contacto','empresa','nit','direccion','telefono','ciudad','correo'];
			var aValores = [xcontacto, xempresa, xnit, xdireccion, xtelefono, xciudad, xcorreo];

			var xtabla = 'tbclientes';
			var xaccion = 'I';

			$.post('json/myFileDB.php', 
				{accion:xaccion, tabla:xtabla, campos:aCampos, valores:aValores}, 
				function(result){
					if(!result.success){
						$.messager.alert('Mensaje','error Insertar tbclientes');
					}
				}, 
			'json');			
			
		}
	</script>

	<!-- SCRIPT: cerrar registro volver Z estado ////////////////////////////////////////////////// -->
	<script type="text/javascript">
		function cerrarRegistro(){
			var xnumero = $("#numero").textbox('getValue');			

			$.messager.confirm('Confirm', 'Esta seguro de CERRAR registro?', function(r){
				if (r){				
					$.post('json/venta_cerrar.php',
						{numero:xnumero},
						function(result){
						if (result.success){
							
							//actualizarDatosVenta();

							$("#dlgregistro").dialog('close');
							$("#dgregistros").datagrid('reload');
							
							//botones([1,1,1,1]);
							verBotones();


						} else {
							$.messager.alert('Mensaje', 'problemas!!!-CERRAR registro');
						}
					},'json');
				}
			});

		}
	</script>

	<!-- manejo de los combos de destinos y vehiculos ///////////////////////////////////////////// -->
	<script type="text/javascript">
		function mostrarDestinos(){
			var xproducto = $("#cmbproducto").combobox('getValue');

			var xurl = "json/combodestinos.php?producto="+xproducto;

			$("#cmbdestino").combobox({
				url:xurl
			})

		}

		function mostrarVehiculos(){
			var xproducto = $("#cmbproducto").combobox('getValue');

			var xurl = "json/comboautomotores.php?producto="+xproducto;

			$("#cmbtipovehiculo").combobox({
				url:xurl
			})

		}
	</script>
</body>
</html>