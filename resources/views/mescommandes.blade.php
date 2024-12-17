@extends('layouts.moncompte')

@section('title', 'Mes commandes')

@section('css-compte')
<link rel="stylesheet" type="text/css" href="{{asset('css/mescommandes.css')}}" />
@endsection

@section('content-compte')
<div id="suivi-commande">
    <h3 id="title-suivi-commande">Suivi de mes commandes</h3>

    <table id="table-commande">
        <thead>
            <?php
            use App\Http\Controllers\CommandeController;
            $client = $_SESSION["client"];
            CommandeController::getCommande($client);
            ?>
    </table>
</div>
@endsection