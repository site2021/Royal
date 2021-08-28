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

	<!-- Busqueda x Contenido /////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$.fn.combobox.defaults.filter = function(q,row){
		      var opts = $(this).combobox('options');
		      return row[opts.textField].toUpperCase().indexOf(q.toUpperCase()) >= 0;
		};
	</script>	

	<style type="text/css">
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
		.hc {
			background: #92D050;
		}
		#dlgregistro, #dlgrutas {
			overflow: hidden;
		}

	</style>

	<!-- filter Lib - /////////////////////////////////////////////////////////////// -->
	<script type="text/javascript">
		$(function(){
			$("#dgconductores").datagrid('enableFilter');			
		})
	</script>

</head>
<body>
	<!-- botones para acciones principales //////////////////////////////////////////////////////// -->
	<div class="botonera">
	    <!-- impresion de planilla de rutas /////////////////////////////////////////////////////// -->
	    <div class="bordes" style="margin-left:10px">
	        <div class="tdiv">
	         	<a id="btnRegistros" name="btnRegistros" class="boton" onclick="newConductor()">
	         		<img src="icons/User.png" >
	         	</a>
	         	<span class="tooltiptext">Nuevo CONDUCTOR</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEditar" name="btnEditar" class="boton" onclick="editConductor()">
	         		<img src="icons/Write2.png" >
	         	</a>
	         	<span class="tooltiptext">Editar CONDUCTOR</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="destroyConductor()">
	         		<img src="icons/Trash.png" >
	         	</a>
	         	<span class="tooltiptext">Eliminar CONDUCTOR</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="descargarPersonal()">
	         		<img src="icons/Excel.png" >
	         	</a>
	         	<span class="tooltiptext">Descargar PERSONAL</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="printHojaVida()">
	         		<img src="icons/Document.png" >
	         	</a>
	         	<span class="tooltiptext">Descargar HOJA VIDA</span>
	        </div>
	    </div>
	    <!-- impresion de planilla de rutas /////////////////////////////////////////////////////// -->
	    <div class="bordes" style="margin-left:40px">
	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="descargarAccidentes()">
	         		<img src="icons/Excel.png" >
	         	</a>
	         	<span class="tooltiptext">Descargar ACCIDENTES</span>
	        </div>

	        <div class="tdiv"> 	
	         	<a id="btnEliminar" name="btnEliminar" class="boton" onclick="descargarAusentismos()">
	         		<img src="icons/Excel.png" >
	         	</a>
	         	<span class="tooltiptext">Descargar AUSENTISMOS</span>
	        </div>
	    </div>
	</div>

	
	<table id="dgconductores" class="easyui-datagrid" title="LISTA CONDUCTORES" style="width:100%;height:500px;margin-top:50px;"
		url="json/conductores_get.php"
		toolbar="#toolbarconductor"
		headerCls="hc"
		rownumbers="true" fitColumns="false" singleSelect="true">
		<thead>
			<tr>					
            	<th field="interno" width="85px">interno</th>					
            	<th field="conductor" width="402px">conductor</th>					
            	<th field="cedulaconductor" width="120px">cedula</th>
            	<th field="celular" width="120px">celular</th>
            	<th field="categorialicencia" width="55px">licencia</th>
            	<th field="vigencialicencia" width="100px" formatter="formatPrice">vigencia</th><!-- 
            	<th field="fechaingreso" width="120px">fecha ingreso</th>
            	<th field="fecharetiro" width="120px" formatter="formatPrice">fecha retiro</th> -->
            	<th field="clase" width="150px">clase</th>
			</tr>
		</thead>
	</table>

	<div id="dlgconductor" class="easyui-dialog" data-options="modal:true" style="width:880px;height:500px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		
		<form id="fm" method="post" novalidate>
			<div class="ftitle">Datos CONDUCTOR</div>
			<br>
			<div class="fitem">
				<label>Interno</label>
				<input id="interno" name="interno" class="easyui-textbox">

				<label>Conductor</label>
				<input id="conductor" name="conductor" class="easyui-textbox">

				<label>Cedula</label>
				<input id="cedulaconductor" name="cedulaconductor" class="easyui-textbox">
			</div>
			<br>
			<br>
			<div class="fitem">
				<label>Sexo</label>
				<select id="sexo" name="sexo" class="easyui-combobox" style="width:160px">
				    <option value="MASCULINO">MASCULINO</option>
				    <option value="FEMENINO">FEMENINO</option>
				</select>

				<label>Fecha Nac.</label>
				<input id="fechanacimiento" name="fechanacimiento" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

				<label>Edad</label>
				<input id="edad" name="edad" class="easyui-numberbox">
			</div>
			<div class="fitem">
				<label>Lugar Nac.</label>
				<input id="lugarnacimiento" name="lugarnacimiento" class="easyui-textbox" >

				<label>Estado Civil</label>
				<select id="estadocivil" name="estadocivil" class="easyui-combobox" style="width:160px">
				    <option value="SOLTERO">SOLTERO</option>
				    <option value="CASADO">CASADO</option>
				    <option value="UNION LIBRE">UNION LIBRE</option>
				    <option value="DIVORCIADO">DIVORCIADO</option>
				    <option value="SEPARADO">SEPARADO</option>
				</select>

				<label>Tipo Sangre</label>
				<select id="tiposangre" name="tiposangre" class="easyui-combobox" style="width:160px">
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				    <option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				</select>
			</div>
			<br>
			<br>
			<div class="fitem">
				<label>Direccion</label>
				<input id="direccion" name="direccion" class="easyui-textbox">

				<label>Barrio</label>
				<input id="barrio" name="barrio" class="easyui-textbox">

				<label>Municipio</label>
				<input id="municipio" name="municipio" class="easyui-textbox">
			</div>

			<div class="fitem">
				<label>Telefono</label>
				<input id="telefono" name="telefono" class="easyui-textbox">

				<label>Celular</label>
				<input id="celular" name="celular" class="easyui-textbox">

				<a id="btnDocumentos" name="btnDocumentos" class="boton" onclick="documentosConductor()" style="float: right;margin-top: 25px">
	         		<img src="icons/Document2.png" >
	         	</a>

				<a id="btnIncapacidades" name="btnIncapacidades" class="boton" onclick="incapacidades()" style="float: right;margin-top: 25px; margin-right: 10px">
	         		<img src="icons/Health.png" >
	         	</a>
			</div>
			<br>
			<div class="ftitle">Datos LICENCIA</div>
			<br>
			<div class="fitem">
				<label>Ctg. Licencia</label>
				<select id="categorialicencia" name="categorialicencia" class="easyui-combobox" style="width:160px">
				    <option value="C1">C1</option>
				    <option value="C2">C2</option>
				    <option value="C3">C3</option>
				</select>

				<label>Vigencia</label>
				<input id="vigencialicencia" name="vigencialicencia" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
			</div>
			<br>

			<div class="ftitle">Formacion Educativa</div>
			<div class="fitem">
				<label>Formacion Educativa</label>
				<input id="formacioneducativa" name="formacioneducativa" class="easyui-textbox">

				<label>Profesion</label>
				<input id="profesion" name="profesion" class="easyui-textbox">
			</div>
			<br>
			<div class="ftitle">Estado</div>
			<!-- <div class="fitem">
				<label>Ingreso</label>
				<input id="fechaingreso" name="fechaingreso" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

				<label>Retiro</label>
				<input id="fecharetiro" name="fecharetiro" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
			</div> -->

			<div class="fitem">
				<label>Estado</label>
				<select id="estadoconductor" name="estadoconductor" class="easyui-combobox" style="width:160px">
				    <option value="ACTIVO">ACTIVO</option>
				    <option value="RETIRADO">RETIRADO</option>
				</select>

				<label>Categoria</label>
				<select id="tipoconductor" name="tipoconductor" class="easyui-combobox" style="width:160px">
				    <option value="FIJO">FIJO</option>
				    <option value="RELEVO">RELEVO</option>
				</select>

				<label>Clase</label>
				<select id="clase" name="clase" class="easyui-combobox" style="width:160px">
				    <option value="VINCULADO">VINCULADO</option>
				    <option value="SUBCONTRATADO">SUBCONTRATADO</option>
				</select>
			</div>

			<div class="fitem">
				<label>Seccion</label>
				<select id="seccion" name="seccion" class="easyui-combobox" style="width:160px">
				    <option value="OPERATIVO">OPERATIVO</option>
				    <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
				</select>

				<label>Tipo Contrato</label>
				<select id="tipocontrato" name="tipocontrato" class="easyui-combobox" style="width:160px">
				    <option value="FIJO">FIJO</option>
				    <option value="INDEFINIDO">INDEFINIDO</option>
				</select>

				<label>Cargo</label>
				<select id="cargo" name="cargo" class="easyui-combobox" style="width:160px">
				    <option value="CONDUCTOR">CONDUCTOR</option>
				    <option value="GERENTE">GERENTE</option>
				    <option value="DIR. ADMIN">DIR. ADMIN</option>
				    <option value="SOPORTE TECNICO">SOPORTE TECNICO</option>
				    <option value="COORDINADOR">COORDINADOR</option>
				    <option value="AUXILIAR CONTABLE">AUXILIAR CONTABLE</option>
				    <option value="PRACTICANTE">PRACTICANTE</option>
				</select>
			</div>

			<div class="fitem">
				<label>Salario Letra</label>
				<input name="salarioletra" class="easyui-textbox" >

				<label>Salario No</label>
				<input id="salarionum" name="salarionum" class="easyui-numberbox" value="12345678" data-options="groupSeparator:','">
			</div>


	        <br>
			<div class="ftitle">DOCUMENTOS</div>
			<br>
			<div class="fitem">
				<label>Pasado Judicial</label>
				<select id="pasadojudicial" name="pasadojudicial" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>

				<label>Simit</label>
				<select id="simit" name="simit" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>

				<label>Runt</label>
				<select id="runt" name="runt" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>
			</div>

			<div class="fitem">
				<label>Contrato</label>
				<select id="contrato" name="contrato" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>

				<label>Rutas</label>
				<input name="examenruta" class="easyui-numberbox" suffix="%">

				<label>Psicosensometrico</label>
				<select id="psicosensometrico" name="psicosensometrico" class="easyui-combobox" style="width:160px">
				    <option value="APROBADO">APROBADO</option>
				    <option value="NO APROBADO">NO APROBADO</option>
				</select>
			</div>

			<div class="fitem">
				<label>HV</label>
				<select id="hojavida" name="hojavida" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>

				<label>Induccion</label>
				<select id="induccion" name="induccion" class="easyui-combobox" style="width:160px">
				    <option value="SI">SI</option>
				    <option value="NO">NO</option>
				</select>
			</div>
			<br>
			<div class="ftitle">Examen Ocupacional</div>
			<br>
			<div class="fitem">
				<label>Ingreso</label>
				<input id="ocupacionalingreso" name="ocupacionalingreso" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

				<label>Retiro</label>
				<input id="ocupacionalretiro" name="ocupacionalretiro" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
			</div>
			<br>
			<div class="ftitle">SEGURIDAD SOCIAL</div>
			<br>
			<div class="fitem">
				<label>EPS</label>
				<select id="eps" name="eps" class="easyui-combobox" style="width:160px">
				    <option value="MEDIMAS">MEDIMAS</option>
				    <option value="NUEVA EPS">NUEVA EPS</option>
				    <option value="SOS">SOS</option>
				    <option value="SANITAS">SANITAS</option>
				    <option value="SANIDAD">SANIDAD</option>
				    <option value="SALUD TOTAL">SALUD TOTAL</option>
				    <option value="COOMEVA">COOMEVA</option>
				</select>

				<label>FP</label>
				<select id="fondopension" name="fondopension" class="easyui-combobox" style="width:160px">
				    <option value="PROTECCION">PROTECCION</option>
				    <option value="COLPENSIONES">COLPENSIONES</option>
				    <option value="PORVENIR">PORVENIR</option>
				    <option value="COLFONDOS">COLFONDOS</option>
				    <option value="FNA">FNA</option>
				</select>

				<label>Cesantias</label>
				<select id="cesantias" name="cesantias" class="easyui-combobox" style="width:160px">
				    <option value="PROTECCION">PROTECCION</option>
				    <option value="COLPENSIONES">COLPENSIONES</option>
				    <option value="PORVENIR">PORVENIR</option>
				    <option value="COLFONDOS">COLFONDOS</option>
				    <option value="FNA">FNA</option>
				</select>
			</div>
		</form>

		<form id="frmlinearegistro">
        	<table>
        		<tr>
        			<div class="ftitle">INGRESOS Y RETIROS</div>

					<div class="fitem">
						<!-- <input id="cedulaconductor" name="cedulaconductor" class="easyui-textbox" placeholder="cedula conductor"> -->

						<label>Fecha ingreso</label>
						<input id="fechaingreso" name="fechaingreso" class="easyui-datebox" 
						data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

						<label>Fecha retiro</label>
						<input id="fecharetiro" name="fecharetiro" class="easyui-datebox" 
						data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">


						<a id="btnLimpiar" name="btnLimpiar" class="easyui-linkbutton"  iconCls="icon-cancel" onclick="limpiarLinea()"></a>

						<a id="btnGrabarLinea" name="btnGrabarLinea" class="easyui-linkbutton"  iconCls="icon-save" onclick="grabarLinea()"></a>

						<a id="btnEditarLinea" name="btnEditarLinea" class="easyui-linkbutton"  iconCls="icon-edit" onclick="cargarLinea()"></a>

						<a id="btnEditarGuardar" name="btnEditarGuardar" class="easyui-linkbutton"  iconCls="icon-save" onclick="guardarEditada()"></a>

						<a id="btnEliminarLinea" name="btnEliminarLinea" class="easyui-linkbutton"  iconCls="icon-remove" onclick="borrarIngresoRetiro()"></a>

						<td colspan=4>
							<div style="display:none">
								<input id="rid" name="rid" class="easyui-textbox"
									   style="width:40px"
									   data-options="">

							</div>
						</td>

					</div>					
				</tr>
        	</table>

        </form>
        <table id="dgdetalle" class="easyui-datagrid" style="width:100%;height:300px"
		url="json/get_ingresosretiros.php" singleSelect="true" headerCls="" pagination="false" showFooter="true"
			rownumbers="true">

			<thead>
				<tr>
					<th field="cedulaconductor", width="150" >Cedula</th>
					<th field="fechaingreso", width="150" >ingreso</th>
					<th field="fecharetiro", width="150" >retiro</th>
				</tr>
			</thead>
		</table>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveConductor()" style="width:90px">OK</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgconductor').dialog('close')" style="width:90px">Cancelar</a>
	</div>

 	<!-- DIALOGO DE INCAPACIDADES -->
	<div id="panelIncapacidades" class="easyui-dialog" data-options="modal:true" style="width:880px;height:500px;padding:10px 20px" closed="true">

		<div class="botonera">
		    <div class="bordes" style="margin-left:10px">
		        <div class="tdiv">
		         	<a id="btnNuevoAccidente" name="btnNuevoAccidente" class="boton" onclick="newAccidente()">
		         		<img src="icons/Plus.png" >
		         	</a>
		         	<span class="tooltiptext">Nuevo ACCIDENTE</span>
		        </div>

		        <div class="tdiv">
		         	<a id="btnEditarAccidente" name="btnEditarAccidente" class="boton" onclick="editAccidente()">
		         		<img src="icons/Write.png" >
		         	</a>
		         	<span class="tooltiptext">editar ACCIDENTE</span>
		        </div>

		        <div class="tdiv">
		         	<a id="btnEliminarAccidente" name="btnEliminarAccidente" class="boton" onclick="destroyAccidente()">
		         		<img src="icons/Trash.png" >
		         	</a>
		         	<span class="tooltiptext">eliminar ACCIDENTE</span>
		        </div>
		    </div>
		</div>

		<table id="dgAccidente" class="easyui-datagrid" style="width:100%;height:150px"
			url="json/accidentes_getdata.php" singleSelect="true" headerCls="" pagination="false" showFooter="true"
			rownumbers="true">

			<thead>
				<tr>
					<th field="cedulaconductor", width="150">Cedula</th>
					<th field="tipo", width="150">Tipo</th>
				</tr>
			</thead>
		</table>

		<!----------------------------------------- AUSENTISMO ------------------------------------------>
		<div class="botonera">
		    <div class="bordes" style="margin-left:10px">
		        <div class="tdiv">
		         	<a id="btnNuevoAusentismo" name="btnNuevoAusentismo" class="boton" onclick="newAusentismo()">
		         		<img src="icons/Plus.png" >
		         	</a>
		         	<span class="tooltiptext">Nuevo AUSENTISMO</span>
		        </div>

		        <div class="tdiv">
		         	<a id="btnEditarAusentismo" name="btnEditarAusentismo" class="boton" onclick="editAusentismo()">
		         		<img src="icons/Write.png" >
		         	</a>
		         	<span class="tooltiptext">editar AUSENTISMO</span>
		        </div>

		        <div class="tdiv">
		         	<a id="btnEliminarAusentismo" name="btnEliminarAusentismo" class="boton" onclick="destroyAusentismo()">
		         		<img src="icons/Trash.png" >
		         	</a>
		         	<span class="tooltiptext">eliminar AUSENTISMO</span>
		        </div>
		    </div>
		</div>

		<table id="dgAusentismo" class="easyui-datagrid" style="width:100%;height:150px"
			url="json/ausentismos_getdata.php" singleSelect="true" headerCls="" pagination="false" showFooter="true"
			rownumbers="true">

			<thead>
				<tr>
					<th field="cedulaconductor", width="150">Cedula</th>
					<th field="inicioincapacidad", width="150">Inicio Incapacidad</th>
					<th field="finincapacidad", width="150">Fin Incapacidad</th>
				</tr>
			</thead>
		</table>

		<div id="dlgAusentismo" class="easyui-dialog" data-options="modal:true" style="width:860px;height:500px;padding:10px 20px" closed="true"  buttons="#dlg-buttons-ausentismo">
		
			<form id="fmAusentismo" method="post" novalidate>

				<div class="ftitle">DATOS COLABORADOR</div>
				<br>
				<div class="fitem">

					<label>Conductor</label>
					<input id="conductor" name="conductor" class="easyui-textbox">

					<label>Cedula</label>
					<input id="cedulaconductor" name="cedulaconductor" class="easyui-textbox">

					<label>Seccion</label>
					<input id="seccion" name="seccion" class="easyui-textbox">
				</div>

				<div class="fitem">

					<label>Contrato</label>
					<input id="tipocontrato" name="tipocontrato" class="easyui-textbox">

					<label>Cargo</label>
					<input id="cargo" name="cargo" class="easyui-textbox">
				</div>

				<div class="ftitle">DATOS AUSENTISMO</div>
				<br>
				<div class="fitem">
					<label>Inicio Incapacidad</label>
					<input id="inicioincapacidad" name="inicioincapacidad" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

					<label>Fin Incapacidad</label>
					<input id="finincapacidad" name="finincapacidad" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
				</div>

				<div class="fitem">
					<label>Causa Incapacidad</label>
					<input id="causaincapacidad" name="causaincapacidad" class="easyui-textbox" multiline="true" style="height: 62.5px;width: 670px">
				</div>

				<div class="fitem">
					<label>Diagnostico Enfermedad</label>
					<input id="diagnostenfermedad" name="diagnostenfermedad" class="easyui-textbox" multiline="true" style="height: 62.5px;width: 670px">
				</div>

				<div class="fitem">
					<label>Dias Perdidos</label>
					<input id="diasperdidosausent" name="diasperdidosausent" class="easyui-numberbox">
				</div>


				<div class="fitem">
					<label>Recomendaciones Medicas</label>
					<input id="recomendacionmedica" name="recomendacionmedica" class="easyui-textbox" multiline="true" style="height: 62.5px;width: 670px">
				</div>

				<div class="fitem">
					<label>Accion a Implementar</label>
					<input id="accionimpleausentis" name="accionimpleausentis" class="easyui-textbox" multiline="true" style="height: 62.5px;width: 670px">
				</div>

				<div class="fitem">
					<label>Fecha Seguimiento</label>
					<input id="seguimientoausentis" name="seguimientoausentis" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
				</div>

				<div class="fitem">
					<label>Observaciones</label>
					<input id="observacionausentis" name="observacionausentis" class="easyui-textbox" multiline="true" style="height: 62.5px;width: 670px">
				</div>
			</form>	
		</div>
		<div id="dlg-buttons-ausentismo">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveAusentismo()" style="width:90px">OK</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgAusentismo').dialog('close')" style="width:90px">Cancelar</a>
		</div>


		<!-------------------------------------- DIALOG ACCIDENTE --------------------------------------->

		<div id="dlgAccidente" class="easyui-dialog" data-options="modal:true" style="width:860px;height:500px;padding:10px 20px" closed="true"  buttons="#dlg-buttons-incapacidad">
		
			<form id="fmAccidente" method="post" novalidate>

				<div class="ftitle">DATOS COLABORADOR</div>
				<br>
				<div class="fitem">

					<label>Conductor</label>
					<input id="conductor" name="conductor" class="easyui-textbox">

					<label>Cedula</label>
					<input id="cedulaconductor" name="cedulaconductor" class="easyui-textbox">

					<label>Seccion</label>
					<input id="seccion" name="seccion" class="easyui-textbox">
				</div>

				<div class="fitem">

					<label>Contrato</label>
					<input id="tipocontrato" name="tipocontrato" class="easyui-textbox">

					<label>Cargo</label>
					<input id="cargo" name="cargo" class="easyui-textbox">
				</div>

				<div class="ftitle">DATOS ACCIDENTE O INCIDENTE</div>
				<br>
				<div class="fitem">
					<label>Fecha</label>
					<input id="fecha" name="fecha" class="easyui-datebox" 
					data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

					<label>Tipo</label>
					<select id="tipo" name="tipo" class="easyui-combobox" style="width:160px">
					    <option value=""></option>
					    <option value="ACCIDENTE">ACCIDENTE</option>
					    <option value="INCIDENTE">INCIDENTE</option>
					</select>
				</div>

				<div class="fitem">
					<label>Descripcion</label>
					<input id="descripcion" name="descripcion" class="easyui-textbox" multiline="true" style="height: 62.5px;width: 670px">
				</div>

				<div class="fitem">
					<label>Dias Perdidos</label>
					<input id="diasperdidos" name="diasperdidos" class="easyui-numberbox">

					<label>Tipo Lesion</label>
					<select id="tipolesion" name="tipolesion" class="easyui-combobox" style="width:160px">
						<option value=""></option>
					    <option value="LUXACION">LUXACION</option>
					    <option value="QUEMADURA">QUEMADURA</option>
					    <option value="LACERACION">LACERACION</option>
					    <option value="FRACTURA">FRACTURA</option>
					    <option value="HERIDA">HERIDA</option>
					    <option value="CORTADURA">CORTADURA</option>
					    <option value="TRAUMA SUPERFICIAL(Incluye rasguno, puncion, pinchazo y lesiones en ojo por cuerpo extrano)">TRAUMA SUPERFICIAL(Incluye rasguno, puncion, pinchazo y lesiones en ojo por cuerpo extrano)</option>
					</select>

					<label>Parte Afectada</label>
					<select id="parteafectada" name="parteafectada" class="easyui-combobox" style="width:160px">
						<option value=""></option>
					    <option value="OJOS">OJOS</option>
					    <option value="CABEZA">CABEZA</option>
					    <option value="CUELLO">CUELLO</option>
					    <option value="TRONCO( Incluye espalda, columna vertebral, medula espinal, pelvis)">TRONCO( Incluye espalda, columna vertebral, medula espinal, pelvis)</option>
					    <option value="TORAX">TORAX</option>
					    <option value="ABDOMEN">ABDOMEN</option>
					    <option value="MIEMBROS SUPERIORES">MIEMBROS SUPERIORES</option>
					    <option value="MIEMBROS INFERIORES">MIEMBROS INFERIORES</option>
					    <option value="MANOS">MANOS</option>
					    <option value="PIES">PIES</option>
					</select>

					<div class="fitem">
						<label>Agente Lesion</label>
							<select id="agentelesion" name="agentelesion" class="easyui-combobox" style="width:160px">
								<option value=""></option>
							    <option value="MAQUINAS Y/O EQUIPOS">MAQUINAS Y/O EQUIPOS</option>
							    <option value="MEDIOS DE TRANSPORTE">MEDIOS DE TRANSPORTE</option>
							    <option value="APARATOS">APARATOS</option>
							    <option value="HERRAMIENTAS, IMPLEMENTOS O UTENSILIOS">HERRAMIENTAS, IMPLEMENTOS O UTENSILIOS</option>
							    <option value="MATERIALES O SUSTANCIAS">MATERIALES O SUSTANCIAS</option>
							    <option value="AMBIENTE DE TRABAJO(Incluye superficies de transito y de trabajo, muebles, tejados en el exterior, inferior o subterraneos)">AMBIENTE DE TRABAJO(Incluye superficies de transito y de trabajo, muebles, tejados en el exterior, inferior o subterraneos)</option>
							</select>

						<label>Tipo Accidente</label>
						<select id="tipoaccidente" name="tipoaccidente" class="easyui-combobox" style="width:160px">
							<option value=""></option>
						    <option value="CAIDA DE PERSONAS">CAIDA DE PERSONAS</option>
						    <option value="CAIDA DE OBJETOS">CAIDA DE OBJETOS</option>
						    <option value="PISADAS, CHOQUES O GOLPES">PISADAS, CHOQUES O GOLPES</option>
						    <option value="ATRAPAMIENTOS">ATRAPAMIENTOS</option>
						    <option value="SOBREESFUERZO">SOBREESFUERZO</option>
						    <option value="EXPOSICION O CONTACTO CON TEMPERATURA EXTREMA">EXPOSICION O CONTACTO CON TEMPERATURA EXTREMA</option>
						    <option value="EXPOSICION O CONTACTO CON ELECTRICIDAD">EXPOSICION O CONTACTO CON ELECTRICIDAD</option>
						    <option value="EXPOSICION O CONTACTO CON SUSTANCIAS NOCIVAS, RADIACIONES O SALPICADURAS">EXPOSICION O CONTACTO CON SUSTANCIAS NOCIVAS, RADIACIONES O SALPICADURAS</option>
						</select>

						<label>Investigado</label>
						<select id="investigado" name="investigado" class="easyui-combobox" style="width:160px">
							<option value=""></option>
						    <option value="SI">SI</option>
						    <option value="NO">NO</option>
						    <option value="EN PROCESO">EN PROCESO</option>
						</select>
					</div>

					<div class="fitem">
						<label>Enviada a ARL</label>
						<select id="enviadoarl" name="enviadoarl" class="easyui-combobox" style="width:160px">
							<option value=""></option>
						    <option value="SI">SI</option>
						    <option value="NO">NO</option>
						</select>
					</div>

					<div class="fitem">
						<label>Causas Inmediatas</label>
						<input id="causainmediata" name="causainmediata" class="easyui-textbox" multiline="true" style="height: 62.5px;width: 670px">
					</div>

					<div class="fitem">
						<label>Causas Basicas</label>
						<input id="causabasica" name="causabasica" class="easyui-textbox" multiline="true" style="height: 62.5px;width: 670px">
					</div>

					<div class="fitem">
						<label>Accion a Implementar</label>
						<input id="accionimplementar" name="accionimplementar" class="easyui-textbox" multiline="true" style="height: 62.5px;width: 670px">
					</div>

					<div class="fitem">
						<label>Fecha Ejecucion Espererada</label>
						<input id="fechaejecucion" name="fechaejecucion" class="easyui-datebox" 
						data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">

						<label>Responsable</label>
						<input id="responsable" name="responsable" class="easyui-textbox">

						<label>Fecha Seguimiento</label>
						<input id="fechaseguimiento" name="fechaseguimiento" class="easyui-datebox" 
						data-options="formatter:myformatter,parser:myparser,width:100" style="width: 160px">
					</div>

					<div class="fitem">
						<label>Observacion</label>
						<input id="observacion" name="observacion" class="easyui-textbox" multiline="true" style="height: 62.5px;width: 670px">
					</div>
			</form>	
		</div>
		<div id="dlg-buttons-incapacidad">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveAccidente()" style="width:90px">OK</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgAccidente').dialog('close')" style="width:90px">Cancelar</a>
		</div>

	<script type="text/javascript">

		var url;
		function newConductor(){
			$('#dlgconductor').dialog('open').dialog('setTitle','Nuevo CONDUCTOR');
			$('#fm').form('clear');
			// VALORES PREDETERMNADOS
			setVar('fechanacimiento',0,'0000-00-00');
			setVar('edad',0,'0');
			setVar('vigencialicencia',0,'0000-00-00');
			setVar('fechaingreso',0,'0000-00-00');
			setVar('fecharetiro',0,'0000-00-00');
			setVar('salarionum',0,'0');
			setVar('ocupacionalingreso',0,'0000-00-00');
			setVar('ocupacionalretiro',0,'0000-00-00');

			url = 'json/conductor_save.php';
		}

		function newAccidente(){
			$('#dlgAccidente').dialog('open').dialog('setTitle','Nuevo ACCIDENTE');
			// mostrarAccidentes();
			// $('#fm').form('clear');
			setVar('fecha',0,'0000-00-00');
			setVar('fechaejecucion',0,'0000-00-00');
			setVar('fechaseguimiento',0,'0000-00-00');
			url = 'json/accidente_save.php';
		}

		function newAusentismo(){
			$('#dlgAusentismo').dialog('open').dialog('setTitle','Nuevo AUSENTISMO');
			setVar('inicioincapacidad',0,'0000-00-00');
			setVar('finincapacidad',0,'0000-00-00');
			setVar('seguimientoausentis',0,'0000-00-00');
			url = 'json/ausentismo_save.php';
		}

		function editConductor(){
			var row = $('#dgconductores').datagrid('getSelected');
			if (row){
				$('#dlgconductor').dialog('open').dialog('setTitle','Editar CONDUCTOR');
				$('#fm').form('load',row);
				$('#fmAccidente').form('load',row);
				$('#fmAusentismo').form('load',row);
				mostrarDetalle();
				url = 'json/update_conductor.php?id='+row.id;


			}else {
					$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	

				}
		}

		function editAccidente(){
			var row = $('#dgAccidente').datagrid('getSelected');
			if (row){
				$('#dlgAccidente').dialog('open').dialog('setTitle','Editar ACCIDENTE');
				$('#fmAccidente').form('load',row);
				mostrarDetalle();
				url = 'json/update_accidente.php?id='+row.id;


			}else {
					$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	

				}
		}

		function editAusentismo(){
			var row = $('#dgAusentismo').datagrid('getSelected');
			if (row){
				$('#dlgAusentismo').dialog('open').dialog('setTitle','Editar AUSENTISMO');
				$('#fmAusentismo').form('load',row);
				mostrarAusentismos();
				url = 'json/update_ausentismo.php?id='+row.id;


			}else {
					$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	

				}
		}

		function saveConductor(){
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
						$('#dlgconductor').dialog('close');		// close the dialog
						$('#dgconductores').datagrid('reload');	// reload the user data
					}
				}
			});
		}

		function saveAccidente(){
			$('#fmAccidente').form('submit',{
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
						$('#dlgAccidente').dialog('close');		// close the dialog
						$('#dgAccidente').datagrid('reload');	// reload the user data
					}
				}
			});
		}

		function saveAusentismo(){
			$('#fmAusentismo').form('submit',{
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
						$('#dlgAusentismo').dialog('close');		// close the dialog
						$('#dgAusentismo').datagrid('reload');	// reload the user data
					}
				}
			});
		}

		function destroyConductor(){
			var row = $('#dgconductores').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el conductor: ' + row.conductor,function(r){
					if (r){
						$.post('json/destroy_conductor.php',{id:row.id},function(result){
							if (result.success){
								$('#dgconductores').datagrid('reload');	// reload the user data
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
			else {
				$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	
			}
		}

		function destroyAccidente(){
			var row = $('#dgAccidente').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el accidente de: ' + row.conductor,function(r){
					if (r){
						$.post('json/destroy_accidente.php',{id:row.id},function(result){
							if (result.success){
								$('#dgAccidente').datagrid('reload');	// reload the user data
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
			else {
				$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	
			}
		}

		function destroyAusentismo(){
			var row = $('#dgAusentismo').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Esta seguro de remover el ausentismo de: ' + row.conductor,function(r){
					if (r){
						$.post('json/destroy_ausentismo.php',{id:row.id},function(result){
							if (result.success){
								$('#dgAusentismo').datagrid('reload');	// reload the user data
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
			else {
				$.messager.alert("Mensaje", "No hay registro SELECCIONADO!!!");	
			}
		}

		function incapacidades(){
			$('#panelIncapacidades').dialog('open').dialog('setTitle','incapacidades');
			mostrarAccidentes();
			mostrarAusentismos();
			// $('#fm').form('clear');
			url = 'json/conductor_save.php';
		}

		function grabarLinea(){

			var xcedulaconductor = $("#cedulaconductor").textbox('getValue');
			var xfechaingreso = $("#fechaingreso").datebox('getValue');
			var xfecharetiro = $("#fecharetiro").datebox('getValue');
			
			$.post('json/ingresosretiros.php', 
				{cedulaconductor:xcedulaconductor, fechaingreso:xfechaingreso, fecharetiro:xfecharetiro },
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
		}

		function guardarEditada(){
			// var linea = $("#dgdetalle").datagrid('getSelected');

			var xcedulaconductor = $("#cedulaconductor").textbox('getValue');
			// var xfechaingreso = $("#fechaingreso").datebox('getValue');
			var xfecharetiro = $("#fecharetiro").datebox('getValue');
			var xid = $("#rid").textbox('getValue');

			$.post('json/ingresoretiro_update.php', 
				{cedulaconductor:xcedulaconductor, fecharetiro:xfecharetiro, id:xid },
				function(result){
				if (result.success){
					$.messager.alert('Mensaje', 'registro editado exitosamente!!!');
					// $("#destino").textbox('setValue',xdestino);
					mostrarDetalle();
					limpiarLinea();

				} else {
					$.messager.alert('Mensaje', 'problemas!!! - grabarLinea');

				}
			},'json'); 
		}
		

		function limpiarLinea(){
			$("#frmlinearegistro").form('clear');

		}

		function mostrarDetalle(){
			var xcedulaconductor = $("#cedulaconductor").val();			
			
			$("#dgdetalle").datagrid('load',{
				cedulaconductor:xcedulaconductor				
			})
		}

		function mostrarAccidentes(){
			var xcedulaconductor = $("#cedulaconductor").val();			
			
			$("#dgAccidente").datagrid('load',{
				cedulaconductor:xcedulaconductor				
			})
		}

		function mostrarAusentismos(){
			var xcedulaconductor = $("#cedulaconductor").val();			
			
			$("#dgAusentismo").datagrid('load',{
				cedulaconductor:xcedulaconductor				
			})
		}

		function cargarLinea(){
			var linea = $("#dgdetalle").datagrid('getSelected');

			$("#fechaingreso").datebox('setText',linea['fechaingreso']);
			$("#fecharetiro").datebox('setText',linea['fecharetiro']);

			$("#rid").textbox('setValue',linea['id']);
		}

		function borrarIngresoRetiro(){			
			var xlinea = $("#dgdetalle").datagrid('getSelected');
				$.messager.confirm('Confirm','Esta seguro de borrar LINEA??? ' ,function(r){
					if (r){									
						var xid = xlinea['id'];

						$.post('json/ingresoretiro_destroy.php', 
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

		function descargarPersonal(){
			location.assign("personalExcel.php");			
		}

		function descargarAccidentes(){
			location.assign("accidentesExcel.php");			
		}
		function descargarAusentismos(){
			location.assign("ausentismosExcel.php");			
		}

		function documentosConductor(){
 			var xinterno = $("#interno").textbox('getText');

 			if (xinterno == '829'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1iE9ZPNz3sEJtThlqqsenumJVAOZ9-VHR#grid");
 			}
 			else if(xinterno == '840'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1pPaCgEIalSpUO5gOi7C9QPXJptYvSpop#grid");
 			}
 			else if(xinterno == '910'){
 				window.open("https://drive.google.com/embeddedfolderview?id=19HmmRwyvyLk3EeOSDrI-j6Z8Ti4_eQjQ#grid");
 			}
 			else if(xinterno == '910'){
 				window.open("https://drive.google.com/embeddedfolderview?id=19HmmRwyvyLk3EeOSDrI-j6Z8Ti4_eQjQ#grid");
 			}
 			else if(xinterno == '851'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1KFic-R9rS45qZCqbTyv3g8qbj4L05srM#grid");
 			}
 			else if(xinterno == '930'){
 				window.open("https://drive.google.com/embeddedfolderview?id=14lzsuFR5b_dd0azeDnhFjZp0l1r6mmCv#grid");
 			}
 			else if(xinterno == '862'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1fURFGJn6jLGV8CNoGYJ3UXUtYfGlOJAe#grid");
 			}
 			else if(xinterno == '810'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1UhuD2IOv1X7Hci7u707_c4QkRKU0_sSN#grid");
 			}
 			else if(xinterno == '859'){
 				window.open("https://drive.google.com/embeddedfolderview?id=13VaHzKac5Ad9O1fq7yFBOMa8Av_rbJBP#grid");
 			}
 			else if(xinterno == '700'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1Z8dyCIeYX2KOkFQDzRQygkw5SXRzC2TX#grid");
 			}
 			else if(xinterno == '899'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1bwY6GRbPYekETf-ODYIbxboASWzGiF-G#grid");
 			}
 			else if(xinterno == '849'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1eLtM4J-HhS1pmq4kt4FsTU4NublxNnB-#grid");
 			}
 			else if(xinterno == '828'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1TGNAnmNcxfNRaB4gsUODqzjo8G2nwoQj#grid");
 			}
 			else if(xinterno == '827'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1XJ94n2VM8S4fDnh3zco26N3dssNkrVIh#grid");
 			}
 			else if(xinterno == '820'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1erenT3J3oaAb3mpnTKrVqbqY8uqC72cp#grid");
 			}
 			else if(xinterno == '848'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1FERlp9BXtMPME483pCPGyrcahGDbU97a#grid");
 			}
 			else if(xinterno == '847'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1TmSuwjbItkXFvi4A4pXY2aYOcPrFr-kT#grid");
 			}
 			else if(xinterno == '823'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1jpcHv6AgXsvLhBnOC6qUB35GOGYL1sBA#grid");
 			}
 			else if(xinterno == '920'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1czNLOfTq8ZXljOhPMS5fvVHisXC23q5v#grid");
 			}
 			else if(xinterno == '894'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1tfh4chfOZI-4NXQIgM4bO-ip8hC9XDlm#grid");
 			}
 			else if(xinterno == '800'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1-PPeg6JTqpOIvjDwOigsrFh1kphP9RJU#grid");
 			}
 			else if(xinterno == '813'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1spGWksZlQHS-c3aYkoSMdxg0QnGDOE2e#grid");
 			}
 			else if(xinterno == '815'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1M3REpjYedIShkVi6wb0Zy48PXgj-Db5y#grid");
 			}
 			else if(xinterno == '850'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1LPkwShTA8wljhk6fMaW560dBBqEcZwgh#grid");
 			}
 			else if(xinterno == '900'){
 				window.open("https://drive.google.com/embeddedfolderview?id=1iZUBzLcMFh-bQRVGFek9CuFRWb03FKAV#grid");
 			}
 			else if(xinterno == '882'){
 				window.open("https://drive.google.com/embeddedfolderview?id=10Is9T21PLGPLpZbI01dikQkOKDmtS6yd#grid");
 			}
 		}

 		function formatPrice(fecharetiro,row){
            if (fecharetiro < hoy()){
                return '<span style="color:red;">('+fecharetiro+')</span>';
            } else {
                return fecharetiro;
            }
        }

        function printHojaVida(){
			var row = $("#dgconductores").datagrid('getSelected');
			if(row){
				var xcedulaconductor = row['cedulaconductor'];
				// var xfecha = row['fecha'];
				
				var params  = 'width='+screen.width;
	    		params += ', height='+screen.height;
	    		params += ', top=0, left=0'
	    		params += ', fullscreen=yes';

	    		window.open ("hojavidaPDF.php?cedulaconductor="+xcedulaconductor, params);			

			}else {
				$.messager.alert('Mensaje','no hay SELECCION!!!');

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

        function hoy(){
			var xhoy = new Date();
			var y = xhoy.getFullYear();
			var m = xhoy.getMonth()+1;
			var d = xhoy.getDate();
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
		}
	</script>

	<style type="text/css">
		.hc {
			background: #92D050;				
		}
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:5px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:8px;
		}
		.fitem label{
			display:inline-block;
			text-align: right;
			/*font-weight: bold;*/
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>

</body>
</html>