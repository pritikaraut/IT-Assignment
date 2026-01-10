<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function is_logged_in() {
    return isset($_SESSION['user']);
}
function require_login() {
    if (!is_logged_in()) {
        header("Location: login.php");
        exit;
    }
}
function require_role($role) {
    require_login();
    if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== $role) {
        header("Location: access_denied.php");
        exit;
    }
}
?>
