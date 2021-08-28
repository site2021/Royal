<?php
	session_start();
	$usuario=$_GET['usuario'];
	$estado=$_GET['estado'];

	
	if ( $_GET['action'] == 'cerrar_sesion'){
		if ( $_SESSION )
			session_destroy();
	}

	if ($usuario!=''){
		include 'app/control/conex.php';
		
		//Creamos la conexión
		//$conexion = mysqli_connect($server, $user, $pass, $bd)
		//or die("Ha sucedido un error inexperado en la conexion de la base de datos");

		//generamos la consulta
		$sql = "UPDATE tbusuarios SET estado=".$estado." WHERE usuario='".$usuario."'";
		$result = mysqli_query($conexion, $sql);

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="www/images/royal_ico.ico" type="image/x-icon" rel="shortcut icon" />
	<title>RE-principal</title>

	<link rel="stylesheet" type="text/css" href="app/jeasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="app/jeasyui/themes/icon.css">

	<!-- <script type="text/javascript" src="app/jeasyui/locale/easyui-lang-es.js"></script> -->
	<script type="text/javascript" src="app/jeasyui/jquery.min.js"></script>
	<script type="text/javascript" src="app/jeasyui/jquery.easyui.min.js"></script>

	<script type="text/javascript" src="www/js/accounting.js"></script>
	<script type="text/javascript" src="www/js/datagrid-filter.js"></script>

    <!-- windows MODAL -->
    <link rel="stylesheet" href="www/css/experiment.css" />    
    <link rel="stylesheet" href="www/css/boton.css" />    

    <!-- STYLE estilos generales ////////////////////////////////////////////////////////////////// -->
    

	<script type="text/javascript">
		window.history.forward();
		function noBack(){window.history.forward();}
	  		  
	</script>

	<style type="text/css">
		@font-face {
    		font-family: raleway;
    		src: url('www/fonts/raleway/Raleway-Thin.otf') format('opentype');
		}

		@font-face {
		    font-family: AlexBrush-Regular;
		    src: url('www/fonts/alex-brush/AlexBrush-Regular.ttf');
		}

		@font-face {
		    font-family: FredokaOne-Regular;
		    src: url("www/fonts/fredoka/FredokaOne-Regular.otf") format("opentype");
		}

		html, body	{
			height: 100%;
			overflow: hidden;
			background-image: url(www/images/royal001.jpg);
			background-repeat: no-repeat;			
			background-position-y: 11%; 
			background-position-x: 47%;
			font-family: helvetica;
		}

		.texto1, .texto3 {
			font-family: raleway;
			font-size: 25px;	
		}

		.texto2 {
			font-family: AlexBrush-Regular;
			font-size: 50px;
		}

		#linea1, #linea2 {			
			position: absolute;
			width: 57%;
			margin-left: 19%;
			text-align: center;
			color: #033003;
		}
		#linea1 {
			margin-top: 19%;
		}
		#linea2 {			
			margin-top: 22%;
		}
		/*OFICINA CERRADA TEMP0RAL*/
		#linea3, #linea4 {			
			position: absolute;
			width: 57%;
			margin-left: 19%;
			text-align: center;
			color: #033003;
		}
		#linea3 {
			margin-top: 26%;
		}
		#linea4 {			
			margin-top: 30.5%;
		}

		.texto4, .texto6 {
			font-family: raleway;
			font-size: 22px;	
		}

		.texto5 {
			font-family: AlexBrush-Regular;
			font-size: 50px;
		}

		#header {			
			position: absolute;
			width: 98%;
			height: 5%;			
			background: #088A08;
			display: flex;
			align-items: center;
			padding-left: 10px;			
			box-shadow: 1px 1px 2px #c0c0c0;
		}
		#footer {
			position: absolute;
			width: 15%;
			height: 5%;			
			top: 17%;
			right: 3%;
			background: #FFF;
			display: flex;
			align-items: center;
			padding-left: 10px;
		}
		#footer:hover {
			cursor: pointer;
			background: #9ff99f;
			border-radius: 5px;			
		}
		#footer a {
			text-decoration: none;
		}
		.footerText1 {
			font-family: helvetica;
			color: #088A08;
			text-decoration: none;
		}
		.footerText2 {			
			font-family: FredokaOne-Regular;
			font-size: 25px;
			color: #088A08;
			text-shadow: 2px 2px 2px #000;
		}
		.web {
			margin-right: 5px;
			font-family: FredokaOne-Regular;
			font-size: 25px;
			color: #FFF;
			text-shadow: 2px 2px 2px #000;
		}
		.headerText {
			margin-left: 5px;
			margin-right: 5px;
			color: #FFF;
			text-shadow: 1px 1px 1px #000;	
		}
		#headerLeft, #headerRight {
			display: flex;
			align-items: center;

		}
		#headerRight {
			margin-left: 79%;			
		}
		#headerRight a {
			display: flex;
			align-item: center;
			padding: 5px;
			text-decoration: none;
		}
		#headerRight:hover {
			border-radius: 5px;
			background: #9ff99f;
			cursor: pointer;			
		}
		#marker {
			position: absolute;
			top: 15%;
			left: 5%;
			font-family: raleway;
		}
		#marker:hover {
			cursor: pointer;
			background: #9ff99f;
			border-radius: 5px;
		}
		#marker img {
			filter: drop-shadow(1px 1px 1px #000);
		}
		#marker a {
			color: #088A08;
			text-decoration: none;
		}

		#pagos img {
			position: absolute;
			right: 5%;
			bottom: 0;
			width: 25%;
			z-index: 100;
		}
		#botonPos {
			position: absolute;
			top: 65%;
			left: 40%;
		}
	</style>

	<!-- STYLE menu lateral de opciones /////////////////////////////////////////////////////////// -->
	<style type="text/css">
		.menu-side {
			position: absolute;
			width: 8%;
			height: 60%;
			top: 20%;
			left: 5%;
		}
		.menu-opcion {
			position: absolute;
			display: flex;
			align-items: center;
			justify-content: center;
			width: 100%;
			height: 20%;
			border-radius: 15px;
			background: linear-gradient(#f2f2f2, #ccc);
			border: 1px solid #808080;
			text-align: center;
		}
		.menu-opcion:hover {
			background: #b7fbb7;
		}
		.menu-opcion span {			
			display: inline-block;
			width: 100%;
		}
		.menu-opcion img {
			filter: drop-shadow(2px 2px 1px #000);
		}
	</style>

	<!-- STYLE division de acceso ///////////////////////////////////////////////////////////////// -->
	<style type="text/css">
		#dlgacceso, #dlginformes, #dlgasistencia, #dlgSesion {
			overflow: hidden;
		}
		.fitem {
			width: 100%;		
			font-size: 18px;
			margin-bottom: 5%;
			text-align: center;
		}
		.fitem label {
			display: inline-block;
			text-align: right;
			width: 20%;	
		}
		.fitem input {
			width: 10%;
		}

		.finfo {
			display: flex;
			align-items: center;
			width: 100%;
			height: 25px;
			margin-top: 1%;
			margin-bottom: 1%;
		}

		.finfo input {
			width: 10%;	
		}

		.finfo label {
			width: 10%;
			display: inline-block;			
			text-align: right;
			padding-right: 1%;
		}

	</style>

</head>
<body>
	<section id="marker">		
	</section>

	<section id="header">
		<article id="headerLeft">
			<span class="web">Web</span>
			<span class="headerText">principal</span>			
		</article>
	</section>

	<section id="content">
		<article id="linea1">
			<span class="texto1">su</span><span class="texto2"> mejor </span><span class="texto1">alternativa para el transporte</span>
		</article>
		<article id="linea2">
			<span class="texto3">escolar, turístico y empresarial</span>
		</article>	
	</section>

	<section id="content">
		<article id="linea3">
			<span class="texto4">Temporalmente estamos ubicados en la <b>calle 16 #14-02 Edif 14 Bis Ofi 1A, Pereira.</b> Para comunicarte con nosotros marca a los números:</span>
		</article>
		<article id="linea4">
			<span class="texto6"><b>Natalia Cárdenas</b><br><b>3209268252</b><br> <b>diradministrativa@cooproyalexpress.com</b><br><br><b>Leidy Hurtado</b><br><b>3175007080</b><br><b>escolar@cooproyalexpress.com</b><br></span>
		</article>	
	</section>

	<section id="footer">
	</section>

    <!-- ventana MODAL -->
    <aside id="example" class="modal">
        <div>
            <h2>PBX: 333 5401</h2>
            <label>Celular: 310-4224588</label><br>
            <label>e-mail: gerente.royalexpres@gmail.com</label><br>
            <label>Cra 24 11-90 Los Alamos. Pereira (Ris)</label>
            <br><br>
            <label style="font-size: 36px; text-shadow: 1px 1px 1px rgba(0,0,0,.8);">
                SERVIMOS
            </label>
            <label style="font-size: 36px; text-shadow: 1px 1px 1px rgba(0,0,0,.8);">
                CON CALIDAD
            </label>
            <label style="font-size: 36px; text-shadow: 1px 1px 1px rgba(0,0,0,.8);">
                Y CUMPLIMIENTO
            </label>
            <a href="#close" title="Cerrar">Cerrar</a>
        </div>
    </aside>

    <aside id="pagos">	
    	<img src="www/images/woman.png">
    </aside>

    <!-- <div id="botonPos">
    	<a href="https://www.psepagos.co/PSEHostingUI/ShowTicketOffice.aspx?ID=5848" style="text-decoration:none">
    		<div class="button"><div class="outer"><div class="height"><div class="inner">PAGOS</div></div></div></div>
    	</a>
    </div> -->

    <!-- DIV menu lateral para opciones generales ///////////////////////////////////////////////// -->
    <div class="menu-side">    	
    	<div class="menu-opcion" style="top: -10%" onclick="accesoSesion()">
			<a href="#sesion">
				<img src="www/images/entrar.png">
				<span class="footerText1">INICIAR</span>
				<span class="footerText1">Sesión</span>
			</a>
    	</div>

    	<!-- visite nuestro blog ////////////////////////////////////////////////////////////////// -->
    	<div class="menu-opcion" style="top: 15%">
			<a href="app/secciones/escolar/listageneral-form.php" target="_blank">
				<span class="footerText1">CONTRATO</span>
				<span class="footerText2">escolar</span>
			</a>
    		
    	</div>

    	<!-- nueva direccion ////////////////////////////////////////////////////////////////////// -->
    	<div class="menu-opcion" style="top:40%">
			<a href="#example">
				<img src="www/images/marker-32.png">
				<span class="footerText1">NUEVA</span>
				<span class="footerText1">Dirección</span>
			</a>    		
    	</div>

    	<!-- asociados //////////////////////////////////////////////////////////////////////////// -->
    	<div class="menu-opcion" style="top:65%" onclick="acceso()">
			<a href="#asociados">
				<img src="www/images/group-32.png">
				<span class="footerText1">INFORMES</span>
				<span class="footerText1">Asociados</span>
			</a>    		
    	</div>

    	<!-- colegios //////////////////////////////////////////////////////////////////////////// -->
    	<div class="menu-opcion" style="top:90%" onclick="accesoCol()">
			<a href="#colegios">
				<img src="www/images/library-32.png">
				<span class="footerText1">PLANILLAS</span>
				<span class="footerText1">Colegios</span>
			</a>    		
    	</div>

    	<!-- <div class="menu-opcion" style="top: 120%; height: 40px">
			<a href="cocina/index.html" target="_blank">
				<span class="footerText1">Mom´s Kitchen</span>
			</a>
    		
    	</div> -->

    	<div class="menu-opcion" style="top: 120%; height: 40px" onclick="covid19()">
			<a href="#covid19">
				<span class="footerText1">Covid-19</span>
			</a>
    		
    	</div>
    </div>

    <!-- DIALOG iniciar sesion //////////////////////////////////////////////////////////////////// -->
    <body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
		<div id="dlgSesion" class="easyui-dialog" closed="true" buttons="#dlg-buttons" title="ACCESO"
			style="width:20%;height:37%;padding:8%"
			data-options="modal:true">
			
			<!-- <div class="fitem">			
				<input id="usuario" name="usuario" class="easyui-textbox" value=""
					data-options="prompt:'digitar USUARIO',iconCls:'icon-man'" >			
			</div>
			<div class="fitem">
				<input id="clave" name="clave" class="easyui-textbox" type="password" value="" 
					data-options="prompt:'digitar CLAVE',iconCls:'icon-lock'">			
			</div> -->
			<div class="fitem">			
				<input id="usuariose" name="usuariose" class="easyui-textbox" value=""
					data-options="prompt:'digitar USUARIO',iconCls:'icon-man'" >			
			</div>
			
			<div class="fitem">
				<input id="clavese" name="clavese" class="easyui-textbox" type="password" value="" 
					data-options="prompt:'digitar CLAVE',iconCls:'icon-lock'">			
			</div>

			<div style="text-size:10px; text-align:center;margin-top:35px">
				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" style="width:100px; height:30px" 
					onclick="cargarPrincipal()"><span style="font-size:12px">Entrar</span></a>
					
				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" style="width:100px; height:30px" 
					onclick="clearForm()"><span style="font-size:12px">Limpiar</span></a>

			</div>
			<br>

			<div id="variables" style="display:none">					
				<input id="xnombre" class="textbox" style="width:90%;height:20px" name="xnombre">
				<input id="xestado" class="textbox" style="width:90%;height:20px" name="xestado">
				<input id="xvalor" class="textbox" style="width:90%;height:20px" name="xvalor">
				<input id="xperfil" class="textbox" style="width:90%;height:20px" name="xperfil">						
			</div>
		</div>
	</body>

    <!-- DIALOG division de acceso colegios /////////////////////////////////////////////////////// -->
	<div id="dlgaccesoCol" class="easyui-dialog" closed="true" buttons="#dlg-buttons-col" title="ACCESO"
		style="width:15%;height:30%;padding:5%"
		data-options="modal:true">
		<div class="fitem">
			<input id="xcolegio" name="xcolegio" class="easyui-combobox" 
				   url="www/json/combocolegios.php" style="width:150px"
				   data-options="editable:false,valueField:'codigo',textField:'nombre'">
		</div>
		<div class="fitem">
			<input id="col-clave" name="col-clave" class="easyui-textbox" type="password" value=""
				style="width:150px"
				data-options="prompt:'digitar CLAVE',iconCls:'icon-lock'">			
		</div>
		<div class="fitem" style="margin-top:5%">
			<select id="opcionCol" name="opcionCol" class="easyui-combobox" style="width:100%">
			    <option value=1 selected>Planillas</option>
			    <option value=2 >Asistencias</option>
			</select>			
		</div>		
		<div class="fitem" style="margin-top:5%">
		</div>
	</div>
	<div id="dlg-buttons-col" style="text-align:center">
		<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" style="width:100px; height:30px" onclick="validarClaveCol()"><span style="font-size:12px">Ok</span></a>
	</div>

	
    <!-- DIALOG division de acceso //////////////////////////////////////////////////////////////// -->
	<div id="dlgacceso" class="easyui-dialog" closed="true" buttons="#dlg-buttons" title="ACCESO"
		style="width:15%;height:30%;padding:5%"
		data-options="modal:true">
		<div class="fitem">			
			<input id="usuario" name="usuario" class="easyui-textbox" value=""
				data-options="prompt:'digitar USUARIO',iconCls:'icon-man'" >			
		</div>
		<div class="fitem">
			<input id="clave" name="clave" class="easyui-textbox" type="password" value="" 
				data-options="prompt:'digitar CLAVE',iconCls:'icon-lock'">			
		</div>
		<div class="fitem" style="margin-top:5%">
			<select id="opcion" name="opcion" class="easyui-combobox" style="width:100%">
			    <option value=1 selected>Planillas Liquidadas</option>
			    <option value=2 >Consultar Morosos</option>
			</select>			
		</div>
	</div>
	<div id="dlg-buttons" style="text-align:center">
		<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" style="width:100px; height:30px" 
					onclick="validarClave()"><span style="font-size:12px">Ok</span></a>
	</div>

	<!-- DIALOG planilla liquidadas /////////////////////////////////////////////////////////////// -->
	<div id="dlgplanillas" class="easyui-dialog" closed="true" buttons="#" title="PLANILLAS"
		style="width:60%;height:65%;padding:1%"
		data-options="modal:true">
		<div class="">
			<!-- LINEA 1 de informes - colegio, meses, boton ////////////////////////////////////// -->
			<div class="finfo">
				<!-- combo COLEGIOS /////////////////////////////////////////////////////////////// -->
	 			<label>COLEGIO:</label>
				<input id="pcolegio" name="pcolegio" class="easyui-combobox" 
					   url="www/json/combocolegios.php" style="width:150px"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">

				<!-- combo RUTAS ////////////////////////////////////////////////////////////////// -->
	 			<label>INTERNO:</label>
				<input id="pinterno" name="pinterno" class="easyui-textbox" style="width:70px"
					   data-options="disabled:true">

				<!-- combo MESES /////////////////////////////////////////////////////////////////// -->
	 			<label>MES:</label>
				<input id="pmes" name="pmes" class="easyui-combobox" 
					   url="www/json/combomeses.php"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">

				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-page_copy'" 
					style="margin-left:2%;width:30px; height:30px" onclick="mostrarPlanillas()">
				</a>
			</div>

			<!-- DATAGRID lista de planillas ////////////////////////////////////////////////////// -->
			<table id="dgplanillas" class="easyui-datagrid" title=""
				style="width:100%;height:200px"
				url="www/json/planillas_getdata.php" singleSelect="true" pagination="false" showFooter="false"
				fitColumns="true">
				<thead>
					<tr>
						<th field="id", width="50" hidden="true">Id</th>
						<th field="colegio", width="80" >Colegio</th>
						<th field="ruta", width="50" >Ruta</th>
						<th field="interno", width="50" >interno</th>						
						<th field="mes", width="80" >mes</th>						
						<th field="archivo", width="100" >archivo</th>
					</tr>
				</thead>
			</table>
			<div style="margin-top:5%;text-align:center">
				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-pdf'" 
					style="margin-left:2%;width:150px; height:30px" onclick="verPlanilla()">
					ver PLANILLA
				</a>				
			</div>
		</div>
	</div>

	<!-- DIALOG informe morosos /////////////////////////////////////////////////////////////////// -->
	<div id="dlginformes" class="easyui-dialog" closed="true" buttons="#" title="INFORMES-MOROSOS"
		style="width:65%;height:60%;padding:1%"
		data-options="modal:true">
		<div class="">
			<!-- LINEA 1 de informes - colegio, meses, boton ////////////////////////////////////// -->
			<div class="finfo">				
					<!-- combo COLEGIOS /////////////////////////////////////////////////////////////// -->
		 			<label>COLEGIO:</label>
					<input id="mcolegio" name="colegio" class="easyui-combobox" 
						   url="www/json/combocolegios.php" style="width:150px"
						   data-options="editable:false,valueField:'codigo',textField:'nombre'">

					<!-- combo RUTAS ////////////////////////////////////////////////////////////////// -->
		 			<label>INTERNO:</label>
					<input id="minterno" name="minterno" class="easyui-textbox"	style="width:70px"				   
						   data-options="disabled:true">				
		 			<label>RUTA:</label>
					<input id="mruta" name="mruta" class="easyui-textbox" style="width:70px"
						   data-options="disabled:true">

					<!-- combo MESES /////////////////////////////////////////////////////////////////// -->
		 			<label>MES:</label>
					<input id="mmes" name="mes" class="easyui-combobox" 
						   url="www/json/combomeses.php"
						   data-options="editable:false,valueField:'codigo',textField:'nombre'">

					<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-page_copy'" 
						style="margin-left:2%;width:30px; height:30px" onclick="verMorosos()">
					</a>				
			</div>

			<!-- DATAGRID informe de morosos ////////////////////////////////////////////////////// -->
			<table id="dglmorosos" class="easyui-datagrid" title=""
				style="width:100%;height:250px"
				url="www/json/morosos_getdata.php" rownumbers="true"
				singleSelect="true" pagination="false" showFooter="false"
				fitColumns="true">
				<thead>
					<tr>
						<th field="codigo", width="50" >Codigo</th>
						<th field="nombre", width="200" >Nombre</th>
						<th field="recorrido", width="150" >Recorrido</th>
						<th field="grado", width="50" >Grado</th>
						<th field="diferencia", width="100" sortable="true" align="right"
							data-options="
								formatter: function(value,row){
								return accounting.formatNumber(value,0);
								}">Pendiente
						</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

	<!-- DIALOG asistencia //////////////////////////////////////////////////////////////////////// -->
	<div id="dlgasistencia" class="easyui-dialog" closed="true" buttons="#" title="INFORMES-ASISTENCIA"
		style="width:65%;height:75%;padding:1%"
		data-options="modal:true">
		<div class="">
			<!-- LINEA 1 ////////////////////////////////////////////////////////////////////////// -->
			<div class="finfo">
				<!-- combo COLEGIOS /////////////////////////////////////////////////////////////// -->
	 			<label style="width:8%">COLEGIO:</label>
				<input id="asiscolegio" name="asiscolegio" class="easyui-combobox" 
					   url="www/json/combocolegios.php" style="width:200px"
					   data-options="disabled:true,editable:false,valueField:'codigo',textField:'nombre'">
	 			<label style="width:8%">RUTAS:</label>
				<input id="asisruta" name="asisruta" class="easyui-combobox" 
					   url="" style="width:50px"
					   data-options="valueField:'codigo',textField:'nombre'">
				<input id="asisinterno" name="asisinterno" class="easyui-textbox" style="width:50px"
					   data-options="disabled:true">
				<label style="width:8%">FECHA:</label>
				<input id="asisfecha" name="asisfecha" class="easyui-datebox"
					data-options="formatter:myformatter,parser:myparser,width:100">
				<label style="width:8%">JORNADA:</label>
				<input id="asisjornada" name="asisjornada" class="easyui-combobox" 
					   url="www/json/combojornadas.php" style="width:60px"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">

				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-page_copy'" 
					style="margin-left:2%;width:30px; height:30px" onclick="verAsistencia()">
				</a>				

			</div>

			<!-- DATAGRID asistencia ////////////////////////////////////////////////////////////// -->
			<table id="dgasistencia" class="easyui-datagrid" title=""
				style="width:100%;height:350px"
				url="www/json/asistencia_colegio_todos.php" rownumbers="true"
				singleSelect="true" pagination="false" showFooter="false"
				fitColumns="true">
				<thead>
					<tr>						
						<th field="id", width="50" hidden="true">Id</th>
						<th field="iruta", width="50" hidden="true">Iruta</th>
						<th field="iruta2da", width="50" hidden="true">Iruta2da</th>
						<th field="imrutaam", width="50" hidden="true">Imrutaam</th>
						<th field="imrutapm", width="50" hidden="true">Imrutapm</th>
						<th field="codigo", width="50" >Codigo</th>
						<th field="nombre", width="300" >Nombre</th>
						<th field="asistencia", width="50" align="center">Asistencia</th>						
						<th field="observa", width="300" align="left">Observa</th>					
					</tr>
				</thead>
			</table>
			<div style="margin-top:1%;margin-left:3%">
				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" 
					style="width:30px; height:30px" onclick="addObserva()">
				</a>				
				<input id="obstexto" name="obstexto" class="easyui-textbox" style="width:450px"
					   data-options="disabled:false">
				<a id="btnSave" name="btnSave" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'" 
					style="width:30px; height:30px" onclick="saveObserva()">
				</a>
				<a id="btnCancel" name="btnCancel" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" 
					style="width:30px; height:30px" onclick="cancelObserva()">
				</a>
				<a id="btnEliminar" name="btnEliminar" href="#" class="easyui-linkbutton" 
					data-options="iconCls:'icon-grid-cancel'"
					style="width:30px; height:30px; margin-left: 90px;" onclick="eliminarObserva()">
				</a>									   
			</div>

		</div>
	</div>

	<!-- DIALOG planillas colegios //////////////////////////////////////////////////////////////// -->
	<div id="dlgplanillascolegios" class="easyui-dialog" closed="true" buttons="#" title="PLANILLAS-COLEGIOS"
		style="width:65%;height:60%;padding:1%"
		data-options="modal:true">
		<div class="">
			<!-- LINEA 1 de planillas - colegio /////////////////////////////////////////////////// -->
			<div class="finfo">				
				<!-- combo COLEGIOS /////////////////////////////////////////////////////////////// -->
	 			<label>COLEGIO:</label>
				<input id="ccolegio" name="ccolegio" class="easyui-combobox" 
					   url="www/json/combocolegios.php" style="width:150px"
					   data-options="disabled:true,valueField:'codigo',textField:'nombre'">

				<select id="cplanilla" name="cplanilla" class="easyui-combobox" style="width:250px">
				    <option value=1 selected>Planillas CHEQ - PDF</option>
				    <option value=2 >Planillas CHEQ-SIN - PDF</option>
				</select>
				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-page'" 
					style="margin-left:2%;width:30px; height:30px" onclick="verPlanillaCol('S')">
				</a>
				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-page_copy'" 
					style="margin-left:2%;width:30px; height:30px" onclick="verPlanillaCol('T')">
				</a>
			</div>

			<!-- DATAGRID datos vehiculos ///////////////////////////////////////////////////////// -->
			<table id="dgdatosveh" class="easyui-datagrid" title=""
				style="width:100%;height:250px"
				url="www/json/datosveh_getdata.php" rownumbers="true"
				singleSelect="true" pagination="false" showFooter="false"
				fitColumns="true">
				<thead>
					<tr>
						<th field="ruta", width="50" >Ruta</th>
						<th field="interno", width="80" >Interno</th>
						<th field="placa", width="80" >Placa</th>
						<th field="nombreconductor", width="250" >Conductor</th>
						<th field="celular", width="150" >Celular</th>
						<th field="sector", width="250" >Sector</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

	<!-- DIALOG planillas asistencias ///////////////////////////////////////////////////////////// -->
	<div id="dlgasistencias" class="easyui-dialog" closed="true" buttons="#" title="ASISTENCIAS"
		style="width:65%;height:60%;padding:1%"
		data-options="modal:true">
		<div class="">
			<!-- LINEA 1 de planillas - colegio /////////////////////////////////////////////////// -->
			<div class="finfo">				
				<!-- combo COLEGIOS /////////////////////////////////////////////////////////////// -->
	 			<label>COLEGIO:</label>
				<input id="acolegio" name="ccolegio" class="easyui-combobox" 
					   url="www/json/combocolegios.php" style="width:150px"
					   data-options="disabled:true,valueField:'codigo',textField:'nombre'">
			</div>

			<!-- DATAGRID datos vehiculos ///////////////////////////////////////////////////////// -->
			<table id="dgdatosveh" class="easyui-datagrid" title=""
				style="width:100%;height:250px"
				url="www/json/datosveh_getdata.php" rownumbers="true"
				singleSelect="true" pagination="false" showFooter="false"
				fitColumns="true">
				<thead>
					<tr>
						<th field="ruta", width="50" >Ruta</th>
						<th field="interno", width="80" >Interno</th>
						<th field="placa", width="80" >Placa</th>
						<th field="nombreconductor", width="250" >Conductor</th>
						<th field="celular", width="150" >Celular</th>
						<th field="sector", width="250" >Sector</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

	<!-- DIALOG COVID 19 //////////////////////////////////////////////////////////////////// -->
	<div id="dlgcovid" class="easyui-dialog" closed="true" buttons="#dlg-buttons-col" title="ACCESO"
		style="width:30%;height:70%;padding:5%"
		data-options="modal:true">

		<div class="fitem">
			<label>Codigo</label>
			<input id="cedula" name="cedula" class="easyui-textbox" style="width:150px">
		</div>
		<div id="dlg-buttons-col" style="text-align:center">
			<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" style="width:100px; height:30px" onclick="traerCedula()"><span style="font-size:12px">Buscar</span></a>
		</div><br>
		<div class="fitem">
			<label>Fecha</label>
			<input id="fechacovid" name="fechacovid" class="easyui-datebox"
			data-options="formatter:myformatter,parser:myparser,width:150">
		</div>
		<div class="fitem">
			<label>Nombre</label>
			<input id="nombre" name="nombre" class="easyui-textbox" style="width:150px">
		</div>
		<div class="fitem">
			<label>Entidad</label>
			<select id="entidad" name="entidad" class="easyui-combobox" style="width:150px">
			    <option value="LICEO INGLES">LICEO INGLES</option>
			    <option value="CALL CENTER">CALL CENTER</option>
			    <option value="COATS CADENA">COATS CADENA</option>
			    <option value="CARTAMA">CARTAMA</option>
			</select>	
		</div>
		<div class="fitem">
			<label>Ruta</label>
			<input id="ruta" name="ruta" class="easyui-textbox" style="width:150px">
		</div>
		<div class="fitem">
			<label>Interno</label>
			<input id="interno" name="interno" class="easyui-textbox" style="width:150px">
		</div>
		<div class="fitem">
			<label>Jornada</label>
			<input id="jornada" name="jornada" class="easyui-textbox" style="width:150px">
		</div>	
		<div class="fitem">
			<label>Temp</label>
			<input id="temperatura" name="temperatura" class="easyui-textbox" style="width:150px">
		</div>
		<br>	
		<p>TOS Y/O EXPECTORACIÓN</p>
		<div class="fitem">
			<select id="tos" name="tos" class="easyui-combobox" style="width:150px">
			    <option value="SI">SI</option>
			    <option value="NO" selected>NO</option>
			</select>	
		</div>
		<p>MALESTAR GENERAL, DOLOR MUSCULAR O FATIGA</p>
		<div class="fitem">
			<select id="malestar" name="malestar" class="easyui-combobox" style="width:150px">
			    <option value="SI">SI</option>
			    <option value="NO" selected>NO</option>
			</select>	
		</div>
		<p>DIFICULTAD PARA RESPIRAR</p>
		<div class="fitem">
			<select id="difrespirar" name="difrespirar" class="easyui-combobox" style="width:150px">
			    <option value="SI">SI</option>
			    <option value="NO" selected>NO</option>
			</select>	
		</div>
		<p>DIARREA</p>
		<div class="fitem">
			<select id="diarrea" name="diarrea" class="easyui-combobox" style="width:150px">
			    <option value="SI">SI</option>
			    <option value="NO" selected>NO</option>
			</select>	
		</div>
		<p>DISMINUCIÓN DEL GUSTO U OLFATO</p>
		<div class="fitem">
			<select id="olfatogusto" name="olfatogusto" class="easyui-combobox" style="width:150px">
			    <option value="SI">SI</option>
			    <option value="NO" selected>NO</option>
			</select>	
		</div>
		<p>¿HA ESTADO FUERA DEL PAÍS O HA ESTADO CON PERSONAS PROCEDENTES DEL EXTRANJERO EN LOS ÚLTIMOS 14 DÍAS?</p>
		<div class="fitem">
			<select id="fuerapais" name="fuerapais" class="easyui-combobox" style="width:150px">
			    <option value="SI">SI</option>
			    <option value="NO" selected>NO</option>
			</select>	
		</div>
		<p>¿HA ESTADO EN CONTACTO CON UNA PERSONA POSITIVA O SOSPECHOSA PARA COVID-19 SIN MEDIDAS DE PROTECCIÓN ADECUADAS EN LOS ÚLTIMOS 14 DÍAS?</p>
		<div class="fitem">
			<select id="contactosospechoso" name="contactosospechoso" class="easyui-combobox" style="width:150px">
			    <option value="SI">SI</option>
			    <option value="NO" selected>NO</option>
			</select>	
		</div>
		<p>¿SE ENCUENTRA EN PERIODO DE CUARENTENA POR COVID-19?</p>
		<div class="fitem">
			<select id="cuarentena" name="cuarentena" class="easyui-combobox" style="width:150px">
			    <option value="SI">SI</option>
			    <option value="NO" selected>NO</option>
			</select>	
		</div>
		<p>¿ALGUNA PERSONA CON LA QUE VIVE SE ENCUENTRA EN CUARENTENA POR COVID-19?</p>
		<div class="fitem">
			<select id="personacuarentena" name="personacuarentena" class="easyui-combobox" style="width:150px">
			    <option value="SI">SI</option>
			    <option value="NO" selected>NO</option>
			</select>	
		</div>
		<p>COMPROMISO Declaro en el presente formulario, que la información diligenciada es veraz, así mismo manifiesto que entiendo que el propósito de diligenciar este formulario es cuidar de mi salud y la de los demás. Por lo cual, me comprometo a diligenciar esta encuesta antes de iniciar iniciar recorrido en el transporte. </p>
		<div class="fitem">
			<select id="compromiso" name="compromiso" class="easyui-combobox" style="width:150px">
			    <option value="ACEPTO" selected>ACEPTO</option>
			    <option value="NO ACEPTO">NO ACEPTO</option>
			</select>	
		</div>
	</div>
	<div id="dlg-buttons-col" style="text-align:center">
		<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" style="width:100px; height:30px" onclick="traerCedula()"><span style="font-size:12px">Ok</span></a>
	</div>

    <!--SCRIPT funciones generales de acceso, base de datos /////////////////////////////////////// -->
    <script type="text/javascript">
    	$(document).ready(function(){
    		botones(0);
    	});

    </script>

    <script type="text/javascript">
    	function acceso(){
    		setVar('usuario',0,'');
    		setVar('clave',0,'');
    		mostrarWin('dlgacceso');
    	}

    	function accesoCol(){
    		setVar('xcolegio',0,'');
    		setVar('col-clave',0,'');
    		mostrarWin('dlgaccesoCol');
    	}

    	function mostrarWin(pantalla){
    		$("#"+pantalla).dialog('hcenter');
    		$("#"+pantalla).dialog('vcenter');
    		$("#"+pantalla).dialog('open');
    	}

    	function cerrarWin(pantalla){
    		$("#"+pantalla).dialog('close');	
    	}    	

    	function validarClave(){
    		var xusuario = getVar('usuario',0);
    		var xclave = getVar('clave',0);    		

    		if(xclave=='royal'+xusuario){
    			var xopcion = getVar('opcion',0);

    			setVar('pinterno',0,xusuario);
    			setVar('minterno',0,xusuario);
    			setVar('ainterno',0,xusuario);

    			cerrarWin('dlgacceso');

    			if(xopcion==1){
    				mostrarWin('dlgplanillas');	

    			}else if(xopcion==2){
    				mostrarWin('dlginformes');
    				borrarMorosos();
    				borrarMorososVar();

    			}else if(xopcion==3){
    			}

    		}else {
    			$.messager.alert("Mensaje","usuario/clave NO EXISTE!!!");
    		}

    	}

    	function validarClaveCol(){
    		var xusuario = getVar('xcolegio',0);
    		var ncolegio = $("#xcolegio").combobox('getText');
    		var xclave = getVar('col-clave',0);

    		if(claveOkCol(ncolegio,xclave)){
    			var xopcioncol = getVar('opcionCol',0);

    			cerrarWin('dlgaccesoCol');

				if(xopcioncol==1){				// planillas
	    			var wcolegio = $("#xcolegio").combobox('getText');

	    			setVar('ccolegio',3,xusuario);
	    			mostrarWin('dlgplanillascolegios');
	    			mostrarDatosVeh(wcolegio);

	    		}else if(xopcioncol==2){		// asistencias
	    			setVar('asiscolegio',3,xusuario);

	    			// llenar combo rutas x colegio
	    			traerRutas(ncolegio);

    				mostrarAsistencia();
    				mostrarWin('dlgasistencia');

	    		}

    		}else {
    			$.messager.alert("Mensaje","usuario/clave NO EXISTE!!!");
    		}

    	}

    	function claveOk(pusuario,pclave){
    		var xresultado = 0;
    		if(pusuario==1){ if(pclave=='s12345'){ xresultado = 1; } }
    		if(pusuario==2){ if(pclave=='c12345'){ xresultado = 1; } }
    		if(pusuario==3){ if(pclave=='b12345'){ xresultado = 1; } }
    		return xresultado;
    	}

    	function claveOkCol(pusuario,pclave){
    		var xuser = pusuario.substr(0,2).toUpperCase();
    		var xvalidar = xuser+'12345';

    		if(pclave.toUpperCase()==xvalidar){
    			return 1;
    		}else {
    			return 0;
    		}
    	}

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

    <script type="text/javascript">
    	function mostrarPlanillas(){
    		var xcolegio = $("#pcolegio").combobox("getText");
    		var xinterno = getVar('pinterno',0);
    		var xmes = $("#pmes").combobox("getText");

    		$("#dgplanillas").datagrid('load',{
    			colegio:xcolegio,
    			interno:xinterno,
    			mes:xmes
    		});    		

    	}

    	function verPlanilla(){
    		var row = $("#dgplanillas").datagrid('getSelected');

    		if(row){
    			var xarchivo = 'app/secciones/escolar/planillas/' + row['archivo'];

				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

	    		window.open (xarchivo, params);

    		}else {
    			$.messager.alert("Mensaje","no hay SELECCION!!!");

    		}    		

    	}
    </script>

    <!-- script para validar ruta/interno para morosos //////////////////////////////////////////// -->
    <script type="text/javascript">
    	$("#dgasistencia").datagrid({
    		onDblClickRow: function(){
    			ponerAsistencia();
    		}
    	});

    	$("#acolegio").combobox({
    		onSelect: function(){
    			traerRutaAsistencia();
    			mostrarAsistencia();
    			listarCodigos();
    		}
    	});

    	$("#acodigos").combobox({
    		onSelect: function(){
    			var xnombre = $("#acodigos").combobox('getValue');
    			$("#anombre").textbox('setValue',xnombre);
    		}
    	})

    	$("#mcolegio").combobox({
    		onSelect: function(){
    			traerRuta();
    			borrarMorosos();
    		}
    	});

    	$("#mmes").combobox({
    		onSelect: function(){
    			borrarMorosos();
    		}
    	});

    	// onselect de combo rutas/asistencia
    	$("#asisruta").combobox({
    		onSelect: function(){
    			traerInterno();
    		}
    	})
    </script>
    <script type="text/javascript">
    	function traerRuta(){
    		var xcolegio = $("#mcolegio").combobox('getText');
    		var xinterno = getVar('minterno',0);

    		//alert("buscar interno="+xinterno);
    		setVar('mruta',0,'');

			var url="www/json/datosruta_getdata.php?colegio="+xcolegio+"&interno="+xinterno;

			$.getJSON(url,function(registros){
					if (registros.length == 0){
						$.messager.alert("No existen datos de RUTA");
					}		
					else {
						$.each(registros, function(i,registro){

							setVar('mruta', 0, registro.ruta);

						});
					}
			});

    	}

    	function traerRutaAsistencia(){
    		var xcolegio = $("#acolegio").combobox('getText');
    		var xinterno = getVar('ainterno',0);

    		//alert("buscar interno="+xinterno);
    		setVar('aruta',0,'');

			var url="www/json/datosruta_getdata.php?colegio="+xcolegio+"&interno="+xinterno;

			$.getJSON(url,function(registros){
					if (registros.length == 0){
						$.messager.alert("No existen datos de RUTA");
					}		
					else {
						$.each(registros, function(i,registro){

							setVar('aruta', 0, registro.ruta);

						});
					}
			});

    	}

    	function traerCedula(){
    		var xcedula = $("#cedula").textbox('getText');
    		// alert(xcedula);

    		//alert("buscar interno="+xinterno);
    		setVar('nombre',0,'');

			var url="www/json/datoscedula.php?cedula="+xcedula;

			$.getJSON(url,function(registros){
					if (registros.length == 0){
						$.messager.alert("No existen datos de RUTA");
					}		
					else {
						$.each(registros, function(i,registro){

							setVar('nombre', 0, registro.nombre);

						});
					}
			});

    	}

    	function verMorosos(){
    		var xcolegio = $("#mcolegio").combobox('getText');
    		var xmes = $("#mmes").combobox('getText');
    		var xruta = getVar('mruta',0);

    		if(xruta==''){
    			$.messager.alert("Mensaje","ruta VACIA!!!");
    			return;

    		}

    		//alert("verMorosos="+xcolegio+xmes+xruta);

    		$("#dglmorosos").datagrid('load',{
    			colegio:xcolegio,
    			mes:xmes,
    			ruta:xruta
    		});
    	}

    	function borrarMorosos(){
    		var xcolegio = '';
    		var xmes = '';
    		var xruta = '';

    		$("#dglmorosos").datagrid('load',{
    			colegio:xcolegio,
    			mes:xmes,
    			ruta:xruta
    		});

    	}

    	function borrarMorososVar(){
    		$("#mcolegio").combobox('setText','');
    		$("#mcolegio").combobox('setValue','');
    		$("#mmes").combobox('setText','');
    		$("#mmes").combobox('setValue','');
    		setVar('mruta',0,'');

    	}

    	function borrarAsistenciaVar(){
    		$("#acolegio").combobox('setText','');
    		$("#acolegio").combobox('setValue','');
    		setVar('aruta',0,'');
    		$("#acodigos").combobox('setText','');
    		$("#acodigos").combobox('setValue','');
    		setVar('anombre',0,'');
    	}

    </script>

    <!-- FORMATOS ///////////////////////////////////////////////////////////////////////////////// -->
    <script type="text/javascript">
    	function mostrarDatosVeh(pcolegio){
    		$("#dgdatosveh").datagrid('load',{
    			colegio:pcolegio
    		});

    	}

    	function verPlanillaCol(popcion){
    		var xcolegio = $("#ccolegio").combobox('getText');
    		var xplanilla = getVar('cplanilla',0);

			var params  = 'width='+screen.width;
    		params += ', height='+screen.height;
    		params += ', top=0, left=0'
    		params += ', fullscreen=yes';

    		if(popcion=='S'){
    			var row = $("#dgdatosveh").datagrid('getSelected');
    			if(row){
    				var xcual = row['ruta'];
    			}else {
    				$.messager.alert("Mensaje", "seleccion VACIA!!!");
    				return;
    			}

    		}else {
    			var xcual = '*';
    		}

			if(xplanilla==1){
				window.open ("app/secciones/escolar/planillaChequeo.php?cual="+xcual+
					'&colegio='+xcolegio, params);    					
			}else {
				window.open ("app/secciones/escolar/planillaChequeoSin.php?cual="+xcual+
					'&colegio='+xcolegio, params);    					
			}

    	}
    </script>

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

	<!-- SCRIPT asistencia //////////////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		function mostrarAsistencia(){
			// var xcolegio = $("#asiscolegio").combobox('getText');
			var xcolegio = '';

			$("#dgasistencia").datagrid('load',{
				colegio:xcolegio
			}).datagrid('enableFilter');

		}

		function verAsistencia(){
			var xcolegio = $("#asiscolegio").combobox('getText');
			var xruta = $("#asisruta").combobox('getText');
			var xinterno = getVar('asisinterno',0);

			var xfecha = getVar('asisfecha',2);
			var xjornada = $("#asisjornada").combobox('getText');

			$("#dgasistencia").datagrid('load',{
				colegio:xcolegio,
				ruta:xruta,
				interno:xinterno,
				fecha:xfecha,
				jornada:xjornada
			}).datagrid('enableFilter');

		}

		// traer rutas x colegios para combo 
		function traerRutas(pcolegio){
			var xurl = "www/json/comborutas.php?colegio="+pcolegio
			$("#asisruta").combobox({
				url:xurl
			});
		}

		function traerInterno(){
			var xcolegio = $("#asiscolegio").combobox('getText');
			var xruta = $("#asisruta").combobox('getText');
    		
    		setVar('asisinterno',0,'');

			var url="www/json/datosinterno_getdata.php?colegio="+xcolegio+"&ruta="+xruta;

			$.getJSON(url,function(registros){
					if (registros.length == 0){
						$.messager.alert("No existen datos de RUTA");
					}		
					else {
						$.each(registros, function(i,registro){

							setVar('asisinterno', 0, registro.interno);

						});
					}
			});

		}		
	</script>

	<!-- SCRIPT mantenimiento de observaciones en la asistencia /////////////////////////////////// -->
	<script type="text/javascript">
		function botones(pestado){
			$("#obstexto").textbox( (pestado==1)?'enable':'disable') ;
			$("#btnSave").linkbutton( (pestado==1)?'enable':'disable') ;
			$("#btnCancel").linkbutton( (pestado==1)?'enable':'disable') ;

		}	

		function addObserva(){
			var row = $("#dgasistencia").datagrid('getSelected');

			if(row){
				botones(1);

			}else {
				$.messager.alert('Mensaje','no hay SELECCION!!!');
			}

		}

		function cancelObserva(){
			setVar('obstexto',0,'');
			botones(0);

		}

		function saveObserva(){
			$.messager.confirm('Confirm', 'esta seguro de GRABAR registro?', function(r){
				if (r){					
					var xobserva = getVar('obstexto',0);
					if(xobserva==''){
						$.messager.alert('Mensaje','observacion VACIA!!!');

					}else {
						//alert('Save observa');
						contarReg();

						// saveReg(); -- ahora se invoca desde contarReg()

					}

				}
			});

		}

		function contarReg(){
			var reg = $("#dgasistencia").datagrid('getSelected');

			var xaccion = 'F';
			var xfuncion = 'COUNT';
			var xtabla = 'tbobsasistencia';
			var xcampos = ['codigo'];
			var xcamposCondicion = ['colegio','interno','ruta','jornada','fecha','codigo'];

			var xcolegio = $("#asiscolegio").combobox('getText');
			var xinterno = getVar('asisinterno',0);
			var xruta = $("#asisruta").combobox('getText');
			var xjornada = $("#asisjornada").combobox('getText');			
			var xfecha = getVar('asisfecha',2);

			var xcodigo = reg['codigo'];

			var xvaloresCondicion = [xcolegio, xinterno, xruta, xjornada, xfecha, xcodigo];
			//alert('contarReg');
			$.post('www/json/myFileDB.php',
				{accion:xaccion, funcion:xfuncion, tabla:xtabla, campos:xcampos,
				 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion},
				function(result){
					if(result.success){
						var xcuantos = parseInt(result.valor);
						if(xcuantos>1){
							$.messager.alert('Mensaje','YA existe REGISTRO!!!');

						}else {
							// aca aparece nuevamente el save de registro
							//alert('saveReg');
							saveReg();

						}
					}
				},
			'json');

		}

		function saveReg(){
			var reg = $("#dgasistencia").datagrid('getSelected');

			var xaccion = 'I';
			var xtabla = 'tbobsasistencia';			

			var xcolegio = $("#asiscolegio").combobox('getText');
			var xinterno = getVar('asisinterno',0);
			var xruta = $("#asisruta").combobox('getText');
			var xjornada = $("#asisjornada").combobox('getText');			
			var xfecha = getVar('asisfecha',2);

			var xcodigo = reg['codigo'];
			var xnombre = reg['nombre'];

			var xobserva = getVar('obstexto',0);

			var xcampos = ['colegio','interno','ruta','jornada','fecha','codigo','nombre','observacion'];
			var xvalores = [xcolegio, xinterno, xruta, xjornada, xfecha, xcodigo, xnombre, xobserva];

			// alert(xcolegio+ xinterno+ xruta+ xjornada+ xfecha+ xcodigo+ xnombre+ xobserva);

			$.post('www/json/myFileDB.php',
				{accion:xaccion, tabla:xtabla, campos:xcampos, valores:xvalores },
				function(result){
					if(result.success){
						$.messager.alert('Mensaje','observacion grabada EXITOSAMENTE!!!');
						botones(0);
						verAsistencia();

					}else {
						$.messager.alert('Mensaje', 'error al grabar!!!');

					}
				},
			'json');
		}

		function eliminarObsReg(){
			var reg = $("#dgasistencia").datagrid('getSelected');

			var xaccion = 'D';
			var xtabla = 'tbobsasistencia';
			var xcamposCondicion = ['colegio','interno','ruta','jornada','fecha','codigo'];

			var xcolegio = $("#asiscolegio").combobox('getText');
			var xinterno = getVar('asisinterno',0);
			var xruta = $("#asisruta").combobox('getText');
			var xjornada = $("#asisjornada").combobox('getText');			
			var xfecha = getVar('asisfecha',2);

			var xcodigo = reg['codigo'];

			var xvaloresCondicion = [xcolegio, xinterno, xruta, xjornada, xfecha, xcodigo];

			$.post('www/json/myFileDB.php',
				{accion:xaccion,tabla:xtabla,camposCondicion:xcamposCondicion,valoresCondicion:xvaloresCondicion},
				function(result){
					if(result.success){
						$.messager.alert('Mensaje','Observacion Eliminada EXITOSAMENTE!!!');
						verAsistencia();
					}

				},
			'json');

		}

		function eliminarObserva(){
			var reg = $("#dgasistencia").datagrid('getSelected');

			if(reg){
				var xobserva = reg['observa'];

				if(xobserva == ''){
					$.messager.alert('Mensaje','Observacion Vacia!!!');

				}else{
					$.messager.confirm('Confirm', 'esta seguro de Eliminar observacion?', function(r){
						
						if (r){					
							eliminarObsReg();			
						}
					});
					
				}
			}else{
				$.messager.alert('Mensaje','No hay seleccion!!!');
			} 
		}

	</script>

	<script>
		function accesoSesion(){
    		mostrarWin('dlgSesion');
    	}

    	function clearForm(){
			$('#dlgSesion').form('clear');
			document.getElementById('usuariose').focus();
		}

		function cargarPrincipal(){
			var xusuario = $("#usuariose").val();
			var xclave = $("#clavese").val();
			var aleatorio = Math.floor(Math.random() * 100) + 25;												
			var url="app/control/usuarioJSON.php?clave="+xclave+"&usuario="+xusuario;
			$.getJSON(url,function(dlgSesion){
					if (dlgSesion.length == 0){
						$('#dlgSesion').form('load',{
							xvalor: aleatorio							
						});							
					}		
					else {
					$.each(dlgSesion, function(i,usuario){
					var newRow = usuario.nombre;
					var newEstado = usuario.estado;
					var newPerfil = usuario.perfil;						
					var newValor = 1;						
					$('#dlgSesion').form('load',{
						xnombre: newRow,
						xestado: newEstado,
						xperfil: newPerfil,							
						xvalor: newValor							
					});						
					});							
					}
			});
		}
		
		$('#xvalor').textbox({
		  onChange: function(value){
			if(value==1){
				var usuario = $("#usuariose").val();
				var nombre = $("#xnombre").val();					
				var perfil = $("#xperfil").val();
				var estado = $("#xestado").val();

				if(estado==1){
					$.messager.alert('Mensaje','USUARIO esta conectado!!!','error');
				}
				else {									
					window.location.assign("app/index.php?usuario="+usuario+"&nombre="+nombre+"&estado=1&perfil="+perfil);
				}	
			}
			else {
				if($("#usuario").val().length < 1){
					$.messager.alert('Mensaje','USUARIO requerido!!!','warning');
				} else {
					$.messager.alert('Mensaje','NO EXISTE usuario/clave!!!','error');
				}	
			}
			clearForm();

		  }
		});
	</script>

	<script type="text/javascript">
		function covid19(){
    		mostrarWin('dlgcovid');
    	}
	</script>
</body>
</html>	