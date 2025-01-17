<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\AvisProduit;
use App\Models\Client;
use App\Models\Pays;
use App\Models\Produit;
use App\Models\Coloration;
use App\Models\Commande;
use App\Models\Photo;
use App\Models\PhotoProduitColoration;
use App\Models\TypeProduit;
use App\Models\Couleur;
use BotMan\BotMan\Commands\Command;
use DateInterval;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Benchmark;

class AdminDashboardController extends Controller
{
    // public function show(Request $request)
    // {
    //     $filterDate = $request->input('filter_date');
    //     $filtreTransporteur = $request->input('filtreTransporteur');

    //     $clients = Client::query();

    //     if ($filterDate) {
    //         $clients->where('derniereutilisation', '<=', $filterDate);
    //     }

    //     $clients->whereNotNull('nomclient')
    //         ->whereNotNull('prenomclient')
    //         ->where('nomclient', '!=', '')
    //         ->where('prenomclient', '!=', '');
    //     $clients = $clients->get();


    //     $commandes = Commande::all();
    //     $now = Carbon::now();
    //     $demainMidi = Carbon::tomorrow()->setHour(12)->setMinute(0)->setSecond(0);
    //     $demainFin = Carbon::tomorrow()->endOfDay();
    //     if($filtreTransporteur) {
    //         switch ($filtreTransporteur) {
    //             case 'domicile':
    //                 $commandes = $commandes->where('idtransporteur', '=', 1);
    //                 break;
    //             case 'autre':
    //                 $commandes = $commandes->where('idtransporteur', '>', 1);
    //                 break;
    //         }
    //     }

    //     $commandes = $commandes->filter(function ($commande) use ($filtreTransporteur, $now, $demainMidi, $demainFin) {
    //         $dateLivraison = AdminDashboardController::getDelai($commande);
    //         if ($filtreTransporteur === 'domicile') {
    //             //echo "Date de livraison : " . $dateLivraison->format('Y-m-d H:i:s') . "<br>";
    //             //echo "Demain midi : " . $demainMidi->format('Y-m-d H:i:s') . "<br>";
    //             return $dateLivraison > $now && $dateLivraison < $demainMidi;
    //         } elseif ($filtreTransporteur === 'autre') {
    //             return $dateLivraison > $now &&  $dateLivraison <= $demainFin;
    //         }
    //         return true;
    //     });

    //     $commandes = $commandes->filter(function ($commande) {
    //         $client = $commande->getClient();
        
    //         return $client && !is_null($client->nomclient) && !is_null($client->prenomclient) && $client->nomclient !== '' && $client->prenomclient !== '';
    //     });

    //     $commandesStatut = Commande::all()->where("idstatutcommande", "=", 2);

    //     $commandesStatut = $commandesStatut->filter(function ($commande) {
    //         $client = $commande->getClient();
        
    //         return $client && !is_null($client->nomclient) && !is_null($client->prenomclient) && $client->nomclient !== '' && $client->prenomclient !== '';
    //     });

    //     $typesProduit = TypeProduit::all();
    //     $pays = Pays::all();
    //     $couleurs = Couleur::all();
    //     $avisData = self::affichageAvis();

    //     return view('admin.dashboard', [
            // 'typesProduit' => $typesProduit,
            // 'pays' => $pays,
            // 'couleurs' => $couleurs,
            // 'avisData' => $avisData,
            // 'clients' => $clients,
            // 'commandes' => $commandes,
            // 'commandesStatut' => $commandesStatut,
    //     ]);
    // }

    public function show(Request $request)
    {
        $benchmarks = [];
    
        $filtreTransporteur = $request->input('filtreTransporteur');
        
        $benchmarks['Clients Query'] = Benchmark::measure(function () use ($request, &$clients) {
            $filterDate = $request->input('filter_date');
            $clients = Client::query();
            if ($filterDate) {
                $clients->where('datecreationcompte', '<=', $filterDate);
            }
            $clients->whereNotNull('nomclient')
                ->whereNotNull('prenomclient')
                ->where('nomclient', '!=', '')
                ->where('prenomclient', '!=', '');
            $clients = $clients->get();
        });
    
        $commandesMetrics = [];
    
        $commandesMetrics['Initial Query'] = Benchmark::measure(function () use (&$commandes) {
            $commandes = Commande::all();
        });
    
        $commandesMetrics['Calcul dates'] = Benchmark::measure(function () use (&$now, &$demainMidi, &$demainFin) {
            $now = Carbon::now();
            $demainMidi = Carbon::tomorrow()->setHour(12)->setMinute(0)->setSecond(0);
            $demainFin = Carbon::tomorrow()->endOfDay();
        });
    
        $commandesMetrics['Transporteur Filtre'] = Benchmark::measure(function () use ($filtreTransporteur, &$commandes) {
            if($filtreTransporteur) {
                switch ($filtreTransporteur) {
                    case 'domicile':
                        $commandes = $commandes->where('idtransporteur', '=', 1);
                        break;
                    case 'autre':
                        $commandes = $commandes->where('idtransporteur', '>', 1);
                        break;
                }
            }
        });
    
        $commandesMetrics['Date livraison Processing'] = Benchmark::measure(function () use (&$commandes, $filtreTransporteur, $now, $demainMidi, $demainFin, &$commandesMetrics) {
            $totalCommandes = count($commandes);
            $processedCommandes = 0;
            $delayCalculations = [];
            
            $commandes = $commandes->filter(function ($commande) use ($filtreTransporteur, $now, $demainMidi, $demainFin, &$processedCommandes, &$delayCalculations) {
                $processedCommandes++;
                
                $delayStart = microtime(true);
                $dateLivraison = AdminDashboardController::getDelai($commande);
                $delayEnd = microtime(true);
                $delayCalculations[] = ($delayEnd - $delayStart) * 1000;
                
                if ($filtreTransporteur === 'domicile') {
                    return $dateLivraison > $now && $dateLivraison < $demainMidi;
                } elseif ($filtreTransporteur === 'autre') {
                    return $dateLivraison > $now && $dateLivraison <= $demainFin;
                }
                return true;
            });
            
            $commandesMetrics['Calcul délais'] = [
                'total' => $totalCommandes,
                'processed' => $processedCommandes,
                'avg_delay_calc' => number_format(array_sum($delayCalculations) / count($delayCalculations), 2),
                'min_delay_calc' => number_format(min($delayCalculations), 2),
                'max_delay_calc' => number_format(max($delayCalculations), 2)
            ];
        });
                
        $benchmarks['Commandes Statut'] = Benchmark::measure(function () use (&$commandesStatut) {
            $commandesStatut = Commande::all()->where("idstatutcommande", "=", 1);
        });
    
        $benchmarks['Loading typesProduit, pays et couleurs'] = Benchmark::measure(function () use (&$typesProduit, &$pays, &$couleurs) {
            $typesProduit = TypeProduit::all();
            $pays = Pays::all();
            $couleurs = Couleur::all();
        });
    
        $benchmarks['Avis Processing'] = Benchmark::measure(function () use (&$avisData) {
            $avisData = self::affichageAvis();
        });
    
        return view('admin.dashboard', [
            'typesProduit' => $typesProduit,
            'pays' => $pays,
            'couleurs' => $couleurs,
            'avisData' => $avisData,
            'clients' => $clients,
            'commandes' => $commandes,
            'commandesStatut' => $commandesStatut,
            'benchmarks' => $benchmarks,
            'commandesMetrics' => $commandesMetrics,
        ]);
    }

    public static function affichageAvis()
    {

        $avisClients = AvisProduit::orderBy('dateavis', 'desc')->get();
        $avisData = [];
        foreach ($avisClients as $avis) {
            $produit = $avis->getProduit();
            $coloration = $produit->colorationPrixMin();
            $idCouleur = $coloration->idcouleur;
            $produitUrl = "http://51.83.36.122:7090/produit/idproduit{$produit->idproduit}/coloration{$idCouleur}";
            $client = $avis->getClient();

            $avisData[] = [
                'nomProduit' => $produit->nomproduit,
                'produitUrl' => $produitUrl,
                'clientNom' => $client->nomclient,
                'clientPrenom' => $client->prenomclient,
                'note' => $avis->noteavis,
                'titre' => $avis->nomavis,
                'commentaire' => $avis->commentaireavis,
                'reponse' => $avis->reponsemiliboo,
                'date' => $avis->dateavis->format('d/m/Y'),
            ];
        }
        return $avisData;
    }

    public function ajouterProduit(Request $request)
    {

        try {
            Log::info('Request data: ', $request->all());
            Log::info('Uploaded files: ', $request->file());
            DB::beginTransaction();


            $request->validate([
                'nomProduit' => 'required|string|max:256',
                'idTypeProduit' => 'required|integer',
                'idPays' => 'required|integer',
                'sourceNotice' => 'nullable|file|mimes:pdf',
                'sourceAspectTechnique' => 'nullable|file|mimes:txt',
                'delaiLivraison' => 'required|integer',
                'colorations' => 'required|array',
                'colorations.*.idCouleur' => 'required|integer',
                'colorations.*.quantiteStock' => 'required|integer',
                'colorations.*.descriptionColoration' => 'nullable|string',
                'colorations.*.photos' => 'nullable|array',
                'colorations.*.photos.*' => 'image|mimes:jpeg,png,jpg|max:4096',
            ]);

            $produit = Produit::create([
                'idtypeproduit' => $request->input('idTypeProduit'),
                'idpays' => $request->input('idPays'),
                'nomproduit' => $request->input('nomProduit'),
                'sourcenotice' => $request->file('sourceNotice') ? $request->file('sourceNotice')->store('notices') : null,
                'sourceaspecttechnique' => $request->file('sourceAspectTechnique') ? $request->file('sourceAspectTechnique')->store('aspects_techniques') : null,
                'delailivraison' => $request->input('delaiLivraison') . ' hours',
                'coutlivraison' => 0,
                'nbpaiementmax' => 1,
            ]);

            if ($request->hasFile('sourceAspectTechnique')) {
                $txtFile = $request->file('sourceAspectTechnique');
                $fileName = 'produit' . $produit->idproduit . '.txt';
                $destination = 'files/AspectTechnique/';

                $txtFile->move($destination, $fileName);

                $produit->sourceaspecttechnique = $destination . $fileName;
                $produit->save();
            }

            foreach ($request->input('colorations') as $index => $colorationData) {
                $coloration = Coloration::create([
                    'idproduit' => $produit->idproduit,
                    'idcouleur' => $colorationData['idCouleur'],
                    'prixvente' => 0,
                    'prixsolde' => null,
                    'quantitestock' => $colorationData['quantiteStock'],
                    'descriptioncoloration' => $colorationData['descriptionColoration'],
                    'estvisible' => false,
                ]);

                if ($request->hasFile("colorations.$index.photos")) {
                    $photos = $request->file("colorations.$index.photos");
                    foreach ($photos as $photoIndex => $photo) {
                        if ($photo instanceof \Illuminate\Http\UploadedFile && $photo->isValid()) {

                            $directory = public_path("img/imagesProduit/Produit{$produit->idproduit}");
                            File::ensureDirectoryExists($directory);
            
                            $fileName = sprintf(
                                "produit%d_couleur%d_photo%d.jpg",
                                $produit->idproduit,
                                $coloration->idcouleur,
                                $photoIndex + 1
                            );
            
                            $filePath = "imagesProduit/Produit{$produit->idproduit}/$fileName";
            
                            $photo->move($directory, $fileName);
            
                            $photoModel = Photo::create([
                                'sourcephoto' => $filePath,
                                'descriptionphoto' => "Produit {$produit->idproduit}, Couleur {$coloration->idcouleur}, Photo " . ($photoIndex + 1),
                            ]);
            
                            DB::table('photoproduitcoloration')->insert([
                                'idproduit' => (int) $produit->idproduit,
                                'idcouleur' => (int) $coloration->idcouleur,
                                'idphoto' => (int) $photoModel->idphoto,
                            ]);
                            Log::info('Photo sauvegardée dans la base:', ['idphoto' => $photoModel->idphoto]);

                        } else {
                            Log::warning('Format non valide ou intravouble', ['photoIndex' => $photoIndex]);
                        }
                    }
                }
            }

            DB::commit();
            Log::info('Database transaction committed');

            return response()->json(['message' => 'Produit ajouté avec succès, en attente de validation par le directeur', 'success'=>true, 'redirection' => route('produit.show', ['id' => $produit->idproduit, 'idcoloration' => $coloration->idcouleur])], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error adding product: ', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public static function calculPrixCommande($commande){
        $prixtotal = 0;
        $details = $commande->getDetailCommande();
        foreach($details as $detail){
            $coloration = Coloration::where([
                ['idproduit', '=', $detail->idproduit],
                ['idcouleur', '=', $detail->idcouleur]
            ])->first();
            $produit = $coloration->getProduit();
            $couleur = $coloration->getCouleur();
            $prix = $coloration->prixvente * $detail->quantitecommande;
            $prixtotal += $prix;
        }

        return $prixtotal;
    }

    public static function getDelai($commande){
        $details = $commande->getDetailCommande();
        $maxDelai = $details->map->getProduit()->max('delailivraison');

        $cmdComp= $commande->getCommandeComposition();
        $detailComp = $cmdComp->map->getCompositionProduit()->map->getDetailComposition();
        foreach ($detailComp as $detail) {
            $maxDelaiComp = $detail->map->getProduit()->max('delailivraison');
            if ($maxDelaiComp > $maxDelai)
                $maxDelai = $maxDelaiComp;
        }
        list($hours, $minutes, $seconds) = explode(':', $maxDelai);
        $interval = new DateInterval("PT{$hours}H{$minutes}M{$seconds}S");
        
        $date = new DateTime($commande->datecommande);
        $date->add($interval);

        return $date;
    }

    public static function getService(){
        return response()->json(["idService" => $_SESSION['admin']]);
    }

    public static function expedie($idcmd) {
        if ($_SESSION['admin']->idservice != 4) 
            return redirect()->route('admin.login');
        $cmd = Commande::find($idcmd);
        if (!$cmd) return redirect()->back();
        $cmd->idstatutcommande = 3;
        $sms = new SmsController(
            "Votre commande Miliboo N°".$cmd->idcommande." à été expédiée.",
            "+".$cmd->getClient()->telportableclient
        );
        $cmd->save();
        return redirect()->route('admin.dashboard');
    }
}
