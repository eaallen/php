<?php 
    include './includes/head.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="icons.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Welcome</title>
</head>

<body>
    <div class="container">
        <table class="table-user">
            <?php 
                foreach($_SESSION as $key => $value){
                ?>
                    <tr>
                        <td class="table-key"><?php echo "$key:" ?></td><td class="table-value"><?php echo "$value" ?></td>
                    </tr>    
                <?php
                }
            ?>
        </table>
    </div>
</body>
</html>