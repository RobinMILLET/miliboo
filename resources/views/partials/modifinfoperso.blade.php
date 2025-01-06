<?php

use App\Http\Controllers\CreationCompteController;
use App\Http\Controllers\InfoPersoController;
use App\Models\ActivitePro;
use App\Models\Pays;

if (session('error')) {
    CreationCompteController::error(session('error'));
}

$infos = InfoPersoController::getInfos();

?>
<link rel="stylesheet" href="{{ asset('css/modifinfoperso.css') }}">
<body>
    <form method="POST" action="/tryMod" id="form">
    @csrf
    <div class="background" id="background-info-perso">
        <div id="div-bk">
            <div id="adresse">    
                <div class="div-header-modif">
                    <h2 class="title-part">Modifier mes informations personnelles</h2> 
                    <button class="button-ferme" type="button">X</button>
                </div>   
                <div id="info-perso">
                    <div class="div-input">
                        <select name="civilite" class="input" id="select-civilite">
                            <option value="X" {{$infos[0]}}>Civilité</option>
                            <option value="H" {{$infos[1]}}>Mr</option>
                            <option value="F" {{$infos[2]}}>Mme</option>
                        </select>
                        <p></p>                
                    </div>
                    <div class="div-input">
                        <input value="{{$infos[3]}}" name="nom" type="text" placeholder="Nom *" class="input" id="input-nom" required>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                    <div class="div-input">
                        <input value="{{$infos[4]}}" name="prenom" type="text" placeholder="Prenom *" class="input" id="input-prenom" required>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                </div>
                <!--<div id="div-date-naissance">
                <div class="div-input">
                    <input name="dateNaissance" type="date" placeholder="Date de naissance *" class="input">
                    <p class="p-obligatoire">* obligatoire</p>                
                </div>
                </div>
                -->
                <div class="div-input">
                    <input value="{{$infos[5]}}" name="adresse" type="text" placeholder="Adresse *" class="input">
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
                    <input value="{{$infos[6]}}" id="cp" name="cp" type="text" placeholder="Code Postal *" class="input" onchange="validateCP()" required>
                        <p class="p-obligatoire">* obligatoire</p>                
                    </div>
                    <div class="div-input">
                        <input value="{{$infos[7]}}" id="ville" name="ville" type="text" placeholder="Ville *" class="input" onchange="checkVille()" required>
                        <p class="p-obligatoire">* obligatoire</p>                
                    </div>
                </div>
                <div id="telephone">
                    <div class="div-input">
                        <p class="title-telephone">Téléphone</p>
                        <div class="div-telephone">
                            <select id="telfixe" name="telfixe" class="select-telephone">
                                <option value="33">+33</option>
                                <option value="34">+34</option>
                            </select>
                            <input {{$infos[8]}} id="input-telfixe" name="inputtelfixe" type="text" placeholder="123456789" class="input" onchange="validateTel('input-telfixe')">
                        </div>
                    </div>
                    <div class="div-input">
                        <p class="title-telephone">Portable *</p>
                        <div class="div-telephone">
                            <select id="telportable" name="telportable" class="select-telephone">
                                <option value="33">+33</option>
                                <option value="34">+34</option>
                            </select>
                            <input {{$infos[9]}} id="input-telportable" name="inputtelportable" type="text" placeholder="612345678" class="input" onchange="validateTel('input-telportable')" required>
                        </div>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                </div>
                <!--
                <div id="email">
                    <input id="mail" type="text" placeholder="Adresse mail" class="input">
                </div>
                -->
                <div id="accepte-modif">
                    <button type="submit" id="button-valide">Mettre à jour ces informations</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script src="{{ asset('js/creationcompte.js') }}"defer></script>
</body>