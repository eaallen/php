<?php
    include 'db.php';
    include 'sql_functions.php';

    if(isset($_POST["submit"])){
        $uname =  $_POST["username"];
        $pwd = $_POST["password"];
        create_user($uname, $pwd);
}
?>
<?php include 'includes/head.php';?>
    <div class="container">
        <h2>Sign UP</h2>
        <form action="login_create.php" method="post">
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
<?php include 'includes/footer.php';?>
