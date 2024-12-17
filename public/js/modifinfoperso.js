const background = document.querySelector("#background-info-perso");
const buttonOpen = document.querySelector("#button-modif-perso");
const buttonClose = document.querySelector("#button-ferme-perso");

buttonOpen.addEventListener("click", () => {
    background.style.display = "flex";
})

buttonClose.addEventListener("click", () => {
    background.style.display = "none";
})