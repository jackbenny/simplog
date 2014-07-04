<?php
require ("../includes/content.php");
require ("../includes/miscfunc.php");
require ("../includes/htmlcode.php");
$filename = $_GET['file'];
$file = Page::$parentDir . Page::$contentFolder . $filename;

$filehandle = fopen ("$file", "rw");
$content = fread($filehandle, filesize($file));

start_html("Edit file");
print "<form action=\"$_SERVER[PHP_SELF]\" method='post'>
Text: <br />
<textarea cols='80' rows='30' name='file'>$content</textarea>
<br />
<input type='submit' value='Save file'>
</form>
";

if (!isset($_POST['post']))
{
    end_html();
    die;
}

if (fwrite($filehandle, $_POST['post']) === FALSE) 
{
    echo "Cannot write to file ($file)";
    exit;
}

echo "Success, saved file ($file)";
fclose($filehandle);
?>
