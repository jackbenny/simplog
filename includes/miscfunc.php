<?php
function terminate($message="")
{
    print "$message\n";
    footer();
    exit(1);
}
?>
