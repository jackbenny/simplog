<?php
require "../includes/htmlcode.php";
start_html("Find post to edit");
include "../includes/login.inc";
?>

<h1>Find post to edit</h1>
<form action="editpost.php" method="get">
Date: (YYYY-MM-DD) <input type="date" name="date">
<br /><br />
Title: <input type="text" name="title">
<br />
<input type="submit" value="Find post">
</form>

<?php
end_html();
?>
