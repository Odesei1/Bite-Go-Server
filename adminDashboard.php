<?php
session_start();
require_once 'config.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    header("Location: adminDashboard.php");
    exit();
}

// Fetch all users
$result = mysqli_query($conn, "SELECT id, name, email, role FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="adminDashboard.css" />
  <style>
    main {
      padding: 100px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      width: 400px;
      text-align: center;
      margin-bottom: 40px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: center;
    }
    th {
      background: #00bf63;
      color: white;
    }
    .delete-btn {
      background: red;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    .delete-btn:hover {
      background: darkred;
    }
  </style>
</head>
<body>
  <header>
    <nav style="display: flex">
      <a href="#"><img style="margin-right: -100px; height: 100%; width: 150px" src="BTG1.png" /></a>
    </nav>
    <div class="dropdown"><a href="adminDashboard.php"><button>Admin Dashboard</button></a></div>
    <div class="dropdown"><a href="menuAdmin.php"><button>Menu</button></a></div>
    <div class="dropdown"><a href="inventoryAdmin.php"><button>Inventory</button></a></div>
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
    <div class="card">
      <h2>Welcome, <?= htmlspecialchars($_SESSION['name']) ?>!</h2>
      <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email']) ?></p>
      <p><strong>Role:</strong> <?= htmlspecialchars($_SESSION['role']) ?></p>
    </div>

    <h2>All Registered Users</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($user = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $user['id'] ?></td>
          <td><?= htmlspecialchars($user['name']) ?></td>
          <td><?= htmlspecialchars($user['email']) ?></td>
          <td><?= htmlspecialchars($user['role']) ?></td>
          <td>
            <?php if ($_SESSION['email'] !== $user['email']): ?>
              <a href="?delete=<?= $user['id'] ?>" onclick="return confirm('Delete this user?');">
                <button class="delete-btn">Delete</button>
              </a>
            <?php else: ?>
              <em>Current Admin</em>
            <?php endif; ?>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </main>
</body>
</html>