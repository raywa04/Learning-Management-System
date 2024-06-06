<?php
include 'includes/db.php';
include 'includes/auth.php'; // Check if the user is logged in

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $instructor_id = $_SESSION['user_id'];

    $sql = "INSERT INTO courses (title, description, instructor_id) VALUES ('$title', '$description', '$instructor_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Course created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST" action="">
    Course Title: <input type="text" name="title" required><br>
    Description: <textarea name="description" required></textarea><br>
    <input type="submit" value="Create Course">
</form>
