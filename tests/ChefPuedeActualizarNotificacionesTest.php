<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChefPuedeActualizarNotificacionesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testChefPuedeActualizarNoti()
    {
        $this->visit('/inicioAdministracion/retornarIngredientes')
         ->press('Actualizar Notificaciones')
         ->seePageIs('inicioAdministracion/retornarIngredientes');

    }
}
