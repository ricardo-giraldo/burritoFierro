<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MeseroIncorrectoNoPuedeIniciarSesionTest extends TestCase
{
    /**
     * Prueba que un mesero incorrecto no pueda ingresar en la aplicacion
     *
     * @return void
     */
    public function testMeseroIncorrectoNoPuedeIniciarSesion()
    {
        $this->visit('/')
         ->type('correoIncorrecto@burro.com', 'email')
         ->type('contraseniaIncorrecta$1234', 'password')
         ->press('Iniciar sesion')
         ->seePageIs('/');
    }
}
