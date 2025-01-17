<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $table = "adresse";
    protected $primaryKey = "idadresse";
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [
        'idpays', 'codeinsee', 'idclient', 'iddepartement',
        'nomadresse', 'numerorue', 'nomrue', 'codepostaladresse'];

    //Pas sur sur
    
    public function getPays(){
    
        return $this->belongsTo(Pays::class, 'idpays', 'idpays')->get()->first();

    }

    public function getVille(){
        return $this->hasOne(Ville::class, 'codeinsee', 'codeinsee')->get()->first();

    }

    public function getDepartement(){
        return $this->hasOne(Departement::class, 'iddepartement', 'iddepartement')->get()->first();

    }

    public function getClient(){
        return $this->belongsTo(Client::class, 'idclient', 'idclient')->get()->first();
    }

    public function completeArray() {
        return [
            "nomAdresse" => $this->nomadresse,
            "numeroRue" => $this->numerorue,
            "nomRue" => $this->nomrue,
            "codePostal" => $this->codepostaladresse,
            "ville" => $this->getVille()->nomville,
            "departement" => $this->getDepartement()->nomdepartement,
            "pays" => $this->getPays()->nompays,
        ];
    }

    public function anonym() {
        if (!Commande::where('idadresse',$this->idadresse)
            ->orWhere('idadressefact',$this->idadresse)->count())
            { $this->delete(); return; }
        $this->nomadresse = "";
        $this->numerorue = "";
        $this->nomrue = "";
        $this->codepostaladresse = "00000";
        $this->save();
    }
}

