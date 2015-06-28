<?php
	include "config2.php";
	//echo $_POST['unique'];
	$UID=$_POST['unique'];
	$result = mysql_query('DELETE FROM subs WHERE UID="'.$UID.'"');
	if (!$result) {
		echo 'Could not run query: 2' . mysql_error();
		exit;
	}else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>