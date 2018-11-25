<?php

namespace App\Http\Controllers;

use App\Mail\OverMail;
use App\Mail\CustomerMail;
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

    public function customerEmailPost(Request $request){

        $this->validate($request, [
            'meno' => 'required',
            'emailReply' => 'required',
            'sprava' => 'required'
        ]);
        $emailReply = $request->get('emailReply');
        $meno = $request->get('meno');
        $sprava = $request->get('sprava');
        Mail::to("realitka.oznamenia@gmail.com")->send(new CustomerMail($sprava,$meno,$emailReply));
        return back()->with('success', 'Sprava bolo odoslana !!!');
    }
}
