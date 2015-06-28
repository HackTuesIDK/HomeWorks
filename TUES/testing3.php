
<?php
	include "./config2.php";
	//$result = mysql_query("SELECT * FROM Classes");
	//while ($row = mysql_fetch_array($result)){
	//	print_r($row);
	//}
	header('Content-Type: text/html; charset=utf-8');
	$result = mysql_query("SELECT name FROM Classes");
	if (!$result) {
			echo 'Could not run query: ' . mysql_error();
			exit;
	}else{
		$i = 0;
		echo '<div>';
		while ($row = mysql_fetch_array($result)){
			//print_r($row);
			$i++;
			if($i == 1) {
				echo '<p id = "Classes">';
			}
			echo '<a id = "choose_class" href="classes.php?class='.$row[0].'">'.$row[0].'</a>';
			if($i == 4) {
				$i = 0;
				echo '</p>';
			}
		}
		echo '</div>';
	}
?>