<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Menu Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            text-align: center;
            margin: 50px;
        }
        .menu a {
            margin: 0 15px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .menu a:hover {
            color: #0056b3;
        }
        .content {
            margin-top: 30px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            display: inline-block;
            width: 50%;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <h1>Dynamic Menu Example</h1>

    <div class="menu">
        <a href="?page=home">Home</a>
        <a href="?page=about">About</a>
        <a href="?page=contact">Contact</a>
    </div>

    <div class="content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            if ($page == 'home') {
                echo "<h2>Welcome to the Home Page</h2>";
                echo "<p>This is the main section of our website.</p>";
            } 
            elseif ($page == 'about') {
                echo "<h2>About Us</h2>";
                echo "<p>We are a dynamic company offering great services.</p>";
            } 
            elseif ($page == 'contact') {
                echo "<h2>Contact Us</h2>";
                echo "<p>Email: info@example.com<br>Phone: +123 456 7890</p>";
            } 
            else {
                echo "<h2>404 - Page Not Found</h2>";
                echo "<p>The page you requested does not exist.</p>";
            }
        } 
        else {
            echo "<h2>Welcome!</h2>";
            echo "<p>Please select a page from the menu above.</p>";
        }
        ?>
    </div>

</body>
</html>
