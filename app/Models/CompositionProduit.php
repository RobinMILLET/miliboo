<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompositionProduit extends Model
{
    use HasFactory;
    protected $table = 'compositionproduit';
    protected $primaryKey = 'idcomposition';
    public $timestamp = false;

    public function show(){
        $compositions = CompositionProduit::orderby('idcomposition')->get();
        foreach($compositions as $composition){
            $details = $composition->getDetailComposition();
            foreach($details as $detail){
                $produit = $detail->getProduit();
                dd($produit);
                echo $produit->nomproduit . ' - ' . $detail->quantite;
            }
        }
    }

    public function getDetailComposition(){
        return $this->hasMany(DetailComposition::class, 'idcomposition', 'idcomposition')->get();
    }
}
