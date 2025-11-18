<!DOCTYPE html>
<html>
<head>
    <title>Server & Client Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            text-align: center;
            margin: 50px;
        }
        .info-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 500px;
            margin: auto;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        h2 {
            color: #007bff;
        }
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="info-box">
    <h2>Client & Server Information</h2>

    <?php
        $client_ip = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $server_name = $_SERVER['SERVER_NAME'];
        echo "<p><strong>Client IP Address:</strong> $client_ip</p>";
        echo "<p><strong>Browser & OS:</strong> $user_agent</p>";
        echo "<p><strong>Server Name:</strong> $server_name</p>";
    ?>
</div>
</body>
</html>
