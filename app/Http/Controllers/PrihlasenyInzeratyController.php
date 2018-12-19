<?php

namespace App\Http\Controllers;

use App\Obec;
use App\Inzerat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Pouzivatel;

class PrihlasenyInzeratyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obce = Obec::all();
        if (Auth::check()) {
            $inzeraty = Inzerat::where('pouzivatel_id', Auth::user()->id)->paginate(10);
            foreach ($inzeraty as $inzerat) {
                if ($inzerat->jednaFotografia()->value('url') == null) {
                    $inzerat->obrazok = 'images/demo/no_image.jpg';
                } else {
                    $inzerat->obrazok = $inzerat->jednaFotografia()->value('url');
                }
            }
            return view('inzeraty.filtrovane_inzeraty', ['obce' => $obce, 'inzeraty' => $inzeraty, 'widget' => $this->widget()]);
        }
    }
    public function zmenaHesla()
    {
        return view('auth.passwords.zmenaHesla');
    }
    public function ulozitHeslo(Request $request)
    {
        $this->validate(request(), [
            'noveHeslo' => 'required|string|min:6',
            'stareHeslo' => 'required'
        ]);
        if (Hash::check($request->get('stareHeslo'), Auth::user()->getAuthPassword())) {
            $admin = Pouzivatel::findOrFail(Auth::user()->id);
            $admin->password = bcrypt($request->get('noveHeslo'));
            $admin->save();
            Auth::logout();
            return view('auth.login');
        } else {
            return back();
        }
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
        //
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
        //
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
