@extends('layouts.moncompte')

@section('title', 'Informations personnelles')

@section('css-compte')
<link rel="stylesheet" type="text/css" href="{{asset('css/infoperso.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/modifinfoperso.css')}}" />
@endsection

@section('content-compte')

@include('partials.modifinfoperso')
@include('partials.modifadresse')
<?php

use App\Http\Controllers\CreationCompteController;

if (session('error')) {
    CreationCompteController::error(session('error'));
}
use App\Http\Controllers\InfoPersoController;
InfoPersoController::getInfoPerso();
?>
<br>
<button class='button show-detail' onclick="window.location.href='/json'">
    Récupérer mes informations personnelles
    <p class='p-detail right' style="transform:translateX(50px);top:-50%">En format JSON</p>
</button>
<br><br><br>
<button class='button show-detail' style="color:red" onclick="anonym()">
    Supprimer mon compte
    <p class='p-detail right' style="transform:translateX(40px);top:-50%">De manière définitive et irréversible</p>
</button>
<!-- <div id="div-info-perso">
    <h3 id="title-info-perso">Mes informations personnelles</h3>

    <div id="content-info-perso">
        <div class="adresse-section">
            <div class="header-adresse">
                <p>Adresse de facturation</p>
                <button class="button" id="button-modif-perso">Modifier</button>
            </div>
            <p class="p-info-perso">{{$_SESSION["client"]->nomclient;}} {{$_SESSION["client"]->prenomclient;}}</p>
            <br>
            <p class="p-info-perso">Adresse client</p>
            <p class="p-info-perso">CP Ville</p>
            <p class="p-info-perso">Pays</p>
        </div>
        <div class="adresse-section">
            <div class="header-adresse" id="header-livraison">
                <p>Mes adresse de livraison</p>
                <button class="button">Ajouter une adresse</button>
            </div>
            <div class="adresse">
                <p class="p-info-perso">Mon adresse</p>
                <p class="p-info-perso">{{$_SESSION["client"]->nomclient;}} {{$_SESSION["client"]->prenomclient;}}</p>
                <div>
                    <div class="adresse-info">
                        <div>
                            <p class="p-info-perso">Adresse client</p>
                            <p class="p-info-perso">CP Ville</p>
                            <p class="p-info-perso">Pays</p>
                        </div>
                        <button class="button" id="button-adresse">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<script src="{{ asset('js/modifinfo.js') }}"></script>

@endsection