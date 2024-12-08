<?php

namespace App\Models;

use DateInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Generator\StringManipulation\Pass\Pass;

class Produit extends Model
{
    use HasFactory;
    protected $table = "produit";
    protected $primaryKey = "idproduit";
    public $timestamps = false;

    private static $IGNOREMOTCLEF = [
        "dans", "par", "pour", "vers", "avec", "sans", "sur", "sous", "aux",  "des", "les"
    ];

    /**
     * Renvoie les couleurs disponibles pour ce produit
     * @return Collection<Couleur>
    **/
    public function getCouleur()
    {
        return $this->hasManyThrough(
            Couleur::class, 
            Coloration::class, 
            'idproduit', 
            'idcouleur', 
            'idproduit', 
            'idcouleur'  
        )->get();
    }

    /**
     * Renvoie les colorations liées à ce produit
     * @return Collection<Coloration>
    **/
    public function getColoration() {
        return $this->hasMany(Coloration::class ,'idproduit', 'idproduit')->get();
    }

    /**
     * Renvoie les avis portants sur ce produit
     * @return Collection<AvisProduit>
    **/
    public function getAvis() {
        return $this->hasMany(AvisProduit::class ,'idproduit', 'idproduit')->get();
    }

    /**
     * Renvoie le typeproduit de ce produit
     * @return TypeProduit
    **/
    public function getTypeProduit() {
        return $this->belongsTo(TypeProduit::class, 'idtypeproduit', 'idtypeproduit')->get()->firstOrFail();
    }

    /**
     * Renvoie les attributs de ce produit
     * @return Collection<AttributProduit>
    **/     
    public function getValeurAttribut() {
        return $this->hasMany(ValeurAttribut::class, 'idproduit', 'idproduit')->get();
    }

    
    public function colorationPrixMin($seulementVisibles = true) {
        $minPrice = PHP_INT_MAX;
        $colorationPrincipale = null;
        foreach ($this->getColoration() as $coloration) {
            if ($seulementVisibles && !$coloration->estvisible) continue;
            $prixVente = $coloration->prixvente;
            if ($prixVente && (float)$prixVente < $minPrice) {
                $minPrice = (float)$prixVente;
                $colorationPrincipale = $coloration;
            }
            $prixSolde = $coloration->prixsolde;
            if ($prixSolde && (float)$prixSolde  < $minPrice) {
                $minPrice = (float)$prixSolde;
                $colorationPrincipale = $coloration;
            }
        }
        return $colorationPrincipale;
    }

    public function colorationPrixMax($seulementVisibles = true) {
        $maxPrice = PHP_INT_MIN;
        $colorationPrincipale = null;
        foreach ($this->getColoration() as $coloration) {
            if ($seulementVisibles && !$coloration->estvisible) continue;
            $prixVente = $coloration->prixvente;
            if ($prixVente && (float)$prixVente > $maxPrice) {
                $maxPrice = (float)$prixVente;
                $colorationPrincipale = $coloration;
            }
            $prixSolde = $coloration->prixsolde;
            if ($prixSolde && (float)$prixSolde  > $maxPrice) {
                $maxPrice = (float)$prixSolde;
                $colorationPrincipale = $coloration;
            }
        }
        return $colorationPrincipale;
    }
             
    public function afficheRecherche($affichePrixMin = true, $valeursActives = null)
    {
        // Itération à travers les colorations pour trouver la moins cher
        $colorationPrincipale = $affichePrixMin ?
            $this->colorationPrixMin() :
            $this->colorationPrixMax();

        // Récupération d'une photo
        $photos = $colorationPrincipale->getPhoto();
        if ($photos) {
            $source = $photos[0]->sourcephoto;
            $desc = $photos[0]->descriptionphoto;
        } // Si pas de photo, on prend la photo par défaut
        else {
            $source = "PLACEHOLDER.png";
            $desc = "Image par défaut";
        }

        // Nombre et moyenne des avis
        $avis = $this->getAvis();
        $nbAvis = $avis->count();
        $sumNote = 0;
        foreach ($avis as $avisProduit) {
            $sumNote += (int)$avisProduit->noteavis;
        }
        $avgNote = $nbAvis > 0 ? $sumNote / (float)$nbAvis : null;
        $stars = ["☆☆☆☆", "★☆☆☆", "★★☆☆", "★★★☆", "★★★★"];

        // Couleurs disponibles
        $couleurs = $this->getCouleur(); // NE PREND PAS EN COMPTE Coloration.estVisible
        $rgbArray = [];
        foreach ($couleurs as $couleur) {
            $rgbArray[] = $couleur->rgbcouleur;
        }

        /* CRÉATION DE L'AFFICHAGE
        <div class='produit'>
            <img src='SOURCEPHOTO.EXT'>
            <h3>NOMPRODUIT</h3>
            <p><span>TXT_EXPEDITION</span><span>NB_ETOILES<span class='smalltext'>(NBAVIS)</span></span></p>
            <p><span>PRIXACTUEL €</span><s><span>PRIXINIT €</span></s><span class='reduc'>REDUC</span></p>
            <div class='circles'>
                <div style='background-color:#HEX1'></div>
                <div style='background-color:#HEX2'></div>
                <div style='background-color:#HEX3'></div>
                <p>+ 4</p>
            </div>
        </div>
        */

        // Image et nom
        $img = "<img src='/img/$source' alt='$desc'>";
        $nomProduit = "<h3>".$this->nomproduit."</h3>";

        // Ligne 1 : expedition, note moyenne et nbAvis
        $expedition = "<span class='span-delai'>Expédié sous ".substr($this->delailivraison, 0, 2)."h</span>";
        if ($nbAvis) {
            $avisProduit = "<span>".$stars[(int)$avgNote]."<span class='smalltext'>($nbAvis)</span></span>";
        }
        else { $avisProduit = "<span>Aucun avis</span>"; }
        $ligne1 = "<p class='p-produit avis'>$expedition$avisProduit</p>";

        // Ligne 2 : Prix (soldé et/ou initial) / réduction
        if ($colorationPrincipale->prixsolde) {
            $prixActuel = "<span class='span-prix-solde'>".$colorationPrincipale->prixsolde." €</span>";
            $prixInitial = "<s><span class='span-prix-vente'>".$colorationPrincipale->prixvente." €</span></s>";
            
            $reduction = "<span class='reduc'>-".round($colorationPrincipale->getReduc(), 0)."%</span>";
            $ligne2 = "<p class='p-produit'>$prixActuel$prixInitial$reduction</p>";
        }
        else { $ligne2 = "<p class='p-produit'><span>".$colorationPrincipale->prixvente." €</span></p>"; }

        // Couleurs disponibles
        $NB_COULEURS_AFFICHEES = 4;
        $bonusRgb = (count($rgbArray) <= $NB_COULEURS_AFFICHEES) ? "" : 
            "<p> +".count($rgbArray) - $NB_COULEURS_AFFICHEES."</p>";
        $circles = [];
        foreach (array_slice($rgbArray, 0, $NB_COULEURS_AFFICHEES) as $rgb) {
            $circles[] = "<div style='background-color:#$rgb'></div>";
        }
        $divCircles = "<div class='circles'>".join("", $circles).$bonusRgb."</div>";

        // Fin
        $div = "<div class='produit'>$img$nomProduit$ligne1$ligne2$divCircles</div>";

        //Modif Victor pour clean l'URL avec coloration
        $urlProduitColoration = "idproduit" . $this->idproduit . "/coloration" . $colorationPrincipale->idcouleur; 
        return "<a href='/produit/".$urlProduitColoration."'>$div</a>";
    }

    public static function formatMotClef($motclef) {
        // Retire les accents, met en minuscule, et retire la ponctuation
        $motclef = strtr($motclef, 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
        $motclef = strtolower($motclef);
        $allow = "abcdefghijklmnopqrstuvwxyz0123456789 ";
        $motclef = preg_replace("/[^$allow]/", "", $motclef);
        // Sépare le mot clef avec espaces en liste de mots indiviuels
        if (strpos($motclef, " ")) {
            return explode(" ", $motclef);
        }
        return $motclef;
    }

    public function triParMotClef($motclef) {
        $nom = self::formatMotClef($this->nomproduit);
        return self::compare($nom, $motclef);
    }

    public static function compare($a, $b) {
        // Si un paramètre est un array, retourner la somme de leur indice de comparaison
        if (gettype($a) == "array") {
            $indices = [];
            foreach ($a as $element) {
                $indices[] = self::compare($element, $b);
            }
            return min($indices);
        }
        if (gettype($b) == "array") {
            $indices = [];
            foreach ($b as $element) {
                $indices[] = self::compare($a, $element);
            }
            return min($indices);
        }
        else { // LES COEFFICIENTS SONT MODIFIABLES EN TÊTE DE CLASSE
            // On ignore certains caractères et prépositions
            if (in_array($a, self::$IGNOREMOTCLEF) ||
                in_array($b, self::$IGNOREMOTCLEF) ||
                strlen($a) <= 2 || strlen($b) <= 2) return PHP_INT_MAX;
            return levenshtein($a, $b);
        }
        
    }

    //TEST AFFICHAGE NOTE DANS LE DETAIL PRODUIT VICTOR // CODE DE ROBIN
    // Fonctionne, peut etre utilise pour refactor le code de recherche car doublon
    public function affficheNote() {
        $avis = $this->getAvis();
        $nbAvis = $avis->count();
        
        $sumNote = 0;
        foreach ($avis as $avisProduit) {
            $sumNote += (int)$avisProduit->noteavis;
        }
        $avgNote = $nbAvis > 0 ? $sumNote / (float)$nbAvis : null;
        $stars = ["☆☆☆☆", "★☆☆☆", "★★☆☆", "★★★☆", "★★★★"];
        if ($nbAvis) {
            $avisProduit = "<span>".$stars[(int)$avgNote]."<span class='smalltext'></span></span>";
        }
        else { $avisProduit = "<span>Aucun avis</span>"; }


        return [
            'nbAvis' => $nbAvis,
            'noteMoy' => $avgNote,
            'noteEtoiles' => $avisProduit
        ];
    }

    public function filtre($valeursActives) {
        if (!$valeursActives) return true; // Si pas de filtre, check ok automatique
        $valeursProduit = $this->getValeurAttribut();
        foreach ($valeursProduit as $valProd) {
            // On passe le check si la valeur ne correspond pas aux ValeursActives
            if (!in_array($valProd->idattribut, array_keys($valeursActives))) continue;
            foreach ($valeursActives[$valProd->idattribut] as $valeur) {
                if ($valProd->valeur == $valeur) {
                    return true;
                }
            }
        }
        return false;
    }

}

