<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class DetailProduitController extends Controller
{
    public function show($id, $idcoloration)
    {
        $produit = Produit::where('idproduit', $id)->firstOrFail();
        $colorationDispos = $produit->getCouleur();
        $couleur = $colorationDispos->where('idcouleur', $idcoloration)->firstOrFail();

        if (!$couleur) {
            return redirect()->route('erreur');
        }
        return view('detailProduit', ['produit' => $produit, 'colorationsDispos' => $colorationDispos, 'couleur' => $couleur]);
    }


    public static function defColorationPrincipale($produit, $couleur)
    {
        $colorations = $produit->getCouleur();
        $colorationPrincipale = $colorations -> where('idcouleur', $couleur->idcouleur)->firstOrFail();
        // Récupération d'une photo
        $photos = $colorationPrincipale->getPhoto();
            if ($photos) {
                $source = $photos->sourcephoto;
                $description = $photos->descriptionphoto;
            } // Si pas de photo, on prend la photo par défaut
            else {
                $source = "PLACEHOLDER.png";
                $description = "Non";
            }
            $source = '\\img\\' . $source;
            echo "<img src='$source' alt='$description'>";
    
        return $colorationPrincipale;
    }

    // public static function getPhotosColoration($coloration) {
    //     foreach ($coloration->getPhoto() as $photo) {
    //         if ($photo) {
    //             $source = $photo->sourcephoto;
    //             $description = $photo->descriptionphoto;
    //         } // Si pas de photo, on prend la photo par défaut
    //         else {
    //             $source = "PLACEHOLDER.png";
    //             $description = "Non";
    //         }
    //         $source = '\\img\\' . $source;
    //         echo "<img src='$source' alt='$description'>";
    //     }
    // }

    public static function getDescriptionProduit($colorationPrincipale)
    {

        echo $colorationPrincipale->descriptioncoloration;
    }

    public static function isPromotionProduit($colorationPrincipale)
    {
        if ($colorationPrincipale->prixsolde) {
            echo "<h2 class='h2Promotion' style=background-color: black; text-color: white;>Promotion</h2>";
        }
    }

    public static function getNoteProduit($produit)
    {
        $note = $produit->affficheNote();
        return $note;
    }

    public static function affichagePrix($colorationPrincipale)
    {

        if ($colorationPrincipale->prixsolde) {
            echo "<p class='pPrixSoldeProduit'> $colorationPrincipale->prixsolde €</p>";
            echo "<p class=pPrixVenteProduit' style=text-decoration-line:line-through;> $colorationPrincipale->prixvente €</p>";
        } else {
            echo "<p class=pPrixVenteProduit'> $colorationPrincipale->prixvente €</p>";
        }
    }

    public static function affichagePhotoHeaderAvis($colorationPrincipale)
    {

        $photos = ($colorationPrincipale->getPhoto());
        if ($photos->count()) {
            $sourceAvis = $photos[0]->sourcephoto;
        } else {
            $sourceAvis = "PLACEHOLDER.png";
        }
        $sourceAvis = '\\img\\' . $sourceAvis;
        echo "<img class='imgHeaderAvis' src='$sourceAvis'>";
    }

    public static function affichageCommentaire($produit)
    {
        $listAvis = $produit->getAvis();
        foreach ($listAvis as $avis) {
            echo "<div class='divCommentaireClient'>";

            echo "<div class='divClient'>";
            echo "<p class='nomClient'> Id client temporaire: $avis->idclient</p>";
            //A METTRE EN ETOILES
            echo "<p class='noteClient'> $avis->noteavis/4</p>";
            echo "</div>"; //FIN DIV CLIENT

            echo "<div class='divCommentaire'>";
            if ($avis->commentaireavis) {
                echo "<h4 class='titreCommentaire'> $avis->commentaireavis </h4>";
                echo "<div class='contentCommentaire'> $avis->commentaireavis </div>";
            }
            echo "</div>"; //FIN DIV COMMENTAIRE

            echo "<div class='timestampAvis'>";
            echo "<span class='timestampAvis'> $avis->dateavis </span>";
            echo "</div>"; //FIN DIV TIMESTAMPAVIS

            echo "</div>"; //FIN DIV COMMENTAIRECLIENT
        }
    }
}
