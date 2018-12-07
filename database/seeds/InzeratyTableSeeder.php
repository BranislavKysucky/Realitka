<?php

use Illuminate\Database\Seeder;

class InzeratyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $rVymera = rand(99,500);
        DB::table('inzeraty')->insert([
            'stav_id' => $this->randomStavId(),
            'druh_id' => $this->randomDruhId(),
            'typ_id' => $this->randomTypId(),
            'kategoria_id' => $this->randomKategoriaId(),
            'pouzivatel_id' => $this->randomPouzivatelId(),
            'obec_id' => $this->randomObecId(),
            'nazov' => 'Inzerat cislo #' . rand(1,9999),
            'popis' => 'Popis inzeratu test test test',
            'ulica' => 'Ulica ' . rand(1,99),
            'heslo' => '123456',
            'cena' => rand(49999,200000),
            'vymera_domu' => $rVymera,
            'vymera_pozemku' => rand(1,499),
            'uzitkova_plocha' => $rVymera,
            'cena_dohodou' => rand(0,1),
            'pocet_zobrazeni' => rand(1,99999),
            'created_at' => date('Y-m-d G:i:s'),


        ]);
    }
    private function randomStavId(){
        $obec = \App\Stav::inRandomOrder()->first();
        return $obec->id;
    }
    private function randomDruhId(){
        $druh = \App\Druh::inRandomOrder()->first();
        return $druh->id;
    }
    private function randomTypId(){
        $typ = \App\Typ::inRandomOrder()->first();
        return $typ->id;
    }
    private function randomKategoriaId(){
        $kategoria = \App\Kategoria::inRandomOrder()->first();
        return $kategoria->id;
    }
    private function randomPouzivatelId(){
        $pouzivatel = \App\Pouzivatel::inRandomOrder()->first();
        return $pouzivatel->id;
    }
    private function randomObecId(){
        $obec = \App\Obec::inRandomOrder()->first();
        return $obec->id;
    }
}
