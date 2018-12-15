<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realitna_kancelaria extends Model
{
    protected $table = 'realitne_kancelarie';

    public function pouzivatelia(){
        return $this->hasMany(Pouzivatel::class);
    }
    public function kraj(){
        return $this->belongsTo(Kraj::class);
    }

    public function obec(){
        return $this->belongsTo(Obec::class);
    }

}
