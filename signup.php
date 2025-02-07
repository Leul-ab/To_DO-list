<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query to insert the user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $phone, $hashed_password);

        // Execute the query and check if the registration is successful
        if ($stmt->execute()) {
            header("Location: login.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Arial', sans-serif;
      background-color:rgb(0, 0, 0);
    }

    .signup-container {
      background-color: #d3d3d3;
      width: 400px;
      padding: 40px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    h1 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 5px;
      color: black;
    }

    p {
      font-size: 14px;
      color: #333;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    .input-group {
      display: flex;
      align-items: center;
      background-color: #b0b0b0;
      padding: 10px;
      margin: 10px 0;
      border-radius: 8px;
    }

    .input-group i {
      margin-right: 10px;
      font-size: 16px;
      color: #666;
    }

    input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
      border: none;
      outline: none;
      background: none;
      width: 100%;
      font-size: 14px;
      color: #333;
    }

    button {
      width: 100%;
      background-color: black;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      margin-top: 15px;
    }

    button:hover {
      background-color: #333;
    }

    a {
      display: block;
      color: #333;
      margin-top: 10px;
      font-size: 14px;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="signup-container">
    <h1>Sign up</h1>
    <p>create your account</p>
    <form action="#" method="POST">
      <div class="input-group">
        <i class="fa fa-user"></i>
        <input type="text" name="username" placeholder="Username" required>
      </div>
      <div class="input-group">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="input-group">
        <i class="fa fa-phone"></i>
        <input type="tel" name="phone" placeholder="Phone number">
      </div>
      <div class="input-group">
        <i class="fa fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <div class="input-group">
        <i class="fa fa-lock"></i>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>
      </div>
      <?php
        if (isset($error)) {
            echo '<p style="color: red;">' . $error . '</p>';
        }
        ?>
      <button type="submit">Sign up</button>
      <a href="login.php">Already have an account?</a>
    </form>
  </div>
</body>
</html>
