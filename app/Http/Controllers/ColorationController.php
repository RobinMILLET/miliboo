<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Coloration;
use App\Models\Produit;

class ColorationController extends Controller
{
    public function getColorationData()
    {
        try {
            $colorations = Coloration::with('produit')->get();

            $data = $colorations->map(function ($coloration) {
                return [
                    'idproduit' => $coloration->idproduit,
                    'idcouleur' => $coloration->idcouleur,
                    'nomproduit' => $coloration->produit->nomproduit,
                    'prix' => $coloration->prixvente,
                    'prixsolde' => $coloration->prixsolde,
                    'nbpaiementmax' => $coloration->produit->nbpaiementmax,
                    'coutlivraison' => $coloration->produit->coutlivraison,
                    'estvisible' => $coloration->estvisible,
                ];
            });

            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des données: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function update(Request $request, $idproduit, $idcouleur)
    {
        Log::info('Request payload:', $request->all());
        DB::beginTransaction();

        try {

            $request->validate([
                'nomproduit' => 'required|string|max:256',
                'prix' => 'required|numeric',
                'prixsolde' => 'nullable|numeric',
                'nbpaiementmax' => 'required|integer',
                'coutlivraison' => 'required|numeric',
                'estvisible' => 'required|boolean',
            ]);
           
            Coloration::where('idproduit', $idproduit)
            ->where('idcouleur', $idcouleur)
            ->update([
                'prixvente' => $request->input('prix'),
                'prixsolde' => $request->input('prixsolde'),
                'estvisible' => $request->input('estvisible'),
            ]);

            $produit = Produit::where('idproduit', $idproduit)->firstOrFail();

            $produit->nomproduit = $request->input('nomproduit');
            $produit->nbpaiementmax = $request->input('nbpaiementmax');
            $produit->coutlivraison = $request->input('coutlivraison');
            $produit->save();

            DB::commit();


            return response()->json(['success' => true]);
        } catch (\Illuminate\Validation\ValidationException $e) {

            DB::rollBack();


            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {

            DB::rollBack();


            Log::error('Erreur update coloration: ' . $e->getMessage());


            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue.',
            ], 500);
        }
    }
}
