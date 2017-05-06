<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBebidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bebida', function (Blueprint $table) {

            $table->increments('idBebida');
            $table->string('nombre_bebida');
            $table->string('precio_bebida');
            $table->string('descripcion_bebida');
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
        Schema::dropIfExists('bebida');
    }
}
