<html><head><meta content="text/html; charset=UTF-8;" http-equiv="content-type"><title>11b HomeWorks 2014-2015</title><link rel="stylesheet" type="text/css" href="HomeWorks.css">
</head><body><table border="2" style="border-collapse: collapse"><a href = "index.php"><img id="logo" src="logo.png" style="width:600px; height:60px;" alt="Заглавието трябваше да е тук" /></a>
<p>Най-съществените задачи - по срок на изпълнение:
ПОСЛЕДНО АКТУАЛИЗИРАНЕ - Fri Jun 26 10:45:49 2015
</p>
<?php
	include "menu.php";
	include "testing2.php";
	$ddate = date("Y-m-d");
	$date = new DateTime($ddate);
	$week = $date->format("W");
	//echo "Weeknummer: $week";
	if($week&1) {
		$odd=1;
	} else {
		$odd=0;
	}
	$result= mysql_query('SELECT UID FROM classes WHERE name="'.$_GET['class'].'"');
	if (!$result) {
		echo 'Could not run query: 0' . mysql_error();
		exit;
	}else{
		$row = mysql_fetch_array($result);
		if ($row[0] == ""){
			echo "Invalid Class '".$_GET['auto']."'.";
			exit;
		}else{
			$class=$row[0];
		}
	}
	if (isset($_GET["class"])){
		//echo "THE CLASS IS ".$_GET["class"];
	}else{
		header('Location: index.php');
	}
	echo '<table id = "programatatable">';
	for ($q=0;$q<7;$q++){
		echo '<th id = "programatath" colspan="5">';
		switch($q){
			case 1: echo'Понеделник';
			break;
			case 2: echo'Вторник';
			break;
			case 3: echo'Сряда';
			break;
			case 4: echo'Четвъртък';
			break;
			case 5: echo'Петък';
			break;
			case 6: echo'Събота';
			break;
			case 0: echo'Неделя';
			break;
		}
		echo '</th>';
		echo '<tr>';
		$used=0;
		$result = mysql_query('SELECT time1,time2,subject,des FROM tables AS x,subs AS y,subtable AS z WHERE x.UID=y.TBID AND z.UID=y.SUBTBID AND x.chet="'.$odd.'" AND z.weekday="'.$q.'" AND classID="'.$class.'" ORDER BY (time1)');
		if (!$result) {
			echo 'Could not run query: 1' . mysql_error();
			exit;
		}
		for ($i=1;$i<=10;$i++){
			echo '<tr>';
			while ($row = mysql_fetch_array($result)){
				//print_r($row);
				echo '<form name="form" action="submit_table.php" method="POST">';
				echo '<td id = "programatatd"><input type="text" name="subject1" id="subject" value="'.$row[0].'" placeholder="Start time", size="7"></td>';
				echo '<td id = "programatatd"><input type="text" name="subject2" id="subject" value="'.$row[1].'" placeholder="Final time", size="7"></td>';
				echo '<td id = "programatatd2"><input type="text" name="subject3" id="subject" value="'.$row[2].'" placeholder="Subject"></td>';
				echo '<td id = "programatatd"><input type="text" name="subject4" id="subject" value="'.$row[3].'" placeholder="info", size="2"></td>';
				echo '<input type="hidden" name="weekday" value="'.$q.'"></input>';
				echo '<input type="hidden" name="class" value="'.$_GET["class"].'"></input>';
				echo '<input type="hidden" name="chet" value="'.$odd.'"></input>';
				echo '<td id = "programatatd"><input type="submit" value="Submit"></input></td>';
				echo '</form>';
				$used=1;
			}
			if($used==1){
				$used=0;
			}else{
				echo '<form name="form" action="submit_table.php" method="POST">';
				echo '<td id = "programatatd"><input type="text" name="subject1" id="subject" value="" placeholder="Start time", size="7"></td>';
				echo '<td id = "programatatd"><input type="text" name="subject2" id="subject" value="" placeholder="Final time", size="7"></td>';
				echo '<td id = "programatatd2"><input type="text" name="subject3" id="subject" value="" placeholder="Subject"></td>';
				echo '<td id = "programatatd"><input type="text" name="subject4" id="subject" value="" placeholder="info", size="2"></td>';
				echo '<input type="hidden" name="weekday" value="'.$q.'"></input>';
				echo '<input type="hidden" name="class" value="'.$_GET["class"].'"></input>';
				echo '<input type="hidden" name="chet" value="'.$odd.'"></input>';
				echo '<td id = "programatatd"><input type="submit" value="Submit"></input></td>';
				echo '</form>';
			}
			echo '</tr>';

		}
		echo '</tr>';
	}
	echo '</table>';
	//	echo '<table><tr>';
	//	for ($i = 1; $i <= 3; $i++) {
	//		echo '<th>ЗА ПЕТЪК - 26.06.2015</th>';
	//	}
	//	echo '</tr>';
	//	echo '<tr>';
	//	for ($i = 1; $i <= 3; $i++) {
	//		echo '<td><br/>';
	//		echo '<div id="heading_hwim">Напомняне</div>
	//		<div id="data_hw">Краен срок за заявление за стажа до 16:00 ч. (да се прати и по e-mail-а на Чорбаджиев - pdf,docx,odt) - Образеца на заявлението - <a id = "change_layout1" href="http://lubo.elsys-bg.org/wp-content/uploads/2015/06/practice-application-soft-2015.doc">doc</a>, <a id = "change_layout1" href="http://lubo.elsys-bg.org/wp-content/uploads/2015/06/practice-application-soft-2015.odt">odt</a><br/>Разпечатани и подписани заявления се предават в 24 кабинет. Заявленията в електронен вид се предават на email: lchorbadjiev@elsys-bg.org</div>
	//		<div id="data_hw"></div></td>';
	//	}
?>




<p><embed src=clock.swf width=150 height=50 wmode=transparent type=application/x-shockwave-flash></embed><p id="bottom-text">©2014 11b 2014-2015 HomeWorks page made by David Georgiev</p></body></html>
