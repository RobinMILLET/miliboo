<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRegroupement extends Model
{
    use HasFactory;
    protected $table = "detailregroupement";
    protected $primaryKey = 'idregroupement';
    public $timestamps = false;

    /**
     * Renvoie la coloration liée à ce détail
     * @return Coloration
    **/
    public function getColorations() {
        return $this->hasMany(Coloration::class ,'idproduit', 'idproduit')->where('idcouleur', '=', $this->idcouleur)->get()->firstOrFail();
    }

    /**
     * Renvoie le produit lié à ce détail
     * @return Produit
    **/
    public function getProduit() {
        return $this->belongsTo(Produit::class, 'idproduit', 'idproduit')->get()->firstOrFail();
    }

    /**
     * Renvoie le regroupement lié à ce détail
     * @return RegroupementProduit
    **/
    public function getRegroupement() {
        return $this->belongsTo(RegroupementProduit::class, 'idregroupement', 'idregroupement')->get()->firstOrFail();
    }
}
