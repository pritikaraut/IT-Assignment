<?php
require_once '../config/config.php'; 
require_once 'functions.php';       

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= e(APP_NAME) ?></title>
  <link rel="stylesheet" href="../assets/css/style.css" /> 
</head>
<body>
<header class="site-header">
  <div class="container header-inner">
    <div class="brand">
      <div class="brand-title"><?= e(APP_NAME) ?></div>
      <div class="brand-sub">Secure Attendance Portal</div>
    </div>

    <nav class="nav">
      <a href="../public/index.php">Home</a>
      <?php if ($user): ?>
        <?php if ($user['role'] === 'admin'): ?>
          <a href="../admin/dashboard.php">Admin Dashboard</a>
        <?php else: ?>
          <a href="../student/dashboard.php">Student Dashboard</a>
        <?php endif; ?>
        <a class="btn btn-outline" href="../public/logout.php">Logout</a>
      <?php else: ?>
        <a href="../public/login.php">Login</a>
        <a class="btn" href="../public/register.php">Register</a>
      <?php endif; ?>
    </nav>
  </div>
</header>

<main class="container main">
