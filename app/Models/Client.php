<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class Client extends Model
{
    use HasFactory;
    protected $table = "client";
    protected $primaryKey = "idclient";
    public $timestamps = false;
    protected $hidden = ['hashmdp'];

    public function getProduitsAimes() {
        return $this->belongsToMany(Produit::class, 'a_aimer', 'idclient', 'idproduit');
    }

    public function checkPassword($password) {
        if (!str_starts_with($this->hashmdp, "$2y")) return null;
        return Hash::check($password, rtrim($this->hashmdp));
    }

    public static function auth($login, $password) {
        // null: email inconnu ; false: mauvais mdp ; Client: OK
        // TODO: index sur emails dans BdD
        $client = self::where('emailclient', $login)->first();
        if (!$client) return null;
        if (!$client->checkPassword($password)) return false;
        return $client;
    }
}