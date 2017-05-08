<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChefPuedeActualizarReportesTest extends TestCase
{
    /**
     * Prueba que el chef si pueda actualizar los reportes
     *
     * @return void
     */
    public function testChefPuedeActualizarReportes()
    {
        
		$this->visit('/inicioAdministracion/retornarIngredientes')
         ->press('Actualizar reportes')
         ->seePageIs('inicioAdministracion/retornarIngredientes');

    }
}
