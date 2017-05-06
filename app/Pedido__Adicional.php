<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido__Adicional extends Model
{
    protected $table = 'pedido__adicional';
    protected $fillable = ['Pedido_idPedido', 'Adicional_idAdicional','cantidad_adicional'];
}
