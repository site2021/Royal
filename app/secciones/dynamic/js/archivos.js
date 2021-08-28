/* SCRIPTs para el manejo de archivos cargue, marcado y eliminacion /////////////////////////////// */
function cargarArchi(){
	showDlgFree('dlgCargar','Cargar ARCHIVOS','50%','50%');
}

function importarCSV(){
	// compadre ahi le va el valor de la tabla 
	var xtabla = getVar('cmbtablas',3);
	$("#itabla").val(xtabla);
	showDlgFree('dlgImportar','Importar ARCHIVOS-CSV','50%','50%');
}

// invocar un formulario vacio para limpiar el cache
function limpiarSubmit(){
	showDlgFree('dlgVacio','vaciar CACHE','30%','30%');	
}

function botonLimpiarSubmit(){
	$("#submit").click();	
	// document.frmvacio.submit();
}

function marcarTodos(){
	$("#dgarchivos").datagrid('selectAll');
}

function desMarcarTodos(){
	$("#dgarchivos").datagrid('unselectAll');	
}

// eliminar archivo en la carpeta 'files'
function eliminarFiles(parchivo){
	// validar el origen para borrar C-cargue (files/), A-carpeta (../web/{carpeta})
	var xtipo = getVar('cmbtipo',3);
	if(xtipo=='C'){
		var xpath = '../files/';

	}else if(xtipo=='A'){
		var xtabla = $("#cmbtablas").combobox('getText');
		var xpath = '../../web/'+xtabla+'/';

	}
	
	var xarchivo = xpath + parchivo;

	$.post('json/eliminarArchivo.php',
		{archivo:xarchivo},
		function(result){
			if(result.success){
				// alert("archivo elimnado");
				$("#dgarchivos").datagrid('reload');
			}
		},
	'json');
}

// eliminar TODOS los archivos marcados
function eliminarArchivos(){
	var rows = $("#dgarchivos").datagrid('getSelections');

	if(rows!=''){
		$.messager.confirm('Confirm', 'esta seguro de ELIMINAR archivos marcados?', function(r){
			if(r){
				for(i=0;i<rows.length;i++){
					var xarchivo = rows[i]['archivo'];
					// alert("archivo="+xarchivo);
					eliminarFiles(xarchivo);
				}
			}
		} );		
	}else {
		$.messager.alert('Mensaje','seleccion VACIA!!!');
	}
	
}

/* SCRIPT para el visor de archivos /////////////////////////////////////////////////////////////// */
function visorArchi(){
	var xtabla = $("#cmbtablas").combobox('getText');

	// limpiar campo visor-archivo
	setVar('visor-archivo',0,'');
	setVar('id-tabla',0,'');
	setVar('id-row',0,'');

	if(xtabla!=''){
		$("#visor-container").remove();

		// leer row seleccionada de dg
		setDgRow();
		// iniciar interfase/colores		
		inicioVisor();
		
		// mostrar dlg - visor
		showDlgFree('dlgVisor','Visor ARCHIVOS ('+xtabla+')','80%','80%');
		
	}else {
		$.messager.alert('Mensaje','Seleccion VACIA!!!');
	}
	
}

// funcion adicional para pausar el video en caso de que se este ejecutando y se cierre la panta
function videoCerrar(){
	// pausar el video si se esta reproduciendo
	var myVideo = document.getElementById("video1");
	if(myVideo){
		if(myVideo.play){
			myVideo.pause();
		}
	}
}

// se adiciona function para el cerrado del visor apagar video si es el caso y
// y seleccionar registro dado el caso
function visorCerrar(){
	videoCerrar();
	selectDgRow();
}


// asignar archivo a tabla
function asignarArchivo(){
	// asignamos archivo escogido a tabla
	$.messager.confirm('Confirm', 'esta seguro de ASIGNAR archivo escogido?', function(r){
		if(r){
			asignarArchivoTabla();
		}
	});
}

// ahora si que se puso buena la joda, myFileDB.php a la orden!!!
function asignarArchivoTabla(){
	var xtabla = $("#cmbtablas").combobox('getValue');
	var xcampo = $("#cmbcampos").combobox('getText');
	var xarchivo = getVar('visor-archivo',0);
	var xid = getVar('id-tabla',0);
	var xrow = getVar('id-row',0);

	// alert("tabla="+xtabla+' campo='+xcampo+" id="+xid+" archivo="+xarchivo);

	var xaccion = 'U';	
	var xcamposActualizar = [xcampo];
	var xvaloresActualizar = [xarchivo]
	var xcamposCondicion = ['id'];
	var xvaloresCondicion = [xid];

	$.post('json/myFileDB.php',
		{accion:xaccion, tabla:xtabla, camposActualizar:xcamposActualizar, valoresActualizar:xvaloresActualizar,
		 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion},
		function(result){
			if(result.success){
				
				$("#dg").datagrid('reload');

				copiarArchivo();
				
				$.messager.alert("Mensaje", "cambio realizado EXITOSAMENTE!!!");				

			}else {
				$.messager.alert("Mensaje", "naranjas y bien agrias las hijueputas!!!");
			}
		},
	'json');

}

function copiarArchivo(){
	var xarchivo = getVar('visor-archivo',0);
	var xhasta = $("#cmbtablas").combobox('getText');

	$.post('json/copiarArchivo.php',
		{archivo:xarchivo, hasta:xhasta},
		function(result){
			if(result.success){
				$.messager.alert("Mensaje","archivo copiado EXITOSAMENTE!!!");
			}
		},
	'json');
}

// SCRIPTSes para dg de archivos ------------------------------------------------------------------
function addDgContainerArchivos(){
	$("#containertablearchivos").remove();

	// ja ja ja aca toca devolver a dgexiste a 'N' al remove el container de la dg
	// setVar('dgexiste',0,'N');

	var $newdiv1 = $('<div id="containertablearchivos" class="tablearchivos"><table id="dgarchivos" style="width:100%;height:100%"><thead><tr></tr></thead></table></div>');
	
		newdiv2 = document.createElement( "div" ),
		existingdiv1 = document.getElementById("containerdgarchivos");
		
	$("#containerdgarchivos").append( $newdiv1, newdiv2);

	// perdon por la chambonada 
	$("#dgarchivos>thead>tr").append('<th field="archivo" width="260">Archivo</th>');
	$("#dgarchivos>thead>tr").append('<th field="tipo" width="45">Tipo</th>');
	$("#dgarchivos>thead>tr").append('<th field="ancho" width="50" align="right">Ancho</th>');
	$("#dgarchivos>thead>tr").append('<th field="alto" width="50" align="right">Alto</th>');

	// y por fin definimos el url
	var xtipo = getVar('cmbtipo',3);
	if(xtipo=='C'){
		var xpath = "../files/";

	}else if(xtipo=='A'){
		// el text del combo tablas corresponde a la carpeta en ../../web/
		var xtabla = $("#cmbtablas").combobox('getText');
		var xpath = "../../web/"+xtabla;
	}

	var xurl = "json/listarArchivos.php?path="+xpath;

	$("#dgarchivos").datagrid({
		// pagination: 'true',
		// singleSelect: 'true',
		// toolbar:'#toolbar',		
		rownumbers: 'true',
		url:xurl
	}).datagrid({
		onDblClickRow: function(){
			// validar el doble click en la grid de archivos cargados
			verArchivo('C');
		}
	}).datagrid('enableFilter');

}
