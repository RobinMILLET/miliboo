@extends('layouts.app')

@section('title', 'Compte')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/compte.css')}}" />
@endsection

@section('content')

<h2 class="marge"  id="title-compte">Créer un compte ou se connecter</h2>

<div class="marge" id="account">
    <div class="div-compte" id="create">
        <p>Je suis nouveau client - <span class="span-info">Créer un compte</span></p>
        <input type="email" placeholder="Votre adresse e-mail *" class="input-compte" name="email" required>
        <div id="info-droit">
            <p class="p-info" id="p-title">Créez votre compte pour bénéficier des services suivants :</p>
            <div>
                <div class="div-info">
                    <p class="p-info">></p>
                    <p class="p-info">Suivi de vos commandes</p>
                </div>
                <div class="div-info">
                    <p class="p-info">></p>
                    <p class="p-info">Gestion de vos adresses et informations personnelles</p>
                </div>
                <div class="div-info">
                    <p class="p-info">></p>
                    <p class="p-info">Abonnement à notre newsletter</p>
                </div>
                <div class="div-info">
                    <p class="p-info">></p>
                    <p class="p-info">Modification et suppression des informations renseigné ultérieurement</p>
                </div>
            </div>
        </div>

        <div class="div-button">
            <button class="button-compte">Créer mon compte</button>
        </div>
    </div>

    <div class="div-compte" id="connection">
        <p>Je suis déjà client - <span class="span-info">Se connecter</span></p>
        <input type="email" placeholder="Votre adresse e-mail *" class="input-compte" name="email" required>
        <input type="password" placeholder="Mot de passe *" class="input-compte" name="mdp" required>

        <div id="div-souvenir">
            <input type="checkbox" id="input-souvenir" name="souvenir">
            <p id="p-souvenir">Se souvenir de moi</p>
        </div>

        <p id="p-oublie"><a href="" id="a-oublie">Mot de passe oublié ?</a></p>

        <div class="div-button">
            <button class="button-compte">Valider</button>
        </div>
    </div>
</div>

@endsection