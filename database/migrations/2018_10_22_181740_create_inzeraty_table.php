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
            $table->integer('pouzivatel_id')->nullable();
            $table->string('nazov');
            $table->longText('popis');
            $table->string('mesto');
            $table->string('heslo',191)->nullable();
            $table->integer('kraj_id');
            $table->integer('cena')->nullable();
            $table->integer('vymera_domu')->nullable();
            $table->integer('vymera_pozemku')->nullable();
            $table->integer('uzitkova_plocha')->nullable();
            $table->boolean('cena_dohodou')->nullable();
            $table->integer('pocet_zobrazeni')->default('1');
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
