<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/login.css" />
  <title>Login Page</title>
  
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>
    <p>sign in to your account</p>
    <form method="POST">
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text"  name="username" placeholder="username" required>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="password" required>
      </div>
      <button class="btn" type="submit">Login</button>
      <a href="forgot_password.php">I forgot my password</a>
      <a href="signup.php"><button class="secondary-btn" type="button">Register</button></a>
      <?php
        include 'db_connect.php';
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                header("Location: index.php");
                exit;
            } else {
                echo "Invalid credentials.";
            }
        }
?>
    </form>
  </div>
  
</body>
</html>
