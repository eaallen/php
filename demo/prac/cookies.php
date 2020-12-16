<?php
    $name = 'GEORGE_WASHINGTON';
    $value = 110;
    $expiration = time()+(60*60*24*7); // exprere in a week
    setcookie($name,$value, $expiration);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookies.PHP</title>
</head>
<body>
    <?php
        if(isset($_COOKIE['GEORGE_WASHINGTON'])){
            $genral = $_COOKIE['GEORGE_WASHINGTON'];
            echo $genral;
        }else{
            $genral = null;
        }
    ?>
</body>
</html>