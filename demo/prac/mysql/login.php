<?php
    if(isset($_POST["submit"])){
       $uname =  $_POST["username"];
        $pwd = $_POST["password"];
        if($uname && $pwd){
            echo $uname . $pwd;
        }
        $sql_con = mysqli_connect('localhost','root', '', 'loginapp');
        if($sql_con){
            echo "we are connected";
        }else {
            die("connection faild");
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login App</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">User Name:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>