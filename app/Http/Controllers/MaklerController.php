<?php

namespace App\Http\Controllers;

use App\Obec;
use App\Pouzivatel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MaklerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pouzivatel = Pouzivatel::findOrFail($id);
        $obce = Obec::all();
        return view('spravovanie.makler.edit')->with(compact('pouzivatel'))
            ->with(compact('obce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pouzivatel = Pouzivatel::findOrFail($id);
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

        $pouzivatel->obec_id = $obec_id;
        $pouzivatel->meno=$request->get('meno');
        $pouzivatel->priezvisko=$request->get('priezvisko');
        $pouzivatel->email=$request->get('email');
        $pouzivatel->ulica_cislo=$request->get('ulica_pouzivatel');
        $pouzivatel->PSC=$request->get('psc_pouzivatel');
        $pouzivatel->telefon=$request->get('telefon_pouzivatel');
        $pouzivatel->save();








        return redirect()->action('InzeratyController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
