<?php
include 'db_connect.php';

// Check if an ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update the task status to "Done"
    $status = 1;
    $stmt = $conn->prepare("UPDATE tasks SET status = ? WHERE id = ?");
    $stmt->bind_param("ii", $status, $id);


    if ($stmt->execute()) {
        // Redirect back to the main page
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating task: " . $conn->error;
    }
} else {
    echo "Invalid task ID.";
}
?>
