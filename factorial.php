<?php
$number = 5;
$factorial = 1;
$i = 1;
do {
    $factorial *= $i;
    $i++;             
} while ($i <= $number);
echo "The factorial of $number is: $factorial";
?>
