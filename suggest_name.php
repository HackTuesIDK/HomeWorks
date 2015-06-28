<?php
// $mysqli = new MySQLi($server,$user,$password,$database);
// /* Connect to database and set charset to UTF-8 */
// if($mysqli->connect_error) {
  // echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
  // exit;
// } else {
  // $mysqli->set_charset('utf8');
// }
/* retrieve the search term that autocomplete sends */
include "config2.php";
$term="";
$a_json = array();
$a_json_row = array();
if (isset($_GET['auto'])){
	$term = trim(strip_tags($_GET['auto'])); 
	
	$name = htmlentities(stripslashes($term));
	$a_json_row["id"] = $name;
	$a_json_row["value"] = $name;
	array_push($a_json, $a_json_row);
}

$result = mysql_query("SELECT name FROM classes WHERE name LIKE '".$term."%' ORDER BY UID");
if (!$result) {
	echo 'Could not run query: ' . mysql_error();
	exit;
}else{
	while ($row = mysql_fetch_array($result)){
		$name = htmlentities(stripslashes($row[0]));
		$a_json_row["id"] = $name;
		$a_json_row["value"] = $name;
		array_push($a_json, $a_json_row);
	}
}
// if ($data = $mysqli->query("SELECT name FROM class")) {
	// while($row = mysqli_fetch_array($data)) {
		// $firstname = htmlentities(stripslashes("1"));
		// $lastname = htmlentities(stripslashes("2"));
		// $code = htmlentities(stripslashes("3"));
		// $a_json_row["id"] = $firstname;
		// $a_json_row["value"] = $firstname.' '.$lastname;
		// $a_json_row["label"] = $firstname.' '.$lastname;
		// array_push($a_json, $a_json_row);
	// }
// }
// jQuery wants JSON data
echo json_encode($a_json);
// flush();
 
// $mysqli->close();
?>