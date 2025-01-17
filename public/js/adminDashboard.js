document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabPanes = document.querySelectorAll('.tab-pane');
    console.log(tabButtons);
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            console.log("Click");
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));

            button.classList.add('active');
            const targetTab = button.getAttribute('data-tab');
            document.getElementById(targetTab).classList.add('active');
        });
    });
})
const photoInputs = document.querySelectorAll('input[type="file"].photos');
const addProduitForm = document.getElementById('ajouter-produit-form');

const fileLists = {};

function filesInputChange(input, index) {
    const imagePreviewContainer = document.getElementById(`image-preview-container-${index}`);
    fileLists[index] = [];

    input.addEventListener('change', (event) => {
        const files = event.target.files;

        fileLists[index].push(...files);
        imagePreviewContainer.innerHTML = '';

        fileLists[index].forEach(file => {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.style.width = '100px';
                imgElement.style.margin = '5px';
                imagePreviewContainer.appendChild(imgElement);
            };

            reader.readAsDataURL(file);
        });
    });
};

addProduitForm.addEventListener("submit", async function (event) {
    event.preventDefault();

    const formData = new FormData(addProduitForm);
    Object.keys(fileLists).forEach(index => {
        fileLists[index].forEach((file, fileIndex) => {
            formData.append(`colorations[${index}][photos][${fileIndex}]`, file);
        });
    });

    try {
        const response = await fetch(addProduitForm.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        });

        if (!response.ok) {
            throw new Error(`Erreur lors de l'envoi du formulaire, statut: ${response.status}`);
        }

        const result = await response.json();

        if (result.success) {
            alert("Produit soumis avec succès !");
            addProduitForm.reset();
            location.reload();
        } else {
            alert(result.message || "Erreur : Impossible de soumettre le produit.");
        }
    } catch (error) {
        console.error(error);
        alert("Une erreur serveur est survenue.");
    }
});

document.getElementById('add-coloration').addEventListener('click', function () {
    const couleursElement = document.getElementById('colorations-data');
    const couleurs = JSON.parse(couleursElement.getAttribute('data-couleurs'));

    const colorationsSection = document.getElementById('colorations-section');
    const colorationCount = document.querySelectorAll('.coloration-group').length;

    const newColorationGroup = document.createElement('div');
    newColorationGroup.className = 'coloration-group';

    const selectElement = document.createElement('select');
    selectElement.className = 'couleur-select';

    selectElement.name = `colorations[${colorationCount}][idCouleur]`;
    selectElement.required = true;

    couleurs.forEach(couleur => {
        const option = document.createElement('option');
        option.value = couleur.idcouleur;
        option.textContent = couleur.nomcouleur;
        selectElement.appendChild(option);
    });

    const formGroup = document.createElement('div');
    formGroup.className = 'form-group';
    formGroup.innerHTML = `<label for="couleur-${colorationCount + 1}">Couleur</label>`;
    formGroup.appendChild(selectElement);

    newColorationGroup.appendChild(formGroup);

    newColorationGroup.innerHTML += `
        <div class="form-group">
            <label for="quantiteStock-${colorationCount + 1}">Quantité en stock</label>
            <input type="number" class="quantiteStock" name="colorations[${colorationCount}][quantiteStock]" required>
        </div>
        <div class="form-group">
            <label for="descriptionColoration-${colorationCount + 1}">Description</label>
            <textarea class="descriptionColoration" name="colorations[${colorationCount}][descriptionColoration]"></textarea>
        </div>
        <div class="form-group">
            <label for="photos-1">Photos</label>
            <input type="file" class="photos" id="photos-1" name="colorations[${colorationCount}][photos][]" multiple accept="image/*">
            <div id="image-preview-container-${colorationCount}" class="image-preview-container" style="display: flex; gap: 10px; margin-top: 10px;"></div>
        </div>
    `;

    colorationsSection.appendChild(newColorationGroup);
    const newFileInput = newColorationGroup.querySelector('input[type="file"].photos');
    filesInputChange(newFileInput, colorationCount);
});

document.querySelectorAll('input[type="file"].photos').forEach((input, index) => {
    filesInputChange(input, index);
});


var idService = null;
document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.getElementById('directeur-table-body');

    fetch('/getService')
        .then(response => response.json())
        .then(data => {
            idService = data.idService.idservice;
            console.log(idService)
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });

    fetch('/coloration-data')
        .then(response => response.json())
        .then(data => {
            tableBody.innerHTML = '';

            data.forEach(item => {
                const row = document.createElement('tr');
                row.setAttribute('data-idproduit', item.idproduit);
                row.setAttribute('data-idcouleur', item.idcouleur);

                row.innerHTML = `
                    <td><input role="directeur" type="text" value="${item.nomproduit}" disabled></td>
                    <td><input role="directeur" type="number" value="${item.prix}" disabled></td>
                    <td><input role="service" type="number" value="${item.prixsolde || 'N/A'}" disabled></td>
                    <td><input role="directeur" type="number" value="${item.nbpaiementmax}" disabled></td>
                    <td><input role="directeur" type="number" value="${item.coutlivraison}" disabled></td>
                    <td>
                        <select role="directeur" disabled>
                            <option value="1" ${item.estvisible ? 'selected' : ''}>Oui</option>
                            <option value="0" ${!item.estvisible ? 'selected' : ''}>Non</option>
                        </select>
                    </td>
                    <td>
                        <button class="edit-btn" data-id="${item.id}">Modifier</button>
                        <button class="delete-btn" data-id="${item.id}">Supprimer</button>
                        <button class="valider-btn" data-id="${item.id}" style="display: none">Valider</button>
                    </td>
                `;

                tableBody.appendChild(row);
            });
            addEditButtonListeners();
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});

function addEditButtonListeners() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const validateButtons = document.querySelectorAll('.valider-btn');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            enableEditing(row);
        });
    });

    validateButtons.forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            validateChanges(row);
        });
    });
}

function enableEditing(row) {
    const inputs = row.querySelectorAll('input, select');
    inputs.forEach(input => {
        if (idService == "2" || (idService == "1" && input.getAttribute('role') == 'service')){
            input.disabled = false
        }
    });

    const editButton = row.querySelector('.edit-btn');
    const validateButton = row.querySelector('.valider-btn');

    editButton.style.display = 'none';
    validateButton.style.display = 'inline-block';
}

function validateChanges(row) {
    const prix = parseFloat(row.querySelector('td:nth-child(2) input').value);
    const prixsolderaw = row.querySelector('td:nth-child(3) input').value
    const prixsolde = parseFloat(prixsolderaw) || null;

    if (prix <= 0) {
        alert('Le prix doit être supérieur à 0');
        return; 
    }

    if (prixsolderaw != "" && prixsolde <= 0) {
        alert('Le prix soldé doit être supérieur à 0');
        return;
    }
    const inputs = row.querySelectorAll('input, select');
    inputs.forEach(input => input.disabled = true);

    const editButton = row.querySelector('.edit-btn');
    const validateButton = row.querySelector('.valider-btn');

    editButton.style.display = 'inline-block';
    validateButton.style.display = 'none';

    const idproduit = row.getAttribute('data-idproduit');
    const idcouleur = row.getAttribute('data-idcouleur');

    const estvisible = row.querySelector('td:nth-child(6) select').value === '1';
    const data = {
        nomproduit: row.querySelector('td:nth-child(1) input').value,
        prix: parseFloat(row.querySelector('td:nth-child(2) input').value),
        prixsolde: parseFloat(row.querySelector('td:nth-child(3) input').value) || null,
        nbpaiementmax: parseInt(row.querySelector('td:nth-child(4) input').value),
        coutlivraison: parseFloat(row.querySelector('td:nth-child(5) input').value),
        estvisible: estvisible,
    };

    fetch(`/coloration/${idproduit}/${idcouleur}/update`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('Modifications enregistrées avec succès.');
            } else {
                if (result.errors) {
                    let errorMessage = 'Erreurs de validation:\n';
                    for (const field in result.errors) {
                        errorMessage += `${field}: ${result.errors[field].join(', ')}\n`;
                    }
                    alert(errorMessage);
                } else {
                    alert('Erreur: ' + (result.message || 'Une erreur s\'est produite.'));
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Une erreur s\'est produite lors de la mise à jour.');
        });
}

const selectTransporteur = document.querySelector("#select-transporteur");

function choixTransporteur(transporteur){
    console.log(transporteur.options[transporteur.selectedIndex].text)
}