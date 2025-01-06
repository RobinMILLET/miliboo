<?php

namespace App\Models;

use App\Http\Controllers\Composition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeComposition extends Model
{
    use HasFactory;
    protected $table = "commandecomposition";
    protected $primaryKey = null;
    public $timestamps = false;

    public function completeArray() {
        return [
            "nomComposition" => CompositionProduit::find($this->idcomposition)->nomcomposition,
            "quantiteComposition" => $this->quantitecompositioncommande,
        ];
    }
}
