<?php

use Illuminate\Database\Seeder;

class RealitneKancelarieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 8; $i++) {
            DB::table('realitne_kancelarie')->insert([
                'obec_id' => $this->randomObecId(),
                'nazov' => 'Realitna_Kancelaria' . rand(1, 999),
                'ulica_cislo' => 'Ulica ' . rand(1, 99),
                'PSC' => rand(10000, 99999),
                'kontaktna_osoba' => 'Kontaktna_Osoba' . rand(1, 99),
                'telefon' => '+421' . rand(100000000, 999999999),
                'email' => 'testMail' . rand(1, 1000) . '@email.sk',
                'ICO' => rand(100000000, 999999999),
                'DIC' => rand(10000000000, 99999999999),
                'url_logo' => '/images/demo/no_image.jpg',
            ]);
        }
    }

    private function randomObecId()
    {
        $obec = \App\Obec::inRandomOrder()->first();
        return $obec->id;
    }
}
