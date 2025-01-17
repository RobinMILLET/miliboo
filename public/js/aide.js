const li = document.querySelectorAll(".li-aide");
const div = document.querySelectorAll('.div-aide');

li.forEach(function(l) {
    l.addEventListener("click", function() {
        div.forEach(function(d) {
            d.classList.remove("active");
        })

        li.forEach(function(l){
            l.classList.remove("li-aide-choose");
        })
        document.getElementById(l.getAttribute("panel")).classList.add("active");
        l.classList.add("li-aide-choose")
    })
});