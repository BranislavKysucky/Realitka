<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrovany_pouzivatel extends Model
{
    protected $table = 'registrovany_pouzivatelia';

    public function inzeraty(){
        return $this->hasMany(Inzerat::class);
    }
}
