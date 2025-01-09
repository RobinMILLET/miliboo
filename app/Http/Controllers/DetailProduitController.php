<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Produit;
use App\Models\Coloration;
use App\Models\AvisProduit;
use App\Models\DetailCommande;
use App\Models\PhotoAvis;
use App\Models\ProduitSimilaire;
use App\Models\A_aimer;
use Illuminate\Support\Facades\DB;


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

        $isLiked = false;
        if(isset ($_SESSION['client'])) {
            $client = $_SESSION['client'];
            $idCLient = $client->idclient;

            $isLiked = A_aimer::where('idclient', $idCLient)
                        ->where('idproduit', $id)
                        ->exists();
        }

        $colorationDispos = $produit->getColoration();

        $colorationChoisie = $colorationDispos->where('idcouleur', $idcouleur)->first();

        if (!$colorationChoisie) {
            return redirect()->route('erreur');
        }

        return view('detailProduit', [
            'produit' => $produit,
            'colorationsDispos' => $colorationDispos,
            'colorationChoisie' => $colorationChoisie,
            'isLiked' => $isLiked
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
        $note = $produit->afficheNote();
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
        echo "<div id='div-prix'>";
        if ($colorationPrincipale->prixsolde) {
            echo "<p class='pPrixSoldeProduit'> $colorationPrincipale->prixsolde €</p>";
            echo "<p class=pPrixVenteProduit' style=text-decoration-line:line-through;> $colorationPrincipale->prixvente €</p>";
            echo "<span class='pPromotion'>Promotion! -" . round($colorationPrincipale->getReduc(), 0) . "%</span>";
        } else {
            echo "<p class=pPrixVenteProduit'> $colorationPrincipale->prixvente €</p>";
        }
        echo "</div>";
    }

    public static function getAspectTechnique($produit){
        $filePath = $produit->sourceaspecttechnique;
        if (is_null($filePath)) {
            echo "Source aspect technique non renseignée";
        }
        else {
            $file = fopen($filePath, 'r');
            if($file){
                $content = "";
                $lines = [];
                while (($line = fgets($file)) !== false) {
                    // Ajouter chaque ligne au tableau
                    $lines[] = $line;
                }
    
                // Fermer le fichier
                fclose($file);
    
                 // Utiliser foreach pour parcourir chaque ligne
                foreach ($lines as $line) {
                    $content = $content . $line . "<br>";
                }
                echo $content;
            }
            else{
                echo "impossible d'ouvrir le fichier";
            }
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
                //ATTENTION SI PLUSIEURS PHOTOS POUR UN AVIS
                if ($photoAvis) {
                    $sourcePhotoAvis = '\\img\\' . $photoAvis->sourcephoto;
                    $descriptionPhotoAvis = $photoAvis->descriptionphoto;

                    echo "<img class=imgAvisClient src='$sourcePhotoAvis' alt='$descriptionPhotoAvis' onClick='showPreviewImage(this)'>";
                }
                echo "<div class='text-content-avis'>";
                echo "<h4 class='titreCommentaire'> $avis->nomavis </h4>";
                echo "<div class='contentCommentaire'> $avis->commentaireavis </div>";
                if ($avis->reponsemiliboo) {
                    echo "<br>";
                    echo "<div class='titreReponseCommentaire'> Réponse de Miliboo : </div>";
                    echo "<div class='reponseCommentaire'> $avis->reponsemiliboo </div>";
                }
                echo "</div>";
            }
            echo "</div>"; //FIN DIV COMMENTAIRE

            echo "<div class='timestampAvis'>";
            $dateFormatee = date('d/m/Y', strtotime($avis->dateavis));
            echo "<span class='timestampAvis'> $dateFormatee </span>";
            echo "</div>"; //FIN DIV TIMESTAMPAVIS

            if (isset($_SESSION['admin']) &&!$avis->reponsemiliboo) {
                echo "<form class='form-reponse-admin' data-idavis='{$avis->idavis}'>";
                echo "<textarea class='input-reponse-admin' placeholder='Répondre à cet avis...'></textarea>";
                echo "<button type='submit' class='button-reponse-admin'>Envoyer</button>";
                echo "</form>";
            }
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


    public static function affichageDeposerAvis($produit) {
        $idProduit = $produit->idproduit;
        $client = $_SESSION['client'];
        if($client) {
            $commandesCLients = $client -> getCommande();
            $produitsCommandes = collect();

            foreach ($commandesCLients as $commande) {
                $detailsCommande = DetailCommande::where('idcommande', $commande->idcommande)->get();
                $produitsCommandes = $produitsCommandes->merge($detailsCommande);

            }
            $produitsCommandes = $produitsCommandes->unique('idproduit');
            if ($produitsCommandes->contains('idproduit', $idProduit)) {
                echo "<button id='button-depose-avis'>Déposer un avis</button>";
            }
        }
    }

    public function addAvis(Request $request)
    {
        try {
            $idClient = $_SESSION['client']->idclient;
            $idProduit = $request->input('idProduit');


            $avisExistant = DB::table('avisproduit')->where('idclient', $idClient)->where('idproduit', $idProduit)->first();

            if ($avisExistant) {
                return response()->json(['success' => false, 'message' => 'Vous avez déjà déposé un avis sur ce produit.'], 400);
            }

            //Insert Avis
            $idAvis = DB::table('avisproduit')->insertGetId([
                'idproduit' => $idProduit,
                'idclient' => $idClient,
                'noteavis' => $request->input('note'),
                'dateavis' => date('Y-m-d'),
                'commentaireavis' => $request->input('description'),
                'reponsemiliboo' => null,
                'nomavis' => $request->input('titre')
            ], 'idavis');

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = "avis{$idAvis}_" . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('img/imagesavis'), $filename);

                    // Insert Photo
                    $idPhoto = DB::table('photo')->insertGetId([
                        'sourcephoto' => "imagesavis/" . $filename,
                        'descriptionphoto' => "Photo avis {$idAvis}"
                    ], 'idphoto');

                    // Insert Photoavis
                    DB::table('photoavis')->insert([
                        'idavis' => $idAvis,
                        'idphoto' => $idPhoto
                    ]);
                }
            }

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Error in storeAvis:', ['message' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Une erreur serveur est survenue.'], 500);
        }
    }
    /**
     * Ajoute le produit like par le client dans la table a_aimer
     * Redirige vers la page de connexion si le client n'est pas connecté
     **/
    public function toggleLike(Request $request)
    {
        if (!$_SESSION['client']) {
            return response()->json(['redirection' => true]);
        }

        $client = $_SESSION['client'];
        $idClient = $client->idclient;
        $idProduit = $request->input('idProduit');
        $liked = $request->input('liked');

        $likeExistant = A_aimer::where('idclient', $idClient)->where('idproduit', $idProduit)->first();

        if ($liked && !$likeExistant) {
            Log::info("Insert like client $idClient produit $idProduit");
            DB::table('a_aimer')->insert([
                'idclient' => $idClient,
                'idproduit' => $idProduit
            ]);
        }
        elseif (!$liked && $likeExistant) {
            Log::info("Delete like client $idClient produit $idProduit");
            DB::table('a_aimer')
                ->where('idclient', $idClient)
                ->where('idproduit', $idProduit)
                ->delete();
        }
        return response()->json(['success' => true, 'statutLike' => $liked]);
    }

    public function repondreAvis(Request $request)
    {
        try {
            if (!isset($_SESSION['admin'])) {
                return response()->json(['success' => false, 'message' => 'Accès non autorisé.'], 403);
            }

            $request->validate([
                'idavis' => 'required|integer',
                'reponse' => 'required|string',
            ]);

            $avis = AvisProduit::find($request->input('idavis'));
            if (!$avis) {
                return response()->json(['success' => false, 'message' => 'Avis non trouvé.'], 404);
            }

            $avis->reponsemiliboo = $request->input('reponse');
            $avis->save();

            return response()->json(['success' => true, 'message' => 'Réponse enregistrée avec succès.']);

        } catch (\Exception $e) {
            Log::error('Erreur lors de la réponse à l\'avis : ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue.'], 500);
    }
}
}
