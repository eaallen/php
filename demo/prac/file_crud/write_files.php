<?php
$file = "example.txt";

$handle = fopen($file, 'w');
if($handle){
    fwrite($handle, "i love php");
    fclose($handle);
    
}else {
    die("file could not be writen");
}




?>