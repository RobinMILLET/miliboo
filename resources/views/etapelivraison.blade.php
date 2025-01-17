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
    <div class="etape show-detail"><p class="p-detail bottom">Étape 1: Panier</p><p>1</p></div>
    <div class="etape show-detail"><p class="p-detail bottom">Étape 2: Livraison</p><p>2</p></div>
    <div class="etape show-detail"><p class="p-detail bottom">Étape 3: Paiement</p><p>3</p></div>
</div>

<form id="form-livraison" method="POST" action="{{ route('paiement') }}">
    @csrf
<div id="adresse">
    <div class="div-adresse" id="actuelle">
        <div class='show-detail' style='width: fit-content'>
            <h2>
                Instructions de livraison
                <img class="imgAide" src="{{ asset('img/question.png') }}">            
                <p class='p-detail right'>Précisez le bâtiment, le numéro d'interphone, ou des contraintes spécifiques</p>
            </h2>
        </div>
        <textarea name="instruct" rows="4" cols="64" maxlength="200"></textarea>
    </div>
    <div class="div-adresse">
        <div>
            <p>Vous pouvez ajouter des adresses dans votre <a id="info-perso-livraison" href="{{ route('infoperso') }}">espace perso</a></p>
            <div class="div-adresse" id="livraison">
                <h2 class="title-section">Changer mon adresse de livraison :</h2>
                <select name="idadresselivr" id="select-adresse" class="input">
                    <?php
                    use App\Http\Controllers\LivraisonController;
                    LivraisonController::echoOptionsAdr();
                    ?>
                </select>
            </div>
            <div class="div-adresse" id="facturation">
                <h2 class="title-section">Changer mon adresse de facturation :</h2>
                <select name="idadressefact" id="select-adresse" class="input">
                    <?php
                    LivraisonController::echoOptionsAdr();
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>

<div id="adresse" style="margin-top:25px">
    <div class="div-adresse" id="actuelle">
        <div class='show-detail' style='width:fit-content'>
        <h2 class="title-section">Type de livraison :
        <img class="imgAide" src="{{ asset('img/question.png') }}">
            &nbsp; <p class='p-detail right'>Prestataire qui livrera votre commande</p></h2></div>
        <select name="idtransporteur" id="select-transport" class="input"  style="width:256px;">
            <?php
            LivraisonController::echoOptionsLivr();
            ?>
        </select>
    </div>
    <div class="div-adresse inline" id="livraison" style="display:inline">
        <h2 class="title-section">Points de fidelité :</h2>
        <div style="display: flex;">
            <input name="usefidel" type="checkbox" value="fidel" class="inline">
            <label class="inline">Je souhaite utiliser les points de fidelité sur mon compte<br><i>Seul le montant payé rapportera des points de fidelité</i></label>
        </div>
        <p class="nice">Disponible: {{ $_SESSION["client"]->pointfideliteclient}} points, soit {{ $_SESSION["client"]->pointfideliteclient*0.5; }}€</p>
    </div>
</div>

<div style="margin-left: 1vw;">
<div class='show-detail' style='width:fit-content'>
    <h2 class="title-section">Assurance
    <img class="imgAide" src="{{ asset('img/question.png') }}">
    &nbsp; <p class='p-detail right'>Une garantie contre les aléas de la vie</p></h2></div>

    <input id="assurance" name="assurance" type="checkbox" value="assurance" class="inline">
    <label for="assurance" class="inline">Je souhaite payer l'assurance de livraison ({{$prixassurance}}€)</label>

    <div class='show-detail' style='width:fit-content'>
    <h2 class="title-section">Livraison Express
    <img class="imgAide" src="{{ asset('img/question.png') }}">
    &nbsp; <p class='p-detail right'>Commande livrée et expédiée sous 24h</p></h2></div>
    <input id="express" name="express" type="checkbox" value="express" class="inline">
    <label for="express" class="inline">Je souhaite payer la livraison express ({{$prixexpress}}€)</label>
</div>

<div id="div-button">
    <div><button type="button" id="button-achats" onclick="window.location.href='/'"><p id="p-achats"><u>< Continuer mes achats</u></p></button></div>
    <div id="commande"><button id="button-commande"><p id="p-commande"> Payer ma commande sécurisée ></p></button></div>
</div>
</form>

<script src="{{ asset('js/etapelivraison.js') }}"></script>

@endsection