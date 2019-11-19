<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoresCatalagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valores_catalagos', function (Blueprint $table) {
            $table->bigIncrements('id_valor');
            $table->bigInteger('id_catalogo')->unsigned();
            $table->string('valor_variable');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('id_catalogo')->references('id_catalogo')->on('catalogos');
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
        Schema::dropIfExists('valores_catalagos');
    }
}
