<?php
$num1 = 15.567;
$num2 = 7.234;
$rnum1 = round($num1, 2);
$rnum2 = round($num2, 2);
$add = $rnum1 + $rnum2;
$sub = $rnum1 - $rnum2;
$mul = $rnum1 * $rnum2;
$div = $rnum1 / $rnum2;
echo "Addition: $rnum1 + $rnum2 = " . number_format(abs($add), 2) . "<br>";
echo "Subtraction: $rnum1 - $rnum2 = " . number_format(abs($sub), 2) . "<br>";
echo "Multiplication: $rnum1 × $rnum2 = " . number_format(abs($mul), 2) . "<br>";
echo "Division: $rnum1 ÷ $rnum2 = " . number_format(abs($div), 2) . "<br>";
?>
