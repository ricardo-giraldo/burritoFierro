<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChefPuedeIniciarSesionTest extends TestCase
{
    /**
     * Prueba que el chef correcto si pueda iniciar sesion en la aplicacion
     *
     * @return void
     */
    public function testChefPuedeIniciarSesion()
    {
        $this->visit('/')
         ->type('adolfo@burrito.com', 'email')
         ->type('Burrito$1234', 'password')
         ->press('Iniciar sesion')
         ->seePageIs('inicioAdministracion/retornarIngredientes');
    }
}
