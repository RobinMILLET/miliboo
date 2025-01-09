@extends('layouts.app')

@section('title', $composition->nomcomposition)

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/compte.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/detailcomposition.css')}}" />
@endsection
@section('content')
<script src="{{asset('js/panier.js')}}"></script>

<div id="container">
    <div id="title-panier">
        <h1>Résumé de la composition</h1>
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
                    <th>Les articles de la composition :</th>
                    <th></th>
                    <th >Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    use App\Http\Controllers\DetailCompositionController;
                    // $composition = view('composition');
                    echo DetailCompositionController::afficheDetailComposition($composition);

                ?>
            </tbody>
        </table>
        <div class="marge" id="resume">
                <div id="empty"></div>
                <div id="resume-info">
                    <p id="p-resume-title">Résumé de la composition</p>
                    <ul id="ul-resume-info">
                        <li id="li-fin">
                            <div class="div-ligne-info">
                                <p class="p-title-info-final">Prix total</p>
                                <?php echo DetailCompositionController::affichePrixComposition($composition) ?>
                            </div>
                        </li>
                    </ul>
                    <div id="div-button-panier">
                        <div>
                            <?php
                            $stock = $composition->stock();
                            $disablePlus = $stock <= 1 ? " disabled" : "";
                            $disabled = $stock <= 0 ? " disabled" : "";
                            $start = $stock >= 1 ? 1 : 0;
                            ?>
                            <button id='minusOne' class='button-quantite' disabled onclick="minusOne()">-</button>
                            <input id='quant' class='input-quantite' type="text" value="{{$start}}" onchange='verif(<?php echo $stock ?>)'></input>
                            <button id='plusOne' class='button-quantite' onclick='plusOne(<?php echo $stock ?>)'{{$disablePlus}}>+</button>
                        </div>
                        <button id="button-achete" onclick='achete(
                        <?php echo $composition->idcomposition ?>)'{{$disabled}}>J'achète</button>
                    </div>
                </div>
        </div>
</div>    
@endsection