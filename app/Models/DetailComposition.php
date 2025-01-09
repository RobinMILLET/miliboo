<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coloration;

class DetailComposition extends Model
{
    use HasFactory;
    protected $table = 'detailcomposition';
    protected $primaryKey = 'idcomposition';
    public $timestamp = false;

    public function getColoration(){
        // return $this->belongsToMany(Coloration::class, 'idproduit','idproduit','idcouleur', 'idcouleur')->get();
        return Coloration::where([
            ['idproduit', '=', $this->idproduit],
            ['idcouleur', '=', $this->idcouleur]
        ])->get()->first();
    }

    public function getProduit() {
        return Produit::find($this->idproduit);
    }

    public function stock() {
        return intdiv($this->getColoration()->quantitestock,$this->quantitecomposition);
    }
}
