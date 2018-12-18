<?php

use Illuminate\Database\Seeder;
use App\Obec;
use App\Realitna_kancelaria;
use Illuminate\Support\Facades\DB;

class PouzivateliaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $realitky = Realitna_kancelaria::all();

        //majitel realitky
        foreach ($realitky as $realitka) {
            DB::table('pouzivatelia')->insert([
                'obec_id' => $this->randomObecId(),
                'realitna_kancelaria_id' => $realitka->id,
                'ulica_cislo' => 'Ulica ' . rand(1, 99),
                'PSC' => rand(10000, 99999),
                'telefon' => '+421' . rand(100000000, 999999999),
                'meno' => 'Majitel_Meno' . rand(1, 1000),
                'priezvisko' => 'Majitel_Priezvisko' . rand(1, 1000),
                'email' => rand(1, 10).'majitelMail' . rand(1, 1000) . '@email.sk',
                'rola'=>2,
                'password' => '$2y$10$ApkYl6Gvn4BFt/1tni69V.w8vN4e17RXz7Ch3ip0Jv1sD6WHU4/7q', // heslo: 123456

            ]);

            //makler realitky
            for ($i = 0; $i < 8; $i++) {
                DB::table('pouzivatelia')->insert([
                    'obec_id' => $this->randomObecId(),
                    'realitna_kancelaria_id' => $this->randomRealitnaKancelariaId(),
                    'ulica_cislo' => 'Ulica ' . rand(1, 99),
                    'PSC' => rand(10000, 99999),
                    'telefon' => '+421' . rand(100000000, 999999999),
                    'meno' => 'Makler_Meno' . rand(1, 1000),
                    'priezvisko' => 'Makler_Priezvisko' . rand(1, 1000),
                    'email' => rand(1, 10).'maklerMail' . rand(1, 1000) . '@email.sk',
                    'rola'=>3,
                    'password' => '$2y$10$ApkYl6Gvn4BFt/1tni69V.w8vN4e17RXz7Ch3ip0Jv1sD6WHU4/7q', // heslo: 123456

                ]);
            }
        }

        //anonym
        for ($i = 0; $i < 8; $i++) {
            DB::table('pouzivatelia')->insert([
                'rola'=>4,
                'email' => rand(1, 10).'anonym' . rand(1, 1000) . '@email.sk'
            ]);
        }
        /*DB::table('pouzivatelia')->insert([
            'obec_id' => $this->randomObecId(),
            'realitna_kancelaria_id' => $this->randomRealitnaKancelariaId(),
            'ulica_cislo' => 'Ulica ' . rand(1,99),
            'PSC' => rand(10000,99999),
            'telefon' => '+421' . rand(100000000,999999999),
            'meno' => 'Meno' . rand(1,1000),
            'priezvisko' => 'Priezvisko' . rand(1,1000),
            'email' => 'testMail' . rand(1,1000) . '@email.sk',
            'password' => '$2y$10$ApkYl6Gvn4BFt/1tni69V.w8vN4e17RXz7Ch3ip0Jv1sD6WHU4/7q', // heslo: 123456

        ]);*/
    }


    private function randomObecId()
    {
        $obec = Obec::inRandomOrder()->first();
        return $obec->id;
    }

    private function randomRealitnaKancelariaId()
    {
        $realitka = Realitna_kancelaria::inRandomOrder()->first();
        return $realitka->id;
    }

}
