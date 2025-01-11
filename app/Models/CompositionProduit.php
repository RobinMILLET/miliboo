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

    public function stock() {
        $stocks = $this->getDetailComposition()->map->stock();
        return $stocks->min();
    }

    public function delailivraison() {
        $produits = $this->getDetailComposition()->map->getProduit();
        $delais = $produits->map->delailivraison;
        return $delais->max();
    }

    public function getDetailComposition(){
        return $this->hasMany(DetailComposition::class, 'idcomposition', 'idcomposition')->get();
    }

    public function getReduc() {
        if (!$this->prixsoldecomposition) return 0;
        return 100*((float)$this->prixventecomposition
                - (float)$this->prixsoldecomposition)
                / (float)$this->prixventecomposition;
    }

    public function prix() {
        return $this->prixsoldecomposition ? $this->prixsoldecomposition : $this->prixventecomposition;
    }
}
