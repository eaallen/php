<form action="" method="post">
    <h1 class="page-header text-center">
        Sign Up
    </h1>
    <div class="form-group">
        <label>user name</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="form-group">
        <label>password</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
        <label>Confirm password</label>
        <input type="password" class="form-control" name="password2" required>
    </div>
    <div class="form-group">
        <input type="submit" value="sign up" class="btn btn-primary" name="submit_auth" required>
        <a href="../sign_in"> Log in</a>
    </div>
</form>
<?php
    if(isset($_POST['submit_auth'])){
        unset($_POST['submit_auth']); // take this out because we will not need it for the query
        
        $user = $_POST['username'];
        $password = $_POST['password'];
        echo $user ." ". $password;
        print_r($_POST);
        $resp = any_query_where("users", $_POST);

        if($resp){
            session_start();
            $name = 'user';
            $value = $user;
            $expiration = time()+(60*60*24*7); // exprere in a week
            setcookie($name,$value, $expiration);
            $_SESSION['user'] = $user;
            header("Location: ../");

            // echo $_COOKIE['user'];
        }
    }
    


?>

