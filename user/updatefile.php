<?php
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
