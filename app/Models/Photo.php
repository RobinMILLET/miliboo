<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table = "photo";
    protected $primaryKey = null;
    public $timestamps = false;

    /**
     * Renvoie les PhotoProduitColoration qui réfèrent cette photo
     * @return Collection<PhotoProduitColoration>
    **/
    public function getPhotoProduitColoration() {
        return $this->hasMany(PhotoProduitColoration::class, 'idphoto', 'idphoto')->get();
    }
}
