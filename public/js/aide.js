const li = document.querySelectorAll(".li-aide");
const div = document.querySelectorAll('.div-aide');

li.forEach(function(l) {
    l.addEventListener("click", function() {
        div.forEach(function(d) {
            d.classList.remove("active");
        })
        document.getElementById(l.getAttribute("panel")).classList.add("active");
    })
});