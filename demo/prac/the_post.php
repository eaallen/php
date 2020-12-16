<?php
    echo $_POST["name"]

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET.PHP</title>
</head>
<body>
    <form action="the_post.php" method="post">
        <input type="text" name="name">
        <input type="button" value="submit">
    </form>
</body>
</html>