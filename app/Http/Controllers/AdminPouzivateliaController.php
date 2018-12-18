<?php

namespace App\Http\Controllers;

use App\Fotografia;
use App\Inzerat;
use App\Kontakt;
use App\Pouzivatel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPouzivateliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pouzivatelia = DB::table('pouzivatelia')->where('rola', '4')->get();

        foreach ($pouzivatelia as $pouzivatel){
            if($pouzivatel->blokovany == 0){
                $pouzivatel->blokovany = 'Nie';
            }else{
                $pouzivatel->blokovany = 'Áno';
            }
        }

        return view('spravovanie.admin.pouzivatelia.index', ['pouzivatelia' => $pouzivatelia]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spravovanie.admin.pozivatelia.vytvorit');
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
        return view('spravovanie.admin.pozivatelia.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('spravovanie.admin.pozivatelia.upravit');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pouzivatel::find($id)->delete();

        $inzeraty = Inzerat::where('pouzivatel_id', $id)->get();

        foreach ($inzeraty as $inzerat){
            Fotografia::where('inzerat_id', $inzerat->id)->delete();
        }

        Inzerat::where('pouzivatel_id', $id)->delete();

        return redirect()->action('AdminPouzivateliaController@index');
    }

    public function blokovat($id)
    {
        $pouzivatel = Pouzivatel::find($id);
        $pouzivatel->blokovany = 1;
        $pouzivatel->save();

        $inzeraty = Inzerat::where('pouzivatel_id', $id)->get();

        foreach ($inzeraty as $inzerat){
            Fotografia::where('inzerat_id', $inzerat->id)->delete();
        }

        Inzerat::where('pouzivatel_id', $id)->delete();

        return redirect()->action('AdminPouzivateliaController@index');
    }
}
