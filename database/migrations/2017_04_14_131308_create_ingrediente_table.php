<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente', function (Blueprint $table) {

            $table->increments('idIngrediente');
            $table->string('nombre_ingrediente');
            $table->integer('cantidad');
            $table->string('descripcion_ingrediente');
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
        Schema::dropIfExists('ingrediente');
    }
}
