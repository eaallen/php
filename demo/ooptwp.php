<?php
    class Tank{
        public $cannon = 1; 
        public $tracks = 2 ;
        public $crew  = 4;
        public $armor = 100;
        public $hp = 200;
        public $top_speed = 20; 
        public $dmg = 50; 
        public $pen = 100;
        
        // public function __construct(){

        // }
        function go(){
            echo $this->top_speed;
        } 
        function take_dmg($dmg, $pen){
            echo "pen---> $pen";
            $pen_taken = rand($pen-(.25*$pen), $pen+(.25*$pen));
            $hit = $this->got_penitrated($pen_taken);
            if($hit){
                $dmg_taken = rand($dmg-(.25*$dmg), $dmg+(.25*$dmg));
                $this->hp -= $dmg_taken;
                echo "we are hit! hp: ".$this->hp;
            }else{
                echo "damage blocked!".$this->hp;
            }
        } 
        function fire(){
            return [$this->dmg, $this->pen];
        }
        function got_penitrated($pen){
            if($pen > $this->armor){
                return true;
            }
            return false;
        }

    }

    $abram = new Tank;
    echo $abram->take_dmg($abram->dmg,$abram->pen);
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