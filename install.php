<?php
require "includes/htmlcode.php";
start_html("Install database");
include "includes/config.php";
?>

<h1>Installer</h1>
<form method="post" action="<?php $_SERVER[PHP_SELF] ?>">
Desired password for admin: <input type="password" name="password">
<br />
<input type="submit" value="Create admin">
</form>

<?php
if (!isset($_POST['password']))
{
    die("No password entered yet");
}
$pw = md5($_POST['password']);

# Test connection to database server
$link = mysql_connect($host, $user, $password)
    or die("Could not connect to database. Check variables in includes/config.php.");

# Test if database exists
mysql_select_db($database)
    or die("Database does not exist. Please create it first. (See includes/config.php for details.)");

# Try to create 'blog' table
$sql = "CREATE TABLE `blog` (`postnumber` int(11) NOT NULL AUTO_INCREMENT,`date` date NOT NULL,`title` text COLLATE utf8_unicode_ci NOT NULL,`posttext` text COLLATE utf8_unicode_ci NOT NULL, PRIMARY KEY (`postnumber`)) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
#$result = mysql_query($sql) or die (mysql_error());
$result = mysql_query($sql);
if (mysql_error()) 
{
	echo mysql_error() . ".<br />";
} 
else 
{
	echo "Table 'Blog' created successfully.<br />";
}

# Try to create 'blog_users' table
$sql = "CREATE TABLE `blog_users` (`id` int(11) NOT NULL AUTO_INCREMENT,`username` varchar(20) UNIQUE NOT NULL,`name` varchar(40) NOT NULL,`password` varchar(64) NOT NULL,`session` int(64), PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$result = mysql_query($sql);
if (mysql_error()) 
{
        echo mysql_error() . ".<br />";
} 
else 
{
	echo "Table 'Users' created successfully.<br />";
}

# Try to create 'admin' user
$sql = "INSERT INTO `blog_users` (`id`, `username`, `name`, `password`, `session`) VALUES (NULL, 'admin', 'Admin', '$pw', NULL);";
$result = mysql_query($sql);
if (mysql_error()) 
{
        echo mysql_error() . ".<br/>";
} 
else 
{
        echo "User 'admin' created successfully.<br />";
}

end_html();
?>
