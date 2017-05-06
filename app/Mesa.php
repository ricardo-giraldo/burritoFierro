<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = 'mesa';
    protected $primaryKey = 'idMesa';
    protected $fillable = ['numero_mesa', 'estado_mesa', 'Restaurante_idRestaurante',];

    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante');
    }

     public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
}
}
