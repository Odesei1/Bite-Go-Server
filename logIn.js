function showForm(formType) {
  const loginForm = document.getElementById("login-form");
  const registerForm = document.getElementById("register-form");

  if (formType === "login") {
    loginForm.classList.add("active");
    registerForm.classList.remove("active");
  } else {
    registerForm.classList.add("active");
    loginForm.classList.remove("active");
  }
}
