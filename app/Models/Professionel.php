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
}
