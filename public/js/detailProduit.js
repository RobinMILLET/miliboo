window.addEventListener('scroll', function () {
    const card = document.querySelector('.cardProduit');
    const col = document.querySelector('.colPresentationProduit');

    const colRect = col.getBoundingClientRect();
    const colBottom = colRect.bottom;

    if (colRect.top <= 0 && colBottom > window.innerHeight) {
        card.style.position = 'fixed';
        card.style.top = '10px';
    } else if (colBottom <= window.innerHeight) {
        card.style.position = 'absolute';
        card.style.top = `${colRect.height - card.offsetHeight}px`;
    } else {

        card.style.position = 'absolute';
        card.style.top = '0';
    }
});

window.addEventListener('load', matchColumnHeights);
window.addEventListener('resize', matchColumnHeights);

function matchColumnHeights() {
    const colImages = document.querySelector('.colImagesProduit');
    const colPresentation = document.querySelector('.colPresentationProduit');

    const colImagesHeight = colImages.offsetHeight;

    colPresentation.style.height = `${colImagesHeight}px`;
}

function minusOne() {
    minusBtn = document.getElementById("minusOne")
    quant = document.getElementById("quant")
    plusBtn = document.getElementById("plusOne")
    plusBtn.disabled = false
    quantite = parseInt(quant.value)
    if (quantite <= 2) minusBtn.disabled = true
    quant.value = quantite-1
}

function plusOne(max) {
    minusBtn = document.getElementById("minusOne")
    quant = document.getElementById("quant")
    plusBtn = document.getElementById("plusOne")
    minusBtn.disabled = false
    quantite = parseInt(quant.value)
    if (quantite >= max-1) plusBtn.disabled = true
    quant.value = quantite+1
}

function verif(max) {
    minusBtn = document.getElementById("minusOne")
    quant = document.getElementById("quant")
    plusBtn = document.getElementById("plusOne")
    quantite = parseInt(quant.value)
    if (isNaN(quantite) || quantite < 1) quantite = 1
    if (quantite > max) quantite = max
    quant.value = quantite
    if (quantite <= 2) minusBtn.disabled = true
    else minusBtn.disabled = false
    if (quantite >= max-1) plusBtn.disabled = true
    else plusBtn.disabled = false
}

function achete(idproduit, idcouleur) {
    quant = document.getElementById("quant")
    quantite = parseInt(quant.value)
    fetch("/addPanier/"+idproduit+"/"+idcouleur+"/"+quantite)
        .then(response => response.json())
        .then(data => {
            window.location.href = "/panier"
            console.log(data.message)
        });
}

function showPreviewImage(img) {
    const modal = document.getElementById('imagePreview');
    const previewImage = document.getElementById('previewImage');
    modal.style.display = 'block';
    previewImage.src = img.src;
}

function closePreview() {
    const modal = document.getElementById('imagePreview');
    modal.style.display = 'none';
}

window.onclick = function(event) {
    const modal = document.getElementById('imagePreview');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}








const buttonScrollRight = document.querySelectorAll("#button-scroll-right");
const buttonScrollLeft = document.querySelectorAll("#button-scroll-left");
const itemWidth = (document.querySelector('.produitCarroussel').offsetWidth + 20) * 4;

buttonScrollLeft.forEach(button => {
    button.addEventListener("click", () => {
        scrollLeft(button);
    })
})

buttonScrollRight.forEach(button => {
    button.addEventListener("click", () => {
        scrollRight(button);
    })
})

function scrollLeft(dom) {
    dom.parentElement.querySelector('.topProduitsCarroussel').scrollBy({
        left: -itemWidth,
        behavior: 'smooth'
    });
}

function scrollRight(dom) {
    dom.parentElement.querySelector('.topProduitsCarroussel').scrollBy({
        left: itemWidth,
        behavior: 'smooth'
    });
}


const background = document.querySelector("#background-avis");
const openAvis = document.querySelector("#button-depose-avis");
if (openAvis) {
openAvis.addEventListener("click", () => {
    background.style.display = "flex";
})}





//Envoi une requete POST au backend pour ajouter le produit au like du client
//Manque le changement d'interface (coeur deja rempli si le client consulte un produit liké precedemment)
const imgLike = document.querySelector("#img-like");
let isLiked = imgLike.getAttribute("data-liked") === "true";
imgLike.addEventListener("click", () => {
    console.log("Like")
    imgLike.style.transform = "scale(1.2)";

    setTimeout(() => {
        let idProduit = imgLike.getAttribute("data-idproduit");
        let liked = imgLike.getAttribute("data-liked") === "true";
        let newStatutLike = !liked

        imgLike.setAttribute("data-liked", newStatutLike ? "true" : "false");
        imgLike.src = newStatutLike ? "../../img/coeur-like.png" : "../../img/coeur.png";


        fetch('/toggle-like', {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            idProduit : idProduit,
            liked: newStatutLike
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.redirection) {
            console.log("Redirection vers la page de connexion...")
            window.location.href = '/compte';
        }
        else if (data.success) {
            let statutLike = data.statutLike;
            console.log("Produit like")
            console.log(imgLike.getAttribute("data-idproduit"))
            imgLike.style.transform = "scale(1)";
        }
        else {
            console.log("Erreur lors de l'envoi du like");
        }
    })
    .catch(error => console.error("Echec requete:", error));
},60);
});

document.querySelectorAll('.form-reponse-admin').forEach(form => {
    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const idAvis = form.getAttribute('data-idavis');
        const reponse = form.querySelector('.input-reponse-admin').value;

        if (!reponse) {
            alert('Veuillez entrer une réponse.');
            return;
        }

        try {
            const response = await fetch('/repondre-avis', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    idavis: idAvis,
                    reponse: reponse,
                }),
            });

            const result = await response.json();

            if (result.success) {
                alert('Réponse enregistrée avec succès.');
                form.reset();
                window.location.reload();
            } else {
                alert(result.message || 'Erreur lors de l\'enregistrement de la réponse.');
            }
        } catch (error) {
            console.error('Erreur :', error);
            alert('Une erreur est survenue.');
        }
    });
});
