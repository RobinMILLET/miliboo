@extends('layouts.app')

@section('title', 'A2F')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/compte.css')}}" />

@endsection

@section('content')

<?php if (!isset($error)) $error = null ?> 

<h2 class="marge"  id="title-compte">Authentification à deux facteurs</h2>
@if ($error == 'time')
<script>
alert("Vous devez attendre 5 minutes avant de renvoyer un sms.");
</script>
@endif
@if ($error == 'token')
<script>
alert("Code invalide ou expiré.");
</script>
@endif
@if ($error == 'send')
<script>
alert("Erreur lors de l'envoi du message.");
</script>
@endif

<div class="marge" id="account">
    <form method="POST" action="/a2fLogin" class="div-compte" id="create">
    @csrf
        <p>Le compte '{{$_SESSION["a2f"]->emailclient}}' a activé la double authentification.</p>
        <p>Vous devrez utiliser le code à 6 caractères envoyé sur votre téléphone
        (finissant par {{substr($_SESSION["a2f"]->telportableclient, 8, 3)}})
        pour valider la connexion.</p>
        <input type="text" placeholder="000000" class="input-compte" name="token" required maxlength="6">
        <div class="div-button">
            <button class="button-compte" type="submit" style="margin-top:2.5%">Se connecter</button>
        </div>
    </form>
    <form method="POST" action="/a2fSend" class="div-compte" id="create">
    @csrf
        <p>Vous n'avez pas reçu de code ? Cliquez sur ce bouton pour le renvoyer.</p>
        <p>Vous devez attendre 5 minutes entre chaque tentative.</p>
        <div class="div-button">
            <button class="button-compte" type="submit" style="margin-top:5%">Renvoyer le SMS</button>
        </div>
    </form>
</div>

@endsection