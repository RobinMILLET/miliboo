<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client as TwilioClient;

class SmsController extends Controller
{
    protected $twilio;
    public $content;
    public $target;

    /* -------------------------- |
    |  // EXEMPLE D'UTILISATION : |
    |  new SmsController(         |
    |      "Ceci est un test",    |
    |      "+33123456789");       |
    |  // Envoyé automatiquement  |
    | -------------------------- */

    public function __construct($content, $target)
    {
        $this->twilio = new TwilioClient(
            env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        $this->content = $content;
        $this->target = $target;
        $this->send();
    }

    public function send($content = null, $target = null) {
        if (!$content) $content = $this->content;
        if (!$target) $target = $this->target;

        Log::alert("Envoi d'un SMS à ".$target." : ".$content);
        /* ----------------------------- |
        |  [PROTECTION] --> DÉSACTIVÉ ?  |
        | ----------------------------- */
        //Log::alert("Envoi de SMS désactivé (SmsController)"); return;
        
        // Replacement du numéro destinataire par le nôtre (Robin)
        $target = "+33782555619";

        $this->twilio->messages->create(
            $target,
            [
                'from' => env('TWILIO_PHONE_NUMBER'),
                'body' => $content,
            ]
        );
    }
}
