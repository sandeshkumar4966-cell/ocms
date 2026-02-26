<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO complaints (user_id, title, description)
            VALUES ('$user_id', '$title', '$description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    <h2>Submit Complaint</h2>
    Title: <input type="text" name="title" required><br><br>
    Description:<br>
    <textarea name="description" required></textarea><br><br>
    <button type="submit">Submit</button>
</form>