<?php

$conn = @mysql_connect('localhost','root','hector');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('portal', $conn);

?>