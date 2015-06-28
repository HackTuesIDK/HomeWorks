<html>
<head>
<title>ADD HOMEWORK</title>
<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

<link rel="stylesheet" type="text/css" href="mystyle.css" />
<link rel="stylesheet" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
<script src="autocomplete.js"></script>
</head>
<body>
<table>

<input type="text" placeholder="TITLE" style="width:500px" id="title"></input>
</table>
<table>
<textarea type="text" style="width:500px" placeholder="DESCRIPTION" id="des"></textarea>
</table>			
<table>
<td>
<div class="ui-widget" style="width:250px; margin-left:-2px;">
	<input type="button" id="datepicker" value="DATE" style="width:150px;position:absolute;"></input>
    <input type="text" placeholder="CLASS" style="width:100px; margin-left:148px;" id="auto"/>
</div>
</td>
<td>
<button style="width:260px; margin-left:-12px; border: 0px solid; border-radius: 0px; height:26px;margin-top:0px;" onclick="check()">SUBMIT</button>
</td>
</table>
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
</script>