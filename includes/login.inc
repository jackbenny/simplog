<?php
if ( $_COOKIE['session'] ) { // Do nothing
} else if ($_POST['do'] == "authenticate") {
	require "dbconnect.php";
 
	$sql = "SELECT id,username FROM users WHERE username='$_POST[username]' and password=PASSWORD('$_POST[password]')";
	$result = mysql_query($sql) or die (mysql_error());

#	echo "Results: " . mysql_num_rows($result);

	if (mysql_num_rows($result) === 1) {
		unset($_POST['do']);
		$_COOKIE['session'] = '1';
		setcookie('session',$_COOKIE['session']);
	} else {
		unset($_POST['do']);
#		$_COOKIE['session']++;
		echo "Login failed. Please try again.";
		include("login_form.inc");
		break;
	}
} else {
        echo "Please login:";
        include "login_form.inc";
        break;
}
?>
