<?php

namespace App\Models;

use App\Http\Controllers\DataController;
use App\Http\Controllers\InfoPersoController;
use App\Http\Controllers\LoginController;
use DateInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class Client extends Model
{
    use HasFactory;
    protected $table = "client";
    protected $primaryKey = "idclient";
    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'int';
    protected $hidden = ['hashmdp', 'rememberme'];
    protected $fillable = [
        'nomclient', 'prenomclient', 'civiliteclient',
        'emailclient', 'telfixeclient', 'telportableclient',
        'datecreationcompte', 'hashmdp', 'pointfideliteclient',
        'newslettermiliboo', 'newsletterpartenaires', 'derniereutilisation'];

    public function getProduitsAimes() {
        return $this->belongsToMany(Produit::class, 'a_aimer', 'idclient', 'idproduit');
    }

    public function getCarteBancaire() {
        return $this->hasMany(CarteBancaire::class, 'idclient', 'idclient')->get();
    }

    public function getCommande() {
        return $this->hasMany(Commande::class, 'idclient', 'idclient')->get();
    }

    public function getProfessionel() {
        return $this->hasOne(Professionel::class, 'idclient', 'idclient')->get()->first();
    }

    public static function getByEmail($email) {
        return self::where('emailclient', strtolower($email))->first();
    }

    public function getAdresse(){
        return $this->hasMany(Adresse::class, 'idclient', 'idclient')->get();
    }

    public function getAvisProduit() {
        return $this->hasMany(AvisProduit::class, 'idclient', 'idclient')->get();
    }

    public function getMessageChatBot() {
        return $this->hasMany(MessageChatBot::class, 'idclient', 'idclient')->get();
    }

    public function getHisoriqueConsultation() {
        return $this->hasMany(HistoriqueConsultation::class, 'idclient', 'idclient')->get();
    }

    public function getPanier() {
        return $this->hasMany(Panier::class, 'idclient', 'idclient')->get()->first();
    }

    public function checkPassword($password) {
        if (!str_starts_with($this->hashmdp, "$2y")) return null;
        return Hash::check($password, rtrim($this->hashmdp));
    }

    public function checkMailVerif() {
        return ($this->emailverifdate && !$this->emailveriftoken);
    }

    public function checkTelVerif() {
        return ($this->telverifdate && !$this->telveriftoken);
    }

    public function checkTokens() {
        if ($this->limitetoken < now()) {
            $this->remembertoken = null;
            $this->limitetoken = null;
            $this->save();
        }
        if ($this->emailveriftoken && $this->emailverifdate &&
                $this->emailverifdate < now()) {
            $this->emailveriftoken = null;
            $this->emailverifdate = null;
            $this->save();
        }
        if ($this->telveriftoken && $this->telverifdate &&
                $this->telverifdate < now()) {
            $this->telveriftoken = null;
            $this->telverifdate = null;
            $this->save();
        }
    }

    public static function auth($login, $password) {
        // TODO: index sur emails dans BdD
        $client = Client::getByEmail($login);
        if (!$client) return null;
        if (!$client->checkPassword($password)) return null;
        $client->checkTokens();
        return $client;
    }

    public static function loginByToken($login, $token) {
        $client = Client::getByEmail($login);
        if (!$client) return null;
        $client->checkTokens();
        if ($client->remembertoken != $token) return null;
        return $client;
    }

    public function completeArray() {
        return [
            "nomClient" => $this->nomclient,
            "prenomClient" => $this->prenomclient,
            "civiliteClient" => $this->civiliteclient,
            "emailClient" => $this->emailclient,
            "telFixeClient" => $this->telfixeclient,
            "telPortableClient" => $this->telportableclient,
            "dateCreationCompte" => $this->datecreationcompte,
            "pointFideliteClient" => $this->pointfideliteclient,
            "newsLetterMiliboo" => $this->newslettermiliboo,
            "newsLetterPartenaires" => $this->newsletterpartenaires,
            "emailVerifDate" => $this->emailverifdate,
            "telVerifDate" => $this->telverifdate,
            "derniereUtilisation" => $this->derniereutilisation,
            "Adresse" => InfoPersoController::collectionCompleteArray(
                $this->hasMany(Adresse::class, "idclient", "idclient")->get()),
            "CarteBancaire" => InfoPersoController::collectionCompleteArray(
                $this->getCarteBancaire()),
            "Commande" => InfoPersoController::collectionCompleteArray(
                $this->getCommande()),
            "Professionel" => $this->getProfessionel() ?
                $this->getProfessionel()->completeArray() : null,
            "Avis" => InfoPersoController::collectionCompleteArray(
                $this->getAvisProduit()),
            "ChatBot" => InfoPersoController::collectionCompleteArray(
                $this->getMessageChatBot()),
            "Historique" => InfoPersoController::collectionCompleteArray(
                $this->getHisoriqueConsultation()),
            "Panier" => $this->getPanier() ?
                InfoPersoController::collectionCompleteArray(
                $this->getPanier()->getDetailPanier()) : [],
            "Aime" => InfoPersoController::collectionArray(
                $this->getProduitsAimes()->get(), "nomproduit")
        ];
    }

    public function anonym() {
        DB::beginTransaction();
        try {
            $this->nomclient = "";
            $this->prenomclient = "";
            $this->civiliteclient = "X";
            $this->emailclient = null;
            $this->telfixeclient = "00000000000";
            $this->telportableclient = "00000000000";
            foreach($this->hasMany(Adresse::class, "idclient", "idclient")->get() as $adr) {
                $adr->anonym();
            }
            $this->getCarteBancaire()->map->delete();
            if ($this->getProfessionel()) $this->getProfessionel()->anonym();
            foreach ($this->getAvisProduit() as $avis) {
                $avis->anonym();
            }
            $this->getAvisProduit()->map->delete();
            $this->getMessageChatBot()->map->delete();
            $this->getHisoriqueConsultation()->map->delete();
            if ($this->getPanier()) {
                $this->getPanier()->anonym();
                $this->getPanier()->delete();
            }
            $this->hasMany(A_aimer::class, "idclient", "idclient")->get()->map->delete();
            $this->hashmdp = "";
            $this->remembertoken = null;
            $this->emailveriftoken = null;
            $this->telveriftoken = null;
            $this->save();
            DB::commit();
            LoginController::logOut();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::alert("erreur SQL sur supression :", [$this, $e]);
            return redirect()->back();
        }
    }
}