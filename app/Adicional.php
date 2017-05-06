<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    protected $table = 'adicional';
    protected $primaryKey = 'idAdicional';
    protected $fillable = ['nombre_adicional', 'precio_adicional', 'descripcion_adicional',];

    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido');
    }
}
