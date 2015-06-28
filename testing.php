<html>
<head>
<title>Auto-complete tutorial</title>
<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

<link rel="stylesheet" type="text/css" href="mystyle.css" />
<link rel="stylesheet" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
<script src="autocomplete.js"></script>

<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
  });
</script>
</head>
<body>
<div class="ui-widget">
	<label for="auto">auto: </label>
    <input type="text" placeholder="Name" id="auto"/>
</div>
<br>
<br>
<div tabindex="0" class="onclick-menu no-visibility no-pointer-events">
    <ul class="onclick-menu-content">
        <li><button onclick="alert('click 1')">Look, mom</button></li>
        <li><button onclick="alert('click 2')">no JavaScript!</button></li>
        <li><button onclick="alert('click 3')">Pretty nice, right?</button></li>
    </ul>
</div>
<br>
<br>
<p>Date: <input type="text" id="datepicker"></p>
<button onclick="click_me()">CLICK</button>
<?php
	include "./config2.php";
	echo "<br>";
	echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// $result = mysql_query("SELECT * FROM Classes");
	// while ($row = mysql_fetch_array($result)){
		// print_r($row);
		// echo "<br>";
		// echo "<br>";
	// ui-autocomplete}
	

	// $classnames=["9А","9Б","9В","9Г","10А","10Б","10В","10Г","11А","11Б","11В","11Г","12А","12Б","12В","12Г"];
// <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	// <script src="../jquery-1.11.2.js"></script>
	// <script src="../jsjquery.ui.autocomplete.html.js"></script>
	// $tasks=["insert title"]
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
	
	// echo "<br>";
	// echo "<br>";
		
	$result = mysql_query("SELECT * FROM Classes");
	while ($row = mysql_fetch_array($result)){
		print_r($row);
		echo "<br>";
		echo "<br>";
	}
?>
<script language="JavaScript" type="text/javascript">
function click_me(){
	val=document.getElementById('datepicker').value;
	if (val!=""){
		var res = val.split("/");
		var string=res[2]+"-"+res[1]+"-"+res[0]+" 00:00:00";
		// var string2 = string.split(" ");
		// var last = date("N", string2)
		alert(string);
	}
}
// $(function() {

	// $( "#auto" ).autocomplete(
	// {
		 // source:'suggest_name.php',
	// })

// });
</script>

</body>
</html>