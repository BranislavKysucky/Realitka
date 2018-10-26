<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anonym extends Model
{
    protected $table = 'anonym';

    public function inzeraty(){
        return $this->hasMany(Inzerat::class);
    }
}
