<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pouzivatel extends Model
{
    protected $table = 'pouzivatelia';

    public function inzeraty(){
        return $this->hasMany(Inzerat::class);
    }
    public function realitna_kancelaria(){
        return $this->belongsTo(Realitna_kancelaria::class);
    }
    public function kraj(){
        return $this->belongsTo(Kraj::class);
    }
}
