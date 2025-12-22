<?php
if (isset($_POST['color'])) {
    $color = $_POST['color'];
    setcookie("user_color", $color, time() + 86400, "/");
    $_COOKIE['user_color'] = $color;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Select Your Favorite Color</title>
</head>
<body>
<h2>Select Your Favorite Color</h2>
<form method="post" action="">
    <label for="color">Choose a color:</label>
    <select name="color" id="color" required>
        <option value="">--Select--</option>
        <option value="Red" <?php if(isset($_COOKIE['user_color']) && $_COOKIE['user_color']=="Red") echo "selected"; ?>>Red</option>
        <option value="Blue" <?php if(isset($_COOKIE['user_color']) && $_COOKIE['user_color']=="Blue") echo "selected"; ?>>Blue</option>
        <option value="Green" <?php if(isset($_COOKIE['user_color']) && $_COOKIE['user_color']=="Green") echo "selected"; ?>>Green</option>
        <option value="Yellow" <?php if(isset($_COOKIE['user_color']) && $_COOKIE['user_color']=="Yellow") echo "selected"; ?>>Yellow</option>
    </select>
    <input type="submit" value="Set Color">
</form>
<hr>
<h2>Your Selected Color</h2>
<p>
<?php
if (isset($_COOKIE['user_color'])) {
    echo "Your selected color is: <strong>" . $_COOKIE['user_color'] . "</strong>";
} else {
    echo "You have not selected a color yet.";
}
?>
</p>
</body>
</html>
