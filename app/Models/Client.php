<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Client extends Model
{
    use HasFactory;
    protected $table = "client";
    protected $primaryKey = "idclient";
    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'int';
    protected $hidden = ['hashmdp', 'rememberme'];
    protected $fillable = [
        'nomclient', 'prenomclient', 'civiliteclient',
        'emailclient', 'telfixeclient', 'telportableclient',
        'datecreationcompte', 'hashmdp', 'pointfideliteclient',
        'newslettermiliboo', 'newsletterpartenaires'];

    public function getProduitsAimes() {
        return $this->belongsToMany(Produit::class, 'a_aimer', 'idclient', 'idproduit');
    }

    public function getCommande() {
        return $this->hasMany(Commande::class, 'idclient', 'idclient')->get();
    }


    public function getAdresse(){
        return $this->hasOne(Adresse::class, 'idclient', 'idclient')->get()->first();
    }

    public function checkPassword($password) {
        if (!str_starts_with($this->hashmdp, "$2y")) return null;
        return Hash::check($password, rtrim($this->hashmdp));
    }

    public function checkToken() {
        if ($this->limitetoken < now()) {
            $this->remembertoken = null;
            $this->limitetoken = null;
            $this->save();
        }
    }

    public static function auth($login, $password) {
        // TODO: index sur emails dans BdD
        $client = Client::where('emailclient', strtolower($login))->first();
        if (!$client) return null;
        if (!$client->checkPassword($password)) return null;
        $client->checkToken();
        return $client;
    }

    public static function loginByToken($login, $token) {
        $client = Client::where('emailclient', strtolower($login))->first();
        if (!$client) return null;
        $client->checkToken();
        if ($client->remembertoken == $token) return null;
        return $client;
    }
}