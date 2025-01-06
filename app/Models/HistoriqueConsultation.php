<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueConsultation extends Model
{
    use HasFactory;
    protected $table = "historiqueconsultation";
    protected $primaryKey = "idclient";
    public $timestamps = false;

    public function getProduit() {
        return $this->belongsTo(Produit::class, 'idproduit', 'idproduit')->get()->first();
    }

    public function completeArray() {
        return [
            "produitConsulté" => $this->getProduit()->nomproduit,
            "dateConsultation" => $this->dateconsultation
        ];
    }
}
