<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegroupementProduit extends Model
{
    use HasFactory;
    protected $table = "regroupementproduit";
    protected $primaryKey = "idregroupement";
    public $timestamps = false;


    /**
     * Renvoie les détails du regroupement
     * @return Collection<DetailRegroupement>
    **/
    public function getDetailRegroupement() {
        return $this->hasMany(DetailRegroupement::class, 'idregroupement')->get();
    }
}
