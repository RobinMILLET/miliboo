<?php

namespace App\Http\Controllers;
use App\Models\CompositionProduit;
use Illuminate\Http\Request;

class DetailCompositionController extends Controller
{
    public function show($idcomposition)
    {
        $composition = CompositionProduit::where('idcomposition', $idcomposition);
        return view('composition', compact('composition'));
    }
}
