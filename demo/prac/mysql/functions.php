<?php
include "db.php";
function query_all_users(){
    global $sql_con;
    $query = "SELECT * FROM users";
    $result = mysqli_query($sql_con, $query);
    if(!$result){
        die("query failed ".mysqli_error());
    }
    return $result;
}
