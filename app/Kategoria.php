<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $table = 'kategorie';

    public function inzeraty(){
        return $this->hasMany(Inzerat::class);
    }
}
