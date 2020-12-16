<?php
// echo ($_POST['uname']);
include './db_context.php';
include './SQLHelper.php';
$alert='';
if (isset($_POST['submit'])) {
    $data = [
        'username',
        'password_hash',
        'email',
        'notes',
        'created_at',
    ];

    $filter = [
        'username'=>$_POST['uname'],
        'password_hash'=> $_POST['psw'],
    ];

    $sqlHelper = new SQLHelper('localhost','root','do_or_die_auth');
    $result_obj = $sqlHelper->sqlInjection('user_info',$data,$filter,"AND");
    // did the user authenticate?
    if($result_obj->num_rows){
        echo('<br> AUTHENTICATED');
        session_start();
        $obj = mysqli_fetch_assoc($result_obj);
        foreach($obj as $key=>$value){
            $_SESSION[$key] = $value;
        }
        header("Location: ./user_acount.php");
        exit;
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="icons.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="./js/index.js"></script>
    <title>Login!</title>
</head>


<body>
    <form action="" method="post">
        <div class="imgcontainer">
            <i class="fas fa-user-alt user"></i>
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <!-- make sure name prop is the column name in table -->
            <input type="text" placeholder="Enter Username" name="uname" required value='admin'>

            <label for="psw"><b>Password</b></label>
            <input type="text" placeholder="Enter Password" name="psw" required>

            <button type="submit" name="submit">Login</button>
            <!-- <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label> -->
        </div>
    </form>
</body>

</html>