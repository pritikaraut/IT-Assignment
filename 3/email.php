<?php
$email = "RAM.Sharma@EXAMPLE.com";
echo "Original: $email<br>";
$email = strtolower($email);
echo "Cleaned: $email<br>";
if (strpos($email, "@") !== false) {
    echo "Valid email format<br>";
    list($username, $domain) = explode("@", $email);
    
    echo "Username: $username<br>";
    echo "Domain: $domain";
} else {
    echo "Invalid email (missing @ symbol)";
}
?>
