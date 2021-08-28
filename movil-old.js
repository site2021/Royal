// funciones de navegacion //////////////////////////////////////////////////////////////
function irInicio(){
  $.mobile.go('#inicio');
}

function irAlista(){
  var xhoy = hoy();
  setVar('afecha',2,xhoy);
  updateDg();

  $.mobile.go('#alista');
}

function irAsistencia(){
  $.mobile.go('#asistencia');  
}

function irClima(){
  $.mobile.go('#clima');  
}

function irVia(){
  $.mobile.go('#via');  
}

function irMantenimiento(){
  updateDgMtos();  
  $.mobile.go('#mantenimiento');
}

function updateDgMtos(){
  var xusuario = getVar('suser',0);
  $('#dgmantenimiento').datagrid('load',{
    interno:xusuario
  }).datagrid('enableFilter');
}
// funciones para el menu ///////////////////////////////////////////////////////////////
function mostrarMenu(qperfil){
  if(qperfil=='01'){definirMenu(0,0,1);}
  if(qperfil=='02'){definirMenu(1,1,0);}
}

function definirMenu(p1,p2,p3,p4,p5,p6){
  document.getElementById("mlista").style.display=(p1==0?'none':'block');
  document.getElementById("masistencia").style.display=(p2==0?'none':'block');
  document.getElementById("minformes").style.display=(p3==0?'none':'block');
  document.getElementById("mclima").style.display=(p4==0?'none':'block');
  document.getElementById("mvia").style.display=(p5==0?'none':'block');
  document.getElementById("mmantenimiento").style.display=(p6==0?'none':'block');
}

// funciones manejo de pantala //////////////////////////////////////////////////////////
function pantalla(pnombre){
  $(pnombre).dialog('hcenter');
  $(pnombre).dialog('vcenter');       
  $(pnombre).dialog('open');
}

function cerrar(pnombre){
  $(pnombre).dialog('close');
}

// funciones de manejo de elementos para asignar y capturar el valor del elemento ///////
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

function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
      $("#xfull").textbox('setValue','S');
      //alert('3w')
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen(); 
      //alert('1')
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
      //alert('2')
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();
      $("#xfull").textbox('setValue','N');
      //alert('3')
    }  
  }  
}

function hoy(){
  var xhoy = new Date();
  var y = xhoy.getFullYear();
  var m = xhoy.getMonth()+1;
  var d = xhoy.getDate();
  return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
}

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

function quehora(){
  var ahora = new Date();
  var hora = ahora.getHours()+':'+ahora.getMinutes();
  $('#hora').timespinner('setValue', hora);           
}
