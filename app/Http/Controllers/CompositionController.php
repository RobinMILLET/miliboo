<?php

namespace App\Http\Controllers;

use App\Models\CompositionProduit;
use App\Models\Coloration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class CompositionController extends Controller
{
    public function index()
    {
        $composition = CompositionProduit::all();
        return view('composition', compact('composition'));
    }

    public static function show($compositions)
    {  

        foreach($compositions as $composition){
            $details = $composition->getDetailComposition()->first();

            if($details){

                echo "<a href=detailcomposition/$composition->idcomposition>";
                echo '<div class="produit">';
                $coloration = $details->getColoration();

                $photo = $coloration->getPhoto()->first();
                $sourcePhoto = '\\img\\' .$photo->sourcephoto;
                $prixSolde = $composition->prixsoldecomposition;
                $prix = $composition->prixventecomposition;
                echo "<p class='p-titre-comp'>$composition->nomcomposition</p>";
                echo "<img class='img-comp' src='$sourcePhoto'>";
                if ($prixSolde) {
                    echo "<p class='pPrixSoldeProduit'>$prixSolde €</p>";
                    echo "<p class='pPrixVenteProduit'>$prix €</p>";
                }
                else echo "<p>$prix €</p>";
                
        }
            
        echo '</div>';
        echo '</a>';
        }
        // return view('compositions', compact('composition', 'produits'));
    }
}
