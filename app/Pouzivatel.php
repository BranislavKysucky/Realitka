<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pouzivatel extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='pouzivatelia';
    protected $fillable = [
        'obec_id',
        'realitna_kancelaria_id',
        'ulica_cislo',
        'PSC',
        'telefon',
        'rola',
        'meno',
        'priezvisko',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function inzeraty()
    {
        return $this->hasMany(Inzerat::class);
    }

    public function realitna_kancelaria()
    {
        return $this->belongsTo(Realitna_kancelaria::class);
    }

    public function kraj()
    {
        return $this->belongsTo(Kraj::class);
    }
}
