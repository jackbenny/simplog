<?php

// Include config file
require "../includes/config.php";
require "../includes/dbconnect.php";


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
