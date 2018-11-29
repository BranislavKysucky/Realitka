<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kraj extends Model
{
    protected $table = 'kraje';
    public $incrementing = false;

    public function okresy()
    {
        return $this->hasMany(Okres::class);
    }

}
