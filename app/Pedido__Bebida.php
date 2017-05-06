<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido__Bebida extends Model
{
    	
    	protected $table = 'pedido__bebida';
  		protected $fillable = ['Pedido_idPedido', 'Bebida_idBebida','cantidad_bebida'];

}
