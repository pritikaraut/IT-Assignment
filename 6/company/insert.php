<?php
include("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "INSERT INTO employees (name, email, department)
            VALUES ('$name', '$email', '$department')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Employee inserted successfully');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insert Employee</title>
</head>
<body>

<h2>Insert Employee Details</h2>

<form method="POST">
    Name:
    <input type="text" name="name" required><br><br>

    Email:
    <input type="email" name="email" required><br><br>

    Department:
    <input type="text" name="department" required><br><br>

    <input type="submit" value="Insert">
</form>

</body>
</html>
