function setGet(key, value, go = false) {
    $_GET[key] = value
    if (go) apply()
}

function apply() {
    url = []
    for (var key in $_GET) {
        url.push(key + "=" + encodeURIComponent($_GET[key]))
    }
    go = window.location.pathname + "?" + url.join("&")
    window.location.href = go
}