<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juicios', function (Blueprint $table) {
            $table->bigIncrements('id_juicio');
            $table->string('nombre_juicio');
            $table->string('estatus');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('id_materia')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');   
            $table->foreign('id_materia')->references('id_materia')->on('materias');    
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
        Schema::dropIfExists('juicios');
    }
}
