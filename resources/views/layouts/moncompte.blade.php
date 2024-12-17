@extends('layouts.app')

@section('title', 'Mon Compte')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/moncompte.css')}}" />
@yield('css-compte')
@endsection

@section('content')
 
<div id="content">
    <div id="panel">
        <a id="a-info-ge" href="{{ route('espaceclient') }}">Informations générales</a>

        <div class="section-panel">
            <h2 class="title-section-panel">Mes produits aimés</h2>
            <ul class="ul-section-panel">
                <li class="li-section-panel"><a href="{{ route('compte.aimes') }}">Voir mes produits aimés</a></li>
            </ul>
        </div>

        <div class="section-panel">
            <h2 class="title-section-panel">Mes commandes</h2>
            <ul class="ul-section-panel">
                <li class="li-section-panel"><a href="{{ route('mescommandes') }}">Voir mes commandes</a></li>
            </ul>
        </div>
        <div class="section-panel">
            <h2 class="title-section-panel">Mes informations personnelles</h2>
            <ul class="ul-section-panel">
                <li class="li-section-panel"><a href="{{ route('modifmdp') }}">Changer mon mot de passe</a></li>
                <li class="li-section-panel"><a href="{{ route('infoperso') }}">Modifier mes informations personnelles</a></li>
            </ul>
        </div>

        <a id="a-deconnecter" href="/logout">Se déconnecter<img id="img-deconnecter" src="{{ asset('/img/deconnecter.png') }}" alt=""></a>
    </div>
    <div id="information">
    <h2 class="h2-section-info">Bonjour <strong>{{$_SESSION["client"]->prenomclient;}}</strong> et bienvenue dans votre espace client Miliboo !</h2>
        @yield('content-compte')
    </div>
</div>

@endsection