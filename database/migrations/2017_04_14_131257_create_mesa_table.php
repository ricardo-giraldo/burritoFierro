<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('mesa', function (Blueprint $table) {

            $table->increments('idMesa');
            $table->string('numero_mesa');
            $table->boolean('estado_mesa');
            $table->integer('Restaurante_idRestaurante')->unsigned();
            $table->foreign('Restaurante_idRestaurante')->references('idRestaurante')->on('Restaurante');
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
        Schema::dropIfExists('mesa');
    }
}

