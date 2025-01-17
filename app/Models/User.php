<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'servicesmiliboo';
    protected $primaryKey = 'idservice'; 
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'servicesmiliboo';
    }
    
    public function getAuthIdentifier()
    {
        return $this->idservice;
    }
}