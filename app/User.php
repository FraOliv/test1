<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function prestaziones()
    {
        return $this->hasMany('App\Prestazione');    
    }
    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
    public function messages()
    {
        return $this->hasMany('App\Message');
    }
    public function Specializzaziones()
    {
        return $this->belongsToMany('App\Specializzazione');
    }
    public function Sponsors()
    {
        return $this->belongsToMany('App\Sponsor');
    }
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cognome', 'email', 'password', 'indirizzo', 'specializzazione'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        # code...
        return 'slug';
    }
}
