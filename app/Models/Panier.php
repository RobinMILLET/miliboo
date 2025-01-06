<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $table = "panier";
    protected $primaryKey = "idpanier";
    public $timestamps = false;

    public function getDetailPanier() {
        return $this->hasMany(DetailPanier::class, 'idpanier', 'idpanier')->get();
    }

    public function anonym() {
        $this->getDetailPanier()->map->delete();
    }
}
