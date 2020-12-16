<?php
// functions for handleing sql stuff

include "db.php"; // SQL_CON is connection to database delected in db.php
function query_all_from_one_table($table){
    global $SQL_CON;
    $query = "SELECT * FROM $table";
    $result = mysqli_query($SQL_CON, $query);
    if(!$result){
        die("Query Failed:".mysqli_error($SQL_CON));
        return false;
    }
    return $result;
}
function show_data($result){
    while( $row = mysqli_fetch_assoc($result)){
        print_r($row);
    }

}
function search_query($search){
    global $SQL_CON;
    $query ="SELECT * FROM posts where post_tags LIKE '%$search%'";
    $result = mysqli_query($SQL_CON, $query);
    if(!$result){
        die("Query Failed:".mysqli_error($SQL_CON));
        return false;
    }
    return $result;
}
function update_user($name, $pwd, $id){
    global $SQL_CON;
    $name = mysqli_real_escape_string($SQL_CON, $name); //escpape the text so it wont break the db
    $pwd = mysqli_real_escape_string($SQL_CON, $pwd);

    $query = "UPDATE users SET ";
    $query .= "username = '$name',";
    $query .= "password = '$pwd'";
    $query .= "WHERE id = $id";

    $result = mysqli_query($SQL_CON, $query);
    if(!$result){
        die("Query Failed: ". mysqli_error($SQL_CON));
    }
}

// function create_category()

function create_user($uname, $pwd){
    global $SQL_CON;
    $uname = mysqli_real_escape_string($SQL_CON, $uname);
    $pwd = mysqli_real_escape_string($SQL_CON, $pwd);
    
    $hash_format = '$5$rounds=5000$';

    $salt = random_string(22);

    $hash_and_salt = $hash_format.$salt;

    $pwd = crypt($pwd, $hash_and_salt);


    
    $query = "INSERT INTO users(username,password)\n";
    $query .= "VALUES ('$uname','$pwd')";
    $result = mysqli_query($SQL_CON, $query);
    if(!$result){
        die("query failed ".mysqli_error($SQL_CON));
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
    global $SQL_CON;
    // $name = mysqli_real_escape_string($SQL_CON, $name); //escpape the text so it wont break the db
    // $pwd = mysqli_real_escape_string($SQL_CON, $pwd);
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

    
    // $result = mysqli_query($SQL_CON, $query);
    // if(!$result){
    //     die("query failed ".mysqli_error());
    // }

 }/*[
    [str]=>str,
 ]*/
function any_create_one_at_a_time($table, $data_arr){ // put data into a databse
    global $SQL_CON;
    $arr_cols = [];
    $arr_rows = [];
    foreach ($data_arr as $key => $value) {
        // $_kay = mysqli_real_escape_string($SQL_CON, $key);
        // $_value = mysqli_real_escape_string($SQL_CON, $value);

        array_push($arr_cols, $key);
        array_push($arr_rows, $value);
    }
    $insert_cols = implode(",",$arr_cols);
    $insert_rows = implode("','",$arr_rows);
    $query = "INSERT INTO $table($insert_cols) \n" // make sure i scrube data first
              ." VALUES ('$insert_rows')";
    echo $query;
    $result = mysqli_query($SQL_CON, $query);
    if(!$result){
        die("query failed ".mysqli_error($SQL_CON));
        return false;
    }
    return true;


}
function any_delete($table, $col_name, $id){
    global $SQL_CON;
    $query = "DELETE  FROM $table ";
    $query .= "WHERE $col_name = $id";
    $result = mysqli_query($SQL_CON, $query);
    if(!$result){
        die("Query Failed: ". mysqli_error($SQL_CON));
        return false;
    }
    return true;
}

function any_update_one($table, $data_arr, $id_arr){ //id_arr = ['post_id', 21]
    global $SQL_CON;
    $arr_cols = [];
    $arr_rows = [];
    $arr_cnt = count($data_arr);
    $i = 0;
    $query = "UPDATE $table SET ";
    foreach ($data_arr as $key => $value) {
        if($i === count($data_arr)-1){
            // $_kay = mysqli_real_escape_string($SQL_CON, $key);
            // $_value = mysqli_real_escape_string($SQL_CON, $value);
            $query .= "$key = '$value' ";
        }else{
            $query .= "$key = '$value', ";
        }
        
        $i+=1;
    }
    $id_key = $id_arr[0];
    $id_val = $id_arr[1];
    $query .= "WHERE $id_key = $id_val";

    echo "<script>alert('$query')</script>";

    $result = mysqli_query($SQL_CON, $query);
    if(!$result){
        die("Query Failed: ". mysqli_error($SQL_CON));
        return false;
    }
    return true;
}

function any_query_one_record_by_id($table, $col_name, $id){
    global $SQL_CON;
    $query = "SELECT * FROM $table WHERE $col_name = $id";
    $result = mysqli_query($SQL_CON, $query);
    if(!$result){
        die("Query Failed:".mysqli_error($SQL_CON));
        return false;
    }
    return $result;

}

function any_query_where($table, $arr_col_names){ // $arr_col_names is a array $table is a string
    global $SQL_CON;
    $query = "SELECT * FROM $table WHERE ";
    $icount = 1;
    foreach ($arr_col_names as $key => $value) { // building sql query 
        if($icount === count($arr_col_names)){
            echo $key ."<br>"; 
            $query .= "$key = '$value'"; // we know this is the last one no need for the "AND" command
        }else{
            echo $key; 

            $query .= "$key = '$value' AND ";
        }
        $icount +=1;
    }
    $result = mysqli_query($SQL_CON, $query);
    if(!$result){
        die("Query Failed:".mysqli_error($SQL_CON));
        return false;
    }
    return $result;
}
