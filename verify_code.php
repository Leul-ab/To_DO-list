<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_code = $_POST['code'];

    // Check if the entered code matches the one stored in the session
    if (isset($_SESSION['reset_code']) && $entered_code == $_SESSION['reset_code']) {
        // Code matches, redirect to reset password page
        header("Location: reset_password.php");
        exit;
    } else {
        echo "Invalid code, please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
</head>
<body>
    <form method="POST">
        <h1>Enter the 4-digit code sent to your phone</h1>
        <input type="text" name="code" placeholder="Enter Code" required>
        <button type="submit">Verify Code</button>
    </form>
</body>
</html>
