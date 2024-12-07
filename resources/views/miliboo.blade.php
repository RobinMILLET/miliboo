@extends('layouts.app')

@section('title', 'Miliboo')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/acceuil.css')}}" />
@endsection

@section('content')

<div class="contentAcceuil">
    <h1 class="titreCollection">Collections tendances</h1>
    <div class="grilleCategorie">
        <a class="elementGrille" href="{{ route('produits.parCategorieMere', 1) }}">
            <img src="{{ asset('/img/grilleCollections1.jpg') }}" alt="">
        </a>
        <a class="elementGrille" href="{{ route('produits.parCategorieMere', 5) }}">
            <img src="{{ asset('/img/grilleCollections2.jpg') }}" alt="">
        </a>
        <a class="elementGrille" href="{{ route('produits.parCategorieMere', 2) }}">
            <img src="{{ asset('/img/grilleCollections3.jpg') }}" alt="">
        </a>
        <a class="elementGrille" href="{{ route('produits.parCategorieMere', 10) }}">
            <img src="{{ asset('/img/grilleCollections4.jpg') }}" alt="">
        </a>
    </div>
</div>

@endsection