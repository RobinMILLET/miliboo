function validate(element, len, allowspacing = false) {
    element.classList.remove("red")
    if (!element.value) return
    if (allowspacing) {
        if (!/^[0-9\s-]+$/.test(element.value)) {
            element.classList.add("red")
        }
        value = element.value.replaceAll(/[\s-]+/g, "")
        if (value.length !== len) {
            element.classList.add("red")
        }
    }
    else {
        if (!/^\d+$/.test(element.value)) {
            element.classList.add("red")
        }
        if (element.value.length !== len) {
            element.classList.add("red")
        }
    }
}