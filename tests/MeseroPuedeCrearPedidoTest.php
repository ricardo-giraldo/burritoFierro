<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MeseroPuedeCrearPedidoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMeseroPuedeCrearPedido()
    {
        
    	$this->visit('inicioPedidos/areaPedidos/crearPedido')
    		->type('Post','tacoFierro')
    		->press('Terminar pedido')
    		->seePageIs('inicioPedidos')
    		->click()
    		->see('');

    }
}
