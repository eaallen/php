<?php
    class Car{
        var $wheels = 4;
        var $hood = 1;
        var $doors = 4;
        function move_wheel(){
            echo $this->wheels=10;
        }
    }
    class Plane extends Car{
        var $wheels = 2;
    }
    class Tank extends Car{
        static $dead = "Vehical Destroyed"; //assocaited with the class as opposed to the incance of a class
        public $cannon = 1;
        protected $armor = "12cm"; //only in this class or children
        private $crew = 3; // only ever in this class
        function __construct(){
            echo 'boom';
        }
        function show_armor(){
            echo $this->armor;
        }
        function hit(){
            Tank::$dead="we are hit"
        }
    }
    $t34=new Tank;
    $t34->show_armor();
    echo Tank::$dead; // calling a static deal
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookies.PHP</title>
</head>
<body>
    
</body>
</html>