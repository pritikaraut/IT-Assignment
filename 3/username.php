<?php
$username = "  Ram123  ";
$username = trim($username);
$length = strlen($username);
echo "Username: $username<br>";
echo "Length: $length characters<br>";
if ($length >= 5 && $length <= 15) {
    echo "Username is valid (5-15 characters)";
} else {
    echo "Username is invalid. It must be between 5 and 15 characters.";
}
?>
