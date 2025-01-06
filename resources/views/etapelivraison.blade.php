@extends('layouts.app')

@section('title', 'Etape livraison')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/etapelivraison.css')}}" />
@endsection

@section('content')

<div id="title-panier">
    <h1>Livraison</h1>
</div>

<div id="progress-panier" class="marge half-colored">
    <div class="etape"><p>1</p></div>
    <div class="etape"><p>2</p></div>
    <div class="etape"><p>3</p></div>
</div>


<div id="adresse">
    <div class="div-adresse" id="actuelle">
        <h2>Instructions de livraison</h2>
        <textarea rows="4" cols="64" maxlength="200"></textarea>
    </div>
    <div class="div-adresse" id="livraison">
        <h2 class="title-section">Changer mon adresse de livraison :</h2>
        <p>Vous pouvez ajouter des adresses dans votre <a href="{{ route('infoperso') }}">espace perso</a></p>
        <select name="" id="select-adresse" class="input">
            <?php
            use App\Http\Controllers\LivraisonController;
            LivraisonController::echoOptionsAdr();
            ?>
        </select>
    </div>
</div>

<div id="adresse" style="margin-top:25px">
    <div class="div-adresse" id="actuelle">
        <h2 class="title-section">Type de livraison :</h2>
        <select name="" id="select-transport" class="input"  style="width:256px;">
            <?php
            LivraisonController::echoOptionsLivr();
            ?>
        </select>
    </div>
    <div class="div-adresse inline" id="livraison" style="display:inline">
        <h2 class="title-section">Points de fidelité :</h2>
        <input type="checkbox" value="fidel" class="inline">
        <label class="inline">Je souhaite utiliser les points de fidelités sur mon compte</label>
        <br><p class="nice">Disponible: {{ $_SESSION["client"]->pointfideliteclient}} points, soit {{ $_SESSION["client"]->pointfideliteclient*0.5; }}€</p>
    </div>
</div>

<div id="div-button">
    <div><form action="{{ route('homepage') }}"><button id="button-achats"><p id="p-achats"><u>< Continuer mes achats</u></p></button></form></div>
    <div id="commande"><a href="{{ route('paiement') }}"><button id="button-commande"><p id="p-commande"> Payer ma commande sécurisée ></p></button></a></div>
</div>
<script src="{{ asset('js/etapelivraison.js') }}"></script>

@endsection