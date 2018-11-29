<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Okres extends Model
{
    protected $table = 'okresy';
    public $incrementing = false;

    public function obce()
    {
        return $this->hasMany(Obec::class);
    }

    public function kraj()
    {
        return $this->belongsTo(Kraj::class);
    }

}
