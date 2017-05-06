<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'idPedido';
    protected $fillable = ['fecha', 'hora', 'estado_pedido', 'Mesa_idMesa','Mesero_idMesero','Restaurante_idRestaurante',];

    public function factura()
    {
        return $this->belongsTo('App\Factura');
    }

    public function mesero()
    {
        return $this->belongsTo('App\Mesero');
    }

     public function mesa()
    {
        return $this->belongsTo('App\Mesa');
    }

     public function comidas()
    {
        return $this->belongsToMany('App\Comida')->withTimestamps();
    }

     public function bebidas()
    {
        return $this->belongsToMany('App\Bebida')->withTimestamps();
    }

     public function adicionales()
    {
        return $this->belongsToMany('App\Adicional')->withTimestamps();
    }
}

