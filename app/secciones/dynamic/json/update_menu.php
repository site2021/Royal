<?php

include 'conn.php';

$xmenu = htmlspecialchars($_REQUEST['menu']);
$nmenu = $_REQUEST['nmenu'];

$result = mysql_query("UPDATE tbmenu SET menu='$xmenu' WHERE nmenu='$nmenu' AND id='835' ");

echo json_encode($result);

?>