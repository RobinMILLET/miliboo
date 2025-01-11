<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignalementAVis extends Model
{
    use HasFactory;
    protected $table = "signalementavis";
    protected $primaryKey = "idsignalement";
    public $incrementing = true;
    public $timestamps = false;
}
