function m(id) {
    let minus = document.getElementById("m"+id)
    let quant = document.getElementById("q"+id)
    let plus = document.getElementById("p"+id)
    let total = document.getElementById("t"+id)
    plus.disabled = false
    idproduit = id.split("-")[0]
    idcouleur = id.split("-")[1]
    fetch("/addPanier/"+idproduit+"/"+idcouleur+"/-1")
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
    idproduit = id.split("-")[0]
    idcouleur = id.split("-")[1]
    fetch("/addPanier/"+idproduit+"/"+idcouleur+"/1")
        .then(response => response.json())
        .then(data => {
            quant.innerHTML = data.quantite
            if (data.quantite >= data.quantitemax) plus.disabled = true
            total.innerHTML = data.prixligne
            getPrixPanier(data.prixpanier)
    });
}

function d(id) {
    idproduit = id.split("-")[0]
    idcouleur = id.split("-")[1]
    fetch("/setPanier/"+idproduit+"/"+idcouleur+"/0")
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