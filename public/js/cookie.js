window.addEventListener("load", () => {
    const consent = localStorage.getItem("cookieConsent");
    if (!consent){
        document.getElementById("cookie-container").style.display = "block";
        document.getElementById("background").style.display = "flex";
    }
})

const divDefault = document.getElementById("container-default");
const divDetail = document.getElementById("container-detail-hide");
const cookieContainer = document.getElementById("cookie-container");
const buttonPersonnaliser = document.getElementById("personnaliser");
const detailsElements = document.querySelectorAll(".detail-cookie");
const backGround = document.getElementById("background");
const buttonAccepteTout = document.getElementById("button-accepte-all");
const slidersCookie = document.querySelectorAll("input")
const buttonAccepte = document.getElementById("button-accepte");
const buttonRefuse = document.getElementById("button-refuse");
const buttonAfficheCookie = document.getElementById("but-affiche-cookie");
const scale = 1.1;

function ShowDetail() {
    buttonAccepte.textContent = "Confirmer la sélection";

    buttonPersonnaliser.disabled = true;
    divDefault.style.display = "none";

    divDetail.style.display = "block";
    const currentContainerHeight = cookieContainer.clientHeight;
    cookieContainer.style.height = `${currentContainerHeight * scale}px`;
}

function CloseDetail(){
    buttonAccepte.textContent = "Accepter";

    buttonPersonnaliser.disabled = false;
    divDefault.style.display = "block";

    divDetail.style.display = "none";

    cookieContainer.style.height = "";
}

detailsElements.forEach(detailsElement => {
    detailsElement.addEventListener("toggle", function() {
        const p = detailsElement.querySelector("summary span");

        if (detailsElement.open) {
           p.textContent = "-";
        } else {
            p.textContent = "+";
        }
    });
})

buttonAccepteTout.addEventListener("click", () => {
    slidersCookie.forEach(slider => {
        slider.checked = (buttonAccepteTout.textContent == "Tout accepter")? true : false;
    })

    buttonAccepteTout.textContent = (buttonAccepteTout.textContent == "Tout accepter")? "Tout déselectionner" : "Tout accepter";
})

function CloseCookies(){
    document.getElementById("background").style.display = "none";
    document.getElementById("cookie-container").style.display = "none";
}

buttonRefuse.addEventListener("click", () => {
    localStorage.setItem("cookieConsent", "refused");

    CloseCookies();
})

buttonAccepte.addEventListener("click", () => {
    slidersCookie.forEach(slider => {
        if (slider.checked){
            console.log(slider.closest(".detail-cookie"));
        }
    })

    localStorage.setItem("cookieConsent", "accepted");

    CloseCookies();
})

buttonAfficheCookie.addEventListener("click", () => {
    document.getElementById("cookie-container").style.display = "block";
    document.getElementById("cookie-container").style.border = "1px solid";
    document.getElementById("cookie-container").style.backgroundColor = "rgb(240, 240, 240)";
    document.getElementById("background").style.display = "flex";
    document.getElementById("background").style.zIndex = "1";
    document.getElementById("background").style.backgroundColor = "transparent";
})