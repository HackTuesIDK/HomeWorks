<?php
	$ddate = date("Y-m-d");
	$date = new DateTime($ddate);
	$week = $date->format("W");
	//echo "Weeknummer: $week";
	if($week&1) {
	echo 'The week is odd.';
	} else {
	echo 'The week is even.';
	}
?>