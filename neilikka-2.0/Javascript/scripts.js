const menuIcon = document.querySelector(".nav-hamburger");
const navOverlay = document.querySelector(".nav-overlay");
const closeBtn = document.querySelector(".nav-close");

menuIcon.addEventListener("click", () => {
  navOverlay.classList.toggle("show");
});

closeBtn.addEventListener("click", () => {
  navOverlay.classList.remove("show");
});
