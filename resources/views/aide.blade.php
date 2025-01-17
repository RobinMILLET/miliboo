@extends('layouts.app')

@section('title', 'Aide')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/aide.css')}}" />

@endsection

@section('content')

<div style="margin-bottom: 5vh;" class="marge">
    <ul id="ul-aide">
        <li class="li-aide" panel="compte">Comment se connecter à son compte ?</li>
        <li class="li-aide" panel="cookie">Comment accéder aux cookies ?</li>
        <li class="li-aide" panel="like">Comment ajouter un produit à sa liste de favoris ?</li>
        <li class="li-aide" panel="panier">Comment ajouter un produit à son panier ?</li>
        <li class="li-aide" panel="paiement">Comment payer sa commande ?</li>
        <li class="li-aide" panel="chatbot">Pour toute question, n'hésitez pas à utiliser le chatbot</li>
    </ul>

    <div id="div-content">
        <div id="compte" class="div-aide">
            <p class="p-aide-etape"><a href="{{ route('espaceclient')}}">Vous pouvez accéder à votre compte en cliquant Ici.</a></p>
        </div>
        <div id="cookie" class="div-aide">
            <p class="p-aide-etape">Vous pouvez accéder aux cookies en cliquant sur le bouton de cookies en bas à gauche de votre écran.</p>
            <div class="div-aide-img">
                <img id="img-cookie" src="{{asset('img/cookie.svg')}}" alt="">
            </div>
        </div>
        <div id="like" class="div-aide">
            <p class="p-aide-title">1.Se connecter à son compte</p>
            <p class="p-aide-title">2.Choisir un produit</p>
            <p class="p-aide-etape">Commencez par sélectionner une catégorie</p>
            <div class="div-aide-img">
                <img src="{{asset('img/aide/accesProduit.png')}}" alt="">
            </div>
            <p class="p-aide-etape">Choisissez un produit</p>      
            <div class="div-aide-img">
                <img src="{{asset('img/aide/choixProduit.png')}}" alt="" style="width: 900px;"> 
            </div>
            <p class="p-aide-etape">Aimez le produit en cliquant sur le bouton "like"</p>
            <div class="div-aide-img">
                <img src="{{asset('img/aide/like.png')}}" alt="">
            </div> 

        </div>
        <div id="panier" class="div-aide">
            <p class="p-aide-title">1.Choisir un produit</p>
            <p class="p-aide-etape">Commencez par sélectionner une catégorie</p>
            <div>
                <img src="{{asset('img/aide/accesProduit.png')}}" alt="">
            </div>
            <p>Choisir un produit</p>      
            <div class="div-aide-img">
                <img src="{{asset('img/aide/choixProduit.png')}}" alt="" style="width: 900px;">
            </div>
            <p class="p-aide-title">2.L'ajouter à son panier</p>
            <p class="p-aide-etape">Appuyer sur le bouton "J'achète"</p>
            <div class="div-aide-img">
                <img src="{{asset('img/aide/achete.png')}}" alt="">
            </div>
            <p class="p-aide-title">3.Aller dans son panier</p>
            <p class="p-aide-etape">Cliquer sur l'icône du panier en haut à droite de l'écran</p>
            <div class="div-aide-img">
                <img src="{{asset('img/aide/panier.png')}}" alt="">
            </div>
        </div>
        <div id="paiement" class="div-aide">
            <p class="p-aide-title">1.Accéder à son panier</p>
            <div class="div-aide-img">
                <img src="{{asset('img/aide/panier.png')}}" alt="">
            </div>
            <p class="p-aide-title">2.Valider sa commande (se connecter au préalable)</p>
            <div class="div-aide-img">
                <img style="width: 100%;" src="{{asset('img/aide/payer1.PNG')}}" alt="">
            </div>
            <p class="p-aide-etape">Choisir les adresses de livraison et facturation</p>
            <div class="div-aide-img">
                <img src="{{asset('img/aide/changer adresse.PNG')}}" alt="">
            </div>
            <p class="p-aide-etape">Choisir le transporteur</p>
            <div class="div-aide-img">
                <img src="{{asset('img/aide/instruction livraison.PNG')}}" alt="">
            </div>
            <p class="p-aide-title">3.Passer au paiement</p>
            <div class="div-aide-img">
                <img style="width: 100%;" src="{{asset('img/aide/continuer pour payer.PNG')}}" alt="">
            </div>
            <p class="p-aide-etape">a) Renseigner les informations de votre carte de crédit</p>
            <div class="div-aide-img">
                <img src="{{asset('img/aide/payer avec carte.PNG')}}" alt="">
            </div>
            <p class="p-aide-etape">b) Choisir une carte de crédit parmis celle déjà renseignée</p>
            <div class="div-aide-img">
                <img style="width: 100%;" src="{{asset('img/aide/choisir une ancienne carte.PNG')}}" alt="">
            </div>
            <p class="p-aide-etape">4.Valider le paiement</p>
        </div>
        <div id="chatbot" class="div-aide">
            <p class="p-aide-title">Vous pouvez y accéder en cliquant sur le bouton en bas à droite de votre écran</p>
            <div class="div-aide-img">
                <img src="{{asset('img/aide/chatbot.PNG')}}" alt="">
            </div>
            <p class="p-aide-etape">Vous pouvez également contacter le support pour des rensignements plus précis</p>
        </div>
    </div>
</div>

<script src="{{ asset('js/aide.js') }}"></script>

@endsection

