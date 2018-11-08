<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kraj extends Model
{
    protected $table = 'kraje';

    public function inzeraty(){
        return $this->hasMany(Inzerat::class);
    }
}
