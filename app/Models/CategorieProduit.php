<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieProduit extends Model
{
    use HasFactory;
    protected $table = 'categorieproduit';
    protected $primaryKey = 'idcategorie';
    public $timestamps = false;

    /**
     * Renvoie les catégories appartenant à la catégorie spécifiée
     * @param int|CategorieProduit $categorieMere
     * @return Collection<CategorieProduit>
    **/
    public static function findCategoryFilles($categorieMere) {
        if (!gettype($categorieMere)=="int") $categorieMere = $categorieMere->idcategorie;
        return self::where('cat_idcategorie', $categorieMere)->get();
    }

    /**
     * Renvoie le type de produit associé à cette catégorie
     * @return TypeProduit
    **/
    public function getTypeProduit() {
        return $this->belongsTo(TypeProduit::class, 'idcategorie')->get()->firstOrFail();
    }
}
