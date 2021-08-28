<?php

include 'conn.php';

$xnom = htmlspecialchars($_REQUEST['nom']);
$xmen = $_REQUEST['men'];
$xsub = $_REQUEST['sub'];

$result = mysql_query("UPDATE tbmenu SET submenu='$xnom' WHERE nmenu='$xmen' AND nsubmenu='$xsub' ");

echo json_encode($result);

?>