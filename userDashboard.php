<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['email'];
$query = "SELECT name, email, role FROM users WHERE email = '$email' LIMIT 1";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="userDashboard.css">
  <style>
    main {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 120px;
    }
    .card {
      background: white;
      padding: 60px;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
      width: 700px;
      text-align: center;
      transform: scale(1.02);
    }
    h1 {
      font-size: 36px;
      margin-bottom: 20px;
      font-family: "Segoe UI", sans-serif;
    }
    h2 {
      margin-bottom: 30px;
      font-size: 50px;
      font-family: "Segoe UI", sans-serif;
    }
    table {
      margin-bottom: 40px;
      border-collapse: collapse;
      width: 90%;
      max-width: 700px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    table th, table td {
      padding: 12px;
      font-size: 18px;
    }
    table thead tr {
      background-color: #00bf63;
      color: white;
    }
  </style>
</head>
<body>

<header>
  <nav style="display: flex">
    <a href="#"><img style="margin-right: -100px; height: 100%; width: 150px" src="BTG1.png" /></a>
  </nav>
  <div class="dropdown"><a href="userDashboard.php"><button>User Dashboard</button></a></div>
  <div class="dropdown"><a href="menuUser.php"><button>Menu</button></a></div>
  <div class="dropdown"><a href="inventoryUser.php"><button>Inventory</button></a></div>
  <div class="dropdown">
    <button>Socials ▼</button>
    <div class="content">
      <a target="_blank" href="https://www.facebook.com/">Facebook</a>
      <a target="_blank" href="https://www.instagram.com/">Instagram</a>
      <a target="_blank" href="https://www.youtube.com/">YouTube</a>
    </div>
  </div>
  <a href="logout.php"><div class="dropdown"><button class="LogOut">⏻</button></div></a>
</header>

<main>
  <h1>Your Account Information</h1>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= htmlspecialchars($user['name']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><?= htmlspecialchars($user['role']) ?></td>
      </tr>
    </tbody>
  </table>

  <div class="card">
    <h2>Welcome, <?= htmlspecialchars($user['name']) ?>!</h2>
  </div>
</main>

</body>
</html>