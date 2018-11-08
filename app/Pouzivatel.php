<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pouzivatel extends Authenticatable
{
    protected $table = 'pouzivatelia';

    protected $fillable = [
        'kraj_id',
        'realitna_kancelaria_id',
        'ulica_cislo',
        'mesto',
        'PSC',
        'telefon',
        'email',
        'heslo',
        'rola'
    ];

    protected $hidden = [
        'heslo', 'remember_token',
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
