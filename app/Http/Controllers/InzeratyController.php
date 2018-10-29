<?php

namespace App\Http\Controllers;

use App\Fotografia;
use App\Inzerat;
use App\Kategoria;
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
            'name' => 'required',
            'cena_od' => 'required',
            'cena_do' => 'required',
            'vymera_od' => 'required',
            'vymera_do' => 'required'
        ]);

        if ($request->has('kategoria') && $request->has('typ') &&
            $request->has('druh') && $request->has('stav') && $request->has('lokalita')) {
            $inzeraty = Inzerat::select(DB::raw('inzeraty.*, kategorie.nazov as kategoria, druhy.nazov as druh, typy.nazov as typ, stavy.nazov as stav'))
                ->join('kategorie', 'kategoria_id', '=', 'kategorie.id')
                ->join('typy', 'typ_id', '=', 'typy.id')
                ->join('druhy', 'druh_id', '=', 'druhy.id')
                ->join('stavy', 'stav_id', '=', 'stavy.id')
                ->where('kategorie.value', $request->input('kategoria'))
                ->where('druhy.value', $request->input('druh'))
                ->where('typy.value', $request->input('typ'))
                ->where('stavy.value', $request->input('stav'))
                ->where('adresa', $request->input('lokalita'))
                ->where('cena', '>=', $request->input('cena_od'))
                ->where('cena', '<=', $request->input('cena_do'))
                ->where('vymera_domu', '>=', $request->input('vymera_od'))
                ->where('vymera_domu', '<=', $request->input('vymera_do'))
                ->getQuery()
                ->get();
        }

        return view('inzeraty.filtrovane_inzeraty', compact('inzeraty'));*/

        //zatial vracia teda len vsetky inzeraty
        $inzeraty=Inzerat::all();
        return view('inzeraty.filtrovane_inzeraty',['inzeraty'=>$inzeraty]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tato metoda otvori view pre vytvorenie inzeratu
        //cesta je inzeraty/create
        // kto by nevedel preco tak kuk sem https://laravel.com/docs/5.5/controllers#resource-controllers
        return view('inzeraty.vytvorit_inzerat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)         // zatial predbezny kod -> neskusat/nekukat nan !!! :D :D
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
            'stav' => 'required',
            'druh' => 'required',
            'typ' => 'required',
            'kategoria' => 'required'
]);



        //ulozenie image, do db ide iba url teda path
        $image=$request->file('image');
        $input['imagename']=time().$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
        $path=public_path('/images');
        $image->move($path,$input['imagename']);

        // vytvorenie inzeratu
        $inzerat = new Inzerat;
        $inzerat->stav = $request->get('stav');
        $inzerat->druh = $request->get('druh');
        $inzerat->typ = $request->get('typ');
        $inzerat->kategoria = $request->get('kategoria');
        $inzerat->anonym_id = 1;
        $inzerat->nazov = $request->get('nazov');
        $inzerat->popis = $request->get('popis');
        $inzerat->adresa = $request->get('adresa');
        $inzerat->cena = $request->get('cena');
        $inzerat->vymera_domu = $request->get('vymera_domu');
        $inzerat->cena_dohodou = $request->get('cena_dohodou');
        $inzerat->save();
        // vytvorenie fotografie zatial iba jeden obrazok
        $fotografia = new Fotografia;
        $fotografia->inzerat_id = $inzerat->id;
        $fotografia->url = $path;
        $fotografia->save();

        return view('inzeraty.hotovo');





        //echo 'tu bude nieco velmi zaujimave :D';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inzerat  $inzerat
     * @return \Illuminate\Http\Response
     */
    public function show(Inzerat $inzerat)
    {
        //
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
