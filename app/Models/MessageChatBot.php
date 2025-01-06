<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageChatBot extends Model
{
    use HasFactory;
    protected $table = "messagechatbot";
    protected $primaryKey = "idmessage";
    public $timestamps = false;

    public function completeArray() {
        return [
            "contenuMessage" => $this->contenumessage,
            "reponseMessage" => $this->reponsemessage
        ];
    }
}
