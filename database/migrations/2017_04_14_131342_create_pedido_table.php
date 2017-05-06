<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            
            $table->increments('idPedido');
            $table->date('fecha');
            $table->string('hora');
            $table->enum('estado_pedido',['pendiente','entregado'])->default('pendiente');
            $table->integer('Mesa_idMesa')->unsigned();
            $table->foreign('Mesa_idMesa')->references('idMesa')->on('mesa');
            $table->integer('Mesero_idMesero')->unsigned();
            $table->foreign('Mesero_idMesero')->references('idMesero')->on('mesero');
            $table->integer('Restaurante_idRestaurante')->unsigned();
            $table->foreign('Restaurante_idRestaurante')->references('idRestaurante')->on('restaurante');
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
        Schema::dropIfExists('pedido');
    }
}
