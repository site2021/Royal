<?php

$conn = @mysql_connect('localhost','root','royal2019*');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('ryl', $conn);

?>