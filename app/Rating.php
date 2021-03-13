<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $fillable = [
        'nome_utente',
        'data',
        'body',
        'voto',
    ];
}
