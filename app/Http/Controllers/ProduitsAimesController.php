<?php

namespace App\Http\Controllers;

use App\Models\A_aimer;
use Illuminate\Http\Request;

class ProduitsAimesController extends Controller
{
    public function show()
    {
        $idclient = $_SESSION['client']->idclient;
        $produitsAimes = A_aimer::where('idclient', $idclient)->get();

        return view('mesproduitsaimes', ['produitsAimes' => $produitsAimes]);
    }
}
