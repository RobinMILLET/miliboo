const spans = document.querySelectorAll(".span-avis");
var lastNumber = 0;

spans.forEach(span => {
    span.addEventListener("click", () => {
        changeAvis(span.getAttribute("number"));
    })
})

document.getElementById("close-button").addEventListener("click", function () {
    const backgroundAvis = document.getElementById("background-avis");
    if (backgroundAvis) {
        backgroundAvis.style.display = "none";
    }
});

function changeAvis(number) {
    if (number == lastNumber) {
        spans.forEach(span => {
            span.textContent = "☆";
        })
        return;
    }
    for (let index = 0; index < spans.length; index++) {
        if (index < number) {
            spans[index].textContent = "★";
        } else {
            spans[index].textContent = "☆";
        }
    }
    lastNumber = number;
}

const dropZone = document.getElementById('drop-zone');
const inputImage = document.getElementById('input-image');
const ulFile = document.getElementById('ul-file');

dropZone.addEventListener('click', () => {
    inputImage.click();
});

dropZone.addEventListener('dragover', (event) => {
    event.preventDefault();
    dropZone.classList.add('dragover');
});

dropZone.addEventListener('dragleave', () => {
    dropZone.classList.remove('dragover');
});

dropZone.addEventListener('drop', (event) => {
    event.preventDefault();
    dropZone.classList.remove('dragover');
    const files = event.dataTransfer.files;
    console.log(files);
    addFile(files);
});

inputImage.addEventListener('change', (event) => {
    const files = event.target.files;

    addFile(files);
});

function addFile(files) {
    // previewImage(files);
}

const imagePreviewContainer = document.getElementById("image-preview-container");

inputImage.addEventListener('change', (event) => {
    const files = event.target.files;

    imagePreviewContainer.innerHTML = '';

    Array.from(files).forEach(file => {
        const reader = new FileReader();

        reader.onload = function(e) {
            const imgElement = document.createElement('img');
            imgElement.src = e.target.result;
            imgElement.style.width = '100px';
            imgElement.style.margin = '5px'; 
            imagePreviewContainer.appendChild(imgElement); 
        };

        reader.readAsDataURL(file); 
    });
});

// function previewImage(files){
//     // imagePreviewContainer.innerHTML = '';

//     Array.from(files).forEach(file => {
//         const reader = new FileReader();

//         reader.onload = function(e) {
//             const imgElement = document.createElement('img');
//             imgElement.src = e.target.result;
//             imgElement.style.width = '100px';
//             imgElement.style.margin = '5px'; 
//             imagePreviewContainer.appendChild(imgElement); 
//         };

//         reader.readAsDataURL(file); 
//     });
// };

const form = document.getElementById('form-avis');
form.addEventListener("submit", async function (event) {
    event.preventDefault();

    const formData = new FormData(form);
    formData.append('idProduit', form.getAttribute('data-idproduit'));


    const titre = document.querySelector("#input-titre-avis").value;
    const description = document.querySelector("#input-description-avis").value;
    const idProduit = document.querySelector("#form-avis").getAttribute("data-idproduit");
    const note = lastNumber;

    formData.append('titre', titre)
    formData.append('description', description)
    formData.append('idProduit', idProduit)
    formData.append('note', note)


    Array.from(inputImage.files).forEach((file, index) => {
        formData.append(`images[${index}]`, file);
    });



    if (!titre || !description) {
        displayMessage("Veuillez remplir tous les champs et sélectionner une note.", "error");
        return;
    }

    try {
        const response = await fetch(form.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        });

        if (!response.ok) {
            throw new Error("Erreur lors de l'envoi du formulaire, statut: ${response.statut}");
        }

        const result = await response.json();
        if (response.status === 400) {
            displayMessage("Vous avez déjà déposé un avis sur ce produit.", "error");
        }

        if (result.success) {
            displayMessage("Votre avis a été soumis avec succès !", "success");
            document.getElementById("background-avis").style.display = "none";
            document.getElementById("form-avis").reset();
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        }
        else {
            displayMessage(result.message || "Erreur : Impossible de soumettre l'avis.", "error");
        }
    } catch (error) {
        displayMessage("Impossible de soumettre plusieurs avis.", "error");
        console.error(error);
    }
});

function displayMessage(message, type) {
    const messageBox = document.createElement("div");
    messageBox.className = `message-box ${type}`;
    messageBox.textContent = message;

    document.body.appendChild(messageBox);

    setTimeout(() => {
        messageBox.remove();
    }, 4000);
}