<?php

				//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
	if(isset($_POST['insertar']))

	{


	$items1 = ($_POST['idalumno']);
	$items2 = ($_POST['nombre']);
	$items3 = ($_POST['carrera']);
	$items4 = ($_POST['grupo']);
	 
	///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
	while(true) {

	    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
	    $item1 = current($items1);
	    $item2 = current($items2);
	    $item3 = current($items3);
	    $item4 = current($items4);
	    
	    ////// ASIGNARLOS A VARIABLES ///////////////////
	    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
	    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");
	    $carr=(( $item3 !== false) ? $item3 : ", &nbsp;");
	    $gru=(( $item4 !== false) ? $item4 : ", &nbsp;");

	    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
	    $valores='('.$id.',"'.$nom.'","'.$carr.'","'.$gru.'"),';

	    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
	    $valoresQ= substr($valores, 0, -1);
	    
	    ///////// QUERY DE INSERCIÓN ////////////////////////////
	    $sql = "INSERT INTO alumnos (id_alumno, nombre, carrera, grupo) 
		VALUES $valoresQ";

		
		$sqlRes=$conexion->query($sql) or mysql_error();

	    
	    // Up! Next Value
	    $item1 = next( $items1 );
	    $item2 = next( $items2 );
	    $item3 = next( $items3 );
	    $item4 = next( $items4 );
	    
	    // Check terminator
	    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;

	}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<meta http-equiv="expires" content="0">
	<meta http-equiv="Cache-Control" content="no-cache">
 	<meta http-equiv="Pragma" CONTENT="no-cache">

	<link href="img/royal_ico.ico" type="image/x-icon" rel="shortcut icon" />
	<title>ROYAL-Movil</title>

    <link rel="stylesheet" type="text/css" href="jeasyui/themes/metro/easyui.css">
    <link rel="stylesheet" type="text/css" href="jeasyui/themes/mobile.css"> 
    <link rel="stylesheet" type="text/css" href="jeasyui/themes/color.css"> 
    <link rel="stylesheet" type="text/css" href="jeasyui/themes/icon.css">  

	<link rel="stylesheet" type="text/css" href="css/movil.css">

    <script type="text/javascript" src="jeasyui/jquery.min.js"></script>
    <script type="text/javascript" src="jeasyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="jeasyui/jquery.easyui.mobile.js"></script>
	<script type="text/javascript" src="jeasyui/locale/easyui-lang-es.js"></script>

	<script type="text/javascript" src="lib/datagrid-detailview.js"></script>
	<script type="text/javascript" src="lib/datagrid-filter.js"></script>
	<script type="text/javascript" src="lib/accounting.js"></script>
	<script type="text/javascript" src="lib/movil.js"></script>
	<script type="text/javascript" src="lib/usuarios.js"></script>
	<script type="text/javascript" src="lib/alistamientos.js"></script>

	<script type="text/javascript">
        function cellStyler(value,row,index){
            if (value == 0){
                return 'color:#cffccf';
            }
        }

    </script>	

    <style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>

</head>
<body>
	<!-- pagina: INICIO /////////////////////////////////////////////////////////////////////////// -->
	<div id="inicio" class="easyui-navpanel" style="position:relative" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<div class="m-title">- BIENVENIDOS -</div>
			</div>
	        <div class="m-left">
	            <a href="javascript:()" class="easyui-linkbutton" plain="true" 
	            	style="color:#fff" outline="true">Ver 1.2
	            </a>
	        </div>

	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>

		</header>
		<footer style="text-align:center">
			<div>
				<label class="digital" >I N T R A N E T</label><br>
				<label class="digital" >M o v i l</label>
			</div>
			
		</footer>

		<div style="width:100%;margin-top:10%;display:block">
			<img src="img/royal001.jpg" style="margin-left:10%;width:80%">			
		</div>

		<div class="bordes" style="margin-top:15%">	
				<!-- variabel de control FULLSCREEN -->
		        <div style="float:left;display:none">
					<input id="xfull" name="xfull" class="easyui-textbox" style="width:20px" value="N">
		        </div>
	    </div>

	    <div class="divC">
         	<a id="btnNuevo" class="boton" onclick="login()">
         		<labeL style="font-family:Arial">Iniciar</label>
         	</a>
	    </div>


		<div class="footer" style="display:block">
			
		</div>

		<!-- ventana de dialogo: LOGIN -->
		<div id="dlg1" class="easyui-dialog" style="padding:10px;width:80%"
			 data-options="inline:true,modal:true,closed:true,title:''">
			<header style="padding:0px 1px 3px 0px;">
				<div class="m-toolbar">
	                <div class="m-title" style="color:#fff">Login</div>
				</div>
			</header> 
			<footer>
				<div class="m-toolbar" style="padding:6px">
					<a href="javascript:void(0)" class="easyui-linkbutton" 
					   style="background:#E6E6E6;color:#000;border-color:#BDBDBD;width:49%;height:35px" 
					   onclick="validarUsuario()" data-options="iconCls:'icon-ok'">Entrar</a>

					<a href="javascript:void(0)" class="easyui-linkbutton" 
					   style="background:#E6E6E6;color:#000;width:49%;;border-color:#BDBDBD;height:35px" 
					   onclick="cerrar('#dlg1')" data-options="iconCls:'icon-cancel'">Cancelar</a>
				</div>
			</footer>

			<div style="margin-bottom:10px">
				<input id="usuario" name="usuario" class="easyui-textbox" prompt="digitar USUARIO" 
					   style="background-color:#F6CECE;width:100%;height:30px"
					   data-options="iconCls:'icon-man'"
					   value="">
			</div>
			<div>
				<input id="clave" name="clave" class="easyui-textbox" type="password" prompt="digitar CLAVE" 
					   style="width:100%;height:30px" data-options="iconCls:'icon-lock'" value="">
			</div>
		</div>
	</div>

	<!-- pagina: MENU ///////////////////////////////////////////////////////////////////////////// -->
	<div id="menu" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">MENU PRINCIPAL</span>
			</div>
            <div class="m-left">
                <a href="javascript:void(0)" class="easyui-linkbutton m-back"  style="color:#fff"
                	data-options="plain:true,outline:true" 
                	onclick="irInicio()">Inicio</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>            
		</header>

		<div style="width:100%;margin-top:5%;display:block">
			<img src="img/royal001.jpg" style="margin-left:10%;width:80%">			
		</div>

		<ul class="m-list" style="margin-top:-4%">
			<li id="mquienessomos"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irQuienesSomos()">¿Quiénes somos?</a></li>
			<li id="mpublicaciones"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irPublicaciones()">Publicaciones</a></li>
			<li id="mlista"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irAlista()">Alistamientos</a></li>
			<li id="masistencia"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irAsistencia()">Asistencia</a></li>
			<li id="minformes"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irInformes()">Informes</a></li>
			<li id="mclima"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irClima()">Clima</a></li>
			<li id="mvia"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irVia()">Vías</a></li>
			<li id="mmantenimiento"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irMantenimiento()">Mantenimientos</a></li>
			<li id="mreconocruta"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irReconocRuta()">Reconocimiento Ruta</a></li>
			<li id="mcertificado"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irCertificado()">Certificado Laboral</a></li>

			<li id="mcontrato"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irContrato()">Contratos</a></li>

			<!-- <li id="mextractos"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irExtractos()">Extractos</a></li> -->
			<!-- <li id="mcontrato"><a href="javascript:void(0)" style="background:silver;font-weight:bold"
				data-options="animation:'slide',direction:'left'"
				onclick="irContrato()">Contratos</a></li> -->
		</ul>

		<div class="footer">
			<div class="footertexto">
				<label>Usuario:</label>
				<input id="suser" name="suser" class="easyui-textbox" 
					   style="width:15%;height:25px" data-options="readonly:'true'">
				<input id="snombre" name="snombre" class="easyui-textbox" 
					   style="width:50%;height:25px" data-options="readonly:'true'">
				<input id="sciudad" name="sciudad" class="easyui-textbox" 
					   style="width:10%;height:25px" data-options="readonly:'true'">
			</div>
		</div>
	</div>

	<!-- pagina: QUIENES SOMOS ///////////////////////////////////////////////////////// -->
	<div id="quienessomos" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">¿Quiénes somos?</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>            
		</header>

		<div class="easyui-navpanel">
        <div class="easyui-tabs" data-options="tabHeight:60,fit:true,tabPosition:'bottom',border:false,pill:true,narrow:true,justified:true">
            <div style="padding:10px">
                <div class="panel-header tt-inner">
                    <img src='img/empresa.png'/><br>Nosotros
                </div>
                <b><span style="font-size: 18px;text-align: ;color: green">Misión</span></b>
				<div style="float:left;margin-top:30px">
					<img src="img/mision1.png" width="90">
				</div>
				<br>	
                <p style="font-size: 16px">En la Cooperativa Royal Express prestamos el servicio de transporte especial de pasajeros en el territorio nacional, brindando seguridad, confianza y bienestar a clientes y asociados.</p><br>

				<b><span style="font-size: 18px;text-align: center;color: green;">Visión</span></b>
				<div style="float:right;margin-top:30px">
					<img src="img/vision2.png" width="100">
				</div>
				<p style="font-size: 16px">Seremos para el 2022 la empresa líder en el servicio de transporte especial de pasajeros a nivel regional, incursionando en nuevas unidades de negocio relacionada con nuestra actividad y el turismo.</p>
				<br>
				<b><span style="font-size: 18px;text-align: center;color: green;">Política Integral</span></b>
				<p style="font-size: 16px">En la Cooperativa Royal Express prestamos servicio de transporte escolar, turístico y empresarial, garantizando la satisfacción de nuestros clientes y calidad en la prestación del servicio, brindando confiabilidad a los usuarios y entes de control.<br><br>

				Estamos comprometidos con la implementación de la seguridad y salud en el trabajo, en busca de la prevención de lesiones y enfermedades, promocionando y manteniendo las condiciones óptimas para la salud física, mental y social de nuestros asociados y colaboradores, mediante la implementación de estrategias que permitan la identificación, evaluación y control de los riesgos inherentes a nuestra actividad económica.</p>
				<div style="float:left;margin-top:30px">
					<img src="img/politica.png" width="100">
				</div>
				<p style="font-size: 16px;">
				Igualmente reiteramos nuestro respeto hacia el medio ambiente y desarrollo sostenible, a través de la identificación y control de los aspectos ambientales, socioculturales y económicos producto del proceso de nuestra operación.<br><br>

				Además, la Cooperativa Royal Express cuenta con procedimientos en materia de seguridad vial, teniendo como prioridad la prevención de la ocurrencia de accidentes de tránsito, por lo cual, todo vehículo propio o subcontratado, deberá respetar y acatar la normativa y señales de tránsito, abstenerse de conducir bajo el efecto del alcohol, drogas o en estado de cansancio, contar con personal calificado y capacitado para la conducción segura de vehículos, cumplir con las revisiones preventivas y las técnico-mecánicas establecidas, así como con el alistamiento del vehículo antes de la marcha.</p>

				<div style="float:right;margin-top:30px">
					<img src="img/nuestra.png" width="120">
				</div>	

				<p style="font-size: 16px;">Es así, como nuestros compromisos son implementados bajo el cumplimento de los requisitos legales aplicables y otros estipulados por la Cooperativa, enfocándonos en la mejora continua de nuestros procesos, de los Sistemas de Gestión Ambiental, Seguridad y Salud en el Trabajo, Calidad y Seguridad Vial.</p>

				<!-- OBJETIVOS INTEGRADOS -->

				<div style="float:left">
					<b><span style="font-size: 18px;text-align: center;color: green;">Objetivos Integrados</span></b>
				</div></br></br>

				<div style="float:left;margin-top:30px">
					<img src="img/crecimiento.png">
				</div>

				<p style="font-size: 16px; text-align: left;">1. Generar rentabilidad de las unidades de negocio, con el propósito de fortalecer el rendimiento económico de la Cooperativa.</p>

				<div style="float:left;margin-top:15px">
					<img src="img/aula.png">
				</div>

				<p style="font-size: 16px;">2. Seleccionar un equipo humano competente; capacitarlo y formarlo continuamente bajo las exigencias del mercado y del sector.</p>

				<div style="float:left;margin-top:15px">
					<img src="img/mecanico.png">
				</div>

				<p style="font-size: 16px;">3. Mantener un parque automotor en óptimas condiciones, bajo los parámetros exigidos por los requisitos legales del sector, garantizando seguridad y confianza en la operación.</p>

				<div style="float:left;margin-top:15px">
					<img src="img/advertencia.png">
				</div>

				<p style="font-size: 16px;">4. Controlar la operación de los servicios de transporte, llevando a cabo procedimientos en seguridad vial para prevenir la ocurrencia de accidentes de tránsito. </p>

				<div style="float:left;margin-top:15px">
					<img src="img/trato.png">
				</div>

				<p style="font-size: 16px;">5. Satisfacer las necesidades de los clientes, a través del cumplimiento de los requisitos acordados y la gestión de las PQRS para lograr calidad y mejora continua en el servicio y los procesos. </p>

				<div style="float:left;margin-top:15px">
					<img src="img/equipo.png">
				</div>

				<p style="font-size: 16px;">6. Dar cumplimiento al sistema de gestión de seguridad y salud en el trabajo, mediante las actividades de control y prevención de lesiones y enfermedades, manteniendo las condiciones óptimas de salud física, mental y social de los colaboradores.</p>

				<div style="float:left;margin-top:15px">
					<img src="img/reciclar.png">
				</div>

				<p style="font-size: 16px;">7. Promover el respeto por el medio ambiente bajo el control de los impactos ambientales de la
				operación.</p>

            </div>
            <div style="padding:10px">
                <div class="panel-header tt-inner">
                    <img src='img/cono.png'/><br>PESV
                </div>

                <span style="font-size: 18px;text-align: ;color: green">POLÍTICA DE SEGURIDAD VIAL</span>

                <p style="font-size: 16px;">Considerando los efectos negativos que generan los siniestros viales y los desafíos de la vida urbana contemporánea la COOPERATIVA MULTIACTIVA DE TRANSPORTES ESPECIALES Y TURISMO ROYAL EXPRESS establece su compromiso por desarrollar acciones de control para minimizar los riesgos que se derivan de la movilidad en las vías públicas, con el objetivo de proteger la integridad física de sus empleados, usuarios del servicio y población en general, así como el patrimonio de la empresa.

                </br>

                <p style="font-size: 16px;">Para el logro de dicho propósito la empresa se compromete a:</p>

                <p style="font-size: 16px;">•Destinar los recursos humanos, técnicos y financieros para la implementación del PESV.</p>

                <p style="font-size: 16px;">•Dar cumplimiento a los requisitos legales y de otra índole aplicable a la empresa en materia de movilidad y seguridad vial.</p>

                <p style="font-size: 16px;">•	El mejoramiento continuo de todas las condiciones para promover la movilidad segura y sostenible.</p>

                <p style="font-size: 16px;">•	Promover a través de jornadas de sensibilización y capacitación la formación de hábitos, comportamientos y conductas seguras en la vía.</p>

                <p style="font-size: 16px;">•	Revisar permanentemente el estado de los vehículos y los procesos de trabajo para garantizar desplazamientos seguros.</p>

                <p style="font-size: 16px;">•	Realizar análisis de las diferentes rutas de desplazamiento usadas por los funcionarios, para determinar medidas de prevención.</p>

                <p style="font-size: 16px;">•	Implementar medidas que permitan la atención oportuna y la disminución de las consecuencias derivadas de posibles siniestros viales.</p>

            </div>
        </div>
    </div>
    <style scoped>
       .tt-inner{
            display:inline-block;
            line-height:12px;
            padding-top:5px;
        }
        p{
            line-height:150%;
        }
    </style>
	</div>

	<!-- pagina: PUBLICACIONES ///////////////////////////////////////////////////////// -->
	<div id="publicaciones" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">Publicaciones</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>            
		</header>

		<div class="easyui-navpanel">
	        
	        <div class="easyui-accordion" data-options="fit:true,border:false,selected:-1">
	            <div title="Reglamento Interno">
	                <iframe src="https://drive.google.com/file/d/1OKrZFlH33B-cG0ljK466q0gsshD9OiEj/preview" width="100%" height="100%"></iframe>
	            </div>
	            
	            <div title="Reglamento de Higiene y Seguridad Industrial">
	                <iframe src="https://drive.google.com/file/d/1dbZx0dNKOOdEhXoD98OhtGhUF0dPZFJF/preview" width="100%" height="100%"></iframe>
	            </div>

	            <div title="Funciones de Cargo Conductor">
	                <iframe src="https://drive.google.com/file/d/1xhHltxgs-g7dmM0DqZ6WARaEsOifbnJ0/preview" width="100%" height="100%"></iframe>
	            </div>

	        </div>
	    </div>

		<!-- <iframe src="https://drive.google.com/file/d/1FdJ9Yl5SEueGFpMNuK2DdH0JTEH00jh4/preview" width= 100% height="480"></iframe> -->
	</div>


	<!-- pagina: ALISTAMIENTOS //////////////////////////////////////////////////////////////////// -->
	<div id="alista" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">Alistamientos</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>            
		</header>

		<div id="toolbaralista">
			<input id="afecha" name="afecha" class="easyui-datebox" style="width:32%"
				data-options="disabled:true,editable:true,formatter:myformatter,parser:myparser">

			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" 
				style="margin-left:5%"
				onclick="validarRec()"></a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" 
				style="margin-left:5%"
				onclick="printAlista()"></a>

		</div>
		<table id="dgalista" class="easyui-datagrid" style="width:100%;height:500px"
			url="json/alista_resumen.php"
			toolbar="#toolbaralista"
			pagination="false"
			rownumbers="false" fitColumns="false" singleSelect="true">
			<thead>
				<tr>					
	            	<th field="interno" width="70px">interno</th>					
	            	<th field="fecha" width="70px">fecha</th>					
					<th field="cuantos" width="70px" align="center">restringe</th>
				</tr>
			</thead>
		</table>

		<!-- DIALOG: entrada de datos de alistamientos //////////////////////////////////////////// -->
		<div id="dlgalista" class="easyui-dialog" title="<font color=white>DATOS</font>"
			data-options="modal:true,closable:true"
			style="font-family:Arial;margin:0 0 0 0;width:99%"
			closed="true" buttons="#alista-buttons">
			<div id="tbdatos">
	            <!-- botones de consulta de S,N o todos /////////////////////////////////////////// -->
	            <a href="javascript:void(0)" class="easyui-linkbutton"  
					style="background:#F2F5A9;color:#000;border-color:#000;width:10%;height:25px;margin-left:5%"
					onclick="mostrarDg('*')"
					data-options="">*</a>
	            <a href="javascript:void(0)" class="easyui-linkbutton"  
					style="background:#F2F5A9;color:#000;border-color:#000;width:10%;height:25px;margin-left:5%"
					onclick="mostrarDg('N')"
					data-options="">N</a>
	            <a href="javascript:void(0)" class="easyui-linkbutton"  
					style="background:#F2F5A9;color:#000;border-color:#000;width:10%;height:25px;margin-left:5%"
					onclick="mostrarDg('S')"
					data-options="">S</a>
				<a href="javascript:void(0)" class="easyui-linkbutton"
					style="margin-left:5%"
					onclick="reject()"
					data-options="iconCls:'icon-undo',plain:true"></a>
			</div>
			<table id="dg" class="easyui-datagrid" style="width:100%;height:410px"
				url='json/alista_getdata.php'
				toolbar="#tbdatos"
				data-options="			
	                singleSelect: true,
	                fitColumns:true,
	                onClickRow: onClickRow,
	                rowStyler: function(index,row){
	                    if (row.nivel2 == 0){
	                        return 'background-color:#cffccf;font-weight:bold;';
	                    }
                	}
	            ">
				<thead>
					<tr>
						<th data-options="field:'id',width:10,hidden:true">id</th>
						<th data-options="field:'nivel1',width:30">#</th>
						<th data-options="field:'nivel2',width:20,styler:cellStyler">#</th>
						<th data-options="field:'detalle',width:300">detalle</th>
						<th data-options="field:'digitar',width:30,align:'center', 
							editor:{type:'checkbox',options:{on:'S',off:'N'}}">res</th>
					</tr>
				</thead>
			</table>
		</div>
		<div id="alista-buttons">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok"
			   onclick="grabarAlista()" style="width:90px">OK</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" 
			   onclick="cerrar('#dlgalista')" style="width:90px">Cancelar</a>
		</div>
	</div>


	<!-- pagina: ASISTENCIA /////////////////////////////////////////////////////////////////////// -->
	<div id="asistencia" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">Asistencia</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>
		</header>

		<div id="toolbasistencia">
			<div class="fitem">
				<input id="icolegio" name="icolegio" class="easyui-combobox" 
					   url="json/combocolegios.php" style="width:180px"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">
				<input id="iruta" name="iruta" class="easyui-textbox" style="width:50px"
					   data-options="disabled:true">
				<input id="ijornada" name="ijornada" class="easyui-combobox" 
					   url="json/combojornadas.php" style="width:65px"
					   data-options="editable:false,valueField:'codigo',textField:'nombre'">
			</div>
			<div class="fitem">
				<input id="ifecha" name="ifecha" class="easyui-datebox" style="width:32%"
					data-options="disabled:false,editable:false,formatter:myformatter,parser:myparser">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" 
					style="margin-left:5%"
					onclick="validarAsistencia()"></a>
				<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove'" 
					style="margin-left:2%;width:30px; height:30px" onclick="borrarAsistencia()">
				</a>				
				<a href="javascript:void(0)" class="easyui-linkbutton"
					style="margin-left:2%"
					onclick="reject()"
					data-options="iconCls:'icon-undo',plain:true"></a>
				<a href="javascript:void(0)" class="easyui-linkbutton"
					style="margin-left:5%"
					onclick="addUser()"
					data-options="iconCls:'icon-man',plain:true"></a>
			</div>
		</div>
		
		<table id="dgasistencia" class="easyui-datagrid" 
			style="font-family:Arial;width:100%;height:500px"
			url="json/asistencia_getdata.php"
			toolbar="#toolbasistencia"
			data-options="
				singleSelect: true,
				fitColumns:true,
				rownumbers: true,
				onClickRow: onClickRow,
                rowStyler: function(index,row){
                    if (row.asis != 'X'){
                        return 'background-color:#cffccf;font-weight:bold;';
                    }
            	}				
			">
			<thead>
				<tr>					
					<th data-options="field:'id',width:50,hidden:true">Id</th>					
					<th data-options="field:'fecha',width:100,hidden:true">Fecha</th>					
					<th data-options="field:'jornada',width:50,hidden:true">Jornada</th>					
					<th data-options="field:'codigo',width:50">Cod</th>					
					<th data-options="field:'nombre',width:300">Nombre</th>
					<th data-options="field:'asis',width:50,hidden:true">Obs</th>
					<th data-options="field:'asistencia',width:50,align:'center', 
						editor:{type:'checkbox',options:{on:'S',off:'N'}}">Asis</th>
				</tr>
			</thead>
		</table>
		<div class="fitem">
	        <!-- botones de consulta de S,N o todos /////////////////////////////////////////// -->
	        <a href="javascript:void(0)" class="easyui-linkbutton"  
				style="background:#F2F5A9;color:#000;border-color:#000;width:10%;height:25px;margin-left:30%"
				onclick="mostrarAsistencia('*')"
				data-options="">*</a>
	        <a href="javascript:void(0)" class="easyui-linkbutton"  
				style="background:#F2F5A9;color:#000;border-color:#000;width:10%;height:25px;margin-left:2%"
				onclick="mostrarAsistencia('N')"
				data-options="">N</a>
	        <a href="javascript:void(0)" class="easyui-linkbutton"  
				style="background:#F2F5A9;color:#000;border-color:#000;width:10%;height:25px;margin-left:2%"
				onclick="mostrarAsistencia('S')"
				data-options="">S</a>
		</div>

		<!-- DIALOG: entrada de datos de nuevo alumno ///////////////////////////////////////////// -->
		<div id="dlgnuevo" class="easyui-dialog" title="<font color=white>NUEVO</font>"
			data-options="modal:true,closable:true"
			style="font-family:Arial;margin:0 0 0 0;width:99%;padding:5px"
			closed="true" buttons="#add-buttons">
			<div class="fitem">
				<input id="nnombre" name="nnombre" class="easyui-textbox" style="width:280px"
					   data-options="disabled:true">
			</div>			
			<div class="fitem">
				<input id="ncodigos" name="ncodigos" class="easyui-combobox"
					   url="" style="width:100px"
					   data-options="valueField:'nombre',textField:'codigo'">
			</div>
		</div>

		<!-- TAREA -->
		<div id="dlgobs" class="easyui-dialog" title="<font color=white>OBSERVACION</font>"
			data-options="modal:true,closable:true"
			style="font-family:Arial;margin:0 0 0 0;width:99%;padding:5px"
			closed="true" buttons="#add-buttons-obs">
			<div class="fitem">
				<input id="vobserva" name="vobserva" class="easyui-textbox" style="width:280px"
					   data-options="disabled:true">
			</div>			
		</div>

		<div id="add-buttons">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok"
			   onclick="validarCodigo()" style="width:90px">OK</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" 
			   onclick="cerrar('#dlgnuevo')" style="width:90px">Cancelar</a>
		</div>
		<!-- TAREA -->
		<div id="add-buttons-obs">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" 
			   onclick="cerrar('#dlgobs')" style="width:90px">Cerrar</a>
		</div>
	</div>	
	<!-- pagina: CLIMA /////////////////////////////////////////////////////////////////////// -->
	<div id="clima" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">Clima</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>

		</header>

		<table>
			<div id="TTPW_czxwB">El tiempo - Tutiempo.net</div>
			<script type="text/javascript" src="https://www.tutiempo.net/s-widget/pw/fczxwB/C10/"></script>
			<!-- <a class="weatherwidget-io" href="https://forecast7.com/es/4d81n75d69/pereira/" data-label_1="PEREIRA" data-icons="Climacons Animated" data-days="3" data-theme="clear" >PEREIRA</a>
			<script>
			!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
			</script> -->
		</table>
	</div>

	<!-- pagina: VIAS /////////////////////////////////////////////////////////////////////// -->
	<div id="via" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">Estado de las vías</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>

		</header>

		<table>
			<iframe src="https://embed.waze.com/es/iframe?zoom=15&lat=4.807370&lon=-75.691552&ct=livemap"
            width="100%" height="100%"></iframe>
		</table>
	</div>

	<!-- pagina: REVISION MANTENIMIENTO /////////////////////////////////////////////////////////////// -->
	<div id="mantenimiento" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">Mantenimientos</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>            
		</header>

		<div id="toolbarmantenimiento">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" 
				style="margin-left:1%; margin-top: 1%"
				onclick="newMantenimiento()">Añadir</a>
		</div>

		<table id="dgmantenimiento" class="easyui-datagrid" style="width:100%;height:500px"
			url="json/mantenimiento_resumen.php"
			toolbar="#toolbarmantenimiento"
			pagination="false"
			rownumbers="false" fitColumns="false" singleSelect="true">
			<thead>
				<tr>					
	            	<th field="interno" width="40px">int</th>					
	            	<th field="fecha" width="70px">fecha</th>					
					<th field="taller" width="270px" align="center">taller</th>
					<th field="km" width="50px" align="center">km</th>
					<th field="tipo" width="70px" align="center">tipo</th>
					<th field="mecanico" width="200px" align="center">mecanico</th>
					<th field="descripcion" width="320px" align="center">descripcion</th>
				</tr>
			</thead>
		</table>

		<div id="dlgMantenimiento" class="easyui-dialog"title="<font color=white>DATOS</font>"
			data-options="modal:true,closable:true"
			style="font-family:Arial;margin:0 0 0 0;width:100%;height: 340px"
			closed="true" buttons="#mantenimiento-buttons">				
				<form id="fmMantenimiento" method="post" novalidate>	
					<div style="float:left; margin-top: 2%; margin-left: 11.5%">
						<label>Fecha:</label>
						<input id="fecha" name="fecha" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser">
					</div>

					<div style="float:left; margin-top: 2%; margin-left: 13%">
						<label>Taller:</label>
						<input id="taller" name="taller" class="easyui-textbox">
					</div>

					<div style="float:left; margin-top: 2%; margin-left: 17%">
						<label>Km:</label>
						<input id="km" name="km" class="easyui-numberbox" value="1234567" data-options="groupSeparator:','">
					</div>

					<div style="float:left; margin-top: 2%; margin-left: 15.5%">
						<label>Tipo:</label>
						<select id="tipo" name="tipo"  class="easyui-combobox" style="width: 172px;">
							<option value="correctivo">Correctivo</option>
							<option value="preventivo">Preventivo</option>
						</select> 
					</div>

					<div style="float:left; margin-top: 2%; margin-left: 6%">
						<label>Mecánico:</label>
						<input id="mecanico" name="mecanico" class="easyui-textbox">
					</div>

					<div style="float:left; margin-top: 2%; margin-left: 2%">
						<label>Descripción:</label>
						<input id="descripcion" name="descripcion" class="easyui-textbox" multiline="true" style="height: 62.5px; margin-left: 1%;">
						</select> 
					</div>
				</form>
			</div>

			<div id="mantenimiento-buttons">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok"
				   onclick="saveMantenimiento()" style="width:90px">OK</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" 
				   onclick="cerrar('#dlgMantenimiento')" style="width:90px">Cancelar</a>
			</div>
		</div>

		<!-- pagina: RECONOCIMIENTO DE RUTA //////////////////////////////////////////////////////// -->
	<div id="reconocruta" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">Ruta</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>            
		</header>

		<div id="toolbreconocruta">
			<input id="rcolegio" name="rcolegio" class="easyui-combobox" 
				   url="json/combocolegios.php" style="width:180px"
				   data-options="editable:false,valueField:'codigo',textField:'nombre'">
			<input id="rruta" name="rruta" class="easyui-textbox" style="width:50px"
				   data-options="disabled:true">
			<input id="rrfecha" name="rrfecha" class="easyui-datebox" style="width:32%"
					data-options="disabled:false,editable:false,formatter:myformatter,parser:myparser">

			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" 
				onclick="validarReconocRuta()"></a>

			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" 
				onclick="editReconocRuta()"></a>
			<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove'" 
				style="margin-left:2%;width:30px; height:30px" onclick="borrarReconocRuta()">
			</a>
		</div>

		<div id="dlgreconocruta" class="easyui-dialog" title="<font color=white>DATOS</font>" closed="true" buttons="#dlg-buttons" data-options="modal:true,closable:true" style="font-family:Arial;margin:0 0 0 0;width:100%;height: 490px">
		<form id="fm" method="post" novalidate>
			
			<input id="rfecha" name="rfecha" type="hidden" class="easyui-datebox" style="height: 0px;" 
			data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
			
			<div class="fitem">
				<label>Nombre</label>
				<input id="nombre" name="nombre" class="easyui-textbox" disabled="true">
			</div>
			<div class="fitem">
				<label>Grado</label>
				<input id="grado" name="grado" class="easyui-textbox" disabled="true">
			</div>
			<div class="fitem">
				<label>Dirección</label>
				<input id="direccion" name="direccion" class="easyui-textbox">
			</div>
			<div class="fitem">
				<label>Barrio</label>
				<input id="barrio" name="barrio" class="easyui-textbox">
			</div>
			<div class="fitem">
				<label>Celular</label>
				<input id="celular" name="celular" class="easyui-textbox">
			</div>
			<div class="fitem">
				<label>Presentación</label>
				<select id="presentacion" name="presentacion" class="easyui-combobox" prompt="Seleccione" style="width: 164px;">
					<option value="personal">Personal</option>
					<option value="telefonico">Teléfonico</option>
				</select> 
			</div>
			<div class="fitem">
				<label>Recibe</label>
				<input id="nombrerecibe" name="nombrerecibe" class="easyui-textbox" prompt="Nombre quien recibe">
			</div>
			<div class="fitem">
				<label>Recogida</label>
				<input id="horarecogida" name="horarecogida" class="easyui-timespinner" data-options="label:'Select Time:',labelPosition:'top'">
			</div>
			<div class="fitem">
				<label>Regreso</label>
				<input id="horaregreso" name="horaregreso" class="easyui-timespinner" data-options="label:'Select Time:',labelPosition:'top'">
			</div>

		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveReconocRuta()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgreconocruta').dialog('close')" style="width:90px">Cancelar</a>
	</div>
		<!-- DATAGRID RECONOCIMIENTO RUTA //////////////////////////////////////////////////////////// -->
	<table id="dgreconocruta" class="easyui-datagrid"
		style="width:100%;height:500px"
		url="json/reconocruta_getdata.php" rownumbers="true"
		toolbar="#toolbreconocruta"
		singleSelect="true" pagination="false" showFooter="false">

		<thead>
			<tr>						
				<th field="id", width="50" hidden="true">Id</th>
				<th field="nombre", width="200" >Nombre</th>		
				<th field="grado", width="42" >Grado</th>	
				<th field="direccion", width="250" >Dirección</th>	
				<th field="barrio", width="180" >Barrio</th>	
				<th field="celular", width="74" >Celular</th>	
				<th field="presentacion", width="70" >Presentación</th>	
				<th field="nombrerecibe", width="200" >Nombre quien recibe</th>	
				<th field="horarecogida", width="60" >Recogida</th>	
				<th field="horaregreso", width="60" >Regreso</th>	
			</tr>
		</thead>
	</table>
	</div>

	<!-- pagina: CERTIFICADO LABORAL ////////////////////////////////////////////////////////////// -->
	<div id="certificado" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">Certificado</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>
		</header>

		<div class="ritem" style="margin-top:20px;margin-bottom:20px;text-align:center">
			<select id="xcertificado" name="xcertificado" class="easyui-combobox" style="width:200px">
			    <option value="1" selected="false">Elija el tipo de certificado</option>
			    <option value="2">Certificado - ANTIGUO</option>
			    <option value="3">Certificado - VIGENTE CON SALARIO</option>
			    <option value="4">Certificado - VIGENTE SIN SALARIO</option>
			</select>
		</div>

		<div class="ritem" style="text-align:center">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="generarCertificado()"
				data-options="iconAlign:'left'"
				style="width:80px">generar</a>
		</div>
	</div>

	<!-- pagina: CONTRATOS /////////////////////////////////////////////////////////////////// -->
	<div id="contratos" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">Contratos</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>
		</header>

		<div id="toolbarcontrato">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" 
				style="margin-left:1%; margin-top: 1%"
				onclick="newContrato()">Añadir Contrato</a>

			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" 
				style="margin-left:18%; margin-top: 1%"
				onclick="newExtracto()">Añadir Extracto</a>

			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" 
				style="margin-left:18%; margin-top: 1%"
				onclick="newPasajeros()">Añadir Pasajeros</a>
		</div>

		<table id="dgContrato" class="easyui-datagrid" style="width:100%;height:500px"
			url="json/contrato_resumen.php"
			toolbar="#toolbarcontrato"
			pagination="false"
			rownumbers="false" fitColumns="false" singleSelect="true">
			<thead>
				<tr>					
	            	<th field="contrato" width="30px">No</th>					
	            	<th field="cliente" width="150px">Cliente</th>					
					<th field="iniciocontrato" width="70px" align="center">Inicio</th>
					<th field="fincontrato" width="70px" align="center">Fin</th>
				</tr>
			</thead>
		</table>

		<div id="dlgContrato" class="easyui-dialog"title="<font color=white>CONTRATO</font>"
			data-options="modal:true,closable:true"
			style="font-family:Arial;margin:0 0 0 0;width:100%;height: 490px"
			closed="true" buttons="#contrato-buttons">				

			<form id="fmContrato" method="post" novalidate>	
				
				<div class="fitem">
					<label>No</label>
					<input id="contrato" name="contrato" class="easyui-numberbox" data-options="disabled:true">
				</div>

				<div class="fitem">
					<label>Objeto Contrato:</label>
					<input id="objetocontrato" name="objetocontrato" class="easyui-textbox" data-options="disabled:true" style="width:164px">
						
				</div>

				<div class="fitem">
					<label>Inicio:</label>
					<input id="iniciocontrato" name="iniciocontrato" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">

					<label>Fin:</label>
					<input id="fincontrato" name="fincontrato" class="easyui-datebox" data-options="disabled:false,editable:true,formatter:myformatter,parser:myparser">
				</div>
				<br>

				<div class="ftitle">INFORMACIÓN CLIENTE</div>
					<div class="fitem">
						<label>Cliente:</label>
						<input id="cliente" name="cliente" class="easyui-textbox">

						<label>NIT/CC:</label>
						<input id="nit" name="nit" class="easyui-textbox">
					</div>

				<div class="ftitle">INFORMACIÓN RESPONSABLE</div>
					<div class="fitem">
						<label>Responsable:</label>
						<input id="responsable" name="responsable" class="easyui-textbox">

						<label>N° Documento:</label>
						<input id="cedularesponsable" name="cedularesponsable" class="easyui-textbox">
					</div>

					<div class="fitem">
						<label>Direccion</label>
						<input id="direccion2" name="direccion2" class="easyui-textbox">

						<label>Telefono</label>
						<input id="telefono" name="telefono" class="easyui-numberbox">
					</div>

					<div class="fitem">
						<label>Pasajero</label>
						<input id="nombrepasajero" name="nombrepasajero[]" class="easyui-textbox">

						<label>Cedula</label>
						<input id="cedulapasajero" name="cedulapasajero[]" class="easyui-textbox">
					</div>

					<div class="btn-der">
						<input type="submit" name="insertar" value="Insertar Alumno" class="btn btn-info"/>
						<button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>

					</div>

					<!-- <div id="inputs" class="fitem">
						<label>Pasajero 1</label>
						<input id="pasajero" name="pasajero" class="easyui-textbox">
					</div>

					<input type="button" id="agrega" value="+"> -->


				    <!-- <div id="inputs" class="fitem">
						<label>Pasajero 1</label>
						<input id="pasajero" name="pasajero" class="easyui-textbox">
					</div>

					<input type="button" id="agrega" value="+"> -->




					<!-- <div style="margin:20px 0;">
				        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="cloneDatebox()">Clone</a>
				    </div>

			        <div style="margin-bottom:20px">
			        	<label>Telefono</label>

			            <input id="dt" class="easyui-datebox" label="Select Date:" style="width:100%;">
			        </div>
			        <div id="cc" style="margin-top:10px"></div>
			
				    <script type="text/javascript">
				        function cloneDatebox(){
				            var dt = $('<input>').appendTo('#cc');
				            dt.datebox('cloneFrom', '#dt');
				        }
				    </script> -->
			</form>

			<?php

				//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
				if(isset($_POST['insertar']))

				{


				$items1 = ($_POST['idalumno']);
				$items2 = ($_POST['nombre']);
				$items3 = ($_POST['carrera']);
				$items4 = ($_POST['grupo']);
				 
				///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
				while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
				    $item1 = current($items1);
				    $item2 = current($items2);
				    $item3 = current($items3);
				    $item4 = current($items4);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $carr=(( $item3 !== false) ? $item3 : ", &nbsp;");
				    $gru=(( $item4 !== false) ? $item4 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='('.$id.',"'.$nom.'","'.$carr.'","'.$gru.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql = "INSERT INTO alumnos (id_alumno, nombre, carrera, grupo) 
					VALUES $valoresQ";

					
					$sqlRes=$conexion->query($sql) or mysql_error();

				    
				    // Up! Next Value
				    $item1 = next( $items1 );
				    $item2 = next( $items2 );
				    $item3 = next( $items3 );
				    $item4 = next( $items4 );
				    
				    // Check terminator
				    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
    
				}
		
				}

			?>

			<div id="contrato-buttons">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok"
				   onclick="saveContrato()" style="width:90px">OK</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" 
				   onclick="cerrar('#dlgContrato')" style="width:90px">Cancelar</a>
			</div>
		</div>

		<div id="dlgExtracto" class="easyui-dialog" data-options="modal:true" title="<font color=white>EXTRACTO</font>" style="font-family:Arial;margin:0 0 0 0;width:100%;height: 490px" closed="true" buttons="#dlg-buttons-extracto">
			<form id="fmExtracto" method="post" novalidate>

				<div class="ftitle">N° EXTRACTO</div>
				<div class="fitem">
					<label >Extracto:</label>
					<input id="extracto" name="extracto" class="easyui-textbox" data-options="editable:false">

					<label >N° Contrato:</label>
					<input id="ncontrato" name="contrato" class="easyui-textbox" data-options="editable:false">

					<label>Usuario:</label>
					<input id="creador" name="usuario" class="easyui-textbox" data-options="editable:false" style="width:164px">
				</div>
				<br>

				<div class="ftitle">INFORMACIÓN VEHÍCULO</div>
				<div class="fitem">
					<label >Interno:</label>
					<input id="interno" name="interno" class="easyui-textbox" data-options="editable:false">

					<label >Modelo:</label>
					<input name="modelo" class="easyui-textbox" data-options="editable:false">
				</div>

				<div class="fitem">
					<label >Marca:</label>
					<input name="marca" class="easyui-textbox" editable="false" data-options="editable:false">

					<label >Clase:</label>
					<input name="clase" class="easyui-textbox" editable="false" data-options="editable:false">
				</div>

				<div class="fitem">
					<label >Placa:</label>
					<input name="placa" class="easyui-textbox" editable="false" data-options="editable:false">

					<label >Tarjeta Operación:</label>
					<input name="tarjetaoperacion" class="easyui-textbox" data-options="editable:false">
				</div>
				<br>

				<div class="ftitle">DOCUMENTOS</div>
				<div class="fitem">
					<label>Soat:</label>
					<input name="iniciosoat" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">

					<label></label>
					<input id="finsoat" name="finsoat" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">
				</div>

				<div class="fitem">
					<label>Tecnico Mecanica:</label>
					<input name="iniciotecmecanica" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">

					<label></label>
					<input id="fintecmecanica" name="fintecmecanica" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">
				</div>

				<div class="fitem">
					<label>Tarjeta Operacion:</label>
					<input name="iniciotarjetaoperacion" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">

					<label></label>
					<input id="fintarjetaoperacion" name="fintarjetaoperacion" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">
				</div>

				<div class="fitem">
					<label>Poliza Contractual:</label>
					<input name="iniciopolizacontrac" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">

					<label></label>
					<input id="finpolizacontrac" name="finpolizacontrac" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">
				</div>
				
				<div class="fitem">
					<label>Poliza Extracontrac:</label>
					<input name="iniciopolizaextra" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">

					<label></label>
					<input id="finpolizaextra" name="finpolizaextra" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">
				</div>
				
				<div class="fitem">
					<label>Preventiva:</label>
					<input name="iniciopreventiva" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">

					<label></label>
					<input id="finpreventiva" name="finpreventiva" class="easyui-datebox" data-options="disabled:true,editable:false,formatter:myformatter,parser:myparser">
				</div>
				<br>

				<div class="ftitle">INFORMACIÓN CLIENTE</div>
				<div class="fitem">
					<label>NIT/CC:</label>
					<input name="nit" class="easyui-textbox">

					<label>Cliente</label>
					<input name="cliente" class="easyui-textbox">
				</div>
				<br>

				<div class="ftitle">INFORMACIÓN RESPONSABLE</div>
				<div class="fitem">
					<label>Responsable:</label>
					<input name="responsable" class="easyui-textbox">

					<label>Cedula</label>
					<input id="cedularesponsablee" name="cedularesponsable" class="easyui-textbox">
				</div>

				<div class="fitem">
					<label>Direccion</label>
					<input name="direccion" class="easyui-textbox">

					<label>Telefono</label>
					<input name="telefono" class="easyui-textbox">
				</div>
				<br>

				<div class="ftitle">INFORMACIÓN GENERAL</div>
				<div class="fitem">
					<label>Modalidad</label>
					<select id="modalidad" name="modalidad" class="easyui-combobox">
						<option></option>
					    <option value="CONSORCIO">CONSORCIO</option>
					    <option value="CONVENIO">CONVENIO</option>
					    <option value="PASAPORTE">PASAPORTE</option>
					    <option value="UNION TEMPORAL">UNION TEMPORAL</option>
					</select>

					<label>Con:</label>
					<input name="empresaafiliadora" class="easyui-textbox">
				</div>

				<div class="fitem">
					<label>Fecha Inicio:</label>
					<input id="fechainicio" name="fechainicio" class="easyui-datebox" data-options="disabled:false,editable:false,formatter:myformatter,parser:myparser">

					<label>Fecha Fin:</label>
					<input id="fechafin" name="fechafin" class="easyui-datebox" data-options="disabled:false,editable:false,formatter:myformatter,parser:myparser">
				</div>

				<div class="fitem">
					<label>Origen:</label>
					<input id="origen" name="origen" class="easyui-combobox" 
						url="json/comboorigen.php"
						data-options="disabled:false,editable:true,valueField:'origen',textField:'origen'">

					<label>Destino:</label>
					<input id="destino" name="destino" class="easyui-combobox" 
						url="json/combodestino.php"
						data-options="disabled:false,editable:true,valueField:'destino',textField:'destino'">
				</div>

				<div class="fitem">
					<label>Recorrido</label>
					<input name="recorrido" class="easyui-textbox" multiline="true" style="height: 66px">
				</div>

				<div class="fitem">
					<label>Objeto Contrato</label>
					<input name="objetocontrato" class="easyui-textbox" data-options="editable:false">
				</div>
				<br>

				<div class="ftitle">INFORMACIÓN CONDUCTORES</div>
				<div class="fitem">
					<label>Conductor 1:</label>
					<input id="conductor1" name="conductor1" class="easyui-textbox" data-options="editable:false">

					<label>Cedula 1:</label>
					<input id="cedulaconductor1" name="cedulaconductor1" class="easyui-textbox" data-options="editable:false">

					<label>Vigencia:</label>
					<input id="vigencialicencia1" name="vigencialicencia1" class="easyui-textbox" data-options="editable:false">
				</div>
			</form>
		</div>
		<div id="dlg-buttons-extracto">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveExtracto()" style="width:90px">OK</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgExtracto').dialog('close')" style="width:90px">Cancelar</a>
		</div>
	</div>

	<!-- pagina: REVISION MANTENIMIENTO /////////////////////////////////////////////////////////////// -->
	<div id="extractos" class="easyui-navpanel" data-options="bodyCls:'hb'">
		<header>
			<div class="m-toolbar">
				<span class="m-title">Extractos</span>
			</div>
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" 
                   data-options="plain:true,outline:true,back:true"
                   style="color:#fff" >Atras</a>
            </div>
	        <div class="m-right">
	            <a href="javascript:toggleFullScreen(0)" class="easyui-linkbutton m-next" plain="true" 
	            	style="color:#fff" outline="true">Full
	            </a>
	        </div>            
		</header>

		<table id="dgExtractos" class="easyui-datagrid" style="width:100%;height:500px"
			url="json/extractos_getdata.php"
			pagination="false"
			rownumbers="false" fitColumns="false" singleSelect="true">
			<thead>
				<tr>					
	            	<th field="extracto" width="40px">Extracto</th>					
	            	<th field="contrato" width="70px">Contrato</th>					
					<th field="interno" width="270px" align="center">Interno</th>
			</thead>
		</table>
	</div>


	<div id="dlgPasajeros" class="easyui-dialog"title="<font color=white>PASAJEROS</font>"
		data-options="modal:true,closable:true"
		style="font-family:Arial;margin:0 0 0 0;width:100%;height: 490px"
		closed="true" buttons="#pasajero-buttons">				

		<form id="fmPasajeros" action="pax_save" method="post">	
			
			<!-- <div id="inputs" class="fitem">
				<label>Pasajero 1</label>
				<input id="pasajero" name="pasajero" class="easyui-textbox">
			</div>

			<input type="button" id="agrega" value="+"> -->

		</form>

		<div id="pasajero-buttons">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok"
			   onclick="savePasajeros()" style="width:90px">OK</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" 
			   onclick="cerrar('#dlgPasajeros')" style="width:90px">Cancelar</a>
		</div>
	</div>



	<script type="text/javascript">
		function generarCertificado(){
			var wcertificado = getVar('xcertificado',3);
			
			if(wcertificado==2){
				certificadoPDF(2);

			}else if(wcertificado==3){
				certificadoPDF(3);

			}else if(wcertificado==4){
				certificadoPDF(4);

			}

		}

		function certificadoPDF(pcual){

			// var xinterno = row['interno'];	
			var xinterno = getVar('suser',0);		

			var params  = 'width='+screen.width;
    		params += ', height='+screen.height;
    		params += ', top=0, left=0'
    		params += ', fullscreen=yes';    		

    		if(pcual==2){
    			window.open ("certificado_antiguo.php?interno="+xinterno, params);

    		}else if(pcual==3){
    			window.open ("certificado_vigenteSalario.php?interno="+xinterno, params);

    		}else if(pcual==4){
    			window.open ("certificado_vigenteSinSalario.php?interno="+xinterno, params);

    		}

		}

		function reglamentoInterno(){
		

			var params  = 'width='+screen.width;
    		params += ', height='+screen.height;
    		params += ', top=0, left=0'
    		params += ', fullscreen=yes';    		

    		window.open ("");

    		

		}
	</script>

	<!-- SCRIPT GENERALES ///////////////////////////////////////////////////////////////////////// -->	

	<!-- SCRIT edicion de la grilla /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
        var editIndex = undefined;
        function endEditing(){
            if (editIndex == undefined){return true}

            // edicion para dg/dg-alistamiento
        	var reg = $("#dg").datagrid('getSelected');
        	if(reg){
        		var xdg = '#dg';
        	}else {        		
        		var reg = $("#dgasistencia").datagrid('getSelected');
        		if(reg){
        			var xdg = '#dgasistencia';
        		}
        	}        	

            if ($(xdg).datagrid('validateRow', editIndex)){
                $(xdg).datagrid('endEdit', editIndex);
                editIndex = undefined;
                return true;
            } else {
                return false;
            }

        }

        function updateTabla(pindex){
        	accept();
        	$('#dg').datagrid('selectRow', pindex);
        	row = $("#dg").datagrid('getSelected');
        	if(row){
        		var xid = row['id'];
        		var xdigitar = row['digitar'];

				var xaccion = 'U';
				var xtabla = 'tbalistatmp';

				var xcamposActualizar = ['digitar'];
				var xvaloresActualizar = [xdigitar];

				var xcamposCondicion = ['id'];
				var xvaloresCondicion = [xid];

				$.post('json/myFileDB.php',
					{accion:xaccion, tabla:xtabla, camposActualizar:xcamposActualizar, valoresActualizar:xvaloresActualizar,
					 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion},
					function(result){
						if(!result.success){
							alert(result.sql);
							// $.messager.alert('Mensaje','fallo ACTUALIZACION!!!');
						}
					},
				'json');
				
        	}
        	
        }

        function updateTablaDos(pindex){
        	accept();
        	$('#dgasistencia').datagrid('selectRow', pindex);
        	row = $("#dgasistencia").datagrid('getSelected');
        	if(row){
        		var xid = row['id'];
        		var xasistencia = row['asistencia'];

				var xaccion = 'U';
				var xtabla = 'tbasistencia';

				var xcamposActualizar = ['asistencia'];
				var xvaloresActualizar = [xasistencia];

				var xcamposCondicion = ['id'];
				var xvaloresCondicion = [xid];

				$.post('json/myFileDB.php',
					{accion:xaccion, tabla:xtabla, camposActualizar:xcamposActualizar, valoresActualizar:xvaloresActualizar,
					 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion},
					function(result){
						if(!result.success){
							alert(result.sql);
							// $.messager.alert('Mensaje','fallo ACTUALIZACION!!!');
						}
					},
				'json');
				
        	}
        	
        }

        function onClickRow(index){
        	var row = $("#dg").datagrid('getSelected');
        	if(row){
	        	if(row['nivel2']!=0){
	        		// alert(editIndex+'-'+index);
	        		// el indice anterior que necesito esta en editIndex
	        		// para actualizar la tabla
	        		updateTabla(editIndex);

		            if (editIndex != index){
		                if (endEditing()){	                	
		                    $('#dg').datagrid('selectRow', index)
		                            .datagrid('beginEdit', index);
		                    editIndex = index;
		                } else {
		                    $('#dg').datagrid('selectRow', editIndex);
		                }
		            }
				}
			}else {
				var reg = $("#dgasistencia").datagrid('getSelected');

				if(reg['asis']=='X'){
					updateTablaDos(editIndex);

		            if (editIndex != index){
		                if (endEditing()){	                	
		                    $('#dgasistencia').datagrid('selectRow', index)
		                            .datagrid('beginEdit', index);
		                    editIndex = index;
		                    
		                } else {
		                    $('#dgasistencia').datagrid('selectRow', editIndex);
		                }
		            }
		        //TAREA
		        }

		        // else{
		        // 	$('#dgasistencia').onclick(mostrarObs());
		        // }  

			}
        }

        function removeit(){
            if (editIndex == undefined){return}
            $('#dg').datagrid('cancelEdit', editIndex)
                    .datagrid('deleteRow', editIndex);
            editIndex = undefined;
        }

        function accept(pdg){        	
        	if(pdg=='dg'){
        		var xdg = '#dg';
        	}else {
        		var xdg = '#dgasistencia';
        	}

            if (endEditing()){
                $(xdg).datagrid('acceptChanges');
            }
        	
        }

        function reject(){
        	var row = $("#dg").datagrid('getSelected');
        	if(row){
        		$('#dg').datagrid('rejectChanges');
        	}else {
        		$('#dgasistencia').datagrid('rejectChanges');
        	}

            editIndex = undefined;
        }	
	</script>

	<!-- SCRIPT reconocimiento de ruta /////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
    	$("#rcolegio").combobox({
    		onSelect: function(){
    			traerRutaReconoc();
    			// mostrarAsistencia();
    			// listarCodigos();
    		}
    	});
	</script>	

	<script type="text/javascript">
		function traerRutaReconoc(){
    		var xcolegio = $("#rcolegio").combobox('getText');
    		var xinterno = getVar('suser',0);

    		setVar('rruta',0,'');

    		var xaccion = 'C';
    		var xtabla = 'tbdatosveh';

    		var xcamposCondicion = ['colegio','interno'];
    		var xvaloresCondicion = [xcolegio,xinterno];

    		var xordenar = 'id';

			$.post('json/myFileDB.php',
				{accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion,
				 ordenar:xordenar},
				function(result){
					if(result.success){
						var row = result.items;
						xruta = row[0]['ruta'];
						setVar('rruta',0,xruta);

					}else {
						$.messager.alert('Mensaje','ruta NO EXISTE!!!');

					}
				},
			'json');
		}

		function validarReconocRuta(){
			var xinterno = getVar('suser',0);
			var xcolegio = $("#rcolegio").combobox('getText');
			var xruta = getVar('rruta',0);
			var xfechageneral = getVar('rrfecha', 2)


			var xaccion = 'C';
			var xtabla = 'tbreconocruta';

			var xcamposCondicion = ['interno','colegio','ruta','fechageneral'];
			var xvaloresCondicion = [xinterno,xcolegio,xruta,xfechageneral];

			var xordenar = 'id';

			$.post('json/myFileDB.php', 
				{accion:xaccion,tabla:xtabla,camposCondicion:xcamposCondicion,valoresCondicion:xvaloresCondicion,
				 ordenar:xordenar}, 
				 function(result){
				 	if(result.success){
				 		$.messager.alert("Mensaje","ya existe RECONOCIMIENTO!!!");
						verReconocRuta();
				 	}else {
				 		addReconocRuta();			 		
				 	}
				 }, 
			'json');

		}

		function addReconocRuta(){
			var xinterno = getVar('suser',0);
			var xcolegio = $("#rcolegio").combobox('getText');
			var xruta = getVar('rruta',0);
			var xfechageneral = getVar('rrfecha',2);

			$.post('json/reconocruta_data.php',
				{interno:xinterno, colegio:xcolegio, ruta:xruta, fechageneral:xfechageneral}, 
				function(result){
					if(result.success){
						$.messager.alert("Mensaje","reconocimiento creado EXITOSAMENTE!!!");
						verReconocRuta();
					}
				}, 
			'json');

		}

		function verReconocRuta(){
			var xinterno = getVar('suser',0);
			var xcolegio = $("#rcolegio").combobox('getText');
			var xruta = $("#rruta").combobox('getText');
			var xfechageneral = getVar('rrfecha',2)

			$("#dgreconocruta").datagrid('load',{
				interno:xinterno,
				colegio:xcolegio,
				ruta:xruta,
				fechageneral:xfechageneral
			})


		}

		function editReconocRuta(){
			// var fecha = getVar('rfecha',2);
			var row = $('#dgreconocruta').datagrid('getSelected');
			if (row){
				$('#dlgreconocruta').dialog('open');
				$('#fm').form('load',row);
				url = 'json/reconocruta_update.php?id='+row.id;
			}
		}

		function saveReconocRuta(){
			$('#fm').form('submit',{
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
						$('#dlgreconocruta').dialog('close');		// close the dialog
						$('#dgreconocruta').datagrid('reload');	// reload the user data
					}
				}
			});
		}

		function borrarReconocRuta(){
			$.messager.confirm('Confirm', 'esta seguro de BORRAR reconocimiento?', function(r){
				if (r){
					var xinterno = getVar('suser',0);
					var xcolegio = $("#rcolegio").combobox('getText');
					var xruta = getVar('rruta',0);
					var xfechageneral = getVar('rrfecha',2);

					var xaccion = 'D';
					var xtabla = 'tbreconocruta';

					var xcamposCondicion = ['interno','colegio','ruta','fechageneral'];
					var xvaloresCondicion = [xinterno,xcolegio,xruta,xfechageneral];

					$.post('json/myFileDB.php',
						{accion:xaccion,tabla:xtabla,camposCondicion:xcamposCondicion,
						 valoresCondicion:xvaloresCondicion},
						function(result){
						if (result.success){
							$.messager.alert("Mensaje","asistencia borrada EXITOSAMENTE!!!");
							verReconocRuta();

						} else {
							$.messager.alert('Mensaje', 'problemas!!!-borrar asistencia');
						}
					},'json');				
				}
			});

		}

	</script>
	<!-- SCRIPT asistencias /////////////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
    	$("#icolegio").combobox({
    		onSelect: function(){
    			traerRuta();
    			// mostrarAsistencia();
    			// listarCodigos();
    		}
    	});
	</script>

	<script type="text/javascript">
		function traerRuta(){
    		var xcolegio = $("#icolegio").combobox('getText');
    		var xinterno = getVar('suser',0);

    		setVar('iruta',0,'');

    		var xaccion = 'C';
    		var xtabla = 'tbdatosveh';

    		var xcamposCondicion = ['colegio','interno'];
    		var xvaloresCondicion = [xcolegio,xinterno];

    		var xordenar = 'id';

			$.post('json/myFileDB.php',
				{accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion,
				 ordenar:xordenar},
				function(result){
					if(result.success){
						var row = result.items;
						xruta = row[0]['ruta'];
						setVar('iruta',0,xruta);

					}else {
						$.messager.alert('Mensaje','ruta NO EXISTE!!!');

					}
				},
			'json');
		}

		function mostrarAsistencia(pcuales){
			var row = $("#dgasistencia").datagrid('getSelected');
			if(row){
				xindex = $("#dgasistencia").datagrid('getRowIndex',row);
				updateTablaDos(xindex);
			}

			var xinterno = getVar('suser',0);
			var xcolegio = $("#icolegio").combobox('getText');
			var xruta = getVar('iruta',0);
			var xfecha = getVar('ifecha',2);
			var xjornada = getVar('ijornada',3);

			$("#dgasistencia").datagrid('load',{
				interno:xinterno,
				colegio:xcolegio,
				ruta:xruta,
				fecha:xfecha,
				jornada:xjornada,
				cuales:pcuales
			});

		}

		function validarAsistencia(){
			var xinterno = getVar('suser',0);
			var xcolegio = $("#icolegio").combobox('getText');
			var xruta = getVar('iruta',0);
			var xfecha = getVar('ifecha',2);
			var xjornada = getVar('ijornada',3);

			var xaccion = 'C';
			var xtabla = 'tbasistencia';

			var xcamposCondicion = ['interno','colegio','ruta','fecha','jornada'];
			var xvaloresCondicion = [xinterno,xcolegio,xruta,xfecha,xjornada];

			var xordenar = 'id';

			$.post('json/myFileDB.php', 
				{accion:xaccion,tabla:xtabla,camposCondicion:xcamposCondicion,valoresCondicion:xvaloresCondicion,
				 ordenar:xordenar}, 
				 function(result){
				 	if(result.success){
				 		$.messager.alert("Mensaje","ya existe ASISTENCIA!!!");
						mostrarAsistencia('*');
				 	}else {
				 		addLista();			 		
				 	}
				 }, 
			'json');

		}

		function addLista(){
			var xinterno = getVar('suser',0);
			var xcolegio = $("#icolegio").combobox('getText');
			var xruta = getVar('iruta',0);
			var xfecha = getVar('ifecha',2);
			var xjornada = getVar('ijornada',3);

			$.post('json/asistencia_data.php',
				{interno:xinterno, colegio:xcolegio, ruta:xruta, fecha:xfecha, jornada:xjornada}, 
				function(result){
					if(result.success){
						$.messager.alert("Mensaje","asistencia creada EXITOSAMENTE!!!");
						mostrarAsistencia('*');
					}
				}, 
			'json');

		}

		function borrarAsistencia(){
			$.messager.confirm('Confirm', 'esta seguro de BORRAR asistencia?', function(r){
				if (r){
					var xinterno = getVar('suser',0);
					var xcolegio = $("#icolegio").combobox('getText');
					var xruta = getVar('iruta',0);
					var xfecha = getVar('ifecha',2);
					var xjornada = getVar('ijornada',3);

					var xaccion = 'D';
					var xtabla = 'tbasistencia';

					var xcamposCondicion = ['interno','colegio','ruta','fecha','jornada'];
					var xvaloresCondicion = [xinterno,xcolegio,xruta,xfecha,xjornada];

					$.post('json/myFileDB.php',
						{accion:xaccion,tabla:xtabla,camposCondicion:xcamposCondicion,
						 valoresCondicion:xvaloresCondicion},
						function(result){
						if (result.success){
							$.messager.alert("Mensaje","asistencia borrada EXITOSAMENTE!!!");
							mostrarAsistencia('*');

						} else {
							$.messager.alert('Mensaje', 'problemas!!!-borrar asistencia');
						}
					},'json');				
				}
			});

		}

		// funciones complementarias para adicion de codigos //////////////////////////////////////
		function addUser(){
			listarCodigos();
			pantalla('#dlgnuevo');
			setVar('nnombre',0,'');
		}

		function mostrarObs(){
			var row = $("#dgasistencia").datagrid('getSelected');
			if(row){				
				// alert('gg: ok ');	
				if(row['asis'] != 'X'){
					var xobserva = row['asis'];
					setVar('vobserva',0,xobserva);
					pantalla('#dlgobs');
				}
			}				

			
		}

		//CONTINUARRRRRRRRR

		function listarCodigos(){
			var xcolegio = $("#icolegio").combobox('getText');

			var xurl = "json/combocodigos.php?colegio="+xcolegio;

			$("#ncodigos").combobox({
				url:xurl	
			});

		}

		function validarCodigo(){
			var xcodigo = $("#ncodigos").combobox('getText');
			if(xcodigo==''){
				$.messager.alert("Mensaje","codigo VACIO!!!");
				return
			}else {				
				var xinterno = getVar('suser',0);
				var xcolegio = $("#icolegio").combobox('getText');
				var xruta = getVar('iruta',0);
				var xfecha = getVar('ifecha',2);
				var xjornada = $("#ijornada").combobox('getText');				

				if(xinterno=='' || xcolegio=='' || xruta=='' || xfecha=='' || xjornada==''){
					$.messager.alert("Mensaje","faltan DATOS!!!");
					return;
				}				

				contarCodigo(xcodigo,xinterno,xcolegio,xruta,xfecha,xjornada);
			}

		}

		function contarCodigo(xcodigo,xinterno,xcolegio,xruta,xfecha,xjornada){
			var xaccion = 'C';
			var xtabla = 'tbasistencia';

			var xcamposCondicion = ['codigo','interno','colegio','ruta','fecha','jornada'];
			var xvaloresCondicion = [xcodigo,xinterno,xcolegio,xruta,xfecha,xjornada];

			var xordenar = 'id';			

			$.post('json/myFileDB.php',
				{accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion,
				 ordenar:xordenar},
				function(result){
					if(result.success){
						$.messager.alert("Mensaje","codigo YA EXISTE!!!");
					}else {
						addCodigo(xcodigo,xinterno,xcolegio,xruta,xfecha,xjornada);
					}
				},
			'json');
		}

		function addCodigo(xcodigo,xinterno,xcolegio,xruta,xfecha,xjornada){
			$.messager.confirm('Confirm', 'esta seguro de ADICIONAR codigo?', function(r){
				if (r){
					var xaccion = 'I';
					var xtabla = 'tbasistencia';

					// nos faltaba el nombre compadres
					var xnombre = getVar('nnombre',0);

					var xcampos = ['codigo','interno','colegio','ruta','fecha','jornada','nombre','asistencia'];
					var xvalores = [xcodigo,xinterno,xcolegio,xruta,xfecha,xjornada,xnombre,'S'];

					$.post('json/myFileDB.php', 
						{accion:xaccion, tabla:xtabla, campos:xcampos, valores:xvalores},
						function(result){
						if (result.success){
							$.messager.alert("Mensaje","codigo adicionado EXITOSAMENTE!!!");
							mostrarAsistencia('*');
							cerrar('#dlgnuevo');
						} else {
							$.messager.alert('Mensaje', 'problemas!!!-grabar codigo');
						}
					},'json');
				}
			});

		}

	</script>

	<script type="text/javascript">
		$("#ifecha").datebox({
			onChange: function(){
				mostrarAsistencia('*');
			}
		});

    	$("#ncodigos").combobox({
    		onSelect: function(){
    			var xnombre = $("#ncodigos").combobox('getValue');
    			$("#nnombre").textbox('setValue',xnombre);

    		}
    	});

  //   	$("#dgasistencia").textbox({
		// 	onChange: function(){
		// 		var xobservacion = $("#dgasistencia").textbox('getValue');
		// 		$("#vobserva").textbox('setValue',xobservacion);
		// 	}
		// });

		$("#dgasistencia").datagrid({
			onDblClickRow: function(){
				mostrarObs();

			}
		})

	</script>

	<!-- SCRIPT mantenimientos ////////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
	// var url;
	function newMantenimiento(){			
		$('#dlgMantenimiento').dialog('open');
		$('#fmMantenimiento').form('clear');
	}

	function saveMantenimiento(){
		$.messager.confirm('Confirm', 'Esta seguro de GRABAR registro?', function(r){
			if (r){
				var xaccion = 'I';
				var xtabla = 'tbmantenimientos';

				var xinterno = getVar('suser',0);
				var xfecha = getVar('fecha',0);
				var xtaller = getVar('taller',0);
				var xkm = getVar('km',0);
				var xtipo = getVar('tipo',0);
				var xmecanico = getVar('mecanico',0);
				var xdescripcion = getVar('descripcion',0);

				var xcampos = ['interno','fecha','taller','km','tipo','mecanico','descripcion'];
				var xvalores = [xinterno,xfecha,xtaller,xkm,xtipo,xmecanico,xdescripcion];

				$.post('json/myFileDB.php',
					{accion:xaccion, tabla:xtabla, campos:xcampos, valores:xvalores},
					function(result){
					if (result.success){
						$.messager.alert('Mensaje', 'Registro grabado EXITOSAMENTE!!!');
						$('#dlgMantenimiento').dialog('close');

						refreshdg(xinterno);
						updateDgMtos();									
											
					} else {

						$.messager.alert('Mensaje', 'problemas!!!-grabar registro');
	
					}
				},'json');

			}
		});
	}	
	</script>

	<!-- SCRIPT contratos ////////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		
		function newContrato(){	
			url = 'json/pax_save.php';

			var xusuario = getVar('suser',0);

			$('#dlgContrato').dialog('open');
			$('#fmContrato').form('clear');
			maxRegistro();
			setVar('objetocontrato', 0, 'TRANSPORTE DE GRUPO ESPECIFICO DE USUARIOS PARTICULARES');

			setVar('creador', 0, xusuario);

			
		}

		function maxRegistro(){
			$.post('json/reg_maximo.php', 
				{}, 
				function(result){
					if(result.success){
						// var xmax = result.rmaximo;
						var xmax = parseInt(result.rmaximo) + 1;
						$("#contrato").textbox("setValue",xmax);
					}
					else{
						$.messager.alert('Mensaje','error Insertar tbcontratos');
					}
				}, 
			'json');
		}

		function saveContrato(){
			$.messager.confirm('Confirm', 'Esta seguro de GRABAR el contrato?', function(r){
				if (r){
					var xaccion = 'I';
					var xtabla = 'tbcontratos';

					// var xinterno = getVar('suser',0);
					// var xusuario = getVar('suser',0);
					var xcontrato = getVar('contrato',0);
					var xobjetocontrato = getVar('objetocontrato',0);
					var xiniciocontrato = getVar('iniciocontrato',0);
					var xfincontrato = getVar('fincontrato',0);
					var xcliente = getVar('cliente',0);
					var xnit = getVar('nit',0);
					var xresponsable = getVar('responsable',0);
					var xcedularesponsable = getVar('cedularesponsable',0);
					var xdireccion = getVar('direccion2',0);
					var xtelefono = getVar('telefono',0);

					var xcampos = ['contrato','objetocontrato','iniciocontrato','fincontrato','cliente','nit','responsable','cedularesponsable','direccion','telefono'];

					var xvalores = [xcontrato,xobjetocontrato,xiniciocontrato,xfincontrato,xcliente,xnit,xresponsable,xcedularesponsable,xdireccion,xtelefono];

					$.post('json/myFileDB.php',
						{accion:xaccion, tabla:xtabla, campos:xcampos, valores:xvalores},
						function(result){
						if (result.success){
							$.messager.alert('Mensaje', 'Contrato grabado EXITOSAMENTE!!!');
							$('#dlgContrato').dialog('close');								
												
						} else {

							$.messager.alert('Mensaje', 'problemas!!!-grabar registro');
						}
					},'json');

				}
			});

			// $('#fmContrato').form('submit',{
			// 	url: url,
			// 	onSubmit: function(){
			// 		return $(this).form('validate');
			// 	},
			// 	success: function(result){
			// 		//var result = eval('('+result+')');
			// 		if (result.errorMsg){
			// 			$.messager.show({
			// 				title: 'Error',
			// 				msg: result.errorMsg
			// 			});
			// 		} else {
			// 			$('#dlgContrato').dialog('close');		// close the dialog
			// 			$('#dgContrato').datagrid('reload');	// reload the user data
			// 		}
			// 	}
			// });
		}

		function sigExtracto(pcontrato){
			return 150;
		}

		function ponerCeros(pcontrato){
			var long = pcontrato.length;
			var ncontrato = '';

			ncontrato = '0'.repeat(4-long) + pcontrato;

			$.post('json/contrato_extracto_max.php',
				{contrato:ncontrato},function(result){
				if (result.success){
					var next = result.next;
					if(next){
						// alert('ok');
					}else {
						// alert('si');
					}

					// adicionar ceros al nextr
					var nlong = next.length;
					var nnext = '0'.repeat(4-nlong) + next;

					// alert("next="+nnext);

					// ncontrato tiene YA los ceros
					setVar('ncontrato',0,ncontrato);
					setVar('extracto',0,nnext);

					// return ncontrato;										
				}
			},'json');
		}

	    $(function(){
	        $('#iniciocontrato').datebox().datebox('calendar').calendar({
	            validator: function(date){
	                var now = new Date();
	                var d1 = new Date(now.getFullYear(), now.getMonth(), now.getDate());
	                var d2 = new Date(now.getFullYear(), now.getMonth(), now.getDate()+14);
	                return d1<=date && date<=d2;
	            }
	        });
	    });	

	    $(function(){
	        $('#fincontrato').datebox().datebox('calendar').calendar({
	            validator: function(date){
	                var now = new Date();
	                var d1 = new Date(now.getFullYear(), now.getMonth(), now.getDate());
	                var d2 = new Date(now.getFullYear(), now.getMonth(), now.getDate()+14);
	                return d1<=date && date<=d2;
	            }
	        });
	    });	

    function newExtracto(){			
		var row = $('#dgContrato').datagrid('getSelected');

		var xcontrato = row['contrato'];

		// setTimeout(function(){
		// 	// poner ceros y reasignar campo contrato
		// 	var ncontrato = ponerCeros(xcontrato);
		// 	setVar('ncontrato',0,ncontrato);

		// },2000);

		if (row){
			$('#dlgExtracto').dialog('open');
			$('#fmExtracto').form('load',row);

			var xinterno = getVar('suser',0);

			// limpiar contenido de contrato/extracto
			setVar('ncontrato',0,'');
			setVar('extracto',0,'');
			var xinterno = getVar('suser',0);
			setVar('interno',0,xinterno);
			setVar('creador',0,xinterno);

			// se quita el valor de retorno
			ponerCeros(xcontrato);

			url = 'json/extracto_save.php?id='+row.id;

			traerDatosInterno();
			traerDatosConductor1();
		}
	}

	//DATOS DEL VEHICULO
	// $("#interno").combobox({
	// 	onSelect: function(){
	// 		traerDatosInterno();
	// 	}
	// });

	function traerDatosInterno(xinterno){
		var xinterno = $("#interno").textbox('getValue');

		if(xinterno!=''){
			$.getJSON('json/datosinterno.php?interno='+xinterno,function(registros){
				if(registros.length == 0){
					$.messager.alert("No existen datos");
				}
				else{
					$.each(registros, function(i,registro){
						$("#fmExtracto").form('load', registro);
						$("#modelo").textbox('setValue', registro.modelo);
					});
				}
			});
		}
	}

	$(function(){
        $('#fechainicio').datebox().datebox('calendar').calendar({
            validator: function(date){
                var now = new Date();
                var d1 = new Date(now.getFullYear(), now.getMonth(), now.getDate());
                var d2 = new Date(now.getFullYear(), now.getMonth(), now.getDate()+14);

                var xfinsoat = new Date($("#finsoat").datebox('getValue'));
                var xfintecmecanica = new Date($("#fintecmecanica").datebox('getValue'));
                var xfintarjetaoperacion = new Date($("#fintarjetaoperacion").datebox('getValue'));
                var xfinpolizacontrac = new Date($("#finpolizacontrac").datebox('getValue'));
                var xfinpolizaextra = new Date($("#finpolizaextra").datebox('getValue'));
                var xfinpreventiva = new Date($("#finpreventiva").datebox('getValue'));

                return d1<=date && date<=d2 && date<=xfinsoat && date<=xfintecmecanica && date<=xfintarjetaoperacion && date<=xfinpolizacontrac && date<=xfinpolizaextra && date<=xfinpreventiva;
            }
        });
    });

 	$(function(){
        $('#fechafin').datebox().datebox('calendar').calendar({
            validator: function(date){
                var now = new Date();
                var d1 = new Date(now.getFullYear(), now.getMonth(), now.getDate());
                var d2 = new Date(now.getFullYear(), now.getMonth(), now.getDate()+14);


                var xfinsoat = new Date($("#finsoat").datebox('getValue'));
                var xfintecmecanica = new Date($("#fintecmecanica").datebox('getValue'));
                var xfintarjetaoperacion = new Date($("#fintarjetaoperacion").datebox('getValue'));
                var xfinpolizacontrac = new Date($("#finpolizacontrac").datebox('getValue'));
                var xfinpolizaextra = new Date($("#finpolizaextra").datebox('getValue'));
                var xfinpreventiva = new Date($("#finpreventiva").datebox('getValue'));

                return d1<=date && date<=d2 && date<=xfinsoat && date<=xfintecmecanica && date<=xfintarjetaoperacion && date<=xfinpolizacontrac && date<=xfinpolizaextra && date<=xfinpreventiva;
            }
        });
    });	

    function traerDatosConductor1(xinterno){
		var xinterno = $("#interno").textbox('getValue');

		if(xinterno!=''){
			$.getJSON('json/datosconductor.php?interno='+xinterno,function(registros){
				if(registros.length == 0){
					$.messager.alert("No existen datos");
				}
				else{
					$.each(registros, function(i,registro){
						$("#fmExtracto").form('load', registro);
						$("#conductor1").textbox('setValue', registro.conductor);
						$("#cedulaconductor1").textbox('setValue', registro.cedulaconductor);
						$("#vigencialicencia1").textbox('setValue', registro.vigencialicencia);
					});
				}
			});
		}
	}

	function saveExtracto(){
		$('#fmExtracto').form('submit',{
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
					var xextracto = getVar('extracto',0);
					var xcontrato = getVar('ncontrato',0);
					var xcedularesponsable = getVar('cedularesponsablee',0);

					// alert(xcedularesponsable);
					
					var params  = 'width='+screen.width;
					params += ', height='+screen.height;
					params += ', top=0, left=0'
					params += ', fullscreen=yes';

					window.open ("planilla.php?extracto="+xextracto+"&contrato="+xcontrato+"&cedularesponsable="+xcedularesponsable , params);

					// close the dialog
					$('#dlgExtracto').form('clear').dialog('close');
					$('#dgContrato').datagrid('reload');	// reload the user data
				}
			}
		});
	}

	function newPasajeros(){	

		$('#dlgPasajeros').dialog('open');
		$('#fmPasajeros').form('clear');
		url = 'json/pax_save.php';
	
	}

	function savePasajeros(){
		$('#fmPasajeros').form('submit',{
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
					$('#dlgPasajeros').dialog('close');		// close the dialog
					$('#dgContrato').datagrid('reload');	// reload the user data
				}
			}
		});
	}

	</script>

	<script type="text/javascript">
    	$(document).ready(function(){
		var cuentaInputs = $('#dlgPasajeros').children().length;

		$('#agrega').click(function(){
			cuentaInputs++;
			$('<br class="fila'+cuentaInputs+'" /> <label class="fila'+cuentaInputs+'" for=dato'+cuentaInputs+'">Pasajero '+cuentaInputs+':</label><input type="text" name="dato'+cuentaInputs+'" class="fila'+cuentaInputs+'" id="dato'+cuentaInputs+'" />').appendTo('#inputs');

			if(cuentaInputs==2){
				$('<input type="button" id="eliminame" value="-" />').insertAfter('#agrega');
			}
		});
		$('#eliminame').live("click", function(){
			$('.fila'+cuentaInputs).remove();
			cuentaInputs--;
			if(cuentaInputs==1){
				$(this).remove();
			}
		});
		$('#enviar').click(function(){
			$('#fmPasajeros').submit();
		});
	});
    </script>

	<script>
	    $(document).ready(function () {
	        var iCnt = 1;

	        $('#btClone').on('click', function () {
	            $('#tbBooks')
	                .clone().val('')      // CLEAR VALUE.
	                .attr('style', 'margin:3px 0;', 'id', 'tbBooks' + iCnt)     // Dale un id
	                .appendTo("#container2");

	            // AGREGUE UN BOTÓN DE ENVÍO SI SE CLONA AL MENOS EL ELEMENTO "1".
	            if (iCnt == 1) {
	                var divSubmit = $(document.createElement('div'));

	                $(divSubmit).append('<input type=button ' +
	                    'class="bt" onclick="GetTextValue()" ' +
	                    'id=btSubmit value=Submit />');
	            }
	            $('#container2').after(divSubmit);
	            $("#container2").attr('style', 'display:block;margin:3px;');

	            iCnt = iCnt + 1;
	        });
	    });

	    // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" IS CLICKED.
	    var divValue, values;

	    function GetTextValue() {
	        var iTxtCnt = 0;    // COUNT TEXTBOXES.
	        values = '';

	        $(divValue).empty();
	        $(divValue).remove();

	        $('.input').each(function () {
	            divValue = $(document.createElement('div')).css({
	                padding: '5px', width: 'auto'
	            });

	            values += this.value + '<br />'
	            iTxtCnt = iTxtCnt + 1;
	        });

	        $(divValue).append('<p>You have selected <b>' + iTxtCnt + 
	            ' Books.</b></p>' + values);
	        $('body').append(divValue);
	    } 
	</script> 
</body>
</html>