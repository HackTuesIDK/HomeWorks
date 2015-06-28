<?php
function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
	if ((isset($_GET['title'])) && (isset($_GET['des'])) && (isset($_GET['auto'])) && (isset($_GET['date']))){
		include "config2.php";
		$the_ip = getUserIP();
		$result= mysql_query('SELECT UID FROM classes WHERE name="'.$_GET['auto'].'"');
		if (!$result) {
			echo 'Could not run query: 0' . mysql_error();
			exit;
		}else{
			$row = mysql_fetch_array($result);
			if ($row[0] == ""){
				echo "Invalid Class '".$_GET['auto']."'.";
				header('Location: add_hw.php?sucsses=0');
			}else{
				echo "SUCCESS0";
			}
		}
		$result = mysql_query('INSERT INTO homeworks (Title, Description, Date, IP)
								VALUES ("'.$_GET['title'].'","'.$_GET['des'].'","'.$_GET['date'].'","'.$the_ip.'")');
		if (!$result) {
			echo 'Could not run query: 1' . mysql_error();
				header('Location: add_hw.php?sucsses=0');
		}else{
			echo "SUCCESS1";
			$last=mysql_insert_id();
			$result = mysql_query('INSERT INTO tasks (ClassID,HWID)
									VALUES ("'.$row[0].'","'.$last.'")');
			if (!$result) {
				echo 'Could not run query: 2' . mysql_error();
				header('Location: add_hw.php?sucsses=0');
			}else{
				echo "SUCCESS2";
			}
		}
	}
	header('Location: add_hw.php?sucsses=1');
?>