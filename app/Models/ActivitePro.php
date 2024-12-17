<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitePro extends Model
{
    use HasFactory;
    protected $table = "activitepro";
    protected $primaryKey = "idactivitepro";
    public $timestamps = false;
}
