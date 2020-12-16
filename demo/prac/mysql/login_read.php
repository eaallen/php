<?php
    include "db.php";
    include "sql_functions.php";
    $result = query_all_from_one_table("users");
?>
<?php include 'includes/head.php';?>

    <div class="container">
        <h2>read users</h2>
        <pre>
            <?php show_data($result);?>
        </pre>
    </div>
<?php include 'includes/footer.php';?>
