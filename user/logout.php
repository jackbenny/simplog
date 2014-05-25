<?php
require "../includes/htmlcode.php";
start_html("simplog user interface");
setcookie("session", "", time()-3600);
?>

<p>
You have been logged out succesfully!<br />
<a href="../simplog.php">Return to simplog</a>
</p>

<?php
end_html();
?>
