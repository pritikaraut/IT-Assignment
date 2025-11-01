<?php
$count = 1;

while ($count <= 10) {
    $num = (int) readline("Enter number $count: ");

    if ($num < 0) {
        echo "Negative number entered! Stopping program.";
        break;
    }

    echo "You entered: $num\n";
    $count++;
}
?>
