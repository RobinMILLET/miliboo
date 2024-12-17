<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = "commande";
    protected $primaryKey = "idcommande";
    public $timestamps = false;


    public function getPaiement(){
        return $this->hasOne(Paiement::class, 'idcommande', 'idcommande')->get()->first();
    }

    public function getStatut(){
        return $this->belongsTo(StatutCommande::class, 'idstatutcommande', 'idstatutcommande')->get()->first();
    }

    public function getDetailCommande(){
        return $this->hasMany(DetailCommande::class, 'idcommande', 'idcommande')->get();
    }
    public function getAdresse(){
        return $this->belongsTo(Adresse::class, 'idadresse', 'idadresse')->get()->first();
    }
    public function getAdresseFacturation(){
        return $this->belongsTo(Adresse::class, 'idadressefact', 'idadresse')->get()->first();
    }
    public function getClient(){
        return $this->belongsTo(Client::class, 'idclient', 'idclient')->get()->first();
    }
}
