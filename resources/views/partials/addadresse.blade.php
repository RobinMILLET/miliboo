<body>
    <form id="container-partials-adresse" method="POST" action="{{ route('addAdr') }}">
    @csrf
    <input name="nomadr" id="nomadr" type="text" class="input" placeholder="Nom de l'adresse*">
        <div class="div-input">
            <input name="adresse" type="text" placeholder="Adresse *" class="input" id="input-adresse" required>
            <p class="p-obligatoire">* obligatoire</p>                
        </div>
        <div id="zone">
            <div class="div-input">
                <select name="pays" class="input" id="select-pays">
                <option value='1'>France</option>
                        <?php
                            //echo CreationCompteController::toListe(Pays::class, "idpays", "nompays");
                        ?>
                </select>
                <p class="p-obligatoire">* obligatoire</p>                
            </div>
            <div class="div-input">
            <input id="cp2" name="cp" type="text" placeholder="Code Postal *" class="input" onchange="validateCP('2')" required>
                <p class="p-obligatoire">* obligatoire</p>                
            </div>
            <div class="div-input">
                <input id="ville2" name="ville" type="text" placeholder="Ville *" class="input" onchange="checkVille('2')" required>
                <p class="p-obligatoire">* obligatoire</p>                
            </div>
        </div>
        <div id="accepte-modif">
            <button type="submit" id="button-valide2">Valider</button>
        </div>
    </form>
</body>