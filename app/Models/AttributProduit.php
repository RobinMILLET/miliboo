<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributProduit extends Model
{
    use HasFactory;
    protected $table = "attributproduit";
    protected $primaryKey = "idattribut";
    public $timestamps = false;

    /** 
     * Renvoie les ValeursAttributs associées à l'attribut
     * @return Collection<ValeurAttribut>
    **/
    public function getValeurAttribut() {
        return $this->hasMany(ValeurAttribut::class, 'idattribut', 'idattribut')->get();
    }
}
