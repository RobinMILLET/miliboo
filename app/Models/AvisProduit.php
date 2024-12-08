<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisProduit extends Model
{
    use HasFactory;
    protected $table = "avisproduit";
    protected $primaryKey = "idavis";
    public $timestamps = false;

        /**
     * Renvoie le client lié à l'avis
     * @return Client
    **/
    public function getClient()
    {
        return $this->belongsTo(Client::class, 'idclient', 'idclient')->get()->firstOrFail();;
    }


            /**
     * Renvoie la ou les photo(s) liée(s) à l'avis
     * @return PhotoAvis
    **/
    public function getPhotoAvis() 
    {
        return $this->belongsTo(PhotoAvis::class, 'idavis', 'idavis')->get()->first();
    }
}
