<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChefIncorrectoNoPuedeIniciarSesionTest extends TestCase
{
    /**
     * Prueba que un chef con un nombre de usuario y una contraseña incorrectos no pueda
     *iniciar sesion.
     *
     * @return void
     */
    public function testChefIncorrectoNoPuedeIniciarSesion()
    {
        $this->visit('/')
         ->type('correoIncorrecto@burro.com', 'email')
         ->type('contraseniaIncorrecta$1234', 'password')
         ->press('Iniciar sesion')
         ->seePageIs('/');
    }
}
