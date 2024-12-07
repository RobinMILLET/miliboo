window.addEventListener("load", () => {
    getCookie("cookieConsentement").then(vu => {
        if (vu === null) { // Présenter les cookies si pas déjà fait
            document.getElementById("cookie-container").style.display = "block";
            document.getElementById("background").style.display = "flex";
        }
        else {
            setCookie("cookieConsentement", vu, 6, "mois") // Renouveller le cookie
        }
    })
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
const buttonConfirme = document.getElementById("button-confirme");
const buttonRefuse = document.getElementById("button-refuse");
const buttonAfficheCookie = document.getElementById("but-affiche-cookie");
const scale = 1.1;
var isOpen = false;

function ShowDetail() {
    buttonAccepte.style.display = "none";
    buttonConfirme.style.display = "block";

    buttonPersonnaliser.disabled = true;
    divDefault.style.display = "none";

    divDetail.style.display = "block";
    const currentContainerHeight = cookieContainer.clientHeight;
    cookieContainer.style.height = `${currentContainerHeight * scale}px`;
}

function CloseDetail(){
    buttonAccepte.style.display = "block";
    buttonConfirme.style.display = "none";

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
        var data = slider.getAttribute("data");
        if (data != "consentement"){
            slider.checked = (buttonAccepteTout.textContent == "Tout accepter")? true : false;
        }
    })

    buttonAccepteTout.textContent = (buttonAccepteTout.textContent == "Tout accepter")? "Tout déselectionner" : "Tout accepter";
})

function CloseCookies(){
    document.getElementById("background").style.display = "none";
    document.getElementById("cookie-container").style.display = "none";
}

buttonRefuse.addEventListener("click", () => {
    valeur = []
    slidersCookie.forEach(slider => {
        valeur.push(false);
    })
    setCookie("cookieConsentement", valeur, 6, "mois")
})

buttonConfirme.addEventListener("click", () => {
    valeur = []
    slidersCookie.forEach(slider => {
        valeur.push(slider.checked);
    })
    setCookie("cookieConsentement", valeur, 6, "mois")
})

buttonAccepte.addEventListener("click", () => {
    valeur = []
    slidersCookie.forEach(slider => {
        valeur.push(true);
    })
    setCookie("cookieConsentement", valeur, 6, "mois")
})

buttonAfficheCookie.addEventListener("click", () => {
    if (!isOpen){
        // Initialisation des sliders
        getCookie('cookieConsentement').then(cookieConsentement => {
            if (!cookieConsentement) return
            index = 0
            slidersCookie.forEach(slider => {
                if (index != 2) {
                    slider.checked = cookieConsentement[index];
                }
                index++;
            })
        })
        // Affichage
        CloseDetail()
        document.getElementById("cookie-container").style.display = "block";
        document.getElementById("cookie-container").style.border = "1px solid";
        document.getElementById("cookie-container").style.backgroundColor = "rgb(240, 240, 240)";
        document.getElementById("background").style.display = "flex";
        document.getElementById("background").style.zIndex = "3";
        document.getElementById("background").style.backgroundColor = "transparent";
        isOpen = !isOpen;
    } else {
        document.getElementById("cookie-container").style.display = "none";
        document.getElementById("background").style.display = "none";
        isOpen = !isOpen;
    }
})