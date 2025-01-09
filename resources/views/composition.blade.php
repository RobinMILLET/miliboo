@extends('layouts.app')

@section('title', 'Compte')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/composition.css')}}" />

@endsection

@section('content')

<h1 id="title-comp">Liste des Compositions</h1>
    <grid class="grid">
    <?php
    use App\Http\Controllers\CompositionController;
    use App\Models\CompositionProduit;
    $composition = CompositionProduit::all();
    CompositionController::show($composition);
    ?>
    </grid>

@endsection