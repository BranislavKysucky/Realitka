<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RealitneKancelarieTableSeeder::class);
        $this->call(PouzivateliaTableSeeder::class);
        $this->call(InzeratyTableSeeder::class);
    }
}
