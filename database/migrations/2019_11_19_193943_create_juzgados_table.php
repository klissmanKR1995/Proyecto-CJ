<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuzgadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juzgados', function (Blueprint $table) {
            $table->bigIncrements('id_juzgado');
            $table->string('nombre_juzgado');
            $table->string('estatus');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('id_distrito')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_distrito')->references('id_distrito')->on('distritos');
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
        Schema::dropIfExists('juzgados');
    }
}
