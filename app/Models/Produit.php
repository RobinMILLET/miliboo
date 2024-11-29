<?php

namespace App\Models;

use DateInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produit extends Model
{
    use HasFactory;
    protected $table = "produit";
    protected $primaryKey = "idproduit";
    public $timestamps = false;

    private static $COEFMOTCLEF = [
        "isequal" => 10,
        "startswith" => 5,
        "contains" => 1,
        "notfound" => 0
    ];
    private static $IGNOREMOTCLEF = [
        "a", "dans", "par", "pour", "en", "vers", "avec", "de", "sans", "sur", "sous",
        "au", "aux", "du", "des", "le", "les", "la"
    ];

    //TEST VICTOR
    protected $fillable = [
        'nomproduit',
        'idtypeproduit',
        'idpays',
        'sourcenotice',
        'sourceaspecttechnique',
        'delailivraison',
        'coutlivraison',
        'nbpaiementmax',
    ];

    public function getCouleurs()
    {
        return $this->hasManyThrough(
            Couleur::class, 
            Coloration::class, 
            'idproduit', // Foreign key on Coloration table
            'idcouleur', // Foreign key on Couleur table
            'idproduit', // Local key on Produit table
            'idcouleur'  // Local key on Coloration table
        );
    }

    public function getProduit()
    {
        return $this->belongsTo(Produit::class, 'idproduit', 'idproduit')->get();
    }

    public function getColorations() {
        return $this->hasMany(Coloration::class ,'idproduit', 'idproduit')->get();
    }

    public function getAvis() {
        return $this->hasMany(AvisProduit::class ,'idproduit', 'idproduit')->get();
    }

    public function getTypeProduit() {
        return $this->belongsTo(TypeProduit::class, 'idtypeproduit', 'idtypeproduit')->get();
    }
    
    public function colorationPrixMin($seulementVisibles = true) {
        $minPrice = PHP_INT_MAX;
        $colorationPrincipale = null;
        foreach ($this->getColorations() as $coloration) {
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
        foreach ($this->getColorations() as $coloration) {
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
                

    public function afficheRecherche($affichePrixMin = true)
    {
        // Itération à travers les colorations pour trouver la moins cher
        $colorationPrincipale = $affichePrixMin ?
            $this->colorationPrixMin() :
            $this->colorationPrixMax();

        // Récupération d'une photo
        $photos = $colorationPrincipale->getPhotos();
        if ($photos) {
            $source = $photos[0]->sourcephoto;
        } // Si pas de photo, on prend la photo par défaut
        else { $source = "PLACEHOLDER.PNG"; }

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
        $couleurs = $this->getCouleurs()->where('estvisible', '=', true)->get();
        $rgbArray = [];
        foreach ($couleurs as $couleur) {
            $rgbArray[] = $couleur->rgbcouleur;
        }

        /* CRÉATION DE L'AFFICHAGE
        <div class='produit'>
            <img src='SOURCEPHOTO.EXT'>
            <h3>NOMPRODUIT</h3>
            <p><span>TXT_EXPEDITION</span><span>NB_ETOILES<span class='small'>(NBAVIS)</span></span></p>
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
        $img = "<img src='$source'>";
        $nomProduit = "<h3>".$this->nomproduit."</h3>";

        // Ligne 1 : expedition, note moyenne et nbAvis
        $expedition = "<span>Expédié sous ".substr($this->delailivraison, 0, 2)."h</span>";
        if ($nbAvis) {
            $avisProduit = "<span>".$stars[(int)$avgNote]."<span class='smalltext'>($nbAvis)</span></span>";
        }
        else { $avisProduit = "<span>Aucun avis</span>"; }
        $ligne1 = "<p>$expedition$avisProduit</p>";

        // Ligne 2 : Prix (soldé et/ou initial) / réduction
        if ($colorationPrincipale->prixsolde) {
            $prixActuel = "<span>".$colorationPrincipale->prixsolde." €</span>";
            $prixInitial = "<s><span>".$colorationPrincipale->prixvente." €</span></s>";
            $reduc = 100*((float)$colorationPrincipale->prixvente
                - (float)$colorationPrincipale->prixsolde)
                / (float)$colorationPrincipale->prixvente;
            $reduction = "<span class='reduc'>-".round($reduc, 0)."%</span>";
            $ligne2 = "<p>$prixActuel$prixInitial$reduction</p>";
        }
        else { $ligne2 = "<p><span>".$colorationPrincipale->prixvente." €</span></p>"; }

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
        return "<a href='/produit/idproduit".$this->idproduit."'>$div</a>";
    }

    public static function formatMotClef($motclef) {
        $motclef = strtr($motclef, 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
        $motclef = strtolower($motclef);
        $allow = "abcdefghijklmnopqrstuvwxyz0123456789 ";
        $motclef = preg_replace("/[^$allow]/", "", $motclef);
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
        if (gettype($a) == "array") {
            $sum = 0;
            foreach ($a as $element) {
                $sum += self::compare($element, $b);
            }
            return $sum;
        }
        if (gettype($b) == "array") {
            $sum = 0;
            foreach ($b as $element) {
                $sum += self::compare($a, $element);
            }
            return $sum;
        }
        else {
            if (in_array($a, self::$IGNOREMOTCLEF) ||
                in_array($b, self::$IGNOREMOTCLEF) ||
                strlen($a) < 2 || strlen($b) < 2) return 0;
            if ($a == $b) {
                return self::$COEFMOTCLEF["isequal"];
            }
            if (str_starts_with($a, $b)) {
                return self::$COEFMOTCLEF["startswith"];
            }
            if (str_contains($a, $b)) {
                return self::$COEFMOTCLEF["contains"];
            }
            return self::$COEFMOTCLEF["notfound"];
        }
        
    }
}
