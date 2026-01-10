<?php
include "../config/db.php";
include "../includes/functions.php";
include "../includes/header.php";
$error = "";
$success = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];

    $roll_no = trim($_POST['roll_no']);
    $department = trim($_POST['department']);
    $semester = trim($_POST['semester']);
    $section = trim($_POST['section']);
    if ($name == "" || $email == "" || $password == "") {
        $error = "Please fill all required fields.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    }
    elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    }
    elseif ($role != "student" && $role != "admin") {
        $error = "Invalid role selected.";
    }
    else {
        $check = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {
            $error = "Email already registered.";
        }
        else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (name, email, password, role)
                    VALUES ('$name', '$email', '$hash', '$role')";

            if (mysqli_query($conn, $sql)) {

                $user_id = mysqli_insert_id($conn);
                if ($role == "student") {

                    if ($roll_no == "" || $department == "" || $semester == "" || $section == "") {

                        mysqli_query($conn, "DELETE FROM users WHERE user_id=$user_id");
                        $error = "Student fields are required.";
                    }
                    else {

                        $sql2 = "INSERT INTO students (user_id, roll_no, department, semester, section)
                                 VALUES ('$user_id', '$roll_no', '$department', '$semester', '$section')";

                        if (mysqli_query($conn, $sql2)) {
                            $success = "Registration successful. You can now login.";
                        } else {
                            mysqli_query($conn, "DELETE FROM users WHERE user_id=$user_id");
                            $error = "Student registration failed.";
                        }
                    }

                }
                else {

                    if ($department == "") {

                        mysqli_query($conn, "DELETE FROM users WHERE user_id=$user_id");
                        $error = "Department is required for admin.";
                    }
                    else {

                        $sql2 = "INSERT INTO teachers (user_id, department)
                                 VALUES ('$user_id', '$department')";

                        if (mysqli_query($conn, $sql2)) {
                            $success = "Registration successful. You can now login.";
                        } else {
                            mysqli_query($conn, "DELETE FROM users WHERE user_id=$user_id");
                            $error = "Admin registration failed.";
                        }
                    }
                }

            } else {
                $error = "Registration failed.";
            }
        }
    }
}
?>

<div class="card">
    <h2>Register</h2>

    <?php if ($error != "") { ?>
        <div class="alert alert-danger"><?php echo e($error); ?></div>
    <?php } ?>

    <?php if ($success != "") { ?>
        <div class="alert alert-success"><?php echo e($success); ?></div>
    <?php } ?>

    <form method="POST" class="form">

        <div class="grid-2">
            <div class="form-group">
                <label>Full Name *</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email" required>
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label>Password *</label>
                <input type="password" name="password" required>
                <small class="muted">Minimum 6 characters</small>
            </div>

            <div class="form-group">
                <label>Role *</label>
                <select name="role" id="roleSelect">
                    <option value="student">Student</option>
                    <option value="admin">Admin (Faculty)</option>
                </select>
            </div>
        </div>

        <hr>

        <div class="form-group">
            <label>Department *</label>
            <input type="text" name="department">
        </div>

        <div id="studentFields">
            <div class="grid-2">
                <div class="form-group">
                    <label>Roll No *</label>
                    <input type="text" name="roll_no">
                </div>

                <div class="form-group">
                    <label>Semester *</label>
                    <input type="text" name="semester">
                </div>
            </div>

            <div class="form-group">
                <label>Section *</label>
                <input type="text" name="section">
            </div>

            <small class="muted">Admin does not need student fields.</small>
        </div>

        <button class="btn" type="submit">Create Account</button>

        <p class="muted">
            Already have an account?
            <a href="login.php">Login</a>
        </p>

    </form>
</div>

<script>
    var roleSelect = document.getElementById("roleSelect");
    var studentFields = document.getElementById("studentFields");

    function toggleFields() {
        if (roleSelect.value == "student") {
            studentFields.style.display = "block";
        } else {
            studentFields.style.display = "none";
        }
    }

    roleSelect.addEventListener("change", toggleFields);
    toggleFields();
</script>

<?php include "../includes/footer.php"; ?>
