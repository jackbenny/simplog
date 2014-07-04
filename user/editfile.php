<?php
require ("../includes/content.php");
require ("../includes/miscfunc.php");
require ("../includes/htmlcode.php");

//Make some form of control below, this is unsafe...
$file = Page::$parentDir . Page::$contentFolder . $_GET['file'];

if(isset($_POST['content']))
{
        $postedContent = $_POST['content']; 
        file_put_contents($file, $postedContent);
}
start_html("Edit file");
print "<form action=\"\" method=\"post\">\n";
$content = file_get_contents($file);
print "<textarea name='content' cols='80' rows='30'>\n" . ($content) . "\n</textarea>";
print "<br/>\n
<input type=\"submit\" value=\"Save file\"/>
</form>";
end_html();

?>
