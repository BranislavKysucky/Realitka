<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inzerat extends Model
{
    protected $table = 'inzeraty';

    public function fotografie()
    {
        return $this->hasMany(Fotografia::class);
    }

    public function obec()
    {
        return $this->belongsTo(Obec::class);
    }

    public function pouzivatel()
    {
        return $this->belongsTo(Pouzivatel::class);
    }

    public function druh()
    {
        return $this->belongsTo(Druh::class);
    }

    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class);
    }

    public function stav()
    {
        return $this->belongsTo(Stav::class);
    }

    public function typ()
    {
        return $this->belongsTo(Typ::class);
    }

    public function kraj()
    {
        return $this->belongsTo(Kraj::class);
    }
}
