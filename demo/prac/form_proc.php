<?php
    if(isset($_POST['submit'])){
            $user_names = ['eli','kandin', 'beth'];
            $name=$_POST['username'];
            $psswrd=$_POST['password'];
            // echo $name . " ". $psswrd;
            if(strlen($name) < 3){
                echo "user name too short(".(3-strlen($name)).")";
            }else if(in_array($name,$user_names)){
                echo "welcome, ". $name;
            }else{
                echo "not allowed m8";
            }
        }
?>