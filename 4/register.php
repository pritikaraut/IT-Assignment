<?php
$fullname = $username = $email = $age = "";
$errors = [];
$success = false;
$passwordStrength = "";
function checkStrength($password)
{
    if (strlen($password) < 8) return "Weak";

    $hasUpper = preg_match('/[A-Z]/', $password);
    $hasLower = preg_match('/[a-z]/', $password);
    $hasNumber = preg_match('/\d/', $password);

    if ($hasUpper && $hasLower && $hasNumber) return "Strong";
    if (($hasUpper && $hasLower) || ($hasLower && $hasNumber)) return "Medium";

    return "Weak";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $age = htmlspecialchars(trim($_POST['age']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    if (empty($fullname)) {
        $errors['fullname'] = "Full name is required.";
    } elseif (strlen($fullname) < 3) {
        $errors['fullname'] = "Full name must be at least 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $fullname)) {
        $errors['fullname'] = "Full name can only contain letters and spaces.";
    }

    if (empty($username)) {
        $errors['username'] = "Username is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9_]{5,15}$/", $username)) {
        $errors['username'] = "Username must be 5–15 characters and alphanumeric only.";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    } elseif (strpos($email, ' ') !== false) {
        $errors['email'] = "Email must not contain spaces.";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        $errors['password'] = "Password must be 8+ chars, include uppercase, lowercase & number.";
    } else {
        $passwordStrength = checkStrength($password);
    }
    if (empty($confirmPassword)) {
        $errors['confirm_password'] = "Please confirm your password.";
    } elseif ($password !== $confirmPassword) {
        $errors['confirm_password'] = "Passwords do not match.";
    }
    if (empty($age)) {
        $errors['age'] = "Age is required.";
    } elseif (!is_numeric($age)) {
        $errors['age'] = "Age must be a number.";
    } elseif ($age < 18 || $age > 100) {
        $errors['age'] = "Age must be between 18 and 100.";
    }
    if (empty($errors)) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Registration Form</title>
    <style>
        .error { color: red; font-size: 14px; }
        .success { color: green; font-size: 18px; font-weight: bold; }
        .strength { font-weight: bold; }
    </style>
</head>
<body>

<h2>Registration Form</h2>

<?php if ($success): ?>
    <p class="success">Registration Successful!</p>
    <h3>Your Submitted Information:</h3>
    <p><strong>Full Name:</strong> <?= $fullname ?></p>
    <p><strong>Username:</strong> <?= $username ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Age:</strong> <?= $age ?></p>
    <p><strong>Password Strength:</strong> <?= $passwordStrength ?></p>
<?php else: ?>

<form method="post" action="">
    <label>Full Name:</label><br>
    <input type="text" name="fullname" value="<?= $fullname ?>"><br>
    <span class="error"><?= $errors['fullname'] ?? '' ?></span><br><br>
    <label>Username:</label><br>
    <input type="text" name="username" value="<?= $username ?>"><br>
    <span class="error"><?= $errors['username'] ?? '' ?></span><br><br>
    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $email ?>"><br>
    <span class="error"><?= $errors['email'] ?? '' ?></span><br><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <span class="error"><?= $errors['password'] ?? '' ?></span><br><br>
    <label>Confirm Password:</label><br>
    <input type="password" name="confirm_password"><br>
    <span class="error"><?= $errors['confirm_password'] ?? '' ?></span><br><br>
    <label>Age:</label><br>
    <input type="number" name="age" value="<?= $age ?>"><br>
    <span class="error"><?= $errors['age'] ?? '' ?></span><br><br>

    <button type="submit">Register</button>
</form>

<?php endif; ?>

</body>
</html>
