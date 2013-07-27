<?php

// Connect to MySQL database
$link = mysql_connect($host, $user, $password)
    or die("Could not connect...");

mysql_select_db($database)
    or die("Could not open database");


?>
