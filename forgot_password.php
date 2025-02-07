<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $stmt = $conn->prepare("SELECT id, phone FROM users WHERE phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $code = rand(1000, 9999);
        send_sms($phone, $code);
        $_SESSION['reset_code'] = $code;
        $_SESSION['phone'] = $phone;

        echo "A 4-digit code has been sent to your phone. Please enter it below.";
        header("Location: verify_code.php");
        exit;
    } else {
        echo "Phone number not found.";
    }
}


function send_sms($phone, $code) {
    echo "SMS sent to $phone with code: $code";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <form method="POST">
        <h1>Forgot Password</h1>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <button type="submit">Send Code</button>
    </form>
</body>
</html>
