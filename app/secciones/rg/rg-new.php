<?
	$usuario = $_REQUEST['usuario'];
	
	include '../admin/conn.php';
	$sqlc = mysql_query("SELECT ciudad, vendedor, safix from tbusuarios where usuario='$usuario'");
	$rowc = mysql_fetch_row($sqlc);

	$sede = $rowc[0];
	$vend = $rowc[1];
	$vends = $rowc[2];


?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-8">		
		<title>RG-datos</title>

		<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/default/easyui.css">		
		<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/icon.css">
		<link rel="stylesheet" type="text/css" href="css/rg.css">		

		<script type="text/javascript" src="accounting.js"></script>

		<script type="text/javascript" src="../../jeasyui/jquery.min.js"></script>
		<script type="text/javascript" src="../../jeasyui/jquery.easyui.min.js"></script>
		<script type="text/javascript" src="../../jeasyui/locale/easyui-lang-es.js"></script>

		<!-- script shortcut ////////////////////////////////////////////////////////////////////// -->
		<script type="text/javascript" src="js/shortcuts.js"></script>		
		<script type="text/javascript">
			// NUEVO REPORTE
			shortcut.add("Alt+N",function() {		
				nuevoReporte();	
				paneles(0,0,0);
			});

			// GENERAR REPORTE-DATOS
			shortcut.add("Alt+G",function() {
				paneles(0,0,1);
				generarDataGrid()
			});

			// collapsar todos
			shortcut.add("Alt+T",function() {				
				paneles(0,0,0);
			});

			// panel DISENO
			shortcut.add("Alt+D",function() {				
				paneles(1,0,0);
			});

			// panel FILTROS 
			shortcut.add("Alt+F",function() {				
				paneles(0,1,0);
			});

			// panel DATOS
			shortcut.add("Alt+A",function() {				
				paneles(0,0,1);
			});

		</script>


		<!-- script de inicio carga lista de reportes x usuario -->
		<script type="text/javascript">
			$(document).ready(function(){
				actualizarReportes();

			})
		</script>

	</head>
	<body>
		<div class="bordesRG">
			<!-- variables de usuario -->
			<div style="display:none">
				<input id="sede" name="sede" class="textbox" value="<? echo $sede; ?>">
				<input id="vend" name="vend" class="textbox" value="<? echo $vend; ?>">
				<input id="vends" name="vends" class="textbox" value="<? echo $vends; ?>">
				<input id="usuario" name="usuario" class="textbox" value="<? echo $usuario; ?>">

		    	<a href="javascript:void(0)" class="easyui-linkbutton"  
		       	   data-options="" style="width:50px;height:35px"
		       	   onclick="listardiv('left')">left</a>

		    	<a href="javascript:void(0)" class="easyui-linkbutton"  
		       	   data-options="" style="width:50px;height:35px"
		       	   onclick="listardiv('filas')">filas</a>

		    	<a href="javascript:void(0)" class="easyui-linkbutton"  
		       	   data-options="" style="width:50px;height:35px"
		       	   onclick="listardiv('columnas')">columnas</a>

		    	<a href="javascript:void(0)" class="easyui-linkbutton"  
		       	   data-options="" style="width:50px;height:35px"
		       	   onclick="listardiv('valores')">valores</a>

		    	<a href="javascript:void(0)" class="easyui-linkbutton"  
		       	   data-options="" style="width:50px;height:35px"
		       	   onclick="removerTodosFiltros()">filtros</a>
			</div>					

			<!-- panel: REPORTES  ///////////////////////////////////////////////////////////////////////// -->
			<div id="plreportes" class="easyui-panel" title='<font color="white">REPORTES</font>' 
				collapsible="true" headerCls="hc" bodyCls="bc" style="width:100%"			 
				data-options="collapsed:false">

				<div class="freportes">								
						<input id="cmbreportes" name="cmbreportes" class="easyui-combobox" 
							   url="" style="height:27px"
							   data-options="editable:false,valueField:'codigo',textField:'nombre'">

						<a class="easyui-linkbutton" onclick="cargarReporte()"
						   data-options="iconCls:'icon-page'"><span>Cargar</span></a>				


					<a class="easyui-linkbutton" onclick="nuevoReporte()"
					   data-options="iconCls:'icon-add'"><span>Nuevo</span></a>

					<div id="divnuevo" style="float:right;display:none">
						<a class="easyui-linkbutton" onclick="grabarReporte()" 
						   style="border-color:#A4A4A4"
						   data-options="iconCls:'icon-save'"><span><B>Grabar</B></span></a>

						<input id="nombreReporte" class="easyui-textbox" style="width:300px;height:27px">

						<div style="display:none">
							<input id="nid" class="easyui-textbox" style="width:50px;height:27px">
						</div>
						

					</div>
					<div style="float:right">
						<a class="easyui-linkbutton" style="width:150px" onclick="generarDataGrid()"					   
						   data-options="iconCls:'icon-rayito'"><span>GENERAR</span></a>
					
					</div>   

				</div>
			</div>	 

			<!-- panel: DISENO  ////////////////////////////////////////////////////////////////////////// -->
			<div id="pldiseno" class="easyui-panel" title='<font color="white">DISENO</font>' 
				collapsible="true" headerCls="hc" style="width:100%"
				data-options="collapsed:true">

				 <!-- TABLAS ////////////////////////////////////////////-->
				<div style="float:left;margin:20px 30px 20px 30px">
					<div class="easyui-panel" title='<p class="titulos">&nbsp T A B L A S</p>'
						headerCls="ph" bodyCls="pb" 
						style="width:200px"
			        	data-options="iconCls:'icon-campos'">
			        	<div style="padding:10px">
							<input id="cmbtablas" name="cmbtablas" class="easyui-combobox" 
								   url="comboTablasJSON.php" style="width:180px"
								   data-options="disabled:true,editable:false,valueField:'codigo',textField:'nombre'">
							<br><br>	   
							<a id="btnCargar" name="btnCargar" class="easyui-linkbutton" 
							   onclick="cargarCampos()"
							   data-options="disabled:true,iconCls:'icon-grid'"><span>Cargar</span></a>

							<a id="btnEliminar" name="btnEliminar" class="easyui-linkbutton" 
							   onclick="eliminarCampos('left')" style="margin-left:30px"
							   data-options="disabled:true,iconCls:'icon-grid-cancel'"><span>Eliminar</span></a>

			        	</div>

					</div>				
				</div> 

				 <!-- CAMPOS ///////////////////////////////////////////-->
				<div style="float:left;margin-top:20px;margin-bottom:20px">
					<div class="easyui-panel" title='<p class="titulos">&nbsp C A M P O S</p>'
						 headerCls="ph" bodyCls="pb" 
						 style="width:180px"
			             data-options="iconCls:'icon-campos'">

						<div id="left" class="left">
						</div> 	
			        </div>

				 </div>

				 <!-- panel RG - filas, columnas, valores /////////////////////////////////////// -->
				 <div class="contenedor">
				 	<table style="width:100%;height:100%">
				 		<tr style="height:20%">
				 			<td style="width:25%">
				 				<div style="margin-left:20px">
				 					<img id="imagen" src='images/rg-negro.png' style='width:130px;height:75px' alt='[]' onclick="logo()"/>
				 				</div>			 				
				 			</td>
				 			<td style="width:75%">
								<div class="easyui-panel" title='<p class="titulos">&nbsp C O L U M N A S</p>'
										headerCls="ph" bodyCls="pb" style="width:100%;height:100%;"
						                data-options="iconCls:'icon-campos'">

									<div id="columnas" class="columnas">			
									</div>

						        </div> 					
				 			</td>
				 		</tr>
				 		<tr style="height:80%">
				 			<td style="width:25%">
								<div class="easyui-panel" title='<p class="titulos">&nbsp F I L A S</p>'
										headerCls="ph" bodyCls="pb" 
										style="width:100%;height:100%;"
						                data-options="iconCls:'icon-campos'">

									<div id="filas" class="filas">			
									</div>

						        </div>
				 			</td>
				 			<td style="width:75%">
						 		<div class="easyui-panel" title='<p class="titulos">&nbsp V A L O R E S</p>'
						 				headerCls="ph" bodyCls="pb" 
						 				style="100%;height:100%;"
						                 data-options="iconCls:'icon-bullets'">

						 			<div id="valores" class="valores">			
						 			</div>

						         </div>
						 				
				 			</td>
				 		</tr>	
				 	</table>
				 </div>
			</div>

			<!-- panel: FILTROS ////////////////////////////////////////////////////////////////////////// -->
			<div id="plfiltros" class="easyui-panel" title='<font color="white">FILTROS</font>' 
				collapsible="true" headerCls="hc" style="width:100%"
				data-options="collapsed:true, onBeforeExpand:function(){cambiarCampos()}">

				<div style="margin:0px 0 20px 30px">

					<div class="botonesFiltros">

						<div style="display:none">
							<a href="javascript:void(0)" class="easyui-linkbutton" onclick="showListaFiltros()" 
							   data-options="iconCls:'icon-more'">ShosList</a>

							<a href="javascript:void(0)" class="easyui-linkbutton" 				   
							   onclick="mostrarOtros()" data-options="iconCls:'icon-more'">mostrarOtros</a>

							<a href="javascript:void(0)" class="easyui-linkbutton" 
							   onclick="listadiv()" data-options="iconCls:'icon-more'">div</a>

							<a href="javascript:void(0)" class="easyui-linkbutton" 
							   onclick="listasacar()" data-options="iconCls:'icon-more'">sacar</a>

							<a href="javascript:void(0)" class="easyui-linkbutton" 
							   onclick="listarVector()" data-options="iconCls:'icon-more'">Vector</a>

							<a href="javascript:void(0)" class="easyui-linkbutton" 
							   onclick="setFiltro()" data-options="iconCls:'icon-more'">setFiltro</a>
						
						</div>  

					</div>
					<div style="margin-top:20px">						
						<div class="easyui-panel" title='<p class="titulos">&nbsp Lista de F I L T R O S</p>'
							headerCls="ph" bodyCls="pb" 
							style="width:775px"
				        	data-options="iconCls:'icon-listaFiltros'">

							<!-- botones Add, remove. botones de verificacion de filtros -->
							<div id="tt" style="float:left;padding:10px">
								<a href="javascript:void(0)" class="easyui-linkbutton" onclick="addWin()" 
								   style="margin-bottom:5px"
								   data-options="iconCls:'icon-add'"></a>
								   <br>

								<a href="javascript:void(0)" class="easyui-linkbutton" onclick="removeInput()" 
								   data-options="iconCls:'icon-cancel'"></a>

							</div>	

							<!-- contenedor de FILTROS: foo -->
							<div id='foo' class="containerFiltros">
							</div>
						</div>	
					</div>	
				</div>	
			</div>

			<!-- panel: DATOS, SQL - DESARROLLADORES  //////////////////////////////////////////////////////////// -->
			<div id="pldatos" class="easyui-panel" title='<font color="white">DATOS</font>' 
				collapsible="true" headerCls="hc" style="width:100%"
				data-options="collapsed:true">

				<div style="display:none">
					
					<div class="freportes">
						<label>SentenciaSQL</label>			
		            	<input id="sentenciaSQL" class="easyui-textbox" multiline="true" style="width:80%;height:50px"><br>

		            	<label>tablaSQL</label>
		            	<input id="tablaSQL" class="easyui-textbox" multiline="true" style="width:50%;height:30px"><br>

		            	<label>filasSQL</label>
		            	<input id="filasSQL" class="easyui-textbox" multiline="true" style="width:50%;height:30px"><br>

		            	<label>columnas</label>
		            	<input id="columnasSQL" class="easyui-textbox" multiline="true" style="width:80%;height:30px"><br>

		            	<label>ncolumnas</label>
		            	<input id="ncolumnasSQL" class="easyui-textbox" multiline="true" style="width:80%;height:30px"><br>

		            	<label>valoresSQL</label>
		            	<input id="valoresSQL" class="easyui-textbox" multiline="true" style="width:50%;height:30px"><br>

		            	<label>listaValores</label>
		            	<input id="listaValores" class="easyui-textbox" multiline="true" style="width:50%;height:30px"><br>

		            	<label>filtrosSQL</label>
		            	<input id="filtrosSQL" class="easyui-textbox" multiline="true" style="width:80%;height:50px"><br>
		            			      		           
		        	</div>
		        	
					<a href="javascript:void(0)" class="easyui-linkbutton" 
					   onclick="generarDataGrid()" data-options="iconCls:'icon-more'">DataGrid-1</a>

					<a href="javascript:void(0)" class="easyui-linkbutton" 
					   onclick="generarDgDatos()" data-options="iconCls:'icon-more'">DataGrid-2</a>


				</div>

				<!--
				<table id="dg"></table>
				-->
				<div class="easyui-layout" headerCls="pc" style="width:100%;height:500px;">
					<div data-options="region:'west', collapsed:true" headerCls="pc" title=". . ." style="background:#A4A4A4; width:4%;height:50px;padding:10px">
						<a href="javascript:void(0)" class="easyui-linkbutton" style="width:30px;height:30px"
						   onclick="generarExcel()" data-options="iconCls:'icon-excel'"></a>
						   <br><br>

						<a href="javascript:void(0)" class="easyui-linkbutton" style="width:30px;height:30px"
						   onclick="" data-options="iconCls:'icon-chart'"></a>

					</div>
					<div data-options="region:'center'" >
						<table id="dg" class="easyui-datagrid" style="width:100%;height:100%"
								url=""
								singleSelect="true" rownumbers="true"
								showFooter="true">
						</table>			
					</div>	
				</div>

				<div style="float:left">
					<label><b>&Uacute;ltima actualizaci&oacute;n: 2017-05-11</b></label>
				</div>
					
			<div>

		</div>

		<!-- /////////////////////////////////////////////////////////////////////////////////// -->	
		<!-- JS rutinas de programacion //////////////////////////////////////////////////////// -->
		<!-- /////////////////////////////////////////////////////////////////////////////////// -->	

		<!-- script para DRAG & DROP -->
		<script type="text/javascript">
			var verlogo = 1;
			var vectorCampos = [];
			var vectorCols = [];

			$(function(){				
				$('.item, .itemv, .itemc').draggable({
					proxy:'clone',
					revert:true
				});

				$('.filas').droppable({
					accept:'.item, .itemv, .itemc',
					onDragEnter:function(e,source){
						$(source).draggable('options').cursor='auto';
						$(source).draggable('proxy').css('border','1px solid red');
						$(this).addClass('over');					
					},				
					onDragLeave:function(e,source){
						$(source).draggable('options').cursor='not-allowed';
						$(source).draggable('proxy').css('border','3px solid #ccc');
						$(this).removeClass('over');
					},
					onDrop:function(e,source){
						$(this).append(source);						
						$(this).removeClass('over');						

					}
				});

				$('.columnas').droppable({
					accept:'.itemc',
					onDragEnter:function(e,source){
						$(source).draggable('options').cursor='auto';
						$(source).draggable('proxy').css('border','1px solid red');
						$(this).addClass('over');					
					},				
					onDragLeave:function(e,source){
						$(source).draggable('options').cursor='not-allowed';
						$(source).draggable('proxy').css('border','3px solid #ccc');
						$(this).removeClass('over');
					},
					onDrop:function(e,source){
						$(this).append(source);						
						$(this).removeClass('over');						

					}
				});

				$('.valores').droppable({
					accept:'.itemv',
					onDragEnter:function(e,source){
						$(source).draggable('options').cursor='auto';
						$(source).draggable('proxy').css('border','1px solid red');
						$(this).addClass('over');					
					},				
					onDragLeave:function(e,source){
						$(source).draggable('options').cursor='not-allowed';
						$(source).draggable('proxy').css('border','3px solid #ccc');
						$(this).removeClass('over');
					},
					onDrop:function(e,source){
						$(this).append(source);						
						$(this).removeClass('over');						

					}
				});

				$('.left').droppable({
					accept:'.item, .itemc, .itemv',
					onDragEnter:function(e,source){
						$(source).draggable('options').cursor='auto';
						$(source).draggable('proxy').css('border','1px solid red');
						$(this).addClass('vlr');

					},				
					onDragLeave:function(e,source){
						$(source).draggable('options').cursor='not-allowed';
						$(source).draggable('proxy').css('border','3px solid #ccc');
						$(this).removeClass('vlr');
					},
					onDrop:function(e,source){
						$(this).append(source)
						$(this).removeClass('vlr');
					}				
				});	

			});
		</script>

		<!-- funciones para DRAG & DROP -->
		<script type="text/javascript">
			function ponerDragDrop(){
				$('.item, .itemc, .itemv').draggable({
					proxy:'clone',
					revert:true
				});				
			}
		</script>		

		<!-- script para manejo del logo RG -->
		<script type="text/javascript">
			function logo(){
				if(verlogo==1){
					document.getElementById('imagen').src='images/rg-vacio.png';	
					verlogo=0;
				}else {
					document.getElementById('imagen').src='images/rg-negro.png';
					verlogo=1;	
				}
								
			}
		</script>

		<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
		<!-- functiones panel: REPORTES /////////////////////////////////////////////////////////// -->
		<script type="text/javascript">
			function nuevoReporte(){
				document.getElementById("divnuevo").style.display="block";

				$("#pldiseno").panel('expand',true);
				$("#cmbtablas").combobox('clear');

				$("#plfiltros").panel('collapse',true);
				removerTodosFiltros();

				$("#pldatos").panel('collapse',true);

				$("#sentenciaSQL").textbox('setValue','');
				//generarDgDatos();

				// eliminar campos de div: campos(left), filas, columnas, valores
				eliminarCampos('left',1);
				eliminarCampos('filas',1);
				eliminarCampos('columnas',1);
				eliminarCampos('valores',1);

				botonesTablas('enable','enable','disable')
			}
		</script>

		<!-- funciones panel: DISENO ///////////////////////////////////////////////////////////// -->
		<!-- manejar cambios en cmbtablas -->
		<script type="text/javascript">
			$("#cmbtablas").combobox({
				onChange: function(value){
					$.post('tablaOracle.php', {tabla:value},				
					  function(result){
						if (result.success){
							var xoracle = result.noracle;
							$("#tablaSQL").textbox('setValue',xoracle);

						} else {
							$.messager.alert('Mensaje', 'problemas!!!');
						}
					},'json');

				}
			})
		</script>

		<script type="text/javascript">

			// cargar campos a div: left -- desde tabla rbcampos
			function cargarCampos(){
				var xtabla = $("#cmbtablas").combobox('getValue');

				//alert('id_tabla:'+xtabla);

				if(xtabla==''){
					$.messager.alert('Mensaje', 'NO hay tabla SELECCIONADA!!!');
				} else {

					var url='comboCamposTablaJSON.php?tabla='+xtabla;
					$.getJSON(url,function(registros){
							if (registros.length == 0){
								$.messager.alert('Mensaje','VACIO');
							}		
							else {
								$.each(registros, function(i,registro){
									var xclase = registro.clase;
									var xnombre = registro.nombre;									
									var xtipo = registro.tipo;
									var xancho = registro.ancho;

									adicionarVector(xnombre,xtipo,xancho);
									adicionarCampo(xnombre,xclase);

								});							
							}
					});

					botonesTablas('disable','disable','enable');	

				}
			}

			// guardar en vector descripcion de los campos
			function adicionarVector(nnombre, ntipo, nancho){
				vectorCampos.push({nombre:nnombre, tipo:ntipo, ancho:nancho});
			}

			// adicionar campos a la div:left
			function adicionarCampo(nnombre, nclase){
				var xhtml = "<div id='"+nnombre+"' class='"+nclase+"'><p>"+nnombre+"</p></div>"
				var $newdiv1 = $( xhtml);
  				newdiv2 = document.createElement( "div" ),
  				existingdiv1 = document.getElementById( "left" );

 				// adicionar DIV a DIV -->foo
				$( "#left" ).append( $newdiv1, newdiv2);

				ponerDragDrop();
			}

			// contar si hay elemento en una region DIV: filas, columnas, valores
			function contarCampos(ndiv){
				var divs = document.getElementById(ndiv)
				var cuantas = divs.getElementsByTagName("div");				

				var contador = 0;
				for(i=0;i<cuantas.length;i++){	
					var xid = cuantas[i].id;				
					if(xid!=''){
						contador = contador+1;
					}
				}

				return contador;
			}			

			// limpiar datagrid de datos
			function limpiarDg(){
				var xurl = 'json/reporte_vacio.php';
				$('#dg').datagrid({
					url: xurl,
					columns:[[							
						{field:'columna',width:130}
					]]	
				}); 

				$("#dg").datagrid('reload');  			

			}

			// eliminar campos de division determinada
			function eliminarCampos(ndiv,nmodo){
				var divs = document.getElementById(ndiv)
				var cuantas = divs.getElementsByTagName("div");				

				var dFil = contarCampos('filas');
				var dCol = contarCampos('columnas');
				var dVal = contarCampos('valores');

				//alert('filas:'+dFil+' col:'+dCol+' val:'+dVal);

				if((dFil==0 && dCol==0 && dVal==0) || nmodo==1){
					for(i=0;i<cuantas.length;i++){
						var xid = cuantas[i].id;
						if(xid!=''){
							$("#"+xid).remove();	
						}
					}
					botonesTablas('enable','enable','disable');

				} else {
					$.messager.alert('Mensaje','campos USADOS!!!');
				}
			}			

			// listar ID de divisiones (verificacion) -->
			function listardiv(ndiv){				
				var divs = document.getElementById(ndiv)
				var cuantas = divs.getElementsByTagName("div");
				alert(cuantas.length);

				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;
					if(xid!=''){
						alert(xid);	
					}
				}
			}

			// funcion para los botones de tablas
			function botonesTablas(bcombo, bcargar, beliminar){
				$("#cmbtablas").combobox(bcombo);
				$("#btnCargar").linkbutton(bcargar);
				$("#btnEliminar").linkbutton(beliminar);
				
			}
		</script>

		<!-- funciones panel: FILTROS //////////////////////////////////////////////////////////// -->
		<script type="text/javascript">
			var listaFiltros = [];

			var r1=0;
			var r2=70;
			var r3=90;
			var r4=100;
			var	otros  = [
					{ from : r1, to : r2, color : 'rgba(254, 46, 46, .3)' },
					{ from : r2, to : r3, color : 'rgba(250, 204, 16, .5)' },
					{ from : r3, to : r4, color : 'rgba(46, 254,  46, .5)' }
				];

			function addWin(){
				// validar si se escogio alguna tabla
				var queTabla = $("#cmbtablas").combobox('getText');
				if(queTabla==''){
					$.messager.alert('Mensaje','tabla NO DEFINIDA!!!');
					return;
				}

				var xindice = listaFiltros.length;

				// definir lista de campos a sacar
				var xl = listasacar();
				//alert('sacar:'+xl);

				//validar valor del filtro
				if(xindice!=0){
					var xcombo = $("#combo"+(xindice-1)).combobox('getValue');
					if(xcombo==''){
						return;
					}
				}

				var xcombo = 'combo'+xindice;
				var xdesde = 'd'+xindice;
				var xhasta = 'h'+xindice;

				listaFiltros.push({combo:xcombo, desde:xdesde, hasta:xhasta});

				var $newdiv1 = $("<div id='f"+xindice+"' class='inside'></div>" );
  				newdiv2 = document.createElement( "div" ),
  				existingdiv1 = document.getElementById( "foo" );

 				// adicionar DIV a DIV -->foo
				$( "#foo" ).append( $newdiv1, newdiv2);
				addInput(xindice);
				changeClassInput(xindice,xl);

			}

			// add combobox, textbox
			function addInput(nindice){	
				var $newinput1 = $("<input id='combo"+nindice+"' type='text'/>")
				var $newinput2 = $("<input id='d"+nindice+"' type='text' />")
				var $newinput3 = $("<input id='h"+nindice+"' type='text' />")

				$("#f"+nindice).append($newinput1);
				$("#f"+nindice).append($newinput2);
				$("#f"+nindice).append($newinput3);
			}			

			// cambiar clases despues de adicionar
			function changeClassInput(nindice, nurl){
				// sacar los que ya escogidos 
				var xtabla = $("#cmbtablas").combobox('getValue');

				var xurl='combocamposJSON.php?tabla='+xtabla+'&'+nurl;

				$('#combo'+nindice).combobox({
				    width:250,
				    label:'desde',
				    editable: false,
				    url:xurl,
				    valueField:'codigo',
				    textField:'nombre',
				    onSelect: function(row){
				    	var opts = $(this).combobox('options');
				    	var nombreSelect = row[opts.textField] 

				    	var xtipo = '';
				    	for(i=0;i<vectorCampos.length;i++){
				    		if(vectorCampos[i].nombre==nombreSelect){
				    			xtipo=vectorCampos[i].tipo;
				    		}	
				    	}

				    	//alert('selected-tipo:'+xtipo);

				    	// mirar si puedo cambiar a fecha
				    	if(xtipo=='DATE'){
				    		cambiarNuevamente(nindice);
				    	}
						//alert('onselect:'+row[opts.textField]);						
						//alert(this.id);
				    	//alert('hola');    	
				    }
				});										
				$('#d'+nindice).textbox({ 
					width:200,
					prompt:'--- DESDE ---',
					iconWidth:22,
					iconAlign:'right',
					icons: [{
						iconCls: 'icon-cancel',
						handler: function(e){
					        	$(e.data.target).textbox('clear');                	
						}
					}]	
				});
				$('#h'+nindice).textbox({ 
					width:200,
					prompt:'--- HASTA ---',
					iconWidth:22,
					iconAlign:'right',
					icons: [{
						iconCls: 'icon-cancel',
						handler: function(e){
					        	$(e.data.target).textbox('clear');                	
						}
					}]
				});
			}

			// remove fx - con todos los hijos 			
			function removeInput(){
				var xindice = listaFiltros.length-1;
				$("#f"+xindice).remove();
				var removeItem = listaFiltros.splice(xindice,1);				

			}

			//remover filtros
			function removerTodosFiltros(){
				//listardiv('foo');
				listaFiltros = [];
				var divs = document.getElementById('foo')
				var cuantas = divs.getElementsByTagName("div");
				//alert(cuantas.length);

				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;
					if(xid!=''){
						$("#f"+i).remove();	
					}
				}

			}
		</script>

		<!-- intar cambiar los FILTROS segun lo selected -->
		<script type="text/javascript">
			function cambiarNuevamente(xindice){
				//alert('nuevamente');
				// xindice --> determina el nombre de campos {d}+xindice
				$('#d'+xindice).datebox({
					width:200,
    				required:false,
    				formatter:myformatter,
    				parser:myparser
				});
				$('#h'+xindice).datebox({
					width:200,
    				required:false,
    				formatter:myformatter,
    				parser:myparser
				});

			}
		</script>

		<!-- funciones de revision de FILTROS -->
		<script type="text/javascript">
			function showListaFiltros(){
				for(i=0;i<listaFiltros.length;i++){					
					alert(listaFiltros[i].combo+' '+listaFiltros[i].desde+' '+listaFiltros[i].hasta);
				}
			}

			function mostrarOtros(){
				alert("otros");

				for(i=0;i<otros.length;i++){
					alert(otros[i].from+' '+otros[i].to+' '+otros[i].color);
				}
			}

			function listadiv(){				
				var divs = document.getElementById("foo")
				var cuantas = divs.getElementsByTagName("input");
				alert(cuantas.length);

				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;
					if(xid.substring(xid,1,1)=='c'){
						var xvalor = $("#"+xid).combobox('getValue');
						alert(xid+' '+xvalor);
					}
					if(xid.substring(xid,1,1)=='d' || xid.substring(xid,1,1)=='h'){
						var xvalor = $("#"+xid).textbox('getValue');
						alert(xid+' '+xvalor);
					}
					
				
				}

			}

			function listasacar(){
				var divs = document.getElementById("foo")
				var cuantas = divs.getElementsByTagName("input");

				// armar cadena para sacar campos ya usados
				var xsacar = '';
				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;
					if(xid.substring(xid,1,1)=='c'){
						var xvalor = $("#"+xid).combobox('getValue');
						if(xsacar!=''){
							xsacar = xsacar+'&';
						}	
						xsacar = xsacar + 'sacar[]='+xvalor;
					}					
				
				}

				return xsacar;

			}
		</script>

		<!-- rutinas de generacion de DATOS ///////////////////////////////////////////////////// -->
		<script type="text/javascript">
			function listarVector(){
				for(i=0;i<vectorCampos.length;i++){					
					alert(vectorCampos[i].nombre+' '+vectorCampos[i].tipo+' '+vectorCampos[i].ancho);
				}
			}

			function generarDatos(){
				// asigna a textbox: tablaSQL nombre consulta Oracle
				$("#pldatos").panel('expand',true);

				// anterior procedimiento de generacion de grid
				//var xoracle = $("#tablaSQL").textbox('getValue');
				//generarSQL(xoracle); 

				generarDataGrid();
				//generarDgDatos();


			}

			// genera lista de CAMPOS extraidos de div
			function camposSQL(ndiv,noperacion){
				var divs = document.getElementById(ndiv)
				var cuantas = divs.getElementsByTagName("div");

				//alert(cuantas.length);
				var campos = '';

				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;
					if(xid!=''){

						// adicionar [,] al final de la cadena como separador
						if(campos!=''){
							campos=campos+',';
						}

						// si realiza operacion...por ahora SUM()
						if(noperacion==0){
							nuevoCampo = xid;
						} else {
							nuevoCampo = 'SUM('+xid+') ' + xid;
						}

						campos=campos+nuevoCampo;

					}
				}
				return campos;
			}

			// ---------------------------------- genera lista de FILTROS -
			function filtrosSQL(){
				//showListaFiltros();
				var divs = document.getElementById("foo")
				var cuantas = divs.getElementsByTagName("input");

				//alert(cuantas.length);

				// cadena de condiciones [xcon]
				var eCondicion = '';
				var eCampo = ''; // para filtero especial
				var filtroEsp = 'N';
				var condiT = '';
				var condi = '';
				var qTipo = '';

				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;

					// c-ombo d-esde, h-asta 
					if(xid.substring(xid,1,1)=='c'){
						var xvalor = $("#"+xid).combobox('getValue');
						//alert(xid+' '+xvalor);

						// verificar si no esta vacia agregar AND
						/*
						if(condi!=''){
							condi = condi + ' AND '
						}
						*/

						if(condiT!=''){
							condiT = condiT + ' AND '
						}

						// adicionar valor de combo 
						condi = condi + xvalor + ' BETWEEN ';

						// guardo campo para filtro especial
						eCampo = xvalor;

						// buscar tipo de dato
						qTipo = queTipoEs(xvalor);
						//alert("qTipo:"+qTipo);
						//alert("xvalor:"+xvalor);

					}
					if(xid.substring(xid,1,1)=='d' || xid.substring(xid,1,1)=='h'){
						var xvalor = $("#"+xid).textbox('getValue');
						//alert(xid+' '+xvalor);

						// adicionar primero DESDE 
						if(qTipo=='DATE'){
							xvalor = "TO_DATE('"+xvalor+"','YYYY-MM-DD')";
						} else {
							xvalor = "'" + xvalor + "'";
						}

						if(xid.substring(xid,1,1)=='d'){
							condi = condi + xvalor + " AND ";

							// verificar si es filtro especial
							var n1 = xvalor.indexOf('(',0);
							var n2 = xvalor.indexOf(',',0);

							//alert(xvalor+' '+n1+' '+n2+' '+qTipo);

							if(n1>0 || n2>0){
								if(qTipo!='DATE'){
									filtroEsp = 'S';
									eCondicion = xvalor;									
								}

							}


						} else {
							condi = condi + xvalor;

							// acumular condi en condiT y verficar si es filtro especial
							if(filtroEsp=='N'){
								condiT = condiT + condi;
								condi = '';								
							}  else {
								//alert(eCampo+' '+eCondicion);

								// generacion de filtro ESPECIAL
								// hijueputa!!! viene con ''
								var eCondicion1 = eCondicion.replace("'","");
								var eCondicion2 = eCondicion1.replace("'","");

								condi = generarFiltro(eCondicion2, eCampo);	
								condiT = condiT + condi;

								filtroEsp='N';
								condi='';
							}

						}

					}
					
				}

				return condiT;
			}

			// buscar que tipo es el campo sobre vectorCampos[]
			function queTipoEs(nnombre){
				var ntipo = '';
				//alert('queTipoEs, la longitud es: '+vectorCampos.length);
				for(k=0;k<vectorCampos.length;k++){
					//alert('nombre:'+vectorCampos[i].nombre);
					if(vectorCampos[k].nombre==nnombre){
						ntipo = vectorCampos[k].tipo;
					}
				}
				return ntipo;

			}

			// -------------------------------- genera cadena con SQL - 
			function generarSQL(xoracle){

				//alert('vista:'+xoracle)

				var cmdCampos = camposSQL('filas',0);
				var cmdValores = camposSQL('valores',1);
				var cmdFiltros = filtrosSQL();

				// alert('filas:'+cmdCampos);
				//alert('valores:'+cmdValores);
				//alert('filtros:'+cmdFiltros);

				sentencia = 'SELECT ' + cmdCampos + ',' + cmdValores +
							' FROM ' + xoracle +
							' WHERE ' + cmdFiltros +
							' GROUP BY ' + cmdCampos +
							' ORDER BY ' + cmdCampos ;

				$("#sentenciaSQL").textbox('setValue',sentencia);

			}
		</script>

		<!-- formato fechas para los filtros -->
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

		<!-- script para la generacion de DataGrid -->
		<script type="text/javascript">
			$("#ncolumnasSQL").textbox({
				onChange: function(){
					generarDgDatos();
				}
			})			
		</script>

		<!-- nuevo script para inclusion de COLUMNAS -->
		<script type="text/javascript">
			function generarDataGrid(){				
				$("#pldatos").panel('expand',true);

				asignarVariables();

				// contar columnas para generar valores
				var xcolumnas = contarCampos('columnas');
				if(xcolumnas>0){
					generarColumnas();
				} else {
					generarDgDatos();
				}
				

			}

			function asignarVariables(){
				// inicializar variables
				vectorCols = [];

				$("#filasSQL").textbox('setValue','');
				$("#columnasSQL").textbox('setValue','');
				$("#ncolumnasSQL").textbox('setValue','');
				$("#valoresSQL").textbox('setValue','');
				$("#listaValores").textbox('setValue','');
				$("#filtrosSQL").textbox('setValue','');

				// filas para SQL
				var cmdCampos = camposSQL('filas',0);
			
				var cmdColumnas  = camposSQL('columnas',0);
				var cmdValores = camposSQL('valores',1);
				var cmdListaValores = camposSQL('valores',0);				
				var cmdFiltros = filtrosSQL();			
				
				$("#filasSQL").textbox('setValue',cmdCampos);
				$("#columnasSQL").textbox('setValue',cmdColumnas);
				$("#valoresSQL").textbox('setValue',cmdValores);
				$("#listaValores").textbox('setValue',cmdListaValores);
				$("#filtrosSQL").textbox('setValue',cmdFiltros);

			}

			/*-- listado de columnas desde tabla --*/
			function generarColumnas(){
				var xtabla = $("#tablaSQL").textbox('getValue');				
				var xcolumnas = $("#columnasSQL").textbox('getValue');
				var xfiltros = $("#filtrosSQL").textbox('getValue');

				//alert(cmdColumnas);
				
				var xurl='columnas_safix.php?tabla='+xtabla+'&columnas='+xcolumnas+'&filtros='+xfiltros;
				//alert(xurl);

				$.getJSON(xurl,function(registros){
						if (registros.length == 0){
							$.messager.alert('0 registros');
						}		
						else {
							var lcolumnas = '';
							$.each(registros, function(){
								$.each(this, function(name, value){
									if(lcolumnas!=''){
										lcolumnas = lcolumnas + ',';
									}

									lcolumnas = lcolumnas + value;
									//$.messager.alert('Mensaje','lcolumnas: '+lcolumnas);

									// este vector es usado para generar el DataGrid	
									vectorCols.push(value);					
									

								});
							});

							//$.messager.alert('Mensaje','columnas generadas:'+lcolumnas);
							// actualizar de un solo viaje - jajajaja
							$("#ncolumnasSQL").textbox('setValue', lcolumnas);

						}
				});

				

			}

		</script>

		<!-- generar datos para datagrid -->
		<script type="text/javascript">
			function generarDgDatos(){
				var menuStruct = [];
				var menuItems = [];

				menuStruct.pop();
				menuItems.pop();

				// recorrer DIV filas -------------------------------------------------------
				var divs = document.getElementById("filas");
				var cuantas = divs.getElementsByTagName("div");
				//alert(cuantas.length);

				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;
					if(xid!=''){
						var queAncho=datosVectorCampos(xid);
						var menuitem = {field: xid, title: xid, width: queAncho};
						menuItems.push(menuitem);
						//alert(xid+'-'+xid+'-'+queAncho);	
					}
				}

				// recorrer DIV columnas -----------------------------------------------------
				var cuantas = contarCampos('columnas');		
				if(cuantas!=0){
					// si tiene columnas..las genera como columnas del grid
					//for(i=0;i<vectorCols.length;i++){
					//	alert('vectorCols='+vectorCols[i]);
					//}
					for(i=0;i<vectorCols.length;i++){
						var xid = vectorCols[i];
						if(xid!=''){
							var queAncho=100;							
							var menuitem = {field: xid, title: xid, width: queAncho, align:'right'};
							menuItems.push(menuitem);

						}
					}

				}

				var divs = document.getElementById("valores");
				var cuantas = divs.getElementsByTagName("div");
				//alert(cuantas.length);

				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;
					if(xid!=''){
						var queAncho=datosVectorCampos(xid);

						// definir formato del campo -- NO SOLUCIONADO
						var menuitem = {field: xid, title: xid, width: queAncho, align:'right'};

						//alert(menuitem);

						menuItems.push(menuitem);
						//alert(xid+'-'+xid+'-'+queAncho);	
					}
				}

				/*
				formatter: function(value,row){
					return accounting.formatNumber(row.ene);
					}
				}, 
				*/

				menuStruct.push(menuItems);				

				var xsql = $("#sentenciaSQL").textbox('setValue','');

				xtabla = $("#tablaSQL").textbox('getValue');
				xcampos = $("#filasSQL").textbox('getValue');

				xcolumnas = $("#columnasSQL").textbox('getValue');
				xncolumnas = $("#ncolumnasSQL").textbox('getValue');

				xfiltros = $("#filtrosSQL").textbox('getValue');
				xvalores = $("#valoresSQL").textbox('getValue');
				xlistaValores = $("#listaValores").textbox('getValue');				

				var xurl = "columnas_sql_safix.php?tabla="+xtabla+"&campos="+xcampos+"&columnas="+xcolumnas+"&ncolumnas="+xncolumnas+"&filtros="+xfiltros+"&valores="+xvalores+'&listaValores='+xlistaValores;

				$('#dg').datagrid({
					url: xurl,
				    columns: menuStruct
				}); 

				$("#dg").datagrid('reload');  			


			}

			// devuelve el ANCHO de la columna
			function datosVectorCampos(nname){
				for(p=0;p<vectorCampos.length;p++){
					if(vectorCampos[p].nombre==nname){
						return vectorCampos[p].ancho;
					}
				}
				return 0;
			}
		</script>

		<!-- funciones para filtro ESPECIAL -->
		<script type="text/javascript">
			function generarFiltro(cadena,campo){
				var sentencia = '(';

				// va acumulando caracteres para filtro sencillo	
				var ctemporal = '';	
				var i=0;
				while(i<cadena.length){
					car = cadena.substr(i,1);
					//verificar si tiene filtros especiales
					if(car=='('){
						var d = i;
					
						var h = cadena.indexOf(")",i);
						var m = cadena.indexOf(":",i);
						var ld = m-(d+1);
						var lh = h-(m+1);

						var desde = cadena.substr(d+1,ld);
						var hasta = cadena.substr(m+1,lh);
						
						// generar comando a partit de parametros	
						var srango = comando(campo,desde,hasta);

						sentencia = acumular(sentencia, srango);

						//  ),
						i = h+1;

						//alert(srango);


					} else if(car==','){							
						var srango = comando(campo,ctemporal,'');
						sentencia = acumular(sentencia, srango);

						//alert('ctemporal:'+ctemporal);
						//alert(srango);

						ctemporal = '';

					} else {
						if(car!=' ' || i==cadena.length-1){
							ctemporal += car;	
						}

					}

					i++;
							
				}

				// voy los restos
				if(ctemporal!=''){
					var srango = comando(campo,ctemporal,'');
					sentencia = acumular(sentencia, srango);

				}

				sentencia += ')';
				//alert('filtro:'+sentencia);

				return sentencia;

			}

			function comando(xcampo,xdesde,xhasta){
				var nueva = '';
				if(xhasta==''){
					nueva = "(" + xcampo + " = '" + xdesde + "')";
				} else {
					nueva = "(" + xcampo + " BETWEEN '" + xdesde + "' AND '" + xhasta + "')";

				}
				return nueva;

			}

			function acumular(xsentencia, xrango){
				if(xsentencia.length>1){
					xsentencia += " OR ";
				}
				return xsentencia+xrango;
			}
		</script>

		<!-- function SALIDA excel -->
		<script type="text/javascript">
			function generarExcel(){
				xtabla = $("#tablaSQL").textbox('getValue');
				xcampos = $("#filasSQL").textbox('getValue');

				xcolumnas = $("#columnasSQL").textbox('getValue');
				xncolumnas = $("#ncolumnasSQL").textbox('getValue');

				xfiltros = $("#filtrosSQL").textbox('getValue');
				xvalores = $("#valoresSQL").textbox('getValue');
				xlistaValores = $("#listaValores").textbox('getValue');				

				var xurl = "reporteExcel.php?tabla="+xtabla+"&campos="+xcampos+"&columnas="+xcolumnas+"&ncolumnas="+xncolumnas+"&filtros="+xfiltros+"&valores="+xvalores+'&listaValores='+xlistaValores;

				//alert(xurl);

				location.assign(xurl);

			}

		</script>

		<!-- function comboReportes -->
		<script type="text/javascript">
			function actualizarReportes(){
				var xusuario = $("#usuario").val();				

				$('#cmbreportes').combobox({
				    url:'comboReportesJSON.php?usuario='+xusuario,
				    valueField:'codigo',
				    textField:'nombre'
				});				

			}
		</script>

		<!-- function grabar reporte -->
		<script type="text/javascript">
			function grabarReporte(){				
				grabarNombre();
				
			}

			function grabarNombre(){
				var xusuario = $("#usuario").val();
				var xtabla = $("#cmbtablas").combobox('getValue');
				var xnombre = $("#nombreReporte").textbox('getValue');

				$.messager.confirm('Confirm','Esta seguro de GRABAR REPORTE ??? ',function(r){
					if (r){
						$.post('json/reporte_save.php', {usuario:xusuario, tabla:xtabla, nombre:xnombre},				
						  function(result){
							if (result.success){					
								$.messager.alert('Mensaje', 'registro grabado EXITOSAMENTE!!!');
								$("#nid").textbox('setValue', result.nid);
								actualizarReportes();

							} else {
								$.messager.alert('Mensaje', 'problemas!!!');
							}
						},'json');						
					}
				});

			}

			function grabarCampos(ndiv){				
				var divs = document.getElementById(ndiv)
				var cuantas = divs.getElementsByTagName("div");
				
				//alert(cuantas.length);
				var xreporte = $("#nid").textbox('getValue');
				var xtabla = $("#cmbtablas").combobox('getValue');

				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;					
					if(xid!=''){
						//alert(xid);		
						//alert(xid+':'+document.getElementById(xid).className);
						var xclase = document.getElementById(xid).className;
						$.post('json/reporte_campo_save.php', 
						  {reporte:xreporte, tabla:xtabla, nombre:xid, clase:xclase, xdiv:ndiv},				
						  function(result){
							if (!result.success){					
								$.messager.alert('Mensaje', 'problemas!!!');
							}
						},'json');						

					}
				}
			}

			function grabarFiltros(){
				var xreporte = $("#nid").textbox('getValue');

				var xtipo = '';				
				for(i=0;i<listaFiltros.length;i++){					
					//alert(listaFiltros[i].combo+' '+listaFiltros[i].desde+' '+listaFiltros[i].hasta);
					//alert(xcombo+' '+xdesde+' '+xhasta);
					var xcombo = $("#"+listaFiltros[i].combo).combobox('getValue');
					var xdesde = $("#"+listaFiltros[i].desde).textbox('getValue');
					var xhasta = $("#"+listaFiltros[i].hasta).textbox('getValue');

					xtipo = '';

					$.post('json/reporte_filtro_save.php', {reporte:xreporte, combo:xcombo, desde:xdesde, hasta:xhasta, tipo:xtipo},
					  function(result){
						if (!result.success){					
							$.messager.alert('Mensaje', 'problemas!!!');
						}
					},'json');						

				}

			}

		</script>

		<!-- grabar x cambio en nid -->
		<script type="text/javascript">
			$("#nid").textbox({
				onChange: function(value){
					if(value!=''){
						grabarCampos('filas');
						grabarCampos('columnas');
						grabarCampos('valores');
						grabarFiltros();
					}
				}
			})			
		</script>

		<!-- function CARGAR reporte -->
		<script type="text/javascript">
			function cargarReporte(){				
				var xreporte = $("#cmbreportes").combobox('getValue');
				if(xreporte==''){
					$.messager.alert('Mensaje','REPORTE no seleccionado.');
					return;
				}

				$("#pldiseno").panel('expand',true);				

				$("#cmbtablas").combobox('clear');

				$("#plfiltros").panel('collapse',true);
				removerTodosFiltros();

				$("#pldatos").panel('collapse',true);

				$("#sentenciaSQL").textbox('setValue','');

				// eliminar campos de div: campos(left), filas, columnas, valores
				eliminarCampos('left',1);
				eliminarCampos('filas',1);
				eliminarCampos('columnas',1);
				eliminarCampos('valores',1);

				limpiarDg();

				botonesTablas('disable','disable','disable');

				// hay que inicializar el vector 				
				var vectorCampos = [];

				$.post('json/reporte_tabla.php', {reporte:xreporte},
				  function(result){
					if (result.success){					
						$("#cmbtablas").combobox('setValue', result.idtabla);
						cargarReporteCampos();
						cargarReporteCamposDiv();
						cargarReporteFiltro();						
						
					}
				},'json');						

			}

			function cargarReporteCampos(){
				var xreporte = $("#cmbreportes").combobox('getValue');
				var xtabla = $("#cmbtablas").combobox('getValue');

				//alert('id_tabla:'+xtabla);

				var url='json/reporte_tabla_campos.php?reporte='+xreporte+'&tabla='+xtabla;
				$.getJSON(url,function(registros){
						if (registros.length == 0){
							$.messager.alert('Mensaje','VACIO');
						}		
						else {
							$.each(registros, function(i,registro){
								var xclase = registro.clase;
								var xnombre = registro.nombre;									
								var xtipo = registro.tipo;
								var xancho = registro.ancho;

								adicionarVector(xnombre,xtipo,xancho);
								adicionarCampo(xnombre,xclase);

							});							
						}
				});				
			}	

			function adicionarCampoDiv(ndiv, nnombre, nclase){
				var xhtml = "<div id='"+nnombre+"' class='"+nclase+"'><p>"+nnombre+"</p></div>"
				var $newdiv1 = $( xhtml);
  				newdiv2 = document.createElement( "div" ),
  				existingdiv1 = document.getElementById( ndiv );

 				// adicionar DIV a DIV -->foo
				$( "#"+ndiv ).append( $newdiv1, newdiv2);

				ponerDragDrop();
			}

			function cargarReporteCamposDiv(){
				var xreporte = $("#cmbreportes").combobox('getValue');

				var url='json/reporte_campos.php?reporte='+xreporte;
				$.getJSON(url,function(registros){
						if (registros.length == 0){
							$.messager.alert('Mensaje','VACIO');
						}		
						else {
							$.each(registros, function(i,registro){								
								var nnombre = registro.nombre;									
								var nclase = registro.clase;
								var ndiv = registro.xdiv;

								adicionarCampoDiv(ndiv, nnombre, nclase);
							});							
						}
				});				

			}

		</script>

		<!-- functiones para cargar FILTROS -->	
		<script type="text/javascript">
			function cargarReporteFiltro(){
				var xreporte = $("#cmbreportes").combobox('getValue');

				var i = 0;
				var url='json/reporte_filtros.php?reporte='+xreporte;
				$.getJSON(url,function(registros){
						if (registros.length == 0){
							$.messager.alert('Mensaje','VACIO');
						}		
						else {
							$.each(registros, function(i,registro){
								addWin();
								$("#combo"+i).combobox('setValue',registro.combo);
								$("#d"+i).textbox('setValue', registro.desde);
								$("#h"+i).textbox('setValue', registro.hasta);

								i=i+1;

							});							
						}
				});

			}

			function cambiarCampos(){				
				for(i=0;i<listaFiltros.length;i++){					
					//alert(listaFiltros[i].combo+' '+listaFiltros[i].desde+' '+listaFiltros[i].hasta);

					var xnombre = $("#"+listaFiltros[i].combo).combobox('getValue');
					var xtipo = queTipoEs(xnombre);

					if(xtipo=='DATE'){
						cambiarNuevamente(i);	
					}
					//alert(xnombre+' '+xtipo);

				}

			}

			function setFiltro(){
				$("#combo0").combobox('setValue','FECHA');
				cambiarNuevamente(0);
			}			

		</script>

		<!-- script PANELES /////////////////////////////////////////////////////////////////////// -->
		<script type="text/javascript">
			function paneles(pdiseno,pfiltros,pdatos){
				if(pdiseno==0){
					$("#pldiseno").panel('collapse',true);
				}else {
					$("#pldiseno").panel('expand',true);
				}

				if(pfiltros==0){
					$("#plfiltros").panel('collapse',true);
				}else {
					$("#plfiltros").panel('expand',true);
				}

				if(pdatos==0){
					$("#pldatos").panel('collapse',true);
				}else {
					$("#pldatos").panel('expand',true);
				}

			}
		</script>
	</body>
</html>