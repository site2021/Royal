// funciones del ALISTAMIENTO ///////////////////////////////////////////////////////////
function validarRec(){
  var xinterno = getVar('suser',0);
  var xfecha = getVar('afecha',2);

  var xaccion = 'C';
  var xtabla = 'vst_alistamientos';

  var xcamposCondicion = ['interno','fecha'];
  var xvaloresCondicion = [xinterno,xfecha];

  var xorden = 'interno';

  $.post('json/myFileDB.php',
    {accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion,
     ordenar:xorden},
    function(result){
      if(result.success){
        $.messager.alert('Mensaje','registro YA EXISTE!!!');
      }else {
        newRec();
      }
    },
  'json');

}

function newRec(){
  var xinterno = getVar('suser',0);
  
  $.post('json/alista_init.php',
    {interno:xinterno},
    function(result){
      if(result.success){
        refreshdg(xinterno,'*');
        pantalla('#dlgalista');
      }
    },
  'json');

}

function mostrarDg(pcuales){
  // actualizar datos del actual, si esta seleccionado
  var row = $("#dg").datagrid('getSelected');
  if(row){
    xindex = $("#dg").datagrid('getRowIndex',row);
    updateTabla(xindex);

  }

  var xinterno = getVar('suser',0);
  refreshdg(xinterno,pcuales);
}

function refreshdg(pinterno,pcuales){
  $("#dg").datagrid('load',{
    interno:pinterno,
    cuales:pcuales
  });
}

function grabarAlista(){
  $.messager.confirm('Confirm', 'esta seguro de GRABAR Alistamiento?', function(r){
    if (r){
      // variables de informacion general
      var xinterno = getVar('suser',0);
      var xfecha = getVar('afecha',2);

      // liberar la fila actual
      // accept();

      $.post('json/alista_grabar.php',
        {interno:xinterno, fecha:xfecha},
        function(result){
          if(result.success){
            $.messager.alert('Mensaje','alistamiento grabado EXITOSAMENTE!!!');
            // esto es zona 51 ni por espacio aereo     

          }else { 
            $.messager.alert('Mensaje','problemas grabar!!!');
          }
        },
      'json');

      updateDg();
      cerrar('#dlgalista');


    }
  });     

}

function updateDg(){
  var xinterno = getVar('suser',0);

  $("#dgalista").datagrid('load',{
    interno:xinterno
  }).datagrid('reload');

}

function printAlista(){
  var row = $("#dgalista").datagrid('getSelected');
  if(row){
    var xinterno = row['interno'];
    var xfecha = row['fecha'];
    
    var params  = 'width='+screen.width;
      params += ', height='+screen.height;
      params += ', top=0, left=0'
      params += ', fullscreen=yes';

      window.open ("alistaPDF.php?interno="+xinterno+"&fecha="+xfecha, params);     

  }else {
    $.messager.alert('Mensaje','no hay SELECCION!!!');

  }
}
