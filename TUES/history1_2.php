<head>
	<link rel="stylesheet" type="text/css" href="HomeWorks.css">
</head>
<?php
	include "./config2.php";
	//$result = mysql_query("SELECT * FROM Classes");
	//while ($row = mysql_fetch_array($result)){
	//	print_r($row);
	//}
	header('Content-Type: text/html; charset=utf-8');
	echo '<table>';
	session_start();
	if((!isset($_GET["class"])) && (!isset($_SESSION["class"]))){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}elseif(!isset($_SESSION["class"])){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}elseif(!isset($_GET["class"])){
		header('Location: history1_2.php?class='.$_SESSION["class"]);
	}
	$result = mysql_query("SELECT DISTINCT Classes.name,homeworks.date,WEEKDAY(date) FROM Classes, Homeworks, Tasks  WHERE tasks.ClassId = Classes.UID AND homeworks.UID = tasks.HWID AND classes.name = \"".$_GET["class"]."\" ORDER BY date ASC ");
	if (!$result) {
			echo 'Could not run query: ' . mysql_error();
			exit;
	}else{
		while ($row = mysql_fetch_array($result)){
			//print_r($row);
			echo '<table style = "float: left;">';
			echo '<th>';
			$date=explode(" ",$row[1]);
			echo " ";
			switch($row[2]){
				case 0: echo 'ЗА ПОНЕДЕЛНИК - ';
				break;
				case 1: echo 'ЗА ВТОРНИК - ';
				break;
				case 2: echo 'ЗА СРЯДА - ';
				break;
				case 3: echo 'ЗА ЧЕТВЪРТЪК - ';
				break;
				case 4: echo 'ЗА ПЕТЪК - ';
				break;
				case 5: echo 'ЗА СЪБОТА - ';
				break;
				case 6: echo 'ЗА НЕДЕЛЯ - ';
				break;
					
			}
			echo $date[0];//time
			
			echo '</th>';
			$result2 = mysql_query("SELECT homeworks.Title, homeworks.Description, homeworks.UID FROM Classes, homeworks, tasks WHERE tasks.ClassId = Classes.UID AND homeworks.UID = tasks.HWID AND classes.name='".$row[0]."' AND homeworks.date = '".$row[1]."' ORDER BY (date)");
			if (!$result2) {
					echo 'Could not run query: ' . mysql_error();
					exit;
			}else{
				echo '<tr>';
				while ($row = mysql_fetch_array($result2)){
					
						echo '<tr><td>';
						//echo '<div id="heading_hwnim">'.$row[0].'</div>';
						echo '<div id="heading_hw">'.$row[0].'</div>';//title    "<div id='UID' style='font-size:15px;margin-top:-25px;'>".$row[2]."</div>".
						echo '<div id="data_hw">'.$row[1].'</div>';//des
						echo '<div id="data_hw"></div>';
						echo '<button onclick="del('.$row[2].')" style="background-color:red; margin-left:0%;width:100%">delete</button>';
						echo '<br/></td></tr>';
				}
				echo '</tr>';
				echo '</table>';
			}
		}
	}
	echo '</table>';
	echo '<div style = "clear: both;"></div>';
?>
<script>
	function del(UID){
		if (confirm('Are you sure you want to delete this thing from the database?')) {
			if (confirm('Are you really really sure you want to delete this thing from the database?')) {
				window.location.href = 'kill.php?del='+UID;
			}
		}
	}
</script>