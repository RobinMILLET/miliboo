@extends('layouts.app')

@section('title', 'Panier')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/panier.css')}}" />
@endsection

@section('content')
<script src="{{asset('js/panier.js')}}"></script>


<div id="container">
    <div id="title-panier">
        <h1>Résumé de votre commande</h1>
    </div>

    <div id="progress-panier" class="marge">
        <div class="etape show-detail"><p class="p-detail bottom">Étape 1: Panier</p><p>1</p></div>
        <div class="etape show-detail"><p class="p-detail bottom">Étape 2: Livraison</p><p>2</p></div>
        <div class="etape show-detail"><p class="p-detail bottom">Étape 3: Paiement</p><p>3</p></div>
    </div>

    <div id="content-panier">
        <table id="table-panier">
            <colgroup>
                <col>
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
                <tr class="tr">
                    <th>Les articles de mon panier :</th>
                    <th></th>
                    <th >Quantité</th>
                    <th>Supprimer</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    use App\Http\Controllers\PanierController;
                    use App\Models\CompositionProduit;

                    $disabled = " disabled";

                    PanierController::fixPanier();
                    $colorations = $_SESSION["panier"][0];
                    if ($colorations and gettype($colorations) == "array") {
                        $disabled = "";
                        foreach ($colorations as $coloration) {
                            echo PanierController::afficheLigneCookie($coloration);
                        }
                    }
                    $compositions = $_SESSION["panier"][1];
                    if ($compositions and gettype($compositions) == "array") {
                        $disabled = "";
                        foreach ($compositions as $id => $quantite) {
                            $composition = CompositionProduit::find($id);
                            echo PanierController::afficheLigneComp($composition, $quantite);
                        }
                    }
                ?>
            </tbody>
        </table>
        <div class="marge" id="resume">
                <div id="empty"></div>
                <div id="resume-info">
                    <p id="p-resume-title">Résumé de la commande</p>
                    <ul id="ul-resume-info">
                        <li>
                            <div class="div-ligne-info">
                                <p class="p-title-info">Total des articles (Prix initial)</p>
                                <p class="p-info prix"><strong id='prixpanier'></strong></p>
                            </div>
                        </li>
                        <li>
                            <div class="div-ligne-info">
                                <p class="p-title-info">Remise totale</p>
                                <p class="p-info moins prix"><strong>0</strong></p>
                            </div>
                        </li>
                        <li>
                            <div class="div-ligne-info">
                                <p class="p-title-info">Frais de livraison</p>
                                <p class="p-info"><strong>Gratuit</strong></p>
                            </div>
                        </li>
                        <li id="li-fin">
                            <div class="div-ligne-info">
                                <p class="p-title-info-final">Total de la commande</p>
                                <p class="p-info-final prix"><strong id='prixtotal'></strong></p>
                            </div>
                        </li>
                    </ul>
                </div>
        </div>
        <div class="marge" id="detail">
            <div id="fidelite" style="margin-top:-250px">
                <p id="title-fidelite">Points fidélité</p>
                <p><span id="info-fidelite"></span> sur votre prochaine commande pour votre achat</p>
            </div>
            <!--
            <div id="promo">
                <p id="title-promo">Code promo</p>
                <div id="div-input-promo">
                    <input type="text" id="input-promo" name="promo" placeholder="Code promo">
                    <button id="button-promo">OK</button>
                </div>
            </div>
                -->
        </div>
        <div class="marge" id="div-button" style="margin-top:-100px">
            <div id="achats"><form action="{{ route('homepage') }}"><button id="button-achats"><p id="p-achats"><u>Continuer mes achats</u></p></button></form></div>
            <div id="commande"><button id="button-commande"{{$disabled}} onclick="window.location.href='/etapelivraison'"><p id="p-commande"> Valider ma commande</p></button></div>
        </div>
    </div>
</div>
<script>
    fetch("/prixPanier")
        .then(response => response.json())
        .then(data => {
            getPrixPanier(data.prixpanier)
    });
</script>

@endsection