<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduit extends Model
{
    use HasFactory;
    protected $table = "typeproduit";
    protected $primaryKey = "idtypeproduit";
    public $timestamps = false;

    /**
     * Renvoie les produits ayant ce type
     * @return Collection<Produit>
    **/
    public function getProduit(){
        return $this->hasMany(Produit::class, 'idtypeproduit', 'idtypeproduit');
    }

    /**
     * Renvoie les attribus liés à ce type
     * @return Collection<AttributProdui>
    **/
    public function getAttributProduit() {
        return $this->hasMany(AttributProduit::class, 'idtypeproduit', 'idtypeproduit')->get();
    }

    /**
     * Renvoie la catégorie parente de ce type
     * @return CategorieProduit
    **/
    public function getCategorie() {
        return $this->belongsTo(CategorieProduit::class, 'idcategorie', 'idcategorie')->get()->firstOrFail();
    }
}
