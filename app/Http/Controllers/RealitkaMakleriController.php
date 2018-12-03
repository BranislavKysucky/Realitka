<?php

namespace App\Http\Controllers;

use App\Pouzivatel;
use App\Obec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RealitkaMakleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realitka_id = \Auth::user()->realitna_kancelaria_id;
        $makleri = DB::table('pouzivatelia')
            ->join('obce', 'pouzivatelia.obec_id', '=', 'obce.id' )
            ->select('pouzivatelia.id AS id','pouzivatelia.meno AS meno', 'pouzivatelia.priezvisko AS priezvisko', 'pouzivatelia.email AS email', 'pouzivatelia.telefon AS telefon', 'obce.obec AS obec','pouzivatelia.ulica_cislo AS adresa')
            ->where('pouzivatelia.realitna_kancelaria_id', '=', $realitka_id )
            ->where('pouzivatelia.rola', '=', 3 )
            ->get();






        return view('spravovanie.realitka.makleri.index', ['makleri' => $makleri]);
    }
    public function indexPouzivatel(Request $request, $id)
    {
        $realitka_id = \Auth::user()->realitna_kancelaria_id;

        $inzeraty = DB::table('inzeraty')
            ->join('pouzivatelia', 'inzeraty.pouzivatel_id', '=', 'pouzivatelia.id' )
            ->join('realitne_kancelarie', 'pouzivatelia.realitna_kancelaria_id', '=', 'realitne_kancelarie.id')
            ->join('obce', 'inzeraty.obec_id', '=', 'obce.id' )
            ->select('inzeraty.*', 'pouzivatelia.meno AS meno', 'pouzivatelia.priezvisko AS priezvisko', 'pouzivatelia.email AS email', 'pouzivatelia.telefon AS telefon', 'obce.obec AS obec')
            ->where('pouzivatelia.realitna_kancelaria_id', '=', $realitka_id )
            ->where('pouzivatelia.id', '=', $id )
            ->get();




        return view('spravovanie.realitka.makleri.indexPouzivatel', ['inzeraty' => $inzeraty]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obce = Obec::all();
        return view('spravovanie.realitka.makleri.vytvorit')->with(compact('obce'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $obec_nazov = $request->get('obec_pouzivatel');
        $semicolonPos = strpos($obec_nazov, ',');
        $obec = substr($obec_nazov, 0, $semicolonPos);

        $obec_id = DB::table('obce')
            ->select('id')
            ->where('obec', $obec)->first();



        Pouzivatel::create([
            'obec_id'=>$obec_id->id,
            'realitna_kancelaria_id'=>\Auth::user()->realitna_kancelaria_id,
            'ulica_cislo'=>$request['ulica_pouzivatel'],
            'PSC'=>$request['psc_pouzivatel'],
            'telefon'=>$request['telefon_pouzivatel'],
            'email' => $request['email'],
            'rola'=>3,
            'meno' => $request['meno'],
            'priezvisko' => $request['priezvisko'],
            'password' => bcrypt($request['password'])

        ]);






        return redirect()->action('RealitkaMakleriController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $pouzivatel = Pouzivatel::findOrFail($id);
        $obce = Obec::all();

        return view('spravovanie.realitka.makleri.detail')->with(compact('pouzivatel'))
            ->with(compact('obce'));

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
        return view('spravovanie.realitka.makleri.upravit')->with(compact('pouzivatel'))
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








        return redirect()->action('RealitkaMakleriController@show', $pouzivatel->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pouzivatel::find($id)->delete();

        return redirect()->action('RealitkaMakleriController@index');
    }
}
