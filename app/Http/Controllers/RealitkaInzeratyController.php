<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Inzerat;
use App\Obec;
use App\Druh;
use App\Typ;
use App\Stav;
use Log;




class RealitkaInzeratyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realitka_id = \Auth::user()->realitna_kancelaria_id;

        $inzeraty = DB::table('inzeraty')
            ->join('pouzivatelia', 'inzeraty.pouzivatel_id', '=', 'pouzivatelia.id' )
            ->join('realitne_kancelarie', 'pouzivatelia.realitna_kancelaria_id', '=', 'realitne_kancelarie.id')
            ->join('obce', 'inzeraty.obec_id', '=', 'obce.id' )
            ->select('inzeraty.*', 'pouzivatelia.meno AS meno', 'pouzivatelia.priezvisko AS priezvisko', 'pouzivatelia.email AS email', 'pouzivatelia.telefon AS telefon', 'obce.obec AS obec')
            ->where('pouzivatelia.realitna_kancelaria_id', '=', $realitka_id )
            ->get();




        return view('spravovanie.realitka.inzeraty.index', ['inzeraty' => $inzeraty]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spravovanie.realitka.inzeraty.vytvorit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $inzerat = Inzerat::findOrFail($id);
        $kategoria = $inzerat->kategoria()->first();
        $druh = $inzerat->druh()->first();
        $stav = $inzerat->stav()->first();
        $typ = $inzerat->typ()->first();
        $obec = $inzerat->obec()->first();
        //$kraj = $inzerat->kraj()->first();
        $pouzivatel = $inzerat->pouzivatel()->first();
        $fotografie = DB::table('fotografie')->where('inzerat_id', $id)->get();

        return view('spravovanie.realitka.inzeraty.detail')
            ->with(compact('inzerat'))
            ->with(compact('kategoria'))
            ->with(compact('druh'))
            ->with(compact('stav'))
            ->with(compact('typ'))
            ->with(compact('obec'))
            //->with(compact('kraj'))
            ->with(compact('fotografie'))
            ->with(compact('pouzivatel'));




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inzerat = Inzerat::findOrFail($id);
        $kategoria = $inzerat->kategoria()->first();
        $druh = $inzerat->druh()->first();
        $stav = $inzerat->stav()->first();
        $typ = $inzerat->typ()->first();
        $kraj = $inzerat->kraj()->first();
        $pouzivatel = $inzerat->pouzivatel()->first();
        $fotografie = DB::table('fotografie')->where('inzerat_id', $id)->get();
        $obce = Obec::all();
        $druhy = Druh::all();
        $druhy_nazov = Druh::select('nazov')->groupBy('nazov')->get();
        $typy = Typ::all();
        $stavy = Stav::all();
        $makleri = DB::table('pouzivatelia')->where('rola', 3)->get();

        return view('spravovanie.realitka.inzeraty.upravit')
            ->with(compact('inzerat'))
            ->with(compact('kategoria'))
            ->with(compact('druh'))
            ->with(compact('druhy'))
            ->with(compact('druhy_nazov'))
            ->with(compact('stav'))
            ->with(compact('stavy'))
            ->with(compact('typ'))
            ->with(compact('typy'))
            ->with(compact('kraj'))
            ->with(compact('obce'))
            ->with(compact('fotografie'))
            ->with(compact('makleri'))
            ->with(compact('pouzivatel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inzerat = Inzerat::findOrFail($id);

        $inzerat->nazov=request('nazov');
        $cena_dohodou = $request->get('cena_dohodou');              // prichadza z radiobuttonu ako true or false
        if ($cena_dohodou == "true" & $request->get('cena') == "") {
            $inzerat->cena_dohodou = 1;
        } else if($cena_dohodou == "false" & $request->get('cena') != "") {
            $inzerat->cena_dohodou = 0;
            $inzerat->cena = $request->get('cena');
        } else {
            return back()->with('error', 'Prosíme Vás zadajte cenu alebo nastavte položku CENA DOHODOU na áno');
        }




        $obec_nazov = $request->get('lokalita');
        $semicolonPos = strpos($obec_nazov, ',');
        $obec = substr($obec_nazov, 0, $semicolonPos);
        $obecOkres = substr($obec_nazov, $semicolonPos+1, strlen($obec_nazov)+1);
        $obecOkres = str_replace("okres","",$obecOkres);
        $obecOkres = substr($obecOkres, 1, strlen($obec_nazov)+1);
        $obec_id = DB::table('obce')
            ->select('id')
            ->where('obec', '=',$obec)
            ->where('okres_id','=', $obecOkres)
            ->value('id');



        $inzerat->obec_id = $obec_id;






        $inzerat->ulica=request('ulica');
        $inzerat->druh_id=request('druh');
        $inzerat->typ_id=request('typ');


        $inzerat->stav_id=request('stavy');


        $inzerat->nazov=request('nazov');
        $inzerat->pouzivatel_id=request('makleri');
        $inzerat->save();

        return redirect()->action('RealitkaInzeratyController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inzerat::find($id)->delete();

        return redirect()->action('RealitkaInzeratyController@index');


    }
}
