<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\Adresse;
use App\Models\Pays;
use App\Models\Client;
use App\Models\ActivitePro;
use App\Models\Departement;
use App\Models\Professionel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CreationCompteController extends Controller
{
   public static function toListe($class, $id, $nom) {
      $liste = $class::all();
      $output = "";
      foreach ($liste as $item) {
         $output .= "<option value='".$item->$id ."'>".$item->$nom."</option>";
      }
      return $output;
   }

   public function villeApprox($cp, $nom) {
      if (strlen($cp) < 2 || strlen($cp) > 5 || !ctype_digit($cp)) {
         return response()->json(["ville" => null]);
      }
      $cp = (int)substr($cp, 0, 2);
      $villes = Ville::where("codeinsee", "LIKE", "$cp%")->get()->toArray();
      $nom = strtoupper($nom);
      $nom = preg_replace('/[^0-9A-Z]/', ' ', $nom);
      $nom = trim($nom);
      usort($villes, function($a, $b) use ($nom) {
          return levenshtein($a['nomville'], $nom)
          - levenshtein($b['nomville'], $nom);
      });
      return response()->json(["ville" => $villes[0]['nomville'] ?? null]);
   }

   public static function toTitle($str) {
      return ucfirst(strtolower($str));
   }

   public static function extractAdr(Request $request, &$adr) {
      // Séparation de l'adresse
      if (preg_match('/^(\d+)\s+(.*)$/', $request->adresse, $matches)) {
         $adr['numerorue'] = $matches[1];
         $adr['nomrue'] = $matches[2];
      }
      else {
         $adr['numerorue'] = null;
         $adr['nomrue'] = $request->adresse;
      }

      $adr['idpays'] = (int)$request->pays;
      $adr['codepostaladresse'] = $request->cp;
      if (strlen($adr['codepostaladresse']) != 5 || !ctype_digit($adr['codepostaladresse']))
         return redirect()->back()->with("error", "cp");
      $ville = Ville::where("nomville", $request->ville)->get()->first();
      if (!$ville) return redirect()->back()->with("error", "ville");
      $adr['codeinsee'] = $ville->codeinsee;
      return null;
   }

   public static function extractClient(Request $request, &$client, $mod = false) {
      if ($request->civilite == "X") $client['civiliteclient'] = null;
      else $client['civiliteclient'] = $request->civilite;
      $client['nomclient'] = self::toTitle($request->nom);
      $client['prenomclient'] = self::toTitle($request->prenom);
      
      $telportable = preg_replace('/\D/', '', $request->inputtelportable);
      if (strlen($telportable) != 9) return redirect()->back()->with("error", "portable");
      $client['telportableclient'] = $request->telportable . $telportable;

      if (isset($request->inputtelfixe)) {
         $telfixe = preg_replace('/\D/', '', $request->inputtelfixe);
         if (strlen($telfixe) != 9) return redirect()->back()->with("error", "fixe");
         $client['telfixeclient'] = $request->telfixe . $telfixe;
      }
      if (!$mod && Client::all()->where('nomclient', '=', $client["nomclient"])
         ->where('prenomclient', '=', $client["prenomclient"])
         ->where('telportableclient', '=', $client["telportableclient"])
         ->count() != 0) return redirect()->back()->with("error", "person");
      else $client['telfixeclient'] = null;
      return null;
   }

   public function tryCreateCompte(Request $request) {
      $request->validate([
          'email' => 'required|email',
          'password' => 'required|string',
          'ckNewsletter' => 'nullable|string',
          'ckPartenaires' => 'nullable|string',
          'radiochoix' => 'nullable|string',
          'civilite' => 'nullable|string',
          'nom' => 'required|string',
          'prenom' => 'required|string',
          'adresse' => 'required|string',
          'pays' => 'required|string',
          'cp' => 'required|string',
          'ville' => 'required|string',
          'telfixe' => 'nullable|string',
          'inputtelfixe' => 'nullable|string',
          'telportable' => 'required|string',
          'inputtelportable' => 'required|string',
          'societe' => 'nullable|string',
          'activite' => 'nullable|string',
          'tva' => 'nullable|string'
      ]);
      $client = array();
      $adr = array();
      $pro = array();

      $client['emailclient'] = strtolower($request->email);
      $clientOld = Client::getByEmail($client['emailclient']);
      if ($clientOld) return redirect()->back()->with('error', "exists");

      $client['hashmdp'] = Hash::make($request->password);
      $client['newslettermiliboo'] = isset($request->ckNewsletter);
      $client['newsletterpartenaires'] = isset($request->ckPartenaires);
      $estPro = (bool)$request->radiochoix ?? false;
      
      $exit = self::extractClient($request, $client);
      if ($exit) return $exit;
      $exit = self::extractAdr($request, $adr);
      if ($exit) return $exit;

      if ($estPro) {
         if (!$request->societe) return redirect()->back()->with("error", "societe");
         if (!$request->activite) return redirect()->back()->with("error", "activite");
         if (!$request->tva) return redirect()->back()->with("error", "tva");

         $pro['nomsociete'] = $request->societe;
         $pro['idactivitepro'] = (int)$request->activite;
         $pro['numtva'] = str_replace(" ", "", $request->tva);
         if (strlen($pro['numtva']) != 11 || !ctype_digit($pro['numtva'])) return redirect()->back()->with("error", "tva");
      }

      $client["datecreationcompte"] = now();
      $client["derniereutilisation"] = now();
      $client["pointfideliteclient"] = 0;
      DB::beginTransaction();
      try {
         $newClient = Client::create($client);
         $_SESSION["client"] = $newClient;
         $adr["idclient"] = $newClient->idclient;
         $adr["iddepartement"] = substr($adr["codepostaladresse"], 0, 2);
         $newAdr = Adresse::create($adr);
         if ($estPro) {
            $pro['idclient'] = $newClient->idclient;
            $newPro = Professionel::create($pro);
         }
         DB::commit();
      } catch (\Exception $e) {
         DB::rollBack();
         Log::alert("erreur SQL sur création :", [$client, $adr, $pro, $e]);
         return redirect()->back()->with("error", "create");
      }
      return redirect()->route("espaceclient");
   }

   public static function error($error) {
      echo '<script>alert("';
      switch ($error) {
         case "exists": echo "Cet email est déjà utilisé."; break;
         case "person": echo "Vous avez déjà un compte."; break;
         case "ville": echo "La ville n'est pas reconnue."; break;
         case "cp": echo "Le code postal n'est pas valide. (5 chiffres)"; break;
         case "portable": echo "Le numéro de portable n'est pas valide. (9 chiffres)"; break;
         case "fixe": echo "Le numéro de fixe n'est pas valide. (9 chiffres)"; break;
         case "societe": echo "Le nom de la société est requis."; break;
         case "activite": echo "L'activité professionelle est requise."; break;
         case "tva": echo "Le numéro de TVA est requis ou n'est pas valide. (11 chiffres)"; break;
         case "create": echo "Erreur lors de la création de votre compte"; break;
         case "mod": echo "Erreur lors de la modification de votre compte"; break;
      }
      echo '")</script>';
   }
}