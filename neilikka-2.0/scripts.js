// Hae tarvittavat elementit
const hamppisMenu = document.getElementById("hamppis-menu");
const overlayMenu = document.getElementById("overlay");
const closeButton = document.getElementById("sulkunappi");
const iconElement = hamppisMenu.querySelector("i");

// Aseta sulkuikonille FontAwesome-ikoni ja luokat
closeButton.className = "fa-solid fa-xmark sulkunappi";
closeButton.style.display = "none"; // Piilota sulkuikoni aluksi

// Lisää sulkuikoni valikon yläkulmaan
overlayMenu.appendChild(closeButton);

// Kuuntele hamppis-ikonin klikkausta
hamppisMenu.addEventListener("click", () => {
  overlayMenu.classList.toggle("active"); // Näytä/Piilota valikko
  if (iconElement.classList.contains("fa-bars")) {
    iconElement.classList.remove("fa-bars");
    iconElement.classList.add("fa-xmark");
  } else {
    iconElement.classList.remove("fa-xmark");
    iconElement.classList.add("fa-bars");
  }

  document.body.classList.toggle("overlay-active"); // Menun tausta
});

// Kuuntele sulkuikonin klikkausta
closeButton.addEventListener("click", () => {
  overlayMenu.classList.remove("active"); // Piilota valikko
  iconElement.classList.remove("fa-xmark");
  iconElement.classList.add("fa-bars");
});
