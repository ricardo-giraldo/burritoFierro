<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    protected $table = 'comida';
    protected $primaryKey = 'idComida';
    protected $fillable = ['nombre_comida', 'precio_comida', 'descripcion_comida',];

     public function pedidos()
    {
        return $this->belongsToMany('App\Pedido');
    }

    public function ingredientes()
    {
        return $this->belongsToMany('App\Ingrediente');
    }
}

