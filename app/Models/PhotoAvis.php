<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoAvis extends Model
{
    use HasFactory;
    protected $table = "photoavis";
    protected $primaryKey = null;
    public $timestamps = false;

        /**
     * Renvoie la photo liée à cette photoavis
     * @return Photo
    **/
    public function getPhoto() 
    {
        return $this->hasMany(Photo::class ,'idphoto', 'idphoto')->get()->firstOrFail();
    }
}
