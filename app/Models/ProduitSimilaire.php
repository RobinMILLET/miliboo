<?php

namespace App\Models;

use App\Http\Controllers\RechercheController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitSimilaire extends Model
{
    use HasFactory;
    protected $table = "produitsimilaire";
    protected $primaryKey = null;
    public $timestamps = false;

    public function getProduit(){
        return $this->belongsTo(Produit::class, 'idproduit', 'idproduit')->get();
    }
/*
    public function getProduit() {
           return $this->belongsTo(Produit::class ,'idproduit', 'idproduit')->get()->firstOrFail();
       }
*/
}
