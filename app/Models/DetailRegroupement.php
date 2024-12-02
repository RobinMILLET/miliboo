<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRegroupement extends Model
{
    use HasFactory;
    protected $table = "detailregroupement";
    protected $primaryKey = null;
    public $timestamps = false;

    public function getColorations() {
        return $this->hasMany(Coloration::class ,'idproduit', 'idproduit')->where('idcouleur', '=', $this->idcouleur)->get();
    }

    public function getProduits() {
        return $this->belongsTo(Produit::class, 'idproduit', 'idproduit')->get();
    }
}
