<?php

namespace App\Http\Controllers;

use App\Inzerat;
use App\Kategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

class InzeratyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Inzerat $inzeraty)
    {
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

        return view('filtrovane_inzeraty', compact('inzeraty'));
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
