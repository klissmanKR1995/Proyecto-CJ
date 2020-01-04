<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjemplosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejemplos', function (Blueprint $table) {
            $table->bigIncrements('id_modulo');
            $table->bigInteger('id_expediente')->unsigned();
            $table->string('datos');
            $table->string('persona');
            $table->string('razon_social');
            $table->string('nombre_comercial');
            $table->string('nombre_completo');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('rfc');
            $table->string('curp');
            $table->string('pais');
            $table->string('estados');
            $table->string('municipios');
            $table->string('nacionalidad');
            $table->string('pais_habitual');
            $table->string('estado_habitual');
            $table->string('municipio_habitual');
            $table->string('tipo_domicilio');
            $table->string('tipo_discapacidad');
            $table->string('situacion_conyugal');
            $table->string('escolaridad');
            $table->string('condicion_migratoria');
            $table->string('habla_español');
            $table->string('habla_lengua_indigena');
            $table->string('tipo_lengua_indigena');
            $table->string('habla_lengua_extranjera');
            $table->string('trabaja_ocupacion');
            $table->string('condicion_actividad');
            $table->string('fuente_ingresos');
            $table->string('ingreso_mensual');
            $table->string('tipo_representacion');
            $table->string('sexo_representacion');
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
        Schema::dropIfExists('ejemplos');
    }
}
