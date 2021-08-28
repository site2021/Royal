<?php  

$fecha1 = strtotime('2021-02-01'); 
$fecha2 = strtotime('2021-02-15'); 
for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){ 
    if((strcmp(date('D',$fecha1),'Sun')!=0) and (strcmp(date('D',$fecha1),'Sat')!=0)){
        echo date('Y-m-d D',$fecha1); 
    }
}

?>