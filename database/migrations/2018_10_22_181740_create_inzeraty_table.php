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
            $table->integer('stav_id')->nullable();
            $table->integer('druh_id')->nullable();
            $table->integer('typ_id')->nullable();
            $table->integer('kategoria_id')->nullable();
            $table->integer('pouzivatel_id')->nullable();
            $table->string('nazov');
            $table->longText('popis');
            $table->string('mesto');
            $table->string('ulica')->nullable();
            $table->string('heslo',191)->nullable();
            $table->integer('kraj_id')->nullable();
            $table->integer('cena')->nullable();
            $table->integer('vymera_domu')->nullable();
            $table->integer('vymera_pozemku')->nullable();
            $table->integer('uzitkova_plocha')->nullable();
            $table->boolean('cena_dohodou')->nullable();
            $table->integer('pocet_zobrazeni')->default('1');
            $table->timestamps();
/*
            $table->foreign('stav_id')->references('id')->on('stavy');
            $table->foreign('druh_id')->references('id')->on('druhy');
            $table->foreign('typ_id')->references('id')->on('typy');
            $table->foreign('kategoria_id')->references('id')->on('kategorie');
            $table->foreign('pouzivatel_id')->references('id')->on('pouzivatelia');
            $table->foreign('kraj_id')->references('id')->on('kraje');
*/
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
