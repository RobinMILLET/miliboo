const UNITES = {
    0.1666666666: ["s", "sec", "secs", "second", "seconds"],
    1: ["m", "mn", "min", "mins", "minute", "minutes"],
    60: ["h", "hr", "hrs", "hour", "hours", "heur", "heurs", "heure", "heures"],
    1440: ["d", "day", "days", "j", "jour", "jours"],
    10080: ["w", "week", "weeks", "S", "sem", "semaine", "semaines"],
    43200: ["M", "month", "months", "mois"],
    525600: ["Y", "year", "years", "an", "ans", "annee", "annees"]
}

function comprend(duree, unite = null) {
    if (!isNaN(duree)) duree = parseFloat(duree) // String numerique
    if (!unite) return duree
    for (const [key, value] of Object.entries(UNITES)) {
        if (value.includes(unite)) {
            return duree*key
        }
    }
    if (unite != unite.toLowerCase()) {
        return comprend(duree, unite.toLowerCase())
    }
    return duree
}

function setCookie(cle, valeur, duree, unite = "j") {
    duree = comprend(duree, unite)
    cle = encodeURIComponent(cle)
    valeur = encodeURIComponent(JSON.stringify(valeur))
    duree = encodeURIComponent(duree)
    fetch("/setcookie/" + cle + "/" + valeur + "/" + duree)
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
        });
}

function getCookie(cle) {
    return fetch("/getcookie/" + encodeURIComponent(cle) + "/" + encodeURIComponent(true))
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
            valeur = JSON.parse(data.valeur)
            return data.valeur ? valeur : null;
        });
}

function delCookie(cle) {
    fetch("/delcookie/" + encodeURIComponent(cle))
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
        });
}