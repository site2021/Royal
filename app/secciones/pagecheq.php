<!DOCTYPE html>
<html>
	<head>		
		<meta charset="UTF-8">
		<title>Transportando Ideas</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
		<link href="images/ti_ico.png" type="image/x-icon" rel="shortcut icon" />	
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>

		<link rel="stylesheet" type="text/css" href="jeasyui/themes/default/easyui2.css">
		<link rel="stylesheet" type="text/css" href="jeasyui/themes/icon.css">
		<link rel="stylesheet" type="text/css" href="jeasyui/demo.css">
		<script type="text/javascript" src="jeasyui/jquery.min.js"></script>
		<script type="text/javascript" src="jeasyui/jquery.easyui.min.js"></script>	

		<style>
			html, body {
				overflow: hidden;
			}
			.hc {
				background:#0D6B9A;
				color:#000;
				border-style: solid;
				border-color: #000;
			}
			.hs {
				background:#EAEED1;
				color:#000;
				border-style: solid;
				border-color: #000;
			}
			
		</style>


		<style type="text/css">
			.cabecera {
				background: rgba(192, 192, 192, .6);
				border: solid 1px rgba(192, 192, 192, .6);
				
			}

			.cabecera label {
				margin-left:10px;				
				font-size:15px;
				color:#0D6B9A;
				text-shadow: 1px 1px 1px #000;
			}

		</style>
		
		<script type="text/javascript">	
			$(document).on('ready', function(){
				var alto = (window.innerHeight)-20;
				var c = $('#cc');
				c.layout('resize',{
					height: (alto)
				});
						
			});
		</script>

		<script type="text/javascript">
			window.history.forward();
			function noback(){window.history.forward();}
		</script>
		
	
	</head>
	
	<body>	
		<div id="wrapper">		
			<div id="cc" class="easyui-layout" style="width:100%;height:350px;">
				<div class="cabecera" data-options="region:'north'" style="height:38px">
					<table border="0" style="width:100%;">
						<tr>
							<th style="width:50%">
								<div style="float:left"><label>Transportando Ideas</label></div>
								<div style="float:left;margin-left:3px;margin-top:3px">
									<!-- <p>- Su mejor alternativa para el transporte escolar, turistico y empresarial. </p> -->
								</div>
							</th>

							<th style="width:50%">
								<div style="float:right;margin-left:10px;padding-top:3px">
									<a href="#" class="easyui-linkbutton" style='width:110px;height:26px' 
										onclick="regresarChequeate()"><b>Cerrar Sesion</b></a>								
								</div>
								<div style="float:right;margin-left:5px;padding-top:7px">
									<p>#NOMBRE#</p>
								</div>								
								<div style="float:right;margin-left:5px;padding-top:7px">
									<p>USUARIO: </p>
								</div>								
								<div style="float:right;padding-top:5px">
									<img src='images/user.png' style='width:20px; height:20px' alt='[]' />
								</div>

							</th>
						</tr>
					</table>
					
					<div style="display:none">
						<input id="usuario" class="textbox" name="usuario" value="#USUARIO#">						
						<input id="nombre" class="easyui-textbox" value="#NOMBRE#">
						<input id="perfil" class="easyui-textbox" value="#PERFIL#">

					</div>											

				</div>
				
				<div data-options="region:'west', collapsed:true" title="MENU" style="background:#5CB0B8; width:25%;padding:10px">
					<div class="easyui-menu" data-options="inline:true" style="width:100%">
						#MENU#
					</div>	
					<br>
				</div>
				
				<div data-options="region:'center'" style="">
					#CONTENIDO# 
				</div>			
			</div>
			
			<div id="footer">
				<p>Copyright &copy; 2017 [ AGENCIA TOP TEN - Marketing Digital ]</p>
			</div>								

		</div>	
		
		<script type="text/javascript">
			$(window).resize(function() {
				var alto = (window.innerHeight)-20;
				var c = $('#cc');
				c.layout('resize',{
					height: (alto)
				});
				
			});
			

			function regresarChequeate(){
				var usuario = $("#usuario").val();
				// window.location.assign("../index.php?usuario="+usuario+"&estado=0");
				window.location.assign("../chequeate.php?usuario="+usuario+"&estado=0");
			
			}

			function ejecutar(xaccion){
			

				window.location.assign("index.php?action="+xaccion)
						
			}
		
			function NoBack(){
				history.go(1)
			}	
					
		</script>	

		<script type="text/javascript">
			function rg(){
				var params  = 'width='+screen.width;
        		params += ', height='+screen.height;
        		params += ', top=0, left=0'
        		params += ', fullscreen=yes';				
				window.open ("secciones/rg/rg.php?usuario=#USUARIO#");

			}
		</script>		
		
		
	</body>
</html>