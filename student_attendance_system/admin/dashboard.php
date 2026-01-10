<?php
require_once "../config/db.php";
require_once "../includes/auth.php";

require_role('admin');
include "../includes/header.php";
$studentsCount = 0;
$classesCount = 0;
$attendanceCount = 0;
$result = mysqli_query($conn, "SELECT COUNT(*) AS c FROM students");
if ($result) {
    $studentsCount = mysqli_fetch_assoc($result)['c'];
}
$result = mysqli_query($conn, "SELECT COUNT(*) AS c FROM classes");
if ($result) {
    $classesCount = mysqli_fetch_assoc($result)['c'];
}
$result = mysqli_query($conn, "SELECT COUNT(*) AS c FROM attendance");
if ($result) {
    $attendanceCount = mysqli_fetch_assoc($result)['c'];
}
?>

<h2>Admin Dashboard</h2>

<div class="cards">
    <div class="stat-card">
        <div class="stat-title">Students</div>
        <div class="stat-value"><?php echo $studentsCount; ?></div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Classes</div>
        <div class="stat-value"><?php echo $classesCount; ?></div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Attendance Records</div>
        <div class="stat-value"><?php echo $attendanceCount; ?></div>
    </div>
</div>

<div class="card">
    <h3>Quick Actions</h3>
    <div class="actions">
        <a class="btn" href="classes.php">Manage Classes</a>
        <a class="btn btn-outline" href="attendance_mark.php">Mark Attendance</a>
        <a class="btn btn-outline" href="reports.php">Attendance Reports</a>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
