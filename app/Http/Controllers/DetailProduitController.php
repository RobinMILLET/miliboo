<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Coloration;
use App\Models\AvisProduit;
use App\Models\PhotoAvis;
use App\Models\ProduitSimilaire;


class DetailProduitController extends Controller
{
    /**
     * Renvoie la page de détail d'un produit, avec les colorations disponibles et la coloration choisie
     * @return View>
     **/
    public function show($id, $idcouleur)
    {
        $produit = Produit::where('idproduit', $id)->first();

        if (!$produit) {
            return redirect()->route('erreur');
        }

        $colorationDispos = $produit->getColoration();

        $colorationChoisie = $colorationDispos->where('idcouleur', $idcouleur)->first();

        if (!$colorationChoisie) {
            return redirect()->route('erreur');
        }

        return view('detailProduit', [
            'produit' => $produit,
            'colorationsDispos' => $colorationDispos,
            'colorationChoisie' => $colorationChoisie
        ]);
    }

    /**
     * Renvoie les photos lié à la coloration et au produit choisi
     * @return Coloration>
     **/
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

    /**
     * Renvoie la description d'une coloration
     * @return Coloration->description>
     **/
    public static function getDescriptionProduit($colorationPrincipale)
    {

        echo $colorationPrincipale->descriptioncoloration;
    }

    /**
     * Renvoie la note d'un produit
     * @return Note>
     **/
    public static function getNoteProduit($produit)
    {
        $note = $produit->affficheNote();
        return $note;
    }

    /**
     * Affiche les informations de prix d'une coloration, y compris le prix de vente 
     * et le montant d'une promotion si elle existe
     **/
    public static function affichagePrix($colorationPrincipale)
    {
        $produit = $colorationPrincipale->getProduit();
        echo "<span class='span-delai'>Expédié sous " . substr($produit->delailivraison, 0, 2) . "h</span>";
        if ($colorationPrincipale->prixsolde) {
            echo "<p class='pPrixSoldeProduit'> $colorationPrincipale->prixsolde €</p>";
            echo "<p class=pPrixVenteProduit' style=text-decoration-line:line-through;> $colorationPrincipale->prixvente €</p>";
            echo "<span class='pPromotion'>Promotion! -" . round($colorationPrincipale->getReduc(), 0) . "%</span>";
        } else {
            echo "<p class=pPrixVenteProduit'> $colorationPrincipale->prixvente €</p>";
        }
    }


    /**
     * Affiche la premiere photo d'une paire coloration / produit 
     * Pour l'affichage de la partie commentaire
     **/
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

    /**
     * Obtient les commentaires, les noms de client, les notes et les dates de commentaires
     * Procède ensuite à l'affichage de ces informations, y compris les réponses de Miliboo si elle existe
     **/
    public static function affichageCommentaire($produit)
    {
        $listAvis = $produit->getAvis();
        foreach ($listAvis as $avis) {
            $nomClient = $avis->getClient()->nomclient;
            $photoAvis = $avis->getPhotoAvis();
            if ($photoAvis) {
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



    public static function getProduitsSimilaire($produit)
    {
        $produitsSimilaire = $produit->getProduitSimilaire();
        return $produitsSimilaire;
    }
    public static function affichageProduitsSimilaire($produitsSimilaire)
    {

        if ($produitsSimilaire->isEmpty()) {
            echo "Il n'y a pas de produits Similaire";
            return;
        }
        echo "<h2 class='titreProduitCarroussel'>Vous aimerez aussi</h2>";
        echo "<div class='carroussel'>";
        echo "<button class='button-scroll' id='button-scroll-left'><</button>";
        echo "<div class='topProduitsCarroussel'>";
        foreach ($produitsSimilaire as $produitsim) {
            $produits = $produitsim->getProduit();
            $produit = $produits[0];
            echo "<div class='produitCarroussel'>";
            echo "<h3>{$produit->nomproduit}</h3>";
            $coloration = $produit->colorationPrixMin();
            $urlProduitColoration = "idproduit" . $produit->idproduit . "/coloration" . $coloration->idcouleur;
            $photosColoration = $coloration->getPhotoProduitColoration()->first();
            $photosColoration = $photosColoration->getPhoto();
            $sourcePhoto = '\\img\\' . $photosColoration->sourcephoto;
            $descriptionPhotoAvis = $photosColoration->descriptionphoto;
            echo "<a href='/produit/$urlProduitColoration'><img class='img-carroussel' src='{$sourcePhoto}' alt='$descriptionPhotoAvis'></a>";

            self::affichagePrixCarroussel($coloration);

            echo "</div>";
        }
        echo "</div>";
        echo "<button class='button-scroll' id='button-scroll-right'>></button>";
        echo "</div>";
    }

    /**
     * Obtient les 10 produits les plus aimés par les clients ayant aimé le produit affiché
     * @return Array['Produit', 'NbLike']>
     **/
    public static function getProduitsLikes($produit)
    {
        //Recupere la liste des clients aimant le produit
        $clientsAimantProduit = $produit->getAimeParClient()->get();
        $produits = collect();

        //On parcourt la liste des clients et on recupere leurs produits likés
        foreach ($clientsAimantProduit as $client) {
            $produitsLikes = $client->getProduitsAimes;
            $produits = $produits->merge($produitsLikes);
        }
        //On compte le nb de like pour chaque produit
        $produitsCompteLikes = $produits->groupBy('idproduit')->map(function ($produitsGroupes) {
            return [
                'produit' => $produitsGroupes->first(),
                'nbLike' => $produitsGroupes->count()
            ];
        });

        //On exclue le produit présenté du top 10
        $produitsCompteLikes = $produitsCompteLikes->reject(function ($element) use ($produit) {
            return $element['produit']->idproduit == $produit->idproduit;
        });

        //On garde les 10 premiers
        $topProduits = $produitsCompteLikes->sortByDesc('nbLike')->take(10);
        return $topProduits;
    }

    /**
     * Affiche le top produit passé en paramètre
     **/
    public static function affichageTopProduitsLikes($topProduits)
    {
        if ($topProduits->isEmpty()) {
            echo "Pas de top produits likes par les clients";
            return;
        }

        echo "<h2 class='titreProduitCarroussel'>Nos clients ont également aimé ces produits</h2>";
        echo "<div class='carroussel'>";
        echo "<button class='button-scroll' id='button-scroll-left'><</button>";
        echo "<div class='topProduitsCarroussel'>";
        foreach ($topProduits as $elementTop) {
            $produit = $elementTop['produit'];
            $nbLike = $elementTop['nbLike'];

            echo "<div class='produitCarroussel'>";
            echo "<h3>{$produit->nomproduit}</h3>";
            $coloration = $produit->colorationPrixMin();
            $urlProduitColoration = "idproduit" . $produit->idproduit . "/coloration" . $coloration->idcouleur;
            $photosColoration = $coloration->getPhotoProduitColoration()->first();
            $photosColoration = $photosColoration->getPhoto();
            $sourcePhoto = '\\img\\' . $photosColoration->sourcephoto;
            $descriptionPhoto = $photosColoration->descriptionphoto;
            echo "<a href='/produit/$urlProduitColoration'><img class='img-carroussel' src='{$sourcePhoto}' alt='$descriptionPhoto'></a>";
            echo "<p>Likes: $nbLike</p>";

            self::affichagePrixCarroussel($coloration);

            echo "</div>";
        }
        echo "</div>";
        echo "<button class='button-scroll' id='button-scroll-right'>></button>";
        echo "</div>";
    }

        /**
     * Retourne les produit, sourcePhoto, urlProduit, et descriptionPhoto des 10 derniers produits consultes
     * @return Array['produit', sourcePhoto', 'urlProduitColoration', 'descriptionPhoto']>
     **/
    public static function getProduitsConsultes($sessionHistorique)
    {
        $produitsConsultes = [];
        foreach ($sessionHistorique as $produitSession) {
            foreach ($produitSession as $colorationConsulte) {
                if (is_array($colorationConsulte) || is_object($colorationConsulte)) {
                    $photoColoration = $colorationConsulte->getPhotoProduitColoration()->first();
                    $photoColoration = $photoColoration->getPhoto();
                    $produit = $colorationConsulte->getProduit();
                    $sourcePhoto = '\\img\\' . $photoColoration->sourcephoto;
                    $urlProduitColoration = "idproduit" . $colorationConsulte->idproduit . "/coloration" . $colorationConsulte->idcouleur;
                    $descriptionPhoto = $photoColoration->descriptionphoto;
                    $produitsConsultes[] = array("produit" => $produit, "sourcePhoto" => $sourcePhoto, "urlProduitColoration" => $urlProduitColoration, "descriptionPhoto" => $descriptionPhoto);
                }
            }
        }
        return $produitsConsultes;
    }

    public static function affichageProduitsConsultes($produitsConsultes) {
        if (!$produitsConsultes) {
            echo "Pas de top produits likes par les clients";
            return;
        }

        echo "<h2 class='titreProduitCarroussel'>Vous avez consulté récemment les produits suivant</h2>";
        echo "<div class='carroussel'>";
        echo "<button class='button-scroll' id='button-scroll-left'><</button>";
        echo "<div class='topProduitsCarroussel'>";
        foreach ($produitsConsultes as $elementConsulte) {
            $produit = $elementConsulte['produit'];
            $sourcePhoto = $elementConsulte['sourcePhoto'];
            $urlProduitColoration = $elementConsulte['urlProduitColoration'];
            $descriptionPhoto = $elementConsulte['descriptionPhoto'];

            echo "<div class='produitCarroussel'>";
            echo "<h3>{$produit->nomproduit}</h3>";
            $coloration = $produit->colorationPrixMin();
            $urlProduitColoration = "idproduit" . $produit->idproduit . "/coloration" . $coloration->idcouleur;
            $photosColoration = $coloration->getPhotoProduitColoration()->first();
            $photosColoration = $photosColoration->getPhoto();
            $sourcePhoto = '\\img\\' . $photosColoration->sourcephoto;
            $descriptionPhoto = $photosColoration->descriptionphoto;
            echo "<a href='/produit/$urlProduitColoration'><img class='img-carroussel' src='{$sourcePhoto}' alt='$descriptionPhoto'></a>";
            
            self::affichagePrixCarroussel($coloration);

            echo "</div>";
        }
        echo "</div>";
        echo "<button class='button-scroll' id='button-scroll-right'>></button>";
        echo "</div>";
    }

    public static function affichagePrixCarroussel($coloration) {
        $prixVente = $coloration->prixvente;
        $prixSolde = $coloration->prixsolde;
        echo "<div class=divAffichagePrixCarroussel>";
        if($prixSolde) {
            $reduc = round($coloration->getReduc(), 0);
            echo "<a class='prixPromoCarroussel prix'> $prixVente €</a>";
            echo "<a class='prixSoldeCarroussel prix'> $prixSolde €</a>";
            echo "<a class='prixReducCarroussel prix'> -$reduc%</a>";
        }
        else {
            echo "<a class='prixVenteCarroussel prix'> $prixVente €</a>";
        }
        echo "</div>";
    }
}
