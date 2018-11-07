<?php

namespace App\Http\Controllers;

use App\Fotografia;
use App\Inzerat;
use App\Kategoria;
use App\Typ;
use App\Druh;
use App\Stav;
use App\Pouzivatel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class InzeratyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Inzerat $inzeraty)
    {
        /*predpokladam ze toto je len predpriprava, lebo index metoda by mala primarne zobrazit vsetky inzeraty.
        a ked das vsetko required tak pouzivatelovi nepojde filtrovanie spravne. Zatial som to dal do komentu teda.
        */
        /*
        $this->validate(request(), [
            'lokalita' => 'required',
//            'cena_od' => 'required',
//            'cena_do' => 'required',
//            'vymera_od' => 'required',
//            'vymera_do' => 'required'
        ]);


        $kategoria = $request->input('kategoria');
        $druh = $request->input('druh');
        $stav = $request->input('stav');

        $kategoria_od = 0;
        $kategoria_do = 0;

        $druh_od = 0;
        $druh_do = 0;

        $stav_od = 0;
        $stav_do = 0;

        if($kategoria == 1){
            $kategoria_od = 1;
            $kategoria_do = 3;
        }else{
            $kategoria_od = $kategoria;
            $kategoria_do = $kategoria;
        }

        if($stav == 1){
            $stav_od = 1;
            $stav_do = 7;
        }else{
            $stav_od = $stav;
            $stav_do = $stav;
        }

        if($druh = 1){
            $druh_od = 1;
            $druh_do = 500;
        }else
            if($druh == 110){
                $druh_od = 101;
                $druh_do = 109;
            }else
                if($druh = 207){
                    $druh_od = 201;
                    $druh_do = 206;
                }else
                    if($druh == 311){
                        $druh_od = 301;
                        $druh_do = 310;
                    }else
                        if($druh == 415){
                            $druh_od = 401;
                            $druh_do = 414;
                        }else{
                            $druh_od = $druh;
                            $druh_do = $druh;
                        }



        if ($request->has('lokalita') && $request->has('cena_od') &&
            $request->has('cena_do') && $request->has('cena_do') &&
            $request->has('vymera_od') && $request->has('vymera_do')) {
            $inzeraty = Inzerat::select(DB::raw('inzeraty.*, kategorie.nazov as kategoria, druhy.nazov as druh, druhy.podnazov as podnazov, typy.nazov as typ, stavy.nazov as stav, fotografie.url as url'))
                ->join('kategorie', 'kategoria_id', '=', 'kategorie.id')
                ->join('typy', 'typ_id', '=', 'typy.id')
                ->join('druhy', 'druh_id', '=', 'druhy.id')
                ->join('stavy', 'stav_id', '=', 'stavy.id')
                ->join('fotografie', 'inzerat_id', '=', 'inzeraty.id')
                ->where('typy.value', $request->input('typ'))
                ->whereBetween('kategorie.value', array($kategoria_od, $kategoria_do))
                ->whereBetween('druhy.value', array($druh_od, $druh_do))
                ->whereBetween('stavy.value', array($stav_od, $stav_do))
//                    ->where('cena', '>=', $request->input('cena_od'))
//                    ->where('cena', '<=', $request->input('cena_do'))
//                    ->where('vymera_domu', '>=', $request->input('vymera_od'))
//                    ->where('vymera_domu', '<=', $request->input('vymera_do'))
                ->getQuery()
                ->get();
        }

        return view('inzeraty.filtrovane_inzeraty', compact('inzeraty'));*/

        //zobrazenie inzeratov podla telefonneho cisla
        if($request->has('telefon')){
            $anonym_id=DB::table('anonym')->where('telefon',$request->input('telefon'))->value('id');
            $inzeraty=DB::table('inzeraty')->where('anonym_id',$anonym_id)->get();
            return view('inzeraty.filtrovane_inzeraty',['inzeraty' => $inzeraty]);
        }
        else {
            $inzeraty = Inzerat::all();
            return view('inzeraty.filtrovane_inzeraty', ['inzeraty' => $inzeraty]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()   // otvorenie viewu pre vytvorenie inzeratu + dynamicke data z db
    {
        $kategorie = Kategoria::all();
        $typy = Typ::all();
        $druhy = Druh::all();
        $druhy_nazov = Druh::select('nazov')->groupBy('nazov')->get();
        $stavy = Stav::all();
        return view('inzeraty.vytvorit_inzerat',['kategorie'=>$kategorie,'typy'=>$typy,'druhy'=>$druhy,'stavy'=>$stavy,'druhy_nazov'=>$druhy_nazov]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)         // metoda pre ulozenie inzeratu + fotiek
    {

        $this->validate(request(), [

            'nazov' => 'required',
            'popis' => 'required',
            'adresa' => 'required',
            'cena' => 'required',

           'vymera_domu' => 'required',    // treba domysliet vymeru
           'vymera_pozemku' => 'required',
           'uzitkova_plocha' => 'required',
            'cena_dohodou' => 'required',
            'stavy' => 'required',
            'druh' => 'required',
            'typ' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,jpg,png', // zatial validacia iba pre typy v buducnosti mozno aj velkost/mnozstvo
            'kategoria' => 'required'
    ]);


        if ($request->hasFile('images')) {  // pre istotu este raz overenie



            // vytvorenie inzeratu
            $inzerat = new Inzerat;
            $inzerat->stav_id = $request->get('stavy');
            $inzerat->druh_id = $request->get('druh');
            $inzerat->typ_id = $request->get('typ');
            $inzerat->kategoria_id = $request->get('kategoria');

            // zatial iba natvrdo dane, musia byt vsetky 3 lebo su not null :D

            $inzerat->anonym_id = 1;
            $inzerat->registrovany_pouzivatel_id = 1;
            $inzerat->pocet_zobrazeni = 112;


            $inzerat->nazov = $request->get('nazov');
            $inzerat->popis = $request->get('popis');
            $inzerat->adresa = $request->get('adresa');
            $inzerat->cena = $request->get('cena');
            $inzerat->vymera_domu = $request->get('vymera_domu');
            $inzerat->vymera_pozemku = $request->get('vymera_pozemku');
            $inzerat->uzitkova_plocha = $request->get('uzitkova_plocha');

            $cena_dohodou = $request->get('cena_dohodou');              // prichadza z radiobuttonu ako true or false
            if ($cena_dohodou == true) {
                $inzerat->cena_dohodou = 1;
            } else {
                $inzerat->cena_dohodou = 0;
            }

            $inzerat->updated_at = today();
            $inzerat->save();


            foreach($request->file('images') as $image) {

            //ulozenie image, do db ide iba url teda path resp.  /public/images/ + image name

            $file_name = $image->hashName();
            $input['imagename'] = time() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/images');
            $image->move($path, $input['imagename']);

            // vytvorenie fotografie zatial iba jeden obrazok
            $fotografia = new Fotografia;
            $fotografia->inzerat_id = $inzerat->id;
            $fotografia->url = "/public/images/" . $file_name;
            $fotografia->save();
            }


        }
        return view('inzeraty.hotovo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inzerat  $inzerat
     * @return \Illuminate\Http\Response
     */
    public function show(Inzerat $inzerat, $id)
    {
        // detail inzeratu si zobrazite na adrese /inzerat/idInzeratu

        $inzerat = Inzerat::findOrFail($id);
        $kategoria = $inzerat->kategoria()->first();
        $druh = $inzerat->druh()->first();
        $stav = $inzerat->stav()->first();
        $typ = $inzerat->typ()->first();
        $registrovany_pouzivatel = $inzerat->registrovany_pouzivatel()->first();

        return view('inzeraty.zobrazit_detail')
            ->with(compact('inzerat'))
            ->with(compact('kategoria'))
            ->with(compact('druh'))
            ->with(compact('stav'))
            ->with(compact('typ'))
            ->with(compact('registrovany_pouzivatel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inzerat  $inzerat
     * @return \Illuminate\Http\Response
     */
    public function edit(Inzerat $inzerat)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inzerat  $inzerat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inzerat $inzerat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inzerat  $inzerat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inzerat $inzerat)
    {
        //
    }
}
