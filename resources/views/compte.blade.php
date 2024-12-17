@extends('layouts.app')

@section('title', 'Compte')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/compte.css')}}" />

@endsection

@section('content')

<h2 class="marge"  id="title-compte">Créer un compte ou se connecter</h2>

<div class="marge" id="account">
    <?php $createError = session()->get('error')=="create" ? " used" : ""; ?>
    <form method="POST" action="/testCreate" class="div-compte" id="create">
    @csrf
        <p>Je suis nouveau client - <span class="span-info">Créer un compte</span></p>
        <p class="span-info error-msg{{$createError}}">Cette adresse e-mail est déjà utilisée !</p>
        <div class="div-input">
            <input type="email" placeholder="Votre adresse e-mail *" class="input-compte" name="email" required>
            <p class="p-obligatoire">* obligatoire</p>
        </div>
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
            <button class="button-compte" type="submit">Créer mon compte</button>
        </div>
</form>
    <?php $loginError = session()->get('error')=="login" ? " error" : ""; ?>
    <form method="POST" action="/login" class="div-compte" id="connection">
        @csrf
        <p>Je suis déjà client - <span class="span-info">Se connecter</span></p>
        <div class="div-input">
            <input name="email" type="email" placeholder="Votre adresse e-mail *" class="input-compte{{$loginError}}" required>
            <p class="p-obligatoire">* obligatoire</p>
        </div>
        <div class="div-input">
            <input name="password" type="password" placeholder="Mot de passe *" class="input-compte{{$loginError}}" required>
            <p class="p-obligatoire">* obligatoire</p>
        </div>

        <div id="div-souvenir">
            <input id="remember" type="checkbox" id="input-souvenir" name="remember">
            <p id="p-souvenir">Se souvenir de moi</p>
        </div>

        <p id="p-oublie"><a href="" id="a-oublie">Mot de passe oublié ?</a></p>

        <div class="div-button">
            <button class="button-compte" type="submit">Valider</button>
        </div>
    </form>
</div>

@endsection