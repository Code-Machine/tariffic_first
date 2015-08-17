<?php

//Connect to the DB
$DBConnect = mysql_connect("hostname","username","password");
if (!$DBConnect) {
	echo "Could not connect to the DB";
}
//select a DB
mysql_select_db("databasename",$DBConnect);

?>