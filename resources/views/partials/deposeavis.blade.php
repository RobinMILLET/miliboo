<meta name="csrf-token" content="{{ csrf_token() }}">
<body>
    <div id="background-avis">
        <div id="div-bk-avis">
            <button id="close-button" type="button">&times;</button>
            <h2 id="titre-avis">Déposer votre avis</h2>
            <form id="form-avis" action="{{ route('add-avis') }}" data-idproduit="{{ $produit->idproduit }}">
                <div class="div-section-avis">
                    <p class="titre-section-avis">Titre</p>
                    <input class="input" id="input-titre-avis" type="text" placeholder="Donner un titre à votre avis">
                </div>
                <div class="div-section-avis">
                    <p class="titre-section-avis">Rédiger votre avis</p>
                    <input class="input" id="input-description-avis" type="text" placeholder="Rédigez le contenu de votre avis">
                </div>
                <div class="div-section-avis">
                    <p class="titre-section-avis">Mettre une note au produit</p>
                    <div id="div-button-avis">
                        <span class="span-avis" number="1">☆</span>
                        <span class="span-avis" number="2">☆</span>
                        <span class="span-avis" number="3">☆</span>
                        <span class="span-avis" number="4">☆</span>
                    </div>                    
                </div>
                <div class="div-section-avis" id="image-drop">
                    <div class="drop-zone" id="drop-zone">
                        <p>Si vous voulez ajouter des images, veuillez les déposer ici</p>
                        <input type="file" id="input-image" multiple hidden>
                    </div>
                    <div>
                        <ul id="ul-file">
                        </ul>
                        <div id="image-preview-container"></div>
                    </div>
                </div>
                <button type="submit" id="button-valide">Valider</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/deposeavis.js') }}"></script>
</body>