<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesero extends Model
{
    protected $table = 'mesero';
    protected $primaryKey = 'idMesero';
    protected $fillable = ['nombre', 'cedula', 'telefono','nombre_usuario','contrasenia','Restaurante_idRestaurante',];

    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante');
    }

     public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
}
