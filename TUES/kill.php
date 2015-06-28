<?php
	if (isset($_GET['del'])){
		include "config2.php";
		$UID=$_GET['del'];
		$result = mysql_query('SELECT tasks.UID FROM homeworks,tasks WHERE homeworks.UID=tasks.HWID AND homeworks.UID='.$UID);
		if (!$result) {
			echo 'Could not run query: 1' . mysql_error();
			exit;
		}else{
			$row = mysql_fetch_array($result);
		}
		
		$result = mysql_query('DELETE FROM tasks WHERE UID="'.$row[0].'"');
		if (!$result) {
			echo 'Could not run query: 2' . mysql_error();
			exit;
		}else{
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		}else{
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
?>