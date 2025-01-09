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

class AdminDashboardController extends Controller
{
    public function show(Request $request)
    {
        $filterDate = $request->input('filter_date');
        $filtreTransporteur = $request->input('filtreTransporteur');

        $clients = Client::query();

        if ($filterDate) {
            $clients->where('datecreationcompte', '<=', $filterDate);
        }

        $clients->whereNotNull('nomclient')
            ->whereNotNull('prenomclient')
            ->where('nomclient', '!=', '')
            ->where('prenomclient', '!=', '');
        $clients = $clients->get();


        $commandes = Commande::all();
        $now = Carbon::now();
        $demainMidi = Carbon::tomorrow()->setHour(12)->setMinute(0)->setSecond(0);
        $demainFin = Carbon::tomorrow()->endOfDay();
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

        $commandes = $commandes->filter(function ($commande) use ($filtreTransporteur, $now, $demainMidi, $demainFin) {
            $dateLivraison = AdminDashboardController::getDelai($commande);
            if ($filtreTransporteur === 'domicile') {
                echo "Date de livraison : " . $dateLivraison->format('Y-m-d H:i:s') . "<br>";
                echo "Demain midi : " . $demainMidi->format('Y-m-d H:i:s') . "<br>";
                return $dateLivraison > $now && $dateLivraison < $demainMidi;
            } elseif ($filtreTransporteur === 'autre') {
                return $dateLivraison > $now &&  $dateLivraison <= $demainFin;
            }
            return true;
        });

        $commandesStatut = Commande::all()->where("idstatutcommande", "=", 1);

        $typesProduit = TypeProduit::all();
        $pays = Pays::all();
        $couleurs = Couleur::all();
        $avisData = self::affichageAvis();

        return view('admin.dashboard', [
            'typesProduit' => $typesProduit,
            'pays' => $pays,
            'couleurs' => $couleurs,
            'avisData' => $avisData,
            'clients' => $clients,
            'commandes' => $commandes,
            'commandesStatut' => $commandesStatut,
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
        list($hours, $minutes, $seconds) = explode(':', $maxDelai);
        $interval = new DateInterval("PT{$hours}H{$minutes}M{$seconds}S");
        
        $date = new DateTime($commande->datecommande);
        $date->add($interval);

        return $date;
    }

    public static function getService(){
        return response()->json(["idService" => $_SESSION['admin']]);
    }
}
