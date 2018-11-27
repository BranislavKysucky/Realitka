<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



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
            ->select('inzeraty.*', 'pouzivatelia.meno AS meno', 'pouzivatelia.priezvisko AS priezvisko', 'pouzivatelia.email AS email', 'pouzivatelia.telefon AS telefon')
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
        return view('spravovanie.realitka.inzeraty.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('spravovanie.realitka.inzeraty.upravit');
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
        //
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
