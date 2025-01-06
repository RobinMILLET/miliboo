@extends('layouts.app')

@section('title', 'Creation Compte')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/creationcompte.css')}}" />
@endsection

@section('content')
<form method="POST" action="/tryCreate" id="form">
@csrf
<div id="contain">
    <h2 class="marge"  id="title-compte">Créer votre compte Miliboo</h2>

    <div id="content" class="marge">
        <div id="compte">
            <h3 class="title-part">Mon compte</h3>
            <div class="div-input">
                <?php

                    use App\Http\Controllers\CreationCompteController;
                    use App\Models\ActivitePro;
                    use App\Models\Pays;

                    if (session('error')) {
                        CreationCompteController::error(session('error'));
                    }

                    $valEmail = session('email') ? " value=".session('email'): ""; ?>
                <input name="email" type="email" placeholder="Votre adresse e-mail *"{{$valEmail}} class="input-compte input" name="email" required>
                <p class="p-obligatoire">* obligatoire</p>
            </div>
            <div id="div-mdp">
                <div id="inputs-container">
                    <div class="div-input">
                        <input id="password" name="password" type="password" placeholder="Votre mot de passe *" class="input-mdp input" onkeyup="validatePassword()" required/>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                    <div class="div-input">
                        <input id="passwordConfirm" name="passwordConfirm" type="password" placeholder="Confirmation du mot de passe *" class="input-mdp input" onkeyup="validatePassword()" required/>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                </div>
                <ul id="ul-mdp-required">
                    <li id="req1" class="li-required">12 caractères</li>
                    <li id="req2" class="li-required">1 minuscule</li>
                    <li id="req3" class="li-required">1 majuscule</li>
                    <li id="req4" class="li-required">1 chiffre</li>
                    <li id="req5" class="li-required">1 caractère spécial (!?/%*?&#...)</li>
                    <li id="req6" class="li-required" style="border-bottom: none;">Confirmation du mot de passe</li>
                </ul>
            </div>

            <div id="div-newsletters">
                <div class="newsletters-info">
                    <input name="ckNewsletter" class="input-newsletters" id="checkbox-miliboo" type="checkbox">
                    <label class="label-newsletters" for="checkbox-miliboo">Je souhaite recevoir la newsletter de miliboo.com (Réductions, Nouveautés, Avant premières...).</label>
                </div>
                <div class="newsletters-info">
                    <input name="ckPartenaires" class="input-newsletters" id="checkbox-partenaire" type="checkbox">
                    <label class="label-newsletters" for="checkbox-partenaire">J'accepte de recevoir les newsletters des partenaires de Miliboo.com</label>
                </div>
            </div>
            <div>
                <p>
                En créant un compte, vous acceptez les conditions d'utilisation et de vente de Miliboo. 
                Consultez notre déclaration de confidentialité, notre politique relative aux cookies 
                ainsi que notre politique relative aux publicités ciblées par centres d’intérêts.
                </p>
            </div>
        </div>
        <div id="adresse">
            <h3 class="title-part">Mon adresse de facturation</h3>  
            <div id="choix-type">
                <div>
                    <input class="input-radio" id="radio-particulier" name="radiochoix" type="radio" checked value="" autocomplete="off">
                    <label class="label-type" for="radio-particulier">Je suis un particulier</label>
                </div>
                <div>
                    <input class="input-radio" id="radio-professionnel" name="radiochoix" type="radio" value="true" autocomplete="off">
                    <label class="label-type" for="radio-professionnel">Je suis un professionnel</label>
                </div>
            </div>

            <div id="info-pro">
                <h5>Informations de votre société</h5>
                <div id="div-content-info-pro">
                    <div class="div-input">
                        <input name="societe" type="text" placeholder="Société *" class="input">
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                    <div class="div-input">
                        <select name="activite" id="activite" class="input" >
                            <option value="">Activité *</option>
                            <?php
                                echo CreationCompteController::toListe(ActivitePro::class, "idactivitepro", "nomactivitepro");
                            ?>
                        </select>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                    <div class="div-input">
                        <div id="div-tva">
                            <label for="tva" class="label">FR</label>
                            <input name="tva" type="text" placeholder="Numéro de TVA intracommunautaire" class="input" id="input-tva">
                        </div>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                </div>
            </div>

            <div id="info-perso">
                <div class="div-input">
                    <select name="civilite" class="input" id="select-civilite">
                        <option value="X" selected disabled>Civilité</option>
                        <option value="H">Mr</option>
                        <option value="F">Mme</option>
<!--                         
                        <option value="X">Front-end</option>
                        <option value="X">PHP ascendant Laravel</option>
                        <option value="X">Elephant PostGres SQL</option>
                        <option value="X">Helicoptère de combat v8 biturbo 5 cylindres atmosphérique en ligne 5.2L</option>
                        <option value="X">Lave vaisselle</option>
                        <option value="X">Paillasson</option>
                        <option value="X">Renard ascendant lave linge</option>
                        <option value="X">La glorieuse évolution</option>
                        <option value="X">Voiture électrique à recharge solaire 10kW</option>
                        <option value="X">Fusée Mars 2040 propulsée par des moteurs ioniques</option>
                        <option value="X">Tapis de bain à ultrason</option>
                        <option value="X">Machine à café expresso à broyeur intégré</option>
                        <option value="X">Chat autonome générateur d'énergie éolienne</option>
                        <option value="X">Cafetière qui fait aussi la sieste</option>
                        <option value="X">Chaussettes chauffantes pour pieds frigorifiés</option>
                        <option value="X">Grille-pain qui parle (enfin, presque)</option>
                        <option value="X">Canapé avec fonction "ne me dérange pas"</option>
                        <option value="X">Parapluie qui refuse de se retourner</option>
                        <option value="X">Pots de fleurs qui se plaignent de l’arrosage</option>
                        <option value="X">Tasse qui dit "coucou" à chaque gorgée</option>
                        <option value="X">Lampe qui s'endort avant vous</option>
                        <option value="X">Manteau qui vous suit à l'ombre</option>
                        <option value="X">Coussin qui vous juge pendant la sieste</option>
                        <option value="X">AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</option>
                        <option value="X">Jeff Bezos</option>
                        <option value="X">Grille-pain à réaction thermique</option>
                        <option value="X">Balai magique à autonomie infinie</option>
                        <option value="X">Lave-linge avec fonction "trouver les chaussettes disparues"</option>
                        <option value="X">Brosse à dents avec option "concert privé" sous la douche</option>
                        <option value="X">Frigo qui vous juge en ouvrant la porte</option>
                        <option value="X">Ours qui a peur quand on fait ROAAAAAAR</option>
                        <option value="X">Polygone entre 64 et 8,7 cotés</option>
                        -->
                    </select>
                    <p></p>                
                </div>
                <div class="div-input">
                    <input name="nom" type="text" placeholder="Nom *" class="input" id="input-nom" required>
                    <p class="p-obligatoire">* obligatoire</p>
                </div>
                <div class="div-input">
                    <input name="prenom" type="text" placeholder="Prenom *" class="input" id="input-prenom" required>
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
                <input id="cp" name="cp" type="text" placeholder="Code Postal *" class="input" onchange="validateCP()" required>
                    <p class="p-obligatoire">* obligatoire</p>                
                </div>
                <div class="div-input">
                    <input id="ville" name="ville" type="text" placeholder="Ville *" class="input" onchange="checkVille()" required>
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
                        <input id="input-telfixe" name="inputtelfixe" type="text" placeholder="123456789" class="input" onchange="validateTel('input-telfixe')">
                    </div>
                </div>
                <div class="div-input">
                    <p class="title-telephone">Portable *</p>
                    <div class="div-telephone">
                        <select id="telportable" name="telportable" class="select-telephone">
                            <option value="33">+33</option>
                            <option value="34">+34</option>
                        </select>
                        <input id="input-telportable" name="inputtelportable" type="text" placeholder="612345678" class="input" onchange="validateTel('input-telportable')" required>
                    </div>
                    <p class="p-obligatoire">* obligatoire</p>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" id="button-valide" disabled>Valider</button>
</div>
</form>
<script src="{{ asset('js/creationcompte.js') }}"></script>

@endsection