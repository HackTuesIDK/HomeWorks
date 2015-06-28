<?php
	include "config2.php";
	$result = mysql_query('INSERT INTO tables (chet, classID)
							VALUES ("0","14")');
	if (!$result) {
		echo 'Could not run query: 1' . mysql_error();
		exit;
	}else{
		echo"yey";
	}
?>