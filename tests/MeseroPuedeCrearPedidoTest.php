<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MeseroPuedeCrearPedidoTest extends TestCase
{
    /**
     * Prueba que un mesero pueda crear un pedido de tacos fierros
     *
     * @return void
     */
    public function testMeseroPuedeCrearPedido()
    {
        
    	$this->visit('inicioPedidos/areaPedidos')
    	 ->select('2', 'mesa')
         ->select('2', 'tacoFierro')
         ->click('Terminar pedido')
         ->seePageIs('inicioPedidos/areaPedidos');
    }
}
