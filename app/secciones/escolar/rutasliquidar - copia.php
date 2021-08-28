<?

$usuario = $_GET['usuario'];
$interno = $_GET['interno'];

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

		#liquidados {
			position: absolute;
			width: 30%;
			height: 33%;
			left: 110px; 
			bottom: 30px;
		}

		#subtotal {
			position: absolute;
			width: 40%;
			height: 33%;
			right: 10%; 
			bottom: 30px;			
		}

		#liquidados table, #subtotal table {
			border-collapse: collapse;
			font-size: 12px;
		}

	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			var xinterno = '<? echo $interno?>';
			
			// si xinterno es vacio llamado desde intranet, de lo contrario llamado desde web
			if(xinterno==''){
				camposInicio(1);
			}else {
				camposInicio(0);
			}

		})
	</script>

</head>
<body>
	<!-- variables de control para codigo ///////////////////////////////////////////////////////// -->
	<div style="display:none">
		<input id="finterno" name="finterno" class="easyui-textbox"  value=''>
	</div>

	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
	    <div class="bordes">	 		
 			<div class="ritem">
	 			<label style="width:55px">Colegio:</label>
				<input id="fcolegio" name="fcolegio" class="easyui-combobox"  value=''
					url="json/combocolegios.php" style="width:120px"
					data-options="editable:false,valueField:'codigo',textField:'nombre'">

	 			<label style="width:35px">Ruta:</label>
				<input id="fruta" name="fruta" class="easyui-textbox"  value=''>

	 			<label style="width:35px">Mes:</label>
				<input id="fmes" name="fmes" class="easyui-combobox"  value=''
					url="json/combolistamesesrutas.php" style="width:120px"
					data-options="editable:false,valueField:'codigo',textField:'nombre'">

	 			<label>Asociado:</label>
				<select id="faso" name="faso" class="easyui-combobox" style="width:50px;">
				    <option value="si" selected>SI</option>
				    <option value="no">NO</option>
				</select>

 			</div>
	        <div class="tdiv" style="margin-left:15px">
	         	<a id="btnPlanilla" name="btnPlanilla" class="boton" onclick="liquidarRutas(1)">
	         		<img src="icons/Calc.png" >
	         	</a>
	         	<span class="tooltiptext">LIQUIDAR ruta</span>
	        </div>
	    </div>
	    <div class="bordes" style="margin-left:10px">	    	
	        <div class="tdiv">
	         	<a id="btnPlanilla" name="btnPlanilla" class="boton" onclick="planillas()">
	         		<img src="icons/Applications.png" >
	         	</a>
	         	<span class="tooltiptext">GENERAR planilla</span>
	        </div>
	    </div>
	</div>
	
	<table id="dgdatosliquidar" class="easyui-datagrid" title="DATOS LIQUIDAR"
		style="width:100%;height:50%"
		url="json/rutasliquidar_getdata.php" singleSelect="true"
		headerCls="hc" pagination="false" showFooter="true" rownumbers="true"
		fitColumns="true">
		<thead data-options="frozen:true">
            <tr>
				<th field="id", width="50" sortable="true" hidden="true">Id</th>
				<th field="colegio", width="100" sortable="true">Colegio</th>
				<th field="interno", width="100" sortable="true" hidden="true">Interno</th>
				<th field="fechapago", width="100" sortable="true">Fecha</th>
				<th field="codigo", width="50" sortable="true">Codigo</th>				
            </tr>
        </thead>
		<thead>
			<tr>
				<th field="nombre", width="200" >Nombre</th>
				<th field="recorrido", width="150" sortable="true">Recorrido</th>		
				<th field="ruta", width="50" sortable="true">Ruta</th>				
				<th field="tarifabl", width="100" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Tarifa
				</th>
				<th field="pago", width="100" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Pago
				</th>
				<th field="diferencia", width="100" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">Diferencia
				</th>
				<th field="tarifaaso", width="100" sortable="true" align="right"
					data-options="
						formatter: function(value,row){
						return accounting.formatNumber(value,0);
						}">TarifaAso
				</th>												
				<th field="mes", width="100" sortable="true">Mes</th>				
				<th field="observacion", width="200" sortable="true">Observacion</th>

			</tr>
		</thead>
	</table>

	<div id="liquidados">
		<table border=1>
			<tr><td colspan="2">LIQUIDADOS</td></tr>
			<tr><td>RUTA COMPLETA</td>
				<td><input id="l001" name="l001" class="easyui-numberbox" data-options="disabled:true" value=0></td>
			</tr>
			<tr><td>MEDIA AM</td>
				<td><input id="l002" name="l002" class="easyui-numberbox" data-options="disabled:true" value=0></td>
			</tr>
			<tr><td>MEDIA PM</td>
				<td><input id="l003" name="l003" class="easyui-numberbox" data-options="disabled:true" value=0></td>
			</tr>
			<tr><td>DOS DIRECCIONES</td>
				<td><input id="l004" name="l004" class="easyui-numberbox" data-options="disabled:true" value=0></td>
			</tr>
		</table>
		<table border=1>
			<tr><td colspan="2">PENDIENTES POR LIQUIDAR</td></tr>
			<tr><td>RUTA COMPLETA</td>
				<td><input id="p001" name="p001" class="easyui-numberbox" data-options="disabled:true" value=0></td>
			</tr>
			<tr><td>MEDIA AM</td>
				<td><input id="p002" name="p002" class="easyui-numberbox" data-options="disabled:true" value=0></td>
			</tr>
			<tr><td>MEDIA PM</td>
				<td><input id="p003" name="p003" class="easyui-numberbox" data-options="disabled:true" value=0></td>
			</tr>
			<tr><td>DOS DIRECCIONES</td>
				<td><input id="p004" name="p004" class="easyui-numberbox" data-options="disabled:true" value=0></td>
			</tr>
		</table>
	</div>

	<div id="subtotal">
		<table border=1>
			<tr>
				<td colspan=2>Valor Subtotal</td>				
				<td>
					<input id="st001" name="st001" class="easyui-numberbox" 
						data-options="disabled:true,precision:0,groupSeparator:','" value=0>
				</td>
			</tr>
			<tr>
				<td>Comision Royal</td>				
				<td>
					<input id="comiroyal" name="comiroyal" class="easyui-numberbox" 
					data-options="disabled:false" style="width:30px" value=3>
				</td>
				<td>
					<input id="st002" name="st002" class="easyui-numberbox" 
						data-options="disabled:true,precision:0,groupSeparator:','" value=0>
				</td>
			</tr>
			<tr>
				<td>Retencion en la fuente</td>				
				<td>
					<input id="retencion" name="retencion" class="easyui-numberbox" 
						data-options="disabled:false,precision:1,groupSeparator:','" style="width:30px" value="3.5">
				</td>
				<td>
					<input id="st003" name="st003" class="easyui-numberbox" 
						data-options="disabled:true,precision:0,groupSeparator:','" value=0>
				</td>
			</tr>
			<tr>
				<td colspan=2>Transferencia/Cheque</td>				
				<td>
					<input id="st004" name="st004" class="easyui-numberbox" 
						data-options="precision:0,groupSeparator:','" value=5000>
				</td>
			</tr>
			<tr>
				<td>4 x 1000</td>				
				<td>
					<input id="pormil" name="pormil" class="easyui-numberbox" 
						data-options="disabled:false" style="width:30px" value=4>
				</td>
				<td>
					<input id="st005" name="st005" class="easyui-numberbox" 
						data-options="disabled:true,precision:0,groupSeparator:','" value=0>
					</td>
			</tr>
			<tr>
				<td colspan=2>Subsidio Ruta</td>				
				<td>
					<input id="st006" name="st006" class="easyui-numberbox" 
						data-options="precision:0,groupSeparator:','" value=20000>
					</td>
			</tr>
			<tr><td colspan="3">-</td></tr>
			<tr>
				<td colspan=2>Total a Pagar</td>				
				<td>
					<input id="st007" name="st007" class="easyui-numberbox" 
						data-options="disabled:true,precision:0,groupSeparator:','" value=0>
				</td>
			</tr>
		</table>
	</div>

 	<!-- DIALOG impresion de planillas: ruta y asociados ////////////////////////////////////////// -->
 	<div id="dlgplanillas" class="easyui-dialog" headerCls="hc" style="width:20%;padding:0 20px 20px 20px" title="PLANILLA" 
 		toolbar="#" buttons="#"
 		data-options="modal:true,closed:true">
 		<form id="frmplanillas">
	    	<div class="ritem">
	 			<label>Archivo:</label>
				<select id="farchi" name="farchi" class="easyui-combobox" style="width:50px;">
				    <option value="si">SI</option>
				    <option value="no" selected>NO</option>
				</select>	    		
	    	</div>
	    	<div class="ritem" style="text-align:center">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-pdf" onclick="planillaPDF()"
					data-options="iconAlign:'left'"
					style="width:200px">Liquidacion RUTA</a>
	    	</div>
 		</form>
	</div> 	

	<!-- FUNCTION: formatos de pantalla ///////// -->
	<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
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

	<!-- SCRIPT de procedimiento general ////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$("#dgdatosliquidar").datagrid({
			onLoadSuccess: function(){
				calcularDatos();
			}
		});

		// Transferencia/Cheque
		$("#st004").numberbox({
			onChange: function(){
				calcularDatos();
			}
		});

		// Subsidio Ruta 
		$("#st006").numberbox({
			onChange: function(){
				calcularDatos();
			}
		});

		// onChange para limpiar dg
		$("#fcolegio").combobox({
			onSelect: function(){
				liquidarRutas(0);
			}
		});

		$("#fruta").textbox({
			onChange: function(){
				liquidarRutas(0);
			}
		});

		$("#fmes").combobox({
			onSelect: function(){
				liquidarRutas(0);
			}
		});

		$("#faso").combobox({
			onSelect: function(){
				liquidarRutas(0);
			}
		});


	</script>

	<script type="text/javascript">
		function camposInicio(pestado){
			$("#fcolegio").combobox(pestado=='0'?'disable':'enable');
			$("#fruta").textbox(pestado=='0'?'disable':'enable');
		}

		function liquidarRutas(popcion){
			if(popcion==0){
				var xcolegio = '';
				var xruta = '';
				var xmes = '';

			}else if(popcion==1){
				var xcolegio = $("#fcolegio").combobox('getText');
				var xruta = getVar('fruta',0);
				var xmes = $("#fmes").combobox('getText');

			}

			$("#dgdatosliquidar").datagrid('load',{
				colegio:xcolegio,
				mes:xmes,
				ruta:xruta
			});

		}

		function calcularPendientesX(){
			setVar('l001',1,0);
			setVar('l002',1,0);
			setVar('l003',1,0);
			setVar('l004',1,0);

			setVar('p001',1,0);
			setVar('p002',1,0);
			setVar('p003',1,0);
			setVar('p004',1,0);

		}

		function calcularPendientes(){
			var xsubtotal = getVar('st001',1);
			if(xsubtotal==0){
				calcularPendientesX();
				return;
			}

			var xcolegio = $("#fcolegio").combobox('getText');
			var xmes = $("#fmes").combobox('getText');
			var xruta = getVar('fruta',0);

			var url="json/pendientes_getdata.php?colegio="+xcolegio+"&mes="+xmes+"&ruta="+xruta;
			$.getJSON(url,function(registros){
					if (registros.length == 0){
						$.messager.alert("Mensaje","No existen datos de PENDIENTES!!!");
					}		
					else {
						$.each(registros, function(i,registro){
							if(registro.recorrido=='RUTA COMPLETA'){
								setVar('p001',1,registro.cuantos);

							}else if(registro.recorrido=='MEDIA AM'){
								setVar('p002',1,registro.cuantos);

							}else if(registro.recorrido=='MEDIA PM'){
								setVar('p003',1,registro.cuantos);

							}else if(registro.recorrido=='DOS DIRECCIONES'){
								setVar('p004',1,registro.cuantos);

							}

						});
					}
			});



		}

		function calcularDatos(){
			// validar inicio de sesion / colegio vacio
			var xcolegio = $("#fcolegio").combobox('getText');
			if(xcolegio==''){
				return;
			}
			$("#dgdatosliquidar").datagrid('selectAll');

			var rows = $("#dgdatosliquidar").datagrid('getSelections');

			var xcompleta = 0;
			var xmediaam = 0;
			var xmediapm = 0;
			var xdosdir = 0;

			var xsubtotal = 0;
			for(i=0;i<rows.length;i++){
				var xrecorrido = rows[i]['recorrido'];				
				if(xrecorrido=='RUTA COMPLETA'){
					xcompleta = xcompleta + 1;
				}else if(xrecorrido=='MEDIA RUTA AM'){
					xmediaam = xmediaam + 1;
				}else if(xrecorrido=='MEDIA RUTA PM'){
					xmediapm = xmediapm + 1;
				}if(xrecorrido=='DOS DIRECCIONES'){
					xdosdir = xdosdir + 1;
				}
					
				xsubtotal = xsubtotal + parseFloat(rows[i]['tarifaaso']);

				// definir interno desde la grid
				setVar('finterno',0,rows[i]['interno']);

			}

			setVar('st001',1,xsubtotal);
			setVar('l001',1,xcompleta);
			setVar('l002',1,xmediaam);
			setVar('l003',1,xmediapm);
			setVar('l004',1,xdosdir);

			// liquidar valores - traer porcentajes
			var xaso = getVar('faso',3);
			if(xaso=='si'){
				var xcomision = 0;
			}else {
				var xcomision = getVar('comiroyal',1);
			}
			var xretencion = getVar('retencion',1);
			var xpormil = getVar('pormil',1);			

			var xsubtotal2 = xsubtotal * (parseFloat(xcomision)/100);
			var xsubtotal3 = xsubtotal * (parseFloat(xretencion)/100);
			var xsubtotal4 = getVar('st004',1);
			var xsubtotal5 = xsubtotal/1000 * 4;
			var xsubtotal6 = getVar('st006',1);

			// set var para subtotales
			setVar('st002',1,xsubtotal2);			
			setVar('st003',1,xsubtotal3);			
			setVar('st005',1,xsubtotal5);

			var xapagar = 0;

			xapagar = parseFloat(xsubtotal) - (parseFloat(xsubtotal2) + parseFloat(xsubtotal3) + 
					  parseFloat(xsubtotal4) + parseFloat(xsubtotal5) + parseFloat(xsubtotal6));

			setVar('st007',1,xapagar);

			calcularPendientes();

		}

 		function planillas(){
 			showWin('dlgplanillas');
 		}

		function showWin(pnombre){
			$("#"+pnombre).dialog('hcenter');
			$("#"+pnombre).dialog('vcenter');
			$("#"+pnombre).dialog('open');
		}

		function planillaPDF(){			
			var xcolegio = $("#fcolegio").combobox('getText');
			var xcual = getVar('fruta',0);
			var xmes = $("#fmes").combobox('getText');

			// validar si se genera el archivo
			var xgarchi = getVar('farchi',0);

			// validar si existe planilla
			var xaccion = 'T';
			var xfuncion = 'COUNT'
			var xtabla = 'tbplanillas';			

			// estos campos son para completar el sql
			var xcampos = ['ruta'];
			var xvalores = [xcual];

			var xcamposCondicion = ['colegio','ruta','mes'];
			var xvaloresCondicion = [xcolegio,xcual,xmes];

			$.post('json/myFileDB.php',
				{accion:xaccion,funcion:xfuncion,tabla:xtabla,campos:xcampos,valores:xvalores,
				 camposCondicion:xcamposCondicion,valoresCondicion:xvaloresCondicion},
				 function(result){
				 	if(result.success){
				 		if(xgarchi=='si'){
				 			addPlanilla(result.valor);
				 		}else {
				 			// no generar archivo muestra la planilla de one
				 			generarPlanillaPDF();
				 		}
				 		
				 	}
				 },
			'json');

		}

		function addPlanilla(pvalor){
			// si valor !=0 generarPlanilla
			if(pvalor!=0){
				generarPlanillaPDF();
			}

			// si valor 0 no existe planilla
			if(pvalor==0){
				var xcolegio = $("#fcolegio").combobox('getText');
				var xcual = getVar('fruta',0);
				var xmes = $("#fmes").combobox('getText');
				
				// compañeros toco desde la zona fantasma
				var xinterno = getVar('finterno',0);

				// definir nombre de archivo
				var xarchivo = xcolegio + '-' + xcual + '-' + xmes + '.pdf';

				var xaccion = 'I';
				var xtabla = 'tbplanillas';

				var xcampos = ['colegio','ruta','mes','interno','archivo'];
				var xvalores = [xcolegio,xcual,xmes,xinterno,xarchivo];

				$.post('json/myFileDB.php',
					{accion:xaccion,tabla:xtabla,campos:xcampos,valores:xvalores},
					function(result){
						if(result.success){
							generarPlanillaPDF();
						}
					},
				'json');
			}
		}

		function generarPlanillaPDF(){
			var xcolegio = $("#fcolegio").combobox('getText');
			var xcual = getVar('fruta',0);
			var xmes = $("#fmes").combobox('getText');
			var xarchi = getVar('farchi',0);			

			// conteo de recorridos
			var xl001 = getVar('l001',0);
			var xl002 = getVar('l002',0);
			var xl003 = getVar('l003',0);
			var xl004 = getVar('l004',0);

			// conteo de pendientes
			var xp001 = getVar('p001',1);
			var xp002 = getVar('p002',1);
			var xp003 = getVar('p003',1);
			var xp004 = getVar('p004',1);

			alert(xp001+xp002+xp003+xp004);

			var xst001 = getVar('st001', 1);
			var xst002 = getVar('st002', 1);
			var xst003 = getVar('st003', 1);
			var xst004 = getVar('st004', 1);
			var xst005 = getVar('st005', 1);
			var xst006 = getVar('st006', 1);
			var xst007 = getVar('st007', 1);

			var params  = 'width='+screen.width;
    		params += ', height='+screen.height;
    		params += ', top=0, left=0'
    		params += ', fullscreen=yes';

    		window.open ("planillaLiquidacion.php?colegio="+xcolegio+"&cual="+xcual+"&mes="+xmes+"&archi="+xarchi+
    			"&l001="+xl001+"&l002="+xl002+"&l003="+xl003+"&l004="+xl004+
    			"&st001="+xst001+"&st002="+xst002+"&st003="+xst003+"&st004="+xst004+"&st005="+xst005+
    			"&st006="+xst006+"&st007="+xst007+
    			"&p001="+xp001+"&p002="+xp002+"&p003="+xp003+"&p004="+xp004, 
    			params);

		}
	</script>

</body>
</html>