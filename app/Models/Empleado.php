<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = ['nombres', 'apellidos', 'estado', 'dependencia_id', 'tipo_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function dependencia(){
    	return $this->belongsTo('App\Models\Dependencia');
    }

    public function tipos(){
    	return $this->hasMany('App\Models\Tipo');
    }

    public function equipos(){
    	return $this->belongsToMany('App\Models\Equipo');
    }

}
