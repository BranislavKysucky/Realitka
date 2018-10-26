<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInzeratyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inzeraty', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stav_id');
            $table->integer('druh_id');
            $table->integer('typ_id');
            $table->integer('kategoria_id');
            $table->integer('anonym_id');
            $table->integer('registrovany_pouzivatel_id');
            $table->string('nazov');
            $table->longText('popis');
            $table->string('adresa');
            $table->integer('cena');
            $table->integer('vymera_domu');
            $table->integer('vymera_pozemku');
            $table->integer('uzitkova_plocha');
            $table->boolean('cena_dohodou');
            $table->integer('pocet_zobrazeni');
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
        Schema::dropIfExists('inzeraty');
    }
}
