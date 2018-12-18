<?php

namespace App\Http\Controllers;

use App\Fotografia;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Inzerat;
use App\Obec;
use App\Druh;
use App\Typ;
use App\Stav;
use Log;
use PhpParser\Node\Expr\Cast\Object_;


class RealitkaInzeratyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $inzeraty = DB::table('inzeraty')
            ->join('pouzivatelia', 'inzeraty.pouzivatel_id', '=', 'pouzivatelia.id' )
            ->join('obce', 'inzeraty.obec_id', '=', 'obce.id' )
            ->join('typy', 'inzeraty.typ_id', '=', 'typy.id' )
            ->select('inzeraty.*', 'pouzivatelia.meno AS meno', 'pouzivatelia.priezvisko AS priezvisko', 'pouzivatelia.email AS email', 'pouzivatelia.telefon AS telefon', 'obce.obec AS obec',
                'obce.okres_id AS okres',
                'typy.nazov AS typ')
            ->where('pouzivatelia.realitna_kancelaria_id', '=', \Auth::user()->realitna_kancelaria_id)

            ->get();



        return view('spravovanie.realitka.inzeraty.index', ['inzeraty' => $inzeraty, 'ibaInzeratyMaklerov' => 'nie']);

    }

    public function indexBezMajitela()
    {


        $inzeraty = DB::table('inzeraty')
            ->join('pouzivatelia', 'inzeraty.pouzivatel_id', '=', 'pouzivatelia.id' )
            ->join('obce', 'inzeraty.obec_id', '=', 'obce.id' )
            ->join('typy', 'inzeraty.typ_id', '=', 'typy.id' )
            ->select('inzeraty.*', 'pouzivatelia.meno AS meno', 'pouzivatelia.priezvisko AS priezvisko', 'pouzivatelia.email AS email', 'pouzivatelia.telefon AS telefon', 'obce.obec AS obec',
                'obce.okres_id AS okres',
                'typy.nazov AS typ')
            ->where('pouzivatelia.realitna_kancelaria_id', '=', \Auth::user()->realitna_kancelaria_id)
            ->where('pouzivatelia.rola', '=', '3')
            ->get();



        return view('spravovanie.realitka.inzeraty.index', ['inzeraty' => $inzeraty, 'ibaInzeratyMaklerov' => 'ano']);

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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $inzerat = Inzerat::findOrFail($id);



        return view('spravovanie.realitka.inzeraty.detail')
            ->with(compact('inzerat'));




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

        $makleri = DB::table('pouzivatelia')->
        where('realitna_kancelaria_id', \Auth::user()->realitna_kancelaria_id)->

        get();

        return view('spravovanie.realitka.inzeraty.upravit')
            ->with(compact('inzerat'))

            ->with(compact('druhy'))
            ->with(compact('druhy_nazov'))

            ->with(compact('stavy'))

            ->with(compact('typy'))

            ->with(compact('obce'))

            ->with(compact('makleri'));

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

            'nazov' => 'required|max:25',
            'popis' => 'required|max:200',
            'ulica' => 'required|max:20',
            'lokalita' => 'required',
            'druh' => 'required',
            'typ' => 'required',
            'images' => 'max:10240',                   // je potreba mat povinny image ??
            'images.*' => 'image|mimes:jpeg,jpg,png' // zatial validacia iba pre typy v buducnosti mozno aj velkost/mnozstvo

        ]);


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
        $inzerat->pouzivatel_id=$request->get('makleri');
        $inzerat->save();

     //  return redirect()->action('RealitkaInzeratyController@index');
        return redirect()->action('RealitkaInzeratyController@show', $inzerat->id);
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
