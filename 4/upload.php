<?php
$name = "";
$errors = [];
$uploadSuccess = false;
$fileInfo = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters.";
    }
    if (!isset($_FILES['profile_pic']) || $_FILES['profile_pic']['error'] == 4) {
        $errors[] = "File is required.";
    } else {

        $file = $_FILES['profile_pic'];
        if ($file['error'] !== 0) {
            $errors[] = "File upload error. Code: " . $file['error'];
        } else {
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileSize = $file['size'];
            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            $fileType = mime_content_type($fileTmp);

            if (!in_array($fileType, $allowedTypes)) {
                $errors[] = "Invalid file type. Only JPG, JPEG, PNG, GIF allowed.";
            }
            if ($fileSize > 2 * 1024 * 1024) {
                $errors[] = "File size exceeds 2MB limit.";
            }
        }
    }
    if (empty($errors)) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $destination = $uploadDir . $fileName;
        if (move_uploaded_file($fileTmp, $destination)) {
            $uploadSuccess = true;
            $fileInfo = [
                "name" => $fileName,
                "size" => round($fileSize / 1024 / 1024, 2) . " MB",
                "type" => $fileType,
                "path" => $destination
            ];
        } else {
            $errors[] = "Failed to upload file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Picture Upload</title>
</head>
<body>
<h2>Upload Profile Picture</h2>
<?php if (!empty($errors)) : ?>
    <div style="color:red;">
        <h3>Upload Errors:</h3>
        <ul>
            <?php foreach ($errors as $e) : ?>
                <li><?php echo $e; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<?php if ($uploadSuccess) : ?>
    <div style="color:green;">
        <h3>Profile Picture Uploaded Successfully!</h3>
    </div>
    <p><strong>User Name:</strong> <?php echo htmlspecialchars($name); ?></p>
    <h3>File Information:</h3>
    <ul>
        <li><strong>File Name:</strong> <?php echo $fileInfo['name']; ?></li>
        <li><strong>File Size:</strong> <?php echo $fileInfo['size']; ?></li>
        <li><strong>File Type:</strong> <?php echo $fileInfo['type']; ?></li>
        <li><strong>Saved Location:</strong> <?php echo $fileInfo['path']; ?></li>
    </ul>
    <img src="<?php echo $fileInfo['path']; ?>" width="200px" alt="Profile Picture">
    <hr>
<?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">
    <label>User Name:</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><br><br>

    <label>Profile Picture:</label><br>
    <input type="file" name="profile_pic"><br><br>

    <button type="submit">Upload</button>
</form>
</body>
</html>
