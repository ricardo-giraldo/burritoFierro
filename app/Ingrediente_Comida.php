<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente_Comida extends Model
{
    
	protected $table = 'ingrediente__comida';
    protected $fillable = ['Ingrediente_idIngrediente', 'Comida_idComida','cantidad_ingrediente'];

}
