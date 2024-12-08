function m(id) {
    let minus = document.getElementById("m"+id)
    let quant = document.getElementById("q"+id)
    let plus = document.getElementById("p"+id)
    let total = document.getElementById("t"+id)
    plus.disabled = false
    idproduit = id.split("-")[0]
    idcouleur = id.split("-")[1]
    fetch("/addPanier/"+idproduit+"/"+idcouleur+"/-1")
        .then().then(_ => {
            fetch("/prixPanier/"+idproduit+"/"+idcouleur)
                .then(response => response.json())
                .then(data => {
                    quant.innerHTML = data.quant
                    if (data.quant <= 1) minus.disabled = true
                    total.innerHTML = data.prix
                });
            getPrixPanier()
    });
}

function p(id) {
    let minus = document.getElementById("m"+id)
    let quant = document.getElementById("q"+id)
    let plus = document.getElementById("p"+id)
    let total = document.getElementById("t"+id)
    minus.disabled = false
    idproduit = id.split("-")[0]
    idcouleur = id.split("-")[1]
    fetch("/addPanier/"+idproduit+"/"+idcouleur+"/1")
        .then().then(_ => {
            fetch("/prixPanier/"+idproduit+"/"+idcouleur)
                .then(response => response.json())
                .then(data => {
                    quant.innerHTML = data.quant
                    if (data.quant >= 99) plus.disabled = true
                    total.innerHTML = data.prix
                });
            getPrixPanier()
    });
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
    let panier = document.getElementById("prixpanier")
    let total = document.getElementById("prixtotal")
    let fidel = document.getElementById("info-fidelite")
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