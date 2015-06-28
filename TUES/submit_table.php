<?php
	include "config2.php";
	echo"hi";
	echo $_POST['subject1'];
	echo"\n";
	echo $_POST['subject2'];
	echo"\n";
	echo $_POST['subject3'];
	echo"\n";
	echo $_POST['subject4'];
	echo"\n";
	echo $_POST['weekday'];
	echo"\n";
	echo $_POST['class'];
	echo"\n";
	echo $_POST['chet'];
	echo"\n";
	$result = mysql_query('INSERT INTO subtable (time1, time2, subject, des,weekday)
							VALUES ("'.$_POST['subject1'].'","'.$_POST['subject2'].'","'.$_POST['subject3'].'","'.$_POST['subject4'].'","'.$_POST['weekday'].'")');
	if (!$result) {
		echo 'Could not run query: 1' . mysql_error();
		exit;
	}else{
		$last=mysql_insert_id();
		$result = mysql_query('INSERT INTO subs (SUBTBID, TBID)
							VALUES ("'.$last.'",(SELECT UID FROM tables WHERE chet='.$_POST['chet'].'))');
		if (!$result) {
			echo 'Could not run query: 2' . mysql_error();
			exit;
		}else{
			echo "YES";
		}
	}
?>