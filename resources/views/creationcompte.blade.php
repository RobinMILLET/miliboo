@extends('layouts.app')

@section('title', 'Creation Compte')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/creationcompte.css')}}" />
@endsection

@section('content')

<div id="contain">
    <h2 class="marge"  id="title-compte">Créer votre compte Miliboo</h2>

    <div id="content" class="marge">
        <div id="compte">
            <h3 class="title-part">Mon compte</h3>
            <div class="div-input">
                <input type="email" placeholder="Votre adresse e-mail *" class="input-compte input" name="email" required>
                <p class="p-obligatoire">* obligatoire</p>
            </div>
            <div id="div-mdp">
                <div id="inputs-container">
                    <div class="div-input">
                        <input type="password" placeholder="Votre mot de passe *" class="input-mdp input"/>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                    <div class="div-input">
                        <input type="password" placeholder="Confirmation du mot de passe *" class="input-mdp input"/>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                </div>
                <ul id="ul-mdp-required">
                    <li id="li-required">12 caractère</li>
                    <li id="li-required">1 minuscule</li>
                    <li id="li-required">1 majuscule</li>
                    <li id="li-required">1 chiffre</li>
                    <li id="li-required">1 caractère spécial (!?/%*?&#...)</li>
                    <li id="li-required" style="border-bottom: none;">Confirmation du mot de passe</li>
                </ul>
            </div>

            <div id="div-newsletters">
                <div class="newsletters-info">
                    <input class="input-newsletters" id="checkbox-miliboo" type="checkbox">
                    <label class="label-newsletters" for="checkbox-miliboo">Je souhaite recevoir la newsletter de miliboo.com (Réductions, Nouveautés, Avant premières...).</label>
                </div>
                <div class="newsletters-info">
                    <input class="input-newsletters" id="checkbox-partenaire" type="checkbox">
                    <label class="label-newsletters" for="checkbox-partenaire">J'accepte de recevoir les newsletters des partenaires de Miliboo.com</label>
                </div>
            </div>
        </div>
        <div id="adresse">
            <h3 class="title-part">Mon adresse de facturation</h3>  
            <div id="choix-type">
                <div>
                    <input class="input-radio" id="radio-particulier" name="radio-choix" type="radio">
                    <label class="label-type" for="radio-particulier">Je suis un particulier</label>
                </div>
                <div>
                    <input class="input-radio" id="radio-professionnel" name="radio-choix" type="radio">
                    <label class="label-type" for="radio-professionnel">Je suis un professionnel</label>
                </div>
            </div>

            <div id="info-pro">
                <h5>Informations de votre société</h5>
                <div id="div-content-info-pro">
                    <div class="div-input">
                        <input type="text" placeholder="Société *" class="input">
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                    <div class="div-input">
                        <select name="" id="" class="input">
                            <option value="">Activité *</option>
                            <option value="">Bureaux</option>
                        </select>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                    <div class="div-input">
                        <div id="div-tva">
                            <label for="" class="label">FR</label>
                            <input type="text" placeholder="Numéro de TVA intracommunautaire" class="input" id="input-tva">
                        </div>
                        <p class="p-obligatoire">* obligatoire</p>
                    </div>
                </div>
            </div>

            <div id="info-perso">
                <div class="div-input">
                    <select name="" class="input" id="select-civilite">
                        <option value="">Civilité *</option>
                        <option value="">Mr</option>
                        <option value="">Mme</option>
                    </select>
                    <p class="p-obligatoire">* obligatoire</p>                
                </div>
                <div class="div-input">
                    <input type="text" placeholder="Nom *" class="input" id="input-nom">
                    <p class="p-obligatoire">* obligatoire</p>
                </div>
                <div class="div-input">
                    <input type="text" placeholder="Prenom *" class="input" id="input-prenom">
                    <p class="p-obligatoire">* obligatoire</p>
                </div>
            </div>
            <div id="div-date-naissance">
                <div class="div-input">
                    <input type="date" placeholder="Date de naissance *" class="input">
                    <p class="p-obligatoire">* obligatoire</p>                
                </div>
            </div>
            <div class="div-input">
                <input type="text" placeholder="Adresse *" class="input">
                <p class="p-obligatoire">* obligatoire</p>                
            </div>
            <div id="zone">
                <div class="div-input">
                    <select name="pays" class="input">
                        <option value="">France</option>
                        <option value="">USA</option>
                    </select>
                    <p class="p-obligatoire">* obligatoire</p>                
                </div>
                <div class="div-input">
                    <input type="text" placeholder="Code postal *" class="input">
                    <p class="p-obligatoire">* obligatoire</p>                
                </div>
                <div class="div-input">
                    <input type="text" placeholder="Ville *" class="input">
                    <p class="p-obligatoire">* obligatoire</p>                
                </div>
            </div>
            <div id="telephone">
                <div class="div-input">
                    <p class="title-telephone">Téléphone</p>
                    <div class="div-telephone">
                        <select name="" class="select-telephone">
                            <option value="">+33</option>
                            <option value="">+34</option>
                        </select>
                        <input type="text" placeholder="1 23 45 67 89" class="input">
                    </div>
                    <p class="p-obligatoire">* obligatoire</p>
                </div>
                <div class="div-input">
                    <p class="title-telephone">Portable *</p>
                    <div class="div-telephone">
                        <select name="" class="select-telephone">
                            <option value="">+33</option>
                            <option value="">+34</option>
                        </select>
                        <input type="text" placeholder="6 12 34 56 78" class="input">
                    </div>
                    <p class="p-obligatoire">* obligatoire</p>
                </div>
            </div>
        </div>
    </div>

    <button id="button-valide">Valider</button>
</div>

<script src="{{ asset('js/creationcompte.js') }}"></script>

@endsection