<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Bite & Go Inventory Page</title>
  <link rel="stylesheet" href="inv.css" />
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
    <div class="dropdown"><a href="userDashboard.php"><button>Admin Dashboard</button></a></div>
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

  <div class="tab-menu">
    <button class="tab-btn" data-item="Buns" onclick="showTable('Buns')">Burgers</button>
    <button class="tab-btn" data-item="Dough" onclick="showTable('Dough')">Pizza</button>
    <button class="tab-btn" data-item="Fries" onclick="showTable('Fries')">Fries</button>
    <button class="tab-btn" data-item="Coke" onclick="showTable('Coke')">Drinks</button>
    <button class="tab-btn" data-item="Condiments" onclick="showTable('Condiments')">Condiments</button>
    <button class="tab-btn" data-item="Utensils" onclick="showTable('Utensils')">Utensils</button>
  </div>

  <div id="add-item-section">
    <form id="add-item-form">
        <p>Add New Item</p>
      <input type="text" id="new-item-name" placeholder="Item Name" required />
      <input type="number" id="new-item-qty" placeholder="Qty" required />
      <input type="text" id="new-item-box" placeholder="Box Number" required />
      <label for="new-item-expiry">Acquired on:</label>
      <input type="date" id="new-item-date" required />
      <label for="new-item-expiry">Expiry:</label>
      <input type="date" id="new-item-expiry"/>
      <input type="text" id="new-item-supplier" placeholder="Supplier"   required/>

      <select id="new-item-status">
        <option value="Fresh">Fresh</option>
        <option value="Near Expiry">Near Expiry</option>
        <option value="Expired">Expired</option>
        <option value="Used">Used</option>
      </select>
      <button type="submit">Add</button>
    </form>
  </div>
  
  <div id="inventory-table" style="display: none; margin-top: 20px;">
    <table>
      <thead>
        <tr>
          <th>Purchase ID</th>
          <th>Item Name</th>
          <th>Stocks Left</th>
          <th>Date Acquired</th>
          <th>Quantity</th>
          <th>Box Number</th>
          <th>Expiry</th>
          <th>Supplier</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="table-body">
        <!-- Dynamic content -->
      </tbody>
    </table>
  </div>

  </body>
  <script src="inv.js"></script>
  </html>