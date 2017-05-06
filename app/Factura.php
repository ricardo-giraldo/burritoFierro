<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';
    protected $primaryKey = 'idFactura';
    protected $fillable = ['valor_cuenta','Pedido_idPedido',];

    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante');
    }

    public function pedido()
    {
        return $this->hasOne('App\Pedido');
    }
}
