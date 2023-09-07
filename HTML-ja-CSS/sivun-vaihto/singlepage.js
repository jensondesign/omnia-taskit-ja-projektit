// Näytä yksi sivu ja piilota muut
function showPage(page) {
  // Piilota kaikki div-elementit:
  document.querySelectorAll("div").forEach((div) => {
    div.style.display = "none";
  });

  // Näytä argumentissa oleva div-elementti:
  document.querySelector(`#${page}`).style.display = "block";
}

// Odota sivun latausta:
document.addEventListener("DOMContentLoaded", function () {
  // Valitse kaikki napit
  document.querySelectorAll("button").forEach((button) => {
    // Siirry ko. sivulle, kun sen nappia painetaan
    button.onclick = function () {
      showPage(this.dataset.page);
    };
  });
});
