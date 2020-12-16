<?php
    if(isset($_POST["submit"])){
        $err_name = null;
        $err_psw = null;
        $name = $_POST["submit"];
        $psw = $_POST["password"];
        $conf_psw = $_POST["conf_password"];
        if($psw === $conf_psw){
            echo "yes";
            $sql_conn = mysqli_connect('localhost','root', '', 'own_crud');
            if($sql_conn){
                $query = "INSERT INTO user(username,password)";
                $query .= "VALUES ('$name','$psw')";
                $result = mysqli_query($sql_conn, $query);
                if($result){
                    echo "success";
                }
            }

        }else{
            $err_psw = "Your password must match your confirmation";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>

    <div class="container">
        <h2>Create</h2>
        <form action="create.php" method="post">
            <div class="form-group">
                <label for="username">User Name:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                <font color="red"><?php echo $err_name; ?></font>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                <font color="red"><?php echo $err_psw; ?></font>
            </div>
            <div class="form-group">
                <label for="pwd">Confirm Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Confirm password" name="conf_password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>