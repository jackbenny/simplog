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

function footer()
{
    print "
        </div>
        <div id=\"footer\">
            <p>&copy; 2014 - Jack-Benny Persson</p>
        </div>
    </div>
</body>

</html>";
}
?>
