<?php
session_start();

// Capture and clear session-based errors
$loginError = $_SESSION['login_error'] ?? '';
$activeForm = $_SESSION['active_form'] ?? 'login';

unset($_SESSION['login_error'], $_SESSION['active_form']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bite & Go Login Page</title>
  <link rel="stylesheet" href="logInStyle.css">
</head>
<body>

  <!-- Logo or header here -->
  <header>
    <img src="BTG2,png.png" alt="Bite & Go Logo" style="height: 80px;" />
  </header>

  <div class="container">
    <div class="form-box <?= $activeForm === 'login' ? 'active' : '' ?>" id="login-form">
      <form action="login_register.php" method="post">
        <center><h2>Log In</h2></center>

        <!-- ✅ Show error if login failed -->
        <?php if (!empty($loginError)): ?>
          <p class="error-message"><?= htmlspecialchars($loginError) ?></p>
        <?php endif; ?>

        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit" name="login">Login</button>

        <p>Don't have an account? <a href="#" onclick="showForm('register')">Register</a></p>
      </form>
    </div>
  </div>
<footer>
  <div class="footer-content">
    <p>&copy; 2025 Bite & Go. All rights reserved.</p>
  </div>
</footer>
  <script src="logIn.js"></script>
</body>
</html>