<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\TypeProduit;
use App\Models\CategorieProduit;
use App\Models\Coloration;
use App\Models\RegroupementProduit;
use App\Models\ProduitSimilaire;

class RechercheController extends Controller
{
    public static function produitsVisibles($produits)
    {
        $visible = [];
        foreach ($produits as $produit) {
            foreach ($produit->getColoration() as $coloration) {
                if ($coloration->estvisible) {
                    $visible[] = $produit;
                    break;
                }
            }
        }
        return $visible;
    }

    public static function triParPrixMin($produits)
    {
        usort($produits, function ($a, $b) {
            $colorationMinA = $a->colorationPrixMin();
            $colorationMinB = $b->colorationPrixMin();
            $prixA = (!$colorationMinA->prixsolde) ? (float)$colorationMinA->prixvente :
                min((float)$colorationMinA->prixvente, (float)$colorationMinA->prixsolde);
            $prixB = (!$colorationMinB->prixsolde) ? (float)$colorationMinB->prixvente :
                min((float)$colorationMinB->prixvente, (float)$colorationMinB->prixsolde);
            return $prixA - $prixB;
        });
        return $produits;
    }

    public static function triParPrixMax($produits)
    {
        usort($produits, function ($a, $b) {
            $colorationMaxA = $a->colorationPrixMax();
            $colorationMaxB = $b->colorationPrixMax();
            $prixA = (!$colorationMaxA->prixsolde) ? (float)$colorationMaxA->prixvente :
                max((float)$colorationMaxA->prixvente, (float)$colorationMaxA->prixsolde);
            $prixB = (!$colorationMaxB->prixsolde) ? (float)$colorationMaxB->prixvente :
                max((float)$colorationMaxB->prixvente, (float)$colorationMaxB->prixsolde);
            return $prixB - $prixA;
        });
        return $produits;
    }

    public static function triParNom($produits)
    {
        usort($produits, function ($a, $b) {
            return strcmp($a->nomproduit, $b->nomproduit);
        });
        return $produits;
    }

    public static function triParMotClef($produits, $motclef)
    {
        $motclef = Produit::formatMotClef($motclef);
        // Affectation d'un indiceMotClef pour chaque produit
        $minIndice = PHP_INT_MAX; $maxIndice = 0;
        foreach ($produits as $produit) {
            $indice = $produit->triParMotClef($motclef);
            if ($indice < $minIndice) $minIndice = $indice;
            if ($indice > $maxIndice) $maxIndice = $indice;
            $produit->indiceMotClef = $indice;
        }
        // Filtrage des produits par correspondance
        $avgIndice = ($minIndice + $maxIndice)/3;
        // uniquement les produits dont l'indice est en dessous de la moyenne
        $produits = array_filter($produits, function ($produit) use ($avgIndice) {
            return $produit->indiceMotClef <= $avgIndice;
        });
        // Tri en fonction de indiceMotClef
        usort($produits, function ($a, $b) {
            return $a->indiceMotClef - $b->indiceMotClef;
        });
        return $produits;
    }

    public static function recherche($produits = null)
    {
        // Par défaut, recherche dans tous les produits
        if (!$produits) $produits = Produit::all();
        // Retire les produits avec 0 colorations visibles
        $produits = self::produitsVisibles($produits);
        $tri = $_GET["tri"] ?? null;
        $motclef = $_GET["motclef"] ?? null;
        if ($motclef) {
            // Si motclef présent, utiliser pour tri
            $produits = self::triParMotClef($produits, $motclef);
        }
        // Si tri présent, overide tri motclef (qui agis uniquement comme un filtre)
        switch ($tri) {
            case "nom":
                $produits = self::triParNom($produits);
                break;
            case "min":
                $produits = self::triParPrixMin($produits);
                break;
            case "max":
                $produits = self::triParPrixMax($produits);
                break;
            default:
                break; // Par défaut, il n'y a aucun tri appliqué (ordre du SGBD)
        }
        return $produits;
    }

    public static function filtre($produits, $valeursActives) {
        if (!$valeursActives) return $produits;
        $produits = array_filter($produits, function ($produit) use ($valeursActives) {
            return $produit->filtre($valeursActives);
        });
        return $produits;
    }

    public function index()
    {
        return view("rechercheProduit", [
            'produits' => self::recherche()
        ]);
    }

    public static function rechercheParCategorie($idTypeProduit)
    {
        $typeProduit = TypeProduit::with("getProduit")->find($idTypeProduit);
        // Collection vide par défaut
        if (!$typeProduit) return collect();
        $produits = $typeProduit->getProduit;
        if ($produits->isEmpty()) return collect();
        return $produits;
    }

    public function showByCategory($idTypeProduit)
    {
        $produits = self::rechercheParCategorie($idTypeProduit);
        $typeProduit = TypeProduit::find($idTypeProduit);
        return view('rechercheProduit', [
            'produits' => self::recherche($produits),
            'typeProduit' => $typeProduit
        ]);
    }

    public function showByCategoryMere($idCategorieMere)
    {
        $categorieFilles = CategorieProduit::findCategoryFilles($idCategorieMere);
        $typeProduits = $categorieFilles->map(function ($categorieFille) {
            return $categorieFille->getTypeProduit();
        });

        $typeProduits = $typeProduits->filter();
        $produits = collect();

        foreach ($typeProduits as $typeProduit) {
            $produits = $produits->merge(self::rechercheParCategorie($typeProduit->idtypeproduit));  // Using idtypeproduit to pass to the method
        };

        
        return view('rechercheProduit', [
            'produits' => self::recherche($produits)
        ]);
    }

    public function showByRegroupement($idRegroupement)
    {
        if ($idRegroupement == 3) { // madeinfrance
            $produits = Produit::all()->where("idpays", "=", 1);
        }
        else {
            if ($idRegroupement == 2) { // promotion
                $details = Coloration::all()->where("estvisible")->whereNotNull("prixsolde");
            }
            else {
                $regroupement = RegroupementProduit::find($idRegroupement);
                $details = $regroupement->getDetailRegroupement();
            }
            $produits = collect();
            foreach ($details as $detail ) {
                $produit = $detail->getProduit();
                $produits = $produits->push($produit);
            }
            $produits = $produits->unique('idproduit');
        }
        
        return view('rechercheProduit', [
            'produits' => self::recherche($produits)
        ]);
    }

}
