// inicializar vector /////////////////////////////////////////////////////////////////////////////
var vCampos = [];
var vTipos = [];
var vPrecision = [];

// function de cargue INICIAL de datos para la datagrid y variables , la aventura comienza!
function cargarDatos(ptabla,pid){
	var xtabla = ptabla;
	var xcampoid = pid;

	// inicializar la variable del nombre de la tabla
	setVar('dgtabla', 0, xtabla);

	var xurl = 'json/get_data.php?tabla='+xtabla+'&campoid='+xcampoid;
	$("#dg").datagrid({
		url:xurl
	})
}

// funcion principal de la dialog llamada desde boton OK //////////////////////////////////
function mainDlg(popcion){
	clearFrm();
	sizeDlg('50%');			

	makeVector();
	// lo ponemos a esperar que termina la anterior y luego si adicione campos
	setTimeout(function(){ addRowsDlg(popcion); },500);	
}

// adicionar rows a la ventana dialogo ////////////////////////////////////////////////////
function addRowsDlg(popcion){

	// si se edita row se le asigna el valor de una vez
	// se adiciona para new traer datos de la actual seleccion
	var row = $("#dg").datagrid('getSelected');

	if(popcion=='E'){		
		var nrow = $("#dg").datagrid('getRowIndex', row);
		// set la variable fantasma para conservar el row/dg
		// se dejan las variables nrom sola/ informativas en la dlg
		setDgRow();

		// al editar NO se muestra el boton limpiar forma
		btnLimpiar('none');

	}else {
		// para la opcion de nuevo no se muestra el boton limpiar forma
		btnLimpiar('inline-block');		
	}
	
	// guardar valor de popcion en elemente textbox 'opc1on' : N, E
	// se cambia la i por 1 solo para cuidar que no coincida con un campo
	// se adiciona el ultimo parametro para la precision del double
	// se adiciona primer parametro form- para lipiar tranquilamente
	addElement('frmencabeza','opc1on', 'opc1on', '5%', 'none', popcion, 'varchar', 0);
	addElement('frmencabeza','nrow', 'nrow', '5%', 'none', nrow, 'varchar', 0);

	// ciclo para adicionar elementos del datagrid a dialog
	var dg = $("#dg");
	var columns = dg.datagrid('options').columns[0];

	// columns.length tiene el numero de elementos de la dialog
	for(i=0; i<columns.length; i++){				
		var xlabel = columns[i].title;
		var xfield = columns[i].field;
		var xwidth = columns[i].width;				

		// validar el hidden para mostrar o no la div - el id no se muestra en editar				
		var xhidden = columns[i].hidden;
		if(xhidden){
			xdisplay = 'none';

		}else {
			xdisplay = 'block';

		}

		// camposVector determina el indice del tiposVector
		var donde = vCampos.indexOf(xfield);
		// tipo de dato
		var qtipo = vTipos[donde];
		// precision para valores
		var qprecision = vPrecision[donde];

		var qvalor = vCampos.length;
		// ------------------------------------------------

		// si se esta editando pasar el valor del campo
		// se adiciona para nuevo registro traer el reg selected
		if(popcion=='E'){
			xvalue = row[xfield];
		}else {
			// xvalue = '';
			xvalue = row[xfield];
		}

		addElement('frmdialog',xlabel, xfield, xwidth, xdisplay, xvalue, qtipo, qprecision);

	}

	showDlg(popcion);
}

function addElement(pform,plabel, pfield, pwidth, pdisplay, pvalue, ptipo, pprecision){
	$("#"+pform).append('<div class="ditem" style="display:'+pdisplay+'"><label>'+
								plabel+':</label><input id="'+
								pfield+'" type="text" value="'+
								pvalue+'"></div>');

	// adicionar clase a input depediendo del tipo
	if(ptipo=='varchar' || ptipo=='int'){
		$('#'+pfield).textbox({
			width: pwidth
		});

	}else if(ptipo=='double'){
		$('#'+pfield).numberbox({
			width: pwidth+5,
			precision:2,
			groupSeparator:','
		});

	}else if(ptipo=='date'){
		$('#'+pfield).datebox({
			width: 100,
			formatter:myformatter,
			parser:myparser
		});

	}
}

// ajustar el size del la win dialog //////////////////////////////////////////////////////
function sizeDlg(pwidth){
	$("#dlg").dialog({				
		'width': pwidth
	});			
}	

// mostrar la ventana dialog //////////////////////////////////////////////////////////////
function showDlg(popcion){
	$("#dlg").dialog('hcenter')
	$("#dlg").dialog('vcenter');
	$("#dlg").dialog('setTitle',(popcion=='N'?'NUEVO':'EDITAR')+'-REGISTRO').dialog('open');
}

function showDlgFree(pname,ptitle,pwidth,pheight){
	$("#"+pname).dialog({
		title: ptitle,
		width: pwidth,
		height: pheight,
		modal: 'true'
	});
	$("#"+pname).dialog('hcenter')
	$("#"+pname).dialog('vcenter');
	$("#"+pname).dialog('open');
}

function closeDlgFree(pname){
	$("#"+pname).dialog('close');

}

// cerrar la ventana dialog ///////////////////////////////////////////////////////////////
function closeDlg(){
	$("#dlg").dialog('close');	

}

// Eliminar elementos existentes de la ventana dialog /////////////////////////////////////
function clearFrm(){
	$("#frmencabeza div").remove();			
	$("#frmdialog div").remove();			
}

// funciones para el manejo de los vectores ///////////////////////////////////////////////
function showVector(){
	var cuantos = vCampos.length;

	alert("showVector cuantos="+cuantos);

	for(i=0; i<cuantos; i++){
		alert(vCampos[i]+'-'+vTipos[i]+'-'+vPrecision[i]);
	}
}

// function SuMajestad armar vectores de campo,tipo,precision; mis respetos!!! ////////////
function makeVector(){
	vCampos = [];
	vTipos = [];
	
	// viajar por la tabla de mysql para traer el tipo del campo
	var xaccion = 'C';
	var xtabla = 'information_schema.columns';
	var xtablename = getVar('dgtabla', 0);

	var xcamposCondicion = ['table_name'];
	var xvaloresCondicion = [xtablename];

	var xordenar = 'ordinal_position';

	$.post('json/myFileDB.php', 
		{accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion,
		 ordenar:xordenar}, 
		function(result){
			if(result.success){
				var row = result.items;
				var xcuantos = result.rowcount;

				for(i=0; i<xcuantos; i++){
					var xcampo = row[i]['COLUMN_NAME'];
					var xtipo = row[i]['DATA_TYPE'];
					var xprecision = row[i]['NUMERIC_PRECISION'];

					// $.messager.alert("Mensaje", "campo="+xcampo+" tipo="+xtipo);
					//alert("campo="+xcampo+" tipo="+xtipo);

					vCampos.push(xcampo);
					vTipos.push(xtipo);
					vPrecision.push(xprecision);

				}
			}

		}, 
	'json');
}

// function para devolver el campo mas a la izquierda de la datagrid //////////////////////
function campoId(){
	var dg = $("#dg");
	var columns = dg.datagrid('options').columns[0];
	var xfield = columns[0].field;

	return xfield;
}

// funciones de manejo de elementos para asignar y capturar el valor del elemento /////////
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

	// funciones para retornar array de campos y valores desde dialog /////////////////////////
function listarCampos(){
	var x = document.getElementById('frmdialog');
	var campos = [];			

	for(i=0; i<x.length; i++){
		// el campo -id- es descartado en la lista y el campo acc1on 
		if(x.elements[i].id!='' && x.elements[i].id.substr(0,2)!='id' && x.elements[i].id!='opc1on' && x.elements[i].id!='nrow'){
			//alert("elemento "+i+" = "+x.elements[i].id);
			campos.push(x.elements[i].id);					
				
		}
		
	}

	return campos;
}

function listarValores(){
	var x = document.getElementById('frmdialog');
	var valores = [];			

	for(i=0; i<x.length; i++){
		// el campo -id- es descartado en la lista y el campo acc1on 
		if(x.elements[i].id!='' && x.elements[i].id.substr(0,2)!='id' && x.elements[i].id!='opc1on' && x.elements[i].id!='nrow'){
			//alert("valor="+x.elements[i].value);
			//por el tipo de dato date hacer exception 
			var xclase = $("#"+x.elements[i].id).attr('class');
			if(xclase.substr(0,7)=='datebox'){
				var xfecha = $("#"+x.elements[i].id).datebox('getValue');				
				valores.push(xfecha);
			}else {
				valores.push(x.elements[i].value);	
			}
			

		}
		
	}

	return valores;
}

// funcion principal para el manejo del registro con DB - insert o update /////////////////
function registroDb(){

	// validar opcion: NUEVO o EDITAR - recordar la i por 1 en variable 'opc1on'
	var xopcion = $("#opc1on").textbox('getValue');

	// NUEVO ------------------------------------------------------------------------------
	if(xopcion=='N'){
		var xaccion = 'I';
		var xmensaje = "grabado";

	}			

	// EDITAR -----------------------------------------------------------------------------
	if(xopcion=='E'){
		var row = $("#dg").datagrid('getSelected');

		// al actualizar se captura el campo mas a la izq
		var xcampoId = campoId();

		var xcamposCondicion = [xcampoId];
		var xvaloresCondicion = [row[xcampoId]];				

		var xaccion = 'U';
		var xmensaje = "actualizado";

	}

	// myFileDB xcampos y xvalores son usados tanto para insert como para update
	var xcampos = listarCampos();
	var xvalores = listarValores();			

	// el nombre de la tabla esta en la zona fantasma
	var xtabla = getVar('dgtabla', 0);

	// solo por comodidad se hace la separacion del script ACA
	// se prodria hacer antes al evaluar 'opcion' 
	// pienso que quedaria un rico spagguetti bolonesa osea muy revuelto

	if(xaccion=='I'){
		$.post('json/myFileDB.php', 
			{accion:xaccion, tabla:xtabla, campos:xcampos, valores:xvalores}, 
			function(result){
				if(result.success){
					$.messager.alert("Mensaje", "registro "+xmensaje+" EXISTOSAMENTE!!!");
					
					$("#dg").datagrid('reload');
					closeDlg();

				}else {
					$.messager.alert("Mensaje", "compadre NARANJAS (insert) !!! - y bien agrias");

				}
			}, 
		'json');
	}

	// listo Insert, ahora vamos por el update
	if(xaccion=='U'){
		$.post('json/myFileDB.php', 
			{accion:xaccion, tabla:xtabla, camposActualizar:xcampos, valoresActualizar:xvalores,
			 camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion}, 
			function(result){
				if(result.success){

					setTimeout(function(){selectDgRow();},500);

					$.messager.alert("Mensaje", "registro "+xmensaje+" EXISTOSAMENTE!!!");							

					$("#dg").datagrid('reload');							
					closeDlg();

				}else {
					$.messager.alert("Mensaje", "compadre NARANJAS (update) !!! - y bien agrias");							

				}
			}, 
		'json');

	}

}

function eliminarReg(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		var xaccion = 'D';
		var xtabla = getVar('dgtabla', 0);

		// la function campoId() me devuelve el campo mas a la izquierda -
		var xcampoId = campoId();

		var xcamposCondicion = [xcampoId];
		var xvaloresCondicion = [row[xcampoId]];

		$.messager.confirm('Confirm','Esta seguro de eliminar REGISTRO? ',function(r){
			if (r){
				$.post('json/myFileDB.php',
					{accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion },
					function(result){
						if (result.success){
							$.messager.alert("Mensaje", "registro eliminado EXITOSAMENTE!!!");
							$('#dg').datagrid('reload');

						} else {
							$.messager.alert("Mensaje", "problems para eliminar!!!");

						}
					},
				'json');
			}
		});

	}else {
		$.messager.alert("Mensaje", "no hay registro SELECCIONADO!!!");

	}
}

// Funciones para el formato de la fehca ///////////////////////////////////////////////////
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


// SCRIPTs adicionados para la generacion dinamica de las columnas segun la tabla /////////////////
// se adiciona una div con la table 
function addDgContainer(){
	$("#containertable").remove();

	// ja ja ja aca toca devolver a dgexiste a 'N' al remove el container de la dg
	setVar('dgexiste',0,'N');

	var $newdiv1 = $('<div id="containertable"><table id="dg"><thead><tr></tr></thead></table></div>' );
	
		newdiv2 = document.createElement( "div" ),
		existingdiv1 = document.getElementById("containerdg");		
		
	$("#containerdg").append( $newdiv1, newdiv2);			

}

function addColumns(){
	var xcual = getVar('dgtabla',0)
	var xurl = 'json/dg_get_data.php?tabla='+xcual;

	$("#dg").datagrid({
		pagination: 'true',
		singleSelect: 'true',
		toolbar:'#toolbar',
		rownumbers: 'true',
		url:xurl
	}).datagrid('enableFilter');

	// $("#dg").datagrid({
	// 	view:'scrollview',
	// 	rownumbers:'true',
	// 	singleSelect:'true',
	// 	url:xurl,
	// 	autoRowHeight:'false',
	// 	pageSize:'50'		
	// }).datagrid('enableFilter');
	
}

function armarCadena(pfield,ptype,pnwidth,pcwidth){
	var cad0 = '<th field="' + pfield + '" ';

	// validar si es id para hidden 
	if(pfield=='id'){
		cad0 = cad0 + ' hidden ';
	}

	if(ptype=='int' || ptype=='double'){
		// aumertar en 5 la anchudez - calculo magico.
		var ancho = parseInt(pnwidth) * 5;
		// var ancho = 100;
		cad0 = cad0 + ' width="' + ancho +'" align="right" ';

		// adicionar data-options para formato numerico
		var formato1 = 'formatter: function(value,row){';
		var formato2 = ' return accounting.formatNumber(value,0);}';

		cad0 = cad0 + 'data-options="' + formato1 + formato2 + '" >';

	}else if(ptype=='date'){
		var ancho = 100;
		cad0 = cad0 + ' width="' + ancho + '" >'

	}else if(ptype=='varchar'){
		var ancho = parseInt(pcwidth);
		// var ancho = 1;
		cad0 = cad0 + ' width="' + ancho + '" >'

	}else {
		var ancho = 1;
		cad0 = cad0 + ' width="' + ancho + '" >'

	}

	cad0 = cad0 + pfield + '</th>';

	return cad0;
	
}

function leerCampos(){
	var xaccion = 'C';
	var xtabla = 'information_schema.columns';

	var xdbcual = getVar('dbname',0);			
	var xcual = getVar('dgtabla',0);			

	var xcamposCondicion = ['table_schema','table_name'];
	var xvaloresCondicion = [xdbcual,xcual];

	var xordenar = 'ordinal_position';

	$.post('json/myFileDB.php', 
		{accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion, 
		 valoresCondicion:xvaloresCondicion,ordenar:xordenar}, 
		function(result){
			if(result.success){						
				var rows = result.items;						

				for(i=0; i<result.rowcount; i++){
					var xfield = rows[i]['COLUMN_NAME'];
					var xtype = rows[i]['DATA_TYPE'];
					var nwidth = rows[i]['NUMERIC_PRECISION'];
					var cwidth = rows[i]['CHARACTER_MAXIMUM_LENGTH'];

					var cadena = armarCadena(xfield,xtype,nwidth,cwidth);

					$("#dg>thead>tr").append(cadena);

				}

				// estamos listos - se asigna 'S' a variable zona fantasma
				setVar('dgexiste',0,'S');

				addColumns();
				
			}else {
				alert("naranjas!!!");
			}
		}, 
	'json');

}

// funciones para conservar el row del dg seleccionado
function setDgRow(){
	var xexiste = getVar("dgexiste",0);
	var xindex = -999;
	if(xexiste=='S'){
		var row = $("#dg").datagrid("getSelected");
		if(row){
			xindex = $("#dg").datagrid("getRowIndex",row);
		}
	}
	setVar('dgrow',0,xindex);
	
}

// seleccionar row/dg desde zona fantasma, despues de regreso de edit-reg o edicion de archivo
function selectDgRow(){
	var xrow = getVar('dgrow',0);
	if(xrow!='-999'){
		$("#dg").datagrid("selectRow",xrow);
	}			
}

// funciones para el manejo del boton de limpiar form/
function limpiarDlg(){
	$("#frmdialog").form('clear');
}
function btnLimpiar(pestado){
	$("#btnLimpiar").css('display',pestado);
}
