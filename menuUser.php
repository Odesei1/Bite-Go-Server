<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bite & Go Menu Page</title>
    <link rel="stylesheet" href="menu.css" />
  </head>
  <body>
    <header>
      <nav style="display: flex">
        <a href="#"
          ><img
            style="margin-right: -100px; height: 100%; width: 150px"
            src="BTG1.png"
        /></a>
      </nav>
      <div class="dropdown">
        <a href="userDashboard.php"><button>User Dashboard</button></a>
      </div>
      <div class="dropdown">
        <a href="menuUser.php"><button>Menu</button></a>
      </div>
      <div class="dropdown"><a href="inventoryUser.php"><button>Inventory</button></div>
      <div class="dropdown">
        <button>Socials ▼</button>
        <div class="content">
          <a target="_blank" href="https://www.facebook.com/">Facebook</a>
          <a target="_blank" href="https://www.instagram.com/">Instagram</a>
          <a target="_blank" href="https://www.youtube.com/">YouTube</a>
        </div>
      </div>
      <a href="logout.php"
        ><div class="dropdown"><button class="LogOut">⏻</button></div></a
      >
    </header>
    <div class="container">
      <aside class="sidebar">
        <h3>Menu Categories</h3>
        <ul id="categoryList">
          <li onclick="filterCategory('All')">All</li>
          <li onclick="filterCategory('Burger')">Burger</li>
          <li onclick="filterCategory('Fries')">Fries</li>
          <li onclick="filterCategory('Pizza')">Pizza</li>
          <li onclick="filterCategory('Drinks')">Drinks</li>
        </ul>

        <h3>Menu Options</h3>
        <ul>
          <li onclick="showForm()">Add Item</li>
        </ul>
      </aside>

      <main class="content">
        <section id="menuContainer"></section>
        <button id="backToTopBtn">Back to Top</button>

        <div id="formContainer" style="display: none">
          <form id="addMenuForm">
            <label for="name">Item Name</label>
            <input type="text" id="name" name="name" required />

            <label for="img">Image URL</label>
            <input type="text" id="img" name="img" required />

            <label for="desc">Description</label>
            <textarea id="desc" name="desc" rows="2" required></textarea>

            <label for="price">Price (₱)</label>
            <input type="number" id="price" name="price" required />

            <label for="category">Category</label>
            <select id="category" name="category" required>
              <option value="Burger">Burger</option>
              <option value="Fries">Fries</option>
              <option value="Pizza">Pizza</option>
              <option value="Drinks">Drinks</option>
            </select>

            <div class="button-container">
              <button type="submit">Add Menu Item</button>
            </div>
          </form>
        </div>
      </main>
    </div>
    <script src="menu.js"></script>
  </body>
</html>
