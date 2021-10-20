// funciones para el manejo de USUARIO: usuario/conductor ///////////////////////////////
function validarUsuario(){
  var xusuario = getVar('usuario',0);
  var xclave = getVar('clave',0);

  //alert(xusuario+' '+xclave);

  // buscar x usuario 
  var xaccion = 'C';
  var xtabla = 'tbusuarios';

  var xcamposCondicion = ['usuario','clave'];
  var xvaloresCondicion = [xusuario,xclave];

  var xorden = 'usuario';

  $.post('json/myFileDB.php',
    {accion:xaccion, tabla:xtabla, camposCondicion:xcamposCondicion, valoresCondicion:xvaloresCondicion,
     ordenar:xorden},
    function(result){
      var xreg = result.rowcount;
      if(xreg>0){
        var reg = result.items;
        var xnombre = reg[0]['nombre'];
        var xciudad = reg[0]['ciudad'];

        setVar('suser',0,xusuario);
        setVar('snombre',0,xnombre);
        setVar('sciudad',0,xciudad);

        cerrar('#dlg1');
        mostrarMenu('01');
        $.mobile.go('#menu');

      }else {
        validarConductor();

      }
    },
  'json');

}

function validarConductor(){
  var xusuario = getVar('usuario',0);
  var xclave = getVar('clave',0);

  // validar claves usuario/conductor
  if(xclave != xusuario){
    $.messager.alert('Mensaje', 'error USUARIO/CLAVE');
    return;
  }

  var xaccion = 'C';
  var xtabla = 'tbdatosveh';

  var xcamposCondicion = ['interno'];
  var xvaloresCondicion = [xusuario];

  var xorden = 'interno';

  $.post('json/myFileDB.php',
    {
      accion:xaccion, 
      tabla:xtabla, 
      camposCondicion:xcamposCondicion, 
      valoresCondicion:xvaloresCondicion,
      ordenar:xorden
    },

    function(result){
      if(result.success){
        var reg = result.items;
        var xnombre = reg[0]['nombreconductor'];            
        setVar('suser',0,xusuario);
        setVar('snombre',0,xnombre);
        setVar('sciudad',0,'');

        cerrar('#dlg1');
        mostrarMenu('02');
        $.mobile.go('#menu');

      }else {
        $.messager.alert('Mensaje', 'error USUARIO/CLAVE');

      }
    },
  'json');

}

function login(){
  var efull = getVar('xfull',0);
  if(efull=='N'){     
    toggleFullScreen();
    setVar('xfull',0,'S');        
  }

  setVar('usuario',0,'');
  setVar('clave',0,'');

  pantalla('#dlg1');
  
}
