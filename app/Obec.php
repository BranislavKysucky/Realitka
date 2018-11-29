<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obec extends Model
{
    protected $table = 'obce';

    public function inzeraty()
    {
        return $this->hasMany(Inzerat::class);
    }

    public function okres()
    {
        return $this->belongsTo(Okres::class);
    }
}
