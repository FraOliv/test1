<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specializzazione extends Model
{
    protected $fillable = [
      'tipologia',
      'descrizione'
    ];
    public function users(){
        return $this->belongsToMany('App\User');


    }
}
