<?php
$file = "example.txt";

$handle = fopen($file, 'r');
if($handle){

   echo $content = fread($handle, filesize($file));



    fclose($handle);
}else {
    die("file could not be writen");
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>read files</title>
</head>
<body>
    <a href="example.txt"> go!</a>
</body>
</html>