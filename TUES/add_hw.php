﻿<html>
<head>
<title>ADD HOMEWORK</title>
<title>HomeWorks</title><link rel="stylesheet" type="text/css" href="HomeWorks.css">
<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

<link rel="stylesheet" type="text/css" href="mystyle.css" />
<link rel="stylesheet" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
<script src="autocomplete.js"></script>
</head>
<body>
<div id = "AddHw" style = "margin-left: 24%;
	margin-top: 8%;
	border:1px solid #3b4d28;
	width:580px;
	padding:30px;
	background-color:#81503c;
	border-radius: 15px;">
	<h1 style = "margin-bottom:-10px;
	width:560px;
	padding: 10px;
	border:1px solid #3b4d28;
	font-size: 40px;
    line-height: 40px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #dad4cf;
	background-color:#473525;
	font-weight: bold;">New homework</h1>
	<table>
	<tr>
	<td colspan="3">
	<input type="text" placeholder="TITLE" style="width:560px; Font-Size:30px;" id="title"></input>
	</td>
	</tr>
	<tr>
	<td colspan="3">
	<textarea type="text" style="width:560px;height:100px;Font-Size:20px;" placeholder="DESCRIPTION" id="des"></textarea>
	</td>
	</tr>
	
	<div class="ui-widget" style="width:250px; margin-left:-2px;">
		<td>
		<input type="button" id="datepicker" value="DATE" style="width:150px;height:43px;margin-top:-2px;"></input>
		</td>
		<td>
		<input type="text" placeholder="CLASS" style="width:100px;height:40px;" id="auto"/>
		</td>
	</div>
	<td>
	<button style="width:260px; border: 0px solid; border-radius:0px; height:40px;margin-top:0px;" onclick="check()">SUBMIT</button>
	</td>
	</table>
	<button style="width:260px; border: 0px solid; border-radius:0px; height:40px;margin-top:0px; background-color:orange;margin-left:3px;width:100%;" onclick="back()">BACK TO MENU</button>
</div>
</body>
</html>
<script>
	<?php
		if (isset($_GET['sucsses'])){
			echo '$(document).ready(function(){';
			if($_GET['sucsses']==1){
				echo 'alert("SUCSESS")';
			}else{
				echo 'alert("FAIL")';
			}
			echo '});';
		}
	?>
  $(function() {
    $( "#datepicker" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
  });
  function check(){
	var title=	document.getElementById("title").value;
	var des=	document.getElementById("des").value;
	var date=	document.getElementById("datepicker").value;
	var res = date.split("/");
	var string=res[2]+"-"+res[0]+"-"+res[1]+" 00:00:00";
	var auto=	document.getElementById("auto").value;
	if ((title=="") || (des=="") || (date=="DATE") || (auto=="")){
		alert("Please fill out everything:\nTitle;\nDescription;\nDate;\nClass.")
	}else{
		var url = "add.php?title="+title+"&des="+des+"&date="+string+"&auto="+auto;
		window.location.href = url;
	}
  }
  function back(){
	  window.location.href = "index.php";
  }
</script>