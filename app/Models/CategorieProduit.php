<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieProduit extends Model
{
    use HasFactory;
    protected $table = 'categorieproduit';
    protected $primaryKey = 'idcategorie';
    public $timestamps = false;


    public function typeProduit(){
        return $this->belongsTo(TypeProduit::class, 'idcategorie');
    }

    public static function findCategoryFilles($idCategorieMere) {
        return self::where('cat_idcategorie', $idCategorieMere)->get();
    }
    public function getTypeProduit() {
        return $this->hasMany(TypeProduit::class, 'idcategorie');
    }
}
