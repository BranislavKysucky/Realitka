<?php

namespace App\Http\Controllers;

use App\Druh;
use App\Fotografia;
use App\Inzerat;
use App\Kontakt;
use App\Obec;
use App\Pouzivatel;
use App\Stav;
use App\Typ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminInzeratyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd($request->get('pouzivatel_id'));
        $id = $request->get('pouzivatel_id');

        $pouzivatel = Pouzivatel::find($request->get('pouzivatel_id'));
        $inzeraty = DB::table('inzeraty')->where('pouzivatel_id', $id)->paginate(10);

        return view('spravovanie.admin.inzeraty.index', ['inzeraty' => $inzeraty, 'pouzivatel' => $pouzivatel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spravovanie.admin.inzeraty.vytvorit');
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
        $cena = number_format($inzerat->cena, 2, ",", " ");
        $kategoria = $inzerat->kategoria()->first();
        $druh = $inzerat->druh()->first();
        $stav = $inzerat->stav()->first();
        $typ = $inzerat->typ()->first();
        $pouzivatel = $inzerat->pouzivatel()->first();
        $obec = $inzerat->obec()->first();
        $fotografie = DB::table('fotografie')->where('inzerat_id', $id)->get();


        return view('spravovanie.admin.inzeraty.detail')
            ->with(compact('inzerat'))
            ->with(compact('kategoria'))
            ->with(compact('druh'))
            ->with(compact('stav'))
            ->with(compact('cena'))
            ->with(compact('typ'))
            ->with(compact('obec'))
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
        $obce = Obec::all();
        $druhy = Druh::all();
        $druhy_nazov = Druh::select('nazov')->groupBy('nazov')->get();
        $typy = Typ::all();
        $stavy = Stav::all();

        return view('spravovanie.admin.inzeraty.upravit')
            ->with(compact('inzerat'))
            ->with(compact('druhy'))
            ->with(compact('druhy_nazov'))

            ->with(compact('stavy'))

            ->with(compact('typy'))

            ->with(compact('obce'));
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
        if($request->file('images')) {
            foreach ($request->file('images') as $image) {
                //ulozenie image, do db ide iba url teda path resp.  /public/images/ + image name

                //$file_name = $image->hashName();
//            if(Fotografia::where('inzerat_id', $id)->count()) {
                $input['imagename'] = time() . $image->getClientOriginalName();
                $path = public_path('/images');
                $image->move($path, $input['imagename']);

                // vytvorenie fotografie zatial iba jeden obrazok
                $fotografia = new Fotografia;
                $fotografia->inzerat_id = $id;
                $fotografia->url = "/images/" . $input['imagename'];
                $fotografia->save();
//            }
            }
        }

        $comingIDs = json_decode($request->get('ids'));

        $rows = DB::table('fotografie')->whereIn('id', $comingIDs);
        $rows->delete();


        $inzerat = Inzerat::findOrFail($id);

        $inzerat->nazov=$request->get('nazov');
        $cena_dohodou = $request->get('cena_dohodou');              // prichadza z radiobuttonu ako true or false
        if ($cena_dohodou == "true" & $request->get('cena') == "") {
            $inzerat->cena_dohodou = 1;
            $inzerat->cena = null;
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
        $obecOkres = substr($obecOkres, 2, strlen($obec_nazov)+1);


        $obec_id = DB::table('obce')
            ->where('obec', '=',$obec)
            ->where('okres_id','=', $obecOkres)
            ->value('id');



        $inzerat->obec_id = $obec_id;






        $inzerat->ulica=$request->get('ulica');
        $inzerat->druh_id=$request->get('druh');
        $inzerat->typ_id=$request->get('typ');
        $inzerat->popis=$request->get('popis');
        $inzerat->vymera_domu=$request->get('vymera_domu');
        $inzerat->vymera_pozemku=$request->get('vymera_pozemku');
        $inzerat->uzitkova_plocha=$request->get('uzitkova_plocha');


        $inzerat->stav_id=$request->get('stavy');


        $inzerat->nazov=$request->get('nazov');

//        if($request->get('telefon_pouzivatel') != null){
//
//            if (Auth::check()) {                    // si lognuty
//
//
//                $id = \Auth::user()->id;
//                $pouzivatel = Pouzivatel::findOrFail($id);
//                $pouzivatel->telefon = $request->get('telefon_pouzivatel');
//                $pouzivatel->save();
//
//            }
//
//        }



        $inzerat->save();

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Inzerat::find($id)->delete();
        DB::table('fotografie')->where('inzerat_id', $id)->delete();

        return Redirect::back();
    }
}
