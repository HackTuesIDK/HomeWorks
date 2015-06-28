<head>
<meta charset="utf-8">
<script src="../jquery-1.11.2.js"></script>
<script src="../jsjquery.ui.autocomplete.html.js"></script>
</head>
<body>
<form action="" method="post">
    <input type="text" placeholder="Name" id="classAutocomplte" class="ui-autocomplete-input" autocomplete="off" />
</form>
<?php
	include "./config.php";
	$result = mysql_query("SELECT * FROM Classes");
	while ($row = mysql_fetch_array($result)){
		print_r($row);
		echo "<br>";
		echo "<br>";
	}
	
	// $classnames=["9А","9Б","9В","9Г","10А","10Б","10В","10Г","11А","11Б","11В","11Г","12А","12Б","12В","12Г"];
	//$tasks=["insert title"]
	// foreach ($classnames as $class){
		// $result = mysql_query("INSERT INTO Classes (name)
		// VALUES ('".$class."')");
		// if (!$result) {
			// echo 'Could not run query: ' . mysql_error();
			// exit;
		// }else{
			// echo $class." has been added.\n";
		// }
	// }
	
	// // echo "<br>";
	// echo "<br>";
		
	$result = mysql_query("SELECT * FROM Classes");
	while ($row = mysql_fetch_array($result)){
		print_r($row);
		echo "<br>";
		echo "<br>";
	}
?>
</body>
<script>
$(document).ready(function($){
    $('#classrAutocomplte').autocomplete({
	source:'suggest_name.php', 
	minLength:2
    });
});
</script>