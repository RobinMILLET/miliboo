@extends('layouts.app')

@section('title', 'Paiement')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/paiement.css')}}" />
@endsection

@section('content')

<?php
    use App\Http\Controllers\PaiementController;
    if (session('error')) {
        PaiementController::error(session('error'));
    }
?>

<div id="title-panier">
    <h1>Paiement</h1>
</div>

<div id="progress-panier" class="marge half-colored">
    <div class="etape"><p>1</p></div>
    <div class="etape"><p>2</p></div>
    <div class="etape"><p>3</p></div>
</div>

<div id="div-paiement" class="marge">
    <div id="resume">
        <p class="p-paiement">Résumé de la commande</p>
        <div id="div-resume-produit">
            <!-- <div id="container-produit">
                <div class="produit">
                    <p>Table</p>
                    <div class="info-produit">
                        <strong><p>100€</p></strong>
                        <p>Quantité: 1</p>
                    </div>
                </div>
            </div> -->
            <div id="price">
                <strong>
                    <div class="div-ligne-resume">
                        <p>Total des articles (Prix initial)</p>
                        <p>{{ $prix[0] }}€</p>
                    </div>
                    <div class="div-ligne-resume">
                        <p>Facturations supplémentaires</p>
                        <p>{{ $prix[1] }}€</p>
                    </div>
                    <div class="div-ligne-resume">
                        <p>Frais de livraison</p>
                        <p>Offert</p>
                    </div>
                    @if ($prix[4] != 0)
                    <div class="div-ligne-resume">
                        <p>Prix à débiter</p>
                        <p>{{ $prix[2] }}€</p>
                    </div>
                    <div class="div-ligne-resume">
                        <p>Réduction fidélité</p>
                        <p>{{ $prix[3] }}€ ({{ $prix[4] }} points)</p>
                    </div>
                    @endif
                    <div class="div-ligne-resume">
                        <p>Total</p>
                        <p>{{ $prix[5] }}€</p>
                    </div>
                </strong>
            </div>
        </div>

        <?php
        PaiementController::echoOptionsCB();
        ?>

        <!-- <p class="p-paiement">Adresse</p>
        <div id="div-container-adresse">
            <div class="adresse">
                <div>
                    <p class="p-title-adresse">Adresse de livraison</p>
                </div>
                <div class="info-adresse">
                    <p>Nom Prénom</p>
                    <p>Rue</p>
                    <p>CP Ville</p>
                    <p>Numéro de tel</p>
                </div>
            </div>
            <div class="adresse">
                <div>
                    <p class="p-title-adresse">Adresse de facturation</p>
                </div>
                <div class="info-adresse">
                    <p>Nom Prénom</p>
                    <p>Rue</p>
                    <p>CP Ville</p>
                    <p>Numéro de tel</p>
                </div>
            </div>
        </div> -->
    </div>
    <div id="div-select-paiement">
        <div id="id-radio">
            <div>
                <input class="input-radio" name="modepaiement" type="radio" id="radio-carte" checked>
                <label for="radio-carte">Carte de crédit</label>
            </div>
            <div>
                <input class="input-radio" name="modepaiement" type="radio" id="radio-virement" disabled>
                <label for="radio-virement">Virement Bancaire</label>
            </div>
            <div>
                <input class="input-radio" name="modepaiement" type="radio" id="radio-paypal" disabled>
                <label for="radio-paypal">Paypal</label>
            </div>
        </div>

        <div class="div-input">
            <form id="form-carte" method="POST" action="{{ route('paieNouvCB') }}">
            @csrf
                <input name="nom" class="input" type="text" placeholder="Nom de la carte bancaire (requis pour sauvegarder)">
                <input name="num" class="input" type="text" placeholder="0000-0000-0000-0000*" onchange="validate(this, 16, true)" required>
                <p id="p-title-expiration">Expiration</p>
                <div id="div-expiration">
                    <?php
                    echo '<select name="mois" id="select-cb" class="input">';
                    $calendrier = [
                        '01' => 'Janvier','02' => 'Février','03' => 'Mars',
                        '04' => 'Avril','05' => 'Mai','06' => 'Juin',
                        '07' => 'Juillet','08' => 'Août','09' => 'Septembre',
                        '10' => 'Octobre','11' => 'Novembre','12' => 'Décembre'
                    ];
                    foreach ($calendrier as $num => $nom) {
                        echo "<option value='$num'>$nom ($num)</option>";
                    }
                    echo '</select><select name="an" id="select-cb" class="input">';
                    for ($annee = date('Y'); $annee <= date('Y') + 5; $annee++) {
                        echo "<option value='$annee'>$annee</option>";
                    }
                    echo '</select>';
                    ?>
                </div>
                <input name="crypt" class="input" type="text" placeholder="Cryptogramme visuel (3 chiffres)* (non conservé)" maxlength="3" onchange="validate(this, 3)" required>
                <p class="p-obligatoire">* obligatoire</p>

                <div id="div-sace-info">
                    <input name="save" type="checkbox" class="input-check" id="checkbox-save" name="checkbox-save">
                    <label for="checkbox-save">Sauvegarder les coordonnées bancaire</label>
                </div>

                <button id="submit" type="submit" class="button">Valider</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/paiement.js') }}"></script>

@endsection