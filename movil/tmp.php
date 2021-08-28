		function addAsistencia(){
			var xruta = $("#iruta").textbox('getValue');
			var xfecha = $("#ifecha").datebox('getValue');
			var xjornada = $("#ijornada").combobox('getValue');

			if(xruta==''){
				$.messager.alert("Mensaje","ruta VACIA!!!");
				return;
			}

			if(xfecha==''){
				$.messager.alert("Mensaje","fecha VACIA!!!");
				return;
			}

			if(xjornada==''){
				$.messager.alert("Mensaje","jornada VACIA!!!");
				return;
			}
			
			validarAsistencia();

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

			$.post('json/myFileDB.php', 
				{accion:xaccion,tabla:xtabla,camposCondicion:xcamposCondicion,
				 valoresCondicion:xvaloresCondicion}, 
				 function(result){
				 	if(result.success){
				 		$.messager.alert("Mensaje","ya existe ASISTENCIA!!!");
						mostrarAsistencia();
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
						mostrarAsistencia();
					}
				}, 
			'json');

		}

		function mostrarAsistencia(){
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
				jornada:xjornada
			});

		}
