<?php

include 'conex.php';


// (Ã¡)(Ã©)(Ã­)(Ã³)(Ãº)
// update tbmenu set menu=replace(menu,'á','Ã¡') where id=835
// (á)(é)(í)(ó)(ú)

// $result = mysqli_query($conexion, "UPDATE tbmenu SET menu=REPLACE(menu,'".
// 			htmlspecialchars("á")."','".htmlspecialchars("Ã¡")."') WHERE id=835");

// echo json_encode($result);


update tbmenu set menu=replace(menu,'á','Ã¡');
update tbmenu set menu=replace(menu,'é','Ã©');
update tbmenu set menu=replace(menu,'í','Ã­');
update tbmenu set menu=replace(menu,'ó','Ã³');
update tbmenu set menu=replace(menu,'ú','Ãº');

update tbmenu set submenu=replace(submenu,'á','Ã¡');
update tbmenu set submenu=replace(submenu,'é','Ã©');
update tbmenu set submenu=replace(submenu,'í','Ã');
update tbmenu set submenu=replace(submenu,'ó','Ã³');
update tbmenu set submenu=replace(submenu,'ú','Ãº');


// Caracter de la í
Ã­

?>