<?php
include 'db_connect.php';

// Check if an ID was provided in the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL DELETE statement
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect back to the main page after deletion
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting task: " . $conn->error;
    }
} else {
    echo "Invalid task ID.";
}
?>
