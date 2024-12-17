<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatutCommande extends Model
{
    use HasFactory;
    protected $table = "statutcommande";
    protected $primaryKey = "idstatut";
    public $timestamps = false;
}
