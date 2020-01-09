<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->bigIncrements('id_expediente');
            $table->string('numero_expediente');
            $table->string('nombre_actor');
            $table->string('nombre_demandado');
            $table->date('fecha_en_tribunal');
            $table->date('fecha_en_juzgado');
            $table->bigInteger('id_juicio')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('id_juicio')->references('id_juicio')->on('juicios');   
            $table->foreign('user_id')->references('id')->on('users');  

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
        Schema::dropIfExists('expedientes');
    }
}
