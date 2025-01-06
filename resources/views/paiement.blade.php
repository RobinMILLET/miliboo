@extends('layouts.app')

@section('title', 'Paiement')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/paiement.css')}}" />
@endsection

@section('content')
<?php
use \App\Http\Controllers\PanierController;
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
                        <p>{{PanierController::prixPanier(false)}}€</p>
                    </div>
                    <div class="div-ligne-resume">
                        <p>Frais de livraison</p>
                        <p>Offert</p>
                    </div>
                    <div class="div-ligne-resume">
                        <p>Total</p>
                        <p>{{PanierController::prixPanier(false)}}€</p>
                    </div>
                </strong>
            </div>
        </div>

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
            <form id="form-carte" method="POST" action="/paieCB">
            @csrf
                <input name="nom" class="input" type="text" placeholder="Nom de la carte bancaire (requis pour sauvegarder)">
                <input name="num" class="input" type="text" placeholder="0000-0000-0000-0000*" onchange="validate(this, 16, true)" required>
                <p id="p-title-expiration">Expiration</p>
                <div id="div-expiration">
                    <input name="mois" class="input" type="text" placeholder="Mois d'expiration (deux chiffres)*" maxlength="2" onchange="validate(this, 2)" required>
                    <input name="an" class="input" type="text" placeholder="Année d'expiration (deux chiffres)*" maxlength="2" onchange="validate(this, 2)" required>
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