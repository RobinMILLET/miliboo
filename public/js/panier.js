function m(id) {
    let minus = document.getElementById("m"+id)
    let quant = document.getElementById("q"+id)
    let plus = document.getElementById("p"+id)
    let total = document.getElementById("t"+id)
    plus.disabled = false
    id = id.replace("-", "/")
    fetch("/addPanier/"+id+"/-1")
        .then(response => response.json())
        .then(data => {
            quant.innerHTML = data.quantite
            if (data.quantite <= 1) minus.disabled = true
            total.innerHTML = data.prixligne
            getPrixPanier(data.prixpanier)
    });
}

function p(id) {
    let minus = document.getElementById("m"+id)
    let quant = document.getElementById("q"+id)
    let plus = document.getElementById("p"+id)
    let total = document.getElementById("t"+id)
    minus.disabled = false
    id = id.replace("-", "/")
    fetch("/addPanier/"+id+"/1")
        .then(response => response.json())
        .then(data => {
            quant.innerHTML = data.quantite
            if (data.quantite >= data.quantitemax) plus.disabled = true
            total.innerHTML = data.prixligne
            getPrixPanier(data.prixpanier)
    });
}

function d(id) {
    id = id.replace("-", "/")
    fetch("/setPanier/"+id+"/0")
        .then(response => response.json())
        .then(data => {
            window.location.reload()
            console.log(data.message)
        });
}

function getPrixPanier(prixpanier) {
    document.getElementById("prixpanier").innerHTML = prixpanier
    document.getElementById("prixtotal").innerHTML = prixpanier
    document.getElementById("info-fidelite").innerHTML = fidelite(prixpanier) + "€ OFFERT"
}

function fidelite($prix) {
    return Math.floor($prix/10)*0.5;
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

function achete(id, idcouleur = null) {
    quant = document.getElementById("quant")
    quantite = parseInt(quant.value)
    couleur = idcouleur ? "/"+idcouleur : ""
    fetch("/addPanier/"+id+couleur+"/"+quantite)
        .then(response => response.json())
        .then(data => {
            window.location.href = "/panier"
            console.log(data.message)
        });
}
