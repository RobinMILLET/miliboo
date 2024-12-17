@extends('layouts.moncompte')

@section('title', 'Mes produits aimés')

@section('css-compte')
<link rel="stylesheet" type="text/css" href="{{asset('css/produitsaimes.css')}}" />
@endsection

@section('content-compte')
    <?php
        use App\Http\Controllers\ProduitsAimesController;
        use App\Models\Produit;

        echo "<h2>Mes produits aimés</h2>";
        echo "<div id='div-produit'>";
        $produitsLikes = $produitsAimes;   
        $produits = collect();
        foreach ($produitsLikes as $produitAffiche) {
            echo "<div class='produit-ligne'>";
            $produit = $produitAffiche->getProduit();
            $produit = Produit::where('idproduit', $produitAffiche->idproduit)->first();
            $coloration = $produit->getColoration()->first();
            $photo = $coloration->getPhoto()->first();
            $source = "/img/" . $photo->sourcephoto;
            $href = "href='/produit/idproduit$coloration->idproduit/coloration$coloration->idcouleur'";
            echo "<a class='a-produit-ligne' $href>";
            echo "<img class='img-produit' src='$source' alt=''>";
            echo "<p class='p-produit-ligne'>$produit->nomproduit</p>";
            echo "</a>";
            echo "</div>";
        }
    ?>
@endsection