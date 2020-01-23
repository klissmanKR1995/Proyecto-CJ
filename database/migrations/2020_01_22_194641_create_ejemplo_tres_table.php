<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjemploTresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ejemplo_tres', function (Blueprint $table) {
            $table->bigIncrements('id_modulotres');
            $table->bigInteger('id_expediente')->unsigned();
            $table->date('fecha_juez_emplazamiento');
            $table->string('mecanismos_realizar_emplazamiento');
            $table->string('pais_emplazamiento');
            $table->string('estado_emplazamiento');
            $table->string('municipio_emplazamiento');
            $table->string('codigo_postal');
            $table->string('numero_visitas');
            $table->string('se_realizo');
            $table->string('mecanismos_realizacion_emplazamiento');
            $table->date('si_fecha');
            $table->string('no_motivos');
            $table->string('contestacion_demanda');
            $table->date('fecha_declaracion_rebeldia');
            $table->string('si_contesta_demanda');
            $table->date('fecha_contestacion_demanda');
            $table->string('reconviene_demanda');
            $table->date('fecha_reconvencion_demanda');
            $table->string('contesta_reconvencion');
            $table->string('numero_total_acuerdos');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('id_expediente')->references('id_expediente')->on('expedientes');
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
        Schema::dropIfExists('ejemplo_tres');
    }
}
