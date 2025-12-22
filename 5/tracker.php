<?php
session_start();
if (isset($_POST['reset'])) {
    unset($_SESSION['visit_count']);
}
if (isset($_SESSION['visit_count'])) {
    $_SESSION['visit_count'] += 1;
} else {
    $_SESSION['visit_count'] = 1;
}
$visit_count = $_SESSION['visit_count'];
?>
<<<<<<< HEAD

=======
>>>>>>> 88072da27b27969d54f7c53983ed5ecb4db66167
<!DOCTYPE html>
<html>
<head>
    <title>Session Visit Tracker</title>
</head>
<body>
<<<<<<< HEAD

<h2>Session Visit Tracker</h2>

=======
<h2>Session Visit Tracker</h2>
>>>>>>> 88072da27b27969d54f7c53983ed5ecb4db66167
<p>
<?php
echo "You have visited this page <strong>$visit_count</strong> times in this session.";
?>
</p>
<<<<<<< HEAD

<form method="post" action="">
    <input type="submit" name="reset" value="Reset Counter">
</form>

=======
<form method="post" action="">
    <input type="submit" name="reset" value="Reset Counter">
</form>
>>>>>>> 88072da27b27969d54f7c53983ed5ecb4db66167
</body>
</html>
