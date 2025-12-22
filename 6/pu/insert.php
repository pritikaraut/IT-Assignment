<?php
include("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Name  = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];

    $sql = "INSERT INTO record (Name, Email, Phone)
            VALUES ('$Name', '$Email', '$Phone')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record inserted successfully');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Customer</title>
</head>
<body>

<h2>Insert Customer Details</h2>

<form method="POST">
    Name:
    <input type="text" name="name" required><br><br>

    Email:
    <input type="email" name="email" required><br><br>

    Phone:
    <input type="text" name="phone" required><br><br>

    <input type="submit" value="Insert">
</form>

</body>
</html>
