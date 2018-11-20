<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainNavController extends Controller
{
    public function getRealitky()
    {
        return view('realitky.realitky');
    }

    public function getKontakt()
    {
        return view('kontakt.kontakt');
    }
    public function getMojeInzeraty()
    {
        return view('inzeraty.moje_inzeraty_dotaz');
    }
}
