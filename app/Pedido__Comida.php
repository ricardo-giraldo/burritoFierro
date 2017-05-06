<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido__Comida extends Model
{
    
	protected $table = 'pedido__comida';
    protected $fillable = ['Pedido_idPedido', 'Comida_idComida','cantidad_comida'];

}
