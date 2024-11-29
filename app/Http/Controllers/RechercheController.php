<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\TypeProduit;

class RechercheController extends Controller
{
    public static function produitsVisibles($produits) {
        $visible = [];
        foreach ($produits as $produit) {
            foreach ($produit->getColorations() as $coloration) {
                if ($coloration->estvisible) {
                    $visible[] = $produit;
                    break;
                }
            }
        }
        return $visible;
    }

    public static function triParPrixMin($produits) {
        usort($produits, function($a, $b) {
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

    public static function triParPrixMax($produits) {
        usort($produits, function($a, $b) {
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

    public static function triParNom($produits) {
        usort($produits, function($a, $b) {
            return strcmp($a->nomproduit, $b->nomproduit);
        });
        return $produits;
    }

    public static function triParMotClef($produits, $motclef) {
        $motclef = Produit::formatMotClef($motclef);
        foreach ($produits as $produit) {
            $indice = $produit->triParMotClef($motclef);
            $produit->indiceMotClef = $indice;
        }
        $produits = array_filter($produits, function($produit) {
            return $produit->indiceMotClef > 0;
        });
        usort($produits, function($a, $b) {
            return $b->indiceMotClef - $a->indiceMotClef;
        });
        return $produits;
    }

    public static function recherche($produits = null) {
        if (!$produits) $produits = Produit::all();
        $produits = self::produitsVisibles($produits);
        $tri = $_GET["tri"] ?? null;
        $motclef = $_GET["motclef"] ?? null;
        if ($motclef) {
            $produits = self::triParMotClef($produits, $motclef);
        }
        switch ($tri) {
            case "nom": $produits = self::triParNom($produits); break;
            case "min": $produits = self::triParPrixMin($produits); break;
            case "max": $produits = self::triParPrixMax($produits); break;
            default: break;
        }
        return $produits;
    }

    public function index(){
    	return view ("rechercheProduit", [
            'produits'=>self::recherche()
        ]);
    }

    public static function rechercheParCategorie($idTypeProduit) {
        $typeProduit = TypeProduit::with("getProduit")->find($idTypeProduit);
        if (!$typeProduit) {
            return collect();
        }
        $produits = $typeProduit->getProduit;

        if ($produits->isEmpty()) {
            return collect();
        }

        $produits = self::produitsVisibles($produits);
        return $produits;
    }

    public function showByCategory($idTypeProduit) {
        $produits = self::rechercheParCategorie($idTypeProduit);
        $typeProduit = TypeProduit::find($idTypeProduit);
        return view('rechercheProduit', [
            'produits' => self::recherche($produits),
            'nomTypeProduit' => $typeProduit -> nomtypeproduit
        ]);
    }
}
