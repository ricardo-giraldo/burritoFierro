<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $table = 'chef';
    protected $primaryKey = 'idChef';
    protected $fillable = ['nombre', 'cedula', 'telefono','nombre_usuario','contrasenia','Restaurante_idRestaurante',];

    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante');
    }
}
