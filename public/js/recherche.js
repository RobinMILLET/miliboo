function setGet(key, value, go = false) {
    // La fonction n'est utilisée que pour le tri
    // Néanmoins, elle est codée de manière générale, et est réutilisable
    $_GET[key] = value
    if (go) apply()
}

function filtre(object, idFiltre) {
    if ("filtres" in $_GET) {
        // Récupération de $_GET ('a b c' => ['a', 'b', 'c'])
        filtres = $_GET["filtres"].split(" ")
    }
    else filtres = []
    // idfiltre doit etre str car comparé à la valeur tirée de $_GET
    idFiltre = idFiltre.toString()
    if (object.checked && !filtres.includes(idFiltre)) {
        filtres.push(idFiltre)
    }
    else if (!object.checked && filtres.includes(idFiltre)) {
        filtres.splice(filtres.indexOf(idFiltre), 1)
    }
    $_GET["filtres"] = filtres.join(" ")
}

function apply() {
    url = []
    // Utiliser les valeurs du $_Get pour reconstruire l'URL
    for (var key in $_GET) {
        url.push(key + "=" + encodeURIComponent($_GET[key]))
    }
    // Le challenge principal étant de ne pas overide le chemin ou les $_GET existants
    go = window.location.pathname + "?" + url.join("&")
    window.location.href = go
}