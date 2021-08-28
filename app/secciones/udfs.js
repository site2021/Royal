	// ------------ UDF funciones complementarias-------------------------------------------------------			
	function leer_valor_lista(campo){
		var cadena = $(campo).val();
		if (cadena=="Aplica"){
			var valor=1;
		} else {
			var valor=0;
		}
		return valor;
		
	}

	function asignar_valor(campo, valor, decimales){
		var xx = v_c(valor,decimales,".",",")
		$(campo).val(xx);
	}

	function leer_valor(campo){
		var cadena = $(campo).val();
		numero = c_v(cadena);
		return numero;
		
	}

	function v_c(numero, decimales, separador_decimal, separador_miles)
	{ // v2007-08-06     
		numero=parseFloat(numero);     
		if(isNaN(numero)){         
			return "";     
		}     
		
		if(decimales!==undefined){         
			// Redondeamos         
			numero=numero.toFixed(decimales);     
		
		}     
		
		// Convertimos el punto en separador_decimal     
		numero=numero.toString().replace(".", 
		separador_decimal!==undefined ? separador_decimal : ",");     
		
		if(separador_miles){         
			// Añadimos los separadores de miles         
			var miles=new RegExp("(-?[0-9]+)([0-9]{3})");         
			while(miles.test(numero)) {             
				numero=numero.replace(miles, "$1" + separador_miles 
				+ "$2");         
			}     
		}     
		
		return numero; 
		
	} 


	function c_v(cadena)
	{
		cadena=cadena.replace(/,/g,"");
		var numero = parseFloat(cadena);
		return numero;

	}

	// --------------------------------------------------------------------------------------------------

	
	// ---------------- funciones de tablas -------------------------------------------------------------
		function clearForm(){				
			$("#tuno tbody").html("");
		}

		function cargarArchivo(){
			window.open ("importar.php","mywindow","menubar=1,resizable=1,width=350,height=250");

		}
		
		function cargarDatos(){			
			var url="JSON/cargardatos.php";		
			$("#tuno tbody").html("");
			$.getJSON(url,function(registros){
				if (registros.length==0){
							parent.document.getElementById("ipage").height="250px";	
							$.messager.alert('Mensaje','no hay datos para mostrar, cargue datos con [Archivo] !!!','info');
							parent.document.getElementById("ipage").height="2050px";	
				} else {
					$.each(registros, function(i,registro){
					var newRow =
					"<tr>"
					+"<td><input id=mes"+i+" class=valor value="+registro.id+"></td>"
					+"<td><input id=c1f"+i+" class=valor value="+registro.c01+"></td>"
					+"<td><input id=c2f"+i+" class=valor value="+registro.c02+"></td>"
					+"<td><input id=c3f"+i+" class=valor value="+registro.c03+"></td>"
					+"<td><input id=c4f"+i+" class=valor value="+registro.c04+"></td>"
					+"<td><input id=c5f"+i+" class=valor value="+registro.c05+"></td>"					
					+"<td><input id=c6f"+i+" class=valor value="+registro.c06+"></td>"
					+"<td><input id=c7f"+i+" class=valor value="+registro.c07+"></td>"
					+"<td><input id=c8f"+i+" class=valor value="+registro.c08+"></td>"
					+"<td><input id=c9f"+i+" class=valor value="+registro.c09+"></td>"
					+"<td><input id=c10f"+i+" class=valor value="+registro.c10+"></td>"
					+"<td><input id=c11f"+i+" class=valor value="+registro.c11+"></td>"
					+"<td><input id=c12f"+i+" class=valor value="+registro.c12+"></td>"
					+"<td><input id=c13f"+i+" class=valor value="+registro.c13+"></td>"
					+"<td><input id=c14f"+i+" class=valor value="+registro.c14+"></td>"
					+"<td><input id=c15f"+i+" class=valor value="+registro.c15+"></td>"
					+"<td><input id=c16f"+i+" class=valor value="+registro.c16+"></td>"
					+"<td><input id=c17f"+i+" class=valor value="+registro.c17+"></td>"
					+"<td><input id=c18f"+i+" class=valor value="+registro.c18+"></td>"
					+"<td><input id=c19f"+i+" class=valor value="+registro.c19+"></td>"
					+"<td><input id=c20f"+i+" class=valor value="+registro.c20+"></td>"
					+"<td><input id=c21f"+i+" class=valor value="+registro.c21+"></td>"
					+"<td><input id=c22f"+i+" class=valor value="+registro.c22+"></td>"
					+"<td><input id=c23f"+i+" class=valor value="+registro.c23+"></td>"
					+"<td><input id=c24f"+i+" class=valor value="+registro.c24+"></td>"
					+"<td><input id=c25f"+i+" class=valor value="+registro.c25+"></td>"
					+"<td><input id=c26f"+i+" class=valor value="+registro.c26+"></td>"					
					+"</tr>";
					$(newRow).appendTo("#tuno tbody");
					});
				}
			});				
		}
		
		
		function leerValor(){
			for (i=0;i<12;i++) {
				var xvalor = $("#c1f"+i).val();
				alert(i + "-" + xvalor);
			}
			
		}
		
		function borrarTabla(){			
		
			iframe_estado(0);
			$.messager.confirm('Confirmar','Esta seguro de eliminar la tabla de datos?',function(r){
				if (r){
					$.post('JSON/borrardatos.php',{},function(result){
						if (result.success){
							mensaje('la tabla fue eliminada EXITOSAMENTE!!!');
							
						} else {
							$.messager.show({	// show 
								title: 'Error',
								msg: result.errorMsg
							});
						}
					},'json');
				} else {
					iframe_estado(1);
				}
					
			});			
			$("#tuno tbody").html("");
		}
	
		//--- muestra mensaje ------------------------------------------------
		function mensaje(xmensaje){
			iframe_estado(0);
			$.messager.alert('Mensaje',xmensaje,'info');	
			iframe_estado(1);
			
		}
		
		//--- reduce o amplia tamaño del iframe para mostrar ventana $message.alert() -----------------
		function iframe_estado(xestado){
			// recortar el iframe
			if (xestado==0){
				parent.document.getElementById("ipage").height="350px";
			}
			if (xestado==1){
				parent.document.getElementById("ipage").height="2050px";
			}
			
		}
		
		function capacidad() {
			var xcapmax=leer_valor("#capmax");
			var xurl='JSON/finan002.php?capmax='+xcapmax;
			
			$(function(){
				$('#tcap').datagrid({
					title:'Distribucion por Rangos de Distancia',
					headerCls:'ht',		
					width:'100%',
					height:400,
					collapsible:true,
					showFooter: true,					
					url:xurl,
					columns:[[
						{field:'c29',title:'',width:50},
						{field:'c30',title:'',width:150},
						{field:'stotal',title:'Tons',width:100,align:'right'},
						{field:'acumu',title:'Acumulado',width:100,align:'right'},
						{field:'producto',title:'Tons x Rango',width:100,align:'right'},
						{field:'porc',title:'% x Rango',width:100,align:'right'},
						{field:'prodis',title:'DisProm',width:100,align:'right'},
					]]				
				});
			});
			
			
			
		}	
		
		function mostrar_footer(){
			var rows = $('#tcap').datagrid('getFooterRows');
			asignar_valor("#dpromedio",rows[0]['prodis'],2);

		}
		
		