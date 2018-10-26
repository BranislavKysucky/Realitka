<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fotografia extends Model
{
    protected $table = 'fotografie';

    public function inzerat(){
        return $this->belongsTo(Inzerat::class);
    }
}
