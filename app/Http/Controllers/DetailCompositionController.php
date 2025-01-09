<?php

namespace App\Http\Controllers;
use App\Models\CompositionProduit;
use Illuminate\Http\Request;

class DetailCompositionController extends Controller
{
    public function show($idcomposition)
    {
        $composition = CompositionProduit::where('idcomposition', $idcomposition)->first();
        return view('detailcomposition', compact('composition'));
    }
    public static function afficheDetailComposition($composition){
        $details = $composition->getDetailComposition();
        foreach($details as $detail){
            $coloration = $detail->getColoration();
            $id = $coloration->idproduit."-".$coloration->idcouleur;
            $photo = $coloration->getPhoto()->first();
            $produit = $coloration->getProduit();
            $href = "href='/produit/idproduit$coloration->idproduit/coloration$coloration->idcouleur'";   
            $nom = "<a $href><p class='p-name'>$produit->nomproduit</p></a>";

            if ($photo) {
                $source = $photo->sourcephoto;
                $desc = $photo->descriptionphoto;
            } // Si pas de photo, on prend la photo par défaut
            else {
                $source = "PLACEHOLDER.png";
                $desc = "Image par défaut";
            }
            $img = "<td class='td-article'><a $href><img src='/img/$source' alt='$desc'></a></td>";
            $description = "<td class='td-description'><div class='div-description'>$nom</div></td>";
            $quantite = "<td class='td-quantite'><div class='div-quantite'>" .
            "<label id='q$id' class='label-quantite'>$detail->quantitecomposition</label>".
            "</div></td>";
            ;
            echo "<tr class='tr-body'>$img$description$quantite</tr>";
        }
    }

    public static function affichePrixComposition($composition){
        if ($composition->prixsoldecomposition) {
            echo "<p class='p-info-final prix'><s>$composition->prixventecomposition</s></p>";
            echo "<p class='p-info-final prix'>$composition->prixsoldecomposition</p>";
        }
        else echo "<p class='p-info-final prix'>$composition->prixventecomposition</p>";
    }
}
