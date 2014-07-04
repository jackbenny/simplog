<?php
function terminate($message="")
{
    print "$message\n";
    footer();
    exit(0);
}

?>
