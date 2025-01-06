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
        // dd($compositions);
        foreach($compositions as $composition){
            $details = $composition->getDetailComposition()->first();
            // dd($details);
            if($details){

                echo "<a href=detailcomposition/$composition->idcomposition>";
                echo '<div class="produit">';
                $detailIdProduit = $details->idproduit;
                
                $detailidcouleur = $details->idcouleur;
                // $produit = $details->getColoration();
                $produit = Coloration::where([
                        ['idproduit', '=', $detailIdProduit],
                        ['idcouleur', '=', $detailidcouleur]
                    ])->first();
                $photo = $produit->getPhoto()->first();
                $sourcePhoto = '\\img\\' .$photo->sourcephoto;
                // dd($sourcePhoto);
                $prix = $composition->prixventecomposition;
                echo "<p class='p-titre-comp'>$composition->nomcomposition</p>";
                echo "<img class='img-comp' src='$sourcePhoto'>";
                echo "<p class='p-prix-comp'>$prix €</p>";
        }
            
        echo '</div>';
        echo '</a>';
        }
        // return view('compositions', compact('composition', 'produits'));
    }
}
