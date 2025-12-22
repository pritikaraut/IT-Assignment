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

<!DOCTYPE html>
<html>
<head>
    <title>Session Visit Tracker</title>
</head>
<body>

<h2>Session Visit Tracker</h2>

<p>
<?php
echo "You have visited this page <strong>$visit_count</strong> times in this session.";
?>
</p>

<form method="post" action="">
    <input type="submit" name="reset" value="Reset Counter">
</form>

</body>
</html>
