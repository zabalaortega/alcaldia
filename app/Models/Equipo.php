<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = ['nombre', 'marca', 'serial'];
    protected $hidden = ['created_at', 'updated_at'];

    public function empleados(){
    	return $this->belongsToMany('App\Models\Empleado');
    }

    public function recepciones(){
    	return $this->hasMany('App\Models\Recepcion');
    }

}
