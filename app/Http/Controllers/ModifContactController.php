<?php

namespace App\Http\Controllers;

use App\Models\Client;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ModifContactController extends Controller
{
    public static function changeMail(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'ckNewsletter' => 'nullable|string',
            'ckPartenaires' => 'nullable|string',
            'ckA2f' => 'nullable|string'
        ]);
        $client = $_SESSION["client"];
        if (!$client) return redirect()->back();
        $client->newslettermiliboo = isset($request->ckNewsletter);
        $client->newsletterpartenaires = isset($request->ckPartenaires);
        if ($client->checkTelVerif())
            $client->a2f = isset($request->ckA2f);
        if ($client->emailclient != strtolower($request->email)) {
            $client->emailveriftoken = null;
            $client->emailverifdate = null;
            $client->emailclient = strtolower($request->email);
        }
        $client->save();
        return redirect()->back();
    }

    public static function sendVerifMail(Request $request) {
        $client = $_SESSION["client"];
        if ($client->checkMailVerif()) return redirect()->back();

        $token = bin2hex(random_bytes(32));
        $client['emailveriftoken'] = $token;
        $client['emailverifdate'] = now()->addMinutes(5);
        $client->save();

        $data = [
            'prenomclient' => $client->prenomclient,
            'nomclient' => $client->nomclient,
            'emailclient' => $client->emailclient,
            'id' => $client->idclient,
            'token' => $client->emailveriftoken,
        ];

        $mail = new MailController("Vérification Miliboo", "mail.verifmail", $data);
        $mail->sendTo($client->emailclient);
        return redirect()->back();
    }

    public static function verifMail($id, $token) {
        $client = Client::find($id);
        if ($client->checkMailVerif()) // Already verified
            return redirect()->route('modifcontact')->with("error", "noneed");
        $client->checkTokens();
        if (!$client->emailveriftoken) // No verification active (/expired)
            return redirect()->route('modifcontact')->with("error", "token");
        if ($client->emailveriftoken != $token) // Token not matching
            return redirect()->route('modifcontact')->with("error", "token");
        $client->emailverifdate = now();
        $client->emailveriftoken = null;
        $client->save();
        return redirect()->route('modifcontact');
    }

    public static function getBladeA2f() {
        $client = $_SESSION["client"];
        $client->checkTokens();
        $checked = $client->a2f ? ' checked' : '';
        $disabled = $client->checkTelVerif() ? "" : " disabled";
        echo '<input name="ckA2f" class="input-newsletters" id="checkbox-a2f" type="checkbox"'.$disabled.$checked.'>  ';
        echo '<label class="label-newsletters" for="checkbox-a2f">Activer l\'authentification à deux facteurs (par téléphone).</label>';
        if ($disabled) echo "<p class='red'>Vous devez vérifier votre numéro de téléphone pour activer cette option.</p>";
    }

    public static function getBladeVerifMail() {
        $client = $_SESSION["client"];
        $client->checkTokens();
        $disabled = "";
        if ($client->checkMailVerif()) {
            $disabled = " disabled";
            echo "<p>Votre adresse mail '".$client->emailclient."' est déjà vérifiée.</p>";
        }
        else {
            echo "<p>Vous n'avez pas encore vérifié votre adresse mail '".$client->emailclient."'.</p>";
            if ($client->emailverifdate && $client->emailverifdate > now()) {
                echo "<p>Vous devez attendre au moins 5 minutes avant de pouvoir renvoyer un mail.</p>";
                $disabled = " disabled";
            }
            else {
                echo "<p>Cliquez sur le bouton ci-dessous pour envoyer un email à cette adresse.</p>";
            }
        }
        echo "<button type='submit' style='margin-top:0px' id='button-valide'$disabled>Envoyer le mail</button>";
    }

    public static function sendVerifTel(Request $request)
    {
        $client = $_SESSION["client"];
        if (!$client) return redirect()->route('compte');
        $token = str_pad(strval(random_int(0, 999999)), 6, "0", STR_PAD_LEFT);
        $client->telverifdate = now()->addMinutes(5);
        $client->telveriftoken = $token;
        $client->save();
        //return redirect()->route('modifcontact')->with("token", $token);
        $sms = new SmsController(
            "Votre code de vérification miliboo est ".$token,
            "+".$client->telportableclient
        );
        return redirect()->route('modifcontact');
    }

    public static function verifTel(Request $request) {
        $request->validate([
            'token' => 'required|string',]);
        $client = $_SESSION["client"];
        if (!$client) return redirect()->route('compte');
        if ($client->checkTelVerif()) // Already verified
            return redirect()->route('modifcontact')->with("error", "noneed");
        $client->checkTokens();
        if (!$client->telveriftoken) // No verification active (/expired)
            return redirect()->route('modifcontact')->with("error", "token");
        if ($client->telveriftoken != $request->token) // Token not matching
            return redirect()->route('modifcontact')->with("error", "token");
        $client->telverifdate = now();
        $client->telveriftoken = null;
        $client->save();
        return redirect()->route('modifcontact');
    }

    public static function getBladeSendTel() {
        $client = $_SESSION["client"];
        $client->checkTokens();
        $disabledSend = "";
        if (!$client->checkTelVerif()) {
            echo "<p>Vous n'avez pas encore vérifié votre numéro '+".$client->telportableclient."'.</p>";
            if ($client->telverifdate && $client->telverifdate > now()) {
                echo "<p>Vous devez attendre au moins 5 minutes avant de pouvoir renvoyer un message.</p>";
                $disabledSend = " disabled";
            }
            else {
                echo "<p>Cliquez sur le bouton ci-dessous pour envoyer un sms à ce numéro.</p>";
            }
            echo "<button type='submit' style='margin-top:0px' id='button-valide'$disabledSend>Envoyer le sms</button>";
        }
    }

    public static function getBladeVerifTel() {
        $client = $_SESSION["client"];
        $client->checkTokens();$disabledValid = "";
        if ($client->checkTelVerif()) {
            $disabledValid = " disabled";
            echo "<p>Votre numéro de téléphone '+".$client->telportableclient."' est déjà vérifié.</p>";
        }
        if (!$disabledValid) {
            echo "&nbsp; <input type='text' maxlength='6' required placeholder='000000' name='token'> &nbsp;";
        }
        echo "<button type='submit' style='display:inline;margin-top:0px' id='button-valide'$disabledValid>Valider le code</button>";
    }
}
