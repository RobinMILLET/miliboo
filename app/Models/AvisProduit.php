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

    
}
