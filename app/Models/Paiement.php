<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $table = 'paiement';
    protected $primaryKey = 'idcommande';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['idcommande', 'idcartebancaire', 'idtypepaiement', 'datepaiement', 'montantpaiement', 'indicepaiement'];


    public function getTypePaiement() {
        return $this->hasOne(TypePaiement::class, 'idtypepaiement', 'idtypepaiement')->get()->first();
    }

    public function completeArray() {
        return [
            "datePaiement" => $this->datepaiement,
            "montantPaiement" => $this->montantpaiement,
            "indicePaiement" => $this->indicepaiement,
            "typePaiement" => $this->getTypePaiement()->nomtypepaiement
        ];
    }
}
