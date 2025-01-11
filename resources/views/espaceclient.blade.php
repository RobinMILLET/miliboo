@extends('layouts.moncompte')

@section('title', 'Espace Client')

@section('css-compte')
<link rel="stylesheet" type="text/css" href="{{asset('css/espaceclient.css')}}" />
@endsection

@section('content-compte')

<div class="div-info" id="div-info-commande">
    <div id="suivi-commande">
        <h3 id="title-suivi-commande">Suivi de mes commandes</h3>

        <table id="table-commande">
            <thead>
                <?php
                $client = $_SESSION["client"];
                use App\Http\Controllers\CommandeController;
                use App\Http\Controllers\EspaceClientController;
                CommandeController::getCommande($client, [1,2,3]);
                ?>
        </table>
    </div>
</div>

<div class="div-info" id="div-info-fidelite">
    <h2 class="h2-section-info">Mes points fidélité</h2>
    
    <?php
        EspaceClientController::getPointFidelelite($client);
    ?>
</div>

@endsection