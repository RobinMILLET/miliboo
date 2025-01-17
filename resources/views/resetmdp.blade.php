@extends('layouts.app')

@section('title', 'Mot de passe oublié')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/compte.css')}}" />

@endsection

@section('content')

<h2 class="marge"  id="title-compte">Mot de passe oublié</h2>

@if (session('error') == 'time')
<script>
alert("Vous devez attendre 5 minutes avant de renvoyer un email.");
</script>
@endif
@if (session('error') == 'token')
<script>
alert("Lien de connexion invalide ou expiré.");
</script>
@endif

<div class="marge" id="account">
    <?php
    $clientError = session('error')=="client" ? " used" : "";
    ?>
    <form method="POST" action="/resetMdp" class="div-compte" id="create">
    @csrf
        <p>Entrez votre adresse email et recevez un lien pour vous connecter temporairement sans mot de passe.</p>
        <p>Une fois connecté, vous pourrez changer votre mot de passe manuellement.</p>
        <p class='error-msg {{$clientError}}'>Cette adresse email n'est pas reconnue.</p>
        <input type="email" placeholder="Votre adresse e-mail *" class="input-compte" name="email" required>
        <p class="p-obligatoire">* obligatoire</p>
        <div class="div-button">
            <button style="margin-top:0px" class="button-compte" type="submit">Envoyer le mail</button>
        </div>
    </form>
</div>

@endsection