<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class DetailProduitController extends Controller
{
    public function show($id){
    	$produit = Produit::where('idproduit', $id)->firstOrFail();
        
        return view('detailProduit', compact('produit'));
    }
}
