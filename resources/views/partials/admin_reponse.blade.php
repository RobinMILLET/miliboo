<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="background-reponse">
    <div id="div-bk-reponse">
        <button id="close-button-reponse" type="button">&times;</button>
        <h2 id="titre-reponse">Répondre à l'avis</h2>
        <form id="form-reponse-admin" data-idavis="{{ $avis->idavis }}">
            <div class="div-section-reponse">
                <p class="titre-section-reponse">Réponse</p>
                <textarea class="input" id="input-reponse-admin" placeholder="Entrez votre réponse ici..."></textarea>
            </div>
            <button type="submit" id="button-valide-reponse">Envoyer</button>
        </form>
    </div>
</div>
<script>
    document.getElementById('close-button-reponse').addEventListener('click', function () {
        document.getElementById('background-reponse').style.display = 'none';
    });

    document.getElementById('form-reponse-admin').addEventListener('submit', async function (e) {
        e.preventDefault();

        const idAvis = this.getAttribute('data-idavis');
        const reponse = document.getElementById('input-reponse-admin').value;

        if (!reponse) {
            alert('Veuillez entrer une réponse.');
            return;
        }

        try {
            const response = await fetch('/repondre-avis', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    idavis: idAvis,
                    reponse: reponse,
                }),
            });

            const result = await response.json();

            if (result.success) {
                alert('Réponse enregistrée avec succès.');
                window.location.reload();
            } else {
                alert(result.message || 'Erreur lors de l\'enregistrement de la réponse.');
            }
        } catch (error) {
            console.error('Erreur :', error);
            alert('Une erreur est survenue.');
        }
    });
</script>
