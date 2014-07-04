<?php
require ("../includes/content.php");
require ("../includes/miscfunc.php");

$files = Page::fileList();
foreach($files as $file)
{
    print "<a href=\"editfile.php?file=$file\">$file</a><br/>\n";
}
?>
