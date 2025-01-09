<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCommande extends Model
{
    use HasFactory;
    protected $table = "detailcommande";
    protected $primaryKey = "idcommande";
    public $timestamps = false;
    protected $fillable = ['idcommande', 'idproduit', 'idcouleur', 'quantitecommande'];

    public function getProduit(){
        return $this->hasone(Produit::class, 'idproduit', 'idproduit')->get()->first();
    }

    public function getColoration(){
        return $this->belongsTo(Coloration::class, ['idproduit', 'idcouleur'], ['idproduit', 'idcouleur'])->get()->first();
    }

    public function completeArray() {
        return [
            "nomProduit" => Produit::find($this->idproduit)->nomproduit,
            "nomCouleur" => Couleur::find($this->idcouleur)->nomcouleur,
            "quantiteCommande" => $this->quantitecommande,
        ];
    }
}
