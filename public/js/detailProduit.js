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

function plusOne() {
    minusBtn = document.getElementById("minusOne")
    quant = document.getElementById("quant")
    plusBtn = document.getElementById("plusOne")
    minusBtn.disabled = false
    quantite = parseInt(quant.value)
    if (quantite >= 98) plusBtn.disabled = true
    quant.value = quantite+1
}

function verif() {
    minusBtn = document.getElementById("minusOne")
    quant = document.getElementById("quant")
    plusBtn = document.getElementById("plusOne")
    quantite = parseInt(quant.value)
    if (quantite < 1) quantite = 1
    if (quantite > 99) quantite = 99
    quant.value = quantite
    if (quantite <= 2) minusBtn.disabled = true
    else minusBtn.disabled = false
    if (quantite >= 98) plusBtn.disabled = true
    else plusBtn.disabled = false
}

function achete(idproduit, idcouleur) {
    quant = document.getElementById("quant")
    quantite = parseInt(quant.value)
    fetch("/addPanier/"+idproduit+"/"+idcouleur+"/"+quantite)
        .then().then(data => {
            window.location.href = "/panier"
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