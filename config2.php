<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbLink = mysql_connect($servername, $username, $password);
	if (!$dbLink) {
		exit;
	}else{
	}
	mysql_query("SET character_set_results=utf8", $dbLink);
	mysql_select_db('TUES') or die('Could not select database');
	mysql_query("set names 'utf8'",$dbLink);
?>