<h1>test</h1>

<?php
$multiplier = 8;
$size = 1024 * $multiplier;
$size -= 1;
for($i = 1; $i <= $size; $i++) {
    echo ".";
}
echo ".";
sleep(5);
echo "Hello World";
?>