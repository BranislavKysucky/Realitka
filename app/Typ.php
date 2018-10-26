<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typ extends Model
{
    protected $table = 'typy';

    public function inzeraty(){
        return $this->hasMany(Inzerat::class);
    }
}
