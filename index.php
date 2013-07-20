<?php

// MySQL config options
$host = "localhost";
$database = "test_db";
$user = "test_db";
$password = "test_pw";


// Connect to MySQL database
$link = mysql_connect($host, $user, $password)
    or die("Could not connect...");

mysql_select_db($database)
    or die("Could not open database");

// Query database
$query = "SELECT * FROM blog ORDER BY date DESC LIMIT 0, 5";
$result = mysql_query($query)
    or die("No matching queries...");


// Printing results in HTML
while ($line = mysql_fetch_array($result))
{
print "<h2>" . $line['title'] . "</h2>";
print "\n<p>";
print $line['posttext'];
print "\n<br/>" . $line['date'];
print "</p>";
}

mysql_free_result($result);

mysql_close($link);


?>
