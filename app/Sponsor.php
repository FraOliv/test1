<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'nome_sponsor',
        'prezzo',
        'descrizione',
        'data',
        'durata'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
