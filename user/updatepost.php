<?php

// Include config file
require "../includes/config.php";
require "../includes/dbconnect.php";
require "../includes/htmlcode.php";

start_html("Post updated");
include "../includes/login.inc";


$query = "UPDATE blog SET date='$_POST[date]', title='$_POST[title]',
posttext='$_POST[post]' WHERE postnumber='$_POST[postnumber]'";

if (!mysql_query($query))
{
	die ("Something went wrong!");
}
print "Post updated";


// Close MySQL link
mysql_close($link);

end_html();

?>
