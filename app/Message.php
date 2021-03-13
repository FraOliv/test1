<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $fillable = [
        'nome_utente',
        'testo_messaggio',
        'email',
        'cellulare',
        'disabilità',
    ];
}
