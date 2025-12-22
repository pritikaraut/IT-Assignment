<?php
include "db_connection.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM employees WHERE id=$id");
mysqli_close($conn);
header("Location: view.php");
exit();
?>
