<?php
$comment = "This is a damn good product but the service is hell";
$badWords = ["damn", "hell"];
echo "Original: $comment<br>";
$count = 0;
foreach ($badWords as $word) {
    if (stripos($comment, $word) !== false) {
        $comment = str_ireplace($word, "****", $comment, $num);
        $count += $num; 
    }
}

echo "Censored: $comment<br>";
echo "Words censored: $count";
?>
