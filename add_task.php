<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['task'])) {
    $task = trim($_POST['task']);
    $user_id = $_SESSION['user_id'];

    // Insert the task for the current user
    $stmt = $conn->prepare("INSERT INTO tasks (task, status, created_at, user_id) VALUES (?, 0, NOW(), ?)");
    $stmt->bind_param("si", $task, $user_id);

    if ($stmt->execute()) {
        header("Location: index.php"); // Redirect to avoid form resubmission
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid task submission.";
}
?>
