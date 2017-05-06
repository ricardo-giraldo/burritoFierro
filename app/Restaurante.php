<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    
	protected $table = 'restaurante';
    protected $primaryKey = 'idRestaurante';
    protected $fillable = ['nombre', 'direccion',];

     public function ingredientes()
    {
        return $this->hasMany('App\Ingrediente');
    }

     public function mesas()
    {
        return $this->hasMany('App\Mesa');
    }


 	public function chefs()
    {
        return $this->hasMany('App\Chef');
    }


	 public function meseros()
	{
	    return $this->hasMany('App\Mesero');
	}

	 public function pedidos()
	{
	    return $this->hasMany('App\Pedido');
	}


}
