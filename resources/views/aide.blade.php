@extends('layouts.app')

@section('title', 'Aide')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/aide.css')}}" />

@endsection

@section('content')

<div class="marge">
    <ul id="ul-aide">
        <li class="li-aide" panel="compte">Comment se connecter à son compte</li>
        <li class="li-aide" panel="cookie">Comment accéder au cookie</li>
        <li class="li-aide" panel="like">Comment ajouter un produit à sa liste de favoris</li>
        <li class="li-aide" panel="panier">Comment consulter son panier</li>
    </ul>

    <div>
    <div id="compte" class="div-aide">
            <h2>Comment se connecter à son compte</h2>
            <p>Vous pouvez accéder à votre compte en cliquant <a href="{{ route('espaceclient')}}"> <p>Ici</p></a>.</p>
            <img src="{{asset('img/aide/compte.png')}}" alt="">
        </div>
        <div id="cookie" class="div-aide">
            <h2>Comment accéder au cookie</h2>
            <p>Vous pouvez accéder au cookie en cliquant sur le bouton de cookie en bas a gauche de votre écran.</p>
            <img id="img-cookie" src="{{asset('img/cookie.svg')}}" alt="">
        </div>
        <div id="like" class="div-aide">
            <h2>Comment ajouter un produit à sa liste de favoris</h2>
            <p>1. Se connecter à son compte <a href="{{ route('espaceclient')}}"> <p>Ici</p></a></p>
            <p>2.Choisir un produit</p>
            <p>Commencer par aller dans une catégorie</p>
            <img src="{{asset('img/aide/accesProduit.png')}}" alt="">
            <p>Choisir un produit</p>      
            <img src="{{asset('img/aide/choixProduit.png')}}" alt="" style="width: 900px;"> 
            <p>Ajouter votre produit en cliquant sur le bouton like</p>
            <img src="{{asset('img/aide/like.png')}}" alt=""> 

        </div>
    </div>
</div>

<script src="{{ asset('js/aide.js') }}"></script>

@endsection

