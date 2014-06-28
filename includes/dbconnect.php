<?php
require "config.php";

// Connect to MySQL database
$link = mysql_connect($host, $user, $password)
    or terminate("Could not connect...");

mysql_select_db($database)
    or terminate("Could not open database");


?>
