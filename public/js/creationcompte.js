const radioProfessionnel = document.getElementById("radio-professionnel");
const radioParticulier = document.getElementById("radio-particulier");
const infoProDiv = document.getElementById("info-pro");

radioProfessionnel.addEventListener("change", function(){
    infoProDiv.style.height = "auto";
    infoProDiv.style.visibility = "visible";
})

radioParticulier.addEventListener("change", function(){
    infoProDiv.style.visibility = "collapse";
    infoProDiv.style.height = "0";
})