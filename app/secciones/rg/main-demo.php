<?
session_start();
	$usuario = $_SESSION['usuario'];
	
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
	</head>
	<body><div class="bordesRG">
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
			collapsible="true" headerCls="hc" style="width:100%"			 
			data-options="collapsed:true">

			<div class="freportes">
				<label>Disponibles:</label>
				<input id="cmbreportes" name="cmbreportes" class="easyui-combobox" 
					   url="comboReportesJSON.php"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">

				<a class="easyui-linkbutton" onclick=""
				   data-options="iconCls:'icon-page'"><span>Cargar</span></a>

				<a class="easyui-linkbutton" onclick="nuevoReporte()"
				   data-options="iconCls:'icon-add'"><span>Nuevo</span></a>

				<div id="divnuevo" style="float:right;display:none">
					<a class="easyui-linkbutton" onclick="grabarReporte()" 
					   style="border-color:#A4A4A4;width:120px"
					   data-options="iconCls:'icon-save'"><span><B>Grabar</B></span></a>

					<input id="nombreReporte" class="easyui-textbox" style="width:300px;height:28px">            	

				</div>
				<div style="float:right">
					<a class="easyui-linkbutton" onclick="generarDatos()" 
					   style="border-color:#A4A4A4;width:120px"
					   data-options="iconCls:'icon-rayito'"><span><B>GENERAR</B></span></a>
				
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
			data-options="collapsed:true">

			<div style="margin:0px 0 20px 30px">

				<div class="botonesFiltros">
					<a href="javascript:void(0)" class="easyui-linkbutton" onclick="addWin()" 
					   data-options="iconCls:'icon-add'">Agregar</a>

					<a href="javascript:void(0)" class="easyui-linkbutton" onclick="removeInput()" 
					   data-options="iconCls:'icon-cancel'">Quitar</a>

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
					
					</div>  

				</div>
						   
				<div class="easyui-panel" title='<p class="titulos">&nbsp Lista de F I L T R O S</p>'
					headerCls="ph" bodyCls="pb" 
					style="width:775px"
		        	data-options="iconCls:'icon-listaFiltros'">

					<!-- botones Add, remove. botones de verificacion de filtros -->
					<div id="tt">
					</div>	

					<!-- contenedor de FILTROS: foo -->
					<div id='foo' class="containerFiltros">
					</div>
				</div>	
			</div>	
		</div>

		<!-- panel: DATOS, SQL - DESARROLLADORES  //////////////////////////////////////////////////////////// -->
		<div id="pldatos" class="easyui-panel" title='<font color="white">DATOS</font>' 
			collapsible="true" headerCls="hc" style="width:100%"
			data-options="collapsed:true">

			<div style="display:none">
				<div style="margin:10px 0 10px 10px">
	            	<input id="sentenciaSQL" class="easyui-textbox" multiline="true" style="width:80%;height:100px">            	
	        	</div>

				<a href="javascript:void(0)" class="easyui-linkbutton" 
				   onclick="generarDgDatos()" data-options="iconCls:'icon-more'">dataGrid</a>

			</div>
			<!--
			<table id="dg"></table>
			-->

			<table id="dg" class="easyui-datagrid" style="width:98%;height:auto"
					url=""
					title=""
					headerCls="hc"
					singleSelect="true" rownumbers="true"
					pagination="false" showFooter="true"
					fitColumns="false">
			</table>			

		<div>

		<!-- /////////////////////////////////////////////////////////////////////////////////// -->	
		<!-- JS rutinas de programacion //////////////////////////////////////////////////////// -->
		<!-- /////////////////////////////////////////////////////////////////////////////////// -->	

		<!-- script para DRAG & DROP -->
		<script type="text/javascript">
			var verlogo = 1;
			var vectorCampos = [];

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
				// extraer nombre de la tabla oracle
				$("#pldatos").panel('expand',true);
				xtabla = $("#cmbtablas").combobox('getValue');
				// alert(xtabla);

				$.post('tablaOracle.php', {tabla:xtabla},				
				  function(result){
					if (result.success){
						var xoracle = result.noracle;
						//$.messager.alert('post:', xoracle);
						generarSQL(xoracle);

					} else {
						$.messager.alert('Mensaje', 'problemas!!!');
					}
				},'json');

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
				var condi = '';
				var qTipo = '';

				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;

					// c-ombo d-esde, h-asta 
					if(xid.substring(xid,1,1)=='c'){
						var xvalor = $("#"+xid).combobox('getValue');
						//alert(xid+' '+xvalor);

						// verificar si no esta vacia agregar AND
						if(condi!=''){
							condi = condi + ' AND '
						}

						// adicionar valor de combo 
						condi = condi + xvalor + ' BETWEEN ';

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
						} else {
							condi = condi + xvalor;
						}

					}
					
				}

				return condi;
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

		<!-- cambios en sentenciaSQL -->
		<script type="text/javascript">
			$("#sentenciaSQL").textbox({
				onChange: function(){
					generarDgDatos();
				}
			})
		</script>
		<script type="text/javascript">
			function generarDgDatos(){
				var menuStruct = [];
				var menuItems = [];

				menuStruct.pop();
				menuItems.pop();

				// recorrer las DIV de filas 
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

				var divs = document.getElementById("valores");
				var cuantas = divs.getElementsByTagName("div");
				//alert(cuantas.length);

				for(i=0;i<cuantas.length;i++){
					var xid = cuantas[i].id;
					if(xid!=''){
						var queAncho=datosVectorCampos(xid);

						// definir formato del campo
						var formato = 'formatter: function(value,row){return accounting.formatNumber(row.'+xid+');}';
						// 'formatter: function(value,row){return accounting.formatNumber(row.VENTA_NETA);';
						var menuitem = {field: xid, title: xid, width: queAncho, align:'right' };

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
				var xsql = $("#sentenciaSQL").textbox('getValue');
				var xurl = "oracle_sql.php?sql="+xsql;

				//alert(xurl);

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

	</div></body>
</html>