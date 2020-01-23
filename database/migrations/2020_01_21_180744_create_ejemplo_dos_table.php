<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjemploDosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ejemplo_dos', function (Blueprint $table) {
            $table->bigIncrements('id_modulodos');
            $table->bigInteger('id_expediente')->unsigned();
            $table->date('fecha_sentencia');
            $table->date('fecha_promocion');
            $table->string('solicitud_embargo');
            $table->date('fecha_solicitud_embargo');
            $table->string('autorizacion_embargo');
            $table->date('fecha_emision');
            $table->string('ejecucion_embargo');
            $table->date('fecha_ejecucion_embargo');
            $table->string('cumple_pago');
            $table->string('bienes_sentencia');
            $table->string('solicita_adjudicacion');
            $table->string('designa_perito');
            $table->date('fecha_designacion');
            $table->date('fecha_aceptacion');
            $table->string('fecha_informe');
            $table->string('venta_almoneda');
            $table->date('fecha_acuerdo');
            $table->string('numero_publicaciones');
            $table->date('fecha_venta');
            $table->string('almonedas_publicas');
            $table->string('cambio_propietario');
            $table->string('orden_lanzamiento');
            $table->date('fecha_lanzamiento');
            $table->string('existencia_derechos');
            $table->string('tipo_derechos');
            $table->string('medidas_dictadas');
            $table->string('tipo_medida');
            $table->string('solicitud_amparo');
            $table->string('tipo_amparo');
            $table->string('suspension_provisional');
            $table->string('fase_procesal');
            $table->string('resolucion_amparo');
            $table->string('total_acuerdos');
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
        Schema::dropIfExists('ejemplo_dos');
    }
}
