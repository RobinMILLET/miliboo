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

    /**
     * Renvoie le produit lié à la coloration
     * @return Produit
    **/
    public function getProduit()
    {
        return $this->belongsTo(Produit::class, 'idproduit', 'idproduit')->get()->firstOrFail();
    }

    /**
     * Renvoie la couleur lié à la coloration
     * @return Couleur
    **/
    public function getCouleur()
    {
        return $this->belongsTo(Couleur::class, 'idcouleur', 'idcouleur')->get()->firstOrFail();;
    }

    /**
     * Renvoie les PhotoProduitColoration liés à cette coloration
     * @return Collection<PhotoProduitColoration>
    **/
    public function getPhotoProduitColoration() {
        return $this->hasMany(PhotoProduitColoration::class ,'idproduit', 'idproduit')->where('idcouleur', '=', $this->idcouleur)->get();
    }

    /**
     * Renvoie les photos liées à cette coloration
     * @return Collection<Photo>
    **/
    public function getPhoto() {
        $photos = collect();
        foreach ($this->getPhotoProduitColoration() as $photoProdCol) {
            $photos->push($photoProdCol->getPhoto());
        }
        return $photos;
    }

    public function getReduc() {
        if (!$this->prixsolde) return 0;
        return 100*((float)$this->prixvente
                - (float)$this->prixsolde)
                / (float)$this->prixvente;
    }

}
