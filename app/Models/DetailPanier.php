<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPanier extends Model
{
    use HasFactory;
    protected $table = "detailpanier";
    protected $primaryKey = ["idpanier", "idproduit", "idcouleur"];
    public $timestamps = false;

    public function getColoration() {
        return $this->belongsTo(Coloration::class, 'idproduit', 'idproduit')
        ->where("idcouleur", "=", $this->idcouleur)->get()->firstOrFail();
    }

    public function completeArray() {
        return [
            "produit" => $this->getColoration()->getProduit()->nomproduit,
            "couleur" => $this->getColoration()->getCouleur()->nomcouleur,
            "quantitePanier" => $this->quantitepanier
        ];
    }
}
