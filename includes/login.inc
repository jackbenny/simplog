<?php

# Check if the user is logged in and authenticated
if (isset( $_COOKIE['session'] ))
{ 
    # If yes, continue loading page as normal
    # If not logged in, check if this is an attempt to login...
} 
else if (isset($_POST['do']) == "authenticate") 
{

    # If we're trying to login...

    # Attempt login
	require "dbconnect.php";
    $pass = md5($_POST['password']);
 	$sql = "SELECT id,username FROM blog_users WHERE username='$_POST[username]' and password='$pass'";
	$result = mysql_query($sql) or die (mysql_error());

    #	echo "Results: " . mysql_num_rows($result); // Debugging line

	if (mysql_num_rows($result) === 1) 
    { // If user found and password matches
		unset($_POST['do']); // No longer authenticating

    # Create cookie and set it
		$_COOKIE['session'] = '1'; 
		setcookie('session',$_COOKIE['session']);

	} 
    else 
    { //  If user not found or password doesn't match
		unset($_POST['do']);
        # Attempt login again. This should be limited in the future.
		echo "Login failed. Please try again.";
		include("login_form.inc");
		exit;
   }
} 
else 
{ // If this is the first visit to the user/admin area...
        echo "Please login:";
        include "login_form.inc";
        exit;
}
?>
