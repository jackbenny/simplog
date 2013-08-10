<?php
require "../includes/htmlcode.php";
start_html("Create new post");
?>

<h1>Create new post</h1>
<form action="createpost.php" method="post">
Date: (DD-MM-YYYY) <input type="date" name="date">
<br />
Title: <input type="text" name="title">
<br /><br />
Text: <br />
<textarea cols="50" rows="10" name="post"></textarea>
<br />
<input type="submit" value="Create post">
</form>

<?php 
end_html();
?>
