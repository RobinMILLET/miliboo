<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCommande extends Model
{
    use HasFactory;
    protected $table = "detailcommande";
    protected $primaryKey = null;
    public $timestamps = false;

    public function getProduit(){
        return $this->hasMany(Produit::class, 'idproduit', 'idproduit')->get(); //toFix
    }

    public function getColoration(){
        return $this->belongsTo(Coloration::class, ['idproduit', 'idcouleur'], ['idproduit', 'idcouleur'])->get(); // toFix
    }

    public function completeArray() {
        return [
            "nomProduit" => Produit::find($this->idproduit)->nomproduit,
            "nomCouleur" => Couleur::find($this->idcouleur)->nomcouleur,
            "quantiteCommande" => $this->quantitecommande,
        ];
    }
}
