<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoProduitColoration extends Model
{
    use HasFactory;
    protected $table = "photoproduitcoloration";
    protected $primaryKey = 'idphoto';
    public $timestamps = false;
    protected $fillable = [
        'idproduit',
        'idcouleur',
        'idphoto',
    ];

    /**
     * Renvoie la coloration liée à cete PhotoProduitColoration
     * @return Coloration
    **/
    public function getColoration() {
        return $this->belongsTo(Coloration::class ,'idproduit', 'idproduit')->where('idcouleur', '=', $this->idcouleur)->get()->firstOrFail();
    }

    /**
     * Renvoie le produit lié à la PhotoProduitColoration
     * @return Produit
    **/
    public function getProduit() {
        return $this->belongsTo(Produit::class ,'idproduit', 'idproduit')->get()->firstOrFail();
    }

    /**
     * Renvoie la photo liée à cete PhotoProduitColoration
     * @return Photo
    **/
    public function getPhoto() {
        return $this->hasOne(Photo::class ,'idphoto', 'idphoto')->get()->firstOrFail();
    }
}
