<?php
$_COOKIE['monkey'] = '1';
setcookie('monkey',$_COOKIE['monkey']);
if (!$_COOKIE['monkey']) {
	echo "First attempt.";
	include "login_form.inc";
	break;
} else {
#if ($_POST['do' == "authenticate") {
	require "dbconnect.php";

	$sql = "SELECT id,username FROM users WHERE username='$_POST[username]' and password=PASSWORD('$_POST[password]')";
	$result = mysql_query($sql) or die (mysql_error());

	echo "Results: " . mysql_num_rows($result);
#	$_POST[results]=mysql_num_rows($result);

	if (mysql_num_rows($result) == 1) {
#		echo "<p>You are a valid user!<br />";
#		echo "Your username is $_POST[username]<br />";
#		echo "Your password is $_POST[password]</p>";
		$_COOKIE['monkey'] = '1';
		setcookie('monkey',$_COOKIE['monkey']);
		session_start();
		session_register[login];$_SESSION[login] = '1';
		session_register[count];$_SESSION[count]++;
	} else {
		unset($_POST['do']);
		echo "<p>You are not authorized. Please try again.</p>";
		include("login_form.inc");
		break;
	}

}
?>
