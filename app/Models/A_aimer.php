<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class A_aimer extends Model
{
    use HasFactory;
    protected $table = 'a_aimer';
    protected $primaryKey = 'idclient';
    public $timestamps = false;
    
    //IMPORTANT POUR LES INSERTS
    protected $fillable = ['idclient', 'idproduit'];

    public function getProduit()
    {
        return $this->belongsTo(Produit::class, 'idproduit', 'idproduit')->get()->firstOrFail();
    }

    public function getClient()
    {
        return $this->belongsTo(Client::class, 'idclient', 'idclient')->get();
    }
}
