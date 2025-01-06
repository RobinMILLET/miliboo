@extends('layouts.moncompte')

@section('title', 'Details de commande')

@section('css-compte')
<link rel="stylesheet" type="text/css" href="{{asset('css/detailcommande.css')}}" />
@endsection

@section('content-compte')

<?php
    use App\Http\Controllers\DetailCommandeController;
    use App\Models\Commande;
    $idcommande = (int)$_GET['id'];
    $commande = Commande::find($idcommande);
    DetailCommandeController::getSuivi($commande);
?>

<div id="container-detail-commande">
    <?php
        $idcommande = (int)$_GET['id'];
        $commande = Commande::find($idcommande);
        DetailCommandeController::getEntete($commande);
    ?>
    </div>
    <h2 id="h2-title-detail">Adresse</h2>
    <div id="div-adresse-detail">
        <div class="adresse">
            <p class="p-title-adresse">Adresse de livraison</p>
            <div class="adresse-detail">
                <?php
                $adresse = $commande->getAdresse();
                DetailCommandeController::getAdresse($adresse);
                ?>
            </div>
        </div>
        <div class="adresse">
            
            <p class="p-title-adresse">Adresse de facturation</p>
            <div class="adresse-detail">
                <?php
                $adressefact = $commande->getAdresseFacturation();
                DetailCommandeController::getAdresse($adressefact);
                ?>
            </div>
        </div>
    </div>
    <h2 id="h2-title-detail">Détails commande</h2>
    <table id="table-commande">
        <thead>
            <tr class='tr'>
                <th>Articles</th>
                <th>Référence</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            
                <?php
                    $prixTotal = DetailCommandeController::getDetailCommande($commande);
                ?>
        </tbody>
        <tfoot>
            <tr class="tr-foot">
                <td id="td-total">Total :</td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    echo "<td id='td-total-prix'>$prixTotal</td>";
                ?>
            </tr>
        </tfoot>
    </table>
</div>
@endsection