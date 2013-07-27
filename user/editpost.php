<?php

// Include config file
require "../includes/config.php";
require "../includes/dbconnect.php";


$query = "SELECT * FROM blog WHERE date='$_GET[date]' AND title='$_GET[title]'";
$result = mysql_query($query)
    or die("No matching queries...");


// Printing posts in HTML
while ($line = mysql_fetch_array($result))
{
print "
<form action='updatepost.php' method='post'>
Post number: <input type='text' name='postnumber' value='$line[postnumber]' readonly><br />
Date: (YYYY-MM-DD) <input type='date' name='date' value='$line[date]'>
<br />
Title: <input type='text' name='title' value='$line[title]'>
<br /><br />
Text: <br />
<textarea cols='50' rows='10' name='post'>$line[posttext]</textarea>
<br />
<input type='submit' value='Update post'>
</form>";
}


// Close MySQL link
mysql_free_result($result);
mysql_close($link);


?>
