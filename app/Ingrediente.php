<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table = 'ingrediente';
    protected $primaryKey = 'idIngrediente';
    protected $fillable = ['nombre_ingrediente', 'cantidad', 'descripcion_ingrediente','Restaurante_idRestaurante',];

    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante');
    }

    public function comidas()
    {
        return $this->belongsToMany('App\Comida')->withTimestamps();
    }
}

