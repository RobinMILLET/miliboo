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

    <div id="info-panier" class="marge">
        <p>Pendant le Black Friday, les délais de livraison peuvent être allongés. Veuillez-nous excuser pour la gêne occasionnée.</p>
    </div>

    <div id="progress-panier" class="marge">
        <div class="etape"><p>1</p></div>
        <div class="etape"><p>2</p></div>
        <div class="etape"><p>3</p></div>
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
                    PanierController::fixPanier();
                    $colorations = $_SESSION["panier"];
                    if ($colorations and gettype($colorations) == "array") {
                        foreach ($colorations as $coloration) {
                            echo PanierController::afficheLigneCookie($coloration);
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
                                <p class="p-title-info">Remise total</p>
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
            <div id="fidelite">
                <p id="title-fidelite">Points fidélité</p>
                <p><span id="info-fidelite">19.50€ offert</span> sur votre prochaine commande pour votre achat</p>
            </div>
            <div id="promo">
                <p id="title-promo">Code promo</p>
                <div id="div-input-promo">
                    <input type="text" id="input-promo" name="promo" placeholder="Code promo">
                    <button id="button-promo">OK</button>
                </div>
            </div>
        </div>
        <div class="marge" id="div-button">
            <div id="achats"><form action="{{ route('homepage') }}"><button id="button-achats"><p id="p-achats"><u>Continuer mes achats</u></p></button></form></div>
            <div id="commande"><button id="button-commande"><p id="p-commande"> Valider ma commande</p></button></div>
        </div>
    </div>
</div>
<script>
    getPrixPanier()
</script>

@endsection