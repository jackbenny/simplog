<?php
require ("../includes/content.php");
require ("../includes/miscfunc.php");
require ("../includes/htmlcode.php");

/*regexp to strip away '..', '/' and so forth. Filename must now be in the
  format of myfile.ext, where myfile can be 1 to 20 chars long (including '-'
  and '_') and ext can be
  from 1 to 4 chars.*/
$filename = $_GET['file'];
preg_match_all("/[a-z_\-0-9]{1,30}\.[a-z]{1,4}/i", $filename, $checkedFilename);
$file = Page::$parentDir . Page::$contentFolder . $checkedFilename[0][0];

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
