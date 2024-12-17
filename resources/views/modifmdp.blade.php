@extends('layouts.moncompte')

@section('title', 'Modification mot de passe')

@section('css-compte')
<link rel="stylesheet" type="text/css" href="{{asset('css/modifmdp.css')}}" />
@endsection

@section('content-compte')
<script src="{{asset('js/modifmdp.js')}}"></script>
<div id="container-modif-mdp">
    <h3 id="title-modif-mdp">Changer mon mot de passe</h3>
    <form method="POST" action="/modMdp" id="form">
    @csrf
        <div id="div-input">
            <?php $mdpError = session()->get('error')=="mdp" ? " error" : ""; ?>
            <input id="ancienmdp" name="ancienmdp" class="input{{$mdpError}}" type="password" placeholder="Ancien mot de passe" required>
            <input id="password" name="password" class="input" type="password" placeholder="Nouveau mot de passe" required onchange="validatePassword()">
            <input id="passwordConfirm" name="passwordConfirm" class="input" type="password" placeholder="Confirmer mot de passe" required onchange="validatePassword()">
        </div>
        <ul id="ul-mdp-required">
            <li id="req1" class="li-required">12 caractères</li>
            <li id="req2" class="li-required">1 minuscule</li>
            <li id="req3" class="li-required">1 majuscule</li>
            <li id="req4" class="li-required">1 chiffre</li>
            <li id="req5" class="li-required">1 caractère spécial (!?/%*?&#...)</li>
            <li id="req6" class="li-required" style="border-bottom: none;">Confirmation du mot de passe</li>
        </ul>

        <button type="submit" id="button-valide">Valider</button>
    </form>
</div>
@endsection