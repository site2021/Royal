<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administracion-Extractos</title>
	<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/default/easyui2.css">
	<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/color.css">
	<link rel="stylesheet" type="text/css" href="../../jeasyui/demo/demo.css">
	
	<script type="text/javascript" src="../../jeasyui/jquery.min.js"></script>
	<script type="text/javascript" src="../../jeasyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../../jeasyui/locale/easyui-lang-es.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script type="text/javascript" src="../js/datagrid-filter.js"></script>
	<script type="text/javascript" src="../js/accounting.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilotabla.css">
	<link rel="stylesheet" type="text/css" href="css/tooltips.css">

	<script type="text/javascript">
		$(function(){
			$("#dgregchequeate").datagrid('enableFilter');			
		})
	</script>

</head>
<body>
	<div class="botonera">
	    <!-- impresion de planilla de rutas /////////////////////////////////////////////////////// -->
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="printRegChequeate()">
	         		<img src="icons/Excel.png" >
	         	</a>
	         	<span class="tooltiptext">Excel</span>
	        </div>
	    </div>
	</div>

	<table id="dgregchequeate" class="easyui-datagrid" title="REGISTROS CHEQUÉATE" style="width:100%;height:500px;margin-top:50px;"
		url="json/emp4chequeate_get.php"
		toolbar="#toolbarconductor"
		headerCls="hc"
		rownumbers="true" fitColumns="false" singleSelect="true">
		<thead>
			<tr>
				<th field="codigoencuesta">ID</th>
				<th field="fechaencuesta">Fecha encuesta</th>
				<th field="nombreencuesta">Nombre</th>
				<th field="celular">Celular</th>
				<th field="temperaturaaux" formatter="formatPrice">Temperatura</th>	
				<th field="ingreso" formatter="formatPrice">Ingreso</th>
				<th field="horaingreso" formatter="formatPrice">Hora ingreso</th>	
				<th field="salida" formatter="formatPrice">Salida</th>				
				<th field="horasalida" formatter="formatPrice">Hora salida</th>
				<th field="tos" formatter="formatPrice2">Tos</th>
				<th field="malestar" formatter="formatPrice2">Malestar</th>
				<th field="difrespirar" formatter="formatPrice2">Dificultad al respirar</th>
				<th field="diarrea" formatter="formatPrice2">Diarrea</th>
				<th field="olfatogusto" formatter="formatPrice2">Olfato-gusto</th>
				<th field="fuerapais" formatter="formatPrice2">Fuera pais</th>
				<th field="contactosospechoso" formatter="formatPrice2">Contacto sospechoso</th>
				<th field="cuarentena" formatter="formatPrice2">Cuarentena</th>
				<th field="personacuarentena" formatter="formatPrice2">Persona cuarentena</th>
				<th field="compromiso" formatter="formatPrice2">Compromiso</th>
			</tr>
		</thead>
	</table>

	<script type="text/javascript">

		function printRegChequeate(){
			location.assign("regChequeateExcel.php");
		}

		function formatPrice(temperaturaaux,row){
            if (temperaturaaux >= 37.6){
                return '<span style="color:red;">('+temperaturaaux+')</span>';
            } else {
                return temperaturaaux;
            }
        }

        function formatPrice2(tos,row){
            if (tos =='SI'){
                return '<span style="color:red;">('+tos+')</span>';
            } else {
                return tos;
            }
        }
 	</script>

	<script type="text/javascript">
		function getVar(pnombre,ptipo){
			if(ptipo==0){
				return $("#"+pnombre).textbox('getValue');
			}else if(ptipo==1){
				return $("#"+pnombre).numberbox('getValue');
			}else if(ptipo==2){
				return $("#"+pnombre).datebox('getValue');
			}
		}

		function setVar(pnombre, ptipo, pvalor){
			if(ptipo==0){
				$("#"+pnombre).textbox('setValue', pvalor);
			}else if(ptipo==1){
				$("#"+pnombre).numberbox('setValue', pvalor);
			}else if(ptipo==2){
				$("#"+pnombre).datebox('setValue'. pvalor);
			}			
		}
	</script>

	<!-- SCRIPT formato fechas //////////////////////////////////////////////////////////////////// -->
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

	<style type="text/css">
		.hc {
			background: #0D6B9A;				
		}
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
			margin-top: 14px;
		}
		.fitem label{
			font-size: 14px;
			text-align: right;
			display:inline-block;
			width:95px;
		}
		.fitem input{
			width:200px;

		}

		body {
			height: 100%;
			padding: 1%;
		}	
		.botonera {		
			background:#D8D8D8;
			margin-top:1px;
			margin-bottom:1px;
			width:100%;
			height:47px;	

		}
	</style>
</body>
</html>