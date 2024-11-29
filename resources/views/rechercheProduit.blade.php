@extends('layouts.app')
@section('title', 'Recherche')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/recherche.css')}}"/>  
@endsection
@section('content')
        <script type="text/javascript">
            var $_GET = <?php echo json_encode($_GET); ?>;
        </script>
        <script src="{{asset('js/recherche.js')}}" defer></script>
        <section id="top">
            <?php
            $nomTypeProduit = $nomTypeProduit ?? null;
            if ($nomTypeProduit) {
                echo "<h1>Produits dans la catégorie : $nomTypeProduit </h1>";
                // Filtres uniquement applicables pour types de produit (TODO!)
            }
            ?>
        </section>
        <!--
        <section id="filtres">
            <ul class="dropdown">
                <li>
                    <h3>Filtre 1</h3>
                    <ul  class="dropdownitem">
                        <li>
                            <input type="checkbox" name="opt11"/>
                            <label for="opt11">Option 1</label>
                        </li>
                        <li>
                            <input type="checkbox" name="opt12"/>
                            <label for="opt12">Option 2</label>
                        </li>
                    </ul>
                </li>
                <li>
                    <h3>Filtre 2</h3>
                    <ul class="dropdownitem">
                        <li>
                            <input type="checkbox" name="opt21"/>
                            <label for="opt21">Option 3</label>
                        </li>
                        <li>
                            <input type="checkbox" name="opt22"/>
                            <label for="opt22">Option 4</label>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        -->
        <section id="mid">
            <p class="left">{{ count($produits) }} produits</p>
            <select class="right">
                <option onclick="setGet('tri','nom',true)">Trier par:</option>
                <option onclick="setGet('tri','min',true)">Prix croissant</option>
                <option onclick="setGet('tri','max',true)">Prix décroissant</option>
            </select>
        </section>

        <section id="recherche">
            <grid id="grid">
                <?php 

                    // si tri est null ou pas max, trier par prixMin
                    $triMin = (($_GET["tri"] ?? "nom") != "max");
                    foreach ($produits as $produit) {
                        echo $produit->afficheRecherche($triMin);
                    }
                ?>
            </grid>
        </section>
@endsection