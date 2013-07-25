<?php

// Include config file
require "../config.php";

// Connect to MySQL database
$link = mysql_connect($host, $user, $password)
    or die("Could not connect...");

mysql_select_db($database)
    or die("Could not open database");


$query = "INSERT INTO blog (date, title, posttext) VALUES
('$_POST[date]','$_POST[title]','$_POST[post]')";

if (!mysql_query($query))
{
	die ("Something went wrong!");
}
print "Post added";


// Close MySQL link
mysql_close($link);


?>
