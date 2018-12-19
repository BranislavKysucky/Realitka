<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotografieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotografie', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inzerat_id')->nullable();
            $table->string('url');
            $table->timestamps();

//            $table->foreign('inzerat_id')->references('id')->on('inzeraty');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotografie');
    }
}
