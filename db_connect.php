<?php
$server = 'localhost:3307'; // Server address
$username = 'root';    // Default username for XAMPP
$password = '';        // Default password is blank
$db ='ToDo_DB';

// Create connection
$conn = new mysqli($server, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
