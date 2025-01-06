const radioProfessionnel = document.getElementById("radio-professionnel");
const radioParticulier = document.getElementById("radio-particulier");
const infoProDiv = document.getElementById("info-pro");

if(radioProfessionnel)
    radioProfessionnel.addEventListener("change", function(){
        infoProDiv.style.height = "auto";
        infoProDiv.style.visibility = "visible";
    })

if(radioParticulier)
    radioParticulier.addEventListener("change", function(){
        infoProDiv.style.visibility = "collapse";
        infoProDiv.style.height = "0";
    })

function validateReq(passwd, value, id, offset = "") {
    obj = document.getElementById(id+offset)
    submit = document.getElementById("button-valide"+offset)
    if (!passwd || value) {
        obj.classList.remove("noreq")
    }
    else {
        obj.classList.add("noreq")
        submit.disabled = true
    }

}

function hasLowerCase(str) {
    return str.toUpperCase() != str;
}

function hasUpperCase(str) {
    return str.toLowerCase() != str;
}

function hasNumber(str) {
    return /\d/.test(str);
}

function hasSpecialChar(str) {
    test = /[!@#$%^&*()\-+={}[\]:;"'<>,.?\/|\\]/;
    return test.test(str);
}

function validatePassword() {
    passwd = document.getElementById("password").value
    passwdCon = document.getElementById("passwordConfirm").value
    submit = document.getElementById("button-valide")
    submit.disabled = false
    validateReq(passwd, passwd.length >= 12, "req1")
    validateReq(passwd, hasLowerCase(passwd), "req2")
    validateReq(passwd, hasUpperCase(passwd), "req3")
    validateReq(passwd, hasNumber(passwd), "req4")
    validateReq(passwd, hasSpecialChar(passwd), "req5")
    validateReq(passwd && passwdCon, passwd == passwdCon, "req6")
}

function validateCP(offset = "") {
    cp = document.getElementById("cp"+offset).value
    submit = document.getElementById("button-valide"+offset)
    submit.disabled = false
    validateReq(cp, cp.length == 5 && !isNaN(cp), "cp", offset)
}

function validateTel(id) {
    tel = document.getElementById(id).value
    submit = document.getElementById("button-valide")
    submit.disabled = false
    validateReq(tel, tel.length == 9 && !isNaN(tel), id)
}

function checkVille(offset = "") {
    cp = encodeURIComponent(document.getElementById("cp"+offset).value)
    ville = document.getElementById("ville"+offset)
    if (!ville.value) return
    value = encodeURIComponent(ville.value)
    fetch("/villeApprox/" + cp + "/" + value)
        .then(response => response.json())
        .then(data => {
            if(data.ville) ville.value = data.ville
    });
}