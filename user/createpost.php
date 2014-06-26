<?php

// Include config file
require "../includes/config.php";
require "../includes/dbconnect.php";
require "../includes/htmlcode.php";

start_html("New post created");


$query = "INSERT INTO blog (date, title, posttext) VALUES
('$_POST[date]','$_POST[title]','$_POST[post]')";

if (!mysql_query($query))
{
	die ("Something went wrong!");
}
print "Post added";
?>
<br/>
<a href="../index.php">Back to simplog</a>
<?php
// Close MySQL link
mysql_close($link);

end_html();

?>
