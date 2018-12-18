<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Typ;
use App\Druh;
use App\Stav;
use App\Obec;
use App\Kategoria;
use App\Pouzivatel;
use App\Inzerat;

class InzeratyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $pouzivatelia = Pouzivatel::all();
        foreach ($pouzivatelia as $pouzivatel) {
            for ($i = 0; $i < 8; $i++) {
                $heslo = '123456';
                if ($pouzivatel->rola != 4) {
                    $heslo = null;
                }
                $rVymera = rand(99, 500);
                $rPozemok = rand(1, 499);
                $druh = $this->randomDruhId();

                if ($druh <= 10) {
                    $rVymera = null;
                    $rPozemok = null;
                }
                $inzerat = new Inzerat();
                $inzerat->stav_id = $this->randomStavId();
                $inzerat->druh_id = $druh;
                $inzerat->typ_id = $this->randomTypId();
                $inzerat->kategoria_id = $this->randomKategoriaId();
                $inzerat->pouzivatel_id = $pouzivatel->id;
                $inzerat->obec_id = $this->randomObecId();
                $inzerat->nazov = 'Inzerat cislo #' . rand(1, 9999);
                $inzerat->popis = 'Popis inzeratu test test test';
                $inzerat->ulica = 'Ulica'  . rand(1, 99);
                $inzerat->heslo = $heslo;
                $inzerat->cena = rand(49999, 200000);
                $inzerat->vymera_domu = $rVymera;
                $inzerat->vymera_pozemku = $rPozemok;
                $inzerat->uzitkova_plocha = $rVymera;
                $inzerat->cena_dohodou = 0;
                $inzerat->pocet_zobrazeni = rand(1, 99999);
                $inzerat->save();

                DB::table('fotografie')->insert([
                    'inzerat_id' => $inzerat->id,
                    'url' => 'images/seed/seed01.jpg'
                ]);
                DB::table('fotografie')->insert([
                    'inzerat_id' => $inzerat->id,
                    'url' => 'images/seed/seed02.jpg'
                ]);
                DB::table('fotografie')->insert([
                    'inzerat_id' => $inzerat->id,
                    'url' => 'images/seed/seed03.jpg'
                ]);
            }
        }
        /*DB::table('inzeraty')->insert([
            'stav_id' => $this->randomStavId(),
            'druh_id' => $this->randomDruhId(),
            'typ_id' => $this->randomTypId(),
            'kategoria_id' => $this->randomKategoriaId(),
            'pouzivatel_id' => $this->randomPouzivatelId(),
            'obec_id' => $this->randomObecId(),
            'nazov' => 'Inzerat cislo #' . rand(1, 9999),
            'popis' => 'Popis inzeratu test test test',
            'ulica' => 'Ulica ' . rand(1, 99),
            'heslo' => '123456',
            'cena' => rand(49999, 200000),
            'vymera_domu' => $rVymera,
            'vymera_pozemku' => rand(1, 499),
            'uzitkova_plocha' => $rVymera,
            'cena_dohodou' => rand(0, 1),
            'pocet_zobrazeni' => rand(1, 99999),
            'created_at' => date('Y-m-d G:i:s'),

        ]);*/
    }

    private function randomStavId()
    {
        $obec = Stav::inRandomOrder()->first();
        return $obec->id;
    }

    private function randomDruhId()
    {
        $druh = Druh::inRandomOrder()->first();
        return $druh->id;
    }

    private function randomTypId()
    {
        $typ = Typ::inRandomOrder()->first();
        return $typ->id;
    }

    private function randomKategoriaId()
    {
        $kategoria = Kategoria::inRandomOrder()->first();
        return $kategoria->id;
    }

    private function randomPouzivatelId()
    {
        $pouzivatel = Pouzivatel::inRandomOrder()->first();
        return $pouzivatel->id;
    }

    private function randomObecId()
    {
        $obec = Obec::inRandomOrder()->first();
        return $obec->id;
    }
}
