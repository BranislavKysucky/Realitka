<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontaktTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontakt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meno');
            $table->string('priezvisko');
            $table->integer('telefon');
            $table->string('email');
            $table->string('nazovSpolocnosti');
            $table->string('ulica');
            $table->string('mesto');
            $table->integer('psc');
            $table->integer('ico');
            $table->integer('ic_dph');
            $table->integer('dic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontakt');
    }
}
