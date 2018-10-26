<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Druh extends Model
{
    protected $table = 'druhy';

    public function inzeraty(){
        return $this->hasMany(Inzerat::class);
    }
}
