<?php
session_start();
require_once 'config.php';

// Fix session directory permission if needed
// Check if you can write to C:\Program Files\xampp\tmp or change session.save_path in php.ini

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // FIX: Correct query string and variable usage
    $email_query = "SELECT email FROM users WHERE email = '$email'";
    $email_result = mysqli_query($conn, $email_query);

    // FIX: Check correct variable
    if (mysqli_num_rows($email_result) > 0) {
    $_SESSION['register_error'] = 'Email is already registered';
    $_SESSION['active_form'] = 'register';
    header("Location: logIn.php");
    exit();
} else {
        $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        if (mysqli_query($conn, $query)) {
            echo "Successfully Registered";
            header("Location: logIn.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];  

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");       
    if ($result && $result->num_rows > 0) {      
        $user = $result->fetch_assoc();        
        if (password_verify($password, $user['password'])) {  
            $_SESSION['name'] = $user['name'];  
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            
            if ($user['role'] === 'admin') { 
                header("Location: adminDashboard.php");
            } else {
                header("Location: userDashboard.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect email or password'; 
    $_SESSION['active_form'] = 'login';  
    header("Location: index.php"); 
    exit();
}
?>