<?php


$file = $_GET[ 'page' ];


if( !fnmatch( "file*", $file ) && $file != "contact_us.php" ) {

    echo "ERROR: File not found!";
    exit;
}
else{
include $file;
}
?>
