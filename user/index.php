<?php
require "../includes/htmlcode.php";
start_html("simlog user interface");
include "../includes/login.inc";
?>

<h1>simplog user interface</h1>
<p>
<a href="new.php">Create new post</a>
</p>
<p>
<a href="edit.php">Edit existing post</a>
</p>
<p>
<a href="editfiles.php">Edit content files</a>
</p>
<p>
<a href="logout.php">Logout</a>
</p>

<?php
end_html();
?>
