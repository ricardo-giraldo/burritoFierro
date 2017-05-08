<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChefPuedeModificarIngredienteTest extends TestCase
{
    /**
     * Prueba que el mesero si pueda modificar la cantidad de un ingrediente
     *
     * @return void
     */
   public function testChefPuedeModificarIngrediente()
    {
        $this->visit('/inicioAdministracion/editarIngrediente/1')
         ->type('Carne al pastor', 'nombre_ingrediente')
         ->type('10', 'cantidad')
         ->press('Editar')
         ->seePageIs('inicioAdministracion/retornarIngredientes');
    }
}
