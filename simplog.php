<?php

// Include config file and other include-files
require "includes/config.php";
require "includes/dbconnect.php";

// Divide the posts into pages, N number of posts on every page
if (isset($_GET['page']))
{
	$page = $_GET['page'];
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
print "<h2>$line[title]</h2>\n<p>";
print "$line[posttext]\n<br />";
print "Posted on: $line[date]";
print "</p>\n\n";
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
require "includes/dbclose.php";


?>
