<?php

$conn = @mysql_connect('db683676912.db.1and1.com','dbo683676912','Hector-0805');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('db683676912', $conn);

?>