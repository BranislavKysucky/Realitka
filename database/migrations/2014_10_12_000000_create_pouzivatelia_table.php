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
            $table->integer('kraj_id')->nullable();
            $table->integer('realitna_kancelaria_id')->nullable();
            $table->string('ulica_cislo');
            $table->string('mesto');
            $table->integer('PSC');
            $table->string('telefon');
            $table->integer('rola')->default('2');
            $table->string('meno');
            $table->string('priezvisko');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('kraj_id')->references('id')->on('kraje');
            $table->foreign('realitna_kancelaria_id')->references('id')->on('realitne_kancelarie');
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
