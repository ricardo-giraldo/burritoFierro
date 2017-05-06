<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoAdicionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido__adicional', function (Blueprint $table) {
            
            $table->integer('Pedido_idPedido')->unsigned();
            $table->foreign('Pedido_idPedido')->references('idPedido')->on('pedido');
            $table->integer('Adicional_idAdicional')->unsigned();
            $table->foreign('Adicional_idAdicional')->references('idAdicional')->on('adicional');
            $table->integer('cantidad_adicional');
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
        Schema::dropIfExists('pedido__adicional');
    }
}

