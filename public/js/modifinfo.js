const backgroundInfo = document.querySelector("#background-info-perso");
const backgroundAdresse = document.querySelector("#background-modif-adresse");

const backgrounds = document.querySelectorAll(".background");

const buttonOpen = document.querySelector("#button-modif-perso");
const buttonAjoutAdresse = document.querySelector("#button-ajout-adresse");

const buttonClose = document.querySelectorAll(".button-ferme");

const namePart = document.querySelector("#title-part-adresse");

// Modif info
buttonOpen.addEventListener("click", () => {
    backgroundInfo.style.display = "flex";
})


// Ajout adresse
buttonAjoutAdresse.addEventListener("click", () => {
    backgroundAdresse.style.display = "flex";
    namePart.textContent = "Ajouter une adresse";
})

buttonClose.forEach(button => {
    button.addEventListener("click", () => {
        backgrounds.forEach(background => {
            background.style.display = "none";
        })
    })
});

function anonym() {
    if (confirm("Voulez-vous vraiment supprimer votre compte ?"+
        "\nCette action est finale et ne peut être annulée.")) {
            window.location.href = "/anonym/NoReallyDeleteMyAccountNow"
    }
}