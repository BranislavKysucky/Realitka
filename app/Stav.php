<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stav extends Model
{
    protected $table = 'stavy';

    public function inzeraty(){
        return $this->hasMany(Inzerat::class);
    }
}
