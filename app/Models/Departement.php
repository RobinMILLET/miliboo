<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $table = "departement";
    protected $primaryKey = "iddepartement";
    public $timestamps = false;

    /**
     * Renvoie les villes du département
     * @return Collection<Ville>
    **/
    public function getVille() {
        return Ville::where("codeinsee", "LIKE", "$this->iddepartement%")->get();
    }
}
