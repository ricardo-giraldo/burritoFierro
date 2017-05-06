<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    protected $table = 'bebida';
    protected $primaryKey = 'idBebida';
    protected $fillable = ['nombre_bebida', 'precio_bebida', 'descripcion_bebida',];

     public function pedidos()
    {
        return $this->belongsToMany('App\Pedido');
    }
}
