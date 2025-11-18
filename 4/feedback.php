<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 50px;
            text-align: center;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        input, select, textarea {
            width: 90%;
            margin: 10px 0;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .result {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            margin: 30px auto;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<h2>Feedback Form</h2>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $rating = htmlspecialchars($_POST['rating']);
    $comment = htmlspecialchars($_POST['comment']);

    echo "<div class='result'>";
    echo "<h3>Feedback Submitted</h3>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Rating:</strong> $rating / 5</p>";
    echo "<p><strong>Comment:</strong> $comment</p>";
    echo "</div>";
} else {
  
?>
    <form method="post" action="">
        <label><strong>Name:</strong></label><br>
        <input type="text" name="name" required><br>

        <label><strong>Rating (1–5):</strong></label><br>
        <select name="rating" required>
            <option value="">--Select--</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select><br>

        <label><strong>Comment:</strong></label><br>
        <textarea name="comment" rows="4" required></textarea><br>

        <button type="submit">Submit Feedback</button>
    </form>
<?php
}
?>

</body>
</html>
