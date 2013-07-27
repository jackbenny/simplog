<?php

function start_html($title)
{
print "
<html>
<head>
<title>$title</title>
</head>
<body>\n";
}

function end_html()
{
	print "\n\n</body>\n</html>\n";
}

?>
