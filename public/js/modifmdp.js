function validateReq(passwd, value, id) {
    obj = document.getElementById(id)
    submit = document.getElementById("button-valide")
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