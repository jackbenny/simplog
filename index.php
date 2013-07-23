<?php

// Copyright (C) 2013 Jack-Benny Persson <jack-benny@cyberinfo.se>
//
//   This program is free software; you can redistribute it and/or modify
//   it under the terms of the GNU General Public License as published by
//   the Free Software Foundation; either version 2 of the License, or
//   (at your option) any later version.
//
//   This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.
//
//   You should have received a copy of the GNU General Public License
//   along with this program; if not, write to the Free Software
//   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA


// MySQL config options
$host = "localhost";
$database = "test_db";
$user = "test_db";
$password = "test_pw";

// How many posts do we want on each page
$posts_per_page = 5;


// Connect to MySQL database
$link = mysql_connect($host, $user, $password)
    or die("Could not connect...");

mysql_select_db($database)
    or die("Could not open database");

// Divide the posts into pages, N number of posts on every page
if (isset($_GET["page"]))
{
	$page = $_GET["page"];
}
else
{
	$page=1;
}
$start = ($page-1) * $posts_per_page;

$query = "SELECT * FROM blog ORDER BY date DESC LIMIT $start, $posts_per_page";
$result = mysql_query($query)
    or die("No matching queries...");


// Printing posts in HTML
while ($line = mysql_fetch_array($result))
{
print "<h2>" . $line['title'] . "</h2>";
print "\n<p>";
print $line['posttext'];
print "\n<br/>" . $line['date'];
print "</p>";
}

// Printing page links
$query = "SELECT COUNT(title) FROM blog";
$result = mysql_query($query);
$rows = mysql_fetch_row($result);
$total_posts = $rows[0];
$total_posts = ceil($total_posts / $posts_per_page);

for ($i=1; $i<=$total_posts; $i++)
{
	print "<a href='index.php?page=".$i."'>".$i."</a> ";
}


// Close MySQL link
mysql_free_result($result);
mysql_close($link);


?>
