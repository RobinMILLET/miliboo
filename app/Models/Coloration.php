<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coloration extends Model
{
    use HasFactory;
    protected $table = "coloration";
    protected $primaryKey = null;
    public $timestamps = false;

    protected $fillable = [
        'idproduit',
        'idcouleur',
        'prixvente',
        'prixsolde',
        'quantitestock',
        'descriptioncoloration',
        'estvisible',
    ];


    public function produit()
    {
        return $this->belongsTo(Produit::class, 'idproduit', 'idproduit');
    }

    public function couleur()
    {
        return $this->belongsTo(Couleur::class, 'idcouleur', 'idcouleur');
    }

    public function getProduit()
    {
        return $this->belongsTo(Produit::class, 'idproduit', 'idproduit')->get();
    }

    public function getCouleur()
    {
        return $this->belongsTo(Couleur::class, 'idcouleur', 'idcouleur')->get();
    }

    public function getPhotoProduitColorations() {
        return $this->hasMany(PhotoProduitColoration::class ,'idproduit', 'idproduit')->where('idcouleur', '=', $this->idcouleur)->get();
    }

    public function getPhotos() {
        $photos = [];
        foreach ($this->getPhotoProduitColorations() as $photoProdCol) {
            $photos[] = $photoProdCol->getPhoto();
        }
        return $photos;
    }
}
