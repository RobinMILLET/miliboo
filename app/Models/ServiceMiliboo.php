<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceMiliboo extends Model
{
    protected $table = 'servicemiliboo';
    protected $primaryKey = 'idservice';
    protected $fillable = ['nomeservice', 'loginservice', 'hashmdpservice', 'remembertoken'];
    public $timestamps = false;
}
