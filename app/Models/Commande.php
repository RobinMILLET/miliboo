<?php

namespace App\Models;

use App\Http\Controllers\InfoPersoController;
use App\Http\Controllers\LivraisonController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Commande extends Model
{
    use HasFactory;
    protected $table = "commande";
    protected $primaryKey = "idcommande";
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = [
        'idclient', 'idadresse', 'idadressefact', 'idstatutcommande', 'idtransporteur', 'idcodepromo',
        'datecommande', 'avecassurance', 'aveclivraisonexpress', 'instructionlivraison'
    ];


    public function getPaiement(){
        return $this->hasMany(Paiement::class, 'idcommande', 'idcommande')->get();
    }

    public function getStatut(){
        return $this->belongsTo(StatutCommande::class, 'idstatutcommande', 'idstatutcommande')->get()->first();
    }

    public function getDetailCommande(){
        return $this->hasMany(DetailCommande::class, 'idcommande', 'idcommande')->get();
    }

    public function getCommandeComposition(){
        return $this->hasMany(CommandeComposition::class, 'idcommande', 'idcommande')->get();
    }

    public function getAdresse(){
        return $this->belongsTo(Adresse::class, 'idadresse', 'idadresse')->get()->first();
    }

    public function getAdresseFacturation(){
        return $this->belongsTo(Adresse::class, 'idadressefact', 'idadresse')->get()->first();
    }

    public function getClient(){
        return $this->belongsTo(Client::class, 'idclient', 'idclient')->get()->first();
    }

    public function getTransporteur() {
        return $this->belongsTo(Transporteur::class, 'idtransporteur', 'idtransporteur')->get()->first();
    }

    public function getCodePromo() {
        return $this->belongsTo(CodePromo::class, 'idcodepromo', 'idcodepromo')->get()->first();
    }

    public function getPrixTot() {
        $prixTot = 0;
        $details = $this->getDetailCommande();
        foreach ($details as $detail) {
            $prixTot += $detail->quantitecommande * $detail->getColoration()->prix();
        }
        $detailscompositions = $this->getCommandeComposition();
        foreach ($detailscompositions as $detailcomposition) {
            $prixTot += $detailcomposition->quantitecompositioncommande * $detailcomposition->getCompositionProduit()->prix();
        }
        if ($this->avecassurance) $prixTot += LivraisonController::$PRIXASSURANCE;
        if ($this->aveclivraisonexpress) $prixTot += LivraisonController::$PRIXEXPRESS;
        return round($prixTot, 2);
    }

    public function completeArray() {
        return [
            "dateCommande" => $this->datecommande,
            "avecAssurance" => $this->avecassurance,
            "avecLivraisonExpress" => $this->aveclivraisonexpress,
            "instructionLivraison" => $this->instructionlivraison,
            "statutCommande" => $this->getStatut()->nomstatut,
            "transporteur" => $this->getTransporteur()->nomtransporteur,
            "codePromo" => $this->getCodePromo() ? $this->getCodePromo()->completeArray() : null,
            "adresseLivraison" => $this->getAdresse()->completeArray(),
            "adresseFacturation" => $this->getAdresseFacturation()->completeArray(),
            "DetailCommande" => InfoPersoController::collectionCompleteArray(
                $this->getDetailCommande()),
            "DetailComposition" => InfoPersoController::collectionCompleteArray(
                $this->getCommandeComposition()),
            "Paiement" => InfoPersoController::collectionCompleteArray(
                $this->getPaiement())
        ];
    }
}
