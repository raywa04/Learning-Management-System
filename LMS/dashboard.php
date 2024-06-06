<?php
include 'includes/db.php';
include 'includes/auth.php'; // Check if the user is logged in

if ($_SESSION['role'] == 'instructor') {
    $sql = "SELECT * FROM courses WHERE instructor_id=".$_SESSION['user_id'];
} else {
    $sql = "SELECT c.* FROM courses c JOIN enrollments e ON c.id = e.course_id WHERE e.student_id=".$_SESSION['user_id'];
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Course: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
    }
} else {
    echo "No courses found";
}
?>
