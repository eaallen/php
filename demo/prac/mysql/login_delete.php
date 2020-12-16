<?php
    include "db.php";
    include "sql_functions.php";
    $data = query_all_from_one_table("users");
    // global $sql_conn;
    if(isset($_POST["submit"])){
        // $name=$_POST["username"];
        // $pwd=$_POST["password"];
        $id=$_POST["id"];

        delete_user("users", $id);
    }
?>
<?php include 'includes/head.php';?>
<div class="container">
    <h2>Delete</h2>
    <form action="login_delete.php" method="post">
        <!-- <div class="form-group">
            <label for="username">User Name:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
        </div> -->
        <div class="form-group">
            <label for="select">ID</label>
            <select class="form-control" id="select" name="id"> 
                <?php
                    while($row = mysqli_fetch_assoc($data)){
                        $id = $row["id"];
                        echo "<option value='$id'>$id</option>";
                    }
                
                ?>
            </select>
        </div>
        
        <button type="submit" name="submit" class="btn btn-danger">delete</button>
    </form>
</div>
<?php include 'includes/footer.php';?>
