<?php
    if(isset($_POST['submit'])){
        $user_names = ['eli','kandin', 'beth'];
        $name=$_POST['username'];
        $psswrd=$_POST['password'];
        // echo $name . " ". $psswrd;
        if(strlen($name) < 3){
            echo "user name too short(".(3-strlen($name)).")";
        }else if(in_array($name,$user_names)){
            echo "welcome, ". $name;
        }else{
            echo "not allowed m8";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>while loops</title>
</head>
<body>
    <div>
        <form action="form.php" method="post">
            <input type="text" name="username"> <br/>
            <input type="text" name="password"> <br/>
            <input type="submit" name="submit">
        </form>
    </div>
</body>
</html>