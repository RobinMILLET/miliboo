function m(id) {
    minus = document.getElementById("m"+id)
    quant = document.getElementById("q"+id)
    plus = document.getElementById("p"+id)
    total = document.getElementById("t"+id)
    plus.disabled = false
    quantite = parseInt(quant.innerHTML)
    if (quantite <= 2) minus.disabled = true
    quant.innerHTML = quantite-1
    idproduit = id.split("-")[0]
    idcouleur = id.split("-")[1]
    fetch("/addPanier/"+idproduit+"/"+idcouleur+"/-1")
    fetch("/prixPanier/"+idproduit+"/"+idcouleur)
        .then(response => response.json())
        .then(data => {
            total.innerHTML = data.prix
        });
    getPrixPanier()
}

function p(id) {
    minus = document.getElementById("m"+id)
    quant = document.getElementById("q"+id)
    plus = document.getElementById("p"+id)
    total = document.getElementById("t"+id)
    minus.disabled = false
    quantite = parseInt(quant.innerHTML)
    if (quantite >= 98) plus.disabled = true
    quant.innerHTML = quantite+1
    idproduit = id.split("-")[0]
    idcouleur = id.split("-")[1]
    fetch("/addPanier/"+idproduit+"/"+idcouleur+"/1")
    fetch("/prixPanier/"+idproduit+"/"+idcouleur)
        .then(response => response.json())
        .then(data => {
            total.innerHTML = data.prix
        });
    getPrixPanier()
}

function d(id) {
    idproduit = id.split("-")[0]
    idcouleur = id.split("-")[1]
    fetch("/setPanier/"+idproduit+"/"+idcouleur+"/0")
        .then().then(data => {
            window.location.reload()
        });
}

function getPrixPanier() {
    panier = document.getElementById("prixpanier")
    total = document.getElementById("prixtotal")
    fidel = document.getElementById("info-fidelite")
    fetch("/prixPanier")
        .then(response => response.json())
        .then(data => {
            panier.innerHTML = data.prix
            total.innerHTML = data.prix
            fidel.innerHTML = fidelite(data.prix) + "€ OFFERT"
        });
}

function fidelite($prix) {
    return Math.floor($prix/10)*0.5;
}