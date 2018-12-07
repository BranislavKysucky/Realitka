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
            $table->string('telefon');
            $table->string('email');
            $table->string('nazovSpolocnosti');
            $table->string('ulica');
            $table->string('mesto');
            $table->string('psc');
            $table->string('ico');
            $table->string('ic_dph');
            $table->string('dic');
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
