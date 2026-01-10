<?php
function e($text) {
    return htmlspecialchars($text ?? '');
}
function redirect_to($path) {
    header("Location: " . $path);
    exit;
}
?>
