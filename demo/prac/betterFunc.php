<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>while loops</title>
</head>
<body>
<?php
    function say_somthing($name){
        echo "hellow " . $name. ", do tou like the inhabitiatnas <br/>";
    }
    function calc($num1,$oper,$num2){
        switch($oper){
            case "+":
                return $num1 + $num2;
            break;
            case "-":
                return $num1 - $num2;
            break;
            case "*":
                return $num1 * $num2;
            break;
            case "/":
                return $num1 / $num2;
            break;
        }
    }
    say_somthing("fred");
    echo calc(23,"+",2);
?>
</body>
</html>