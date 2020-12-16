<?php
class SQLHelper
{
    public $db_context;
    function __construct($host, $username,$db_name, $password = null)
    { // create the SQL context
        $this->db_context = mysqli_connect($host, $username, $password, $db_name);
        $ctx = $this->db_context;
        if (!$ctx) {
            die("connection faild");
        }
    }

    function return_data($result){
        if (!$result) {
            die("Query Failed:" . mysqli_error($this->db_context));
            return false;
        }
        return $result;
    }

    function query_all_from_one_table($table)
    {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->db_context, $query);
        return $this->return_data($result);
    }

    // make sure i show off this function
    function get_data($table, $columns, $filter_col,$and_or){
        $arr = [];
        foreach($filter_col as $key => $value){
            $filter_col[$key] = mysqli_real_escape_string($this->db_context, $value);
            $value = mysqli_real_escape_string($this->db_context, $value);
            array_push($arr, $key.'='."'".$value."'");
        }

        $column_names = implode(', ',$columns);
        $filter_str = implode(" $and_or ",$arr);
        $query = "SELECT $column_names FROM $table WHERE $filter_str";
        print_r($query);
        
        $result = mysqli_query($this->db_context, $query);
        return $this->return_data($result);
    }

    function show_data($result)
    {
        while ($row = mysqli_fetch_assoc($result)) {
            print_r($row);
            foreach($row as $key => $value){
                print_r("<br> $key: $value ");
            }
        }
        return;
    }

    function update_user($name, $pwd, $id)
    {
        $name = mysqli_real_escape_string($this->db_context, $name); //escpape the text so it wont break the db
        $pwd = mysqli_real_escape_string($this->db_context, $pwd);

        $query = "UPDATE users SET ";
        $query .= "username = '$name',";
        $query .= "password = '$pwd'";
        $query .= "WHERE id = $id";

        $result = mysqli_query($this->db_context, $query);
        if (!$result) {
            die("Query Failed: " . mysqli_error($this->db_context));
        }
    }
    function delete_user($table, $id)
    {
        $query = "DELETE  FROM $table ";
        $query .= "WHERE id = $id";
        $result = mysqli_query($this->db_context, $query);
        if (!$result) {
            die("Query Failed: " . mysqli_error($this->db_context));
        }
    }

    function create_user($uname, $pwd)
    {
        $uname = mysqli_real_escape_string($this->db_context, $uname);
        $pwd = mysqli_real_escape_string($this->db_context, $pwd);

        $hash_format = '$5$rounds=5000$';

        $salt = random_string(22);

        $hash_and_salt = $hash_format . $salt;

        $pwd = crypt($pwd, $hash_and_salt);



        $query = "INSERT INTO users(username,password)\n";
        $query .= "VALUES ('$uname','$pwd')";
        $result = mysqli_query($this->db_context, $query);
        if (!$result) {
            die("query failed " . mysqli_error($this->db_context));
            return;
        }
        return true;
    }
    function random_string($length) // pepper the password
    {
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
    function any_create($table, $data_arr) // not ready
    {
        // create a intansnce for any data 
        // $name = mysqli_real_escape_string($this->db_context, $name); //escpape the text so it wont break the db
        // $pwd = mysqli_real_escape_string($this->db_context, $pwd);
        print_r($data_arr);
        echo "<br>---------------------------------------------------------<br/>";
        foreach ($data_arr as $item) {
            print_r($item);
            echo "<br>";
            foreach ($item as $sub_arr) {
                echo " sub_arr<br>";
                print_r($sub_arr);
                // foreach($sub_arr[1] as $data){
                //     $query = "INSERT INTO $table(username,password) ";
                //     $query .= "VALUES ('$uname','$pwd')";

                // }unset($data);
            }
            unset($sub_arr);
            // echo "<pre>".$item."</pre>";
        }
        unset($value);


        // $result = mysqli_query($this->db_context, $query);
        // if(!$result){
        //     die("query failed ".mysqli_error());
        // }

    }

    function sqlInjection($table, $columns, $filter_col,$and_or){
        $arr = [];
        foreach($filter_col as $key => $value){
            // $filter_col[$key] = mysqli_real_escape_string($this->db_context, $value);
            // $value = mysqli_real_escape_string($this->db_context, $value);
            $filter_col[$key] =  $value;
            $value = $value;
            array_push($arr, $key.'='."'".$value."'");
        }

        $column_names = implode(", ",$columns);
        $filter_str = implode(" $and_or ",$arr);
        $query = "SELECT * FROM $table WHERE $filter_str";
        print_r($query);
        
        // odbc
        $result = mysqli_query($this->db_context, $query);
        return $this->return_data($result);
    }



}
