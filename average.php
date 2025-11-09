<?php
function calculateAverage(...$marks) {
    if (count($marks) === 0) {
        return 0; 
    }
    $sum = array_sum($marks);
    $average = $sum / count($marks);
    return round($average, 2);
}
echo "Average: " . calculateAverage(80, 90, 85) . "<br>";
echo "Average: " . calculateAverage(70, 75) . "<br>";
echo "Average: " . calculateAverage(100, 95, 90, 85, 80) . "<br>";
?>
