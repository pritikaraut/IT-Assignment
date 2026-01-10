<?php
include "../config/db.php";
include "../includes/functions.php";
if (isset($_SESSION['user'])) {

    $role = $_SESSION['user']['role'];

    if ($role == 'admin') {
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../student/dashboard.php");
    }
    exit;
}
$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == "" || $password == "") {
        $error = "Please enter email and password.";
    } else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($result) == 1) {

            $user = mysqli_fetch_assoc($result);

            
            if (password_verify($password, $user['password'])) {

                
                $_SESSION['user'] = array(
                    'user_id' => $user['user_id'],
                    'name'    => $user['name'],
                    'email'   => $user['email'],
                    'role'    => $user['role']
                );

               
                if ($user['role'] == 'admin') {
                    header("Location: ../admin/dashboard.php");
                } else {
                    header("Location: ../student/dashboard.php");
                }
                exit;

            } else {
                $error = "Invalid credentials.";
            }

        } else {
            $error = "Invalid credentials.";
        }
    }
}


include "../includes/header.php";
?>

<div class="card narrow">
    <h2>Login</h2>

    <?php if ($error != "") { ?>
        <div class="alert alert-danger"><?php echo e($error); ?></div>
    <?php } ?>

    <form method="POST" class="form">

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button class="btn" type="submit">Login</button>

        <p class="muted">
            No account?
            <a href="register.php">Register</a>
        </p>

    </form>
</div>

<?php
include "../includes/footer.php";
?>
