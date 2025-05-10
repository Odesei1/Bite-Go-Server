// Sample Data
const fakeData = {
  Buns: [
    {
      id: 1,
      item: "Buns",
      stocks: 2,
      date: "2024-05-01",
      qty: 100,
      box: "BX01",
      expiry: "2025-01-01",
      supplier: "BunMaster",
      status: "Fresh",
    },
    {
      id: 2,
      item: "Patty",
      stocks: 2,
      date: "2024-04-18",
      qty: 80,
      box: "BX02",
      expiry: "2024-12-15",
      supplier: "BakeCo",
      status: "Used",
    },
  ],
  Dough: [
    {
      id: 3,
      item: "Dough",
      stocks: 0,
      date: "2024-04-25",
      qty: 60,
      box: "DZ01",
      expiry: "2024-12-30",
      supplier: "PizzaBase",
      status: "Fresh",
    },
  ],
  Fries: [
    {
      id: 4,
      item: "Fries",
      stocks: 0,
      date: "2024-05-05",
      qty: 50,
      box: "FR01",
      expiry: "2024-08-01",
      supplier: "FryKing",
      status: "Fresh",
    },
  ],
  Coke: [
    {
      id: 5,
      item: "Coca-Cola",
      stocks: 0,
      date: "2024-05-02",
      qty: 200,
      box: "CK01",
      expiry: "2025-01-01",
      supplier: "Coca-Cola",
      status: "Fresh",
    },
    {
      id: 6,
      item: "Sprite",
      stocks: 0,
      date: "2024-05-02",
      qty: 200,
      box: "CK01",
      expiry: "2025-01-01",
      supplier: "Coca-Cola",
      status: "Fresh",
    },
  ],
  Condiments: [
    {
      id: 7,
      item: "Ketchup",
      stocks: 0,
      date: "2024-05-01",
      qty: 30,
      box: "CD01",
      expiry: "2025-02-01",
      supplier: "Saucy",
      status: "Fresh",
    },
  ],
  Utensils: [
    {
      id: 8,
      item: "Forks",
      stocks: 0,
      date: "2024-05-01",
      qty: 500,
      box: "UT01",
      expiry: "N/A",
      supplier: "PlastiCo",
      status: "Available",
    },
  ],
};

let currentCategory = "Buns";

function showTable(itemName) {
  currentCategory = itemName;
  const data = fakeData[itemName] || [];
  const tbody = document.getElementById("table-body");
  tbody.innerHTML = "";

  if (data.length === 0) {
    tbody.innerHTML = `<tr><td colspan="10">No data found for "${itemName}"</td></tr>`;
  } else {
    data.forEach((row, index) => {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${row.id}</td>
        <td>${row.item}</td>
        <td>${row.stocks}</td>
        <td>${row.date}</td>
        <td><input type="number" value="${
          row.qty
        }" onchange="updateQty(${index}, this.value)" /></td>
        <td>${row.box}</td>
        <td>${row.expiry}</td>
        <td>${row.supplier}</td>
        <td>
          <select onchange="updateStatus(${index}, this.value)">
            <option ${row.status === "Fresh" ? "selected" : ""}>Fresh</option>
            <option ${
              row.status === "Near Expiry" ? "selected" : ""
            }>Near Expiry</option>
            <option ${
              row.status === "Expired" ? "selected" : ""
            }>Expired</option>
            <option ${row.status === "Used" ? "selected" : ""}>Used</option>
            <option ${
              row.status === "Available" ? "selected" : ""
            }>Available</option>
          </select>
        </td>
        <td>
          <button class="comment-btn" onclick="commentItem(${index})">Comment</button>
          <button class="delete-btn" onclick="deleteItem(${index})">Delete Item</button>
        </td>
      `;
      tbody.appendChild(tr);
    });
  }

  document.getElementById("inventory-table").style.display = "block";
  document.getElementById("add-item-section").style.display = "block";

  document.querySelectorAll(".tab-btn").forEach((btn) => {
    btn.classList.toggle("active", btn.dataset.item === itemName);
  });
}

function updateQty(index, newQty) {
  fakeData[currentCategory][index].qty = parseInt(newQty);
}

function updateStatus(index, newStatus) {
  fakeData[currentCategory][index].status = newStatus;
}

function deleteItem(index) {
  const confirmed = confirm("Are you sure you want to delete this item?");
  if (confirmed) {
    fakeData[currentCategory].splice(index, 1);
    showTable(currentCategory);
  }
}

// Handle add item form

document
  .getElementById("add-item-form")
  .addEventListener("submit", function (e) {
    e.preventDefault();
    if (!currentCategory) {
      alert("Please select a category first.");
      return;
    }

    const item = {
      id: Date.now(),
      item: document.getElementById("new-item-name").value,
      stocks: 0,
      date: document.getElementById("new-item-date").value,
      qty: parseInt(document.getElementById("new-item-qty").value),
      box: document.getElementById("new-item-box").value,
      expiry: document.getElementById("new-item-expiry").value,
      supplier: document.getElementById("new-item-supplier").value,
      status: document.getElementById("new-item-status").value,
    };

    fakeData[currentCategory].unshift(item);
    showTable(currentCategory);
    this.reset();
  });

// Auto show Buns (Burger) table on load
window.onload = function () {
  showTable("Buns");
};
