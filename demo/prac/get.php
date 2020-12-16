<?php
    print_r($_GET)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET.PHP</title>
</head>
<body>
<?php
 $id=10;
?>
    <a href="get.php?id=<?php echo $id?>">send data</a>
</body>
</html>