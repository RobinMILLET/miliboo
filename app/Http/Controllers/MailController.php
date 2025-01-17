<?php

namespace App\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $view;
    public $data = array();
    public $attachments = array();
    private $built = false;

    /* ------------------------------- |
    |  // EXEMPLE D'UTILISATION :      |
    |  $mail = new MailController(     |
    |      "Sujet", "mail.testmail",   |
    |      ["test"=>"OK"]              |
    |  );                              |
    |  $mail->sendTo("adr@mail.com");  |
    | ------------------------------- */

    public function __construct($subject, $view, $data = array(), $attachments = array())
    {
        $this->subject = $subject;
        $this->view = $view;
        $this->data = $data;
        $this->attachments = $attachments;
        $this->built = false;
    }

    public function build() {
        $mail = $this->subject($this->subject)->view($this->view, $this->data);
        foreach ($this->attachments as $file) {
            $mail->attach($file);
        }
        $mail->built = true;
        return $mail;
    }

    public function sendTo($target = "s234miliboo@gmail.com") {
        if (!$this->built) $this->build();
        
        Log::alert("Envoi d'un mail à ".$target, [$this]);
        /* ----------------------------- |
        |  [PROTECTION] --> DÉSACTIVÉ ?  |
        | ----------------------------- */
        //Log::alert("Envoi de mail désactivé (MailController)"); return;
        
        // Replacement de l'adresse destinataire par la nôtre
        $target = "s234miliboo@gmail.com";

        Mail::to($target)->send($this);
    }
}
