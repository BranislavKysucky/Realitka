<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontakt extends Model
{
    public $table = 'kontakt';

    public $fillable = ['meno','priezvisko','telefon', 'email', 'nazovSpolocnosti', 'ulica', 'mesto', 'psc', 'ico', 'ic_dph', 'dic'];

}
