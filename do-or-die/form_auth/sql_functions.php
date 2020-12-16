<?php
// functions for handleing sql stuff

include "db.php"; // sql_con is connection to database delected in db.php
function query_all_from_one_table($table){
    global $sql_con;
    $query = "SELECT * FROM $table";
    $result = mysqli_query($sql_con, $query);
    if(!$result){
        die("Query Failed:".mysqli_error($sql_con));
        return false;
    }
    return $result;
}


function show_data($result){
    while( $row = mysqli_fetch_assoc($result)){
        print_r($row);
    }

}
function update_user($name, $pwd, $id){
    global $sql_con;
    $name = mysqli_real_escape_string($sql_con, $name); //escpape the text so it wont break the db
    $pwd = mysqli_real_escape_string($sql_con, $pwd);

    $query = "UPDATE users SET ";
    $query .= "username = '$name',";
    $query .= "password = '$pwd'";
    $query .= "WHERE id = $id";

    $result = mysqli_query($sql_con, $query);
    if(!$result){
        die("Query Failed: ". mysqli_error($sql_con));
    }
}
function delete_user($table, $id){
    global $sql_con;
    $query = "DELETE  FROM $table ";
    $query .= "WHERE id = $id";
    $result = mysqli_query($sql_con, $query);
    if(!$result){
        die("Query Failed: ". mysqli_error($sql_con));
    }
}

function create_user($uname, $pwd){
    global $sql_con;
    $uname = mysqli_real_escape_string($sql_con, $uname);
    $pwd = mysqli_real_escape_string($sql_con, $pwd);
    
    $hash_format = '$5$rounds=5000$';

    $salt = random_string(22);

    $hash_and_salt = $hash_format.$salt;

    $pwd = crypt($pwd, $hash_and_salt);


    
    $query = "INSERT INTO users(username,password)\n";
    $query .= "VALUES ('$uname','$pwd')";
    $result = mysqli_query($sql_con, $query);
    if(!$result){
        die("query failed ".mysqli_error($sql_con));
        return;
    }
    return true;
}
function random_string($length){
    $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $charactersLength = strlen($str);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $str[rand(0, $charactersLength - 1)];
    }
    echo $randomString;
    return $randomString;
}


/* array structure [
    [["col1"],[eli,kandin,beth,tia]],[[][]]
]*/
function any_create($table, $data_arr){ // create a intansnce for any data 
    global $sql_con;
    // $name = mysqli_real_escape_string($sql_con, $name); //escpape the text so it wont break the db
    // $pwd = mysqli_real_escape_string($sql_con, $pwd);
print_r($data_arr);
        echo "<br>---------------------------------------------------------<br/>";
    foreach ($data_arr as $item) {
        print_r($item);
        echo "<br>";
        foreach($item as $sub_arr){
            echo " sub_arr<br>";
            print_r($sub_arr);
            // foreach($sub_arr[1] as $data){
            //     $query = "INSERT INTO $table(username,password) ";
            //     $query .= "VALUES ('$uname','$pwd')";
        
            // }unset($data);
        }unset($sub_arr);
        // echo "<pre>".$item."</pre>";
    }unset($value);

    
    // $result = mysqli_query($sql_con, $query);
    // if(!$result){
    //     die("query failed ".mysqli_error());
    // }

}
//any_create("test", [["col1",['eli','kandin','beth','tia']],["col2",['elfredi','jed','elias','nada']]]);