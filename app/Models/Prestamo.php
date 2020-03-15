<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';
    protected $fillable = ['empleado_id', 'multimedia_id', 'descripcion', 'estado' ];
    protected $hidden = ['created_at', 'updated_at'];

    public function empleado(){
    	return $this->belongsTo('App\Models\Empleado');
    }

    public function inventario(){
    	return $this->belongsTo('App\Models\Inventario');
    }

    public function procesos(){
    	return $this->belongsToMany('App\Models\Proceso');
    }
}
