<!DOCTYPE html>

<!--
   Copyright 2014 Jack-Benny Persson <jack-benny@cyberinfo.se>
   
   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.
   
   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.
   
   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
   MA 02110-1301, USA.
   
   
-->
<?php
require ("includes/content.php");
require ("includes/htmlcode.php");
require ("includes/config.php");
require ("includes/miscfunc.php");

/* For our subpages (About, Contact etc)
   First argument is the name of link as it should appear in the menu, second
   argument is the filename of file in content/ without directory, slashed etc.
   */
$pageNotFound = new Page("404", "404.html");
$aboutPage = new Page("About", "about.html");
$contactPage = new Page("Contact", "contact.html");
?>

<head>
	<title>My Blog</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="description" content="jackbenny" />
    <meta name="keywords" content="linux,html,css" />
    <meta name="author" content="Jack-Benny Persson" />
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
</head>

<body>
	<div id="wrapper">
        <div id="navbar">
            <div id="navlink-right">
            <ul class="ul-links">
                <li class="link"><a href="index.php">Home</a></li>
                <?php
                // Add menu items here! ($object->createMenuItem();)
                $aboutPage->createMenuItem();
                $contactPage->createMenuItem();
                ?>
                <li class="link"><a href="user/">Login</a></li>
            </ul>
            </div>
            <div id="logo">
            <h1>My Blog and My Life</h1>
            </div>
        </div>
        <div id="content">
        
            <?php
            
            // Subpage content begin
            if (isset($_GET['content']))
            {
                $content = $_GET['content'];

                // Function to remove directories
                function nodir($item)
                {
                    return (!is_dir(Page::$contentFolder . $item));
                }
                
                $dirContent = scandir(Page::$contentFolder);

                $files = (array_filter($dirContent, "nodir"));

                // Iterate through all the files for a match (from ?content=)
                foreach($files as $file)
                {
                    preg_match_all("/[a-z_\-0-9]*/i", $file, $withoutExt);
                    if ($withoutExt[0][0] == $content)
                    {
                         include (Page::$contentFolder . $file);
                         terminate();
                    }
                }
                // If no match was found, display a default page (here 404)
                include (Page::$contentFolder . $pageNotFound->getFile());
                terminate();
            }
            // Subpage content ends

            
            // Simplog (blog posts etc)
            // Connect to db (it's down here to show the blogpage even in cases
            // where of failure to connect)
            require ("includes/dbconnect.php");
            
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

            // Fetch posts
            $query = "SELECT * FROM blog ORDER BY date DESC LIMIT $start, 
                     $posts_per_page";
            $result = mysql_query($query)
                or terminate("No matching queries...<br /> It seems you " . 
                        "either haven't started blogging yet or haven't " .
                        "installed the the database table yet<br/>");

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

            print "<strong>Page: ";
            for ($i=1; $i<=$total_posts; $i++)
            {
                print "<a href='index.php?page=".$i."'>".$i."</a> ";
            }
            print "</strong>";

            // Close MySQL link
            require "includes/dbclose.php";

            footer();
            ?>
        

