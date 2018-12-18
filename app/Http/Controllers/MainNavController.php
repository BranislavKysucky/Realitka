<?php

namespace App\Http\Controllers;

use App\Kontakt;
use App\Mail\OverMail;
use App\Mail\CustomerMail;
use App\Pouzivatel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Kraj;
use App\Okres;
use App\Realitna_kancelaria;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

class MainNavController extends Controller
{
    public function getRealitky(Request $request)
    {
        if($request->filled('okres')){
            $realitky = DB::table('realitne_kancelarie')
                ->select(DB::raw('*'))
                ->join('obce', 'obec_id', '=', 'obce.id')
                ->where('obce.okres_id', $request->okres)
                ->paginate(10);
        }else if($request->filled('pismeno')){
            $realitky = Realitna_kancelaria::where('nazov', 'LIKE', $request->pismeno . '%')
                ->paginate(10);
        }else{
            $realitky = Realitna_kancelaria::paginate(10);
        }

        $kraje = DB::table('okresy')
            ->select(array(DB::raw('kraj_id, kraje.kraj as kraj, COUNT(kraj_id) as pocet')))
            ->join('kraje', 'kraj_id', '=', 'kraje.id')
            ->groupBy('kraj_id', 'kraje.kraj')
            ->get();

        $okresyBC = Okres::select('id')
            ->where('kraj_id', 'BC')
            ->groupBy('id')
            ->get()
            ->toArray();


        $okresyBL = Okres::select('id')
            ->where('kraj_id', 'BL')
            ->groupBy('id')
            ->get()
            ->toArray();


        $okresyKI = Okres::select('id')
            ->where('kraj_id', 'KI')
            ->groupBy('id')
            ->get()
            ->toArray();


        $okresyNI = Okres::select('id')
            ->where('kraj_id', 'NI')
            ->groupBy('id')
            ->get()
            ->toArray();


        $okresyPV = Okres::select('id')
            ->where('kraj_id', 'PV')
            ->groupBy('id')
            ->get()
            ->toArray();


        $okresyTA = Okres::select('id')
            ->where('kraj_id', 'TA')
            ->groupBy('id')
            ->get()
            ->toArray();


        $okresyTC = Okres::select('id')
            ->where('kraj_id', 'TC')
            ->groupBy('id')
            ->get()
            ->toArray();


        $okresyZI = Okres::select('id')
            ->where('kraj_id', 'ZI')
            ->groupBy('id')
            ->get()
            ->toArray();

        $okresy = [];
        for ($i = 0; $i < count($kraje); $i++) {
            $okresyString = 'okresy' . $kraje[$i]->kraj_id;
            $okresyVar = eval('return $'. $okresyString . ';');
            for ($j = 0; $j < count($okresyVar); $j++) {
                $okresy[substr($okresyString, -2)][$j] = $okresyVar[$j]['id'];
            }
        }
//        dd($kraje);

        return view('realitky.realitky', ['kraje' => $kraje, 'okresy' => $okresy, 'realitky' => $realitky]);
    }

    public function getKontakt()
    {
        $kontakt = Kontakt::get()->first();
        return view('kontakt.kontakt', ['kontakt' => $kontakt]);
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
