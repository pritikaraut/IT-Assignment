<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

define('APP_NAME', 'Student Attendance System');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'attendance_system');
