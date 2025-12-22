<?php
function showHeader() {
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .nav {
            background-color: #333;
            padding: 10px;
        }
        .nav a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>

<h1 align="center">Welcome to My Website</h1>

<div class="nav">
    <a href="home.php">Home</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
</div>

<hr>
<?php
}
function showFooter() {
?>
<hr>
<p align="center">
    &copy; 2025 My Website. All Rights Reserved.
</p>

</body>
</html>
<?php
}
showHeader();  
?>

<div class="container">
    <h2>Home Page</h2>
    <p>
        This is the main content of the home page.
        The header and footer are displayed using PHP functions
        which work like file inclusion.
    </p>
</div>

<?php
showFooter();   
?>
