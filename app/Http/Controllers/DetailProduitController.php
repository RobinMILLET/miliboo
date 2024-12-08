<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\AvisProduit;
use App\Models\PhotoAvis;

class DetailProduitController extends Controller
{
    public function show($id, $idcouleur)
    {
        $produit = Produit::where('idproduit', $id)->firstOrFail();
        $colorationDispos = $produit->getColoration();

        $colorationChoisie = $colorationDispos->where('idcouleur', $idcouleur)->firstOrFail();

        return view('detailProduit', [
            'produit' => $produit,
            'colorationsDispos' => $colorationDispos,
            'colorationChoisie' => $colorationChoisie
        ]);
    }


    public static function defColorationPrincipale($colorationProduit)
    {
        $photos = $colorationProduit->getPhoto();

        foreach ($photos as $photo) {
            if ($photo) {
                $source = $photo->sourcephoto;
                $description = $photo->descriptionphoto;
            } else {  // Si pas de photo, on prend la photo par défaut
                $source = "PLACEHOLDER.png";
                $description = "Non";
            }
            $source = '\\img\\' . $source;
            echo "<img src='$source' alt='$description'>";
        }

        return $colorationProduit;
    }

    public static function getDescriptionProduit($colorationPrincipale)
    {

        echo $colorationPrincipale->descriptioncoloration;
    }

    public static function getNoteProduit($produit)
    {
        $note = $produit->affficheNote();
        return $note;
    }

    public static function affichagePrix($colorationPrincipale)
    {
        $produit = $colorationPrincipale->getProduit();
        echo "<span class='span-delai'>Expédié sous ".substr($produit->delailivraison, 0, 2)."h</span>";
        if ($colorationPrincipale->prixsolde) {
            echo "<p class='pPrixSoldeProduit'> $colorationPrincipale->prixsolde €</p>";
            echo "<p class=pPrixVenteProduit' style=text-decoration-line:line-through;> $colorationPrincipale->prixvente €</p>";
            echo "<span class='pPromotion'>Promotion! -".round($colorationPrincipale->getReduc(), 0)."%</span>";
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
            $nomClient = $avis->getClient()->nomclient;
            $photoAvis = $avis->getPhotoAvis();
            if($photoAvis) {
                $photoAvis = $photoAvis->getPhoto();
            }

            echo "<div class='divCommentaireClient'>";

            echo "<div class='divClient'>";
            echo "<p class='nomClient'> $nomClient </p>";
            //A METTRE EN ETOILES
            echo "<p class='noteClient'> $avis->noteavis/4</p>";
            echo "</div>"; //FIN DIV CLIENT

            echo "<div class='divCommentaire'>";
            if ($avis->commentaireavis) {
                echo "<h4 class='titreCommentaire'> $avis->nomavis </h4>";
                echo "<div class='contentCommentaire'> $avis->commentaireavis </div>";
                if ($avis->reponsemiliboo) {
                    echo "<br>";
                    echo "<div class='titreReponseCommentaire'> Réponse de Miliboo : </div>";
                    echo "<div class='reponseCommentaire'> $avis->reponsemiliboo </div>";
                }
                //ATTENTION SI PLUSIEURS PHOTOS POUR UN AVIS
                if ($photoAvis) {
                    $sourcePhotoAvis = '\\img\\' . $photoAvis->sourcephoto;
                    $descriptionPhotoAvis = $photoAvis->descriptionphoto;

                    echo "<img class=imgAvisClient src='$sourcePhotoAvis' alt='$descriptionPhotoAvis' onClick='showPreviewImage(this)'>";
                    
                }
            }
            echo "</div>"; //FIN DIV COMMENTAIRE

            echo "<div class='timestampAvis'>";
            echo "<span class='timestampAvis'> $avis->dateavis </span>";
            echo "</div>"; //FIN DIV TIMESTAMPAVIS

            echo "</div>"; //FIN DIV COMMENTAIRECLIENT
        }
    }
}
