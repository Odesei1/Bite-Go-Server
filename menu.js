let menuItems = [
  {
    name: "Regular Burger",
    img: "menuItemPhotos/5.png",
    desc: "A classic beef burger with fresh lettuce, tomato, and our special sauce.",
    price: 65,
    category: "Burger",
  },
  {
    name: "Mega Burger",
    img: "menuItemPhotos/4.png",
    desc: "Double the beef, double the cheese, and double the satisfaction",
    price: 85,
    category: "Burger",
  },
  {
    name: "Cheese-flavored Fries",
    img: "menuItemPhotos/1.png",
    desc: "Golden crispy fries topped with rich and creamy cheese powder.",
    price: 50,
    category: "Fries",
  },
  {
    name: "Sour Cream-flavored Fries",
    img: "menuItemPhotos/2.png",
    desc: "Tangy and savory fries coated in sour cream seasoning.",
    price: 50,
    category: "Fries",
  },
  {
    name: "Barbecue-flavored Fries",
    img: "menuItemPhotos/3.png",
    desc: "Smoky barbeque-flavored fries with a touch of sweetness and spice.",
    price: 50,
    category: "Fries",
  },
  {
    name: "Hawaiian Pizza Slice",
    img: "menuItemPhotos/6.png",
    desc: "Sweet pineapple and savory ham on a cheesy pizza slice.",
    price: 30,
    category: "Pizza",
  },
  {
    name: "Ham & Cheese Pizza Slice",
    img: "menuItemPhotos/8.png",
    desc: "A simple yet delicious combo of ham and melted cheese.",
    price: 30,
    category: "Pizza",
  },
  {
    name: "Beef Peperoni Pizza Slice",
    img: "menuItemPhotos/7.png",
    desc: "Crispy pepperoni and beef crumbles on a gooey cheese base.",
    price: 30,
    category: "Pizza",
  },
  {
    name: "Coke",
    img: "menuItemPhotos/9.png",
    desc: "The classic cola — refreshing, fizzy and the all-time favorite.",
    price: 40,
    category: "Drinks",
  },
  {
    name: "Sprite",
    img: "menuItemPhotos/10.png",
    desc: "Crisp lemon-lime soda, perfect for any meal.",
    price: 40,
    category: "Drinks",
  },
  {
    name: "Mountain Dew",
    img: "menuItemPhotos/12.png",
    desc: "Bold citrus-flavored soda to keep your energy up.",
    price: 40,
    category: "Drinks",
  },
  {
    name: "Royal",
    img: "menuItemPhotos/11.png",
    desc: "Sweet and bubbly orange soda — a local favorite.",
    price: 40,
    category: "Drinks",
  },
];

// DOM elements
const menuContainer = document.getElementById("menuContainer");
const menuForm = document.getElementById("addMenuForm");
const formContainer = document.getElementById("formContainer");

// Render Menu Items
function renderMenu(items) {
  menuContainer.innerHTML = "";
  items.forEach((item, index) => {
    const div = document.createElement("div");
    div.className = "menu-item";
    div.innerHTML = `
      <h4>${item.name}</h4>
      <img src="${item.img}" alt="${item.name}">
      <p>${item.desc}</p>
      <p><strong>₱${item.price}</strong></p>
      <p><em>${item.category}</em></p>
      <button class="delete-button" onclick="deleteItem(${index})">Delete</button>
    `;
    menuContainer.appendChild(div);
  });

  menuContainer.style.display = "flex";
  formContainer.style.display = "none";
}

// Show Only the Form
function showForm() {
  formContainer.style.display = "block";
  menuContainer.style.display = "none";
}

// Filter by Category
function filterCategory(category) {
  const filtered =
    category === "All"
      ? menuItems
      : menuItems.filter((item) => item.category === category);
  renderMenu(filtered);
}

// Delete Item
function deleteItem(index) {
  menuItems.splice(index, 1);
  renderMenu(menuItems);

  alert("Item deleted successfully!");
}

// Add New Item from Form
menuForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const newItem = {
    name: document.getElementById("name").value,
    img: document.getElementById("img").value,
    desc: document.getElementById("desc").value,
    price: parseFloat(document.getElementById("price").value),
    category: document.getElementById("category").value,
  };

  menuItems.push(newItem);
  menuForm.reset();
  filterCategory("All");

  alert("Item added successfully!");
});

const backToTopBtn = document.getElementById("backToTopBtn");

window.addEventListener("scroll", () => {
  if (window.scrollY > 200) {
    backToTopBtn.style.display = "block";
  } else {
    backToTopBtn.style.display = "none";
  }
});

backToTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// Initial Page Load
window.addEventListener("DOMContentLoaded", () => {
  filterCategory("All");
});
