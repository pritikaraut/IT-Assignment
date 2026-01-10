<?php
include "../config/db.php";
include "../includes/auth.php";
include "../includes/functions.php";

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'student') {
    header("Location: ../public/access_denied.php");
    exit;
}

$user_id = $_SESSION['user']['user_id'];
$sql = "
    SELECT s.student_id, s.roll_no, s.department, s.semester, s.section,
           u.name, u.email
    FROM students s, users u
    WHERE s.user_id = u.user_id
    AND s.user_id = $user_id
";

$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result);
if (!$student) {
    header("Location: ../public/access_denied.php");
    exit;
}

$student_id = $student['student_id'];
$classes = array();

$sql = "
    SELECT class_id, subject
    FROM classes
    WHERE semester = '{$student['semester']}'
    AND section = '{$student['section']}'
    ORDER BY subject
";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $classes[] = $row;
}
$stats = array();
$totalHeld = 0;
$totalAttended = 0;

foreach ($classes as $c) {

    $class_id = $c['class_id'];

    $sql = "
        SELECT COUNT(*) AS held,
        SUM(CASE WHEN status='Present' THEN 1 ELSE 0 END) AS attended
        FROM attendance
        WHERE class_id = $class_id
        AND student_id = $student_id
    ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $held = $row['held'];
    $attended = $row['attended'];

    if ($held > 0) {
        $pct = round(($attended / $held) * 100, 2);
    } else {
        $pct = 0;
    }

    $stats[] = array(
        'subject'   => $c['subject'],
        'held'      => $held,
        'attended'  => $attended,
        'pct'       => $pct
    );

    $totalHeld += $held;
    $totalAttended += $attended;
}
if ($totalHeld > 0) {
    $overallPct = round(($totalAttended / $totalHeld) * 100, 2);
} else {
    $overallPct = 0;
}
include "../includes/header.php";
?>

<h2>Student Dashboard</h2>

<div class="cards">
    <div class="stat-card">
        <div class="stat-title">Total Classes Held</div>
        <div class="stat-value"><?php echo $totalHeld; ?></div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Total Attended</div>
        <div class="stat-value"><?php echo $totalAttended; ?></div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Overall Attendance</div>
        <div class="stat-value"><?php echo $overallPct; ?>%</div>
    </div>
</div>

<?php if ($overallPct > 0 && $overallPct < 75) { ?>
    <div class="alert alert-warning">
        Low attendance warning:
        Your overall attendance is <b><?php echo $overallPct; ?>%</b>.
    </div>
<?php } ?>

<div class="grid-2 gap">
    <div class="card">
        <h3>My Profile</h3>
        <p><b>Name:</b> <?php echo e($student['name']); ?></p>
        <p><b>Email:</b> <?php echo e($student['email']); ?></p>
        <p><b>Roll No:</b> <?php echo e($student['roll_no']); ?></p>
        <p><b>Department:</b> <?php echo e($student['department']); ?></p>
        <p>
            <b>Semester:</b> <?php echo e($student['semester']); ?>
            • <b>Section:</b> <?php echo e($student['section']); ?>
        </p>
    </div>

    <div class="card">
        <h3>Subject-wise Attendance</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Held</th>
                    <th>Attended</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($stats as $s) { ?>
                <tr>
                    <td><?php echo e($s['subject']); ?></td>
                    <td><?php echo $s['held']; ?></td>
                    <td><?php echo $s['attended']; ?></td>
                    <td>
                        <span class="badge <?php echo ($s['pct'] >= 75) ? 'badge-ok' : 'badge-bad'; ?>">
                            <?php echo $s['pct']; ?>%
                        </span>
                    </td>
                </tr>
            <?php } ?>

            <?php if (count($stats) == 0) { ?>
                <tr>
                    <td colspan="4" class="muted">
                        No classes found for your semester and section.
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>

<?php
include "../includes/footer.php";
?>
