<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarteBancaire extends Model
{
    use HasFactory;
    protected $table = "cartebancaire";
    protected $primaryKey = "idcartebancaire";
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'idclient', 'nomcartebancaire', 'dateenregistrement', 'numcartebancaire', 'dateexpirationcarte'];

    public function getClient() {
        return $this->belongsTo(Client::class, 'idclient', 'idclient')->get()->firstOrFail();
    }

    public static function obfuscate($num) {
        return substr($num, 0, 1)
        .str_repeat('*', strlen($num)
        - 5) . substr($num, -4);
    }

    public function completeArray() {
        return [
            "nomCarteBancaire" => $this->nomcartebancaire,
            "dateEnregistrement" => $this->dateenregistrement,
            "numCarteBancaire" => self::obfuscate($this->numcartebancaire),
            "dateExpirationCarte" => $this->dateexpirationcarte
        ];
    }
}
