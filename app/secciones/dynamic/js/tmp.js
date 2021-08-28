// Control de cambios en datagrid /////////////////////////////////////////////////////////
$("#dg").datagrid({
	onLoadSuccess: function(){
		alert("nrow donde estas???");

		// validar existencia del elemento nrow: selecctio dg despues ded edicion
		if(!document.getElementById("nrow")){
			var xrow = ''; // solo de relleno para dejar la !

		}else{
			// var xrow = $("#nrow").textbox('getValue');
			var xrow = 1;
			$("#dg").datagrid('selectRow', xrow);

		}
		
		// $("#dg").datagrid('enableFilter');

	}
});

