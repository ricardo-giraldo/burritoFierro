<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoBebidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido__bebida', function (Blueprint $table) {
            
            $table->integer('Pedido_idPedido')->unsigned();
            $table->foreign('Pedido_idPedido')->references('idPedido')->on('pedido');
            $table->integer('Bebida_idBebida')->unsigned();
            $table->foreign('Bebida_idBebida')->references('idBebida')->on('bebida');
            $table->integer('cantidad_bebida');
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
        Schema::dropIfExists('pedido__bebida');
    }
}