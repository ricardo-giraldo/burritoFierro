<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('chef', function (Blueprint $table) {

            $table->increments('idChef');
            $table->string('nombre');
            $table->string('cedula');
            $table->string('telefono');
            $table->string('nombre_usuario');
            $table->string('contrasenia');
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
        Schema::dropIfExists('chef');
    }
}
