<?php
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formname, $activeForm){
    return $formname === $activeForm ? 'active' : '';
}

unset($_SESSION['login_error'], $_SESSION['register_error'], $_SESSION['active_form']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bite & Go Login Page</title>
  <link rel="stylesheet" href="logInStyle.css" />
</head>
<body>
 <header>
  <img src="BTG2,png.png" alt="Bite & Go Logo"/>
</header>
  <div class="container">
    <!-- Login Form -->
    <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
      <form action="login_register.php" method="post">
        <center><h2>Log In</h2></center>
        <?= showError($errors['login']); ?>
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit" name="login">Login</button>
        <p>
          Don't have an account?
          <a href="#" onclick="showForm('register')">Register</a>
        </p>
      </form>
    </div>

    <!-- Register Form -->
    <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
      <form action="login_register.php" method="post">
        <center><h2>Register</h2></center>
        <?= showError($errors['register']); ?>
        <input type="text" name="name" placeholder="Full Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <select name="role" required>
          <option value="">--Select Role--</option>
          <option value="Admin">Admin</option>
          <option value="User">User</option>
        </select>
        <button type="submit" name="register">Register</button>
        <p>
          Already have an account?
          <a href="#" onclick="showForm('login')">Log In</a>
        </p>
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