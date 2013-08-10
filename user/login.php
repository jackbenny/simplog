<html>
<head>
<title>Login</title>
</head>
<?php 
if ( $_POST['do'] == "authenticate") {
#	require "../includes/config.php";
	require "../includes/dbconnect.php";

	$sql = "SELECT id FROM users WHERE username='$_POST[username]' and password=PASSWORD('$_POST[password]')";
	$result = mysql_query($sql) or die (mysql_error());

	echo mysql_num_rows($result);

	if (mysql_num_rows($result) == 1) {
		echo "<p>You are a valid user!<br />";
		echo "Your username is $_POST[username]<br />";
		echo "Your password is $_POST[password]</p>";
		include("login_form.inc");
	} else {
		unset($_POST['do']);
		echo "<p>You are not authorized. Please try again.</p>";
		include("login_form.inc");
	}

	break;
} else {
	include("login_form.inc");
}
?>
</body>
</html>
