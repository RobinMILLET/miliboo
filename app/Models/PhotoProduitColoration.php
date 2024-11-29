<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoProduitColoration extends Model
{
    use HasFactory;
    protected $table = "photoproduitcoloration";
    protected $primaryKey = null;
    public $timestamps = false;

    public function getColoration() {
        return $this->belongsTo(Coloration::class ,'idproduit', 'idproduit')->where('idcouleur', '=', $this->idcouleur)->get();
    }

    public function getPhoto() {
        $photos = $this->hasOne(Photo::class ,'idphoto', 'idphoto')->get();
        return $photos[0] ?? null;
    }
}
