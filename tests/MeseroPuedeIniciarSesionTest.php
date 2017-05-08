<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MeseroPuedeIniciarSesionTest extends TestCase
{
    /**
     * Prueba que el mesero pueda iniciar sesion
     *
     * @return void
     */
    public function testMeseroPuedeIniciarSesion()
    {
        $this->visit('/')
         ->type('mesero@burrito.com', 'email')
         ->type('Burrito$1234', 'password')
         ->press('Iniciar sesion')
         ->seePageIs('inicioPedidos/areaPedidos');
    }
}
