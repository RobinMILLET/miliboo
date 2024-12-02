<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributProduit extends Model
{
    protected $table = "attributproduit";
    protected $primaryKey = "idattribut";
    public $timestamps = false;

    public function getValeurAttributs() {
        return $this->hasMany(ValeurAttribut::class, 'idattribut', 'idattribut')->get();
    }
}
