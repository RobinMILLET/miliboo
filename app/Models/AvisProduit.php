<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisProduit extends Model
{
    use HasFactory;
    protected $table = "avisproduit";
    protected $primaryKey = "idavis";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [''];
    protected $casts = [
        'dateavis' => 'date',
    ];

        /**
     * Renvoie le client lié à l'avis
     * @return Client
    **/
    public function getClient()
    {
        return $this->belongsTo(Client::class, 'idclient', 'idclient')->get()->firstOrFail();;
    }


            /**
     * Renvoie la première photo liée à l'avis
     * @return PhotoAvis
    **/
    public function getPhotoAvis()
    {
        return $this->belongsTo(PhotoAvis::class, 'idavis', 'idavis')->get()->first();
    }

    public function getProduit()
    {
        return $this->belongsTo(Produit::class, 'idproduit', 'idproduit')->get()->first();
    }

    public function completeArray() {
        return [
            "noteAvis" => $this->noteavis,
            "dateAvis" => $this->dateavis,
            "commentaireAvis" => $this->commentaireavis,
            "produitAvis" => $this->getProduit()->nomproduit,
            "photos" => $this->hasMany(PhotoAvis::class, "idavis", "idavis")->get()->count()
        ];
    }

    public function anonym() {
        $photos = $this->hasMany(PhotoAvis::class, "idavis", "idavis")->get();
        foreach ($photos as $photo) {
            //$photo->getPhoto()->delete();
        }
        $photos->map->delete();
    }
}
