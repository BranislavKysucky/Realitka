<?php

namespace App\Http\Controllers;

use App\Mail\OverMail;
use App\Pouzivatel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


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

    public function overitEmail()
    {

        return view('email.overit_email');
    }

    public function overitEmailPost(Request $request)
    {

        $pouzivatel = Pouzivatel::where('email', '=', $request->get('email'))->first();
        if ($pouzivatel!=null) {
            $pouzivatel->email_token = Str::random(5);
            $pouzivatel->save();
        } else {
            $pouzivatel = new Pouzivatel;
            $pouzivatel->email = $request->get('email');
            $pouzivatel->email_token = Str::random(5);
            $pouzivatel->save();
        }
        Mail::to($pouzivatel->email)->send(new OverMail($pouzivatel));
        return redirect(route('inzeraty.create'));
    }
}
