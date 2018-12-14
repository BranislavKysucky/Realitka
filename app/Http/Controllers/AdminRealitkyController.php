<?php

namespace App\Http\Controllers;

use App\Kontakt;
use App\Obec;
use App\Pouzivatel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRealitkyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontakt = Kontakt::all()->first();
        $obce = Obec::all();

        return view('spravovanie.admin.realitky.index', ['kontakt' => $kontakt, 'obce' => $obce]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spravovanie.admin.realitky.vytvorit');
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
        return view('spravovanie.admin.realitky.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('spravovanie.admin.realitky.upravit');
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
        $this->validate(request(), [
            'meno' => 'required',
            'priezvisko' => 'required',
            'telefon' => 'required',
            'email' => 'required',
            'nazovSpolocnosti' => 'required',
            'ulica' => 'required',
            'mesto' => 'required',
            'psc' => 'required',
            'ico' => 'required',
            'ic_dph' => 'required',
            'dic' => 'required'
        ]);

        DB::table('kontakt')
            ->where('id', $id)
            ->update(['meno' => $request->get('meno'),
                'priezvisko' => $request->get('priezvisko'),
                'telefon' => $request->get('telefon'),
                'email' => $request->get('email'),
                'nazovSpolocnosti' => $request->get('nazovSpolocnosti'),
                'ulica' => $request->get('ulica'),
                'mesto' => $request->get('mesto'),
                'psc' => $request->get('psc'),
                'ico' => $request->get('ico'),
                'ic_dph' => $request->get('ic_dph'),
                'dic' => $request->get('dic')]);

        return redirect()->action('AdminRealitkyController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
