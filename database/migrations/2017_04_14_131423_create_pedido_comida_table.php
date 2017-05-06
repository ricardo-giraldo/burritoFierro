<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoComidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido__comida', function (Blueprint $table) {

            $table->integer('Pedido_idPedido')->unsigned();
            $table->foreign('Pedido_idPedido')->references('idPedido')->on('pedido');
            $table->integer('Comida_idComida')->unsigned();
            $table->foreign('Comida_idComida')->references('idComida')->on('comida');
            $table->integer('cantidad_comida');
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
        Schema::dropIfExists('pedido__comida');
    }
}

