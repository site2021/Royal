<?php
	$usuario=$_GET['usuario'];
	$estado=$_GET['estado'];

	if ($usuario!=''){
		include 'app/control/conex.php';

		$sql = "UPDATE tbusuarios SET estado=".$estado." WHERE usuario='".$usuario."'";
		$result = mysqli_query($conexion, $sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="www/images/ti_ico.png" type="image/x-icon" rel="shortcut icon" />
	<title>Transportando Ideas</title>

	<link rel="stylesheet" type="text/css" href="app/jeasyui/themes/default/easyui2.css">
	<link rel="stylesheet" type="text/css" href="app/jeasyui/themes/icon.css">

	<script type="text/javascript" src="app/jeasyui/locate/easy-lang-es.js"></script>
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
			background-image: url(www/images/ti.png);
			background-repeat: no-repeat;			
			background-position-y: 36%; 
			background-position-x: 20%;
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
			background: #0D6B9A;
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
			color: black;
			text-decoration: all;
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
			top: 3%;
			right: 30%;
		}
		.menu-opcion {
			position: absolute;
			display: flex;
			align-items: center;
			justify-content: center;
			width: 100%;
			height: 20%;
			border-radius: 15px;
			/*background: linear-gradient(#f2f2f2, #ccc);*/
			/*border: 1px solid #808080;*/
			text-align: center;
		}
		.menu-opcion:hover {
			/*background: #b7fbb7;*/
		}
		.menu-opcion span {			
			display: inline-block;
			width: 100%;
		}
		.menu-opcion img {
			/*filter: drop-shadow(2px 2px 1px #000);*/
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
		</article>
	</section>

    <!-- DIV menu lateral para opciones generales ///////////////////////////////////////////////// -->
    <div class="menu-side">    	
    	<div class="menu-opcion" style="top: 24%" onclick="accesoSesion()">
			<a href="#sesion">
				<img src="www/images/iniciar.png">
				<span class="footerText1">Ingresar</span>
				<!-- <span class="footerText1">Sesión</span> -->
			</a>
    	</div>


    	<div class="menu-opcion" style="top: 72%">
			<a href="movil/chequeatecontrol.html" target="black">
				<img src="www/images/control.png">
				<span class="footerText1">Control</span>
				<!-- <span class="footerText1">Sesión</span> -->
			</a>
    	</div>


    	<div class="menu-opcion" style="top: 119%">
			<a href="movil/chequeateusuario.html" target="black">
				<img src="www/images/salud.png">
				<span class="footerText1">Usuario</span>
				<!-- <span class="footerText1">Sesión</span> -->
			</a>
    	</div>
    </div>

    <!-- DIALOG iniciar sesion //////////////////////////////////////////////////////////////////// -->
    <body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
		<div id="dlgSesion" class="easyui-dialog" closed="true" buttons="#dlg-buttons" title="ACCESO"
			style="width:20%;height:37%;padding:8%"
			data-options="modal:true">
			
			<div class="fitem">			
				<input id="usuariose" name="usuariose" class="easyui-textbox" value=""
					data-options="prompt:'digitar USUARIO',iconCls:'icon-man'" >			
			</div>
			
			<div class="fitem">
				<input id="clavese" name="clavese" class="easyui-textbox" type="password" value="" 
					data-options="prompt:'digitar CLAVE',iconCls:'icon-lock'">			
			</div>

			<div style="text-size:10px; text-align:center;margin-top:35px">
				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" style="width:100px; height:30px; border-radius: 50px 50px 50px 50px" 
					onclick="cargarPrincipal()"><span style="font-size:12px">Entrar</span></a>
					
				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" style="width:100px; height:30px; border-radius: 50px 50px 50px 50px" 
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

    	function mostrarWin(pantalla){
    		$("#"+pantalla).dialog('hcenter');
    		$("#"+pantalla).dialog('vcenter');
    		$("#"+pantalla).dialog('open');
    	}

    	function cerrarWin(pantalla){
    		$("#"+pantalla).dialog('close');	
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
</body>
</html>	