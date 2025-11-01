<?php
echo "Odd numbers between 1 and 20 are:<br>";
for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
        continue;
    }
    echo $i . "<br>";
}
?>
