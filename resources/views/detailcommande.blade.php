@extends('layouts.moncompte')

@section('title', 'Details de commande')

@section('css-compte')
<link rel="stylesheet" type="text/css" href="{{asset('css/detailcommande.css')}}" />
@endsection

@section('content-compte')

<?php
    use App\Http\Controllers\DetailCommandeController;
    use App\Http\Controllers\LivraisonController;
    use App\Models\Commande;
    $prixassurance = LivraisonController::$PRIXASSURANCE;
    $prixexpress = LivraisonController::$PRIXEXPRESS;
    $idcommande = (int)$_GET['id'];
    $commande = Commande::find($idcommande);
    DetailCommandeController::getSuivi($commande);
    if ($commande->idclient != $_SESSION["client"]->idclient) {
        echo "<script>window.location.href='mescommandes'</script>";
    }
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
                <th class="show-detail"><p class="p-detail">Oui</p>Articles</th>
                <th>Référence</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            
                <?php
                    $prixTotal = DetailCommandeController::getDetailCommande($commande);
                    $prixTotal = DetailCommandeController::getCommandeComposition($commande);
                ?>
        </tbody>
        <tfoot>
            <tr class="tr-foot">
                <td id="td-total">Total :
                    @if ($commande->avecassurance)
                    &nbsp; &nbsp; &nbsp;
                    Assurance Livraison ( + {{ $prixassurance }}€ )
                    @endif
                    @if ($commande->aveclivraisonexpress)
                    &nbsp; &nbsp; &nbsp;
                    Livraison Express ( + {{ $prixexpress }}€ )
                    @endif
                </td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    echo "<td id='td-total-prix'> ".$commande->getPrixTot()." €</td>";
                ?>
            </tr>
        </tfoot>
    </table>
</div>
@endsection