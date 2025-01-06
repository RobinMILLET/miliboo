<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionel extends Model
{
    use HasFactory;
    protected $table = "professionel";
    protected $primaryKey = "idclient";
    public $timestamps = false;
    protected $fillable = [
        'idclient', 'idactivitepro', 'nomsociete', 'numtva'];
    
    public function getActivitePro() {
        return $this->belongsTo(ActivitePro::class, 'idactivitepro', 'idactivitepro')->get()->firstOrFail();
    }

    public function completeArray() {
        return [
            "activitePro" => $this->getActivitePro()->nomactivitepro,
            "nomSociete" => $this->nomsociete,
            "numTva" => $this->numtva
        ];
    }

    public function anonym() {
        $this->nomsociete = "";
        $this->numtva = "00000000000";
        $this->save();
    }
}
