<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-8">		
		<title>RG-datos</title>

		<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/default/easyui.css">		
		<link rel="stylesheet" type="text/css" href="../../jeasyui/themes/icon.css">
		<link rel="stylesheet" type="text/css" href="css/rg.css">		

		<script type="text/javascript" src="accounting.js"></script>

		<script type="text/javascript" src="../../jeasyui/jquery.min.js"></script>
		<script type="text/javascript" src="../../jeasyui/jquery.easyui.min.js"></script>
		<script type="text/javascript" src="../../jeasyui/locale/easyui-lang-es.js"></script>

	</head>
	<body>
		<div style="margin:50px 0 0 50px">
			<input id="filtro" class="easyui-textbox" style="width:80%;height:30px"><br>
			<input id="sentencia" class="easyui-textbox" style="width:80%;height:30px"><br>
		</div>
		<script type="text/javascript">
			$("#filtro").textbox({
				onChange: function(value){
					if(value!=''){
						var xsentencia = generarFiltro(value,'CODIGO');	
						$("#sentencia").textbox('setValue',xsentencia);
						
					}
				}
			})
		</script>
		<script type="text/javascript">
			function generarFiltro(cadena,campo){
				var sentencia = '(';

				// va acumulando caracteres para filtro sencillo	
				var ctemporal = '';	
				var i=0;
				while(i<cadena.length){
					car = cadena.substr(i,1);
					//verificar si tiene filtros especiales
					if(car=='('){
						var d = i;
					
						var h = cadena.indexOf(")",i);
						var m = cadena.indexOf(":",i);
						var ld = m-(d+1);
						var lh = h-(m+1);

						var desde = cadena.substr(d+1,ld);
						var hasta = cadena.substr(m+1,lh);
						
						// generar comando a partit de parametros	
						var srango = comando(campo,desde,hasta);

						sentencia = acumular(sentencia, srango);

						//  ),
						i = h+1;

						//alert(srango);


					} else if(car==','){							
						var srango = comando(campo,ctemporal,'');
						sentencia = acumular(sentencia, srango);

						//alert('ctemporal:'+ctemporal);
						//alert(srango);

						ctemporal = '';

					} else {
						if(car!=' ' || i==cadena.length-1){
							ctemporal += car;	
						}

					}

					i++;
							
				}

				// voy los restos
				if(ctemporal!=''){
					var srango = comando(campo,ctemporal,'');
					sentencia = acumular(sentencia, srango);

				}

				sentencia += ')';
				//alert('filtro:'+sentencia);

				return sentencia;

			}

			function comando(xcampo,xdesde,xhasta){
				var nueva = '';
				if(xhasta==''){
					nueva = "(" + xcampo + " = '" + xdesde + "')";
				} else {
					nueva = "(" + xcampo + " BETWEEN '" + xdesde + "' AND '" + xhasta + "')";

				}
				return nueva;

			}

			function acumular(xsentencia, xrango){
				if(xsentencia.length>1){
					xsentencia += " OR ";
				}
				return xsentencia+xrango;
			}
		</script>
	</body>	
</html>