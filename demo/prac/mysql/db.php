<?php
// $sql_con = null;
    // global $sql_con;
    $sql_con = mysqli_connect('localhost','root', '', 'loginapp');
        if(!$sql_con){
            die("connection faild");
        }
?>