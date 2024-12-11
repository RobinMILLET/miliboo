<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class A_aimer extends Model
{
    use HasFactory;
    protected $table = 'a_aimer';
    protected $primaryKey = null;
    public $timestamps = false;

    public function getProduit()
    {
        return $this->hasMany(Produit::class, 'idproduit', 'idproduit')->get();
    }

    public function getClient()
    {
        return $this->belongsTo(Client::class, 'idclient', 'idclient')->get();
    }
}
