<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f8f8f8;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
        }
        .section {
            margin-bottom: 15px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 6px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .output {
            background-color: #fff;
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<h2>Student Registration Form</h2>

<form method="POST" action="">
    <div class="section">
        <label>Full Name:</label><br>
        <input type="text" name="fullname" required>
    </div>

    <div class="section">
        <label>Gender:</label><br>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="radio" name="gender" value="Other"> Other
    </div>

    <div class="section">
        <label>Hobbies:</label><br>
        <input type="checkbox" name="hobbies[]" value="Reading"> Reading
        <input type="checkbox" name="hobbies[]" value="Sports"> Sports
        <input type="checkbox" name="hobbies[]" value="Music"> Music
        <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling
    </div>

    <div class="section">
        <label>Country:</label><br>
        <select name="country" required>
            <option value="">--Select--</option>
            <option value="Nepal">Nepal</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
        </select>
    </div>

    <div class="section">
        <label>Subjects:</label><br>
        <select name="subjects[]" multiple size="5" required>
            <option value="PHP">PHP</option>
            <option value="Java">Java</option>
            <option value="Database">Database</option>
            <option value="Networking">Networking</option>
            <option value="AI">AI</option>
        </select>
    </div>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : "None";
    $subjects = isset($_POST['subjects']) ? implode(", ", $_POST['subjects']) : "None";
    echo "<div class='output'>";
    echo "<h3>Student Registration Details</h3>";
    echo "<p><strong>Full Name:</strong> $fullname</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>Hobbies:</strong> $hobbies</p>";
    echo "<p><strong>Country:</strong> $country</p>";
    echo "<p><strong>Subjects:</strong> $subjects</p>";
    echo "</div>";
}
?>

</body>
</html>
