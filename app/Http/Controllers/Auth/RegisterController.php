<?php

namespace App\Http\Controllers\Auth;

use App\Pouzivatel;
use App\Obec;
use App\Realitna_kancelaria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $obce = Obec::all();
        return view('auth.register', compact('obce'));
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'meno' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pouzivatelia',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Pouzivatel
     */
    protected function create(array $data)
    {


        if ($data['obec_realitka'] != $data['obec_pouzivatel']) {


            $realitka = new Realitna_kancelaria;
            $obec_nazov=$data['obec_realitka'];
            $semicolonPos = strpos($obec_nazov, ',');
            $obec= substr($obec_nazov,0, $semicolonPos) ;
            $obec_id = DB::table('obce')
                ->select('id')
                ->where('obec',$obec) -> first();


            $realitka->obec_id=$obec_id->id;



            $realitka->nazov = $data['nazov'];
            $realitka->ulica_cislo = $data['ulica'];
            $realitka->PSC = $data['psc'];
            $realitka->kontaktna_osoba = $data['kontaktna_osoba'];
            $realitka->telefon = $data['telefon'];
            $realitka->email = $data['email_realitka'];
            $realitka->ICO = $data['ico'];
            $realitka->DIC = $data['dic'];
            $realitka->updated_at = today();
            $realitka->save();

            $obec_nazov=$data['obec_pouzivatel'];
            $semicolonPos = strpos($obec_nazov, ',');
            $obec= substr($obec_nazov,0, $semicolonPos) ;
            $obec_id = DB::table('obce')
                ->select('id')
                ->where('obec',$obec) -> first();


            $obec_pouzivatel_id=$obec_id->id;




            return Pouzivatel::create([
                'obec_id'=>$obec_pouzivatel_id,
                'realitna_kancelaria_id'=>$realitka->id,
                'ulica_cislo'=>$data['ulica_pouzivatel'],
                'PSC'=>$data['psc_pouzivatel'],
                'telefon'=>$data['telefon_pouzivatel'],
                'email' => $data['email'],
                'heslo' => bcrypt($data['password']),
                //'rola'=>2,
                'meno' => $data['meno'],
                'priezvisko' => $data['priezvisko'],
                'password' => bcrypt($data['password'])

            ]);


        } else {


            $realitka = new Realitna_kancelaria;
            $obec_nazov = $data['obec_realitka'];
            $semicolonPos = strpos($obec_nazov, ',');
            $obec = substr($obec_nazov, 0, $semicolonPos);
            $obec_id = DB::table('obce')
                ->select('id')
                ->where('obec', $obec)->first();


            $realitka->obec_id = $obec_id->id;


            $realitka->nazov = $data['nazov'];
            $realitka->ulica_cislo = $data['ulica'];
            $realitka->PSC = $data['psc'];
            $realitka->kontaktna_osoba = $data['kontaktna_osoba'];
            $realitka->telefon = $data['telefon'];
            $realitka->email = $data['email_realitka'];
            $realitka->ICO = $data['ico'];
            $realitka->DIC = $data['dic'];
            $realitka->updated_at = today();
            $realitka->save();


            return Pouzivatel::create([
                'obec_id' => $obec_id->id,
                'realitna_kancelaria_id' => $realitka->id,
                'ulica_cislo' => $data['ulica_pouzivatel'],
                'PSC' => $data['psc_pouzivatel'],
                'telefon' => $data['telefon_pouzivatel'],
                'email' => $data['email'],
                'heslo' => bcrypt($data['password']),
                //'rola'=>2,
                'meno' => $data['meno'],
                'priezvisko' => $data['priezvisko'],
                'password' => bcrypt($data['password'])

            ]);

        }
    }
}
