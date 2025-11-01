<?php
$number = 1;
echo "Even numbers between 1 and 20 are: <br>";
do {
    if ($number % 2 == 0) {
        echo $number . "<br>";
    }
    $number++;
} while ($number <= 20);
?>
