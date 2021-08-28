<?php

// CARGUE ARCHIVOS - imagenes, pdf, mp4
if(isset($_POST['action-upload'])){	
	// Count total files
	$countfiles = count($_FILES['file']['name']);
	 
	// Looping all files
	for($i=0;$i<$countfiles;$i++){
	   $filename = $_FILES['file']['name'][$i];
	   
		// Upload file
		// move_uploaded_file($_FILES['file']['tmp_name'][$i],'files/'.$filename);
		copy($_FILES['file']['tmp_name'][$i],'files/'.$filename);
	}
}

// Y AHORA CON USTEDES...IMPORTACION DE DATOS
if(isset($_POST['action-import'])){

	if(isset($_POST['itabla'])){

		include '../../control/conex.php';

		// $empresa = $_POST['cmbempresas'];
		$tabla = $_POST['itabla'];		

		// hay que definir los campos de la tabla excepto el id
		// cargar clase PHP para manejo base de datos /////////////////////////////////////////////////////
		require_once('json/mysql-i-class.php');
		$reg = new Registro();

		$sql = "SELECT column_name FROM information_schema.columns WHERE table_name='$tabla' ";
		$result = $reg->consultar($sql);

		$cuantos = 0;		
		$cadena = '';
		while($row = mysqli_fetch_object($result)){
			// si la cadena tiene datos le pongo la coma
			if($cadena!=''){
				$cadena = $cadena.',';
			}
			// validar que la columna sea diferente al ID
			if($row->column_name!='id'){
				// adicionar datos a cadena de campos
				$cadena = $cadena.$row->column_name;
				$cuantos = $cuantos + 1;
			}

		}

		//Aquí es donde seleccionamos nuestro csv
		$fname = $_FILES['sel_file']['name'];
		// echo 'Cargando nombre del archivo: '.$fname.' <br>';
		$chk_ext = explode(".",$fname);

		if(strtolower(end($chk_ext)) == "csv")
		{
		 //si es correcto, entonces damos permisos de lectura para subir
		 $filename = $_FILES['sel_file']['tmp_name'];
		 $handle = fopen($filename, "r");

		 while (($data = fgetcsv($handle, 10000, ";")) !== FALSE)
		 {
		 	// toca armar aca la cadena de datos
		 	$datos = '';
		 	// $datos = "'".$empresa."'";
		 	// ojo reduciomos en 1 cuantos porque el codigo de empresa se adiciona
		 	for($i=0;$i<$cuantos;$i++){
		 		if($datos!=''){
		 			$datos = $datos.','."'".$data[$i]."'";
		 		}else {
		 			$datos = "'".$data[$i]."'";
		 		}
		 	}

		    //Insertamos los datos con los valores...
		    $sql = "INSERT INTO ".$tabla." (".$cadena.") VALUES (".$datos.")";

			// validacion de $result a archivo texto
			$fp = fopen('fichero.txt','w');
			fputs($fp, $empresa.'-'.$cadena.'-'.$sql);
			fclose($fp);
			// -------------------------------------	


		    mysqli_query($conexion, $sql);

		 }
		 fclose($handle);
		 // echo utf8_decode("Importación exitosa!");
		}
		else
		{
		 	echo "Archivo invalido!";
		}

	}
}

?>
<!DOCTYPE html>
<html>
<head>	
	<meta charset="UTF-8">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Dynamic-napro</title>
	<link rel="stylesheet" type="text/css" href="jeasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="jeasyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="jeasyui/themes/color.css">
	<link rel="stylesheet" type="text/css" href="jeasyui/demo/demo.css">
	
	<script type="text/javascript" src="jeasyui/jquery.min.js"></script>
	<script type="text/javascript" src="jeasyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="jeasyui/locale/easyui-lang-es.js"></script>

	<script type="text/javascript" src="js/datagrid-filter.js"></script>
	<script type="text/javascript" src="js/datagrid-scrollview.js"></script>
	<script type="text/javascript" src="js/accounting.js"></script>

	<!-- superRutinas de dynamic.js a ver como nos va???? ///////////////////////////////////////// -->
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/dynamic.js"></script>
	<script type="text/javascript" src="js/archivos.js"></script>
	<script type="text/javascript" src="js/visor.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dynamic.css">

	<!-- rutinas generales para presentacion de pantalla ////////////////////////////////////////// -->
	<link rel="stylesheet" type="text/css" href="css/tooltips.css">
	<link rel="stylesheet" type="text/css" href="css/archivos.css">

</head>
<body>
	<div id="zonafantasma" style="display:none">
		<input id="dbname" name="dbname" class="easyui-textbox" value="ryl">
		<input id="dgtabla" name="dgtabla" class="easyui-textbox">

		<!-- se cambia el valor a 'S' en dynamic.js - leerCampos() //////////////////////////////// -->
		<input id="dgexiste" name="dgexiste" class="easyui-textbox" value='N'>
		<input id="dgrow" name="dgrow" class="easyui-textbox" value="-999">

		<!-- variable de control para ampliarArchivo - azul:cargue(file,carpeta), rojo:dg tabla /// -->
		<input id="archivo-color" name="archivo-color" class="easyui-textbox">

		<!-- variables para ancho y alto del archivo atraves de js //////////////////////////////// -->
		<!-- eextraer en funcion dimArchivo()-visor.js //////////////////////////////////////////// -->
		<input id="itipo" name="itipo" class="easyui-textbox">
		<input id="iancho" name="iancho" class="easyui-textbox">
		<input id="ialto" name="ialto" class="easyui-textbox">

	</div>
	<div class="botonera">
		<!-- DIV combo de seleccion de tabla ////////////////////////////////////////////////////// -->
		<div class="bordes">
			<div class="tdiv">
				<input id="cmbtablas" name="cmbtablas" class="easyui-combobox" 
					   url="json/combotablas.php" style="width:250px"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">
			</div>
		</div>

		<!-- Div Manejo de tablas ///////////////////////////////////////////////////////////////// -->		
		<div class="bordes bordes-left">
	        <div class="tdiv">
	         	<a id="btnDg" name="btnDg" class="boton" onclick="iniciarTablaComboVisor()">
	         		<img src="icons/Ok.png">
	         	</a>
	         	<span class="tooltiptext">Mostrar TABLA</span>
	        </div>
	        <div class="tdiv">
	         	<a id="btnDgX" name="btnDgX" class="boton" onclick="removeTablaDg()">
	         		<img src="icons/Trash.png" >
	         	</a>
	         	<span class="tooltiptext">remover TABLA</span>
	        </div>	        
	    </div>

	    <!-- DIV manejo de registros de la grid /////////////////////////////////////////////////// -->
		<div class="bordes bordes-left">
	        <div class="tdiv">
	         	<a id="btnNuevo" name="btnNuevo" class="boton" onclick="mainDlg('N')">
	         		<img src="icons/Plus.png" >
	         	</a>
	         	<span class="tooltiptext">NUEVO registro</span>
	        </div>
	        <div class="tdiv">
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="mainDlg('E')">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">EDITAR registro</span>
	        </div>
	        <div class="tdiv">
	         	<a id="btnRemover" name="btnRemover" class="boton" onclick="eliminarReg()">
	         		<img src="icons/Cancel.png" >
	         	</a>
	         	<span class="tooltiptext">REMOVER registro</span>
	        </div>
	    </div>

	    <!-- DIV cargue/visor de archivos ///////////////////////////////////////////////////////// -->
	    <div id="visor-botones" class="bordes bordes-left" style="visibility:hidden">
	        <div class="tdiv">
	         	<a id="btnCargue" name="btnCargue" class="boton" onclick="cargarArchi()">
	         		<img src="icons/Applications.png" >
	         	</a>
	         	<span class="tooltiptext">CARGAR archivos</span>
	        </div>
	        <div class="tdiv">
	         	<a id="btnVisor" name="btnVisor" class="boton" onclick="visorArchi()">
	         		<img src="icons/Screen.png" >
	         	</a>
	         	<span class="tooltiptext">VISOR archivos</span>
	        </div>	    		        
	    </div>

	    <!-- DIV cargue/visor de archivos ///////////////////////////////////////////////////////// -->
	    <div id="div-importar" class="bordes bordes-left" style="visibility:visible;">
	        <div class="tdiv">
	         	<a id="btnImportar" name="btnImportar" class="boton" onclick="importarCSV()">
	         		<img src="icons/Document2.png" >
	         	</a>
	         	<span class="tooltiptext">IMPORTAR archivos CSV</span>
	        </div>
	    </div>
			    
	    <!-- DIV verificar cache ////////////////////////////////////////////////////////////////// -->
	    <div id="div-limpiarCache" class="bordes bordes-left" style="visibility:visible;">
	        <div class="tdiv">
	         	<a id="btnLimpiarSubmit" name="btnLimpiarSubmit" class="boton" onclick="botonLimpiarSubmit()">
	         		<img src="icons/Document.png" >
	         	</a>
	         	<span class="tooltiptext">limpiar cache SUBMIT</span>
	        </div>
	    </div>

	    <!-- DIV releas de version //////////////////////////////////////////////////////////////// -->
	    <div class="trelease">
	        <span>N</span>
	    </div>
	</div>

	<!-- Definir elemento html de tabla standar - la clase datagrid - se agregar por prg ////////// -->	
	<div id="containerdg" class="container">
	</div>
	
	<!-- DIALOG configurable, los elemento label,input son adicionados dinamicamente ////////////// -->
	<div id="dlg" class="easyui-dialog" closed="true" buttons="#dlg-buttons" 
		 data-options="modal:true"
		 style="padding:2%">
		<!-- para valores de id, row, accion ////////////////////////////////////////////////////// -->
		<form id="frmencabeza">		 
		</form>
		<!-- para los inputs ////////////////////////////////////////////////////////////////////// -->
		<form id="frmdialog">
		</form>
	</div>
	<div id="dlg-buttons">	
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="registroDb()">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="closeDlg()">Cancelar</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-grid-cancel" id="btnLimpiar"
		   style="display:none;" onclick="limpiarDlg()">Limpiar</a>
	</div>

	<!-- DIALOG cargue de archivos desde cliente a servidor /////////////////////////////////////// -->
	<div id="dlgCargar" class="easyui-dialog" closed="true" buttons="#" style="padding:2%">
		<form name="importa" method="post" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data">
			<input type="file" name="file[]" id="file" multiple >
			<input type="submit" name="cargar" value="cargar"/>
			<input type="hidden" value="upload" name="action-upload"/>
		</form>
	</div>

	<!-- DIALOG cargue de archivos IMPORTACIONES ////////////////////////////////////////////////// -->
	<div id="dlgImportar" class="easyui-dialog" closed="true" buttons="#" style="padding:2%">
		<form name="importaCSV" method="post" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data">
			<!-- <input id="cmbempresas" name="cmbempresas" class="easyui-combobox"  -->
				   <!-- url="json/comboempresas.php" style="width:300px" -->
				   <!-- data-options="editable:false,valueField:'codigo',textField:'nombre'">			 -->
			<!-- <br><br> -->
			<input type="text" id="itabla" name="itabla">
			<br><br>
			<input id='sel_file' name='sel_file' type='file'  size='20'>
			<input type='submit' name='importar' value='importar'>
			<input type="hidden" value="import" name="action-import"/>				
			
		</form>
	</div>

	<!-- DIALOG formulario vacio para tratar de evitar el CACHE /////////////////////////////////// -->
	<div id="dlgVacio" class="easyui-dialog" closed="true" buttons="#" style="padding:2%">
		<form name="frmvacio" method="post" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data">			
			<input type='submit' id="submit" name='submit' value='submit'>	
		</form>
	</div>

	<!-- DIALOG visor de archivos desde cliente a servidor //////////////////////////////////////// -->
	<div id="dlgVisor" class="easyui-dialog" closed="true" buttons="#" 
		data-options="onBeforeClose:function(){visorCerrar()}">
		<div id="dlgVisor-container">
			<div id="div-visor">
				<div id="div-visor-archivo">
					<div id="visor-container">
						<!-- area para add la div dependiendo del tipo de archivo a visualizar //////// -->
					</div>				
				</div>
				<div id="div-visor-barra">
					<div class="bordes">
						<div class="tdiv">
							<input id="cmbcampos" name="cmbcampos" class="easyui-combobox" 
								   url="" style="width:145px"
								   data-options="valueField:'codigo',textField:'nombre'">
						</div>
					</div>
					<div class="bordes">	
				        <div class="tdivg">
				         	<a id="btnActual" name="btnActual" class="boton" onclick="mostrarActual()">
				         		<img src="icons/Refresh.png" >
				         	</a>
				         	<span class="tooltiptext">MOSTRAR archivo actual</span>
				        </div>
				    </div>
					<div id="bordes-visor-archivo" class="bordes">
						<div class="tdiv">
							<input id="visor-archivo" name="visor-archivo" class="easyui-textbox" style="width:200px"
								   data-options="disabled:true">
						</div>
					</div>
				    <div class="bordes">
				        <div class="tdivg">
				         	<a id="btnAsignarArchivo" name="btnAsignarArchivo" class="boton" onclick="asignarArchivo()">
				         		<img src="icons/ThumbUp.png" >
				         	</a>
				         	<span class="tooltiptext">ASIGNAR archivo a actual</span>
				        </div>				
					</div>
				    <div id="boton-ampliar" class="bordes" style="visibility:visible;margin-left:5%">
				        <div class="tdivg">
				         	<a id="btnAmpliarArchivo" name="btnAmpliarArchivo" class="boton" onclick="ampliarArchivo()">
				         		<img src="icons/ZoomIn.png" >
				         	</a>
				         	<span class="tooltiptext">AMPLIAR archivo actual</span>
				        </div>				
					</div>					
					<div class="bordes" style="visibility:hidden">
						<div class="tdiv">
							<input id="id-tabla" name="id-tabla" class="easyui-textbox" style="width:30px"
								   data-options="disabled:true">
							<input id="id-row" name="id-row" class="easyui-textbox" style="width:30px"
								   data-options="disabled:true">								   
						</div>
					</div>			
				</div>
			</div>
			<div id="div-archivos">
				<div id="containerdgarchivos" class="div-archivos-grid">
				</div>
 				<div id="div-archivos-barra">
					<div class="bordes">
						<div class="tdiv">
							<input id="cmbtipo" name="cmbtipo" class="easyui-combobox" 
								   url="json/cmbtipo.json" style="width:145px"
								   data-options="valueField:'codigo',textField:'nombre'">
						</div>
					</div>					
					<div class="bordes">
				        <div class="tdivg">
				         	<a id="btnMarcarTodos" name="btnMarcarTodos" class="boton" onclick="marcarTodos()">
				         		<img src="icons/Folder.png" >
				         	</a>
				         	<span class="tooltiptext">MARCAR TODOS los archivos</span>
				        </div>
				        <div class="tdivg">
				         	<a id="btnDesMarcarTodos" name="btnDesMarcarTodos" class="boton" onclick="desMarcarTodos()">
				         		<img src="icons/Folder3.png" >
				         	</a>
				         	<span class="tooltiptext">DESMARCAR TODOS los archivos</span>
				        </div>				
					</div>
					<div class="bordes">
				        <div class="tdivg">
				         	<a id="btnEliminarArchi" name="btnEliminarArchi" class="boton" onclick="eliminarArchivos()">
				         		<img src="icons/Trash.png" >
				         	</a>
				         	<span class="tooltiptext">ELIMINAR marcados</span>
				        </div>					
					</div>
				</div>
			</div>
		</div>	
	</div>

	<!-- aqui se complico la guevonada! para que inventaron la modal, que nos da mas ideas //////// -->
	<div id="visor-modal">
		<!-- zona fantasma MODAL ////////////////////////////////////////////////////////////////// -->
		<div style="display:none">
			<!-- variables para el visor-modal de imagenes ////////// -->
			<input id="wancho" name="wancho" class="easyui-textbox">
			<input id="walto" name="walto" class="easyui-textbox">
			<input id="mancho" name="mancho" class="easyui-textbox">
			<input id="malto" name="malto" class="easyui-textbox">
			<input id="mtop" name="mtop" class="easyui-textbox">
			<input id="mleft" name="mleft" class="easyui-textbox">
		</div>		
		<div id="visor-modal-titulo">
			<a href="javascript:void(0)" class="closebtn" onclick="closeModal()">&times;</a>	
		</div>

		<!-- botones de mas,expand,minus de imagen desde archivo ////////////////////////////////// -->
		<div id="btnplus" class="btnmodal" title="AUMENTAR imagen" onclick="accion('+',5)">
			<img src="images/plus.png">	
		</div>
		<div id="btnexpand" class="btnmodal" title="AJUSTAR imagen" onclick="accion('*',0)">
			<img src="images/ajustar-2.png">	
		</div>
		<div id="btnminus" class="btnmodal" title="REDUCIR imagen" onclick="accion('-',5)">
			<img src="images/minus.png">	
		</div>

		<!-- Editor de imagen desde archivo /////////////////////////////////////////////////////// -->
		<div id="visor-modal-img">
			<img id="visor-modal-img-archivo" src="">
		</div>
	</div>

	<!-- FUNCTION: onChange, onSelect de elementos //////////////////////////////////////////////// -->
	<!-- debe ir en esta instancia para entender el onSelect ////////////////////////////////////// -->
	<script type="text/javascript">
		$("#cmbtablas").combobox({
			onSelect: function(){
				var xtabla = $("#cmbtablas").combobox('getValue');
				var xcarpeta = $("#cmbtablas").combobox('getText');

				$("#dgtabla").textbox('setValue',xtabla);

				addDgContainer();

				// validar la carpeta para habilitar los botones de visor
				validarCarpeta(xcarpeta);

			}
		});
		$("#cmbtipo").combobox({
			onSelect: function(){
				addDgContainerArchivos();
			}
		});
	</script>

	<!-- FUNCTION: cargue de documento //////////////////////////////////////////////////////////// -->
	<script type="text/javascript">		
		$(document).keyup(function(e){			
			// pulsar [Esc] en pantalla modal de visor de archivos
			if(e.which==27){
				closeModal();
			}
		})
	</script>

	<!-- FUNCTION: generacion de dg dinamico ////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		// se adiciona funcion para ejecutar al mismo tiempo leerCampos() e iniciarComboVisor()
		function iniciarTablaComboVisor(){
			leerCampos();
			iniciarComboVisor();
		}


		function iniciarComboVisor(){
			var xdbase = getVar('dbname',0);
			var xtabla = $("#cmbtablas").combobox('getValue');
			
			var xurl = 'json/campos_get_data.php?dbase=' + xdbase + '&tabla=' + xtabla;

			$("#cmbcampos").combobox({
				url:xurl
			});

		}

	</script>

	<!-- SCRIPT para manejo de cargue de archivos ///////////////////////////////////////////////// -->
	<script type="text/javascript">
		function inicioVisor(){
			colorFondo('bordes-visor-archivo','#e6e6e6');

			// recarga, por defecto C-cargue
			$("#cmbtipo").combobox('reload');

			$("#cmbcampos").combobox('reload');

			// cargar lista de archivos desde /files x defecto
			// conservamos el nombre inicial de la funcion por aquello del copy y no cambie
			setTimeout(function(){ addDgContainerArchivos();},500);

		}

		function colorFondo(pdiv,pcolor){
			$("#"+pdiv).css('background-color',pcolor);
			setVar('archivo-color',0,pcolor);
		}

		function closeModal(){
			$("#visor-modal").animate({
				width: '0%',
				height: '0%',
				top: '50%',
				left: '33%'				
			},500);
			setTimeout(function(){ $("#visor-modal").css('visibility','hidden');},500);
		}

		// esta funcion, amigo lector, aumento o disminuye el valor pasado (80%)
		// aumenta o disminuye en 5% por ejempli
		function operacion(psigno,pvariable,pincremento){
			var wvar = getVar(pvariable,0);

			var lista = wvar.split("%");

			if(psigno=='+'){
				var xvalor = parseFloat(lista[0]) + pincremento;
			}else if(psigno=='-'){
				var xvalor = parseFloat(lista[0]) - pincremento;
			}
			
			return xvalor;

		}

		function accion(psigno,pvalorx){
			// a partir de ancho aumento el alto relacion 100% / 80%
			var pvalory = parseFloat(pvalorx) * 1.25

			var xancho = getVar('mancho',0);
			var xalto = getVar('malto',0);

			var yancho = xancho.split("%");
			var yalto = xalto.split("%");

			if(psigno=='+'){
				nancho = parseFloat(yancho[0]) + pvalorx;
				nalto = parseFloat(yalto[0]) + pvalory;
			}if(psigno=='-'){
				nancho = parseFloat(yancho[0]) - pvalorx;
				nalto = parseFloat(yalto[0]) - pvalory;
			}if(psigno=='*'){
				// traer valores de zona fantasma-modal
				// y calcular estado inicial wancho-5, walto-5 para mejorar el visor tal cual verImagen()				
				var iancho = getVar('wancho',0);
				var jancho = iancho.split("%");
				var nancho = parseFloat(jancho) - 5;

				var ialto = getVar('walto',0);
				var jalto = ialto.split("%");
				var nalto = parseFloat(jalto) - 5;

			}

			setVar('mancho',0,nancho+"%");
			setVar('malto',0,nalto+"%");			

			// ahora debemos calcular el top y el left a partir de nancho y nalto
			// validar ancho
			if(nancho<100){				
				var nleft = (100 - nancho) / 2;
			}else {
				var nleft = 0;
			}
			// validar alto
			if(nalto<100){
				var ntop = (100 - nalto) / 2;
			}else {
				var ntop = 0;
			}

			setVar('mtop',0,ntop+"%");
			setVar('mleft',0,nleft+"%");

			$("#visor-modal-img-archivo").css('width',nancho+"%");
			$("#visor-modal-img-archivo").css('height',nalto+"%");
			$("#visor-modal-img-archivo").css('top',ntop+"%");
			$("#visor-modal-img-archivo").css('left',nleft+"%");

		}

		function verImagen(){
			var row = $("#dgarchivos").datagrid('getSelected');

			// mostrar ventana modal
			$("#visor-modal").css('visibility','visible');
			$("#visor-modal").animate({
				width: '100%',
				height: '100%',
				top: '0%',
				left: '0%'
			},100);
			
			// ahora vamos a poner la imagen
			var xarchivo = getVar('visor-archivo',0);

			// validar color osease el origen: desde cargue(files,carpeta) o tabla()
			var xcolor = getVar('archivo-color',0);
			if(xcolor=='blue'){
				var xtipo = getVar('cmbtipo',3);
				if(xtipo=='C'){
					xpath = 'files/';
				}else if(xtipo=='A'){
					var xtabla = $("#cmbtablas").combobox('getText');
					xpath = '../web/'+xtabla+'/';
				}

			}else if(xcolor=='red'){
				// lo repito aca solo por comodidad
				var xtabla = $("#cmbtablas").combobox('getText');
				xpath = '../web/'+xtabla+'/';
			}
			
			$("#visor-modal-img-archivo").attr('src',xpath+xarchivo);			

			// adicionamos el ancho y alto de la imagen calculado anteriormente
			var xancho = getVar('wancho',0);
			var xalto = getVar('walto',0);

			// disminuir solo por mejorar visor
			var xancho = operacion('-','wancho',5);
			var xalto = operacion('-','walto',5);

			setVar('mancho',0,xancho+"%");
			setVar('malto',0,xalto+"%");

			// ahora debemos calcular el top y el left a partir de nancho y nalto
			var xtop = (100 - xalto) / 2;
			var xleft = (100 - xancho) / 2;

			setVar('mtop',0,xtop+"%");
			setVar('mleft',0,xleft+"%");

			$("#visor-modal-img-archivo").css('width',xancho+"%");
			$("#visor-modal-img-archivo").css('height',xalto+"%");
			$("#visor-modal-img-archivo").css('top',xtop+"%");
			$("#visor-modal-img-archivo").css('left',xleft+"%");

		}


		// validar si existe la carpeta relacionada con la tabla y pintar los botones de visor ////
		function validarCarpeta(pcarpeta){
			$.post('json/get_directorio.php',{nombre:pcarpeta},
				function(result){
					if(result.success){
						$("#visor-botones").css('visibility','visible');
					}else {
						$("#visor-botones").css('visibility','hidden');
					}
				},
			'json');
		}

		function ampliarArchivo(){
			var xarchivo = getVar('visor-archivo',0);

			// extraer la extension para ver el tipo de archivo
			var xfile = xarchivo.split('.');
			var xnombre = xfile[0];
			var xext = xfile[1];			

			if(xext=='jpg' || xext=='png' || xext=='gif'){
				verImagen();

			}else if(xext=='pdf'){
				var xcolor = getVar('archivo-color',0);
				if(xcolor=='blue'){
					var xtipo = getVar('cmbtipo',3);
					if(xtipo=='C'){
						xpath = 'files/';	
					}else if(xtipo=='A'){
						var xtabla = $("#cmbtablas").combobox('getText');
						var xpath = '../web/'+xtabla+'/';
					}
				}else if(xcolor=='red'){
					var xtabla = $("#cmbtablas").combobox('getText');
					var xpath = '../web/'+xtabla+'/';
				}
				var params  = 'width='+screen.width;
        		params += ', height='+screen.height;
        		params += ', top=0, left=0'
        		params += ', fullscreen=yes';				
				window.open (xpath+xarchivo, params);
			}
		}
	</script>
</body>
</html>