<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePaiement extends Model
{
    use HasFactory;
    protected $table = "typepaiement";
    protected $primaryKey = "idtypepaiement";
    public $timestamps = false;
}
