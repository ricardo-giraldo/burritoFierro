<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredienteComidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente__comida', function (Blueprint $table) {

            $table->integer('Ingrediente_idIngrediente')->unsigned();
            $table->foreign('Ingrediente_idIngrediente')->references('idIngrediente')->on('ingrediente');
            $table->integer('Comida_idComida')->unsigned();
            $table->foreign('Comida_idComida')->references('idComida')->on('Comida');
            $table->integer('cantidad_ingrediente');
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
        Schema::dropIfExists('ingrediente__comida');
    }
}

