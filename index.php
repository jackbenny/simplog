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

<!DOCTYPE html>

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
                <li class="link"><a href="#">Home</a></li>
                <li class="link"><a href="#">About</a></li>
                <li class="link"><a href="#">Articles</a></li>
                <li class="link"><a href="#">Contact</a></li>
                <li class="link"><a href="user/">Login</a></li>
            </ul>
            </div>
            <div id="logo">
            <h1>My Blog and My Life</h1>
            </div>
        </div>
        <div id="content">
        
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

            $query = "SELECT * FROM blog ORDER BY date DESC LIMIT $start, 
                     $posts_per_page";
            $result = mysql_query($query)
                or die("No matching queries...<br /> It seems you either " .
                        "haven't started blogging yet or haven't installed the".
                        " the database table yet<br/>");


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
                print "<a href='blogsite.php?page=".$i."'>".$i."</a> ";
            }
            print "</strong>";

            // Close MySQL link
            require "includes/dbclose.php";

            ?>
        
        </div>
        <div id="footer">
            <p>&copy; 2014 - Jack-Benny Persson</p>
        </div>
    </div>
</body>

</html>
