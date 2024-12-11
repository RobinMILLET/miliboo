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