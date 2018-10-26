<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrovanyPouzivateliaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrovany_pouzivatelia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazov');
            $table->string('ulica_cislo');
            $table->string('okres');
            $table->string('mesto');
            $table->integer('PSC');
            $table->string('kontaktna_osoba');
            $table->string('telefon');
            $table->string('email');
            $table->integer('ICO');
            $table->integer('DIC');
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
        Schema::dropIfExists('registrovany_pouzivatelia');
    }
}
