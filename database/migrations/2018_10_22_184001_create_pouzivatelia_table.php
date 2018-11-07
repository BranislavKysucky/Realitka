<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePouzivateliaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pouzivatelia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kraj_id');
            $table->integer('realitna_kancelaria_id');
            $table->string('ulica_cislo');
            $table->string('mesto');
            $table->integer('PSC');
            $table->string('kontaktna_osoba');
            $table->string('telefon');
            $table->string('email');
            $table->string('heslo');
            $table->integer('rola');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pouzivatelia');
    }
}
