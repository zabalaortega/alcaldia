<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoEmpleado extends Model
{
    protected $table = 'equipoempleado';
    protected $fillable = ['empleado_id', 'equipo_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function equipo(){
    	return $this->belongsTo('App\Models\Equipo');
    }

    public function empleado(){
    	return $this->belongsTo('App\Models\Empleado');
    }
}
