// popcion puede ser C-cargue, T-tabla
function verArchivo(popcion){
	if(popcion=='C'){
		// cambiar color a fondo para identificar origen
		colorFondo('bordes-visor-archivo','blue');
		var row = $("#dgarchivos").datagrid('getSelections');

	}else if(popcion=='T'){
		// cambiar color a fondo para identificar origen
		colorFondo('bordes-visor-archivo','red');
		var row = $("#dg").datagrid('getSelections');

	}

	// validar la seleccion dgarchivo o dg 
	if(row.length==0){
		$.messager.alert("Mensaje","seleccion VACIA!!!");
		return;
	}else {
		if(row.length>1){
			$.messager.alert("Mensaje","seleccion ERRADA!!!");
			return;
		}else {
			// validar el origen para seleccionar columna del row
			if(popcion=='C'){
				// compadre!, si viene desde cargue hay que validar si es 
				// files/ cargados o desde carpeta web/
				var xtipo = getVar('cmbtipo',3);
				if(xtipo=='C'){
					var xpath = 'files/';	
				}else if(xtipo=='A'){
					var xtabla = $("#cmbtablas").combobox('getText');
					var xpath = '../web/'+xtabla+'/';
				}
				
				var xarchivo = row[0]['archivo'];
				var xtipo = row[0]['tipo'];
				var xancho = row[0]['ancho'];
				var xalto = row[0]['alto'];

				// asignar nombre a archivo a textbox
				setVar('visor-archivo',0,xarchivo);

			}else if(popcion=='T'){
				// a esta 
				var xtabla = $("#cmbtablas").combobox('getText');
				var xpath = '../web/'+xtabla+'/';

				var xarchivo = getVar('visor-archivo',0);

				var iancho = getVar('iancho',0);
				var ialto = getVar('ialto',0);

				var xancho = parseInt(iancho);
				var xalto = parseInt(ialto);

				var xtipo = getVar('itipo',0);

			}

		}
	}
		
	// dependiendo del tipo de archivo se selecciona el contenido
	// video
	if(xtipo=='mp4'){
		var x1 = '<video id="video1" width="99.5%" height="100%" poster="" autoplay controls>';
		var x2 = '		<source src="'+xpath+xarchivo+'">';
		var x3 = '</video>';
		var xcontenido = x1 + x2 + x3;		
	}

	// pdf
	if(xtipo=='pdf'){
		var xcontenido = '<iframe src="'+xpath+xarchivo+'" width="99%" height="100%"></iframe>';
	}

	// y ahora los tan anhelados jpg, png si estas muy aleta!!!
	// pero antes hay que calcular los porcentajes dependiendo del tamaño
	// hay tres casos w=h, w>h, w<h
	// w=h
	if(xancho==xalto){
		var pancho = "80%";
		var palto = "100%";
	}
	// w>h
	if(xancho>xalto){
		var pancho = "100%";
		var nalto = ((xalto/xancho) * 100) + 2;
		var palto = nalto + "%";
	}
	// w<h
	if(xancho<xalto){
		var palto = "100%";		
		var nancho = ((xancho/xalto) * 100) - 10;
		var pancho = nancho + "%";
	}

	// con su permiso guardo los valores ancho y alto para la modal
	setVar('wancho',0,pancho);
	setVar('walto',0,palto);

	// ahora si lo adicionamos
	// teniendo en cuenta la clase de la imagen: cargue, tabla		
	if(xtipo=='jpg' || xtipo=='png' || xtipo=='gif'){
		var xcontenido = '<img src="'+xpath+xarchivo+'" class="visor-container-img" width="'+pancho+
						 '" height="'+palto+'" onclick="" '+'>';
	}

	$("#visor-container").remove();

	var $newdiv1 = $('<div id="visor-container">'+xcontenido+'</div>');
	
	newdiv2 = document.createElement( "div" ),
			  existingdiv1 = document.getElementById("div-visor-archivo");
		
	$("#div-visor-archivo").append( $newdiv1, newdiv2);

	// probemos si adicionando la clase lo pinta azul
	$("#visor-container").addClass('visor-container-class');

	// desmarcar los registros marcados
	desMarcarTodos();

}

// function get archivo con path dependiendo: tabla, lista(cargue,carpeta)
// las validaciones se hacen verArchivo()
function getPathArchivo(pdesde){
	if(pdesde=='T'){
		var xarchivo = '';
		// validar si hay registro seleccionado
		var row = $("#dg").datagrid('getSelected');
		if(row){
			// validar el campo de la tabla
			xcampo = $("#cmbcampos").combobox('getText');
			if(xcampo!=''){
				// extraer la carpeta desde la tabla - getText
				xcarpeta = $("#cmbtablas").combobox('getText');

				xarchivo = xcarpeta +'/' + row[xcampo];

				// guardar el nombre del archivo en el campo visor-archivo (la que cambia de color)
				// validar si el archivo no ha sido asignado
				if(row[xcampo]==''){
					setVar('visor-archivo',0,'-vacio-');
				}else {
					setVar('visor-archivo',0,row[xcampo]);	
				}
				
				// asignamos el id del registro para actualizacion
				var xid = row['id'];					
				setVar('id-tabla',0,xid);

				// aca la cagamos porque me toca leer solo una, suponemos que hay solo una
				var xrowindex = $("#dg").datagrid('getRowIndex',row);
				setVar('id-row',0,xrowindex);

			}else{
				$.messager.alert("Mensaje","no hay -campo- SELECCIONADO!!!");

			}
		}else {
			$.messager.alert("Mensaje","no hay -registro- SELECCIONADO!!!");

		}

	}

	return xarchivo;

}

// extraer dimensiones desde archivo
function dimArchivo(parchivo){
	$.post('json/get_imagen.php',
		{archivo:parchivo},
		function(result){
			if(result.success){
				var xancho = result.ancho;
				var xalto = result.alto;
				setVar('iancho',0,xancho);
				setVar('ialto',0,xalto);

				// este ver es para imagenes
				setTimeout(function(){ verArchivo('T') },100);

			}else {
				$.messager.alert("Mensaje","naranjas");

			}
		},
	'json');
}

// function mostrar registro actual - llamado desde btn de dlg 
function mostrarActual(){
	var xarchivo = getPathArchivo('T');

	if(xarchivo!=''){
		// si el archivo devuelto es imagen: jpg, png, traer dimensiones
		var warchivo = xarchivo.split('.');		
		var wtipo = warchivo[1];

		// asignamos a la variable fantasma
		setVar('itipo',0,wtipo);

		// evaluamos el tipo de archivo toUpperCase para linux
		if(wtipo.toUpperCase()=='JPG' || wtipo.toUpperCase()=='PNG'){
			dimArchivo('../../web/'+xarchivo);

		}else {
			verArchivo('T');
		}

	}

	
}