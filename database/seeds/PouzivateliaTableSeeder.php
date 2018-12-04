<?php

use Illuminate\Database\Seeder;

class PouzivateliaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('pouzivatelia')->insert([
            'obec_id' => $this->randomObecId(),
            'realitna_kancelaria_id' => $this->randomRealitnaKancelariaId(),
            'ulica_cislo' => 'Ulica ' . rand(1,99),
            'PSC' => rand(10000,99999),
            'telefon' => '+421' . rand(100000000,999999999),
            'meno' => 'Meno' . rand(1,1000),
            'priezvisko' => 'Priezvisko' . rand(1,1000),
            'email' => 'testMail' . rand(1,1000) . '@email.sk',
            'password' => '123456',

        ]);
    }



    private function randomObecId(){
        $obec = \App\Obec::inRandomOrder()->first();
        return $obec->id;
    }
    private function randomRealitnaKancelariaId(){
        $obec = \App\Obec::inRandomOrder()->first();
        return $obec->id;
    }

}
